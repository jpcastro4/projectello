var view = {
	
	listaPesquisas: function(rs){
        $('body').find('#load-pesquisas').html('')

        var rows =  rs.rows,
            len = rows.length

        for(var i = 0; i < len; i++){
            
            $('body').find('#load-pesquisas').append('<div class="card mb-3 animated flipInX" style="background-color:#fff; border:none; animation-delay:0.'+i+'s">'+
                '<div class="card-block text-center font-black" >'+
                    '<h4 class="card-title font-black">' + rows[i]['pesquisaNome'] +'</h4>'+
                    //'<hr class="row">'+
                '</div >' +
                '<div class="card-footer text-center" >'+
                    '<div class="row">'+
                    '<button class="col-6 " style="border-right:1px solid rgba(0,0,0,.125)" onclick="controller.uploadPesquisas(' + rows[i]['pesquisaID'] +')" ><small> <i class="fa fa-cloud-upload"></i> Upload</small>'+
                    '</button>'+
                    '<button class="col-6" onclick="controller.pesquisaLocais(' + rows[i]['pesquisaID'] +')" ><small> <i class="fa fa-sign-in"></i> Acessar </small>' +
                    '</button>' + 
                    '</div>'+
                '</div>'+               
                '</div >')
        }
                    
        if(len == 0){

            $('body').find('#load-pesquisas').append('<div class="alert alert-info text-center">Não há pesquisas na base</div>')
        }

    },
    

    pesquisaLocais: function(rs){

        $('.nomepesquisa').text(rs.pesquisaNome)

        $('body').find('#load-locais').html('')
 
        var rows =  rs.locais ;
        var len = rows.length;
        
        $('body').find('#load-locais').append('<li class="list-group-item justify-content-between bg-black-md2 font-white" > <h6>Bairros e comunidades</h6> <small>' + len + ' ' + pluralize(len, 'loca', 'l', 'is') +' </small></li>')

        if(len == 0){
            
            $('body').find('#load-locais').append('<li class="list-group-item justify-content-between disabled">Não existem locais</li>')
        }
        else{        

            $.each(rows,function(i,row){
                var pesquisaId = localStorage.getItem('pesquisaID'), bairroId = row.bairroComuID, coletorLocalId = row.coletorLocalID

                db.countColetas({ pesquisaId, bairroId, coletorLocalId }, function (res) {

                    row.numColetasFeitas = res.numColetasFeitas

                    if(row.bairroComuZona === 2 ){
                        row.bairroComuZona = 'Zona Rural' 
                    }else{
                        row.bairroComuZona = 'Zona Urbana'
                    }
                    
                    localStorage.setItem(row.coletorLocalID , JSON.stringify(row)) //colocando o vinculo do coletor com os dados do local no storage

                    var percentual = (res.numColetasFeitas * 100) / row.numMinColetas
                    //row.numMinColetas = row.numMinColetas - res.numColetasFeitas

                    $('body').find('#load-locais').append('<a href="#" class="list-group-item justify-content-between animated flipInX" style="animation-delay:0.' + i +'s1"; background: -webkit-linear-gradient(right, #FFFFFF  0%, #FFFFFF ' + percentual + '%, #FFFFFF ' + Math.abs(Number(percentual - 100)) + '%, #d4d8dc ' + Math.abs(Number(percentual - 100)) +'%, #d4d8dc 100%);" id="' + row.bairroComuID + '" onclick="controller.pesquisaLocal(' + row.bairroComuID + ',' + row.coletorLocalID + ')"><span class="nomebairro">' + row.bairroComuNome + '</span><span class="badge badge-default badge-pill">' + row.numMinColetas + '</span><span class="badge badge-success badge-pill">' + res.numColetasFeitas + '</span></a>')
                })
            })
        }
    },

    pesquisaLocaisExtra: function(rs){
        
        $('body').find('#load-locais-extras').html('')
        
        var rows =  rs.rows;
        var len = rows.length;

        $('body').find('#load-locais-extras').append('<li class="list-group-item justify-content-between bg-black-md2 font-white" > <h6>Locais Extra</h6> <small>' + len + ' ' + pluralize(len, 'loca', 'l', 'is') + ' </small></li>')
        
        if( len == 0 ){
            $('body').find('#load-locais-extras').append('<li class="list-group-item justify-content-between disabled">Não existem locais</li>')
        }
        else{
           
            $.each(rows, function (i, row) {

                var itemId = i+1
                
                var pesquisaId = localStorage.getItem('pesquisaID'), localBairroComu = row.localBairroComu, coletorLocalId = null

                db.countColetas({ pesquisaId, localBairroComu,coletorLocalId}, function (res) {
                    
                    row.numColetasFeitas = res.numColetasFeitas

                    if (row.localBairroComuZona == 2) {
                        row.localBairroComuZona = 'Zona Rural'
                    } else {
                        row.localBairroComuZona = 'Zona Urbana'
                    }
            
                    localStorage.setItem(localBairroComu, JSON.stringify(row))

                    $('body').find('#load-locais-extras').append('<a class="list-group-item justify-content-between animated flipInX" style="animation-delay:0.' + i + '1s";" id="' + itemId + '" onclick="controller.pesquisaLocalExtra(' + itemId + ')" data-bairro="' + row.localBairroComu + '"><span class="nomebairro">' + row.localBairroComu + '</span><span class="badge badge-success badge-pill">' + row.numColetasFeitas + '</span></a>')
                })

                
            })

        }

        $('body').find('#load-locais-extras').append('<button class="list-group-item text-center" data-toggle="modal" data-target="#novolocal" ><small><i class="fa fa-plus-circle pr-2"></i> Adicionar local extra</small></button>')        

    },

    coleta: function(pesquisa){

        //total = questoes.questoes.length
        $('#coleta #questoes').html('')
        $('#coleta #questoes').append('<form class="row"></form>')


        $('#coleta .nomepesquisa').text(pesquisa.pesquisaNome)

        var form = $('#coleta #questoes form')

        var num = 1

        $.each(pesquisa.questoes, function (key, q) {

            //SE É OBRIGADORIA
            if (q.questaoObrigatoria == 1) {

                var obrigatoria = 'data-required="true"'
            } else {
                var obrigatoria = 'data-required="false"'
            }

            //TIPO DE QUESTAO
            if (q.tipoResposta == 1) {

                var tipo = 'radio'
            }
            if (q.tipoResposta == 2) {

                var tipo = 'checkbox'
            }
            if (q.tipoResposta == 3) {

                var tipo = 'espontanea'
            }
            if (q.tipoResposta == 4) {

                var tipo = 'mista'
            }

            //SE É A PRIMEIRA QUESTAO IMPRIME SOMENTE BOTÃO NEXT
            if (key == 0) {

                form.append('<fieldset ' + obrigatoria + ' data-tipo="' + tipo + '" id="' + q.questaoID + '" ><div class="col-12"><div class="coleta-questao">' + num + ' - ' + q.questaoEnunciado + '</div><div id="respostas"></div> </div> <div class="row fixed-bottom nav-questoes"><div class="col-12 role-mais text-center">Role a tela para ver mais </div> <button class="btn-next col-12 spr-btn btn-theme text-center" onclick="event.preventDefault();model.nextColeta(' + q.questaoID + ')"> Próxima </button></div> </fieldset>')

            }
            else{

            //SE NÃO IMPRIME OS DOIS
                form.append('<fieldset ' + obrigatoria + ' data-tipo="' + tipo + '" id="' + q.questaoID + '" ><div class="col-12"><div class="coleta-questao">' + num + ' - ' + q.questaoEnunciado + '</div><div id="respostas"></div> </div> <div class="row fixed-bottom nav-questoes"><div class="col-12 role-mais text-center">Role a tela para ver mais </div> <button class="btn-prev col-6 spr-btn btn-theme text-center" onclick="event.preventDefault();model.prevColeta(' + q.questaoID + ')"> Anterior </button> <button class="btn-next col-6 spr-btn btn-theme text-center" onclick="model.nextColeta(' + q.questaoID + ')"> Próxima </button></div> </fieldset>')

            }

            //SE É RADIO
            if (tipo == 'radio') {

                $.each(q.alternativas, function (key, alternativa) {

                    $('#coleta #questoes form fieldset#' + q.questaoID + ' #respostas').append('<div class="list-group-item justify-content-between col-12"><label for="' + alternativa.respostaID + '" ><input type="' + tipo + '" class="option-input ' + tipo + ' " id="' + alternativa.respostaID + '" name="resposta[' + q.questaoID + ']" value="' + alternativa.respostaID + '" />' + alternativa.resposta + '</label></div>')

                })
            }

            //SE PE CHECK   BOX
            if (tipo == 'checkbox') {

                $.each(q.alternativas, function (key, alternativa) {

                    $('#coleta #questoes form fieldset#' + q.questaoID + ' #respostas').append('<div class="list-group-item justify-content-between col-12"><label for="' + alternativa.respostaID + '" ><input type="' + tipo + '" class="option-input ' + tipo + ' " id="' + alternativa.respostaID + '" name="resposta[' + q.questaoID + '][]" value="' + alternativa.respostaID + '" />' + alternativa.resposta + '</label></div>')

                })
            }

            //SE É TEXTO ESPONSATENO
            if (tipo == 'espontanea') {

                $('#coleta #questoes form fieldset#' + q.questaoID + ' #respostas').append('<div class="form-group col-12"><div class="label"> Escreva a reposta do entrevistado</div><textarea class="form-group col-12" name="resposta[' + q.questaoID + ']" ></textarea> </div>')
            }

            //SE É MISTA
            if (tipo == 'mista') {

                $('#coleta #questoes form fieldset#' + q.questaoID + ' #respostas').append('<div class="list-group-item justify-content-between form-group col-12"><div class="label"> Escreva a reposta do entrevistado</div><textarea class="form-group col-12" name="resposta[' + q.questaoID + ']" ></textarea> </div>')

                $.each(q.alternativas, function (key, alternativa) {

                    $('#coleta #questoes form fieldset#' + q.questaoID + ' #respostas').append('<div class="list-group-item justify-content-between form-group col-12"><label for="' + alternativa.respostaID + '" ><input type="radio" class="option-input radio " id="' + alternativa.respostaID + '" name="resposta[' + q.questaoID + ']" value="' + alternativa.respostaID + '" />' + alternativa.resposta + '</label></div>')

                })
            }

            num++

        })

        var ultQuestao = pesquisa.questoes[pesquisa.questoes.length - 1].questaoID

        $('#coleta #questoes form fieldset .btn-next').last().text('Finalizar').attr('onclick', 'event.preventDefault();model.finalizarColeta('+ultQuestao+')')

        //form.append('<input type="hidden" name="pesquisaID" value="'+idPesquisa+'">')

        // if( localStorage.getItem('coletorLocalID') ){
        //     form.append('<input type="hidden" name="coletorLocalID" value="'+localStorage.getItem('coletorLocalID')+'">')
        // }

        //form.append('<input type="hidden" name="bairroComuID" value="'+idBairroComu+'">')
        form.append('<input type="hidden" name="timeInicio" value="' + new Date().getTime() + '">')

    }


}