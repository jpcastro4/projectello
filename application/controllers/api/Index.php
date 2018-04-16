<?php

require_once(APPPATH.'libraries/REST_Controller.php');

class Index extends REST_Controller{

    public function users_post($userId=null){

        $campos = $this->input->post();

        if(in_array(NULL, $campos)){
            
            $this->response( [
                    'status' => FALSE,
                    'message' => 'Anything field null'
                ], 404);
        }

        if($userId){

            $this->db->where('userId',$userId);
            $result = $this->db->get('users');

            if($result->num_rows() == 0 ){

                $this->response( [
                    'status' => FALSE,
                    'message' => 'Not existing'
                ], 400);
            }

            $this->db->where('userId',$userId);
            $user = $this->db->update('users', $campos);
            if($user){
                $this->response([], 204);
            }
            else{
                 $this->response([], 400);
            }

        }else{
            
            $user = $this->db->insert('users', $campos);

            if($user){
                     $this->response([
                    'userId'=>$this->db->insert_id()
                ], 201);
            }
            else{

                $this->response([], 400);
            }
        }
    }


    public function users_get($userID=null){

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