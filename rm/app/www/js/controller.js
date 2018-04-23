var controller = {
    
    initPages: function () {
        if ($('.page#homologacao').is(':visible')) {
            this.pageHomologacao()
        }

        if ($('.page#login').is(':visible')) {
            //this.pageLogin()
        }

        if ($('.page#pedidos').is(':visible')) {
            this.pagePedidos()
        }

        if ($('.page#pedido').is(':visible')) {
            //this.pagePedido()
        }

        if ($('.page#produtos').is(':visible')) {
            this.pageProdutos()
        }

        
    },
    pageHomologacao: function(){
         
        model.loading('open')

        if (localStorage.getItem('homologaStatus') == 1 || localStorage.getItem('homologaStatus') == null ) {

            model.loading('close')
            model.openPage('homologacao')
        }

        if (localStorage.getItem('homologaStatus') == 2) {
            
            model.loading('close')
            model.syncBD()
            model.openPage('login')
        }

        if (localStorage.getItem('homologaStatus') == 3) {

            model.loading('close')
            model.openPage('homologacao')
        }

        
   
    },
    pagePedidos: function () {

        $('.tab-pedidos').tabs({
            swipeable: true
        })

        $('.loading').hide()
    },
     
    sync: function(){
        model.openPage('sync',false,close)
    },
    info: function(){
        model.openPage('info')
    },
    opcoes: function () {
        model.openPage('opcoes')
    },
    sair: function () {
        model.sair()
    },
	pesquisas: function(){
        model.openPage('pesquisas')
		model.listaPesquisas()
    },
    syncPesquisas: function(){
        model.syncPesquisas()
    },
    pesquisaLocais: function(pesquisaID=null){
        if(pesquisaID){
            localStorage.setItem('pesquisaID', pesquisaID)
        }        
        model.listaLocais()
        model.listaLocaisExtra()
        model.openPage('locais')
    },
	pesquisaLocal: function(bairroComuID=null,coletorLocalID=null){   
        if(bairroComuID){
            localStorage.setItem('bairroComuID', bairroComuID)
        }
        if(coletorLocalID){
            localStorage.setItem('coletorLocalID', coletorLocalID)
        }
        
		model.abreLocal()
    },

	// EXTRA
	addLocalExtra: function(){
        model.addLocalExtra()
    },

	pesquisaLocalExtra: function(bairroRow=null){

        if(bairroRow){

            console.log('Bairro > ',bairroRow)

            var bairro = $('#load-locais-extras #' + bairroRow).data('bairro')
            localStorage.setItem('bairroComuID', bairro)
        }

		//remove os itens que não vão ser necessarios. Nessa caso o indicador que é uma pesquisa comum.
		localStorage.removeItem('coletorLocalID')

		model.abreLocalExtra()
    },

    //COLETA
    
    novaColeta: function(){
        
        model.novaColeta()
        
    },

    uploadPesquisas: (pesquisaId)=>{

        model.uploadPesquisas(pesquisaId)
    }

	
}

var api = {

    
    homologarColetor: function(){

    func.loading('open')

    var gadget = {deviceID:localStorage.getItem('deviceID'),registrationID:registrationID,coletorDados:device.platform+' '+device.manufacturer+' '+device.model} 

    var networkState = navigator.connection.type;

        if (networkState != Connection.NONE) {
        
            $.post('https://app.censuspesquisas.com.br/api/coletor/homologacao', gadget ,function(data){

                if(data.status == true ){

                    api.cAlert(data.message,'success',5000)
                    func.loading('close')
                }

                if(data.status == false){
                    api.cAlert(data.message,'error',5000)
                    func.loading('close')
                }
                
            },'json')
            .fail(function(data){

                api.cAlert('Erro','error',5000)
                api.sendLog($.now()+' '+JSON.stringify(data) )
                func.loading('close')

            })

        }else{

            func.loading('close')
            this.cAlert('Não há conexão de internet','error', 3000)
        }

    },

    syncDownPesquisas: function(){

        var networkState = navigator.connection.type;

        if (networkState != Connection.NONE) {
        	func.loading('open')
            model.pesquisasDown()
            
        }else{
            
            this.cAlert('Não há conexão de internet','error', 3000)

        }
    },

    syncUpLocal: function(){

        var networkState = navigator.connection.type;

        if (networkState != Connection.NONE) {
            func.loading('open')
            model.locaisUp()
            
        }else{
            func.loading('close')
            this.cAlert('Não há conexão de rede','error',5000)

        }
    },

}