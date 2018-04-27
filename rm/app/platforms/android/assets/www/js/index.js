
let deviceDb = new PouchDB('Device');
let representantesDb = new PouchDB('Representantes');
let clientesDb = new PouchDB('Clientes');
let produtosDb = new PouchDB('Produtos');

let localDb = null
let historico = []
let registrationID = null //localStorage.getItem('registrationId')
let deviceID = null //localStorage.getItem('deviceID')
//let ApiUrl = ''

//const pluralize = (count, noun, sSuffix = '', pSuffix = 's') => (count != 1) ? noun + pSuffix : noun + sSuffix



var app = {
    // APP CONSTRUCTOR
    bindEvents: function () {
        document.addEventListener('deviceready', this.onDeviceReady, false);
        document.addEventListener("online", function(){
            console.log('CONECTADO')
        }, false);
        //document.addEventListener("backbutton", this.onBackKeyDown, false);
    },
    initialize: function () {
         
        this.bindEvents()
                
    },
    onDeviceReady: function () {
        //document.addEventListener("online", model.connection, false);
        var attachFastClick = Origami.fastclick
        attachFastClick(document.body)
                
        if (device.available){
            
            //inicliza de acordo com a plataforma
            if (device.platform == 'browser') {
                localStorage.setItem('homologaStatus', 2)
                localStorage.setItem('empresaCnpj','14926394000118')
                //ApiUrl = 'http://localhost/ellobeta/api/rs/'

                deviceID = '711C3126-FF51-4B07-958B-FD30182BA043' //localStorage.setItem('deviceID', '711C3126-FF51-4B07-958B-FD30182BA043')
            }

            if (device.platform == 'Android') {

                deviceID = device.uuid //localStorage.setItem('deviceID', device.uuid)
                //ApiUrl = 'https://ellobeta.com/api/rs/'
            }

            
            app.initializeEls()
            app.setupPush()
        }
        

    
        // if (device.available) {

        //     //inicializa o banco de dados

        //     db.init()

        //     //inicializa permissoes de localizacao
        //     // var localizacao = navigator.geolocation.getCurrentPosition(
        //     //     function(position){
        //     //         //console.log(position.coords)
        //     //         // if(position.coords == '' || !position.coords ){
        //     //         //     api.cAlert('Erro na localização','error',5000)           
        //     //         // }           
        //     //     },
        //     //     function(error){
        //     //         $('.infopage .gps').html('GPS offline')
        //     //         model.loading('open')
        //     //     },
        //     //     // {maximumAge:60000, timeout:4000, enableHighAccuracy:true}
        //     //     {enableHighAccuracy:true}
        //     // )

        //     //inicializa monitoramente de localização permanente
        //     init.localizacao()
        // }

        // init.back(true)
 

        
    },
    initializeEls: function () {
        //$.fn.dataTable.ext.errMode = 'throw';
        //localStorage.setItem('empresaId', 1)

        M.AutoInit();
        controller.initPages() 

        $('.menu-login').dropdown({
            alignment:'right',
            constrainWidth:false,
        })      

        $('.fixed-action-btn').floatingActionButton();
        
        $('.openPage').on('click', function(e){
            e.preventDefault()
            app.openPage($(this).data('target'))
        })

        $('#form-homologa').on('submit', function(e){
            e.preventDefault();
            model.homologa()   
        })

        $('#form-login').on('submit', (e)=>{
            e.preventDefault()
            model.login()
        })

        $('#sair').on('click', (e) => {
            e.preventDefault()
            model.sair()
        })

        $('#novo-pedido').on('click', (e)=>{
            e.preventDefault()
            model.novoPedido()
        })


        $('form#busca-cliente').on('submit',(e)=>{
            e.preventDefault()
            model.buscaCliente()
        })

        $('#open-filters').on('click', ()=>{
            let filters = $('#filters')
            if (filters.is(':visible')){
                filters.addClass('hidden')
            }else{
                filters.removeClass('hidden')
            }
        })

        $('.addCliente').on('click', ()=>{

            const clienteId = $(this).data('clienteId')

            model.addClientePedido()
        })

        
        
        $('#save-prod').on('click', function (e) {
            e.preventDefault()
            app.prodInsert()
        })

        $('button#save-empresa').on('click', function (e) {
            e.preventDefault()
            app.empresaInsert()
        })

        $('input.required').on('keyup', function () {
            $(this).css('border-color', 'rgba(0,0,0,.15)')
        })

        $('.modal#busca-cliente').on('show.bs.modal', function (e) {
            app.buscaClientes()
        })

        $('.modal#busca-produtos').on('show.bs.modal', function (e) {

        })
    },
    setupPush: function () {
        
        var push = PushNotification.init({
            "android": {
            },
            "browser": {},
            "ios": {
                "sound": true,
                "vibration": true,
                "badge": true
            },
            "windows": {}
        });
        
        push.on('registration', function (data) {
            console.log('registration event: ' + data.registrationId);

            var oldRegId = localStorage.getItem('registrationId');
             
            if (oldRegId !== data.registrationId) {
                 
                registrationID = data.registrationId
                localStorage.setItem('registrationId', data.registrationId)
                 
                if (oldRegId !== null ) {
                    model.refreshToken()
                }
                 
            }
        });

        push.on('error', function (e) {
            M.toast({ html: e.message})
            alert(e.message)
            console.log("push error = " + e.message);
        });

        push.on('notification', function (data) {
            
            model.executePush(data)
 
        });
    }
    
    
}


var init = {
    
    localizacao: ()=>{
        model.loading('open')
        $('#loading .log').text('Buscando GPS')
        var watchID = navigator.geolocation.watchPosition(
            function (position) {
                //console.log(position.coords)
                if (position.coords.longitude == 'undefined') {
                    $('#loading .info').text('Calibrando GPS')
                    $('.infopage .gps').html('Calibrando GPS')
                    model.loading('open')
                } else {
                    $('#loading .log').text('Inicializando')
                    model.loading('close')
                    localStorage.setItem('deviceLocation', position.coords.latitude + ',' + position.coords.longitude)
                    $('.infopage .gps').html('Lat: ' + position.coords.latitude + ', Long: ' + position.coords.longitude)
                }
            },
            function (e) {
                if (e) {

                    
                    if (e.code == 1) {
                        model.loading('open')
                        $('#loading .log').text('GPS não autorizado')
                        $('.infopage .gps').html('GPS não autorizado')
                    }

                    if (e.code == 2) {
                        model.loading('open')
                        $('#loading .log').text('Localizacao não recuperada')
                        $('.infopage .gps').html('Localizacao não recuperada')
                    }

                    if (e.code == 3) {
                       // $('#loading .log').text('Recalibrando GPS')
                        $('.infopage .gps').html('Recalibrando GPS')
                    }
                    
                }
            },
            { enableHighAccuracy: true, timeout: 5000, }
        )

        $('.infopage').prepend('<li class="list-group-item"> Autorização de Localização: ' + watchID + '</li>')
    },
   
    back: (active)=>{

        if(active == true){
            $(document).on('keydown', function (e) {
                if (e.keyCode == 37) {
                    init.onBackKeyDown()
                }
            })
        }else{
            $(document).on('keydown', function (e) {
                if (e.keyCode == 37) {
                     return false
                }
            })
            
        }
    },
    onBackKeyDown: () => {
        
        if(historico.length > 0 ){
            if(historico.length == 1 ){
                var back = 'index'    
            }
            if (historico.length == 2) {
                var back = historico[0]
            }
            if (historico.length >= 3) {
                var back = historico[historico.length-2]
            }
            model.openPage(back, true)
            historico.pop()
        } else{
            model.openPage('index', true)
        }   
        
    },  
          
}

