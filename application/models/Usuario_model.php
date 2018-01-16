<?php
class Usuario_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function NovoUsuario(){

        if($this->native_session->get('indicador')){

            $indicadorLogin = $this->native_session->get('indicador');
        }else{

            $indicadorLogin = 'bitprimeoficial';
        }
        
        $this->db->where('usuarioLogin', $indicadorLogin);
        $indicador = $this->db->get('usuarios');

        if($indicador->num_rows() > 0){

            if( $indicador->row()->usuarioBlock == 1){
           
                //$this->native_session->set_flashdata('message_error', '<div class="alert alert-danger text-center">Seu indicador está bloqueado por irregularidades.</div>');
                echo json_encode( array('result'=>'error','message'=>'Seu indicador está bloqueado.') );
                return;
            }

            $indicadorID = $indicador->row()->usuarioID;
        }else{

            $indicadorID = null; //especificamente para o primeiro cadastro
        }

        $usuarioEmail = $this->input->post('usuarioEmail');
        $usuarioSenha = $this->input->post('usuarioSenha');
        $usuarioLogin = $this->input->post('usuarioLogin');

        $usuarioNome = $this->input->post('usuarioNome');
        $usuarioSobrenome = $this->input->post('usuarioSobrenome'); 
        $usuarioCpf =  preg_replace("/\.|\-/", "", $this->input->post('usuarioCpf') ); 

        //$nascimento = $this->input->post('nascimento');
        // $celular = preg_replace("/\(|\)|\-/", "", $this->input->post('celular'));
        // $ddd = substr($celular, 0, 2);
        // $tel = substr($celular, 2, 10);
        
        $usuarioTelefone = preg_replace("/\(|\)|\-/", "", $this->input->post('usuarioTelefone'));
        
        //LOGIN JA EXISTENTE
        $this->db->where('usuarioLogin', $usuarioLogin);
        $user_usuarioLogin = $this->db->get('usuarios');

        if($user_usuarioLogin->num_rows() > 0){

            //$this->native_session->set_flashdata('mensagem',  '<div class="alert alert-danger text-center">Login já existe. Escolha outro.</div>');
            echo json_encode( array('result'=>'error','message'=>'NickName já existe. Escolha outro.') );
            return;
        }

        //USUARIOS QUE JA EXISTEM
        $this->db->where('usuarioCpf', $usuarioCpf);
        $this->db->or_where('usuarioTelefone', $usuarioTelefone);
        $this->db->or_where('usuarioEmail', $usuarioEmail);
        $usuarioExiste = $this->db->get('usuarios');

        if( $usuarioExiste->num_rows() > 0){

            $this->native_session->set_flashdata('mensagem',  '<div class="alert alert-danger text-center">Você já está cadastrado na plataforma.</div>');
            return;
        }


        $array_cadastro = array(
            'usuarioNome'=>$usuarioNome,
            'usuarioSobrenome'=>$usuarioSobrenome,
            'usuarioEmail'=>$usuarioEmail,
            'usuarioCpf'=>$usuarioCpf,
            //'nascimento'=>converter_data($nascimento),
            //'ddd'=> $ddd,
            'usuarioTelefone'=>$usuarioTelefone,
            'usuarioLogin'=>$usuarioLogin,
            'usuarioSenha'=>md5($usuarioSenha),
            'usuarioBlock'=>0,
            'usuarioStatus'=>0,
            'usuarioDataCadastro'=>date('Y-m-d H:i:s'),
            'usuarioIndicador'=>$indicadorID,
        );

        $cadastra = $this->db->insert('usuarios', $array_cadastro);

        if($cadastra){

            $id_novo_usuario = $this->db->insert_id();
            $this->native_session->set('usuario_id', $id_novo_usuario);

        }else{

            echo json_encode( array('result'=>'error','message'=>'Cadastrou falhou. Tente novamente') );
            return;
        }

        //REDIRECIONA PARA A TELA DE PAGAMENTO

        $pacoteID = $this->native_session->get('pacoteID');
        redirect('backoffice/carrinho/'.$pacoteID);

          

        if($pagamento){
            $infoCadastrado = $this->painel_model->infoUser($id_novo_usuario);
            $nomeCadastrado = $infoCadastrado->nome;
            $this->painel_model->InserirExtrato($id_indicador, 'indicou o amigo '.$nomeCadastrado.' #'.$id_novo_usuario , 'novoinidcado');

            $this->native_session->set_flashdata('mensagem','<div class="alert alert-success text-center" >Usuário cadastrado com sucesso <a href="'. base_url('').'"><strong> Clique aqui e faça o login</strong></a></div>');            
        }
        
    }


    public function processaPagamento(){
        
        $post = $this->input->post();

        $pacoteID = $post['pacoteID'];
        $usuarioID = $post['usuarioID'];

        //consulta se há algum pedido aguardando em nome do usuario
        $this->db->where('usuarioID',$usuarioID);
        $this->db->where('pedidoStatus',1);
        $pedidoAberto = $this->db->get('pedidos');

        if($pedidoAberto->num_rows() > 0 ){

            echo json_encode(array('return'=>FALSE,'message'=>'Existe pedido de pacote aguardando aprovação.'));
            return;
        }


        $secret = 'ZzsMLGKe162CfA5EcG6j@';
        $pedidoKey = md5(date('Y-m-d H:i:s').$post['usuarioID'].$secret);
        $my_xpub = 'xpub6CiWQwtbo6sY7WvakAZj5nperxTTHfRSLL9ZkAqZuUvY2VF8sYk8sqGnnBpkLDxXS7CXxKA7U77SDj7opLkeyGGfXAo1HvLdZ3GJGZMRLXy';
        $my_api_key = '{YOUR API KEY}';


        //abrindo pedido no sistema
        $pedidoAbrir = array(
            'pacoteID'=>$pacoteID,
            'usuarioID'=>$usuarioID,
            'pedidoStatus'=>1,// 0 para cancelado, 1 para aguardando, 2 para aprovado,
            'pedidoKey'=>$pedidoKey
        );
        $this->db->insert('pedidos', $pedidoAbrir);
        $novoPedidoID = $this->db->insert_id();
        
        //abrindo endereço na blockchain
        $my_callback_url = site_url().$novoPedidoID.'/'.$pedidoKey;

        // $root_url = 'https://api.blockchain.info/v2/receive';
        // $parameters = 'xpub=' .$my_xpub. '&callback=' .urlencode($my_callback_url). '&key=' .$my_api_key;
        // $response = file_get_contents($root_url . '?' . $parameters);
        //$object = json_decode($response);

        $address = 'ficticio';

        $this->db->where('pedidoID',$novoPedidoID);
        $this->db->update('pedidos', array('pedidoEndWallet'=>$address) );

        echo json_encode(array('return'=>TRUE,'message'=>'Pedido realizado.'));
        return;

        //redirect('pagamento/'.$novoPedidoID);
    }

    public function returnPagamento(){

        //retorna o pagamento da blockchain com o resultado e muda status do usuario e ativa o pacote comprado
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

    public function RecuperarSenhaConta(){

        //$this->load->library('email');

        $email = $this->input->post('email');

        $this->db->where('email', $email);
        $user = $this->db->get('usuarios_contas');

        if($user->num_rows() > 0){

            $row = $user->row();

            $s1 = rand(302, 999);
            $s2 = 'Az-';
            $s3 = rand(10, 55);
            $s4 = 'EyT';

            $nova_senha = $s1.$s2.$s3.$s4;

            $this->db->where('id', $row->id);
            $this->db->update('usuarios_contas', array('senha'=>md5($nova_senha)));

            $data['nome'] = $row->email;
            $data['senha'] = $nova_senha;

            $config['protocol'] ='smtp';
            $config['smtp_host'] = 'srv30.prodns.com.br';
            $config['smtp_user'] = 'suporte@redeads50.com';
            $config['smtp_pass'] = 'ads502016';
            $config['smtp_port'] = '465';
            $config['smtp_crypto'] = 'ssl';
            $config['mailtype'] = 'html';

            $this->email->initialize($config);

            $body = $this->load->view('email/senha',$data,TRUE);

            $this->email->to( $row->email);
            $this->email->from('suporte@redeads50.com', 'Painel Rede ADS50');
            $this->email->set_mailtype('html');
            $this->email->subject('Nova senha da Conta Master - '.$row->email);
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

        $this->db->where('email', $login);
        $this->db->where('senha', md5($senha));

        $usuario = $this->db->get('usuarios_contas');

        if($usuario->num_rows() > 0){

            $row = $usuario->row();

            if($row->block == 0){

                $this->native_session->set('conta_id',$row->id);
                
                redirect('painel');

            }

            $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger text-center">Sua conta foi bloqueada. Entre em contato com o suporte</div>');

        }

        return '<div class="alert alert-danger text-center">Login ou senha inválidos.</div>';
    }

    public function LogarConta(){

        $login = $this->input->post('email');
        $senha = $this->input->post('senha');

        $this->db->where('email', $login);
        $this->db->where('senha', md5($senha));

        $usuario = $this->db->get('usuarios_contas');

        if($usuario->num_rows() > 0){

            $row = $usuario->row();

            if($row->block == 0){

                $this->db->where('id', $row->id);
                $this->db->update('usuarios_contas', array('dataUltimoLogin'=>date('Y-m-d H:i:s') ));

                if($row->id == 1 OR $row->id == 2){

                    $this->native_session->set('superuser', 1);
                }

                $this->native_session->set('conta_id', $row->id);

                redirect('painel');
            }

            $this->native_session->set_flashdata('mensagem', '<div class="alert alert-danger text-center">Sua conta foi bloqueada. Entre em contato com o suporte</div>');
            return;

        }

        $this->native_session->set_flashdata('mensagem', '<div class="alert alert-danger text-center">E-mail ou senha inválidos.</div>');
    }

    public function LogarSwitchFacebook(){

        $this->db->where('id',$this->input->post('conta_id'));
        $usuario = $this->db->get('usuarios_contas');

        if($usuario->num_rows() > 0 ){

            $row = $usuario->row();

            if($row->block == 0){

                $this->db->where('id', $row->id);
                $this->db->update('usuarios_contas', array('dataUltimoLogin'=>date('Y-m-d H:i:s') ));

                if($row->id == 1 OR $row->id == 2){

                    $this->native_session->set('superuser', 1);
                }

                $this->native_session->set('conta_id', $row->id);

                redirect('painel/conta');
            }

            $this->native_session->set_flashdata('mensagem', '<div class="alert alert-danger text-center">Sua conta foi bloqueada. Entre em contato com o suporte</div>');
            return;

        }

        $this->native_session->set_flashdata('mensagem', '<div class="alert alert-danger text-center">Conta inválida.</div>');
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

                    $this->native_session->set_flashdata('mensagem','<div class="alert alert-success text-center">Senha atualizada com sucesso!</div>');
                }

                $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger text-center">Erro ao atualizar senha.</div>');

            }

           $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger text-center">Senhas digitadas não são compativeis uma com a outra.</div>');
        }

        $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger text-center">Senha atual incorreta. Por favor, verifique.</div>');
    }

    public function AlterarSenhaConta(){

        $sessao = $this->native_session->get('conta_id');

        $senha_atual = $this->input->post('senha_atual');
        $nova_senha = $this->input->post('nova_senha');
        $confirmar_senha = $this->input->post('confirmar_senha');

        $this->db->where('id', $sessao);
        $this->db->where('senha', md5($senha_atual));
        $user_senha = $this->db->get('usuarios_contas');

        if($user_senha->num_rows() > 0){

            if($nova_senha == $confirmar_senha){

                $array_senha = array(
                    'senha'=>md5($nova_senha)
                );

                $this->db->where('id', $sessao);
                $atualiza = $this->db->update('usuarios_contas', $array_senha);

                if($atualiza){

                    $this->native_session->set_flashdata('mensagem','<div class="alert alert-success text-center">Senha atualizada com sucesso!</div>');
                    redirect('painel/conta_configuracoes');
                }

                $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger text-center">Erro ao atualizar senha.</div>');
                redirect('painel/conta_configuracoes');
            }

            $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger text-center">Senhas digitadas não são compativeis uma com a outra.</div>');
            redirect('painel/conta_configuracoes');
        }

        $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger text-center">Senha atual incorreta. Por favor, verifique.</div>');
        redirect('painel/conta_configuracoes');
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
