<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

    public function __construct(){
        parent::__construct();


    }

    public function xvideos(){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.xvideos.com/');


    }
    public function index(){
        // $this->native_session->unset_userdata('user_id');
        // $this->native_session->unset_userdata('superuser');
        // $this->native_session->unset_userdata('conta_id');
        // $this->native_session->unset_userdata('fb_access_token');
        
        $this->load->view('index/index');
        //echo "Em manutencao";
    }

    public function rede(){

        $this->load->view('index/rede');
    }


    public function rede2(){

        $this->load->view('index/rede2');
    }


    public function lista(){
        // $this->native_session->unset_userdata('user_id');
        // $this->native_session->unset_userdata('superuser');
        // $this->native_session->unset_userdata('conta_id');
        // $this->native_session->unset_userdata('fb_access_token');
        
        $this->load->view('index/lista');
    }

    public function listadesatualizados(){
        // $this->native_session->unset_userdata('user_id');
        // $this->native_session->unset_userdata('superuser');
        // $this->native_session->unset_userdata('conta_id');
        // $this->native_session->unset_userdata('fb_access_token');
        
        $this->load->view('index/lista2');
    }
    
    public function aptos(){
        // $this->native_session->unset_userdata('user_id');
        // $this->native_session->unset_userdata('superuser');
        // $this->native_session->unset_userdata('conta_id');
        // $this->native_session->unset_userdata('fb_access_token');
        
        $this->load->view('index/lista3');
    }

    public function totais(){

        
        $data['total_cadastrados'] = $this->db->get('usuarios_contas')->num_rows();

        $this->db->where( array( 'fechamento'=> 1, 'status'=> 0, 'block'=> 0 ) );
        $data['total_aptos'] = $this->db->get('usuarios_contas')->num_rows();

        $this->db->where( array( 'fechamento'=> 1, 'status'=> 1, 'block'=> 0 ) );
        $data['total_participando'] = $this->db->get('usuarios_contas')->num_rows();

        $this->db->where( array( 'fechamento'=> 1, 'status'=> 1, 'block'=> 1 ) );
        $data['bloqueados'] = $this->db->get('usuarios_contas')->num_rows();



        $this->db->where(array('status'=>0,'superCiclo'=>1,'reentrada'=>0));
        $data['doacoes_concluidas'] = $this->db->get('doacoes')->num_rows();

        $this->db->where(array('status'=>1,'superCiclo'=>1,'reentrada'=>0));
        $data['doacoes_naoconcluidas'] = $this->db->get('doacoes')->num_rows();

        $this->db->where(array('status'=>2,'superCiclo'=>1,'reentrada'=>0));
        $data['doacoes_aguardando'] = $this->db->get('doacoes')->num_rows();



        $this->db->where(array('aptoPara'=>2, 'block'=>0));
        $data['aptos_ciclo2'] = $this->db->get('usuarios_contas')->num_rows();

        // $this->db->where(array('superCicloUsuario'=>2, 'lider'=>0));
        // $data['no_ciclo2'] = $this->db->get('usuarios')->num_rows();

        $this->db->where(array('status'=>0,'superCiclo'=>2));
        $data['doacoes_concluidas_ciclo2'] = $this->db->get('doacoes')->num_rows();

        $this->db->where(array('status'=>2,'superCiclo'=>2));
        $data['doacoes_aguardando_cilo2'] = $this->db->get('doacoes')->num_rows();

        $this->db->where(array('status'=>1,'superCiclo'=>2));
        $data['doacoes_naoconcluidas_ciclo2'] = $this->db->get('doacoes')->num_rows();



        $this->db->where(array('aptoPara'=>3, 'block'=>0));
        $data['aptos_ciclo3'] = $this->db->get('usuarios_contas')->num_rows();

        // $this->db->where(array('superCicloUsuario'=>3,'lider'=>0));
        // $data['no_ciclo3'] = $this->db->get('usuarios')->num_rows();

        $this->db->where(array('status'=>0,'superCiclo'=>3));
        $data['doacoes_concluidas_cilo3'] = $this->db->get('doacoes')->num_rows();

        $this->db->where(array('status'=>2,'superCiclo'=>3));
        $data['doacoes_aguardando_cilo3'] = $this->db->get('doacoes')->num_rows();

        $this->db->where(array('status'=>1,'superCiclo'=>3));
        $data['doacoes_naoconcluidas_ciclo3'] = $this->db->get('doacoes')->num_rows();



        $this->db->where(array('reentrada'=>1));
        $data['reentradas'] = $this->db->get('doacoes')->num_rows();

        $this->db->where(array('status'=> 0,'reentrada'=>1));
        $data['reentradas_concluidas'] = $this->db->get('doacoes')->num_rows();

        $this->db->where(array('status'=>1,'reentrada'=>1));
        $data['reentradas_naoconcluidas'] = $this->db->get('doacoes')->num_rows();

        $this->db->where(array('status'=>2,'reentrada'=>1));
        $data['reentradas_aguardando'] = $this->db->get('doacoes')->num_rows();
        
        $this->load->view('index/totais', $data );
    }

    public function aptosciclo2(){

        //$this->db->select_sum('idRecebedor');
        // $this->db->select('idRecebedor');
        // $this->db->from('doacoes');
        //$this->db->order_by('price desc'); 
        //$this->db->limit(3);
        // $this->db->where('status',0);
        $data['aptos_ciclo2'] = $this->db->query('SELECT idRecebedor, COUNT(idRecebedor) AS total FROM doacoes GROUP BY idRecebedor ORDER BY total DESC')->result();

        $this->load->view('index/aptosciclo2', $data );
    }

    public function doacoes(){

        $data['titulo'] = 'Doações';

        $data['pg_doacoes'] = true;        

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $this->load->view('index/doacoes', $data );
    }


    public function sair(){

        $this->native_session->unset_userdata('user_id');
        $this->native_session->unset_userdata('superuser');
        $this->native_session->unset_userdata('conta_id');
        $this->native_session->unset_userdata('fb_access_token');
        $this->native_session->unset_userdata('user_id_migracao');
        redirect('backoffice/login');
    }

    // public function esqueci(){

    //     $data = array();

    //     if($this->input->post('submit')){

    //         $this->usuario_model->RecuperarSenha();
    //     }

    //     $this->load->view('painel/esqueci', $data);

    // }


    public function home(){
        $this->load->view('index/header');
        $this->load->view('index/index');
        $this->load->view('index/footer');
    }

    public function manutencao(){
        $this->load->view('index/manutencao');
    }
    public function politicas(){
        $this->load->view('admin/templates/header');
        $this->load->view('admin/politicas');
        $this->load->view('admin/templates/footer');
    }

    public function ativacao($id_user){
        
        $s1 = rand(302, 9999);
        $s2 = 'Az-';
        $s3 = date('Y-m-d H:i:s');
        $s4 = 'Oyk';

        $token = $s1.$s2.$s3.$s4;

        $this->db->where('id', $id_user);
        $this->db->update('usuarios', array('token'=>md5($token), 'email'=>$this->input->post('emailPost') ) ) ;

        $this->db->where('id', $id_user);
        $user = $this->db->get('usuarios')->row();

        $data['nome'] = $user->nome;
        $data['token'] = $user->token;

        $body = $this->load->view('email/ativacao',$data,TRUE);

        $config['protocol'] ='smtp';
        $config['smtp_host'] = 'srv30.prodns.com.br';
        $config['smtp_user'] = 'suporte@redeads50.com';
        $config['smtp_pass'] = 'ads502016';
        $config['smtp_port'] = '465';
        $config['smtp_crypto'] = 'ssl';
        $config['mailtype'] = 'html';

        $this->email->initialize($config);

        $this->email->to( $user->email);
        $this->email->from('suporte@redeads50.com', 'Suporte Rede ADS50');
        $this->email->set_alt_message('Faça a validação do seu e-mail para sua segurança.');
        $this->email->subject('Validação do seu e-mail');
        $this->email->message($body);

        $envia = $this->email->send();

        //return $envia;

    }

    public function valida($token){

        if(!empty($token)){

            $this->db->like('token',$token);
            $users = $this->db->get('usuarios');
            $user = $users->row();

            if($users->num_rows() > 0 ){

                if($user->validado == 0 ){

                    $this->db->where('id',$user->id);
                    $this->db->update('usuarios',array('validado'=>'1'));
                    $this->native_session->set('user_id',$user->id);
                    $this->native_session->set_flashdata('mensagem','<div class="alert alert-success">E-mail validado</div>');
                    redirect('painel');

                }else{

                    $this->native_session->set_flashdata('mensagem','<div class="alert alert-info">O e-mail já havia sido validado. Faça login</div>');
                    redirect('painel');
                }
                
            }

            $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger">Usuário não existe ou não está cadastrado</div>');
            redirect('painel');

        }

        redirect('painel');
    }
    
}