var model = {

    ApiUrl: ()=>{

        if (device.platform == 'browser') {
            
            return 'http://localhost/ellobeta/api/rs/'
        }

        if (device.platform == 'Android') {
 
            return 'https://ellobeta.com/api/rs/'
        }
    },
    
    // FUNCTIONS
    ajax: (type, action, data, callback)=>{

        $.ajax({
            type: type,
            url: model.ApiUrl() + action,
            data: data,
            dataType: 'json',
            crossDomain: true,
            success:  (data)=>{
                return callback(data)
            },
            error:  (data)=>{
                return callback({ error: true, data: data })
            }
        })
        
    },
    connection:  ()=>{
        console.log(navigator)

        var networkState = navigator.onLine

        return networkState
    },
    openPage:  (page, back = false)=>{

        $('body').find('.page').addClass('hidden')

        $('#' + page).removeClass('hidden')

        controller.initPages()

        if (back) {
            //$('#' + page + ' .corpo').removeClass('slideInRight').addClass('slideInLeft')

        } else {
            //$('#' + page + ' .corpo').removeClass('slideInLeft').addClass('slideInRight')
        }

        //se volta não guarda no histórcio
        if (back == false) {
            if (page == 'sync') {
                historico = []
            } else {
                if (page != 'coleta') {

                    if (historico[historico.length - 1] != page) {
                        historico.push(page)
                    }
                }
            }
        }

        if (page == 'coleta') {

            init.back(false)
            document.removeEventListener("backbutton", init.onBackKeyDown, false);
        } else {
            document.addEventListener("backbutton", init.onBackKeyDown, false);
        }

        //init.modoSync()
    },
    loading:  (action)=>{

        if (action == 'open') {
            $('.loading').removeClass('hidden').show()
        }

        if (action == 'close') {
            $('.loading').addClass('hidden').hide()
        }

    },
      
    sendLog:  (log)=>{

        $('.infopage .consolelog').html(log)

        $.post(url + 'log', { message: log },  (dt) =>{

            alert('Log enviado')
        })

    },
    htmlLog: (log)=>{

        $('.page').not('.hidden').append('<div class="">'+JSON.stringify(log)+'</div>')
    },

    refreshToken:  ()=>{

        model.ajax('post', 'device/?dispId=' + localStorage.getItem('dispId'), { deviceNotifReg: registrationID },  (res) =>{

            if (res.error) {
                console.log(res)
                model.htmlLog(res)
                alert('Erro na autenticação')
                M.toast({ html: 'Erro na autenticação Refresh' })
            } else {
                console.log(res.message)
            }
        })
    },

    homologa:  ()=>{

        model.loading('open')

        if (!model.connection()) {
            
            M.toast({ html: 'Verifique a internet' })
            model.loading('close')
            return 
        }

        var dados = $('#form-homologa').serializeJSON()

        if (dados.empresaCnpj == null) {
            M.toast({ html: 'Informe o CNPJ por favor' })
            return
        }


        localStorage.setItem('empresaCnpj',dados.empresaCnpj)

        var params = '/?deviceId=' + deviceID + '&empresaCnpj=' + dados.empresaCnpj
        
        model.ajax('get', 'homologa'+params, '', (res)=>{
             
            if(res.error){
                console.log(res.data)
                
                M.toast({ html: res.data.responseJSON.message })
                if(res.data.status == 400 ){
                    localStorage.setItem('homologaStatus', res.data.responseJSON.status)
                }
                model.loading('close')
                                                
            }else{
                console.log(res )
                M.toast({ html: res.message })
                if(res.status == null ){
                    model.execHomologa()
                }else{
                    localStorage.setItem('homologaStatus',res.status)
                }

                model.loading('close')
            }
        })     

    },   

    execHomologa: ()=>{ 
        model.loading('open') 

        M.toast({ html: 'Iniciando homologação' })

        console.log('Internet ' + model.connection())

        if (!model.connection()) {

            M.toast({ html: 'Verifique a internet' })
            model.loading('close')            
        }

        var dados = $('#form-homologa').serializeJSON()
        
        if (dados.empresaCnpj == null){
            M.toast({ html: 'Informe o CNPJ por favor' })
            return
        }
        
        var post = { deviceId: deviceID, deviceNotifReg: localStorage.getItem('registrationId'), empresaCnpj: dados.empresaCnpj }

            model.ajax('post','homologa',post , (res)=>{
                 
                if (res.error) {

                    console.log(res.data)     
                    
                    M.toast({ html: res.data.responseJSON.message })
                        
                } else {
                    console.log(res)
 
                    localStorage.setItem('dispId',res.dispId)
                    M.toast({ html: res.message })
  
                }

            })
    },

    executePush: (data)=>{

        const type = data.additionalData.type
        
        switch (type) {
            case 'switchStatus':
                model.switchStatus(data)
                break;
        
            default:
                break;
        }
    },

    switchStatus: (data)=>{      
        
        localStorage.setItem('homologaStatus', data.additionalData.status)

        if (data.additionalData.status == 2){
            model.syncBD()
        }

        if (data.additionalData.status != 2) {
            model.sair()
        }

        M.toast({ html: data.message })
        controller.pageHomologacao()
    },

    syncBD: ()=>{
        model.loading('open')

        model.ajax('get','base?empresaCnpj='+localStorage.getItem('empresaCnpj'),'', (res)=>{
            
            if(res.error){
                alert('Erro sync DB')
            }
            else{
                
                if(res.content){
                    db.initTables(res.content)
                    model.loading('close')
                }
            }
        })
    },

    login: ()=>{

        model.loading('open')

        var credenciais = $('#form-login').serializeJSON()
        
        db.login(credenciais, (rs)=>{
             
            if(rs.error){
                M.toast({ html: rs.message })
            }else{
                model.openPage('pedidos')
            }

        })

    },
    sair: () => {

        // if (typeof cordova !== 'undefined') {
        //     if (navigator.app) {
        //         navigator.app.exitApp()
        //     }
        //     else if (navigator.device) {
        //         navigator.device.exitApp()
        //     }
        // } else {
        //     window.close();
        //     $timeout(function () {
        //         self.showCloseMessage = true
        //     })
        // }

        localStorage.setItem('user_log', false)
        model.openPage('login')
    },

    novoPedido: () => {
        let pedido = {
            pedidoId: $.now(),
            representanteCod: JSON.parse(localStorage.getItem('user_log')),
        }

        localStorage.setItem('pedido', JSON.stringify(pedido))

        console.log(JSON.parse(localStorage.getItem('pedido')))
        model.openPage('clientes')
    },

    buscaCliente: ()=>{

        model.loading('open')

        let params = $('form#busca-cliente').serializeJSON()
        
        if ($('#filters').is(':visible')) {
            $('#filters').addClass('hidden')
        }

        db.getCliente(params, (res)=>{

            console.log(res)
            model.loading('close')
        })

    },

    addClientePedido: ()=>{

    },

    addProdutoPedido: ()=>{

    },

    pagePedidos: ()=>{

        model.loading('close')

    },


    //AREA DE PRODUTOS
    pageProdutos: ()=> {

        $('.loading').show()
        app.prodList()

        var table = $('#table-prod').DataTable();
        $('#table-prod').on('click', 'tr', function () {
            table.rows().deselect();
            var prodId = table.row($(this)).select().id()

            app.prodEdit(prodId)
        })


        $('.loading').hide()

    },
    prodList: function () {

        $('#table-prod').DataTable({
            ajax: {
                url: site + 'produtos',
                dataSrc: 'data',
                type: "GET",
            },

            columnDefs: [{
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }],
            select: true,
            rowId: 'prodId',
            columns: [
                { data: "prodId" },
                { data: "prodCod" },
                { data: "prodEAN" },
                { data: "prodNome" },
                { data: "prodPreco" },
                { data: "prodCateg" }
            ]
        })
    },
    prodInsert: function () {
        $('.loading').show()
        var form = $('form#prod-insert'), action = form.attr('action'), data = form.serializeJSON(), save = true

        if (data.prodId) {
            action = action + '?prodId=' + data.prodId
        }

        form.find('input').each(function () {

            if ($(this).attr('required') && $(this).val() == '') {
                $(this).css('border-color', 'red').addClass('required')
                save = false
            } else {
                $(this).css('border-color', 'rgba(0,0,0,.15)').removeClass('required')
            }
        })


        if (save) {
            model.ajax('POST', action, data, function (res) {
                if (res.error) {
                    alert('Erro ao inserir')
                    $('.loading').hide()
                } else {

                    form
                        .not(':button, :submit, :reset, :hidden')
                        .val('')
                        .removeAttr('checked')
                        .removeAttr('selected');

                    //app.pageProdutos()

                    $('#table-prod').DataTable().ajax.reload()
                    $('.loading').hide()
                }
            })
        } else {
            $('.loading').hide()
        }
    },
    prodEdit: function (prodId) {

        app.ajax('GET', 'produtos?prodId=' + prodId, '', function (res) {
            if (res.error) {
                console.log(res.data)
            } else {

                $('#prod-insert').find('input').each(function () {
                    var inputForm = $(this)

                    $.each(res, function (k, i) {
                        if (inputForm.attr('name') == k) {
                            inputForm.val(i)
                        }
                    })
                })
            }
        })

    },









    getLocais: function (callback) {     
        
        if (model.connection()) {

            return callback({ error: true, message: 'Verifique a internet' })
        }

        $.get(url + 'locais/' + deviceID, function (data) {

            return callback({error:false,locais:data})          
        })
        .fail(function (data) {

            return callback({ error: true, data: JSON.stringify(data)})
        })

    },

    getPesquisas: function (callback) {

        if(this.connection() ){

            return callback({ error: true, message:'Verifique a internet' })
        }

        $.get(url + 'syncdown/' + deviceID, function (res) {

            return callback({ error: false, data:res })

        }, 'json')
        .fail(function (data) {

            console.log(data)

            return callback({ error: true, message: data.responseJSON })
        })
    },

    //UPLOAD
    uploadPesquisas: function(pesquisaId){

        if (this.connection()) {
            model.cAlert('Upload não realizado', 'error', 5000)

            return //callback({ error: true, message: 'Verifique a internet' })
        }

        model.loading('open')
            
        db.upColetas(pesquisaId,function(data){

            if(data.error){
                model.sendLog($.now() + ' ' + JSON.stringify(data.message))
            }
            else{

                var pesquisaId = localStorage.getItem('pesquisaID'),
                    bairro = localStorage.getItem('bairroComuID'),
                    //idColetorLocal = localStorage.getItem('coletorLocalID'),
                    dados = JSON.parse(localStorage.getItem('up_pesquisas') ),
                    extra = JSON.parse(localStorage.getItem('up_pesquisasExtra'))

                var campos = { deviceID: deviceID, pesquisaID: pesquisaId, coletas: dados, coletasExtra: extra}

                $.post(url + 'syncup/' + deviceID, campos, function (res) {
                    console.log(res)

                    if (res.status == false) {

                        model.cAlert(res.message, 'error', 5000, true)
                    }

                    if (res.status == true) {

                        model.cAlert(res.message, 'success', 5000)

                    }

                    model.loading('close')
                },'json')
                .fail(function (e) {
                    model.loading('close')
                    model.cAlert('Upload não realizado: ' + JSON.stringify(e), 'error', 5000, true)
                    console.log(JSON.stringify(e))
                })

            }

        })            
    },

    listaPesquisas: function () {       

        db.todasPesquisas(function (res) {
            if (res.error) {
                model.cAlert(error.message, 'error', 5000)
                console.log(error.message)
            }else{
                view.listaPesquisas(res.data)
            }
        })
        
    },
    syncPesquisas: function(){
        model.cAlert('Sinc Pesquisas', 'success', 1500)
        model.loading('open')

        db.syncTbPesquisas(function(res){
            if(res.error){
                model.cAlert(res.message, 'error', 1500, true)
                model.loading('close')
            }else{
                controller.pesquisas()
                navigator.vibrate(300)
                model.loading('close')
            }
        })
    },  

    listaLocais: function(){

        var pesquisaId = localStorage.getItem('pesquisaID')

        //model.cAlert('Sinc Pesquisas', 'success', 1500)
        model.loading('open')

        db.pesquisa(pesquisaId,function(res){
            if(res.error){
                model.cAlert(res.message, 'error', 1500, true)
                model.loading('close')
            }else{
                view.pesquisaLocais(res.data)
                model.loading('close')
            }
        })
    },

    processaLocais: function(callback){
        var pesquisaId = localStorage.getItem('pesquisaID')

        db.pesquisa(pesquisaId,function(rs){
            if(rs.error){
                model.cAlert(rs.message, 'error', 1500)
                model.loading('close')
                return callback({error:true})

            }else{

                var rows =  rs.data.locais 
                var len = rows.length 

                $.each(rows,function(i,row){
                    var pesquisaId = localStorage.getItem('pesquisaID'), bairroId = row.bairroComuID, coletorLocalId = row.coletorLocalID
    
                    db.countColetas({ pesquisaId, bairroId, coletorLocalId }, function (res) {
    
                        row.numColetasFeitas = res.numColetasFeitas
    
                        if(row.bairroComuZona == 2 ){
                            row.bairroComuZona = 'Zona Rural' 
                        }else{
                            row.bairroComuZona = 'Zona Urbana'
                        }

                        localStorage.setItem(row.coletorLocalID , JSON.stringify(row)) //colocando o vinculo do coletor com os dados do local no storage
                        
                    })
                })
                
                return callback({error:false})
            }
        })
    },


    abreLocal: function () {

        var pesquisaId = localStorage.getItem('pesquisaID'),
            bairroId = localStorage.getItem('bairroComuID'),
            coletorLocalID = localStorage.getItem('coletorLocalID') //coloca o coletor pra identificar se é uma coleta extra ou não
        
        db.pesquisa(pesquisaId, function (res) {
            if (res.error) {
                model.cAlert(res.message, 'error', 1500)
                model.loading('close')
            } else {

                model.processaLocais(function(rs){

                    if(rs.error == false){
               
                        var local = JSON.parse( localStorage.getItem(coletorLocalID ) )             
    
                        $('#local .nomepesquisa').text(res.data.pesquisaNome)
                        $('#local .nomedobairro').text(local.bairroComuNome)
                        $('#local .zona').text(local.bairroComuZona)
                        $('#local .numcoletas').text(local.numColetasFeitas)
                        
                        if (local.numColetasFeitas >= local.numMinColetas) {
                            navigator.notification.confirm('Quantidade mínima de coletas alcançada', function(confirm){
                                if (confirm == 1) {
                                    model.openPage('local')                      
                                    
                                }else{
                                    return 
                                }
                            }, ['Coletas'], ['Sim', 'Cancelar'])                     
                        }
                        else{
                            model.openPage('local')
                        }
                    }

                })
                
            }
        })        
    },

    listaLocaisExtra: function () {

        db.listaLocaisExtra(function (res) {
            if (res.error) {
                model.cAlert(res.message, 'error', 1500)
                model.loading('close')
            } else {
                view.pesquisaLocaisExtra(res.data)
                model.loading('close')
            }
        })
    },

     
    addLocalExtra: function(){

        navigator.notification.confirm('Deseja inserir um local extra?', function (confirm) {

            if (confirm == 1) {
               
                var dados = $('#novolocal form').serializeJSON()
                
                db.addLocalExtra(dados, function(rs){
                    if(rs.error){
                        model.cAlert(rs.message,'error',1500)
                    }else{
                        model.cAlert(rs.message,'success',1500)
                        $('#novolocal').modal('hide')
                        controller.pesquisaLocais()
                    }
                })
            }
        },
        ['Novo local'], ['Sim', 'Cancelar'])

    },

    processaLocaisExtra: function(callback){
        var pesquisaId = localStorage.getItem('pesquisaID')

        db.pesquisa(pesquisaId,function(rs){
            if(rs.error){
                model.cAlert(rs.message, 'error', 1500)
                model.loading('close')
                return callback({ error: true })
            }else{

                var rows =  rs.data.locais 
                var len = rows.length 

                $.each(rows,function(i,row){
                    var pesquisaId = localStorage.getItem('pesquisaID'), localBairroComu = row.localBairroComu, coletorLocalId = null

                    db.countColetas({ pesquisaId, localBairroComu,coletorLocalId}, function (res) {
                        
                        row.numColetasFeitas = res.numColetasFeitas

                        if (row.bairroComuZona == 2) {
                            row.bairroComuZona = 'Zona Rural'
                        } else {
                            row.bairroComuZona = 'Zona Urbana'
                        }
                       
                        //localStorage.setItem(localBairroComu, JSON.stringify(row))
                        return callback({ error: false })
                    })
                })  
            }
        })
    },

    abreLocalExtra: function () {

        var pesquisaId = localStorage.getItem('pesquisaID'),
            bairroId = localStorage.getItem('bairroComuID')
       
        //coletorLocalID = localStorage.getItem('coletorLocalID') coloca o coletor pra identificar se é uma coleta extra ou não

        db.pesquisa(pesquisaId, function (res) {
            if (res.error) {
                model.cAlert(res.message, 'error', 1500)
                model.loading('close')
            } else { 
                
                model.processaLocaisExtra(function(rs){                 

                    if(rs.error == false){
                        var local = JSON.parse(localStorage.getItem(bairroId))

                        console.log(local)
                                                
                        $('#local .nomepesquisa').text(res.data.pesquisaNome)
                        $('#local .nomedobairro').text(local.localBairroComu)
                        $('#local .zona').text(local.localBairroComuZona)
                        $('#local .numcoletas').text(local.numColetasFeitas)

                        model.openPage('local')
                    }
                })                
            }
        })
    },


    // COLETAS 

    cron: function(){
        
        function getSecs( sMins , sSecs ) {

            sSecs++;

            if (sSecs === 60) {

                sSecs = 0 
                sMins++ 
            } 
            if (sMins === 60) {

                sMins = 0 
                // sHors++ 
            }
            if (sSecs <= 9) {

                sSecs = String("0" + sSecs) 
            }

            if (sMins <= 9) {

                sMins = str_pad(sMins, 1, "0", STR_PAD_LEFT);

            }
            
            console.log(sMins + ' - ' + sSecs)

            //$('.cronometro').text( sMins + ":" + sSecs )

            setTimeout(function(){
                getSecs( sMins , sSecs )
            }, 1000);
        }

        getSecs('00','00' )
    },


    forms: function () {

        $('#respostas textarea').on('keyup', function () {

            if ($(this).val().length > 0) {
                $(this).parents('#respostas').find('input[type="radio"]').prop('checked', false)
            }
        })

        $('#respostas input[type="radio"').on('click', function () {

            $(this).parents('#respostas').find('textarea').val('')

        })
    },

    novaColeta: function () {
 
        navigator.notification.confirm('Deseja iniciar uma nova coleta?', function(confirm){
            if (confirm == 1) {

                model.abrirColeta()
            }
        }, ['Nova coleta'], ['Sim', 'Cancelar'])
    },

    abrirColeta: function(){    
        init.localizacao()
        var pesquisaId = localStorage.getItem('pesquisaID')

        db.pesquisa(pesquisaId,function(res){

            if(res.error){
                console.log(res.error.message)
            }else{
                var dados = res.data

                if (dados.questoes.length == 0) {
                    alert('Não existem perguntas na pesquisa')
                    return
                }
                
                view.coleta(dados)
                model.forms()
                document.removeEventListener("backbutton", () => {}, false);
                init.back(false)
                model.openPage('coleta')
                          
            }
        })        
    },
    roleMais: function(item){
    
        var roleMais = {}
        roleMais.alturaItem = item.height()
        roleMais.windowHeight = $(window).height()

        if (roleMais.alturaItem > roleMais.windowHeight ) {
            
            item.parent().find('.role-mais').show()

            $('#coleta').scroll(function () {

                var scrollBottom = $('#coleta').scrollTop() + roleMais.windowHeight - 160
 
                roleMais.scrollBottom = scrollBottom

                if (scrollBottom >= roleMais.alturaItem) {
                    item.parent().find('.role-mais').hide()
                } else {
                    item.parent().find('.role-mais').show()
                }
                console.log(roleMais)
            })

        }else{
            item.parent().find('.role-mais').hide()
        }

        console.log(roleMais)      
    },
    prevColeta: function (questaoFocus) {
         
        var current = $('#coleta form fieldset#' + questaoFocus)
        var prev = current.prev()
        current.hide()
        prev.show()
        
        model.roleMais(prev)
    },

    nextColeta: function (questaoFocus) {

        event.preventDefault()
        $('#coleta').animate({ scrollTop: 0 }, "fast")
        var current = $('#coleta form fieldset#' + questaoFocus)
        var next = current.next()

        //var liberado =  this.validaQuestao(current)

        this.validaQuestao(current,function(liberado){
            
            if (liberado == 0) {

                model.cAlert('Resposta obrigatória', 'error', 5000)

            } else {

                current.hide()
                next.show()              
                
                model.roleMais(next)
            }
        })
    },

    finalizarColeta: function (questaoFocus) {
        var current = $('#coleta form fieldset#' + questaoFocus)
        //var liberado = this.validaQuestao(current)

        this.validaQuestao(current, function(liberado){

            if (liberado == 0) {

                model.cAlert('Resposta obrigatória', 'error', 5000)

            }else{
                
                navigator.notification.confirm('Gravar coleta e finalizar?', function(confirm){

                    if (confirm == 1) {
                        model.loading('open')
                        model.cAlert('Coletando localização', 'info',500)

                        var form = $('#coleta #questoes form'),
                            deviceLocation = localStorage.getItem('deviceLocation')

                        form.each(function () {
                            $(this).append(' <input type="hidden" name="timeFim" value="' + new Date().getTime() + '">')
                            $(this).append(' <input type="hidden" name="rastreamento" value="'+ deviceLocation +'">')
                        })

                        var pesquisaId = localStorage.getItem('pesquisaID'),
                            bairroComuId = localStorage.getItem('bairroComuID'),
                            coletorLocalId = localStorage.getItem('coletorLocalID'),
                            respostas = JSON.stringify(form.serializeJSON()) // classe do plugin serialize json
                            
                            db.fechaColeta({pesquisaId,bairroComuId,coletorLocalId,respostas}, function(res){

                                if(res.error){
                                    model.cAlert('Erro ao fechar coleta:'+ res.message, 'error', 2500, true)
                                    model.loading('close')
                                }
                                else{
                                     
                                    if(coletorLocalId){ //se existe nao é uma pesquisa extra
                                        model.listaLocais()
                                        controller.pesquisaLocal()
                                    }else{
                                        model.listaLocaisExtra()
                                        controller.pesquisaLocalExtra(false)
                                    }
                                    
                                    model.loading('close')
                                    model.cAlert('Coleta finalizada', 'success', 1000)
                                }
                            })


                    }

                }, ['Finalizar coleta'], ['Sim', 'Cancelar'])
            }
        })
    },
 
    validaQuestao: function (current,callback) {

        var liberado = 0

        if (current.data('required') == true) {

            if (current.data('tipo') == 'radio') {

                current.find('input').each(function (index, rs) {

                    var checked = $(this).prop('checked')

                    if (checked) {

                        liberado = liberado + 1

                    }

                })

            }

            if (current.data('tipo') == 'checkbox') {

                current.find('input').each(function () {

                    var checked = $(this).prop('checked')

                    if (checked) {

                        liberado = liberado + 1
                    }


                })

            }

            if (current.data('tipo') == 'espontanea') {

                current.find('textarea').each(function () {

                    var value = $(this).val()

                    if (value != '') {

                        liberado = liberado + 1
                    }

                })

            }

            if (current.data('tipo') == 'mista') {

                current.find('textarea').each(function () {

                    var value = $(this).val()

                    if (value != '') {

                        liberado = liberado + 1

                    } else {

                        current.find('input').each(function () {

                            var checked = $(this).prop('checked')

                            if (checked) {

                                liberado = liberado + 1
                            }

                        })
                    }

                })

            }

        } else {

            liberado = 1

        }

        return callback(liberado)
    },

    
    cancelaColeta: function(){
         
        navigator.notification.confirm('Os dados coletados serão perdidos. Tem certeza?', function(confirm){

            if(confirm == 1){
                document.addEventListener("backbutton", init.onBackKeyDown, false);
                model.openPage('local')
            }
        },['Cancelar Coleta'],['Sim','Não'])
    },
    limpaBase: ()=>{
        
        var inputs = $('#limpabase form').serializeJSON()

        if(inputs.senha == ''){
            model.cAlert('Digite sua senha', 'error', 1500)
            return
        }

        if (inputs.senha != 85460022) {

            model.cAlert('Senha incorreta', 'error', 1500)
            return
        }

        navigator.notification.confirm('Processo irreverssível. Tem certeza?', function(confirm){

            if(confirm == 1){
                                    
                model.loading('open')
                db.limpaBase(function(res){
                    if(res.error){
                        model.loading('close')
                        model.cAlert(res.message, 'error', 1800, true)
                         
                    }else{
                        model.loading('close')
                        model.cAlert(res.message, 'success', 1800)
                        location.reload(); 
                    }
                })
            } 
            
            $('#limpabase').modal('hide')
             
        })
    }
     
}