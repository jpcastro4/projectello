<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){

        

        parent::__construct();

        $this->load->model('admin_model', 'admin');
        $this->load->library('user_agent');
        // $this->load->helper('bancos');
        // $this->load->helper('tickets');
        // $this->load->helper('configuracoes_helper');

        // $this->load->library('googleurlapi');

        // $this->load->library('cifrete');

        // if($this->input->post('search')){

        //     $this->db->where('login',$this->input->post('search'));
        //     $users = $this->db->get('usuarios');

        //     if($users->num_rows() > 0 ){

        //         $user = $users->row();

        //         redirect('admin/usuario/'.$user->id);
        //     }

        //    redirect('admin/usuario/'.$this->input->post('search') );
        // }

    }

    public function index(){

        $this->native_session->set('user_id_admin', '1');

        if(!$this->native_session->get('user_id_admin')){

            redirect('admin/login');
        }
        $data['pg_titulo_1'] = 'Administrativo';
        $data['pg_home'] = true;


        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/index');
        $this->load->view('admin/templates/footer');        
    }



    public function login(){

        $data = array();

        if($this->input->post('submit')){

            $data['message'] = $this->admin->Login();
        }

        $this->load->view('admin/login', $data);
    }

    public function afiliados(){
      

        if($this->input->post('submit')){

            $this->admin->salvarAfiliado();
        }

        $data['titulo'] = 'Afiliados';

        $data['pg_afiliado'] = true;

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/afiliados-todos');
        $this->load->view('admin/templates/footer');
    }

    public function afiliado_editar($id){

        if($this->input->post('submit')){

            $this->admin->salvarAfiliado($id);
        }

        $data['afiliadoEditar'] = $this->admin->requestAfiliado($id);

        $data['titulo'] = 'Editar afiliado';

        $data['pg_afiliado'] = true;

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/afiliado-editar');
        $this->load->view('admin/templates/footer');
    }

    public function configuracoes(){

        $data['titulo'] = 'Configurações';

        $data['pg_titulo_1'] = 'Configurações';

        $data['pg_configuracoes'] = true;


        $data['config'] = $this->admin->Configuracoes();
        $data['cron'] = $this->admin->Cron();

        $data['message'] = $this->native_session->get_flashdata('message');
        $data['message_error'] = $this->native_session->get_flashdata('message_error');

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/configuracoes');
        $this->load->view('admin/templates/footer');
    } 

    public function pacotes(){

        $data['titulo'] = 'Pacotes';

        $data['pg_titulo_1'] = 'Administrativo';
        $data['pg_nivel_2'] = 'Pacotes';
        
        $data['pacotes'] = $this->admin->get_pacotes();

        $data['message'] = $this->native_session->get_flashdata('message');
        $data['message_error'] = $this->native_session->get_flashdata('message_error');

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/pacotes');
        $this->load->view('admin/templates/footer');
        
    }

    public function pacote($pacoteID){

        $data['titulo'] = 'Pacotes';

        $data['pg_titulo_1'] = 'Administrativo';
        $data['pg_nivel_2'] = 'Pacotes';
        
        $data['pacote'] = $this->admin->get_pacote($pacoteID);

        $data['message'] = $this->native_session->get_flashdata('message');
        $data['message_error'] = $this->native_session->get_flashdata('message_error');

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/pacote');
        $this->load->view('admin/templates/footer');
        
    }

    public function usuarios(){

        $data['titulo'] = 'Usuários';

        $data['pg_usuarios'] = true;

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/todos');
        $this->load->view('admin/templates/footer');
    }

    public function setTodos(){
        $this->native_session->destroy_flashdata('blocks');
        $this->native_session->destroy_flashdata('ciclo');
        redirect('admin/usuarios');
    }

    public function setBlocks(){
        $this->native_session->set_flashdata('blocks',1);
        redirect('admin/usuarios');
    }

    public function setCiclo($ciclo){
        $this->native_session->set_flashdata('ciclo',$ciclo);
        redirect('admin/usuarios');
    }

    public function usuario($id){

        $data['titulo'] = 'Usuário';

        $data['pg_usuario'] = true;

        $data['usuario'] = $this->admin->infoUser($id);
        $data['extrato_usuario'] = $this->admin->ExtratoUsuario($id);
        //$data['rede'] = $this->admin->Downlines($id);

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/usuario-home');
        $this->load->view('admin/templates/footer');
    }

    public function editar_usuario($id){

        $data['titulo'] = 'Editar usuário';

        $data['pg_editausuario'] = true;

        if($this->input->post('submitDados')){

            $data['messageDados'] = $this->admin->DadosPessoais($id);
        }

        if($this->input->post('submitSenha')){

            $data['messageSenha'] = $this->admin->Senha($id);
        }

        if($this->input->post('submitConta')){

            $data['messageConta'] = $this->admin->Conta($id);
        }

        $data['usuario'] = $this->admin->infoUser($id);
        $data['extraUsuario'] = $this->admin->extraInfoUser($id);

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/usuario-editar');
        $this->load->view('admin/templates/footer');

    }

    public function emails(){

        $data['titulo'] = 'Criando e-mail';

        $data['pg_emails'] = true;

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/relacionamento/todos');
        $this->load->view('admin/templates/footer');

    }

    public function novo_email(){

        $data['titulo'] = 'Criando e-mail';

        $data['pg_emails'] = true;

        if( $this->input->post('submit') ){

            $this->admin->novoEmail();
        }

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/relacionamento/novoemail');
        $this->load->view('admin/templates/footer');

    }

    public function editar_email($id){

        $data['titulo'] = 'Editando e-mail'. $id;
        $data['pg_emails'] = true;

        if( $this->input->post('submit') ){

            $this->admin->editarEmail($id);
        }

        $data['email'] = $this->admin->dataEmail($id);

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/relacionamento/editaremail');
        $this->load->view('admin/templates/footer');

    }

    public function visualizar_email($id){

        $data['email'] = $this->admin->dataEmail($id);

        $data['titulo'] = 'Visualizando: '. $data['email']->assunto .' - '.$id;
        $data['pg_emails'] = true;

        

        $this->load->view('email/geral', $data);

    }

    public function excluir_usuario($id){

        $this->admin->ExcluirUsuario($id);

        redirect('backoffice/geadmin/usuarios');
    }

    public function tickets(){

        $data['titulo'] = 'Todos Tickets';

        $data['pg_tickets'] = true;

        $data['tickets'] = $this->admin->TodosTickets();

        $this->load->view('backoffice/admin/templates/header', $data);
        $this->load->view('backoffice/admin/tickets/todos');
        $this->load->view('backoffice/admin/templates/footer');
    }

    public function visualizar_ticket($id){

        $data['titulo'] = 'Visualizar Ticket';

        $data['pg_tickets'] = true;

        if($this->input->post('submit')){

            $this->admin->EnviarMensagemTicket($id);
        }

        $data['ticket'] = $this->admin->VisualizarTicket($id);
        $data['mensagens_ticket'] = $this->admin->MensagensTicket($id);

        $this->load->view('backoffice/admin/templates/header', $data);
        $this->load->view('backoffice/admin/tickets/visualizar');
        $this->load->view('backoffice/admin/templates/footer');

    }

    public function fechar_ticket($id){

        $this->admin->FecharTicket($id);

        redirect('backoffice/geadmin/tickets');
    }

    public function reabrir_ticket($id){

        $this->admin->ReabrirTicket($id);

        redirect('backoffice/geadmin/tickets');
    }

    public function notificacoes(){

        $data['titulo'] = 'Notificações';

        $data['pg_notificacoes'] = true;

        if($this->input->post('submit')){

            $data['message'] = $this->admin->EnviarNotificacao();
        }

        $this->load->view('backoffice/admin/templates/header', $data);
        $this->load->view('backoffice/admin/notificacoes/nova');
        $this->load->view('backoffice/admin/templates/footer');

    }

    public function senha(){

        $data['titulo'] = 'Alterar Senha';

        if($this->input->post('submit')){

            $data['message'] = $this->admin->MudarSenha();
        }

        $this->load->view('backoffice/admin/templates/header', $data);
        $this->load->view('backoffice/admin/senha');
        $this->load->view('backoffice/admin/templates/footer');
    }


    public function users(){

        $data['titulo'] = 'Usuários administrativos';

        $data['usuarios'] = $this->admin->TodosUsuariosAdmin();

        $this->load->view('backoffice/admin/templates/header', $data);
        $this->load->view('backoffice/admin/usuarios_admin/todos');
        $this->load->view('backoffice/admin/templates/footer');

    }

    public function novo_user_admin(){

        $data['titulo'] = 'Novo usuário administrativo';

        if($this->input->post('submit')){

            $data['message'] = $this->admin->AdicionarUsuarioAdministrativo();
        }

        $this->load->view('backoffice/admin/templates/header', $data);
        $this->load->view('backoffice/admin/usuarios_admin/novo');
        $this->load->view('backoffice/admin/templates/footer');

    }

    public function editar_user_admin($id){

        $data['titulo'] = 'Editar usuário administrativo';

        if($this->input->post('submit')){

            $data['message'] = $this->admin->AtualizarUsuarioAdministrativo($id);
        }

        $data['usuario'] = $this->admin->InformacaoUsuarioAdministrativo($id);

        $this->load->view('backoffice/admin/templates/header', $data);
        $this->load->view('backoffice/admin/usuarios_admin/editar');
        $this->load->view('backoffice/admin/templates/footer');
    }

    public function excluir_user_admin($id){

        $this->admin->ExcluirUsuarioAdministrativo($id);

        redirect('backoffice/geadmin/users');
    }

    


    public function logout(){

        $this->native_session->unset_userdata('user_id_admin');

        redirect('admin/login');
    }

}