
// var pesquisasDb = new PouchDB('Pesquisas');
// var coletasDb = new PouchDB('Coletas');

var localDb = null
var historico = []
var registrationID = null //localStorage.getItem('registrationId')
var deviceID = null //localStorage.getItem('deviceID')
var url = 'https://app.censuspesquisas.com.br/api/coletor/'

const pluralize = (count, noun, sSuffix = '', pSuffix = 's') => (count != 1) ? noun + pSuffix : noun + sSuffix

var app = {

    initialize: function () {
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
     
    openPage: function (pageId) {

        $('body').find('.page').each(function () {
            $(this).addClass('hidden')
        })
        
        $('#' + pageId).removeClass('hidden')

        contoller.initPages()
    },
    ajax: function (type, action, data, callback) {

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
}


var init = {

    // APP CONSTRUCTOR
    bindEvents: function() {
        document.addEventListener('deviceready', this.onDeviceReady, false);
        document.addEventListener("online", this.onlineConnection, false);
        document.addEventListener("backbutton", this.onBackKeyDown, false);
    },
    initialize: function() {
        model.loading('open')
        this.bindEvents()
    },
    onDeviceReady: function() {
        
        var attachFastClick = Origami.fastclick
        attachFastClick(document.body)

        //inicliza de acordo com a plataforma
        if(device.platform == 'browser'  ){

            localDb = window.openDatabase('Coletor', '1.0', 'Coletor BD', 2 * 1024 * 1024)                         
            deviceID = '711C3126-FF51-4B07-958B-FD30182BA043' //localStorage.setItem('deviceID', '711C3126-FF51-4B07-958B-FD30182BA043')
        }

        if(device.platform == 'Android'){

            $('.uuid').html(device.cordova)

            deviceID = device.uuid //localStorage.setItem('deviceID', device.uuid)
            localDb = window.openDatabase('Coletor', '1.0', 'Coletor BD', 2 * 1024 * 1024)
            //localDb = window.sqlitePlugin.openDatabase({ name: 'coletorbd', location: 'default' })
            // window.sqlitePlugin.echoTest(function() {
            //     alert('ECHO test ok')
            // });

            // window.sqlitePlugin.selfTest(function() {
            //     alert('SELF test OK');
            // });

            //inicializando o push
            // $('.push-pesquisas').pullToRefresh({
            //     callback: function () {
            //         return model.listaPesquisas()
            //     }
            // });

        }
 
        
        if(device.available){
            
            //inicializa o banco de dados
            
            db.init()
            
            //inicializa permissoes de localizacao
            // var localizacao = navigator.geolocation.getCurrentPosition(
            //     function(position){
            //         //console.log(position.coords)
            //         // if(position.coords == '' || !position.coords ){
            //         //     api.cAlert('Erro na localização','error',5000)           
            //         // }           
            //     },
            //     function(error){
            //         $('.infopage .gps').html('GPS offline')
            //         model.loading('open')
            //     },
            //     // {maximumAge:60000, timeout:4000, enableHighAccuracy:true}
            //     {enableHighAccuracy:true}
            // )

            //inicializa monitoramente de localização permanente
            init.localizacao()
        }
       
        init.back(true)
         
        $('.infopage').prepend('<li class="list-group-item"> Device ID: ' + device.uuid + '</li>')
        $('.infopage').prepend('<li class="list-group-item"> Plataforma: ' + device.platform + '</li>') 
               
        //model.loading('close')
    },
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
          
};
 


 

// // setupPush: function() {
//     //     console.log('calling push init');
//     //     var push = PushNotification.init({
//     //         "android": {
//     //             "senderID": "987461923211"
//     //         },
//     //         "browser": {},
//     //         "ios": {
//     //             "sound": true,
//     //             "vibration": true,
//     //             "badge": true
//     //         },
//     //         "windows": {}
//     //     });
//     //     console.log('after init');

//     //     push.on('registration', function(data) {
//     //         console.log('registration event: ' + data.registrationId);

//     //         var oldRegId = localStorage.getItem('registrationId');
//     //         if (oldRegId !== data.registrationId) {
//     //             // Save new registration ID
//     //             localStorage.setItem('registrationId', data.registrationId);
//     //             // Post registrationId to your app server as the value has changed
//     //         }

//     //         var parentElement = document.getElementById('registration');
//     //         var listeningElement = parentElement.querySelector('.waiting');
//     //         var receivedElement = parentElement.querySelector('.received');

//     //         listeningElement.setAttribute('style', 'display:none;');
//     //         receivedElement.setAttribute('style', 'display:block;');
//     //     });

//     //     push.on('error', function(e) {
//     //         console.log("push error = " + e.message);
//     //     });

//     //     push.on('notification', function(data) {
//     //         console.log('notification event');
//     //         navigator.notification.alert(
//     //             data.message,         // message
//     //             null,                 // callback
//     //             data.title,           // title
//     //             'Ok'                  // buttonName
//     //         );
//     //    });
//     // }





