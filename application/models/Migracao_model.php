<?php
class Migracao_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function NovoUsuario(){

        $indicadorLogin = $this->native_session->get('indicador');

        $this->db->where('login', $indicadorLogin);
        $indicador = $this->db->get('usuarios')->row();

        if( $indicador->block == 1){
           
            return '<div class="alert alert-danger text-center">Seu indicador está bloqueado por irregularidades.</div>';

        } 

        if( $indicador->lider == 0){
            
            if( $indicador->ciclo == 0){
                return '<div class="alert alert-danger text-center">O upline ainda não está ativo. Tente mais tarde.</div>';
            }


            if($this->painel_model->StatusIndicado($indicador->id) >= 3 ){

                return '<div class="alert alert-danger text-center">Seu indicador já tem 3 cadastrados ou a rede dele não tem base ativa. Faça contato e peça um lugar.</div>';
            }
        }

        


        $nome = $this->input->post('nome');
        $sobrenome = $this->input->post('sobrenome'); 
        $email = $this->input->post('email');
        $cpf =  preg_replace("/\.|\-/", "", $this->input->post('cpf') ); 
        $nascimento = $this->input->post('nascimento');
        $celular = preg_replace("/\(|\)|\-/", "", $this->input->post('celular'));
        $ddd = substr($celular, 0, 2);
        $tel = substr($celular, 2, 10);
        $login = $this->input->post('login');
        $senha = $this->input->post('senha');

        //USUARIOS BLOQUEADOS POR ALGUM MOTIVO NÃO CONSEGUIRÃO SE CADASTRAR
        $this->db->where('ddd', $ddd);
        $this->db->where('celular', $tel);
        $this->db->where('block', 1);
        $user_email = $this->db->get('usuarios');
        
        $this->db->where('email', $email);
        $this->db->where('block', 1);
        $user_email = $this->db->get('usuarios');

        $this->db->where('cpf', $cpf);
        $this->db->where('block', 1);
        $user_cpf = $this->db->get('usuarios');

        if( $user_cpf->num_rows() > 0){

            return '<div class="alert alert-danger text-center">Você já está cadastrado na plataforma. Entre em contato com suporte para ser reposicionado.</div>';
        }

        if($user_email->num_rows() > 0){

            return '<div class="alert alert-danger text-center">Você já está cadastrado na plataforma. Entre em contato com suporte para ser reposicionado.</div>';
        }

        //LOGIN JA EXISTE
        $this->db->where('login', $login);
        $user_login = $this->db->get('usuarios');

        if($user_login->num_rows() > 0){

            return '<div class="alert alert-danger text-center">Login já existe. Escolha outro.</div>';

        }

        $cronometro = strtotime(date('Y-m-d H:i:s'))+86400;

        $array_cadastro = array(
            'nome'=>$nome,
            'sobrenome'=>$sobrenome,
                                'email'=>$email,
                                'cpf'=>$cpf,
                                'nascimento'=>converter_data($nascimento),
                                'ddd'=> $ddd,
                                'celular'=>$tel,
                                'login'=>$login,
                                'senha'=>md5($senha),
                                'block'=>0,
                                'ciclo'=>0,
                                'data_cadastro'=>date('Y-m-d H:i:s'),
                                'cronometro'=>date('Y-m-d H:i:s', $cronometro)
                                );

        $cadastra = $this->db->insert('usuarios', $array_cadastro);

        $id_novo_usuario = $this->db->insert_id();

        $array_usuarios_nivel = array(
                'id_usuario'=>$id_novo_usuario,
                'nivel'=>1,
                'data_entrada'=>date('Y-m-d H:m:s'),
                'ultima_atvidade'=>date('Y-m-d H:m:s'),
            );
        $this->db->insert('usuarios_nivel', $array_usuarios_nivel);

        /* VINCULAÇÃO COM PATROCINADOR */
        //SE NAO TEM PATROCINADOR AUTOMATICAMENTE ENTRA PRA NUBIA
        if($this->native_session->get('indicador')){


            $indicador = $this->native_session->get('indicador');
            $this->db->where('login', $indicador);
            $user_login_indicador = $this->db->get('usuarios');


        }else{

            $indicador = 'redeads';
            $this->db->where('login', $indicador);
            $user_login_indicador = $this->db->get('usuarios');
        }
       

        if($user_login_indicador->num_rows() > 0){//SE O USUARIO EXISTE

            $row_indicador = $user_login_indicador->row();

            $id_indicador = $row_indicador->id;

            $array_indicador = array(
                    'id_usuario'=>$id_novo_usuario,
                    'id_indicador'=>$id_indicador
            );

            $this->db->insert('indicadores', $array_indicador);
        }

        /* FIM DO PATROCINADOR */

        if($cadastra){
            $infoCadastrado = $this->painel_model->infoUser($id_novo_usuario);
            $nomeCadastrado = $infoCadastrado->nome;
            $this->painel_model->InserirExtrato($id_indicador, 'indicou o amigo '.$nomeCadastrado.' #'.$id_novo_usuario , 'novoinidcado');

            $this->native_session->set_flashdata('mensagem','<div class="alert alert-success text-center" >Usuário cadastrado com sucesso <a href="'. base_url('').'"><strong> Clique aqui e faça o login</strong></a></div>');

            redirect('painel/login');

            return '<div class="alert alert-success text-center" >Usuário cadastrado com sucesso <a href="'. base_url('').'"><strong> Clique aqui e faça o login</strong></a></div>';
            
        }

        $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger text-center">Não foi possível completar seu cadastro.</div>');

        return '<div class="alert alert-danger text-center">Não foi possível completar seu cadastro.</div>';
        
    }


    public function RecuperarSenha(){

        //$this->load->library('email');

        $login = $this->input->post('login');

        $this->db->where('login', $login);
        $user = $this->db->get('usuarios');

        if($user->num_rows() > 0){

            $row = $user->row();

            $s1 = rand(302, 999);
            $s2 = 'Az-';
            $s3 = rand(10, 55);
            $s4 = 'Oyk';

            $nova_senha = $s1.$s2.$s3.$s4;

            $this->db->where('id', $row->id);
            $this->db->update('usuarios', array('senha'=>md5($nova_senha)));

            $data['nome'] = $row->nome;
            $data['senha'] = $nova_senha;

            $body = $this->load->view('email/senha',$data,TRUE);

            $this->email->to( $row->email);
            $this->email->from('suporte@redeads50.com', 'Painel Rede ADS50');
            $this->email->set_mailtype('html');
            $this->email->subject('Nova senha do Painel - '.$row->login);
            $this->email->message($body);

            $envia = $this->email->send();

            if($envia){

                return '<div class="alert alert-success text-center">Dentro de 5 minutos enviaremos uma nova senha.</div>';
            }

            return '<div class="alert alert-danger text-center">Erro ao enviar nova senha. Tente novamente.</div>';

        }

        return '<div class="alert alert-danger text-center">O login informado não existe.</div>';
    }


    public function Logar(){

        $login = $this->input->post('login');
        $senha = $this->input->post('senha');

        $this->db->where('login', $login);
        $this->db->where('senha', md5($senha));

        $usuario = $this->db->get('usuarios');

        if($usuario->num_rows() > 0){

            $row = $usuario->row();

            if($row->block == 0){

                if($row->id == 1){

                    $this->native_session->set('superuser', 1);
                }

                $this->native_session->set('user_id', $row->id);

                if( $this->painel_model->user('agencia') == null ){

                    redirect('painel/perfil?conta=true');

                }

                redirect('painel');

            }

            return '<div class="alert alert-danger text-center">Sua conta foi bloqueada. Entre em contato com o suporte</div>';

        }

        return '<div class="alert alert-danger text-center">Login ou senha inválidos.</div>';
    }

    public function AtualizarDados(){

        $sessao = $this->native_session->get('user_id');

        $nome = $this->input->post('nome');
        $email = $this->input->post('email');
        $cpf =  preg_replace("/\.|\-/", "", $this->input->post('cpf') ); 
        $nascimento = $this->input->post('nascimento');
        $celular = preg_replace("/\(|\)|\-/", "", $this->input->post('celular'));
        $ddd = substr($celular, 0, 2);
        $tel = substr($celular, 2, 10);

        $array_usuarios_pessoal = array(
            'nome'=>$nome,
            'email'=>$email,
            'cpf'=>$cpf,
            'nascimento'=>converter_data($nascimento),
            'ddd'=>$ddd,
            'celular'=>$tel
        );

        $this->db->where('id', $sessao);
        $atualiza = $this->db->update('usuarios',  $array_usuarios_pessoal);

        if($atualiza){

            return '<div class="alert alert-success text-center">Dados atualizados com sucesso!</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao atualizar dados.</div>';
    }

    public function AlterarSenha(){

        $sessao = $this->native_session->get('user_id');

        $senha_atual = $this->input->post('senha_atual');
        $nova_senha = $this->input->post('nova_senha');
        $confirmar_senha = $this->input->post('confirmar_senha');

        $this->db->where('id', $sessao);
        $this->db->where('senha', md5($senha_atual));
        $user_senha = $this->db->get('usuarios');

        if($user_senha->num_rows() > 0){

            if($nova_senha == $confirmar_senha){

                $array_senha = array(
                    'senha'=>md5($nova_senha)
                );

                $this->db->where('id', $sessao);
                $atualiza = $this->db->update('usuarios', $array_senha);

                if($atualiza){

                    return '<div class="alert alert-success text-center">Senha atualizada com sucesso!</div>';
                }

                return '<div class="alert alert-danger text-center">Erro ao atualizar senha.</div>';

            }

            return '<div class="alert alert-danger text-center">Senhas digitadas não são compativeis uma com a outra.</div>';
        }

        return '<div class="alert alert-danger text-center">Senha atual incorreta. Por favor, verifique.</div>';
    }

    public function AlterarContaBancaria(){

        $sessao = $this->native_session->get('user_id');

        $banco = $this->input->post('banco');
        $agencia = $this->input->post('agencia');
        $conta = $this->input->post('conta');
        $tipo_conta = $this->input->post('tipo_conta');
        $titular = $this->input->post('titular');

        $array_conta_bancaria = array(
                                                                'banco'=>$banco,
                                                                'agencia'=>$agencia,
                                                                'conta'=>$conta,
                                                                'tipo_conta'=>$tipo_conta,
                                                                'titular'=>$titular
                                                                );

        $this->db->where('id', $sessao);
        $atualiza = $this->db->update('usuarios', $array_conta_bancaria);

        if($atualiza){

            $this->native_session->set_flashdata('mensagem','<div class="alert alert-success text-center">Conta atualizada com sucesso</div>');

            redirect('painel');
        }

        $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger text-center">Erro ao atualizar sua conta</div>');

        redirect('painel/perfil');
    }

    public function AlterarEndereco(){

        $sessao = $this->native_session->get('user_id');

        $rua = $this->input->post('rua');
        $quadra = $this->input->post('quadra');
        $lote = $this->input->post('lote');
        $numero = $this->input->post('numero');
        $complemento = $this->input->post('complemento');
        $bairro = $this->input->post('bairro');
        $cidade = $this->input->post('cidade');
        $estado = $this->input->post('estado');
        $cep = $this->input->post('cep');

        $array_endereco = array(
                    'rua'=>$rua,
                    'quadra'=>$quadra,
                    'lote'=>$lote,
                    'numero'=>$numero,
                    'complemento'=>$complemento,
                    'bairro'=>$bairro,
                    'cidade'=>$cidade,
                    'estado'=>$estado,
                    'cep'=>$cep,
            );

        $this->db->where('id_user', $sessao);
        $enderecoUser = $this->db->get('loja_enderecos');
         
        if($enderecoUser->num_rows() > 0 ){
            $this->db->where('id_user', $sessao);
            $atualiza = $this->db->update('loja_enderecos', $array_endereco);

            $erro = 'velho';
            
        }else{
            $array_endereco['id_user'] = $sessao;
            $atualiza = $this->db->insert('loja_enderecos', $array_endereco);

            $erro = 'novo';
        }           

        if($atualiza){

            return '<div class="alert alert-success text-center">Endereços salvo com sucesso!</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao atualizar endereço.</div>';
    }
}
