<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Afiliado extends CI_Controller {

    public function __construct(){
        parent::__construct();

    }

    public function index(){
        
        $data['titulo'] = 'Dashboard - Afiliado';
        $data['pg_afiliado'] = true;
        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');

        if($this->input->post('mudarSenha')){

            $novasenha = $this->input->post('novaSenha');

            $this->db->where('id',$this->input->post('idUser') );
            $this->db->update('usuarios_contas', array('senha'=>md5($novasenha) ) );

            $data['mensagem'] = $this->native_session->set_flashdata('mensagem', '<div class="text-center alert alert-success"> Senha alterada </div> ');
            redirect('afiliado');

        }

        $this->load->view('afiliado/index', $data); 
       
    }

    public function login(){

        if($this->input->post('submit') ){

            $senha = $this->input->post('senha');
            $email = $this->input->post('email');

            if( !empty($senha) OR !empty($email) ){

                $this->db->where('email',$email);
                $user = $this->db->get('afiliados');

                if($user->num_rows() > 0 ){
                    if( $user->row()->senha == md5($senha) ){

                        $this->native_session->set('afiliado_id', $user->row()->idAfiliado );

                        redirect('afiliado');

                    }

                    $this->native_session->set_flashdata('mensagem', '<div class="alert alert-danger text-center">Senha incorreta ou usuario não existe</div>');
                    return;
                }

                $this->native_session->set_flashdata('mensagem', '<div class="alert alert-danger text-center">Afiliado não existe</div>');
                return;
            }

             $this->native_session->set_flashdata('mensagem', '<div class="alert alert-danger text-center">Campos vazios</div>');       
             return;    
        }
        
        $data['titulo'] = 'Login - Afiliado';
        $data['pg_afiliado'] = true;
        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $this->load->view('afiliado/login', $data); 
       
    }

    public function sair(){

        $this->native_session->unset_userdata('afiliado_id');
        redirect('afiliado/login');
    }


    /* --------------------------------------  NOVOS CADASTROS   */

    //LINK DIRETO DO USUARIO
    public function amigo($login){
        
        $data = array();

        $this->db->where('login', $login);
        $user = $this->db->get('usuarios');

        if($user->num_rows() > 0){

            if(!is_null($login)){

                $this->native_session->set('indicador', $login);
                $this->native_session->set('nome_completo', $user->row()->nome);
            }else{

                $data['message']  = '<div class="alert alert-danger text-center"> Indicador inválido. Continue se deseja ser cadastrado em link único. </div>';
            }
            
        }else{
            $data['message']  = '<div class="alert alert-danger text-center"> Indicador inválido. Continue se deseja ser cadastrado em link único. </div>';
            $data['aguardando'] = false;
        }

        if($this->input->post("submit")){

            $data['message'] = $this->usuario_model->NovoUsuario();
        }

        $this->load->view('painel/cadastrar', $data);
    }


}