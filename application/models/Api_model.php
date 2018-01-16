<?php
class Api_model extends CI_Model{

    public $downlines = array();
    public $uplines = array();
    public $bonus = array(10,3,1,1);

    public function __construct(){
        parent::__construct();

        $this->load->helper('file');
        date_default_timezone_set('America/Sao_Paulo');
    }
    
    public function user($coluna, $parametro = null){

        //if(!$this->native_session->get('user_id') ) redirect('login');

        $sessao = $this->native_session->get('user_id');

        $this->db->where('id', $sessao);
        $user = $this->db->get('usuarios');

        $row = $user->row();

        if(is_null($parametro)){

            return $row->$coluna;
        }

        preg_match('/[^\s]*/i', $row->$coluna, $matches);

        return $matches[0];
    }

    public function superUser($user){

        $this->native_session->set('user_id', $user);
        return 'Logado';
    }

    public function lider(){
        $sessao = $this->native_session->get('user_id');
        $this->db->where('id',$sessao);
        //$this->db->where('ciclo','0');
        $user = $this->db->get('usuarios')->row();

        if($user->lider == 1){
            return true;
        }
        return false;
    }
   
    public function infoUser($id){

        $this->db->where_in('id',$id);
        $user = $this->db->get('usuarios');

        if($user->num_rows() > 0){

            return $user->row();
        }
    }

    public function nivelUser(){
        $sessao = $this->native_session->get('user_id');

        $this->db->where('id_usuario', $sessao);
        $nivelUsuario = $this->db->get('usuarios_nivel');

        if($nivelUsuario->num_rows() > 0){

            return $nivelUsuario->row();
        }

        return 0;
    }

    public function ciclo(){
        $sessao = $this->native_session->get('user_id');

        $this->db->where('id',$sessao);
        $user = $this->db->get('usuarios');

        $row = $user->row();
       
        return $row->ciclo;
    }

    public function indicador(){
        $sessao = $this->native_session->get('user_id');

        $this->db->where('id_usuario',$sessao);
        $user = $this->db->get('indicadores')->row();

        $indicador = $user->id_indicador;

        return $indicador;
    }
    ///////////////////////////////////////////////////////// UPLINES

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

    public function Recebedor($id_recebedor){

        $this->db->where('id',$id_recebedor);
        $user = $this->db->get('usuarios');
        $row = $user->row();
       
        $this->ArvoreUplines($id_recebedor, 5 );
        $uplines =  $this->uplines;
        return $uplines[$row->ciclo];

    }

    //////////////////////////////////////////////////////// DOWNLINES

    public function ArvoreDownlines($id, $ciclos = 6 , $nivel = 1){

        if($ciclos > 0){
            //INDICA O USUARIO MATRIZ
            $this->db->where('id_indicador', $id);
            $indicadores = $this->db->get('indicadores');

            if($indicadores->num_rows() > 0){
                //FAZ O LAÇO NO USUARIOS
                foreach($indicadores->result() as $row){
                    //TRAZ O ID DO DOWNLINE
                    $id = $row->id_usuario;
                    
                    $this->downlines[$nivel][$id] = $id;
                    
                    $this->ArvoreDownlines($id, $ciclos-1, $nivel+1);
                }
            }
        }
    }

     public function Downlines(){
        $sessao = $this->native_session->get('user_id');
        $this->ArvoreDownlines($sessao);        
        return $this->downlines;
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



      //LINK UNICO ARVORE DE ANALISE POR LINHA DANDO BREAK AO ENCONTRAR O PRIMEIRO COMPATIVEL NO FOREACH

    public $rede = array();

    public function Rastreador($id, $ciclos = 8, $nivel = 1){

        if($ciclos > 0){
            
            //INDICA O USUARIO MATRIZ
            $this->db->where('id_indicador', $id);
            $indicadores = $this->db->get('indicadores');

            if($indicadores->num_rows() > 0){
                //FAZ O LAÇO NO USUARIOS
                foreach($indicadores->result() as $row){
                    
                    if($this->infoUser($row->id_usuario)->ciclo != 0 ){

                        $proximo = $row->id_usuario;
                    
                        $this->rede[$nivel][] = $proximo;
                        
                        $this->Rastreador($proximo, $ciclos-1, $nivel+1);
                    }
                    
                }
            }
        }

        //return $this->rede;

    }

    public function StatusIndicado($id){

        $indicadores = $this->db->query("SELECT COUNT(*) AS total FROM indicadores WHERE id_indicador = '$id' ");
        $indicador = $indicadores->result_array();

        return $indicador[0]['total'];

    }

    public function LinkUnico($id_matriz, $ciclo = 1, $nivel = 3){

        $matriz = $id_matriz;

        $this->Rastreador($matriz); //USANDO O ID INDICADO ALIMENTA A ARRAY COM OS INDICADOS

        if($nivel > 0){ //VERIRICA SE O NIVEL AINDA É MAIOR QUE 0.

            $redeMatriz = $this->rede; //Traz array da rede em 4 niveis

            if( count($redeMatriz) > 0){ //se a rede estiver maior que zero

                foreach( $redeMatriz[$ciclo] as $id){ // faz o laço na rede inserindo o ciclo e chamando o ID
                   
                    if( $this->StatusIndicado($id) < 3 ){ //condição se o indicado tem mais de 3

                        if($this->infoUser($id)->ciclo > 0 ){

                            return $id; //traz o primeiro que obedece a condição

                            break; //para no primeiro que encontrar
                            exit;

                        }
                           
                    }           

                }

                return  $this->painel_model->LinkUnico($matriz, $ciclo+1, $nivel-1); //retorna na função se não atender a condição de cima
                
            }
             
        }

        return $matriz;
                
    }

    public function Recurssiva($ciclo = 1, $nivel = 4){

        if($nivel > 0 ){

        return $this->Recurssiva($ciclo+1, $nivel-1);

        }else{

            return $ciclo;
        }
    }

    //
    
    public function valorDoacao(){

        if($this->ciclo() == 0){
            return 50.00;
        }
        
        if($this->ciclo() == 1){
            return 100.00;
        }

        if($this->ciclo() == 2){
            return 600.00;
        }

        if($this->ciclo() == 3){
            return 10800.00;
        }

    }


    //FAZER DOACÃO AO UPLINE OU REENVIAR COMPROVANTE
    public function EfetuarDoacao($recebedor){

        $sessao = $this->native_session->get('user_id');
        $id_recebedor = $recebedor;

        //CICLO DO DOADOR QUE ESTÁ INSERINDO
        $user = $this->infoUser($sessao);
        $ciclo = $user->ciclo;


        if($ciclo == 0){
            $valor = 50.00;
        }
        
        if($ciclo == 1){
            $valor = 100.00;
        }

        if($ciclo == 2){
            $valor = 600.00;
        }

        if($ciclo == 3){
            $valor = 10800.00;
        }

        $config['allowed_types'] = 'bmp|jpg|jpeg|pjpeg|png|gif|doc|pdf';
        $config['upload_path'] = './uploads/comprovantes/';
        $config['encrypt_name'] = true;

        $this->upload->initialize($config);

        if($this->upload->do_upload()){

            $retornoUpload = $this->upload->data();

            $this->db->where('id_doador', $sessao);
            $this->db->where('ciclo', $ciclo );
            $this->db->where('id_recebedor', $id_recebedor);
            $doacoes = $this->db->get('doacoes');      

            if($doacoes->num_rows() > 0){

                $img = $doacoes->row();

                $path_to_file = './uploads/comprovantes/'.$img->comprovante;
                unlink($path_to_file);

                $this->db->where('id', $img->id);
                $qr = $this->db->update('doacoes', array('status'=>'0','comprovante'=>$retornoUpload['file_name']));

                $mensagem = 'Reapresentação de comprovante da doacao do'. $user->nome;

            }else{

                $array_docaoes = array(
                        'id_doador'=>$sessao,
                        'id_recebedor'=>$id_recebedor,
                        'valor'=> $valor,
                        'ciclo'=>$ciclo,
                        'comprovante'=>$retornoUpload['file_name'],
                        'data_envio'=>date('Y-m-d H:i:s'),
                        'status'=> '0'
                    );

                $qr = $this->db->insert('doacoes', $array_docaoes);
                $mensagem = 'Comprovante de pagamento #'. $this->db->insert_id() . ' apresentado.';
            }

            if($qr){
                
                $nome_recebedor = $this->infoUser($id_recebedor);
                $this->InserirExtrato($sessao, 'Deu entrada na doação para '.$nome_recebedor->nome,'doacao');

                //return '<div class="alert alert-success text-center">Comprovante enviado com sucesso!</div>';

                $this->native_session->set_flashdata('mensagem','<div class="alert alert-success text-center">Comprovante enviado com sucesso!</div>');

                redirect('painel');
            }

            //return '<div class="alert alert-danger text-center">Erro ao enviar comprovante.</div>';

            $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger text-center">Erro ao enviar comprovante.</div>');

            redirect('painel');
        }

        //return '<div class="alert alert-danger text-center">Erro ao fazer upload: '.$this->upload->display_errors().' </div>';

        $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger text-center">Erro ao fazer upload: '.$this->upload->display_errors().' </div>');

        redirect('painel');

    }

    public function verificaDoacaoDownline($doador){

        $sessao = $this->native_session->get('user_id');

        $id_recebedor =  $sessao;
        $id_doador = $doador;

        $this->db->where('id_recebedor',$id_recebedor);
        $this->db->where('id_doador',$id_doador);
        $doacoes = $this->db->get('doacoes');

        //if( $doacoes->num_rows() > 0){
        return $doacoes->row();

        //}  

       //return false;

    }

    ////////-------------------------- ROTINAS DE ACEITE DE DOAÇÃO

    //FUNÇÃO QUE SOBE O USUARIO DE CICLO
    public function sobedeCiclo($user,$ciclo){
        $this->db->where('id',$user);
        $this->db->update('usuarios', array('ciclo'=> $ciclo+1) );
    }

    public function minimasRecebidas(){

        $recebedor = $this->native_session->get('user_id');
        $this->db->where('id',$recebedor);
        $user = $this->db->get('usuarios')->row();

        if($user->ciclo == 0){
            $minimo = 1;
        }
        
        if($user->ciclo == 1){
            $minimo = 3;
        }

        if($user->ciclo == 2){
            $minimo = 10;
        }

        if($user->ciclo == 3){
            $minimo = 28;
        }

        $cronometro = strtotime(date('Y-m-d H:i:s'))+259200;

        $this->db->where_in('id_recebedor',  $recebedor);
        $doacoes = $this->db->get('doacoes');

        if($doacoes->num_rows() == $minimo ){
            $this->db->where('id',$recebedor);
            $this->db->update('usuarios', array('cronometro'=>date('Y-m-d H:i:s', $cronometro) ));
        }
    }

    public function confirmarDoacao($id,$senha){

        //INFORMAÇÕES DO RECEBEDOR
        $sessao = $this->native_session->get('user_id');
        $this->db->where('id',$sessao);
        $recebedor = $this->db->get('usuarios')->row();

        //VERIFICA A SENHA
        if(md5($senha) != $recebedor->senha){
            return '<div class="alert alert-danger text-center">Senha incorreta</div>';
            exit;
        }

        $this->minimasRecebidas();

        //PEGA A DOAÇÃO E DÁ O STATUS DE ACEITA
        //STATUS DE DOACAO : 0 = AGUARDANDO 1 = CONFIRMADA 2 = REJEITADA//
        $this->db->where('id', $id);
        $this->db->update('doacoes', array('status'=>'1'));

        //CHAMA A DOACAO NO BANCO PARA PEGAR MAIS INFORMAÇÕES
        $this->db->where('id', $id);
        $doacoes = $this->db->get('doacoes');
        $doacao = $doacoes->row();
        
        $id_doador = $doacao->id_doador;    

        //TRAZ AS INFORMAÇÕES DO DOADOR
        $this->db->where('id',$id_doador);
        $doadores = $this->db->get('usuarios');
        $doador = $doadores->row();

        //O NUMERO DE RECEBIMENTOS É DECISIVO PARA SABER SE ELE PODE DOAR OU NÃO
        if($doador->ciclo == 0 ){
            $this->painel_model->sobedeCiclo($doador->id,$doador->ciclo);
        }

        if($doador->ciclo == 1 ){
            $this->painel_model->sobedeCiclo($doador->id,$doador->ciclo);
        }

        if($doador->ciclo == 2 ){
            $this->painel_model->sobedeCiclo($doador->id,$doador->ciclo);
        }

        if($doador->ciclo == 3 ){
            $this->painel_model->sobedeCiclo($doador->id,$doador->ciclo);
        }

        $extratoRecebId = $recebedor->id;
        $extratoRecebNome = $recebedor->nome;
        $extratoDoadId = $doador->id;
        $extratoDoadNome = $doador->nome;
    
        //USUARIO LOGADO/RECEBEDOR - PEGANDO O VALOR ATUAL PRA SOMAR COM A NOVA DOACAO
        $this->db->where('id_usuario',$recebedor->id);
        $usersR = $this->db->get('usuarios_nivel');
        $recebedorR = $usersR->row();
        //FAZ UM UPDATE NO NIVEL DO USUARIO SOMANDO AO VALOR RECEBIDO
        $this->db->where('id_usuario',$recebedor->id);
        $this->db->update('usuarios_nivel', array('total_recebido'=>$recebedorR->total_recebido+$doacao->valor,'ultima_atvidade'=>date('Y-m-d H:m:s')));
        
        
        //DOADOR PEGANDO O VALOR ATUAL PRA SOMAR COM A NOVA DOACAO
        $this->db->where('id_usuario', $doador->id);
        $usersD = $this->db->get('usuarios_nivel');
        $doadorD = $usersD->row();
        //UPDATE NO USUARIO DOADOR
        $this->db->where('id_usuario', $doador->id);
        $this->db->update('usuarios_nivel', array('total_doado'=>$doadorD->total_doado+$doacao->valor,'ultima_atvidade'=>date('Y-m-d H:i:s') ));

        $this->db->where('id',$doador->id);
        $this->db->update('usuarios', array('cronometro'=>NULL));

        $this->InserirExtrato($extratoRecebId, '#'.$extratoRecebId.' aceitou doação de '.$extratoDoadNome.' #'.$extratoDoadId);
        $this->InserirExtrato($extratoDoadId, '#'.$extratoDoadId.'enviou doação a '.$extratoRecebNome.' #'.$extratoRecebId);

        $this->native_session->set_flashdata('mensagem','<div class="alert alert-success text-center">Doação confirmada</div>');

        redirect('painel');
    }

    public function recusarDoacao($id,$senha){

        $sessao = $this->native_session->get('user_id');
        $this->db->where('id',$sessao);
        $usuario = $this->db->get('usuarios')->row();

        if(md5($senha) != $usuario->senha){
            return '<div class="alert alert-danger text-center"><strong>Senha incorreta</strong></div>';
            exit;
        }

        //STATUS DE DOACAO : 0 = AGUARDANDO 1 = CONFIRMADA 2 = REJEITADA//
        $this->db->where('id', $id);
        $this->db->update('doacoes', array('status'=>'2'));

        $this->db->where('id', $id);
        $doacao = $this->db->get('doacoes')->row();

        $this->db->where('id',$doacao->id_doador);
        $this->db->update('usuarios', array('cronometro'=>date('Y-m-d H:i:s') ));

        $recusado = $this->infoUser($doacao->id_doador);
        $nomeRecusado = $recusado->nome;

        $this->InserirExtrato($sessao, 'recusou doação de '.$nomeRecusado);

        //return '<div class="alert alert-info text-center">Doação recusada</div>';

        $this->native_session->set_flashdata('mensagem','<div class="alert alert-info text-center">Doação recusada</div>');

        redirect('painel');
    }

    public function StatusDoacao(){

        $id_recebedor = $this->Recebedor();
        $id_doador = $this->native_session->get('user_id');
        $ciclo =  $this->ciclo();

        $this->db->where('id_recebedor',$id_recebedor);
        $this->db->where('id_doador',$id_doador);
        $this->db->where('ciclo', $ciclo);
        $doacoes = $this->db->get('doacoes');

        if( $doacoes->num_rows() > 0){
            
            return $doacoes->row();
        }  

       return false;

    }

    public function qtdDoacoes(){

        $doador = $this->native_session->get('user_id');//o cara que doa precisa ter recebido o bastante
        $this->db->where('id',$doador);
        $user = $this->db->get('usuarios')->row();

        if($user->ciclo == 0){
            $minimo = 0;
        }
        
        if($user->ciclo == 1){
            $minimo = 2;
        }

        if($user->ciclo == 2){
            $minimo = 10;
        }

        if($user->ciclo == 3){
            $minimo = 28;
        }

        $this->db->where_in('id_recebedor',  $doador);
        $doacoes = $this->db->get('doacoes');

        if($doacoes->num_rows() >= $minimo ){

            return true;
        }

        return false;

    }


////////////////////////////////////////////////////////////////////////// COMPROVANTES
    public function ListaComprovantes($id_fatura){

        $this->db->where('id_fatura', $id_fatura);
        $comprovantes = $this->db->get('comprovantes');

        if($comprovantes->num_rows() > 0){

            return $comprovantes->result();

        }
    }

    
///////////////////////////////////////////////////////////////////////////////////////// CONTAS BANCARIAS
    public function ContasBancarias(){

        $contas = $this->db->get('contas_bancarias');

        if($contas->num_rows() > 0){

            return $contas->result();
        }

        return false;
    }
/////////////////////////////////////////////////////////////////////////////////// EXTRATO
    

    public function InserirExtrato($sessao, $mensagem, $atividade = null){

        $array_extrato = array(
            'id_user'=>$sessao,
            'descricao'=>$mensagem,
            'atividade'=> $atividade,
            'data'=>date('Y-m-d H:i:s')
        );
        $this->db->insert('extrato', $array_extrato);
    }

    public function Extrato(){

        $sessao = $this->native_session->get('user_id');

        $this->db->where('id_user', $sessao);
        $this->db->order_by('id', 'DESC');

        $extrato = $this->db->get('extrato');

        if($extrato->num_rows() > 0){

            return $extrato->result();
        }

        return false;
    }

    public function ExtratoUtimaSemana(){

        $sessao = $this->native_session->get('user_id');

        $this->db->where('id_user', $sessao);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(5);

        $extrato = $this->db->get('extrato');

        if($extrato->num_rows() > 0){

            return $extrato->result();
        }

        return false;
    }


    public function TodosTickets(){

        $sessao = $this->native_session->get('user_id');

        $this->db->where('id_user', $sessao);
        $this->db->limit(6);
        $tickets = $this->db->get('tickets');

        if($tickets->num_rows() > 0){

            return $tickets->result();
        }

        return false;
    }

    public function TicketsFechados(){

        $sessao = $this->native_session->get('user_id');

        $this->db->where('id_user', $sessao);
        $this->db->where('status', '2');
        $tickets = $this->db->get('tickets');

        if($tickets->num_rows() > 0){

            return $tickets->result();
        }

        return false;
    }

    public function NovoTicket(){

        $sessao = $this->native_session->get('user_id');

        $assunto = $this->input->post('assunto');
        $mensagem = $this->input->post('mensagem');

        $array_ticket = array(
                                                'id_user'=>$sessao,
                                                'titulo'=>$assunto,
                                                'data'=>date('Y-m-d'),
                                                'status'=>0
                                                );

        $this->db->insert('tickets', $array_ticket);

        $array_ticket_mensagem = array(
                                                                    'id_ticket'=>$this->db->insert_id(),
                                                                    'mensagem'=>$mensagem,
                                                                    'user'=>1,
                                                                    'data'=>time()
                                                                    );

        $finish = $this->db->insert('tickets_mensagem', $array_ticket_mensagem);

        if($finish){

            return '<div class="alert alert-success text-center">Ticket aberto com sucesso, em breve responderemos.</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao abrir ticket.</div>';
    }

    public function InformacaoTicket($id){

        $sessao = $this->native_session->get('user_id');

        $this->db->where('id', $id);
        $this->db->where('id_user', $sessao);

        $ticket = $this->db->get('tickets');

        if($ticket->num_rows() > 0){

            return $ticket->row();

        }

        return false;
    }

    public function MensagensTicket($id){

        $this->db->order_by('data', 'ASC');
        $this->db->where('id_ticket', $id);
        $tickets_mensagens = $this->db->get('tickets_mensagem');

        if($tickets_mensagens->num_rows() > 0){

            return $tickets_mensagens->result();
        }

        return false;
    }

    public function AdicionarMensagemTicket($id){

        $resposta = $this->input->post('resposta');

        $array_mensagem = array(
                                                        'id_ticket'=>$id,
                                                        'mensagem'=>$resposta,
                                                        'user'=>1,
                                                        'data'=>time()
                                                        );

        $this->db->insert('tickets_mensagem', $array_mensagem);

        $this->db->where('id', $id);
        $this->db->update('tickets', array('status'=>0));
    }

    public function AtualizaNotificacoes(){

        $sessao = $this->native_session->get('user_id');

        $this->db->where('id_user', $sessao);
        $atualiza = $this->db->update('notificacoes', array('visto'=>1));

        if($atualiza){

            return true;
        }

        return false;
    }

  
}