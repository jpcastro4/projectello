var db = {

    init: function(){

       // model.cAlert('Iniciando tabelas', 'info', 1500)
       // model.loading('open')
        $('#loading .log').text('Abrindo banco')
        this.initTables()
    },

    initTables: function(){
        
        localDb.transaction(

            function (tx){

                tx.executeSql('CREATE TABLE IF NOT EXISTS pesquisas(pesquisaID integer, pesquisaNome text, pesquisaStatus integer, dados longtext ) ')
                //tx.executeSql('CREATE TABLE IF NOT EXISTS pesquisas_locais(pesquisaID integer, estadoID integer, cidadeID integer, bairroComuID text, coletorLocalID integer , numMinColetas integer  ) ')
                tx.executeSql('CREATE TABLE IF NOT EXISTS coletas(pesquisaID integer, coletorLocalID integer, bairroComuID integer, coletaRespostas text) ')

                tx.executeSql('CREATE TABLE IF NOT EXISTS locais_extras(pesquisaID integer, localEstado integer, localCidade integer, localBairroComu text, localBairroComuZona integer ) ')
                tx.executeSql('CREATE TABLE IF NOT EXISTS coletas_extras(pesquisaID integer, localBairroComu text, coletaRespostas text) ')

            }, function (error) {
               // alert('Erro DB Create: ' + error.message)
                model.cAlert(error.message, 'error', 2500, true)
                model.loading('close')

            }, function () {
                $('.infopage .consolelog').html('Banco iniciado')
            }
        )
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



    // popTbLocais: function () {

    //     model.cAlert('Sincronizando locais', 'success', 1500)
    //     model.loading('open')

    //     model.getLocais(function(res){

    //         if(res.error){
    //             model.loading('close')
    //             model.cAlert('Erro ao resgar locais', 'error', 5000)
    //             model.sendLog($.now() + ' ' + res.message)
    //             console.log(res.message)

    //         }else{  
    //             model.loading('close')
    //             //console.log(res.locais)

    //             // $.each(res.locais, function (tbName, items) {

    //             //     $.each(items,function(k,item) {

    //             //         if (tbName == 'locais_estados') {
    //             //             item._id = 'le_' + item.estadoID
    //             //         }

    //             //         if (tbName == 'locais_cidades') {
    //             //             item._id = 'lc_' + item.cidadeID
    //             //         }

    //             //         if (tbName == 'locais_bairros_comunidades') {
    //             //             item._id = 'lbc_' + item.bairroComuID
    //             //         }

    //             //         openDb.put(item)
    //             //         .then(function (response) {
    //             //             // handle response
    //             //         }).catch(function (err) {
    //             //             //console.log(err);
    //             //         });

    //             //     })

    //             // }) 

    //         }

    //     })

    // },

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

    // coleta: function(dados,callback){
        
    //     localDb.transaction(function (tx) {

    //         tx.executeSql("SELECT * FROM pesquisas WHERE pesquisaID=? ",
    //             [dados.pesquisaId],
    //             function (tx, rs) {

    //                 return callback({error:false,pesquisa:rs.rows})

    //             }, function (error) {

    //                 return callback({error:true,message:error.message})

    //             })

    //     }, function (error) {
 
    //     }, function () {
 
    //     })

    // },

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









var dbTeste = {

    init: function () {

        // model.cAlert('Iniciando tabelas', 'info', 500)
        // model.loading('open')

        this.initTables()
    },

    initTables: function () {

        localDb.transaction(

            function (tx) {

                tx.executeSql('CREATE TABLE IF NOT EXISTS pesquisas(pesquisaID integer, pesquisaNome text, pesquisaStatus integer, dados longtext ) ')
                //tx.executeSql('CREATE TABLE IF NOT EXISTS pesquisas_locais(pesquisaID integer, estadoID integer, cidadeID integer, bairroComuID text, coletorLocalID integer , numMinColetas integer  ) ')
                tx.executeSql('CREATE TABLE IF NOT EXISTS coletas(pesquisaID integer, coletorLocalID integer, bairroComuID integer, coletaRespostas text) ')

                tx.executeSql('CREATE TABLE IF NOT EXISTS locais_extras(pesquisaID integer, localEstado integer, localCidade integer, localBairroComu text, localBairroComuZona integer ) ')
                tx.executeSql('CREATE TABLE IF NOT EXISTS coletas_extras(pesquisaID integer, localBairroComu text, coletaRespostas text) ')

            }, function (error) {
                alert('Erro DB Create: ' + error.message)
                model.loading('close')

            }, function () {
                //model.cAlert('Tabelas iniciadas', 'info', 500)
            }
        )
    },

    syncTbPesquisas: function (callback) {

        var $this = this

        model.getPesquisas(function (res) {

            if (res.error) {

                return callback({ error: true, message: res.message })

            } else {

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
                    return callback({ error: false })
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
                }
            )

        }, function (error) {
            console.log('Erro na transação Nova Pesquisa ' + error.message)

        }, function () {

        })
    },



    // popTbLocais: function () {

    //     model.cAlert('Sincronizando locais', 'success', 1500)
    //     model.loading('open')

    //     model.getLocais(function(res){

    //         if(res.error){
    //             model.loading('close')
    //             model.cAlert('Erro ao resgar locais', 'error', 5000)
    //             model.sendLog($.now() + ' ' + res.message)
    //             console.log(res.message)

    //         }else{  
    //             model.loading('close')
    //             //console.log(res.locais)

    //             // $.each(res.locais, function (tbName, items) {

    //             //     $.each(items,function(k,item) {

    //             //         if (tbName == 'locais_estados') {
    //             //             item._id = 'le_' + item.estadoID
    //             //         }

    //             //         if (tbName == 'locais_cidades') {
    //             //             item._id = 'lc_' + item.cidadeID
    //             //         }

    //             //         if (tbName == 'locais_bairros_comunidades') {
    //             //             item._id = 'lbc_' + item.bairroComuID
    //             //         }

    //             //         openDb.put(item)
    //             //         .then(function (response) {
    //             //             // handle response
    //             //         }).catch(function (err) {
    //             //             //console.log(err);
    //             //         });

    //             //     })

    //             // }) 

    //         }

    //     })

    // },

    todasPesquisas: function (callback) {

        localDb.transaction(function (tx) {

            tx.executeSql("SELECT * FROM pesquisas WHERE pesquisaStatus=?", [2], function (tx, rs) {

                return callback({ error: false, data: rs })

            }, function (error) {

                return callback({ error: true, message: 'Erro na consulta: ' + error.message })
            })

        }, function (error) {

            return callback({ error: true, message: 'Erro na transação: ' + error.message })

        }, function () {

        })

    },


    pesquisa: function (pesquisaId, callback) {

        localDb.transaction(function (tx) {

            tx.executeSql(
                "SELECT * FROM pesquisas WHERE pesquisaID=?",
                [pesquisaId],

                function (tx, rs) {

                    var pesquisa = JSON.parse(rs.rows[0].dados)
                    return callback({ error: false, data: pesquisa })
                },
                function (tx, error) {

                    //console.log('Erro consulta listaLocais : ' + error.message)
                }
            )
        }, function (error) {
            console.log('Erro transação pesquisa: ' + error.message)
            return callback({ error: false, message: error.message })
        }, function () {

        })
    },

    countColetas: function (local, callback) {

        var pesquisaId = local.pesquisaId, bairroId = local.bairroId

        localDb.transaction(function (tx) {

            tx.executeSql(
                "SELECT * FROM coletas WHERE pesquisaID=? AND bairroComuID=?",
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
                    return callback({ error: false, message: error.message })
                    console.log('Erro consulta listaLocaisExtra : ' + error.message)
                }
            )
        }, function (error) {
            console.log('Erro transação lista Locais Extra: ' + error.message)
            return callback({ error: false, message: error.message })
        }, function () {

        })
    },

    coleta: function (dados, callback) {

        localDb.transaction(function (tx) {

            tx.executeSql("SELECT * FROM pesquisas WHERE pesquisaID=? ",
                [dados.pesquisaId],
                function (tx, rs) {

                    return callback({ error: false, pesquisa: rs.rows })

                }, function (error) {

                    return callback({ error: true, message: error.message })

                })

        }, function (error) {

        }, function () {

        })

    },

    fechaColeta: function (coleta, callback) {

        if (coleta.coletorLocalId) { //se é uma coleta normal

            localDb.transaction(

                function (tx) {

                    tx.executeSql(
                        "INSERT INTO coletas VALUES (?,?,?,?)",
                        [coleta.pesquisaId, coleta.coletorLocalId, coleta.bairroComuId, coleta.respostas],
                        function (tx, rs) {

                            return callback({ error: false })

                        }, function (error) {

                            return callback({ error: true, message: error.message })

                        }
                    )

                }, function (error) {
                    return callback({ error: true, message: error.message })

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

                            return callback({ error: true, message: error.message })

                        }
                    )

                }, function (error) {
                    return callback({ error: true, message: error.message })

                }, function () {

                })

        }
    },

    
}