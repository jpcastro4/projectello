var db = {

    initTables: function(tables){
        
        if(tables.representantes){
            
            representantesDb.destroy().then(function (response) {
                db.syncRepresentantes(tables.representantes)
            }).catch(function (err) {
                console.log(err);
            });            
        }

        if (tables.clientes) {

            clientesDb.destroy().then(function (response) {
                db.syncClientes(tables.clientes)
            }).catch(function (err) {
                console.log(err);
            });
            
        }

        if (tables.produtos) {
            
            produtosDb.destroy().then(function (response) {
                db.syncProdutos(tables.produtos)
            }).catch(function (err) {
                console.log(err);
            });
        }
    },

    syncRepresentantes: (representantes)=>{

        representantesDb = new PouchDB('Representantes')

        representantes.forEach(function(t,k){
            t._id = t.CODIGO
        })
         
        representantesDb.bulkDocs(representantes).then(function (result) {
             console.log('Representantes sincronizados')
        }).catch(function (err) {
            console.log(err);
        });

    },

    syncClientes: (clientes)=>{

        clientesDb = new PouchDB('Clientes');

        clientes.forEach(function (t, k) {
            t._id = t.CODIGO
        })

        clientesDb.bulkDocs(clientes)
        .then(function (result) {
            console.log('Clientes sincronizados')
        }).catch(function (err) {
            console.log(err);
        });

    },

    syncProdutos: (produtos) => {

        produtosDb = new PouchDB('Produtos');

        produtos.forEach(function (t, k) {
            t._id = t.CODIGO
        })

        produtosDb.bulkDocs(produtos)
            .then(function (result) {
                console.log('Produtos sincronizados')
            }).catch(function (err) {
                console.log(err);
            });
    },

    login: (dados, callback)=>{

        representantesDb.get(dados.ID).then(function (doc) {
            
            if(doc.SENHA == dados.SENHA){
                doc.SENHA = ''
                localStorage.setItem('user_log',JSON.stringify(doc))
                return callback({error:false})
            }else{
                return callback({ error: true, message: 'Senha incorreta' })
            }

        }).catch(function (err) {
            console.log(err);

            return callback({ error: true, message: err })
        });
    },

    getCliente: (params,callback)=>{

         
        clientesDb.search({
            query: params.s,
            fields: [params.filtro]
        }).then(function (res) {
            callback(res)
        }).catch(function (err) {
            callback(err)
        })

        

    },

    syncTbPesquisas: function(callback){

        var $this = this

        model.getPesquisas(function(res){

            if(res.error){

                return callback({ error: true, message: res.message })

            }else{

                localDb.transaction(function (tx) {

                    $.each(res.data, function (k, p) {

                        var dados = JSON.stringify(p)

                        tx.executeSql(
                            "UPDATE pesquisas SET pesquisaNome=?, pesquisaStatus=?, dados=? WHERE pesquisaID =?",
                            [p.pesquisaNome, p.pesquisaStatus, dados, p.pesquisaID],

                            function (tx, res) {

                                if (res.rowsAffected == 0) {

                                    $this.novaPesquisa(p)
                                } 
                            },

                            function (tx, error) {

                                console.log('UPDATE pesquisas: ' + error.message);
                                //return callback({ error: true, message: error.message })
                            }
                        )
                    })

                }, function (error) {

                    return callback({ error: true, message: error.message })

                }, function () {
                    return callback({error:false})
                 })                 
            }
        })
    },

    novaPesquisa: function (pesquisa) {

        var dados = JSON.stringify(pesquisa)

        localDb.transaction(function (tx) {

            tx.executeSql(
                "INSERT INTO pesquisas VALUES (?,?,?,?)",
                [pesquisa.pesquisaID, pesquisa.pesquisaNome, pesquisa.pesquisaStatus, dados],

                function (tx, res) {
                    //return callback({error:false})
                },
                function (tx, error) {
                    console.log('Erro na sql Nova Pesquisa ' + error.message)
                    model.cAlert(error.message, 'error', 5000)
                    
                }
            )

        }, function (error) {
            console.log('Erro na transação Nova Pesquisa ' + error.message)
            model.cAlert(error.message, 'error', 5000)
            
        }, function () {
           
        })
    },


 

    todasPesquisas: function(callback){
        
        localDb.transaction(function(tx) {

            tx.executeSql("SELECT * FROM pesquisas WHERE pesquisaStatus=?", [1], function (tx, rs) {
                
                return callback({ error: false, data:rs })

            }, function (error) {
               
                return callback({ error: true, message:'Erro na consulta (todasPesquisas): '+ error.message})
            })

        }, function (error) {

            return callback({ error: true, message: 'Erro na transação (todasPesquisas): ' + error.message })

        }, function () {

        })

    },
  

    pesquisa: function(pesquisaId,callback){

        localDb.transaction(function (tx) {

            tx.executeSql(
                "SELECT * FROM pesquisas WHERE pesquisaID=?",
                [pesquisaId],

                function (tx, rs) {
                    
                    var dados = JSON.parse(rs.rows[0].dados)
                    return callback({ error: false, data: dados })
                },
                function (tx, error) {
                    console.log('Erro transação (pesquisa): ' + error.message)
                    return callback({ error: true, message: 'Erro transação (pesquisa): ' +error.message })
                }
            )
        }, function (error) {
            console.log('Erro transação (pesquisa): ' + error.message)
            return callback({ error: true, message: 'Erro transação (pesquisa): ' +error.message })
        }, function () {
             
        })
    },

    countColetas: function(local,callback){    
    
        if(local.coletorLocalId){

            var pesquisaId = local.pesquisaId, bairroId = local.bairroId

            localDb.transaction(function (tx) {

                tx.executeSql(
                    "SELECT * FROM coletas WHERE pesquisaID=? AND bairroComuID=?",
                    [pesquisaId, bairroId],
                    function (tx, rs) {

                        var len = rs.rows.length;

                        return callback({error:false,numColetasFeitas:len})

                    },
                    function (tx, error) {
                        return callback({ error: true,message:error.message })
                    }
                )

            }, function (error) {
                return callback({ error: true,message:error.message })

            }, function () {

            })
        }else{

            var pesquisaId = local.pesquisaId, bairroId = local.localBairroComu

            localDb.transaction(function (tx) {

                tx.executeSql(
                    "SELECT * FROM coletas_extras WHERE pesquisaID=? AND localBairroComu=?",
                    [pesquisaId, bairroId],
                    function (tx, rs) {

                        var len = rs.rows.length;

                        return callback({ error: false, numColetasFeitas: len })

                    },
                    function (tx, error) {
                        return callback({ error: true, message: error.message })
                    }
                )

            }, function (error) {
                return callback({ error: true,message:error.message })

            }, function () {

            })

        }

    },

    addLocalExtra: function(res,callback){
            
        pesquisaID = localStorage.getItem('pesquisaID')

        console.log(pesquisaID)
        
        localDb.transaction(function (tx) {

            tx.executeSql(
                "INSERT INTO locais_extras VALUES (?,?,?,?,?)",
                [pesquisaID,0,0,res.nomeLocal,res.zona],

                function (tx, rs) {

                    return callback({ error: false, message: res.nomeLocal + ' inserido com sucesso' })
                },
                function (text, error) {

                    console.log('Erro executeSql addLocalExtra : ' + error.message)
                    return callback({ error: true, message: 'Erro executeSql addLocalExtra : ' + error.message })

                }

            )

        }, function (error) {

            console.log('Erro transaction addLocalExtra : ' + error.message)
            return callback({ error: true, message:'Erro transaction addLocalExtra : ' + error.message })

        }, function () {

        })

        

    },
    listaLocaisExtra: function (callback) {

        var pesquisaId = localStorage.getItem('pesquisaID')

        localDb.transaction(function (tx) {

            tx.executeSql(
                "SELECT * FROM locais_extras WHERE pesquisaID=?",
                [pesquisaId],

                function (tx, rs) {

                    return callback({ error: false, data: rs })
                },
                function (tx, error) {
                    return callback({ error: false, message: 'Erro consulta listaLocaisExtra : ' +error.message })
                    console.log('Erro consulta listaLocaisExtra : ' + error.message)
                }
            )
        }, function (error) {
            console.log('Erro transação lista Locais Extra: ' + error.message)
            return callback({ error: false, message:'Erro transação lista Locais Extra: ' + error.message })
        }, function () {

        })
    },

   
    fechaColeta: function(coleta,callback){

        if (coleta.coletorLocalId) { //se é uma coleta normal

            localDb.transaction(

                function (tx) {

                    tx.executeSql(
                        "INSERT INTO coletas VALUES (?,?,?,?)",
                        [coleta.pesquisaId, coleta.coletorLocalId, coleta.bairroComuId, coleta.respostas],
                        function (tx, rs) {

                            return callback({ error: false})

                        }, function (error) {

                            return callback({ error: true, message: 'Erro insert fechaColeta: ' +  error.message })

                        }
                    )

                }, function (error) {
                    return callback({ error: true, message:'Erro transacao fechaColeta: ' +   error.message })

                }, function () {
                   
                })

        } else { //se é uma coleta extra

            localDb.transaction(

                function (tx) {

                    tx.executeSql(
                        "INSERT INTO coletas_extras VALUES (?,?,?)",
                        [coleta.pesquisaId, coleta.bairroComuId, coleta.respostas],
                        function (tx, rs) {

                            return callback({ error: false })

                        }, function (error) {

                            return callback({ error: true,  message:'Erro insere fechaColeta Extra : ' +  error.message })

                        }
                    )

                }, function (error) {
                    return callback({ error: true, message:'Erro na transacao fechaColeta Extra : ' +  error.message })

                }, function () {
                   
                })

        }
    },

    upColetas: (pesquisaId,callback)=>{
        
        localDb.transaction(function (tx) {
            tx.executeSql(
                "SELECT * FROM coletas WHERE pesquisaID=?",
                [pesquisaId],
                function (tx, rs) {

                    var rows = rs.rows;
                    var len = rows.length;

                    if (len > 0) {

                        localStorage.setItem('up_pesquisas', JSON.stringify(rows))
                    }
                },
                function (tx, error) {

                    console.log('Erro consulta upColetas : ' + error.message)
                    return callback({error:true,message:'Erro consulta upColetas : ' + error.message})
                }
            )

            tx.executeSql(
                "SELECT * FROM coletas_extras WHERE pesquisaID=?",
                [pesquisaId],
                function (tx, rs) {

                    var rows = rs.rows;
                    var len = rows.length;

                    if (len > 0) {

                        localStorage.setItem('up_pesquisasExtra', JSON.stringify(rows))
                    }
                },
                function (tx, error) {

                    console.log('Erro consulta upColetas : ' + error.message)
                    return callback({ error: true, message: 'Erro consulta upColetas : ' + error.message })
                }
            )

        }, function (error) {
             
            console.log('Erro (transação upColetas ) : ' + error.message)
            return callback({ error: true, message:'Erro (transação upColetas ) : ' + error.message})

        }, function () {

            return callback({error:false})
            
        })
    },

    limpaBase: (callback) => {

        model.cAlert('Limpando base', 'success', 2000)

        localDb.transaction(function (tx) {
            tx.executeSql(
                "DROP TABLE IF EXISTS pesquisas",
                [],
                function (tx, rs) { 
                },
                function (tx, error) {                    
                    return callback({ error: true, message: 'Erro consulta upColetas : ' + error.message })
                } 
            )

            tx.executeSql(
                "DROP TABLE  IF EXISTS coletas",
                [],
                function (tx, rs) {
                },
                function (tx, error) {
                    return callback({ error: true, message: 'Erro consulta upColetas : ' + error.message })
                }
            )

            tx.executeSql(
                "DROP TABLE  IF EXISTS coletas_extras",
                [],
                function (tx, rs) {
                },
                function (tx, error) {
                    return callback({ error: true, message: 'Erro consulta upColetas : ' + error.message })
                }
            )

            tx.executeSql(
                "DROP TABLE  IF EXISTS locais_extras",
                [],
                function (tx, rs) {
                },
                function (tx, error) {
                    return callback({ error: true, message: 'Erro consulta upColetas : ' + error.message })
                }
            )


        }, function (error) {

            console.log('Erro (transação upColetas ) : ' + error.message)
            return callback({ error: true, message: 'Erro (transação upColetas ) : ' + error.message })

        }, function () {

            return callback({ error: false, message: 'Limpeza processada' })

        })



        
    }
}