<?php

require_once(APPPATH.'libraries/REST_Controller.php');

class Painel extends REST_Controller{

    public function index_get(){

    	if(!$this->get('id') ){

    	 	$this->response( [
                    'status' => FALSE,
                    'message' => 'Insert id bank to return item'
                ], 404);
    	}

    	$userId = $this->get('id');

    	$this->db->where('id',$userId);
    	$user = $this->db->get('usuarios')->row();

    	$this->db->where('id_usuario',$userId);
    	$niveis = $this->db->get('usuarios_nivel')->row();

    	$result = $user + $nives;

        $this->response($result, 200);

    }
    
    public function bancos_get(){

        if(!$this->get('id') ){

            $this->response( [
                    'status' => FALSE,
                    'message' => 'No users were found'
                ], 404);
        }

        $idBanco = $this->get('id');

        $banco = BancoPorID($idBanco);


        if(!$banco){

             $this->response( [
                'status' => FALSE,
                'message' => 'No bank were found'
            ], 404);       

        }
        
        $result = $banco;
        $this->response($result, 200);
        
    }    

}