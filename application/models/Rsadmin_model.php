<?php
class Rsadmin_model extends CI_Model{

    public function __construct(){
        parent::__construct();

        $this->load->helper('data');
    }

    public function Login(){

        ///$login = $this->input->post('admin');
        $senha = $this->input->post('adminSenha');

        //$this->db->where('login', $login);
        $this->db->where('adminSenha', md5($senha));
        $login = $this->db->get('admin');

        if($login->num_rows() > 0){

            $this->native_session->set('admin_id', $login->row()->id);

            redirect('rsadmin');
        }

        return 'Usuario ou senha inválidos';
    }

    public function user($coluna){

        $sessao = $this->native_session->get('user_id_admin');

        $this->db->where('id', $sessao);
        $adm = $this->db->get('admin_login');

        $row = $adm->row();

        return $row->$coluna;
    }

    public function homologa($empresaId){

        $deviceId = $this->input->post('deviceId');
        
        $this->db->where('deviceId',$deviceId);
        $disp = $this->db->get('dispositivos');

        if($disp->num_rows() > 0){

            if($disp->row()->dispStatus == 1 ){

                return array('result'=>TRUE, 'message'=>'Dispositivo já cadastrado');
            }

            if($disp->row()->dispStatus == 0 ){
                return array('result'=>FALSE, 'message'=>'Aguardando liberação');
            }
            

        }else{

            $save = $this->db->insert('dispositivos',
                array(
                    'dispDeviceId'=>$deviceId,
                    'empresaId'=>$empresaId,
                    'dispStatus'=>0
                )
            );

            if($save){
                return array('result'=>TRUE, 'message'=>'Homologacao solicitada'); 
            }else{
                return array('result'=>TRUE, 'message'=>'Erro na homologacao');
            }
        }

    }

    public function ListaEmpresas(){

        $result = $this->db->get('empresas');

        if($result->num_rows() > 0 ){
            return $result->result();
        }
        return false;
    }

    public function AddEmpresa(){

        $rs = $this->db->insert('empresa', 
            array(
                'empresaCnpj'=>$this->input->post('empresaCnpj')
            )
        );

        if($rs){
            return 'Emrpesa adicionada';
        }
        return false;
    }

    public function ListaDispositivos(){

        $sessao = $this->native_session->get('user_id');

        $this->db->where('empresaId',$sessao);
        $result = $this->db->get('dispositivos');

        if($result->num_rows() > 0 ){

            return $result->result();
        }

        return false;
    }

    public function BlockDispositivo($dispositivoId){

        $this->db->where('dispositivoId',$dispositivoId);
        $result = $this->db->update('dispositivos',
            array(
                'dispositivoStatus'=>3
            )    
        );

        if($result){
            return 'Disposivito bloqueado';
        }

        return false;
    }

    public function LiberaDispositivo($dispositivoId){

        $this->db->where('dispositivoId',$dispositivoId);
        $result = $this->db->update('dispositivos',
            array(
                'dispositivoStatus'=>1
            )    
        );

        if($result){
            return 'Disposivito bloqueado';
        }

        return false;
    }
 
}