<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_functions extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('usuario_model');
    }

    public function index(){
        echo 'Not permission';
    }

    public function processaPagamento(){

        $this->usuario_model->processaPagamento();
    }

    public function resolution(){

        
    }

    public function limpa(){

        $this->backoffice_model->limpaIndicadores();

        echo 'limpos';
    }

    public function aberturaMailling($idMailling){

        $this->db->where('id',$idMailling);
        $mailling = $this->db->get('automacao')->row();

        $abertura = $mailling->aberturas;

        $this->db->where('id',$idMailling);
        $this->db->update('automacao', array( 'aberturas'=>$abertura+1 ));


    }


    public function valida_cpf( $cpf ) {
    
        $cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
        // Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
        if ( strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {
            return FALSE;
        } else { // Calcula os números para verificar se o CPF é verdadeiro
        
        for ($t = 9; $t < 11; $t++) {
            
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return FALSE;
            }
        }
        return TRUE;
    }
    }

    public function registroPreCadastro(){

        //echo json_encode( array('result'=>'error','message'=>'Cadastro em manutenção.') );
        //return;

        if( $this->input->post() ){

            if(!in_array(NULL, $this->input->post() )){

                $fields = $this->input->post();

                if( $fields['senha'] != $fields['senha_confirma'] ){
                    echo json_encode( array('result'=>'error','message'=>'Senhas não conferem') );
                    return;
                }

                if(!is_numeric( $fields['telefone'] ) ){
                    echo json_encode( array('result'=>'error','message'=>'Use somente números no telefone' ) );
                    return;
                }

                if(! $this->valida_cpf( $fields['cpf'] ) ){
                    echo json_encode( array('result'=>'error','message'=>'CPF invalido' ) );
                    return;
                }

                //$this->db->where('telefone', $fields['telefone']);
                $this->db->where('cpf', $fields['cpf']);
                $this->db->or_where('email', $fields['email']);
                $exists = $this->db->get('usuarios_contas');

                if( $exists->num_rows() > 0 ){

                    echo json_encode( array('result'=>'error','message'=>'Cadastro já existe','clear'=>true) );
                    return;

                }else{


                    $campos = array(
                            'nome'=>$fields['nome'],
                            'sobrenome'=>$fields['sobrenome'],
                            'email'=>$fields['email'],
                            'cpf'=> $fields['cpf'],
                            'telefone'=>$fields['telefone'],
                            'senha'=>md5($fields['senha']),
                            'dataCadastro'=>date('Y-m-d H:i:s'),
                            'fechamento'=>1
                            );

                    if( !empty($fields['af']) ){
                        $campos['af'] = $fields['af'];
                    }
                    

                    $insert = $this->db->insert('usuarios_contas', $campos );

                    if($insert){

                        $data['nome'] = $fields['nome'];
                        $data['lugar'] = $this->db->insert_id();

                        // $body = $this->load->view('email/senha',$data,TRUE);

                        // $this->email->to( $fields['email'] );
                        // $this->email->from('suporte@redeads50.com', 'Painel Rede ADS50');
                        // $this->email->set_mailtype('html');
                        // $this->email->subject('Nova senha do Painel - '.$fields['nome']);
                        // $this->email->message($body);

                        // $envia = $this->email->send();

                        echo json_encode( array('result'=>'success','message'=>'Parabéns. Você está participando.','clear'=>true ) );
                        return;
                    }

                }

            }

            echo json_encode( array('result'=>'error','message'=>'Os campos não podem ficar vazios') );
            return;
        }

        echo json_encode( array('result'=>'error','message'=>'Ação não permitida') );
        
    }

    public function getBanco($id){

        $this->db->where('id',$id);
        $getBanco = $this->db->get('usuarios_bancos');
        if($getBanco->num_rows() > 0){
            echo json_encode( unserialize( $getBanco->row()->banco ) );
            return;
        }
    }

    public function getDoacao($id){

        $this->db->where('id',$id);
        echo json_encode( $this->db->get('doacoes')->row() );
        return;
    }

    public function enter($id){

        $idConta = $this->backoffice_model->infoUser($id)->conta_id;

        $this->native_session->set('user_id', $id);
        $this->native_session->set('conta_id',$idConta);

        redirect('backoffice/usuario');
    }


    public function consultaEmail($email){

        $this->db->where('email',$email);
        $emailExiste = $this->db->get('usuarios_contas');

        if($emailExiste->num_rows() > 0){
            
            return true;
        }

    }



    

    

    public function linkUnicoCiclo1(){
        $this->backoffice_model->LinkUnicoCiclo1(1);
        echo '<pre>';
        var_dump( $this->backoffice_model->RastreadorLinkUnicoCiclo1() );
        echo '</pre>';
    }

    public function linkUnicoCiclo2(){
        $this->backoffice_model->LinkUnicoCiclo2(1147);
        echo '<pre>';
        var_dump( $this->backoffice_model->RastreadorLinkUnicoCiclo2() );
        echo '</pre>';
    }

    public function linkUnicoCiclo3(){
        $this->backoffice_model->LinkUnicoCiclo1(1535);
        echo '<pre>';
        var_dump( $this->backoffice_model->RastreadorLinkUnicoCiclo3() );
        echo '</pre>';
    }


    public function organizacao(){
        $this->backoffice_model->Organizacao($id = null);
        echo '<pre>';
        var_dump( $this->backoffice_model->OrganizacaoHorizontal() );
        echo '</pre>';
    }

    public function verificaGeral(){
        $this->backoffice_model->verificaGeral();
    }

    public function naoReceberam(){ 

        $this->db->where('superCicloUsuario',1);
        $usuarios = $this->db->get('usuarios')->result();

        $i = 0;

        foreach ($usuarios as $value) {
            
            $this->db->where('idIndicador',$value->idUsuario);
            $exist = $this->db->get('indicadores');

            if($exist->num_rows() == 0){


                $i++;

            }
        }

        echo $i;
    }


    public function Recebedor($id){

        var_dump( $this->backoffice_model->Recebedor($id,2 ) );
    }


    public function marcarPresenca(){

        $fields = array( 'idConta'=> $this->input->post('user_id') );
        
        $this->db->where( $fields );
        $usuario = $this->db->get('lista_presenca');

        if( $usuario->num_rows() > 0 ){
            echo json_encode( array('mensagem'=>'Sua presenca ja está confirmada', 'success'=>'false' )  );
            return;

        }elseif

        ( $usuario->num_rows() == 0 ){

        	$this->db->insert('lista_presenca', array('idConta'=>$this->input->post('user_id'),'presencaStatus'=>1) );
            echo json_encode( array('mensagem'=>'Parabéns. Você marcou presença.', 'success'=>'true' )  );
            return;
        }

        echo json_encode( array('success'=>'false','mensagem'=>'Você não tem autorização para essa conta') );
        return;
        

    }

        
   
    public function navegaConta(){

        $fields = array( 'idUsuario'=> $this->input->post('user_id'), 'conta_id'=>$this->native_session->get('conta_id') );
        
        $this->db->where( $fields );
        $usuario = $this->db->get('usuarios');

        if( $usuario->row()->block == 1 ){
            echo json_encode( array('mensagem'=>'Conta bloqueada. Entre em contato com o suporte', 'success'=>'false' )  );
            return;

        }elseif

        ($usuario){
            $this->native_session->set('user_id', $this->input->post('user_id') );
            echo json_encode( array('mensagem'=>'Redirecionando', 'redirect'=>base_url("backoffice/usuario"), 'success'=>'true' )  );
            return;
        }

        echo json_encode( array('success'=>'false','mensagem'=>'Você não tem autorização para essa conta') );
        return;
        

    }

    public function viewPhoto(){
 
        $this->db->where('id', $this->native_session->get('conta_id') );
        $usuario = $this->db->update('usuarios_contas', array('viewPhoto'=>$this->input->post('viewPhoto') ));

        if($usuario){
           
            echo json_encode( array('mensagem'=>'Feito', 'success'=>'true' )  );
            return;
        }

        echo json_encode( array('success'=>'false','mensagem'=>'Erro ao salvar') );
        return;
        

    }


}