<?php
class Admin_model extends CI_Model{

    public $array = array();
    public $bonus = array(5,3,1,1);

    public function __construct(){
        parent::__construct();

        $this->load->helper('data');
    }

    public function user($coluna){

        $sessao = $this->native_session->get('user_id_admin');

        $this->db->where('id', $sessao);
        $adm = $this->db->get('admin_login');

        $row = $adm->row();

        return $row->$coluna;
    }

    public function Login(){

        $login = $this->input->post('login');
        $senha = $this->input->post('senha');

        $this->db->where('login', $login);
        $this->db->where('senha', md5($senha));

        $login = $this->db->get('admin_login');

        if($login->num_rows() > 0){

            $this->native_session->set('user_id_admin', $login->row()->id);

            redirect('boadmin');
        }

        return '<div class="alert alert-danger text-center">Usuário ou senha inválidos.</div>';
    }

    public function Configuracoes(){

        $config = $this->db->get('website_config');

        return $config->row();
    }

    //////////////////////////////////////////////////////////////////////////////////////   CONFIGURAÇÕES


    public function AtualizarConfiguracoes(){

        //check_session_admin();

        $nome_site = $this->input->post('nome_site');
        $email_remetente = $this->input->post('email_remetente');
        
        $permitir_transferencia_membros = $this->input->post('permitir_transferencia_membros');
        $valor_minimo_transferencia = $this->input->post('valor_minimo_transferencia');
         
        $saque_disponivel = $this->input->post('saque_disponivel');
        $valor_maximo_saque = $this->input->post('valor_maximo_saque');
         
        $taxa_saque = $this->input->post('taxa_saque');
         
        $manutencao = $this->input->post('manutencao');
        $aviso = $this->input->post('aviso');
         
        $array_config = array(
            'nome_site'=>$nome_site,
            'email_remetente'=>$email_remetente,
                                                              
            'saque_disponivel'=>$saque_disponivel,
            'valor_maximo_saque'=>str_replace(",", ".", $valor_maximo_saque),
             
            'taxa_saque'=>str_replace(",", ".", $taxa_saque),
            'manutencao'=>$manutencao,
            'aviso'=>$aviso
        );

        if(!empty($_FILES['imagem_logo']['name'])){

            $config_login['upload_path'] = 'uploads';
            $config_login['allowed_types'] = 'bmp|gif|png|jpg|jpeg|pjpeg';
            $config_login['overwrite'] = true;
            $config_login['file_name'] = 'imagem_logo';

            $this->upload->initialize($config_login);

            $this->upload->do_upload('imagem_logo');
            $upload_login = $this->upload->data();

            $array_config['imagem_logo'] = $upload_login['file_name'];
        }

        if(!empty($_FILES['imagem_logo_backoffice']['name'])){

            $config_bo['upload_path'] = 'uploads';
            $config_bo['allowed_types'] = 'bmp|gif|png|jpg|jpeg|pjpeg';
            $config_bo['overwrite'] = true;
            $config_bo['file_name'] = 'imagem_logo_backoffice';

            $this->upload->initialize($config_bo);

            $this->upload->do_upload('imagem_logo_backoffice');
            $upload_bo = $this->upload->data();

            $array_config['imagem_logo_backoffice'] = $upload_bo['file_name'];
        }

        if(!empty($_FILES['imagem_logo_admin']['name'])){

            $config_admin['upload_path'] = 'uploads';
            $config_admin['allowed_types'] = 'bmp|gif|png|jpg|jpeg|pjpeg';
            $config_admin['overwrite'] = true;
            $config_admin['file_name'] = 'imagem_logo_admin';

            $this->upload->initialize($config_admin);

            $this->upload->do_upload('imagem_logo_admin');
            $upload_admin = $this->upload->data();

            $array_config['imagem_logo_admin'] = $upload_admin['file_name'];
        }

        if(!empty($_FILES['favicon']['name'])){

            $config_fav['upload_path'] = './uploads/';
            $config_fav['allowed_types'] = 'gif|png|jpg|jpeg|pjpeg|ico';
            $config_fav['overwrite'] = true;
            $config_fav['file_name'] = 'favicon';

            $this->upload->initialize($config_fav);

            $this->upload->do_upload('favicon');
            $upload_favicon = $this->upload->data();

            $array_config['favicon'] = $upload_favicon['file_name'];
        }

        $update = $this->db->update('website_config', $array_config);

        if($update){

            redirect('admin/configuracoes');
        }

        
        redirect('admin/configuracoes');

    }

//////////////////////////////////////////////////////////////////////////////////////   LISTA DE PRESENCA

    public function get_lista_presenca(){

        $result = $this->db->get("lista_presenca");

        if($result->num_rows() > 0){

            return $result->result();
        }
        return false;
    }

//////////////////////////////////////////////////////////////////////////////////////   PACOTES

    public function get_pacotes(){

        $result = $this->db->get("pacotes");

        if($result->num_rows() > 0){

            return $result->result();
        }
        return false;
    }

    public function get_pacote($pacoteID){

        $this->db->where("pacoteID",$pacoteID);
        $result = $this->db->get("pacotes");

        if($result->num_rows() > 0){

            return $result->row();
        }
        return false;
    }

    public function pacote($pacoteID=null){

        $campos = $this->input->post();
        
        if(empty($campos['pacoteImg'])){
            unset($campos['pacoteImg']);
        }else{

            $config_admin['upload_path'] = './uploads/';
            $config_admin['allowed_types'] = 'bmp|gif|png|jpg|jpeg|pjpeg';
            $config_admin['overwrite'] = true;
            $config_admin['file_name'] = $campo['pacoteNome'];

            $this->upload->initialize($config_admin);

            $this->upload->do_upload('logo_admin');
            $imgPacote = $this->upload->data();

            $campos['pacoteImg'] = $imgPacote['file_name'];
        }

        if($pacoteID == null ){

            $result = $this->db->insert('pacotes',$campos);

        }else{

            $this->db->where('pacoteID',$pacoteID);
            $result = $this->db->update('pacotes',$campos);

        }
        
        if($result){
            //$this->sucess('Pacote Salvo');
        }
        //$this->error('Erro ao salvar');

        redirect('admin/pacotes');
    }


























//////////////////////////////////////////////////////////////////////////////////////   INDEX

    public function Percentual($total, $parcial){

        $percentual = ($parcial * 100) / $total;

        return $percentual;

    }

    public function preCadastro(){

        return $this->db->get('precadastro')->num_rows();

    }


    public function UsuariosTotal(){

        $this->db->where('lider',0);
        $usuarios = $this->db->get('usuarios');

        if($usuarios->num_rows() > 0){

            return $usuarios->num_rows();
        }

        return false;
    }

    public function index(){

        $result = array();

        $result['total'] = $this->db->get('usuarios')->num_rows();

        $this->db->where( array('lider'=> 0, 'block'=>0 ) );
        $result['ativos'] = $this->db->get('usuarios')->num_rows();

        $this->db->where('block',1);
        $result['bloqueados'] = $this->db->get('usuarios')->num_rows();

        $data = strtotime(date('Y-m-d') )-86400;
        $this->db->where('dataCadastro >', date('Y-m-d H:i:s',$data) );
        $result['novos'] = $this->db->get('usuarios')->num_rows();

        return (object) $result;

    }

    public function UsuariosPendentes(){

        $this->db->where(array('ciclo'=>0, 'block'=>0) );
        $result = $this->db->get('usuarios')->result();

        return $result;
    }


    public function UsuariosCiclos($ciclo){

        $this->db->where( array('lider'=>0, 'ciclo'=>$ciclo ) );
        $usuarios = $this->db->get('usuarios');

        if($usuarios->num_rows() > 0){

            return $usuarios->num_rows();
        }

        return 0;
    }

    public function ExtratoGeral(){

        $data = strtotime( date('Y-m-d') )-86400;//-172800;

        $this->db->order_by('data','DESC');
        $this->db->where( array('id_user >'=> 0, 'data >'=> date('Y-m-d H:i:s', $data ) ));
        $extrato = $this->db->get('extrato');

        if($extrato->num_rows() > 0){

            return $extrato->result();
        }
    }












    
    
//////////////////////////////////////////////////////////////////////////////////////////////       USUARIOS


    public function Usuarios($block = null, $ciclo = null){

        if($ciclo != null){
            $this->db->where('ciclo', $ciclo);
        }
        if($block != null){
            $this->db->where('block', $block);
        }else{
            $this->db->where('block',0);
        }
        
        $usuarios = $this->db->get('usuarios');
        if($usuarios->num_rows() > 0){

            return $usuarios->result();
        }

        return false;
    }

    public function infoUser($id){

        $this->db->where_in('id', $id);
        $user = $this->db->get('usuarios');

        return $user->row();
    }
    public function extraInfoUser($id){
        $this->db->where_in('id_usuario', $id);
        $user = $this->db->get('usuarios_nivel');

        return $user->row();
    }

    public function indicador($id){

        $this->db->where('id_usuario',$id);
        $user = $this->db->get('indicadores')->row();

        $indicador = $user->id_indicador;

        return $indicador;
    }

    public function doacoesRecebidas($id){
        $this->db->where_in('id_recebedor', $id);
        $usuario = $this->db->get('doacoes');
        if($usuario->num_rows() > 0){

            return $usuario->result();
        }
        return false;
    }

    public function ExtratoUsuario($id){

        $this->db->order_by('data', 'DESC');
        $this->db->where('id_user', $id);

        $extrato = $this->db->get('extrato');

        if($extrato->num_rows() > 0){

            return $extrato->result();
        }

        return false;
    }

    public $uplines = array();
    public function ArvoreUplines($id, $niveis){

        if($niveis > 1){

            $this->db->where_in('id_usuario', $id);
            $indicadores = $this->db->get('indicadores');

            if($indicadores->num_rows() > 0){

                $row = $indicadores->row();
                $id = $row->id_indicador;
                $this->uplines[] = $id;
                $this->ArvoreUplines($id, $niveis-1);
            }
        }
    }

    public function Uplines($id){ 
        
        $this->ArvoreUplines($id, 5 );
        return $this->uplines;
    }



    public $familia = array();

    public function Rede($id, $ciclos = 1 , $nivel = 1){

        if($ciclos > 0){
            //INDICA O USUARIO MATRIZ
            $this->db->where('id_indicador', $id);
            $indicadores = $this->db->get('indicadores');

            if($indicadores->num_rows() > 0){
                //FAZ O LAÇO NO USUARIOS
                foreach($indicadores->result() as $row){
                    //TRAZ O ID DO DOWNLINE
                    $id_indicado = $row->id_usuario;
                    
                    $this->familia[$id][$id_indicado] = $id_indicado;

                    // foreach($this->familia as )
                    
                    //$this->Rede($id, $ciclos-1, $nivel+1);
                }
            }
        }
    }


    public function Familia($id){
        $this->Rede($id);        
        return $this->familia;
    }

    public function RedeNetos($id, $ciclos = 1 , $nivel = 1){
        $netos = array();

        if($ciclos > 0){
            //INDICA O USUARIO MATRIZ
            $this->db->where('id_indicador', $id);
            $indicadores = $this->db->get('indicadores');

            if($indicadores->num_rows() > 0){
                //FAZ O LAÇO NO USUARIOS
                foreach($indicadores->result() as $row){
                    //TRAZ O ID DO DOWNLINE
                    $id_indicado = $row->id_usuario;
                    
                    $netos[$id_indicado] = $id_indicado;

                    $this->RedeNetos($id, $ciclos-1, $nivel+1);
                }
            }
        }

        return $netos;
    }

    public function RedeBisnetos($id, $ciclos = 1 , $nivel = 1){
        $bisnetos = array();

        if($ciclos > 0){
            //INDICA O USUARIO MATRIZ
            $this->db->where('id_indicador', $id);
            $indicadores = $this->db->get('indicadores');

            if($indicadores->num_rows() > 0){
                //FAZ O LAÇO NO USUARIOS
                foreach($indicadores->result() as $row){
                    //TRAZ O ID DO DOWNLINE
                    $id_indicado = $row->id_usuario;
                    
                    $bisnetos[$id_indicado] = $id_indicado;

                    $this->Redebisnetos($id, $ciclos-1, $nivel+1);
                }
            }
        }

        return $bisnetos;
    }


    public function RedeTataranetos($id, $ciclos = 1 , $nivel = 1){
        $tataranetos = array();

        if($ciclos > 0){
            //INDICA O USUARIO MATRIZ
            $this->db->where('id_indicador', $id);
            $indicadores = $this->db->get('indicadores');

            if($indicadores->num_rows() > 0){
                //FAZ O LAÇO NO USUARIOS
                foreach($indicadores->result() as $row){
                    //TRAZ O ID DO DOWNLINE
                    $id_indicado = $row->id_usuario;
                    
                    $tataranetos[$id_indicado] = $id_indicado;

                    $this->RedeTataranetos($id, $ciclos-1, $nivel+1);
                }
            }
        }

        return $tataranetos;
    }

    public function todosAfiliados(){
       
        $afiliados = $this->db->get('afiliados');

        if( $afiliados->num_rows() > 0){

            return $afiliados->result();
        }

        return false;
    }

    public function requestAfiliado($id){

        $this->db->where('idAfiliado',$id);
        $afiliados = $this->db->get('afiliados');

        if( $afiliados->num_rows() > 0){

            return $afiliados->row();
        }

        return false;
    }

    public function salvarAfiliado($id = null){

        if( $id != null){

            $array = array(
                'email'=>$this->input->post('email'),
                'contas'=> $this->input->post('contas'),
                'telefone'=>$this->input->post('telefone')
            );

            if(!empty( $this->input->post('senha') )  ){
                $array['senha'] = md5( $this->input->post('senha') );
            }
            
            $this->db->where('idAfiliado',$id);
            $afiliados = $this->db->update('afiliados', $array);

            $this->native_session->set_flashdata('mensagem', '<div class="alert alert-success text-center"> Afiliado editado </div>');
            
        }else{

            $array = array(
                'nome'=>$this->input->post('nome'),
                'email'=>$this->input->post('email'),
                'telefone'=>$this->input->post('telefone'),
                'contas'=> $this->input->post('contas'),
                'senha'=>md5($this->input->post('senha') ), 
                'rastreamento'=>md5($this->input->post('telefone') ),
            );
            
            $url = base_url().'?af='.md5($this->input->post('senha') );           

            $googer = new GoogleURLAPI('AIzaSyAiFliuMz-qTOFefF3hxQeuiho0OLfx_co');

            $array['encurtado'] = $googer->shorten( $url );
            
            $afiliados = $this->db->insert('afiliados', $array);

            $this->native_session->set_flashdata('mensagem', '<div class="alert alert-success text-center"> Afiliado salvo </div>');
        }
    }


    public function IndicadosUsuario($id){

        $query = $this->db->query("SELECT u.* FROM patrocinadores AS p INNER JOIN usuarios AS u ON u.id = p.id_usuario WHERE p.id_patrocinador = '$id'");

        if($query->num_rows() > 0){

            return $query->result();
        }

        return false;
    }


    public function DadosPessoais($id){

        $nome = $this->input->post('nome');
        $sobrenome = $this->input->post('sobrenome');
        $email = $this->input->post('email');
        $cpf = $this->input->post('cpf');
        $nascimento = converter_data($this->input->post('nascimento'));
        $celular = preg_replace("/\(|\)|\-/", "", $this->input->post('celular'));
        $ddd = substr($celular, 0, 2);
        $tel = substr($celular, 2, 10);

        $array_usuario = array(
            'nome'=>$nome,
            'sobrenome'=>$sobrenome,
            'email'=>$email,
            'cpf'=>$cpf,
            'nascimento'=>$nascimento,
            'ddd'=>$ddd,
            'celular'=>$tel
        );

        $this->db->where('id', $id);
        $update = $this->db->update('usuarios', $array_usuario);


        if($update){

            return '<div class="alert alert-success text-center">Usuário atualizado com sucesso!</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao atualizar usuário.</div>';

    }

    public function Conta($id){

        $login = $this->input->post('login');
        $ciclo = $this->input->post('ciclo');
        $nivel = $this->input->post('nivel');
        $block = $this->input->post('block');
        $lider = $this->input->post('lider');

        $recebido = $this->input->post('recebido');
        $doado = $this->input->post('doado');

        $indicador = $this->input->post('indicador');

        $array_usuario = array(
            'login'=>$login,
            'ciclo'=>$ciclo,
            'nivel'=>$nivel,
            'block'=>$block,
            'lider'=>$lider,
        );

        $this->db->where('id', $id);
        $update = $this->db->update('usuarios', $array_usuario);

        $array_indicador = array(
            'id_indicador'=>$indicador,
        );

        $this->db->where('id_usuario', $id);
        $update = $this->db->update('indicadores', $array_indicador);

        $array_usuario = array(
            'total_doado'=>$doado,
            'total_recebido'=>$recebido,
        );

        $this->db->where('id_usuario', $id);
        $update = $this->db->update('usuarios_nivel', $array_usuario);

        if($update){

            return '<div class="alert alert-success text-center">Usuário atualizado com sucesso!</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao atualizar usuário.</div>';
    }

    public function Config($id){

        $login = $this->input->post('login');
        $ciclo = $this->input->post('ciclo');
        $nivel = $this->input->post('nivel');
        $block = $this->input->post('block');
        $lider = $this->input->post('lider');

        $array_usuario = array(
            'login'=>$login,
            'ciclo'=>$ciclo,
            'nivel'=>$nivel,
            'block'=>$block,
            'lider'=>$lider,
        );

        $this->db->where('id', $id);
        $update = $this->db->update('usuarios', $array_usuario);

        $_POST = array();

        if($update){

            return '<div class="alert alert-success text-center">Usuário atualizado com sucesso!</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao atualizar usuário.</div>';
    }

    public function Senha($id){
        
        $senha = $this->input->post('nova_senha');
        $confirmasenha = $this->input->post('confirmar_senha');

        if($senha == $confirmasenha){


            $array_usuario = array();

            if(!empty($senha)){
                $array_usuario['senha'] = md5($senha);
            }

            $this->db->where('id', $id);
            $update = $this->db->update('usuarios', $array_usuario);

            if($update){

                return '<div class="alert alert-success text-center">Senha atualizada com sucesso!</div>';
            }

            return '<div class="alert alert-danger text-center">Erro ao atualizar a senha.</div>';

        }
        
       return '<div class="alert alert-danger text-center">As senhas não conferem.</div>';

       
    }

    public function ExcluirUsuario($id){

        check_session_admin();

        $this->db->where('id', $id);
        $this->db->delete('usuarios');

        $this->db->where('id_user', $id);
        $this->db->delete('extrato');

        $this->db->where('id_user', $id);
        $this->db->delete('faturas');

        $this->db->where('id_user', $id);
        $this->db->delete('notificacoes');

        $this->db->where('id_patrocinador', $id);
        $this->db->delete('patrocinadores');

        $this->db->where('id_usuario', $id);
        $this->db->delete('patrocinadores');

        $this->db->where('id_user', $id);
        $this->db->delete('saques');

        $this->db->where('id_user', $id);
        $this->db->delete('tickets');
    }

    public function emails(){

        $emails = $this->db->get('automacao');

        if($emails->num_rows() > 0 ){
            return $emails->result();
        }
        return false;
    }



    public function novoEmail(){

        $assunto = $this->input->post('assunto');
        $filtro =  $this->input->post('filtro');
        $corpo = $this->input->post('corpo');

        if( !empty($assunto) AND !empty($filtro) AND !empty($corpo)){

            $saveEmail = $this->db->insert('automacao', array( 'date'=> date('Y-m-d', strtotime( date('Y-m-d') . ' +1 day') ), 'assunto'=>$assunto, 'corpo'=>$corpo,'filtros'=> serialize($filtro) ));

            if($saveEmail){

                redirect('boadmin/emails');
            }
            
            $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger text-center"> Erro ao salvar seu email</div>');
            return false;
        }


        $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger text-center"> Preencha todos os campos</div>');  
    }

    public function editarEmail($id){

        $assunto = $this->input->post('assunto');
        $filtro =  $this->input->post('filtro');
        $corpo = $this->input->post('corpo');

        if( !empty($assunto) AND !empty($filtro) AND !empty($corpo)){

            $this->db->where('id',$id);
            $saveEmail = $this->db->update('automacao', array( 'date'=> date('Y-m-d 04:00:00', strtotime( date('Y-m-d') . ' +1 day') ), 'assunto'=>$assunto, 'corpo'=>$corpo,'filtros'=> serialize($filtro) ));

            if($saveEmail){

                redirect('boadmin/emails');
            }
            
            $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger text-center"> Erro ao salvar seu email</div>');
            return false;
        }


        $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger text-center"> Preencha todos os campos</div>');
    }

    public function dataEmail($id){

        $this->db->where('id',$id);
        $emails = $this->db->get('automacao');

        if($emails->num_rows() > 0 ){

            return $emails->row();
        }

        return false;
    }

    public function segmentacao(){
        return false;
    }



    public function TodasFaturas(){

        $this->db->query('SET SQL_BIG_SELECTS=1');
        $faturas = $this->db->query("SELECT f.id, f.quantidade_cotas AS quantidade, f.status AS status_number, IF(f.status = 0, '<font color=\"orange\"><b>Pendente</b></font>', '<font color=\"green\"><b>Pago</b></font>') AS status, IF(f.renovacao = 0, 'Não', 'Sim') AS renovacao, IF(c.comprovante, 'Enviado', 'Não Enviado') as comprovante_text, u.nome, c.comprovante AS link_comprovante FROM faturas AS f LEFT JOIN comprovantes AS c ON c.id_fatura = f.id INNER JOIN usuarios AS u ON u.id = f.id_user");

        if($faturas->num_rows() > 0){

            return $faturas->result();
        }

        return false;
    }

    public function ArvoreIndicacao($id, $niveis){

        if($niveis > 0){

            $this->db->where('id_usuario', $id);
            $patrocinadores = $this->db->get('patrocinadores');

            if($patrocinadores->num_rows() > 0){

                $row = $patrocinadores->row();

                $id = $row->id_patrocinador;

                $this->array[] = $id;

                $this->ArvoreIndicacao($id, $niveis-1);
            }
        }
    }


    public function LiberarFatura($id){

        check_session_admin();

        $this->db->where('id', $id);
        $fatura = $this->db->get('faturas');
        $row = $fatura->row();
        
        $id_user_fatura = $row->id_user;

    
        // $this->db->where('id', $id_user_fatura);
        // $user_account = $this->db->get('usuarios');
        // $row_uaccount = $user_account->row();

        // $login = $row_uaccount->login; //pegando o login para aplicar comissão no extrato

    
/* ---------------------------------------------------- COMISSAO AO INDICADOR É PAGA NO ATO DA LIBERAÇAO DA FATURA */

        $this->ArvoreIndicacao($id_user_fatura, 1);

        $ids_arvore = $this->array;

        if(!empty($ids_arvore)){

            foreach($ids_arvore as $key=>$val){

                $user_indicador = $this->db->query("SELECT * FROM usuarios WHERE id = '$val'");

                if($user_indicador->num_rows() > 0){

                    $row_indicador = $user_indicador->row();

                    $percentual = $this->bonus[$key] / 100;     
                    $comissaoAPagar = ( ($row->quantidade_cotas * config_site('valor_cota')) * $percentual);
                    $comissao = $row_indicador->saldo_comissao + $comissaoAPagar;

                    $pontos_indicacao = $row_indicador->pontos_indicacao + ($comissaoAPagar / 5);

                    $this->db->where('id', $row_indicador->id);
                    $this->db->update('usuarios', array('saldo_comissao'=>$comissao, 'pontos_indicacao'=>$pontos_indicacao ));

                    $this->conta_model->InserirExtrato($row_indicador->id, 'Comissão de '.$this->bonus[$key].'% pela indicação do usuário '.$login, $comissaoAPagar, 'green');

                    $this->conta_model->InserirExtrato($row_indicador->id, $pontos_indicacao.' pontos por indicação foram créditados.'.$login, '-' , 'green');

                }

            }

        }

/* ---------------------- LIBERAÇÃO DO ATIVO AO DAR BAIXA NA FATURA COMO PAGA DEFINIÇÃO DOS PARAMENTROS DE CICLO E EXPIRAÇÃO  */

        $ciclo = Recebimentos(date('Y-m-d'), config_site('validade_cotas'));

        $data_primeiro_recebimento = $ciclo['primeiro_recebimento'].' '.config_site('hora_pagamento').':00';
        $data_ultimo_recebimento = $ciclo['ultimo_recebimento'].' '.config_site('hora_pagamento').':00';

        $primeiro_recebimento = strtotime($data_primeiro_recebimento);
        $ultimo_recebimento = strtotime($data_ultimo_recebimento);

        //Insere o ativo e define estágio X(aguardando vinculo para bonificação)
        $array_ativos = array(
                'id_user'=>$row->id_user,
                'quantidade'=>$row->quantidade_cotas,
                'primeiro_recebimento'=>$primeiro_recebimento,
                'ultimo_recebimento'=>$ultimo_recebimento,
                'status'=> 1,
                'estagio'=>'X'
            );

        $this->db->insert('cotas', $array_ativos);
        $id_ativo = $this->db->insert_id();

        //Dá baixa na fatura
        $this->db->where('id', $row->id); 
        $this->db->update('faturas', array('status'=> 1, 'id_cota'=>$id_ativo, 'baixa'=> date('Y-m-d H:i')));

        //Insere a informação no extrato
        $this->conta_model->InserirExtrato($row->id_user, 'Ativos #'.$id_ativo.' liberados. Fatura #'.$row->id.' liquidada', '-', 'black');

        //Trazer saldo atual do usuario em questão
        $this->db->where('id',$id_user_fatura);
        $users = $this->db->get('usuarios');
        $user = $users->row();
        $saldo_atual = $user->saldo_disponivel;
        $novo_saldo = ($row->quantidade_cotas*config_site('valor_cota') ) + $saldo_atual ;
        $pontos_invest_atual = $user->pontos_invest;
        $novo_saldo_pontos = ($row->quantidade_cotas*10) + $pontos_invest_atual;        

        //Insere saldo disponível somando ao já existente
        $this->db->where('id', $id_user_fatura);
        $this->db->update('usuarios', array('saldo_disponivel'=>$novo_saldo,'pontos_invest'=>$novo_saldo_pontos ));


    }

    
    public function TodosSaques(){

        if($this->input->post('submit')){

            $filtro = $this->input->post('tf');

            switch($filtro){

                case 1:

                $saques = $this->db->query("SELECT u.banco, u.agencia, u.conta, u.tipo_conta, u.titular, u.cpf, s.* FROM saques AS s INNER JOIN usuarios AS u ON u.id = s.id_user WHERE s.status = '1'");

                break;

                case 2:

                $saques = $this->db->query("SELECT u.banco, u.agencia, u.conta, u.tipo_conta, u.titular, u.cpf, s.* FROM saques AS s INNER JOIN usuarios AS u ON u.id = s.id_user WHERE s.status = '0'");

                break;

                case 3:

                $saques = $this->db->query("SELECT u.banco, u.agencia, u.conta, u.tipo_conta, u.titular, u.cpf, s.* FROM saques AS s INNER JOIN usuarios AS u ON u.id = s.id_user");

                break;

                case 4:

                $saques = $this->db->query("SELECT u.banco, u.agencia, u.conta, u.tipo_conta, u.titular, u.cpf, s.* FROM saques AS s INNER JOIN usuarios AS u ON u.id = s.id_user WHERE s.status = '2'");

                break;

                default:

                $saques = $this->db->query("SELECT u.banco, u.agencia, u.conta, u.tipo_conta, u.titular, u.cpf, s.* FROM saques AS s INNER JOIN usuarios AS u ON u.id = s.id_user");

                break;
            }

        }else{

        $saques = $this->db->query("SELECT u.banco, u.agencia, u.conta, u.tipo_conta, u.titular, u.cpf, s.* FROM saques AS s INNER JOIN usuarios AS u ON u.id = s.id_user");

        }

        if($saques->num_rows() > 0){

            return $saques->result();
        }

        return false;
    }

    public function Saque($id){

        $saque = $this->db->query("SELECT u.login, u.nome, u.email, u.cpf, u.banco, u.agencia, u.conta, u.tipo_conta, u.titular, u.data_cadastro, s.* FROM saques AS s INNER JOIN usuarios AS u ON u.id = s.id_user WHERE s.id = '$id'");

        return $saque->row();

    }

    public function PagarSaque($id){

        check_session_admin();

        $this->db->where('id', $id);
        $this->db->where('status', 0);
        $saque = $this->db->get('saques');

        if($saque->num_rows() > 0){

            $row = $saque->row();

            $id_user = $row->id_user;
            $valor = $row->valor;

            $this->db->where('id', $id_user);
            $user = $this->db->get('usuarios');

            $row_user = $user->row();

            $novo_saldo_bloqueado = $row_user->saldo_bloqueado - $valor;

            $this->db->where('id', $id_user);
            $this->db->update('usuarios', array('saldo_bloqueado'=>$novo_saldo_bloqueado));

            $this->db->where('id', $id);
            $this->db->update('saques', array('status'=>1, 'data_baixa'=>date('Y-m-d') ) );

            $this->conta_model->InserirExtrato($row_user->id, 'Sua solicitação de saque #'.$id.' foi efetuada.', '-'.$valor, 'red');
        }
    }


    public function EstornarSaque($id){

        check_session_admin();

            $this->db->where('id', $id);
            $this->db->where('status', 0);
            $saque = $this->db->get('saques');

            if($saque->num_rows() > 0){

                $row = $saque->row();

                $id_user = $row->id_user;
                $valor = $row->valor;

                $this->db->where('id', $id_user);
                $user = $this->db->get('usuarios');

                $row_user = $user->row();

                $percentual = config_site('taxa_saque') / 100;

                $novo_saldo_bloqueado = $row_user->saldo_bloqueado - $valor;
                $novo_saldo_disponivel = $row_user->saldo_disponivel + ($valor + ($valor * $percentual));

                $this->db->where('id', $id_user);
                $this->db->update('usuarios', array('saldo_bloqueado'=>$novo_saldo_bloqueado, 'saldo_disponivel'=>$novo_saldo_disponivel));

                $this->db->where('id', $id);
                $this->db->update('saques', array('status'=>2));

                $this->conta_model->InserirExtrato($row_user->id, 'Sua solicitação de saque #'.$id.' foi estornada.', $valor, 'purple');
            }
        
    }

    public function TodosTickets(){

        $tickets = $this->db->query("SELECT u.login, t.* FROM tickets AS t INNER JOIN usuarios AS u ON u.id = t.id_user");

        if($tickets->num_rows() > 0){

            return $tickets->result();
        }

        return false;
    }

    public function VisualizarTicket($id){

        $this->db->where('id', $id);
        $ticket = $this->db->get('tickets');

        return $ticket->row();
    }

    public function MensagensTicket($id){

        $mensagens = $this->db->query("SELECT u.nome, tm.* FROM tickets_mensagem AS tm INNER JOIN tickets AS t ON t.id = tm.id_ticket INNER JOIN usuarios AS u ON u.id = t.id_user WHERE tm.id_ticket = '$id' ORDER BY data ASC");

        if($mensagens->num_rows() > 0){

            return $mensagens->result();
        }

        return false;
    }

    public function EnviarMensagemTicket($id){

        $resposta = $this->input->post('resposta');

        $this->db->where('id', $id);
        $ticket = $this->db->get('tickets');
        $row = $ticket->row();

        $id_user = $row->id_user;

        $array_mensagem = array(
                                                        'id_ticket'=>$id,
                                                        'mensagem'=>$resposta,
                                                        'user'=>0,
                                                        'data'=>time()
                                                        );

        $this->db->insert('tickets_mensagem', $array_mensagem);

        $this->db->where('id', $id);
        $this->db->update('tickets', array('status'=>1));

        $array_notificacao = array(
                                                        'id_user'=>$id_user,
                                                        'mensagem'=>'Nova resposta em <b>"'.$row->titulo.'"</b>',
                                                        'visto'=>0,
                                                        'data'=>time()
                                                        );

        $this->db->insert('notificacoes', $array_notificacao);
    }

    public function FecharTicket($id){

        check_session_admin();

        $ticket = $this->VisualizarTicket($id);

        $this->db->where('id', $id);
        $this->db->update('tickets', array('status'=>2));

        $array_notificacao = array(
                                                        'id_user'=>$ticket->id_user,
                                                        'mensagem'=>'Ticket fechado <b>"'.$ticket->titulo.'"</b>',
                                                        'visto'=>0,
                                                        'data'=>time()
                                                        );

        $this->db->insert('notificacoes', $array_notificacao);
    }

    public function ReabrirTicket($id){

        check_session_admin();

        $ticket = $this->VisualizarTicket($id);

        $this->db->where('id', $id);
        $this->db->update('tickets', array('status'=>3));

        $array_notificacao = array(
                                                        'id_user'=>$ticket->id_user,
                                                        'mensagem'=>'Ticket Re-aberto <b>"'.$ticket->titulo.'"</b>',
                                                        'visto'=>0,
                                                        'data'=>time()
                                                        );

        $this->db->insert('notificacoes', $array_notificacao);
    }

    public function EnviarNotificacao(){

        check_session_admin();

        $notificacao = $this->input->post('notificacao');

        $usuarios = $this->db->get('usuarios');

        if($usuarios->num_rows() > 0){

            foreach($usuarios->result() as $usuario){

                $array_notificacao = array(
                        'id_user'=>$usuario->id,
                        'mensagem'=>$notificacao,
                        'visto'=>0,
                        'data'=>time()
                );

                $insert = $this->db->insert('notificacoes', $array_notificacao);
            }

            if(isset($insert) && $insert == true){

                return '<div class="alert alert-success text-center">Notificação enviada com sucesso!</div>';
            }

            return '<div class="alert alert-danger text-center">Erro ao enviar notificação.</div>';

        }

        return '<div class="alert alert-danger text-center">Não existe nenhum usuário cadastrado no sistema.</div>';
    }

    public function MudarSenha(){

        $sessao = $this->native_session->get('user_id_admin');

        $senha = $this->input->post('senha');

        $array_pw = array(
                                        'senha'=>md5($senha)
                                        );

        $this->db->where('id', $sessao);
        $update = $this->db->update('admin_login', $array_pw);

        if($update){

            return '<div class="alert alert-success text-center">Senha atualizada com sucesso!</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao atualizar senha.</div>';
    }

    public function TodosUsuariosAdmin(){

        $usuarios = $this->db->get('admin_login');

        return $usuarios->result();
    }

    public function AdicionarUsuarioAdministrativo(){

        check_session_admin();

        $nome = $this->input->post('nome');
        $login = $this->input->post('login');
        $senha = $this->input->post('senha');

        $array_usuario = array(
                                                    'nome'=>$nome,
                                                    'login'=>$login,
                                                    'senha'=>md5($senha)
                                                    );

        $this->db->where('login', $login);
        $users = $this->db->get('admin_login');

        if($users->num_rows() > 0){

            return '<div class="alert alert-danger text-center>O login já existe. Escolha outro.</div>';
        }

        $insert = $this->db->insert('admin_login', $array_usuario);

        if($insert){

            return '<div class="alert alert-success text-center">Usuário adicionado com sucesso!</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao adicionar usuário.</div>';
    }

    public function InformacaoUsuarioAdministrativo($id){

        $this->db->where('id', $id);
        $usuario = $this->db->get('admin_login');

        return $usuario->row();
    }

    public function AtualizarUsuarioAdministrativo($id){

        check_session_admin();

        $nome = $this->input->post('nome');
        $senha = $this->input->post('senha');

        $array_usuario = array(
                                                    'nome'=>$nome
                                                    );

        if(!empty($senha)){

            $array_usuario['senha'] = md5($senha);
        }

        $this->db->where('id', $id);
        $update = $this->db->update('admin_login', $array_usuario);

        if($update){

            return '<div class="alert alert-success text-center">Dados atualizados com sucesso!</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao atualizar usuário.</div>';
    }

    public function ExcluirUsuarioAdministrativo($id){

        check_session_admin();

        $this->db->where('id', $id);
        $this->db->delete('admin_login');
    }

    

    public function Cron(){

        //check_session_admin(); //VERIFICA SE HA SESSAO DO ADMINISTRADOR

        $cron = $this->db->get('cron');

        return $cron->row();
    }

    public function ContasBancarias(){

        $contas = $this->db->get('contas_bancarias');

        if($contas->num_rows() > 0){

            return $contas->result();
        }

        return false;
    }

    public function NovaContaBancaria(){

        $banco = $this->input->post('banco');
        $agencia = $this->input->post('agencia');
        $conta = $this->input->post('conta');
        $tipo_conta = $this->input->post('tipo_conta');
        $titular = $this->input->post('titular');

        $array_conta = array(
                                            'banco'=>$banco,
                                            'agencia'=>$agencia,
                                            'conta'=>$conta,
                                            'tipo_conta'=>$tipo_conta,
                                            'titular'=>$titular
                                            );

        $insert = $this->db->insert('contas_bancarias', $array_conta);

        if($insert){

            return '<div class="alert alert-success text-center">Conta bancária adicionada com sucesso!</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao adicionar conta bancária.</div>';
    }

    public function InformacaoContaBancaria($id){

        $this->db->where('id', $id);
        $conta = $this->db->get('contas_bancarias');

        return $conta->row();
    }

    public function EditarContaBancaria($id){

        $banco = $this->input->post('banco');
        $agencia = $this->input->post('agencia');
        $conta = $this->input->post('conta');
        $tipo_conta = $this->input->post('tipo_conta');
        $titular = $this->input->post('titular');

        $array_conta = array(
                                            'banco'=>$banco,
                                            'agencia'=>$agencia,
                                            'conta'=>$conta,
                                            'tipo_conta'=>$tipo_conta,
                                            'titular'=>$titular
                                            );

        $this->db->where('id', $id);
        $update= $this->db->update('contas_bancarias', $array_conta);

        if($update){

            return '<div class="alert alert-success text-center">Conta bancária atualizada com sucesso!</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao atualizar conta bancária.</div>';
    }

    public function ExcluirContaBancaria($id){

        check_session_admin();

        $this->db->where('id', $id);
        $this->db->delete('contas_bancarias');
    }

    public function TodosBilhetes(){

        $query = $this->db->query("SELECT b.numero_sorte, u.login, u.nome FROM bilhetes AS b INNER JOIN usuarios AS u ON u.id = b.id_user");

        if($query->num_rows() > 0){

            return $query->result();
        }

        return false;
    }

    public function TotalBilhetesComprados($id){

        $this->db->where('id_user', $id);
        $bilhetes = $this->db->get('bilhetes');

        return $bilhetes->num_rows();
    }

    public function LimparBilhetes(){

        check_session_admin();

        $this->db->query("DELETE FROM bilhetes");

        return true;
    }

    public function CadastrarProdutoLeilao(){

        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'jpg|jpeg|pjpeg|pjpg|png|bmp|gif';
        $config['encrypt_name'] = true;

        $nome = $this->input->post("nome");
        $valor_original = $this->input->post('original');
        $descricao = $this->input->post('descricao');
        $inicio = $this->input->post('inicio');
        $fim = $this->input->post('fim');
        $robo = $this->input->post('robo');

        if(!empty($_FILES["fotos"]["tmp_name"][0])){

            $separa_inicio = explode(" ", $inicio);

            $data_inicio_leilao = converter_data($separa_inicio[0]);
            $hora_inicio_leilao = $separa_inicio[1];

            $data_inicio = strtotime($data_inicio_leilao.' '.$hora_inicio_leilao);


            $separa_fim = explode(" ", $fim);

            $data_fim_leilao = converter_data($separa_fim[0]);
            $hora_fim_leilao = $separa_fim[1];

            $data_fim = strtotime($data_fim_leilao.' '.$hora_fim_leilao);

            $array_produtos = array(
                                                        'titulo'=>$nome,
                                                        'valor_original'=>$valor_original,
                                                        'detalhes'=>$descricao,
                                                        'lance_robo'=>$robo,
                                                        'status'=>1,
                                                        'data_inicio'=>$data_inicio,
                                                        'data_fim'=>$data_fim
                                                        );

            $this->my_upload->initialize($config);

            if( $this->my_upload->do_multi_upload('fotos')){

                $add = $this->db->insert('leilao_produtos', $array_produtos);

                $id_produto = $this->db->insert_id();

                $retorno_fotos = $this->my_upload->get_multi_upload_data();

                foreach($retorno_fotos as $foto_array){

                    $miniatura = $this->imagem->GerarImagem($foto_array['file_name'], 110, 110);
                    $media = $this->imagem->GerarImagem($foto_array['file_name'], 438, 438);
                    $grande = $this->imagem->GerarImagem($foto_array['file_name'], 720, 720);

                    $array_imagem = array(
                                                                'id_produto'=>$id_produto,
                                                                'miniatura'=>$miniatura,
                                                                'media'=>$media,
                                                                'grande'=>$grande
                                                                );

                    $this->db->insert('leilao_produtos_imagens', $array_imagem);
                }

                if($add){

                    return '<div class="alert alert-success text-center">Produto cadastrado com sucesso!</div>';
                }else{
                    
                    return '<div class="alert alert-danger text-center">Erro ao cadastrar o produto. Tente novamente.</div>';
                }

            }else{

                return '<div class="alert alert-danger text-center">Erro no upload: '.$this->my_upload->display_errors().'</div>';
            }

        }else{

            return '<div class="alert alert-danger text-center">Selecione ao menos 1 foto</div>';
        }
    }

    public function LeiloesAndamento(){

        $this->db->where('status', 1);
        $leiloes = $this->db->get('leilao_produtos');

        if($leiloes->num_rows() > 0){

            return $leiloes->result();
        }

        return false;
    }

    public function LeiloesFinalizados(){

        $this->db->where('status', 2);
        $leiloes = $this->db->get('leilao_produtos');

        if($leiloes->num_rows() > 0){

            return $leiloes->result();
        }

        return false;
    }

    public function InformacoesLeilao($id){

        $this->db->where('id', $id);
        $leilao = $this->db->get('leilao_produtos');

        return $leilao->row();
    }

    public function NomeUsuario($id, $robo = 0){

        $this->db->where('id', $id);

        if($robo == 0){
            $user = $this->db->get('usuarios');
        }else{
            $user = $this->db->get('leilao_robos');
        }

        $row = $user->row();

        return $row->nome;
    }

    public function TotalDeLances($id){

        $this->db->where('id_produto', $id);
        $lances = $this->db->get('leilao_lances');

        return $lances->num_rows();
    }

    public function GanhadorLeilao($id){

        $query = $this->db->query("SELECT u.id, u.nome FROM leilao_lances AS ll INNER JOIN usuarios AS u ON u.id = ll.id_usuario WHERE ll.id_produto = '$id' AND ll.robo = '0' ORDER BY ll.id DESC");

        if($query->num_rows() > 0){

            $row = $query->row();

            return '<a href="'.base_url('geadmin/usuarios/visualizar/'.$row->id).'">'.$row->nome.'</a>';
        }

       $query2 = $this->db->query("SELECT * FROM leilao_lances AS ll INNER JOIN leilao_robos AS rb ON rb.id = ll.id_usuario WHERE ll.robo = '1'  ORDER BY ll.id DESC");

        if($query->num_rows() > 0){

            return 'O ganhador foi um rôbo do sistema';
        }

        return 'Não houve nenhum ganhador';
    }

    public function LancesLeilao($id, $quantidade){

        $this->db->where('id_produto', $id);
        $this->db->order_by('id', 'DESC');
        $this->db->limit($quantidade);
        $lances = $this->db->get('leilao_lances');

        if($lances->num_rows() > 0){

            return $lances->result();
        }

        return false;
    }

    public function ExcluirFotoLeilao(){

        $id = $this->input->post('id');

        $this->db->where('id', $id);
        $img = $this->db->get('leilao_produtos_imagens');

        $miniatura = './uploads/'.$img->miniatura;
        unlink($miniatura);
        $media = './uploads/'.$img->media;
        unlink($media);
        $grande = './uploads/'.$img->grande;
        unlink($grande);

        $deleta = $this->db->delete('leilao_produtos_imagens');  

        if($deleta){

            return 'true';
        }

        return 'Não foi possível fazer a exclusão, ocorreu um erro no MySQL';
    }

    public function EditarProdutoLeilao($id){

        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'jpg|jpeg|pjpeg|pjpg|png|bmp|gif';
        $config['encrypt_name'] = true;

        $nome = $this->input->post("nome");
        $valor_original = $this->input->post('original');
        $descricao = $this->input->post('descricao');
        $inicio = $this->input->post('inicio');
        $fim = $this->input->post('fim');
        $robo = $this->input->post('robo');

            $separa_inicio = explode(" ", $inicio);

            $data_inicio_leilao = converter_data($separa_inicio[0]);
            $hora_inicio_leilao = $separa_inicio[1];

            $data_inicio = strtotime($data_inicio_leilao.' '.$hora_inicio_leilao);


            $separa_fim = explode(" ", $fim);

            $data_fim_leilao = converter_data($separa_fim[0]);
            $hora_fim_leilao = $separa_fim[1];

            $data_fim = strtotime($data_fim_leilao.' '.$hora_fim_leilao);

            $array_produtos = array(
                                                        'titulo'=>$nome,
                                                        'valor_original'=>$valor_original,
                                                        'detalhes'=>$descricao,
                                                        'lance_robo'=>$robo,
                                                        'status'=>1,
                                                        'data_inicio'=>$data_inicio,
                                                        'data_fim'=>$data_fim
                                                        );


            $this->db->where('id', $id);

            $update = $this->db->update('leilao_produtos', $array_produtos);

            if(!empty($_FILES["fotos"]["tmp_name"][0])){

                $this->my_upload->initialize($config);

                if($this->my_upload->do_multi_upload('fotos')){

                    $retorno_fotos = $this->my_upload->get_multi_upload_data();

                    foreach($retorno_fotos as $foto_array){

                        $miniatura = $this->imagem->GerarImagem($foto_array['file_name'], 110, 110);
                        $media = $this->imagem->GerarImagem($foto_array['file_name'], 438, 438);
                        $grande = $this->imagem->GerarImagem($foto_array['file_name'], 720, 720);

                        $array_imagem = array(
                                                                    'id_produto'=>$id,
                                                                    'miniatura'=>$miniatura,
                                                                    'media'=>$media,
                                                                    'grande'=>$grande
                                                                    );

                        $this->db->insert('leilao_produtos_imagens', $array_imagem);
                    }
                }else{

                    return $this->my_upload->display_errors();
                }
        }

        if($update){

            return '<div class="alert alert-success text-center">Produto editado com sucesso!</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao editar produto. Tente novamente.</div>';

    }

    public function ExcluirLeilao($id){

        check_session_admin();

        $this->db->where('id', $id);
        $this->db->delete('leilao_produtos');

        $this->db->where('id_produto', $id);
        $this->db->delete('leilao_produtos_imagens');

        $this->db->where('id_produto', $id);
        $this->db->delete('leilao_lances');
    }

    public function TodosBannersLeilao(){

        $banners = $this->db->get('leilao_banners');

        if($banners->num_rows() > 0){

            return $banners->result();
        }

        return false;
    }

    public function AdicionarNovoBannerLeilao(){

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|pjpeg|pjpg|bmp|gif|png';
        $config['encrypt_name'] = true;

        $this->upload->initialize($config);

        if($this->upload->do_upload('banner')){

            $data = $this->upload->data();

            $array = array(
                                        'banner'=>$data['file_name']
                                        );

            $insere = $this->db->insert('leilao_banners', $array);

            if($insere){

                return '<div class="alert alert-success text-center">Banner cadastrado com sucesso!</div>';
            }

            return '<div class="alert alert-danger text-center">Erro ao inserir banner no banco de dados!</div>';
        }

        return '<div class="alert alert-danger text-center">'.$this->upload->display_errors().'</div>';
    }

    public function ExcluirBannerLeilao($id){

        check_session_admin();

        $this->db->where('id', $id);
        $this->db->delete('leilao_banners');
    }

    public function BlockCotaInativa(){

    }




    public function ArvoreDosIndicados($id, $niveis){

        if($niveis > 0){

            $this->db->where('id_usuario', $id);
            $patrocinadores = $this->db->get('patrocinadores');

            if($patrocinadores->num_rows() > 0){

                $row = $patrocinadores->row();

                $id = $row->id_patrocinador;

                $this->array[] = $id;

                $this->ArvoreIndicacao($id, $niveis-1);
            }
        }
    }


    public function ListaConfereCotas(){

        $this->db->where('status', 1);
        $cotas = $this->db->get('cotas');
        
        if($cotas->num_rows() > 0){

            return $cotas->result();

        }

        $extrato = $this->db->get('extrato');

        if($extrato->num_rows() > 0 ){

            return $extrato->result();
        }

        // $faturas = $this->db->get('faturas');

        // if($faturas->num_rows() > 0 ){

        //     return $extrato->result();
        // }     

    }

    public function ConfereCiclo(){

        $this->db->where('status', 1);
        $cotas = $this->db->get('cotas');
        
        if($cotas->num_rows() > 0){

            return $cotas->result();

        }

        $notificacoes = $this->db->get('notificacoes');

        if($notificacoes->num_rows() > 0){

            return $notificacoes->result();

        }
    }

    public function ExpiraCiclos(){

        $query = $this->db->query("SELECT * FROM cotas WHERE status = '1'");

        if($query->num_rows() > 0){

            //$percentual = 200/100;

            foreach($query->result() as $cota){

                $investido = (config_site('valor_cota') * $cota->quantidade );
                $total_rendimento = ($investido * 2)*2;
                $total_bilhetes = ($cota->quantidade * 10.00)*2;
                $taxa_renovacao = $total_rendimento * (2.5 / 100);
                $taxa_saque = $total_rendimento * (10 / 100);

                $valor_a_pagar = $total_rendimento - $taxa_saque - $taxa_renovacao - $total_bilhetes;

                if($cota->valor_pago >= $valor_a_pagar){

                    $this->db->where('id', $cota->id);
                    $this->db->update('cotas', array('status'=>0, 'expirada_conf'=>1));

                }
            }
        }
    }

    public function CorrigeCiclo(){

        check_session_admin(); 

        $this->db->where('status', 1);
        $cotas = $this->db->get('cotas');
       
        if($cotas->num_rows() > 0){

            $cotas = $cotas->result();

            $resultado = '';
            $i = 1;
            foreach ($cotas as $cota) {

                $usuario = $this->admin->InformacaoUsuario($cota->id_user);

                $primeiro_recebimento = date('d/m/Y', $cota->primeiro_recebimento);
                $ultimo_recebimento = date('d/m/Y', $cota->ultimo_recebimento);

                $rendimento_correto = ( $cota->quantidade * randomWithDecimal(13.33, 13.33, 2));
                $total_correcao = $rendimento_correto * 5;

                $novo_saldo = $usuario->saldo_disponivel - $total_correcao;
               
                //EXPIRAÇÃO DOS QUE RECEBERAM 400%
                $investido = (config_site('valor_cota') * $cota->quantidade );
                $total_rendimento = ($investido * 2)*2;
                $total_bilhetes = ($cota->quantidade * 10.00)*2;
                $taxa_renovacao = $total_rendimento * (2.5 / 100);
                $taxa_saque = $total_rendimento * (10 / 100);

                $valor_a_pagar = $total_rendimento - $taxa_saque - $taxa_renovacao - $total_bilhetes;

                if($cota->valor_pago >= $valor_a_pagar){

                    $array_confere_cota = array(
                                                'status'=>0,
                                                'expirada_conf'=>1
                                            );
                    $this->db->where('id', $cota->ID);
                    $update = $this->db->update('cotas', $array_confere_cota);

                    if($update){

                        $resultado .= '<div class="alert alert-success text-center"> #'. $i++ . ' Cota '. $cota->ID .' ok - Primeiro recebimento '. $primeiro_recebimento .' - Utlimo recebimento '. $ultimo_recebimento .' - '. $usuario->nome .' - Saldo anterior: '.$usuario->saldo_disponivel .' - Novo saldo: '. $novo_saldo .'</div>';

                    }else{

                            $resultado .= '<div class="alert alert-success text-center">Não foi possível corrigir. Algum parametro não atende.</div>';
                    }
                }
               //if( $usuario->saldo_bloqueado == '0.00') continue;

            }
            return $resultado;
        }



    }

    public function CorrigeData(){
        
        check_session_admin(); 

        $this->db->where('status', 1);
        $cotas = $this->db->get('cotas');
       
        if($cotas->num_rows() > 0){

            $cotas = $cotas->result();

            $resultado = '';
            $i = 1;
            foreach ($cotas as $cota) {

                $usuario = $this->admin->InformacaoUsuario($cota->id_user);

                $primeiro_recebimento = date('d/m/Y', $cota->primeiro_recebimento);
                $ultimo_recebimento = date('d/m/Y', $cota->ultimo_recebimento);

                $rendimento_correto = ( $cota->quantidade * randomWithDecimal(13.33, 13.33, 2));
                $total_correcao = $rendimento_correto * 5;

                $novo_saldo = $usuario->saldo_disponivel - $total_correcao;

                //REDEFINIÇÃO DA DATA DE ULTIMO RECEBIMENTO 
                $menos_oito = $cota->primeiro_recebimento - (60*60*24*8);//-8dias
                $dia = date('Y-m-d', $menos_oito ).' '.config_site('hora_pagamento').':00';
                $dias = Recebimentos( $dia , config_site('validade_cotas')); 
                
                $array_confere_cota = array(
                                                'conferida'=>1,
                                                'ultimo_recebimento'=> strtotime($dias['ultimo_recebimento'])
                                            );
                $this->db->where('id', $cota->ID);
                $update = $this->db->update('cotas', $array_confere_cota); 
            
                if($update){

                    $resultado .= '<div class="alert alert-success text-center"> #'. $i++ . ' Cota '. $cota->ID .' ok - Primeiro recebimento '. $primeiro_recebimento .' - Utlimo recebimento '. $ultimo_recebimento .' - '. $usuario->nome .' - Saldo anterior: '.$usuario->saldo_disponivel .' - Novo saldo: '. $novo_saldo .'</div>';

                }else{

                    $resultado .= '<div class="alert alert-success text-center">Não foi possível corrigir. Algum parametro não atende.</div>';
                }

               //if( $usuario->saldo_bloqueado == '0.00') continue;

            }
            return $resultado;
        }


    }

    public function CorrigeSaldo(){

        check_session_admin(); 

        $this->db->where('status', 1);
        $cotas = $this->db->get('cotas');

        //$this->db->where('status', 1);
        
        if($cotas->num_rows() > 0){

            $cotas = $cotas->result();

            $resultado = '';
            $i = 1;
            foreach ($cotas as $cota) {

                $usuario = $this->admin->InformacaoUsuario($cota->id_user);

                $primeiro_recebimento = date('d/m/Y', $cota->primeiro_recebimento);
                $ultimo_recebimento = date('d/m/Y', $cota->ultimo_recebimento);

                //RECALCULO DO RENDIMENTO ERRADO - JA SUBTRAIDO DO SALDO
                $rend_ant_diario = ( $cota->quantidade * 133);
                $total_errado = $rend_ant_diario * 3 ;

                //RECALCULO DO RENDIMENTO CORRETO
                $rendimento_correto = ( $cota->quantidade * randomWithDecimal(13.33, 13.33, 2));
                $total_correcao = $rendimento_correto * 5;

                // $novo_saldo = ( $usuario->saldo_disponivel - $total_errado ) + $total_correcao;
                $novo_saldo = $usuario->saldo_disponivel + $total_correcao;

                $array_novo_saldo = array(
                                                'verificado'=>1,
                                                'saldo_disponivel'=>$novo_saldo
                                            );
                $this->db->where('id', $cota->id_user);
                $update = $this->db->update('usuarios', $array_novo_saldo);

                if($update){

                    $this->conta_model->InserirExtrato($cota->id_user, 'Correção do pagamento de '.$cota->quantidade.' cota(s), referentes aos dias 16/05 a 20/05.', $total_correcao, 'green');


                    $resultado .= '<div class="alert alert-success text-center"> #'. $i++ . ' Cota '. $cota->ID .' ok - Primeiro recebimento '. $primeiro_recebimento .' - Utlimo recebimento '. $ultimo_recebimento .' - '. $usuario->nome .' - Saldo anterior: '.$usuario->saldo_disponivel .' - Novo saldo: '. $novo_saldo .'</div>';

                }else{

                    $resultado .= '<div class="alert alert-success text-center">Não foi possível corrigir. Algum parametro não atende.</div>';
                }
               //if( $usuario->saldo_bloqueado == '0.00') continue;

            }
            return $resultado;
        }

    }

    // INATIVAS 
    // public function TotalUsuarios(){

    //     $usuarios = $this->db->get('usuarios');

    //     return $usuarios->num_rows();
    // }

    // public function UltimosUsuarios(){

    //     $data_hoje = date('Y-m-d');
    //     $data_ultimos = date('Y-m-d', time() - (60*60*24*7));

    //     $usuarios = $this->db->query("SELECT * FROM usuarios WHERE data_cadastro BETWEEN '$data_ultimos' AND '$data_hoje'");

    //     return $usuarios->num_rows();
    // }
}