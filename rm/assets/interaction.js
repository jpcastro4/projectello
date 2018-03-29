var site = 'http://localhost/ellobeta/api/rs/'

var app = {

    initialize: function(){
        $.fn.dataTable.ext.errMode = 'throw';
        localStorage.setItem('empresaId',1)

        this.initPages()
        
        $('#save-prod').on('click', function (e) {
            e.preventDefault()
            app.prodInsert()
        })

        $('button#save-empresa').on('click', function (e) {
           
            e.preventDefault()
            app.empresaInsert()
        })

        $('input.required').on('keyup', function(){
            $(this).css('border-color','rgba(0,0,0,.15)')
        })
    },
    initPages: function(){

        if ($('.page#empresa').is(':visible')) {
            this.pageEmpresa()
        }

        if ($('.page#produtos').is(':visible')) {

            this.pageProdutos()
        }

        if ($('.page#pedidos').is(':visible')) {
            this.pagePedidos()
        }

        if ($('.page#pedido').is(':visible')) {
            this.pagePedido()
        }
    },
    openPage: function(pageId){
        
        $('body').find('.page').each(function(){
            $(this).removeClass('active-page')
        })
        $('#' + pageId).addClass('active-page')

        this.initPages()
    },
    ajax:  function (type, action, data, callback) {

        $.ajax({
            type: type,
            url: site + action,
            data: data,
            dataType: 'json',
            success: function (data) {
                return callback(data)
            },
            error: function (data) {
                return callback({ error: true, data: data })
            }
        })

    },
    pageEmpresa: function () {
        
        this.ajax('get','empresas?empresaId='+localStorage.getItem('empresaId'),'',function(res){
            if(res.error){
                console.log(res)
            }else{
                var i = res.data

                $('#empresa form').find('input').each(function(){
                    var $this = $(this)

                    $.each(i, function(i,e){
                        if( $this.attr('name') == i ){
                            $this.val(e)
                        }
                    })
                })

                // var empresa = new Vue({
                //     el: '#empresa',
                //     data: {
                //         empresaNome: i.empresaNome,
                //         empresaCnpj: i.empresaCnpj,
                //         empresaTelefone: i.empresaTelefone,
                //         empresaId: i.empresaId
                //     }
                // })
            }
            
        })
    },
    pageProdutos: function(){

        $('.loading').show()
        app.prodList()

        var table = $('#table-prod').DataTable();
        $('#table-prod').on('click', 'tr', function(){
            table.rows().deselect();
            var prodId = table.row($(this)).select().id()

            app.prodEdit(prodId)
        })


        $('.loading').hide()
 
    },
    prodList: function(){

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

        if(data.prodId){
            action = action+'?prodId='+data.prodId
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
            this.ajax('POST', action, data, function (res) {
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
        }else{
            $('.loading').hide()
        }
    },
    prodEdit: function(prodId){
        
        app.ajax('GET','produtos?prodId='+prodId, '', function(res){
            if(res.error){
                console.log(res.data)
            }else{
                 
                $('#prod-insert').find('input').each(function(){
                    var inputForm = $(this)
                    
                    $.each(res, function (k, i) {
                        if (inputForm.attr('name') == k ){
                            inputForm.val(i)
                        }
                    })
                })
            }
        })
        
    },
    listaClientes: function(){
        
        this.ajax('get','clientes',null,function(rs){
            console.log(rs)
        })
    },

    novoCliente: function(){
        
        var action = $('fomr#cliente').attr('action'), data = $('fomr#cliente').serialize()

        this.ajax('post',action,data, function(rs){
            
            console.log(rs)
        })
    },
    pagePedidos: function(){
        
        $('#table-pedidos').DataTable({
            ajax: {
                url: site + 'pedidos',
                dataSrc: 'data',
                type: "GET",
            },
            // columnDefs: [{
            //     orderable: false,
            //     className: 'select-checkbox',
            //     targets: 0
            // }],
            // select: {
            //     style: 'os',
            //     selector: 'td:first-child'
            // },
            // rowId: 'pedidoId',
            columns: [
                null,
                { data: "pedidoId" },
                { data: "clienteNomeRazao" },
                { data: "pedidoTotal" },
                { data: "pedidoData" }
            ]
        })

        $('.loading').hide()
    },
    pagePedido: function (pedidoId=null) {

        if(pedidoId != null){
           
            $('#table-pedido-produtos').DataTable({
                ajax: {
                    url: site + 'pedidos?pedidoId=' + pedidoId,
                    dataSrc: 'data',
                    type: "GET",
                },
                
                columns: [
                    null,
                    { data: "pedProdId" },
                    { data: "produtoNome" },
                    { data: "pedProdPreco" },
                    { data: "pedProdQtd" },
                    { data: "pedProdSub" },
                ]
            })
                        

        }else{

            app.ajax('GET','clientes?empresaId='+localStorage.getItem('empresaId'),'',function(res){

                if(res.error){

                    console.log(res)

                    $('#busca-cliente').find('select#clientes-lista').append('<option selected >' + res.data.responseJSON.message + '</option>')
                    
                }else{
                    res.forEach(function (k, i) {

                        $('#busca-cliente').find('select#clientes-lista').append('<option value="' + i.clienteId + '" >' + i.clienteNomeRazao + '</option>')
                    })
                }                
            })
            
            $('#lista-busca-produtos').DataTable({
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

            $('.loading').hide()
        }

         

        
    },
    pedidoInsert: function(){

        
    },
    

    empresaInsert: function () {

        var form = $('form#empresa-insert'), action = form.attr('action'), data = form.serialize(), save = true

        form.find('input').each(function () {

            if ($(this).attr('required') && $(this).val() == '') {
                $(this).css('border-color', 'red').addClass('required')
                save = false
            } else {
                $(this).css('border-color', 'rgba(0,0,0,.15)').removeClass('required')
            }
        })

        if (save) {
            this.ajax('post', action, data, function (res) {
                //console.log(res)
                location.reload()
            })
        }
    },
}



 