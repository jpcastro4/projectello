<?php

require_once(APPPATH.'libraries/REST_Controller.php');

class Users extends REST_Controller{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // // Configure limits on our controller methods
        // // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        // $this->methods['user_get']['limit'] = 500; // 500 requests per hour per user/key
        // $this->methods['user_post']['limit'] = 100; // 100 requests per hour per user/key
        // $this->methods['user_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->load->model('api_model');
    }

    public function index_get(){
	
    	$this->response(NULL, REST_Controller::HTTP_OK);

    }

    public function profile_get(){

    	if(!$this->get('id') ){
    	 	$this->response( [
                    'status' => FALSE,
                    'message' => 'No users were found'
                ], 404);
    	}

    	$userId = $this->get('id');

        //DADOS DO USUARIO
    	$this->db->where('id',$userId);
    	$user = $this->db->get('usuarios')->row_array();

        $user['senha'] = '';

        //DADOS DE NIVEL
        $this->db->where('id_usuario',$userId);
        $niveis['niveis'] = $this->db->get('usuarios_nivel')->row_array();

        $indicador = array();
        $this->db->where_in('id_usuario',$userId);
        $indicadorRow = $this->db->get('indicadores')->row();
        $indicador['indicador']['id'] = $indicadorRow->id_indicador;
        $indicador['indicador']['indicador_nome'] = $this->api_model->infoUser($indicadorRow->id_indicador)->nome;

        $result = array_merge($user, $niveis, $indicador);
        $result['success'] = true;
        $this->response($result, 200);

    }

    public function updateUser_get(){

        if(!$this->get('id') ){

            $this->response( [
                    'status' => FALSE,
                    'message' => 'No receiver were found'
                ], 404);
        }

        $userId = $this->get('id');


        //QUANTIDADE DE DOAÇÕES NECESSÁRIAS -- DEFINE SE O USUARIO VE OU NAO O BOTAO DE DOAÇÃO - PREVÊ SE O SALDO É SUFICIENTE
        $this->db->where_in('id',$userId);
        $userDoacoesUp = $this->db->get('usuarios')->row();

        $doacao['proxima_doacao']['cronometro'] = $userDoacoesUp->cronometro;

        if($userDoacoesUp->ciclo == 0){
            $minimo = 0;
        }        
        if($userDoacoesUp->ciclo == 1){
            $minimo = 2;
        }
        if($userDoacoesUp->ciclo == 2){
            $minimo = 10;
        }
        if($userDoacoesUp->ciclo == 3){
            $minimo = 28;
        }  

        $apto = array();
        $this->db->where_in('id_recebedor', $userId);
        $doacoes = $this->db->get('doacoes');

        if($doacoes->num_rows() >= $minimo ){
            $apto['apto_up'] = TRUE;
        }else{
            $apto['apto_up'] = FALSE;
        }

        //NUMERO DE DOACOES ENVIADAS
        $doacoesFeitas = array();
        $this->db->where('id_doador',$userId);
        $feitas = $this->db->get('doacoes');

        if($feitas->num_rows() > 0){
            $doacoesFeitas['doacoes_feitas'] = $feitas->num_rows();
        }else{
            $doacoesFeitas['doacoes_feitas'] = 0;
        }

        //NUMERO DE DOACOES RECEBIDAS
        $doacoesRecebidas = array();
        $this->db->where('id_recebedor',$userId);
        $recebidas = $this->db->get('doacoes');

        if($recebidas->num_rows() > 0){
            $doacoesRecebidas['doacoes_recebidas'] = $recebidas->num_rows();
        }else{  
            $doacoesRecebidas['doacoes_recebidas'] = 0;
        }


         //ID DO RECEBEDOR
        $receiver = array();
        $receiverId = $this->api_model->Recebedor($userId);

        if($userDoacoesUp->ciclo == 0){
            $doacao['proxima_doacao']['valor_doacao'] = 50.00;
        }
        
        if($userDoacoesUp->ciclo == 1){
            $doacao['proxima_doacao']['valor_doacao'] = 100.00;
        }

        if($userDoacoesUp->ciclo == 2){
            $doacao['proxima_doacao']['valor_doacao'] = 600.00;
        }

        if($userDoacoesUp->ciclo == 3){
            $doacao['proxima_doacao']['valor_doacao'] = 10800.00;
        }

        //DADOS DA DOACAO SE HOUVER
        //$doacao = array();
        $this->db->where('id_recebedor',$receiverId);
        $this->db->where('id_doador',$userId);
        $this->db->where('ciclo', $userDoacoesUp->ciclo);
        $doacoes = $this->db->get('doacoes');

        //DOACAO - SE EXISTIR TRAZ O STATUS
        if( $doacoes->num_rows() > 0){
            $doacao['proxima_doacao']['doacao'] = $doacoes->row_array();
        }else{
           $doacao['proxima_doacao']['doacao'] = FALSE;
        }

        //DADOS DO RECEBEDOR
        $this->db->where('id',$receiverId);
        $doacao['proxima_doacao']['upline_recebedor'] = $this->db->get('usuarios')->row_array();

        $banco = BancoPorID($doacao['proxima_doacao']['upline_recebedor']['banco']);
        $doacao['proxima_doacao']['upline_recebedor']['banco'] = $banco ;

        $doacao['proxima_doacao']['upline_recebedor']['senha'] = '' ;

        $result = array_merge( $apto, $doacoesFeitas, $doacoesRecebidas, $doacao);
        $result['success'] = TRUE;
        $this->response($result, 200);

    }

}