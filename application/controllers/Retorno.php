<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Retorno extends CI_Controller {

    public function __construct(){
        parent::__construct();

        //$this->load->library('facebook');

    }

    public function index(){

        return phpinfo();
       
    }

    public function facebook(){

        $this->load->library('facebook');

        //SE EXISTE UMA SESSÃO DE CONTA ID É PORQUE O CARA TÁ EXECUTANDO 
        //O VINCULO VINDO DA PAGINA DE CONFIGURAÇÃO. TROCANDO OU FAZENDO.
        if( $this->native_session->get('conta_id') ){

            // Check if user is logged in
            if ($this->facebook->is_authenticated()){
                // User logged in, get user details
                $user = (object) $this->facebook->request('get', '/me?fields=id,name,email,picture');

                if (!isset($user->error) ){             

                    //VAMOS SALVAR O VINCULO QUE ELE EXECUTOU
                    $foto = 'http://graph.facebook.com/'.$user->id.'/picture?type=large';

                    $this->db->where('id', $this->native_session->get('conta_id') );
                    $saveFacebookID = $this->db->update('usuarios_contas', array('facebookID'=>$user->id, 'photo'=> $foto ));

                    $this->native_session->set_flashdata('mensagemFacebook', '<div class="alert alert-success text-center">Facebook vinculado com sucesso</div>');
                    $this->painel_model->InserirExtrato( $this->native_session->get('conta_id'), 'Vinculou Facebook' , 'adm');
                    redirect('painel/conta_configuracoes');
                }

                $this->native_session->set_flashdata('mensagemFacebook', '<div class="alert alert-danger text-center">Erro com a conta do Facebook.'. $user->error.'</div>');
                redirect('painel/conta_configuracoes');

            }

            $this->native_session->set_flashdata('mensagemFacebook', '<div class="alert alert-danger text-center">Não conseguimos autenticar seu Facebook</div>');
            redirect('painel/conta_configuracoes');

        }

        //AQUI NÃO EXISTE UMA SESSÃO E O CARA TÁ LOGANDO COM O VINCULO QUE ELE JÁ REALIZOU
        if ( $this->facebook->is_authenticated() ){
            
            // User logged in, get user details
            $user = (object) $this->facebook->request('get', '/me?fields=id,name,email,picture');

                if (!isset($user->error) ){

                    //VAMOS VERIFICAR QUANTAS CONTAS EXISTEM COM ESSE ID DE FACEBOOK
                    $this->db->where('facebookID', $user->id  );
                    $FacebookAaccount = $this->db->get('usuarios_contas');

                    if($FacebookAaccount->num_rows() == 1){

                        if($FacebookAaccount->row()->block == 1){
                            $this->native_session->set_flashdata('mensagem', '<div class="alert alert-danger text-center">Conta bloqueada. Entre em contato com o suporte.</div>');
                            redirect('painel/contamaster/login');
                        }

                        $foto = 'http://graph.facebook.com/'.$user->id.'/picture?type=large';

                        if($FacebookAaccount->row()->photo != $foto){

                            $this->db->where('facebookID', $user->id  );
                            $this->db->update('usuarios_contas', array('photo'=> $foto ));

                            if($FacebookAaccount->row()->id == 1 OR $FacebookAaccount->row()->id == 2){

                                $this->native_session->set('superuser', 1);
                            }

                        }

                        $this->native_session->set('conta_id', $FacebookAaccount->row()->id );
                        $this->native_session->set_flashdata('mensagem', '<div class="alert alert-success text-center"> Você acessou com sua conta do Facebook.</div>');
                        redirect('painel/conta');

                    }

                    if($FacebookAaccount->num_rows() > 1 ){
                        $this->native_session->set_flashdata('mensagem', '<div class="alert alert-info text-center">Escolha a conta que deseja acessar.</div>');
                        redirect('painel/selecionar_conta');
                    }

                    $this->native_session->set_flashdata('mensagem', '<div class="alert alert-danger text-center">Não existe conta com esse Facebook vinculado. Use seu e-mail e senha.</div>');
                    $this->facebook->destroy_session();
                    redirect('painel/contamaster/login');
                }

                $this->native_session->set_flashdata('mensagem', '<div class="alert alert-danger text-center">Erro com a conta do Facebook.'. $user->error.'</div>');
                redirect('painel/contamaster/login');

        }

        $this->native_session->set_flashdata('mensagem', 'Erro ao logar com seu Facebook');
        redirect('painel/contamaster/login');
    }

    public function ajaxGetDownline(){

        $user = $this->input->get('id');

        echo json_encode(array('mensagemFacebook'=>'mensagemFacebook '.$user));
    }


}