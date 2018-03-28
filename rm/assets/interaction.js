var site = 'http://localhost/ellobeta/api/rs/'

var app = {

    initialize: function(){

        localStorage.setItem('empresaId',1)
        
        if ($('.page#empresa').is(':visible') ){
            this.pageEmpresa()
        }

        if ($('.page#produtos').is(':visible')) {
            this.pageProdutos()
        }

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
    
    openPage: function(pageId){
        
        $('body').find('.page').each(function(){
            $(this).removeClass('active-page')
        })

        console.log(pageId)

        $('#' + pageId).addClass('active-page')
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
            select: {
                style: 'os',
                selector: 'td:first-child'
            },
            rowId: 'prodId',
            columns: [
                { data: "prodId" },
                { data: "prodCod" },
                { data: "prodEAN" },
                { data: "prodNome" },               
                { data: "prodPreco" },
                { data: "prodCateg" }
            ]
            // buttons: [
            //     {
            //         text: 'Select all',
            //         action: function () {
            //             table.rows().select();
            //         }
            //     },
            //     {
            //         text: 'Select none',
            //         action: function () {
            //             table.rows().deselect();
            //         }
            //     }
            // ]
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



 