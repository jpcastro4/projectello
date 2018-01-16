<?php
class Backoffice_model extends CI_Model{

    public $bonus = array(10,3,1,1);

    public function __construct(){
        parent::__construct();

        $this->load->helper('file');
        $this->load->helper('url_amigavel');
        date_default_timezone_set('America/Sao_Paulo');
    }

    public function todasAsDoacoes(){
        $this->db->where('status',1);
        $this->db->or_where('status',2);
        $doacoes = $this->db->get('doacoes');

        if($doacoes->num_rows() > 0 ){

            return $doacoes->result();
        }

        return false;
    }

    public function RecuperarSenhaConta(){

        $cpf = $this->input->post('cpf');

        if(empty($cpf)){

            $this->native_session->set_flashdata('mensagem','<div class="alert alert-success text-center" data-dismiss="alert">O campo não pode ficar vazio.</div>');
            redirect('backoffice/esqueci');
        }

        $this->db->where('cpf',$cpf);
        $log = $this->db->get('log_senha');

        if($log->num_rows() > 0 ){

            $limite = $log->last_row()->log + 600;

            if( strtotime('now') < $limite ){

                $this->native_session->set_flashdata('mensagem','<div class="alert alert-success text-center" data-dismiss="alert">Você solicitou uma senha agora pouco. Aguarde um instante.</div>');
                redirect('backoffice/esqueci');
            }
        }

        $this->db->where('cpf', $cpf);
        $user = $this->db->get('usuarios_contas');

        if($user->num_rows() > 0){

            $row = $user->row();

            $s1 = rand(302, 999);
            $s2 = 'Az';
            $s3 = rand(10, 55);
            $s4 = 'EmT';

            $nova_senha = $s1.$s2.$s3.$s4;

            $this->db->where('id', $row->id);
            $this->db->update('usuarios_contas', array('senha'=>md5($nova_senha)));

            $data['nome'] = $row->nome;
            $data['senha'] = $nova_senha;

            $config['protocol'] ='smtp';
            $config['smtp_host'] = 'srv30.prodns.com.br';
            $config['smtp_user'] = 'suporte@nowx.club';
            $config['smtp_pass'] = 'now2016x';
            $config['smtp_port'] = '465';
            $config['smtp_crypto'] = 'ssl';
            $config['mailtype'] = 'html';

            $this->email->initialize($config);

            $body = $this->load->view('email/senha',$data,TRUE);

            $this->email->to( $row->email);
            $this->email->from('suporte@nowx.club', 'BackOffice Now X');
            $this->email->set_mailtype('html');
            $this->email->subject('Nova senha da Conta - '.$row->cpf);
            $this->email->message($body);

            $envia = $this->email->send();

            if($envia){

                $this->db->insert('log_senha', array('cpf'=>$cpf, 'log'=>strtotime('now') ));

                $this->native_session->set_flashdata('mensagem','<div class="alert alert-success text-center">Dentro de 2 minutos sua nova senha estará no seu email.</div>');
                redirect('backoffice/esqueci');
            }

            $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger text-center">Erro ao enviar nova senha. Tente novamente.</div>');
            redirect('backoffice/esqueci');

        }

        $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger text-center">O login informado não existe.</div>');
        redirect('backoffice/esqueci');
    }


    public function afiliadoUsers(){

        $this->db->where_in('idAfiliado', $this->native_session->get('afiliado_id') );
        $afiliado = $this->db->get('afiliados')->row();

        $result['afiliado'] =  $afiliado;
        
        $result['total'] = $this->db->get('usuarios_contas')->num_rows();

        $this->db->where('af', $afiliado->rastreamento );
        $result['total_afiliados'] = $this->db->get('usuarios_contas')->num_rows();

        $this->db->where('af', $afiliado->rastreamento );
        $result['indicados'] = $this->db->get('usuarios_contas')->result();

        return (object) $result;
    }

    public function lista(){
        
        $this->db->where('block',0);
        $result['total'] = $this->db->get('usuarios_contas')->num_rows();

        $result['indicados'] = $this->db->get('usuarios_contas')->result();

        return (object) $result;
    }

    public function lista_desatualizados(){

        $this->db->where(array('dataUltimoLogin'=>'0000-00-00 00:00:00','block'=>0) );
        $result['total'] = $this->db->get('usuarios_contas')->num_rows();

        $this->db->where(array('dataUltimoLogin'=>'0000-00-00 00:00:00','block'=>0) );
        $result['indicados'] = $this->db->get('usuarios_contas')->result();

        return (object) $result;
    }

    public function fila_aptos(){

        $this->db->where(array('dataUltimoLogin !='=>'0000-00-00 00:00:00','block'=>0) );
        $result['total'] = $this->db->get('usuarios_contas')->num_rows();

        $this->db->where(array('dataUltimoLogin !='=>'0000-00-00 00:00:00','block'=>0) );
        $result['indicados'] = $this->db->get('usuarios_contas')->result();

        return (object) $result;
    }

    
    //////////////////////////////////////////////////////////////////////////////////////   SUPER USER

    public function superUser($user){

        $this->native_session->set('user_id', $user);
        $this->native_session->set('superuser',true);
        redirect('painel');
    }



    //////////////////////////////////////////////////////////////////////////////////////   VIEWS
   	
   	public function conta(){

        $sessao = $this->native_session->get('conta_id');

        $this->db->where('id', $sessao);
        $user = $this->db->get('usuarios_contas');

        $row = $user->row();
	
		return $row;

    }

    public function conta_coluna($coluna, $parametro = null){

        $sessao = $this->native_session->get('conta_id');

        $this->db->where('id', $sessao);
        $user = $this->db->get('usuarios_contas');

        $row = $user->row();

        if(is_null($parametro)){

            return $row->$coluna;
        }

        preg_match('/[^\s]*/i', $row->$coluna, $matches);

        return $matches[0];
    }

    public function usuariosContas(){
        $conta = $this->native_session->get('conta_id');

        $this->db->where(array( 'conta_id'=> $conta,'tipagem'=>'P') );
        $usuarios = $this->db->get('usuarios');

        if( $usuarios->num_rows() > 0 ){

            return $usuarios->result();
        }

        return false;
    }

    public function contaBancos($recebedor = null){

        if($recebedor == null){
            $conta = $this->native_session->get('conta_id');
        }else{
            $conta = $recebedor;
        }
        

        $this->db->where_in('idContaUsuario', $conta);
        $usuarios = $this->db->get('usuarios_bancos');

        if( $usuarios->num_rows() > 0 ){

            return $usuarios->result();
        }

        return false;
    }



    public function user(){

        $sessao = $this->native_session->get('user_id');

        $this->db->from('usuarios');
        $this->db->where('usuarios.idUsuario',$sessao);
        $this->db->join('usuarios_sc', 'usuarios_sc.idUsuario = usuarios.idUsuario');
        $this->db->join('usuarios_contas', 'usuarios_contas.id = usuarios.conta_id');
        $user = $this->db->get();

        return $user->row();
    }

    public function user_coluna($coluna){

        $sessao = $this->native_session->get('user_id');

        $this->db->from('usuarios');
        $this->db->where('usuarios.idUsuario',$sessao);
        $this->db->join('usuarios_sc', 'usuarios_sc.idUsuario = usuarios.idUsuario');
        $user = $this->db->get();

        $row = $user->row();

        return $row->$coluna;
   
    }
    
    
    public function infoUser($usuario){

        //$result = array();

        $this->db->from('usuarios');
        $this->db->where_in('usuarios.idUsuario',$usuario);
        $this->db->join('usuarios_sc', 'usuarios_sc.idUsuario = usuarios.idUsuario');
        $this->db->join('usuarios_contas', 'usuarios.conta_id = usuarios_contas.id');
        $user = $this->db->get();

        $result = $user->row();

        return  $result;
    }


    public function recebimentos(){

        $this->db->where('idRecebedor', $this->native_session->get('user_id'));
        $recebimentos = $this->db->get('doacoes');

        if( $recebimentos->num_rows() > 0){

            return $recebimentos->result();
        }

        return false;
    }

    public function doacoes(){

        $this->db->where('idDoador', $this->native_session->get('user_id'));
        $recebimentos = $this->db->get('doacoes');

        if( $recebimentos->num_rows() > 0){

            return $recebimentos->result();
        }

        return false;
    }

    public function doacoesReentradas(){

        // $this->db->select('idUsuario,conta_id,tipagem');
        $this->db->where( array('tipagem'=>'R','conta_id'=>$this->native_session->get('conta_id') ) );
        $this->db->from('usuarios');
        $this->db->join('doacoes', 'doacoes.idDoador = usuarios.idUsuario ' );
        $recebimentos = $this->db->get();

        if( $recebimentos->num_rows() > 0){

            return $recebimentos->result();
        }

        return false;
    }










    public function AlterarBanco(){

        $user = $this->native_session->get('conta_id');

        $fields = serialize( (object) $this->input->post() );

        if( $this->input->post('id') ){
            
            $this->db->where(array('idContaUsuario'=>$user,'id'=> $this->input->post('id') ) );
            $conta = $this->db->update('usuarios_bancos', array('banco'=>$fields) );
            $this->native_session->set_flashdata('mensagem','<div class="alert alert-info text col-xs-12 text-center"> Banco alterado </div>');
            redirect('backoffice/configuracoes');

        }else{

            $insert = $this->db->insert('usuarios_bancos', array('idContaUsuario'=>$user,'banco'=>$fields));

            if($insert){
                $this->native_session->set_flashdata('mensagem','<div class="alert alert-info text col-xs-12 text-center"> Banco inserido </div>');
                redirect('backoffice/configuracoes');
            }

        }
    }

















    ///////////////////////////////////////////////////////////////////////// FUNÇÕES DE UPLINE

    //SE É LIDER 

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



    /*-------------------------------------------------- UPLINES */
    
    // UPLINE DIRETO
    public function indicador(){
        $sessao = $this->native_session->get('user_id');

        $this->db->where('idUsuario',$sessao);
        $users = $this->db->get('indicadores');

        if($users->num_rows() > 0 ){
            $row = $users->row();
            $indicador = $row->id_indicador;
            return $indicador;
        }

        return false;
    }





     //

    //

    //   SOMENTE PARA ORGANIZAR

    //

    //

    public function o2login($id){

        $this->db->where('idDoador',$id);
        $update = $this->db->update('doacoes', array('reentrada'=>0) );
        if($update){
            return true;
        }

        return false;
    }


    public function verificaGeral(){

        $this->db->where('tipagem','P');
        $usuarios = $this->db->get('usuarios');
        $i = 1;
        foreach ($usuarios->result() as $usuario ) {
                
            // if( $this->infoUser($usuario->idUsuario)->lider == 0 ){

            //     echo '</br></br>ID login '.$usuario->idUsuario.' - Conta '.$this->infoUser($usuario->idUsuario)->conta_id.' - '.$this->infoUser($usuario->idUsuario)->nome.'</br>';

            //     $this->fazReentrada($usuario->idUsuario);
            //     $i++;
            // }

            //VERIFICANDO OS LOGINS COMRPADOS QUE ENTRARAM COMO REENTRADA
            if( $this->infoUser($usuario->idUsuario)->tipagem == 'P' ){
                
                if( $this->o2login($usuario->idUsuario) ){

                    echo '</br></br>ID login '.$usuario->idUsuario.' - Conta '.$this->infoUser($usuario->idUsuario)->conta_id.' - '.$this->infoUser($usuario->idUsuario)->nome.'</br>';
                    $i++;
                }              
            }
        }

        echo $i;
    }


    


    public $organizando = array();

    public function Organizacao($idIndicador, $sobe = 1){ 
                    
        //INDICA O USUARIO MATRIZ
        $this->db->where_in('idIndicador', $idIndicador);
        $indicadores = $this->db->get('indicadores');

        if($indicadores->num_rows() > 0){
            //FAZ O LAÇO NO USUARIOS
            
            foreach($indicadores->result() as $row){

                $proximo = $row->idUsuario;
                $this->organizando[$sobe][] = $proximo;
                $this->Organizacao($proximo, $sobe+1);
                   
            }
        }

        //return $this->organizando;

    }


    public function contaOrganizando(){

        return count($this->organizando);
    }

    //ENFILERA NA HORIZONTAL DA ESQUERDA PARA A DIREITA
    public function OrganizacaoHorizontal( $linha = 1, $nivel = null, $travado = 1){//DESCENDO DOIS NIVEIS
        set_time_limit(2000);

        if( $travado == 1 ){
            
            $nivel = $this->contaOrganizando();
        }

        echo $linha.'</br></br>';
      
        if( $nivel > 0 ){ //VERIRICA SE O NIVEL AINDA É MAIOR QUE 0.
            $i = 1;
            foreach( $this->organizando[1] as $id){ // FAZ O LACO INSERINDO O CICLO QUE DESEJA ENFILEIRAR
                    
                    if( $this->aptoReentradaCiclo1($id) != false AND  $this->infoUser($id)->lider == 0 ){

                        $this->fazReentrada($id);

                        echo $linha.' - Id login '.$id.' - Conta '.$this->infoUser($id)->conta_id.' - '.$this->infoUser($id)->nome.' - '.$this->aptoReentradaCiclo1($id).'</br></br>';

                        echo $i++.'</br></br>';
                    
                    }
            }
            
            //$this->OrganizacaoHorizontal( $linha+1, $nivel-1, 0 );  
            
        }      
       
        return;
        
    }

    

    public function aptoReentradaCiclo1($id){

        $conta = $this->infoUser($id)->conta_id;

        $this->db->where( array( 'conta_id'=>$conta, 'tipagem'=>'R' ) );
        $resultR = $this->db->get('usuarios');

        if( $resultR->num_rows() < 2 ){

            $this->db->where(array('idRecebedor'=>$id,'status'=>'0','superCiclo'=>1) );
            $result = $this->db->get('doacoes');

            if( $result->num_rows() == 7 ){

                return $result->num_rows();
            }

        }

        return false;
    }


    public function aptoReentradaCiclo2($id){

        $this->db->where(array('idRecebedor'=>$id,'status'=>'0','superCiclo'=>2) );
        $result = $this->db->get('doacoes');

        if( $result->num_rows() == 3 ){

            return true;
        }

        return false;
    }

    public function aptoReentradaCiclo3($id){

        $this->db->where(array('idRecebedor'=>$id,'status'=>'0','superCiclo'=>3) );
        $result = $this->db->get('doacoes');

        if( $result->num_rows() == 6 ){

            return true;
        }

        return false;
    }


    public function jaTemIndicador($id){

        //JA TEM UM INDICADOR
        $this->db->where('idUsuario',$id);
        $result = $this->db->get('indicadores');

        if($result->num_rows() == 1 ){

            $this->db->where('id',$this->infoUser($id)->conta_id);
            $this->db->update('usuarios_contas', 
                array(
                    'aptoPara'=>0
                    )
                );
        }
    }


    public function correcaoCiclo2($id){

        $conta = $this->infoUser($id)->conta_id;
        $aptoPara = $this->infoUser($id)->aptoPara;

        $this->db->where( array( 'idRecebedor'=>$id , 'status'=>0 ) );
        $result = $this->db->get('doacoes');

        $this->db->where( array( 'conta_id'=> $conta , 'superCicloUsuario'=>2 ) );
        $temCiclo2 = $this->db->get('usuarios');

        if( $aptoPara == 0 AND $result->num_rows() >= 5 AND $temCiclo2->num_rows() == 0 ){

            $this->db->where('id',$conta);
            $this->db->update('usuarios_contas',
                array(
                '   aptoPara'=>2,
                )
            );

            return false;
        }   

        return false;     

    }

    public function aptosParaCiclo2(){

        $this->db->where(array('aptoPara'=>2 ) );
        $result = $this->db->get('contas_usuarios');

        return $result->num_rows();
    }

    public function derramamentoPlus($id){

        $this->db->where(array('idRecebedor'=>$id,'status'=>'0' ) );
        $result = $this->db->get('doacoes');

        if( $result->num_rows() == 6 ){

            return true;
        }

        return false;
    }

    public function naoRecebeuNenhuma($id){

        $this->db->where_in(array('idRecebedor'=>$id ) );
        $result = $this->db->get('doacoes');

        if( $result->num_rows() === 0 ){

            return $result->num_rows();
        }

        return false;
    }







    public $arrayLinkUnicoCiclo1 = array();

    public function LinkUnicoCiclo1($idIndicador = 1, $sobe = 1){ 
                    
        //INDICA O USUARIO MATRIZ
        $this->db->where_in('idIndicador', $idIndicador);
        $indicadores = $this->db->get('indicadores');

        if($indicadores->num_rows() > 0){
            //FAZ O LAÇO NO USUARIOS
            
            foreach($indicadores->result() as $row){

                $proximo = $row->idUsuario;

                $this->arrayLinkUnicoCiclo1[$sobe][] = $proximo;
            
                $this->LinkUnicoCiclo1($proximo, $sobe+1);
                   
            }
        }

        return $this->arrayLinkUnicoCiclo1;

    }


    public function arrayLinkUnicoCiclo1(){

        return count($this->arrayLinkUnicoCiclo1);
    }

    //ENFILERA NA HORIZONTAL DA ESQUERDA PARA A DIREITA
    public function RastreadorLinkUnicoCiclo1( $linha = 1, $nivel = null, $travado = 1){//DESCENDO DOIS NIVEIS
        set_time_limit(800);

        if( $travado == 1 ){
            
            $nivel = $this->arrayLinkUnicoCiclo1();
        }

        echo $nivel.'</br></br>';
      
        if( $nivel > 0 ){ //VERIRICA SE O NIVEL AINDA É MAIOR QUE 0.
            
            foreach( $this->arrayLinkUnicoCiclo1[$linha] as $id){ // FAZ O LACO INSERINDO O CICLO QUE DESEJA ENFILEIRAR
                    
                    //SE JA TEM UM INDICADOR GANHAR 0 NO APTOPARA
                    //$this->jaTemIndicador($id);

                    //SE JA TEM IGUAL OU MAIS DE 5 DOACOES GANHA 2 NO APTOPARA
                    //$this->correcaoCiclo2($id);
                    
                        echo $nivel.' - '.$linha.'</br>';
                        echo 'Proximo login '.$id.'</br>';
                        echo 'Conta '.$this->infoUser($id)->conta_id.' - '.$this->infoUser($id)->nome.'</br></br>';
                    
                        //SE JA DOOU E NAO TEM NINGUEM VAI RECEBER INDICADOS
                        $this->alimentaCiclo1($id);
                      
                    // echo 'Recebedores  </br></br>';
                    // echo '<pre>';
                    // echo $this->Recebedor($id,1). 'conta '. $this->infoUser($this->Recebedor($id,1))->conta_id ;
                    // echo '</pre>';

                }
            
            $this->RastreadorLinkUnicoCiclo1( $linha+1, $nivel-1, 0 );  
        }      
       

        return false;
        
    }




    public $arrayLinkUnicoCiclo2 = array();

    public function LinkUnicoCiclo2($idIndicador, $sobe = 1){ 
                    
        //INDICA O USUARIO MATRIZ
        $this->db->where_in('idIndicador', $idIndicador);
        $indicadores = $this->db->get('indicadores');

        if($indicadores->num_rows() > 0){
            //FAZ O LAÇO NO USUARIOS
            
            foreach($indicadores->result() as $row){

                $proximo = $row->idUsuario;

                $this->arrayLinkUnicoCiclo2[$sobe][] = $proximo;
                $this->LinkUnicoCiclo2($proximo, $sobe+1);
                   
            }
        }

        return $this->arrayLinkUnicoCiclo2;

    }


    public function arrayLinkUnicoCiclo2(){

        return count($this->arrayLinkUnicoCiclo2);
    }

    //ENFILERA NA HORIZONTAL DA ESQUERDA PARA A DIREITA
    public function RastreadorLinkUnicoCiclo2( $linha = 1, $nivel = null, $travado = 1){//DESCENDO DOIS NIVEIS
        set_time_limit(800);

        if( $travado == 1 ){
            
            $nivel = $this->arrayLinkUnicoCiclo2();
        }

        echo $nivel.'</br></br>';
      
        if( $nivel > 0 ){ //VERIRICA SE O NIVEL AINDA É MAIOR QUE 0.
            
            foreach( $this->arrayLinkUnicoCiclo2[$linha] as $id){ // FAZ O LACO INSERINDO O CICLO QUE DESEJA ENFILEIRAR
                    
                    //SE JA TEM UM INDICADOR GANHAR 0 NO APTOPARA
                    //$this->jaTemIndicador($id);

                    //SE JA TEM IGUAL OU MAIS DE 5 DOACOES GANHA 2 NO APTOPARA
                    //$this->correcaoCiclo2($id);
                    
                    echo $nivel.' - '.$linha.' - Id login '.$id.' - Conta '.$this->infoUser($id)->conta_id.' - '.$this->infoUser($id)->nome.'</br></br>';
                    
                    //SE JA DOOU E NAO TEM NINGUEM VAI RECEBER INDICADOS
                    $this->alimentaCiclo2($id);

                    // echo 'Recebedores  </br></br>';
                    // echo '<pre>';
                    // echo $this->Recebedor($id,2). 'conta '. $this->infoUser($this->Recebedor($id,2))->conta_id ;
                    // echo '</pre>';

                }
            
            $this->RastreadorLinkUnicoCiclo2( $linha+1, $nivel-1, 0 );  
        }      
       

        return false;
        
    }




    public $arrayLinkUnicoCiclo3 = array();

    public function LinkUnicoCiclo3($idIndicador, $sobe = 1){ 
                    
        //INDICA O USUARIO MATRIZ
        $this->db->where_in('idIndicador', $idIndicador);
        $indicadores = $this->db->get('indicadores');

        if($indicadores->num_rows() > 0){
            //FAZ O LAÇO NO USUARIOS
            
            foreach($indicadores->result() as $row){

                $proximo = $row->idUsuario;

                $this->arrayLinkUnicoCiclo3[$sobe][] = $proximo;
                $this->LinkUnicoCiclo3($proximo, $sobe+1);
                   
            }
        }

        return $this->arrayLinkUnicoCiclo3;

    }


    public function arrayLinkUnicoCiclo3(){

        return count($this->arrayLinkUnicoCiclo3);
    }

    //ENFILERA NA HORIZONTAL DA ESQUERDA PARA A DIREITA
    public function RastreadorLinkUnicoCiclo3( $linha = 1, $nivel = null, $travado = 1){//DESCENDO DOIS NIVEIS
        set_time_limit(800);

        if( $travado == 1 ){
            
            $nivel = $this->arrayLinkUnicoCiclo3();
        }

        echo $nivel.'</br></br>';
      
        if( $nivel > 0 ){ //VERIRICA SE O NIVEL AINDA É MAIOR QUE 0.
            
            foreach( $this->arrayLinkUnicoCiclo3[$linha] as $id){ // FAZ O LACO INSERINDO O CICLO QUE DESEJA ENFILEIRAR
                    
                    //SE JA TEM UM INDICADOR GANHAR 0 NO APTOPARA
                    //$this->jaTemIndicador($id);

                    //SE JA TEM IGUAL OU MAIS DE 5 DOACOES GANHA 2 NO APTOPARA
                    //$this->correcaoCiclo3($id);
                    
                    echo $nivel.' - '.$linha.' - Id login '.$id.' - Conta '.$this->infoUser($id)->conta_id.' - '.$this->infoUser($id)->nome.'</br></br>';
                    
                    //SE JA DOOU E NAO TEM NINGUEM VAI RECEBER INDICADOS
                    $this->alimentaCiclo3($id);

                    // echo 'Recebedores  </br></br>';
                    // echo '<pre>';
                    // echo $this->Recebedor($id,1). 'conta '. $this->infoUser($this->Recebedor($id,1))->conta_id ;
                    // echo '</pre>';

                }
            
            $this->RastreadorLinkUnicoCiclo3( $linha+1, $nivel-1, 0 );  
        }      
       

        return false;
        
    }


    public function qdTdoacoesRecebidas($id,$qtd){

        $this->db->where('idRecebedor',$id);
        $result = $this->db->get('doacoes');

        if( $result->num_rows() >= $qtd){

            return true;
        }

        return false;
    }


    //usar ele para o LINK UNICO DE ALIMENTACAO DO CICLO 1
    //QUANTIDADE DE DOACOES EFETIVADAS E SE JA TEM OS TRES INDICADOS
    public function qdTdoacoesFeitas($id){

        $this->db->where(array('idDoador'=>$id,'status'=>0) );
        $result = $this->db->get('doacoes');

        if( $result->num_rows() == 1){

            return true;
        }

        return false;
    }











    
    public $uplines = array();
    //DEFININDO O RECEBEDOR ACIMA
    public function ArvoreUplines($idUsuario, $superCiclo, $niveis = 2, $sobe = 1){

        if($niveis > 0){

            $this->db->where( array('idUsuario'=> $idUsuario, 'superCiclo'=>$superCiclo ) );
            $indicadores = $this->db->get('indicadores');
            
            if($indicadores->num_rows() > 0){

                $proximo = $indicadores->row()->idIndicador;
           
                $this->uplines[$sobe] = $proximo;
                return $this->ArvoreUplines($proximo, $superCiclo, $niveis-1, $sobe+1);
            }
            
        }

        return $this->uplines;

    }


    public function Recebedor($idDoador,$superCiclo){


        // O RECEBEDOR É DEFINIDO DE ACORDO COM A POSIÇÃO DO DOADOR NO SUPER CICLO
        //$idDoador = $this->native_session->get('user_id');
        $this->ArvoreUplines($idDoador,$superCiclo);

        //INDICADORES
        $this->db->where( array('idUsuario'=>$idDoador, 'superCiclo'=>$superCiclo,'tipagem'=>'P') );
        $doador = $this->db->get('indicadores');

        if($doador->num_rows() > 0 ){

            $posicao = $doador->row()->posicao;

            $uplines = $this->uplines;

            if( $posicao == 1 ){

                if( !empty($uplines[1]) ){

                    $recebedor = $uplines[1]; //traz o ciclo do usuario logado pra dentro da array para definir quem é o upline recebedor.

                    if( $this->infoUser($recebedor)->block == 0 ){

                        return $recebedor;
                    }

                }else{
                    return false;
                }
                
            }elseif( $posicao == 2 ){

                if(!empty($uplines[2]) ){

                    $recebedor = $uplines[2]; //traz o ciclo do usuario logado pra dentro da array para definir quem é o upline recebedor.

                    if( $this->infoUser($recebedor)->block == 0 ){

                        return $recebedor;
                    }

                }else{
                    return false;
                }

            }elseif( $posicao == 3 ){

                if(!empty($uplines[2]) ){

                    $recebedor = $uplines[2]; //traz o ciclo do usuario logado pra dentro da array para definir quem é o upline recebedor.

                    if( $this->infoUser($recebedor)->block == 0 ){

                        return $recebedor;
                    }

                }else{

                    return false;
                }

            }else{

                return false;
            }

        }

        return 1;
        
    }



    public function AptosCiclo2(){

        $query = $this->db->query('SELECT idRecebedor, COUNT(idRecebedor) AS total FROM doacoes GROUP BY idRecebedor ORDER BY total DESC')->result();

        return $query;

    }


   





    public $completando = array();

    public function RastreadorAptosCiclo($idIndicador, $sobe = 1){ 
                    
        //INDICA O USUARIO MATRIZ
        $this->db->where_in('idIndicador', $idIndicador);
        $indicadores = $this->db->get('indicadores');

        if($indicadores->num_rows() > 0){
            //FAZ O LAÇO NO USUARIOS
            foreach($indicadores->result() as $row){

                $proximo = $row->idUsuario;

                if( $this->qdTdoacoes($proximo )  ){//passando somente quem tem 5 doacoes para preencher as linhas    

                    //$this->completando[$sobe][] = $proximo;
                    $this->upgrade($proximo);
                }
                
                $this->RastreadorAptosCiclo($proximo, $sobe+1);
                   
            }
        }

        return $this->completando;

    }



    public function countMatriz(){

        return count($this->completando);
    }

    //ENFILERA NA HORIZONTAL DA ESQUERDA PARA A DIREITA
    public function RedeEDAptosCiclo($id_matriz, $indicados = 3 , $linha = 1, $nivel = null ){//DESCENDO DOIS NIVEIS
        //set_time_limit(20000);
        $this->RastreadorAptosCiclo($id_matriz); //USANDO O ID INDICADO ALIMENTA O RASTREADOR COM OS INDICADOS ABAIXO DO MATRIZ

        if( $nivel == null ){
            
            $nivel = $this->countMatriz();
        }
      
        if( $nivel > 0 ){ //VERIRICA SE O NIVEL AINDA É MAIOR QUE 0.

            if( $this->countMatriz() > 0){ //CONTA OS INDICES DA ARRAY. SE 0 RETORNA O PROPRIO MATRIZ. SIGNIFICA QUE ELE NAO TEM INDICADOS.
                
                foreach( $this->completando[$linha] as $id){ // FAZ O LACO INSERINDO O CICLO QUE DESEJA ENFILEIRAR

                    $indicado = $this->numIndicados($id );
                    if( $indicado->num_rows < $indicados AND $this->verificaQtdDoacoesFeitas($id,5) == TRUE ){ //INDICA AS CONDICOES.

                        return array('indicado'=>$id,'conta_id'=>$this->infoUser($id)->conta_id,'num_indicados'=>$indicado->num_rows );//traz o primeiro que obedece a condição
                        break; //para no primeiro que encontrar
                    }  
  
                }
                
                return  $this->RedeEDAptosCiclo( $id_matriz, $linha+1, $nivel-1 );
            }
             
        }

        return false;      
    }


    public function numIndicados($id){

        $this->db->where_in('idIndicador', $id);
        $downlines = $this->db->get('indicadores');

        $result['num_rows'] = $downlines->num_rows();

        return (object) $result;

    }






    public function geneses(){

        //CADASTRA O PRIMEIRO LOGIN PARA O FECHAMENTO SEGUINTE - usuarios / usuarios_sc
        $this->db->where('idUsuario',1);
        $usuarios = $this->db->get('usuarios');

        if($usuarios->num_rows() == 0){

            $this->db->where('id',1);
            $pre = $this->db->get('usuarios_contas');
            
            $login = substr($pre->row()->email, 0, strpos($pre->row()->email, '@'));

            $this->db->insert('usuarios',
                array(
                    'login'=>$login,
                    'dataCadastro'=>date('Y-m-d H:i:s'),
                    'superCicloUsuario'=>1,
                    'token'=> md5(date('Y-m-d H:i:s').'-'.$login),
                    'conta_id'=>1,
                    'tipagem'=>'P',
                    'jornada'=>1,
                    'lider'=>1
                    )
                );

            $this->db->insert('usuarios_sc',
                array(
                    'idUsuario'=>1,
                    'superCiclo'=>1,
                    'dataEntrada'=>date('Y-m-d H:i:s'),
                    'ultimaAtividade'=>date('Y-m-d H:i:s'),
                    'status'=>1,
                    'jornada'=> 1,
                    'fechamento'=>1,
                    'reentradas'=>0,
                    )
                );

            echo "Idealizador cadastrado</br>";
        }

        echo "Idealizador encontrado</br>";

        //CONTA QUANTOS FECHAMENTOS E JORNADAS O IDEALIZADOR FEZ
        $this->db->where('idUsuario', 1);
        $result = $this->db->get('indicadores');

        if( $result->num_rows() <= 0 ){

            $this->db->insert('indicadores',
                array(
                    'idIndicador'=>1,
                    'idUsuario'=>1, 
                    'superCiclo'=>1,
                    'posicao'=>1,
                    'jornada'=>1,
                    'fechamento'=>$result->num_rows()+1
                    )
                );            
        }

        echo "Fechamento contabilizado</br>";

        //$fechamento = $result->num_rows()+1;

        //DERRAMA OS PRIMEIROS INDICADOS - indicadores
        //$this->alimentaCiclo1(1);

    }


    public function geneses2(){

        //CADASTRA O PRIMEIRO LOGIN PARA O FECHAMENTO SEGUINTE - usuarios / usuarios_sc
        $this->db->where('idUsuario',1);
        $usuarios = $this->db->get('usuarios');

        if($usuarios->num_rows() > 0){

            echo "Idealizador encontrado</br>";

            $this->db->where('id',1);
            $pre = $this->db->get('usuarios_contas');
            
            $login = substr($pre->row()->email, 0, strpos($pre->row()->email, '@')).'-SC2';

            $this->db->insert('usuarios',
                array(
                    'login'=>$login,
                    'dataCadastro'=>date('Y-m-d H:i:s'),
                    'superCicloUsuario'=>2,
                    'token'=> md5(date('Y-m-d H:i:s').'-'.$login),
                    'conta_id'=>1,
                    'tipagem'=>'P',
                    'jornada'=>1,
                    'lider'=>1
                    )
                );

            $idUsuarioCiclo2 = $this->db->insert_id();

            $this->db->insert('usuarios_sc',
                array(
                    'idUsuario'=>$idUsuarioCiclo2,
                    'superCiclo'=>2,
                    'dataEntrada'=>date('Y-m-d H:i:s'),
                    'ultimaAtividade'=>date('Y-m-d H:i:s'),
                    'status'=>1,
                    'jornada'=> 1,
                    'fechamento'=>1,
                    'reentradas'=>0,
                    )
                );

            echo "Idealizador cadastrado</br>";
        }


        
        

        //$fechamento = $result->num_rows()+1;

        //DERRAMA OS PRIMEIROS INDICADOS - indicadores
        //$this->alimentaCiclo2($idUsuarioCiclo2);

    }

    public function geneses3(){

        //CADASTRA O PRIMEIRO LOGIN PARA O FECHAMENTO SEGUINTE - usuarios / usuarios_sc
        $this->db->where('idUsuario',1);
        $usuarios = $this->db->get('usuarios');

        if($usuarios->num_rows() > 0){

            echo "Idealizador encontrado</br>";

            $this->db->where('id',1);
            $pre = $this->db->get('usuarios_contas');
            
            $login = substr($pre->row()->email, 0, strpos($pre->row()->email, '@')).'-SC3';

            $this->db->insert('usuarios',
                array(
                    'login'=>$login,
                    'dataCadastro'=>date('Y-m-d H:i:s'),
                    'superCicloUsuario'=>3,
                    'token'=> md5(date('Y-m-d H:i:s').'-'.$login),
                    'conta_id'=>1,
                    'tipagem'=>'P',
                    'jornada'=>1,
                    'lider'=>1
                    )
                );

            $idUsuarioCiclo2 = $this->db->insert_id();

            $this->db->insert('usuarios_sc',
                array(
                    'idUsuario'=>$idUsuarioCiclo2,
                    'superCiclo'=>3,
                    'dataEntrada'=>date('Y-m-d H:i:s'),
                    'ultimaAtividade'=>date('Y-m-d H:i:s'),
                    'status'=>1,
                    'jornada'=> 1,
                    'fechamento'=>1,
                    'reentradas'=>0,
                    )
                );

            echo "Idealizador cadastrado</br>";
        }


        
        

        //$fechamento = $result->num_rows()+1;

        //DERRAMA OS PRIMEIROS INDICADOS - indicadores
        //$this->alimentaCiclo3($idUsuarioCiclo2);

    }





    public function valor($superCiclo){

        if($superCiclo == 1){
            return 40.00;
        }

        if($superCiclo == 2){
            return 200.00;
        }

        if($superCiclo == 3){
            return 500.00;
        }
    }

    // public function alimentaCiclo1( $idDoador, $fechamento = null, $jornada = null){
    //     //EXCLUSIVO PARA DOADORES QUE TEM SUAS DOACOES CONFIRMADAS
     
    //     //PEGA O ID DO INDICADOR
    //     $idIndicador = $idDoador;

    //     if($fechamento == null){
    //         $fechamento = 1;
    //     }

    //     if($jornada == null){
    //         $jornada = 1;
    //     }

    // //COMO TIRAMOS O TRECHO DA CONFIRMACAO DA DOACAO AGORA PRECISAMOS CONFIRMAR AQUI
    // $this->db->where( array('idDoador'=>$idDoador,'status'=>0) );
    // $doacoes = $this->db->get('doacoes');

    // if( $doacoes->num_rows() == 1 ){

    //     //VAI NAS CONTAS E PEGA O PROXIMOS DA FILA COM STATUS 0 apto para o 1
    //     $this->db->where( array( 'fechamento'=> $fechamento, 'status'=> 0, 'aptoPara'=>1, 'block'=> 0, 'dataUltimoLogin !='=>'0000-00-00 00:00:00' ) );
    //     $pre = $this->db->get('usuarios_contas');





    //         //
    //         //
    //         //
    //         //   SE É UM REPEAT , O SISTEMA CADASTRA ELE DE NOVO NA PERNA ESQUERDA DO DOADOR
    //         //
    //         //
    //         //

    //         $uplines = $this->ArvoreUplines($idIndicador,2);

    //         //CONTANDO QUANTOS INDICADOS O UPLINE TEM
    //         $this->db->where( array('idIndicador'=>$uplines[1],'fechamento'=> $fechamento,'jornada'=>1,'superCiclo'=>1) );
    //         $indicacoesUpline = $this->db->get('indicadores')->num_rows();

    //         //SO VAI CADASTRAR A COPIA SE ELE FOR REPEAT, SE O NUM DE INDICADOS PEDIR E SE O UPLINE DO INDICADOR JA TIVER DUAS PERNAS
    //         if($this->infoUser( $idIndicador)->repeat == 1 AND $numIndicados == 0 AND $indicacoesUpline == 3 ){

    //             $login = $this->infoUser($idIndicador)->login;

    //             $this->db->where('login',$login); 
    //             $existeUsuario = $this->db->get('usuarios');

    //             if( $existeUsuario->num_rows() > 0){

    //                 $soma = $existeUsuario->num_rows()+1;

    //                 $login =  $login = $this->infoUser($idIndicador)->login.'-'.$soma;

    //             }else{

    //                 $login = $this->infoUser($idIndicador)->login;
    //             }

    //             $this->db->insert('usuarios',
    //                         array(
    //                             'login'=>$login,
    //                             'dataCadastro'=>date('Y-m-d H:i:s'),
    //                             'superCicloUsuario'=>1,
    //                             'token'=> md5(date('Y-m-d H:i:s').'-'.$login),
    //                             'conta_id'=>$this->infoUser( $idIndicador)->conta_id,
    //                             'tipagem'=>'P',
    //                             'jornada'=>1,
    //                             'repeat'=>1
    //                             )
    //                         );

    //             $insertID = $this->db->insert_id();

    //             $this->db->insert('usuarios_sc',
    //                         array(
    //                             'idUsuario'=>$insertID,
    //                             'superCiclo'=>1,
    //                             'dataEntrada'=>date('Y-m-d H:i:s'),
    //                             'ultimaAtividade'=>date('Y-m-d H:i:s'),
    //                             'status'=>1,
    //                             'jornada'=> 1,
    //                             'fechamento'=>1,
    //                             'reentradas'=>0,
    //                             )
    //                         );

    //             $this->db->insert('indicadores',
    //                         array(
    //                             'idUsuario'=>$insertID,
    //                             'idIndicador'=>$idIndicador,//ele mesmo antes
    //                             'superCiclo'=>1,
    //                             'posicao'=>1,
    //                             'jornada'=>$jornada,
    //                             'fechamento'=>$fechamento
    //                             )
    //                         );

    //             $recebedor = $idIndicador;

    //             //DA ENTRADA EM UMA DOACAO NA TABELA DE DOACOES E ABRE O CRONOMETRO
    //             $this->db->insert('doacoes',
    //                         array(
    //                             'idDoador'=>$insertID,
    //                             'idRecebedor'=>$recebedor,
    //                             'valor'=>$this->valor(1),
    //                             'superCiclo'=>1,
    //                             'comprovante'=>null,
    //                             'data_envio'=>null,
    //                             'status'=> 0,
    //                             )
    //                         );

    //                 echo 'Novo indicado '.$insertID.'</br>' ;
    //                 echo 'Perna 1</br>' ;
    //                 echo 'Indicador '.$idIndicador.'</br>' ;
    //                 echo 'Recebedor '.$recebedor.'</br></br>' ;
    //                 echo 'Repetido</br></br>';
    //         }




    //         if( $idIndicador != 1 ){ //SE NAO É O IDEALIZADOR. O GENESES NAO PASSA AQUI

    //             $this->db->where( array('idIndicador'=> $idIndicador,'fechamento'=> $fechamento,'jornada'=>1,'superCiclo'=>1) );
    //             $INDICADOR = $this->db->get('indicadores');

    //             $numIndicados = $INDICADOR->num_rows();

    //         }else{ //CONDICAÇAO UNICA PARA O IDEALIZADOR ID 1 PARA GENESES

    //             $numIndicados = 0;
    //         }

        
    //     $quantosFaltam = 3 - $numIndicados;
            
    //     if( $pre->num_rows()  > $quantosFaltam ){ //SE TEM PELO MENOS O QUE PRECISA

    //         //DE ACORDO COM A QUANTIDADE DE INDICADOS DEFINE QUANTOS ELE PRECISA
    //         //ENTRA COM CADA INDICADO NA TABELA DE INDICADORES E DEFINE A PERNA ANALISANDO QUANTOS INDICADOS O INDICADOR TEM

    //         //AQUI PRECISAMOS DETECTAR A PERNA LIVRE PRA DEFINIR

    //         if($numIndicados  > 0 ){

    //             $faltam = 3 - $numIndicados;

    //             $i = 1;
    //             while ($i <= $faltam) {

    //                 $this->db->where( array('idIndicador'=> $idIndicador,'fechamento'=> $fechamento,'jornada'=>1,'superCiclo'=>1) );
    //                 $indicadoes = $this->db->get('indicadores');

    //                 $posicoesExitentes = array();

    //                 foreach ($indicadoes->result() as $items) {
                        
    //                     $posicoesExitentes[] = $items->posicao;
    //                 }
                    

    //                 if( ! in_array( 1, $posicoesExitentes)  ){
                        
    //                     $posicao = 1;

    //                 }elseif ( ! in_array( 2 , $posicoesExitentes) ) {
                        
    //                     $posicao = 2;

    //                 }elseif ( ! in_array( 3 , $posicoesExitentes) ) {
                        
    //                     $posicao = 3;
    //                 }

    //                 //CHAMEI DE NOVO AQUI PQ A CADA WHILE CHAMA E VERIFICA NOVAMENTE
    //                 $this->db->where( array( 'fechamento'=> $fechamento, 'status'=> 0, 'block'=> 0, 'dataUltimoLogin !='=>'0000-00-00 00:00:00' ) );
    //                 $aptos = $this->db->get('usuarios_contas');
                    
    //                 $PrimeiroDaFila = $aptos->row(0);

    //                 $login = substr( $PrimeiroDaFila->email, 0, strpos($PrimeiroDaFila->email, '@') );

    //                 $this->db->where('login',$login); 
    //                 $existeUsuario = $this->db->get('usuarios');

    //                 if( $existeUsuario->num_rows() > 0){

    //                     $login = $login .'-'.$this->db->get('usuarios')->num_rows()+1;

    //                 }

    //                  $this->db->insert('usuarios',
    //                     array(
    //                         'login'=>$login,
    //                         'dataCadastro'=>date('Y-m-d H:i:s'),
    //                         'superCicloUsuario'=>1,
    //                         'token'=> md5(date('Y-m-d H:i:s').'-'.$login),
    //                         'conta_id'=>$PrimeiroDaFila->id,
    //                         'tipagem'=>'P',
    //                         'jornada'=>1,
    //                         )
    //                     );

    //                 $insertID = $this->db->insert_id();
                    

    //                 $this->db->insert('usuarios_sc',
    //                     array(
    //                         'idUsuario'=>$insertID,
    //                         'superCiclo'=>1,
    //                         'dataEntrada'=>date('Y-m-d H:i:s'),
    //                         'ultimaAtividade'=>date('Y-m-d H:i:s'),
    //                         'status'=>1,
    //                         'jornada'=> 1,
    //                         'fechamento'=>1,
    //                         'reentradas'=>0,
    //                         )
    //                     );

    //                 $this->db->insert('indicadores',
    //                     array(
    //                         'idUsuario'=>$insertID,
    //                         'idIndicador'=>$idIndicador,
    //                         'superCiclo'=>1,
    //                         'posicao'=>$posicao,
    //                         'jornada'=>$jornada,
    //                         'fechamento'=>$fechamento
    //                         )
    //                     );
                    
    //                 $recebedor = $this->Recebedor($insertID,1);

    //                 //DA ENTRADA EM UMA DOACAO NA TABELA DE DOACOES E ABRE O CRONOMETRO
    //                 $this->db->insert('doacoes',
    //                     array(
    //                         'idDoador'=>$insertID,
    //                         'idRecebedor'=>$recebedor,
    //                         'valor'=>$this->valor(1),
    //                         'superCiclo'=>1,
    //                         'comprovante'=>null,
    //                         'data_envio'=>null,
    //                         'status'=> 1,
    //                         )
    //                     );

    //                 //VOLTA E DEFINE A CONTA COMO PRE CADASTRO JÁ EVOLUIDO
    //                 $this->db->where('id',$PrimeiroDaFila->id);
    //                 $this->db->update('usuarios_contas',
    //                     array(
    //                         'status'=>'1',
    //                         'aptoPara'=>'0'
    //                         )
    //                     );

    //                 // echo 'Novo indicado '.$insertID.'</br>' ;
    //                 // echo 'Perna '.$posicao.'</br>' ;
    //                 // echo 'Indicador '.$idIndicador.'</br>' ;
    //                 // echo 'Recebedor '.$recebedor.'</br></br>' ;
    //                 // echo '<pre>'.var_dump($this->uplines).'</pre>';

    //                 $i++;

    //             }

                
    //         }//FIM DO SE O NOVO INDICADOR JA TEM MAIS QUE 3 INDICADOS



    //         if($numIndicados == 0 ){

    //             $perna1 = $pre->row(0)->id;
    //             $perna2 = $pre->row(1)->id;
    //             $perna3 = $pre->row(2)->id;

    //             $perna=1;
    //             while ( $perna <= 3) {
                    
    //                 if($perna == 1){
    //                     $pernaID = $perna1;
    //                 }

    //                 if($perna == 2){
    //                     $pernaID = $perna2;
    //                 }

    //                 if($perna == 3){
    //                     $pernaID = $perna3;
    //                 }

    //                 $this->db->where('id',$pernaID);
    //                 $pre = $this->db->get('usuarios_contas');
                    
    //                 $login = substr( $pre->row()->email, 0, strpos($pre->row()->email, '@') );

    //                 $this->db->where('login',$login);
    //                 if($this->db->get('usuarios')->num_rows() > 0){

    //                     $login = substr($pre->row()->email, 0, strpos($pre->row()->email, '@')).'-'.$this->db->get('usuarios')->num_rows()+1;

    //                 }


    //                 $this->db->insert('usuarios',
    //                     array(
    //                         'login'=>$login,
    //                         'dataCadastro'=>date('Y-m-d H:i:s'),
    //                         'superCicloUsuario'=>1,
    //                         'token'=> md5(date('Y-m-d H:i:s').'-'.$login),
    //                         'conta_id'=>$pernaID,
    //                         'tipagem'=>'P',
    //                         'jornada'=>1,
    //                         )
    //                     );

    //                 $insertID = $this->db->insert_id();
                                        
    //                 $this->db->insert('usuarios_sc',
    //                     array(
    //                         'idUsuario'=>$insertID,
    //                         'superCiclo'=>1,
    //                         'dataEntrada'=>date('Y-m-d H:i:s'),
    //                         'ultimaAtividade'=>date('Y-m-d H:i:s'),
    //                         'status'=>1,
    //                         'jornada'=> 1,
    //                         'fechamento'=>1,
    //                         'reentradas'=>0,
    //                         )
    //                     );

    //                 $this->db->insert('indicadores',
    //                     array(
    //                         'idUsuario'=>$insertID,
    //                         'idIndicador'=>$idIndicador,
    //                         'superCiclo'=>1,
    //                         'posicao'=>$perna,
    //                         'jornada'=>$jornada,
    //                         'fechamento'=>$fechamento
    //                         )
    //                     );


    //                 $recebedor = $this->Recebedor($insertID,1);

    //                 //DA ENTRADA EM UMA DOACAO NA TABELA DE DOACOES E ABRE O CRONOMETRO
    //                 $this->db->insert('doacoes',
    //                     array(
    //                         'idDoador'=>$insertID,
    //                         'idRecebedor'=>$recebedor,
    //                         'valor'=>$this->valor(1),
    //                         'superCiclo'=>1,
    //                         'comprovante'=>null,
    //                         'data_envio'=>null,
    //                         'status'=> 1,
    //                         )
    //                     );

                    

    //                 //VOLTA E DEFINE A CONTA COMO PRE CADASTRO JÁ EVOLUIDO
    //                 $this->db->where('id',$pernaID);
    //                 $this->db->update('usuarios_contas', array('status'=>1,'aptoPara'=>0));

    //                 echo 'Novo indicado '.$insertID.'</br>' ;
    //                 echo 'Perna '.$perna.'</br>' ;
    //                 echo 'Indicador '.$idIndicador.'</br>' ;
    //                 echo 'Recebedor '.$recebedor.'</br></br>' ;
    //                 echo '<pre>'.var_dump($this->uplines).'</pre>';


    //                 $perna++;
    //             }
    //         }//FIM DO SE O NOVO INDICADOR TEM 0 INDICADOS

    //     }

    // }//FIM DA CONFIRMAÇÃO DE DOAÇÃO OK

    // $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger> Precisamos de mais indicados para ter doadores. </div>');

    // }


    public $downlines = array();
    public function ArvoreDownlines($id, $superciclo, $ciclos = 2 , $nivel = 1){

        if($ciclos > 0){
            //INDICA O USUARIO MATRIZ
            $this->db->where( array('idIndicador'=> $id) );
            $indicadores = $this->db->get('indicadores');

            if($indicadores->num_rows() > 0){
                //FAZ O LAÇO NO USUARIOS
                foreach($indicadores->result() as $row){
                    //TRAZ O ID DO DOWNLINE
                    $this->downlines[$nivel] = $row->idUsuario;
                    
                }
            }
        }

        return $this->downlines;
    }


    public function alimentaCiclo1($idDoador, $fechamento=null,$jornada=null){ // POSICIONA O CARA

        //SE TORNANDO INDICADOR PRA SER ALIMENTADO
        $idIndicador = $idDoador;

        if($fechamento == null){
            $fechamento = 1;
        }

        if($jornada == null){
            $jornada = 1;
        }


    //COMO TIRAMOS O TRECHO DA CONFIRMACAO DA DOACAO AGORA PRECISAMOS CONFIRMAR AQUI
    $this->db->where(array('idDoador'=>$idIndicador,'status'=>0));
    $doacoes = $this->db->get('doacoes');

    if( $doacoes->num_rows() == 1 ){ 

        //
        //
        //
        //   VAI NAS CONTAS E VERIFICA SE REALMENTE TEM GENTE PRONTA
        //
        //
        //


        $this->db->where( array( 'fechamento'=> $fechamento, 'status'=> 1, 'block'=> 0,'aptoPara'=>1 ) );
        $pre = $this->db->get('usuarios_contas');

        if( $pre->num_rows()  > 0 ){

            //
            //
            //
            //   SE É UM REPEAT , O SISTEMA CADASTRA ELE DE NOVO NA PERNA ESQUERDA DO DOADOR
            //
            //
            //

            $this->db->where( array('idIndicador'=> $idIndicador,'fechamento'=> $fechamento,'jornada'=>1,'superCiclo'=>1) );
            $INDICADOR = $this->db->get('indicadores');

            $numIndicados = $INDICADOR->num_rows();

            //ACRESCENTAR: SE A PERNA 2 TAMBÉM EXISTE

            $uplines = $this->ArvoreUplines($idIndicador,1);

            //echo 'Upline '.$uplines[1].'</br></br>';

            //CONTANDO QUANTOS INDICADOS O UPLINE TEM
            $this->db->where( array('idIndicador'=>$uplines[1],'fechamento'=> $fechamento,'jornada'=>1,'superCiclo'=>1) );
            $indicacoesUpline = $this->db->get('indicadores')->num_rows();

            //echo 'Ele indicou '.$indicacoesUpline.'</br></br>';

            //SO VAI CADASTRAR A COPIA SE ELE FOR REPEAT , SE O NUM DE INDICADOS PEDIR E SE O UPLINE DO INDICADOR JA TIVER TRES PERNAS
            if($this->infoUser( $idIndicador)->repeat == 1 AND $indicacoesUpline == 3 ){

                $login = $this->infoUser($idIndicador)->login;

                $this->db->where('login',$login); 
                $existeUsuario = $this->db->get('usuarios');

                if( $existeUsuario->num_rows() > 0){

                    $soma = $existeUsuario->num_rows()+1;

                    $login =  $login = $this->infoUser($idIndicador)->login.'-L-'.$soma;

                }else{

                    $login = $this->infoUser($idIndicador)->login;
                }

                echo $login.'</br></br>';


                $this->db->insert('usuarios',
                            array(
                                'login'=>$login,
                                'dataCadastro'=>date('Y-m-d H:i:s'),
                                'superCicloUsuario'=>1,
                                'token'=> md5(date('Y-m-d H:i:s').'-'.$login),
                                'conta_id'=>$this->infoUser( $idIndicador)->conta_id,
                                'tipagem'=>'P',
                                'jornada'=>1,
                                'repeat'=>1
                                )
                            );

                $insertID = $this->db->insert_id();

                $this->db->insert('usuarios_sc',
                            array(
                                'idUsuario'=>$insertID,
                                'superCiclo'=>1,
                                'dataEntrada'=>date('Y-m-d H:i:s'),
                                'ultimaAtividade'=>date('Y-m-d H:i:s'),
                                'status'=>1,
                                'jornada'=> 1,
                                'fechamento'=>1,
                                'reentradas'=>0,
                                )
                            );

                $this->db->insert('indicadores',
                            array(
                                'idUsuario'=>$insertID,
                                'idIndicador'=>$idIndicador,//ele mesmo antes
                                'superCiclo'=>1,
                                'posicao'=>1,
                                'jornada'=>$jornada,
                                'fechamento'=>$fechamento
                                )
                            );

                $recebedor = $idIndicador;

                //DA ENTRADA EM UMA DOACAO NA TABELA DE DOACOES E ABRE O CRONOMETRO
                $this->db->insert('doacoes',
                            array(
                                'idDoador'=>$insertID,
                                'idRecebedor'=>$recebedor,
                                'valor'=>$this->valor(1),
                                'superCiclo'=>1,
                                'comprovante'=>null,
                                'data_envio'=>null,
                                'status'=> 0,
                                )
                            );

                echo 'Novo indicado '.$insertID.'</br>' ;
                echo 'Perna 1</br>' ;
                echo 'Indicador '.$idIndicador.'</br>' ;
                echo 'Recebedor '.$recebedor.'</br></br>' ;
                echo 'Repetido</br></br>';

                //
                //
                //
                //   SE É UM REPEAT , COLOCA O RESTANTE
                //
                //
                //

                //CONSULTA NOVAMENTE QUANTOS INDICADOS PRECISA
                $this->db->where( array('idIndicador'=> $idIndicador,'fechamento'=> $fechamento,'jornada'=>1,'superCiclo'=>1) );
                $INDICADOR = $this->db->get('indicadores');

                $numIndicados = $INDICADOR->num_rows();

                echo 'N° indicados ja existentes: '. $numIndicados.'</br></br>';
                $faltam = 3 - $numIndicados; //MATRIZ SUBTRAINDO O NUMERO DE INDICADOS PRA DIZER QUANTOS AINDA FALTAM

                $i = 1;

                while ($i <= $faltam) {

                        //
                        //
                        //  DETECTA E DEFINE AS POSIÇÕES EXISTENTES
                        //
                        //
                        //

                        $this->db->where( array('idIndicador'=> $idIndicador,'fechamento'=> $fechamento,'jornada'=>1,'superCiclo'=>1) );
                        $POSICOES = $this->db->get('indicadores');

                        $posicoesExitentes = array();

                        foreach ($POSICOES->result() as $items) {
                            
                            $posicoesExitentes[] = $items->posicao;
                        }
                    

                        if( ! in_array( 1, $posicoesExitentes)  ){
                            
                            $posicao = 1;

                        }elseif ( ! in_array( 2 , $posicoesExitentes) ) {
                            
                            $posicao = 2;

                        }elseif ( ! in_array( 3 , $posicoesExitentes) ) {
                            
                            $posicao = 3;

                        }


                        //
                        //
                        //
                        //  DE ONDE VEM O INDICADO PARA O CICLO 2, do campo aptoPara 2
                        //  PRECISA DEFINIR LÁ EM BAIXO COMO 0 DE NOVO PRA O CARA NAO VOLTAR
                        //
                        //

                        $this->db->where( array( 'fechamento'=> $fechamento, 'status'=> 1, 'block'=> 0,'aptoPara'=>1 ) );
                        $aptos = $this->db->get('usuarios_contas');
                        
                        if( $aptos->num_rows() == 0 ){
                            echo 'Acabou a fila';
                            return;
                        }

                        $PrimeiroDaFila = $aptos->row();

                        $login = substr( $PrimeiroDaFila->email, 0, strpos($PrimeiroDaFila->email, '@') ).'-SC1';

                        echo $login.'</br></br>';

                        $this->db->insert('usuarios',
                            array(
                                'login'=>$login,
                                'dataCadastro'=>date('Y-m-d H:i:s'),
                                'superCicloUsuario'=>1,
                                'token'=> md5(date('Y-m-d H:i:s').'-'.$login),
                                'conta_id'=>$PrimeiroDaFila->id,
                                'tipagem'=>'P',
                                'jornada'=>1,
                                'lider'=>1
                                )
                            );

                        $insertID = $this->db->insert_id();

                        $this->db->insert('usuarios_sc',
                            array(
                                'idUsuario'=>$insertID,
                                'superCiclo'=>1,
                                'dataEntrada'=>date('Y-m-d H:i:s'),
                                'ultimaAtividade'=>date('Y-m-d H:i:s'),
                                'status'=>1,
                                'jornada'=> 1,
                                'fechamento'=>1,
                                'reentradas'=>0,
                                )
                            );

                        $this->db->insert('indicadores',
                            array(
                                'idUsuario'=>$insertID,
                                'idIndicador'=>$idIndicador,
                                'superCiclo'=>1,
                                'posicao'=>$posicao,
                                'jornada'=>$jornada,
                                'fechamento'=>$fechamento
                                )
                            );

                        //DA ENTRADA EM UMA DOACAO NA TABELA DE DOACOES E ABRE O CRONOMETRO
                        
                        $recebedor = $this->Recebedor($insertID,1);

                        $novaDoacao = array('idDoador'=>$insertID, 'idRecebedor'=>$recebedor, 'valor'=>$this->valor(1), 'superCiclo'=>1, 'comprovante'=>null, 'data_envio'=>null, 'status'=> 1 );

                        //DA ENTRADA EM UMA DOACAO NA TABELA DE DOACOES E ABRE O CRONOMETRO
                        $this->db->insert('doacoes', $novaDoacao );

                        echo 'Novo indicado '.$insertID.'</br>' ;
                        echo 'Perna '.$posicao.'</br>' ;
                        echo 'Indicador '.$idIndicador.'</br>' ;
                        echo 'Recebedor '.$recebedor.'</br></br>' ;
                        echo '<pre>';
                        var_dump($this->uplines);
                        echo '</pre>';


                        //VOLTA E DEFINE A CONTA COMO PRE CADASTRO JÁ EVOLUIDO
                        $this->db->where('id',$PrimeiroDaFila->id);
                        $this->db->update('usuarios_contas', array('status'=>1,'aptoPara'=>0) );

                        $i++;

                        
                }//FIM DO LACO


            }//FIM DO REPEAT

            if( $this->infoUser( $idIndicador)->repeat == 0 ){

                $this->db->where( array('idIndicador'=> $idIndicador,'fechamento'=> $fechamento,'jornada'=>1,'superCiclo'=>1) );
                $INDICADOR = $this->db->get('indicadores');

                $numIndicados = $INDICADOR->num_rows();


                echo 'N° indicados ja existentes: '. $numIndicados.'</br></br>';
                
                $faltam = 3 - $numIndicados; //MATRIZ SUBTRAINDO O NUMERO DE INDICADOS PRA DIZER QUANTOS AINDA FALTAM
                                   
                $i = 1;
                    
                while ($i <= $faltam) {

                        
                   //
                        //
                        //
                        //  DETECTA E DEFINE AS POSIÇÕES EXISTENTES
                        //
                        //
                        //

                        $this->db->where( array('idIndicador'=> $idIndicador,'fechamento'=> $fechamento,'jornada'=>1,'superCiclo'=>1) );
                        $POSICOES = $this->db->get('indicadores');

                        $posicoesExitentes = array();

                        foreach ($POSICOES->result() as $items) {
                            
                            $posicoesExitentes[] = $items->posicao;
                        }                       

                        if( ! in_array( 1, $posicoesExitentes)  ){
                            
                            $posicao = 1;

                        }elseif ( ! in_array( 2 , $posicoesExitentes) ) {
                            
                            $posicao = 2;

                        }elseif ( ! in_array( 3 , $posicoesExitentes) ) {
                            
                            $posicao = 3;

                        }


                        //
                        //
                        //
                        //  DE ONDE VEM O INDICADO PARA O CICLO 2, do campo aptoPara 2
                        //  PRECISA DEFINIR LÁ EM BAIXO COMO 0 DE NOVO PRA O CARA NAO VOLTAR
                        //
                        //

                        $this->db->where( array( 'fechamento'=> $fechamento, 'status'=> 1, 'block'=> 0,'aptoPara'=>1 ) );
                        $aptos = $this->db->get('usuarios_contas');
                        
                        $PrimeiroDaFila = $aptos->row();

                        if( $aptos->num_rows() == 0 ){
                            echo 'Acabaram os prontos. </br></br>';
                            return;
                        }


                        $login = substr( $PrimeiroDaFila->email, 0, strpos($PrimeiroDaFila->email, '@') ).'-SC1';

                        echo $login.'</br></br>';

                        $this->db->insert('usuarios',
                            array(
                                'login'=>$login,
                                'dataCadastro'=>date('Y-m-d H:i:s'),
                                'superCicloUsuario'=>1,
                                'token'=> md5(date('Y-m-d H:i:s').'-'.$login),
                                'conta_id'=>$PrimeiroDaFila->id,
                                'tipagem'=>'P',
                                'jornada'=>1,
                                'lider'=>1
                                )
                            );

                        $insertID = $this->db->insert_id();

                        $this->db->insert('usuarios_sc',
                            array(
                                'idUsuario'=>$insertID,
                                'superCiclo'=>1,
                                'dataEntrada'=>date('Y-m-d H:i:s'),
                                'ultimaAtividade'=>date('Y-m-d H:i:s'),
                                'status'=>1,
                                'jornada'=> 1,
                                'fechamento'=>1,
                                'reentradas'=>0,
                                )
                            );

                        $this->db->insert('indicadores',
                            array(
                                'idUsuario'=>$insertID,
                                'idIndicador'=>$idIndicador,
                                'superCiclo'=>1,
                                'posicao'=>$posicao,
                                'jornada'=>$jornada,
                                'fechamento'=>$fechamento
                                )
                            );

                        //DA ENTRADA EM UMA DOACAO NA TABELA DE DOACOES E ABRE O CRONOMETRO
                        
                        $recebedor = $this->Recebedor($insertID,1);
                    
                        //DA ENTRADA EM UMA DOACAO NA TABELA DE DOACOES E ABRE O CRONOMETRO
                        $this->db->insert('doacoes',
                                array(
                                    'idDoador'=>$insertID,
                                    'idRecebedor'=>$recebedor,
                                    'valor'=>$this->valor(1),
                                    'superCiclo'=>1,
                                    'comprovante'=>null,
                                    'data_envio'=>null,
                                    'status'=> 1,
                                    )
                                );

                        echo 'Novo indicado '.$insertID.'</br>' ;
                        echo 'Perna '.$posicao.'</br>' ;
                        echo 'Indicador '.$idIndicador.'</br>' ;
                        echo 'Recebedor '.$recebedor.'</br></br>' ;
                        echo '<pre>';
                        var_dump($this->uplines);
                        echo '</pre>';


                        //VOLTA E DEFINE A CONTA COMO PRE CADASTRO JÁ EVOLUIDO
                        $this->db->where('id', $PrimeiroDaFila->id);
                        $this->db->update('usuarios_contas', array('status'=>1,'aptoPara'=>0 ) );

                        $i++;

                }
                
                echo 'Não é repeat </br></br>';
                return;
            }


        }
        echo 'Não tem gente pronta </br></br>';
        return;
    }

    echo $idIndicador.' Não fez doacoes suficientes. </br></br>';
    $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger> Precisamos de mais indicados para ter doadores. </div>');

    }




    public function alimentaCiclo2($idDoador, $fechamento=null,$jornada=null){ // POSICIONA O CARA

        //SE TORNANDO INDICADOR PRA SER ALIMENTADO
        $idIndicador = $idDoador;

        if($fechamento == null){
            $fechamento = 1;
        }

        if($jornada == null){
            $jornada = 1;
        }


    //COMO TIRAMOS O TRECHO DA CONFIRMACAO DA DOACAO AGORA PRECISAMOS CONFIRMAR AQUI
    $this->db->where(array('idDoador'=>$idIndicador,'status'=>0));
    $doacoes = $this->db->get('doacoes');

    if( $doacoes->num_rows() == 1 ){ 

        //
        //
        //
        //   VAI NAS CONTAS E VERIFICA SE REALMENTE TEM GENTE PRONTA
        //
        //
        //


        $this->db->where( array( 'fechamento'=> $fechamento, 'status'=> 1, 'block'=> 0,'aptoPara'=>2 ) );
        $pre = $this->db->get('usuarios_contas');

        if( $pre->num_rows()  > 0 ){

            //
            //
            //
            //   SE É UM REPEAT , O SISTEMA CADASTRA ELE DE NOVO NA PERNA ESQUERDA DO DOADOR
            //
            //
            //

            $this->db->where( array('idIndicador'=> $idIndicador,'fechamento'=> $fechamento,'jornada'=>1,'superCiclo'=>2) );
            $INDICADOR = $this->db->get('indicadores');

            $numIndicados = $INDICADOR->num_rows();



            //ACRESCENTAR: SE A PERNA 2 TAMBÉM EXISTE

            $uplines = $this->ArvoreUplines($idIndicador,2);

            echo 'Upline '.$uplines[1].'</br></br>';

            //CONTANDO QUANTOS INDICADOS O UPLINE TEM
            $this->db->where( array('idIndicador'=>$uplines[1],'fechamento'=> $fechamento,'jornada'=>1,'superCiclo'=>2) );
            $indicacoesUpline = $this->db->get('indicadores')->num_rows();

            //echo 'Ele indicou '.$indicacoesUpline.'</br></br>';

            //SO VAI CADASTRAR A COPIA SE ELE FOR REPEAT , SE O NUM DE INDICADOS PEDIR E SE O UPLINE DO INDICADOR JA TIVER TRES PERNAS
            if($this->infoUser( $idIndicador)->repeat == 1 AND $indicacoesUpline == 2 ){

                $login = $this->infoUser($idIndicador)->login;

                $this->db->where('login',$login); 
                $existeUsuario = $this->db->get('usuarios');

                if( $existeUsuario->num_rows() > 0){

                    $soma = $existeUsuario->num_rows()+1;

                    $login =  $login = $this->infoUser($idIndicador)->login.'-L-'.$soma;

                }else{

                    $login = $this->infoUser($idIndicador)->login;
                }

                echo $login.'</br></br>';


                $this->db->insert('usuarios',
                            array(
                                'login'=>$login,
                                'dataCadastro'=>date('Y-m-d H:i:s'),
                                'superCicloUsuario'=>1,
                                'token'=> md5(date('Y-m-d H:i:s').'-'.$login),
                                'conta_id'=>$this->infoUser( $idIndicador)->conta_id,
                                'tipagem'=>'P',
                                'jornada'=>1,
                                'repeat'=>1
                                )
                            );

                $insertID = $this->db->insert_id();

                $this->db->insert('usuarios_sc',
                            array(
                                'idUsuario'=>$insertID,
                                'superCiclo'=>2,
                                'dataEntrada'=>date('Y-m-d H:i:s'),
                                'ultimaAtividade'=>date('Y-m-d H:i:s'),
                                'status'=>1,
                                'jornada'=> 1,
                                'fechamento'=>1,
                                'reentradas'=>0,
                                )
                            );

                $this->db->insert('indicadores',
                            array(
                                'idUsuario'=>$insertID,
                                'idIndicador'=>$idIndicador,//ele mesmo antes
                                'superCiclo'=>2,
                                'posicao'=>1,
                                'jornada'=>$jornada,
                                'fechamento'=>$fechamento
                                )
                            );

                $recebedor = $idIndicador;

                //DA ENTRADA EM UMA DOACAO NA TABELA DE DOACOES E ABRE O CRONOMETRO
                $this->db->insert('doacoes',
                            array(
                                'idDoador'=>$insertID,
                                'idRecebedor'=>$recebedor,
                                'valor'=>$this->valor(2),
                                'superCiclo'=>2,
                                'comprovante'=>null,
                                'data_envio'=>null,
                                'status'=> 0,
                                )
                            );

                echo 'Novo indicado '.$insertID.'</br>' ;
                echo 'Perna 1</br>' ;
                echo 'Indicador '.$idIndicador.'</br>' ;
                echo 'Recebedor '.$recebedor.'</br></br>' ;
                echo 'Repetido</br></br>';

                //
                //
                //
                //   SE É UM REPEAT , COLOCA O RESTANTE
                //
                //
                //

                //CONSULTA NOVAMENTE QUANTOS INDICADOS PRECISA
                $this->db->where( array('idIndicador'=> $idIndicador,'fechamento'=> $fechamento,'jornada'=>1,'superCiclo'=>2) );
                $INDICADOR = $this->db->get('indicadores');

                $numIndicados = $INDICADOR->num_rows();

                echo 'N° indicados ja existentes: '. $numIndicados.'</br></br>';
                $faltam = 2 - $numIndicados; //MATRIZ SUBTRAINDO O NUMERO DE INDICADOS PRA DIZER QUANTOS AINDA FALTAM

                $i = 1;

                while ($i <= $faltam) {

                        //
                        //
                        //  DETECTA E DEFINE AS POSIÇÕES EXISTENTES
                        //
                        //
                        //

                        $this->db->where( array('idIndicador'=> $idIndicador,'fechamento'=> $fechamento,'jornada'=>1,'superCiclo'=>2) );
                        $POSICOES = $this->db->get('indicadores');

                        $posicoesExitentes = array();

                        foreach ($POSICOES->result() as $items) {
                            
                            $posicoesExitentes[] = $items->posicao;
                        }
                    

                        if( ! in_array( 1, $posicoesExitentes)  ){
                            
                            $posicao = 1;

                        }elseif ( ! in_array( 2 , $posicoesExitentes) ) {
                            
                            $posicao = 2;

                        }


                        //
                        //
                        //
                        //  DE ONDE VEM O INDICADO PARA O CICLO 2, do campo aptoPara 2
                        //  PRECISA DEFINIR LÁ EM BAIXO COMO 0 DE NOVO PRA O CARA NAO VOLTAR
                        //
                        //

                        $this->db->where( array( 'fechamento'=> $fechamento, 'status'=> 1, 'block'=> 0,'aptoPara'=>2 ) );
                        $aptos = $this->db->get('usuarios_contas');
                        
                        if( $aptos->num_rows() == 0 ){
                            echo 'Acabou a fila';
                            return;
                        }

                        $PrimeiroDaFila = $aptos->row();

                        $login = substr( $PrimeiroDaFila->email, 0, strpos($PrimeiroDaFila->email, '@') ).'-SC2';

                        echo $login.'</br></br>';

                        $this->db->insert('usuarios',
                            array(
                                'login'=>$login,
                                'dataCadastro'=>date('Y-m-d H:i:s'),
                                'superCicloUsuario'=>2,
                                'token'=> md5(date('Y-m-d H:i:s').'-'.$login),
                                'conta_id'=>$PrimeiroDaFila->id,
                                'tipagem'=>'P',
                                'jornada'=>1,
                                'lider'=>1
                                )
                            );

                        $insertID = $this->db->insert_id();

                        $this->db->insert('usuarios_sc',
                            array(
                                'idUsuario'=>$insertID,
                                'superCiclo'=>2,
                                'dataEntrada'=>date('Y-m-d H:i:s'),
                                'ultimaAtividade'=>date('Y-m-d H:i:s'),
                                'status'=>1,
                                'jornada'=> 1,
                                'fechamento'=>1,
                                'reentradas'=>0,
                                )
                            );

                        $this->db->insert('indicadores',
                            array(
                                'idUsuario'=>$insertID,
                                'idIndicador'=>$idIndicador,
                                'superCiclo'=>2,
                                'posicao'=>$posicao,
                                'jornada'=>$jornada,
                                'fechamento'=>$fechamento
                                )
                            );

                        //DA ENTRADA EM UMA DOACAO NA TABELA DE DOACOES E ABRE O CRONOMETRO
                        
                        $recebedor = $this->Recebedor($insertID,1);

                        $novaDoacao = array('idDoador'=>$insertID, 'idRecebedor'=>$recebedor, 'valor'=>$this->valor(2), 'superCiclo'=>2, 'comprovante'=>null, 'data_envio'=>null, 'status'=> 1 );

                        //DA ENTRADA EM UMA DOACAO NA TABELA DE DOACOES E ABRE O CRONOMETRO
                        $this->db->insert('doacoes', $novaDoacao );

                        echo 'Novo indicado '.$insertID.'</br>' ;
                        echo 'Perna '.$posicao.'</br>' ;
                        echo 'Indicador '.$idIndicador.'</br>' ;
                        echo 'Recebedor '.$recebedor.'</br></br>' ;
                        echo '<pre>';
                        var_dump($this->uplines);
                        echo '</pre>';


                        //VOLTA E DEFINE A CONTA COMO PRE CADASTRO JÁ EVOLUIDO
                        $this->db->where('id',$PrimeiroDaFila->id);
                        $this->db->update('usuarios_contas', array('status'=>1,'aptoPara'=>0) );

                        $i++;

                        
                }//FIM DO LACO


            }//FIM DO REPEAT

            if( $this->infoUser( $idIndicador)->repeat == 0 ){

                $this->db->where( array('idIndicador'=> $idIndicador,'fechamento'=> $fechamento,'jornada'=>1,'superCiclo'=>2) );
                $INDICADOR = $this->db->get('indicadores');

                $numIndicados = $INDICADOR->num_rows();


                echo 'N° indicados ja existentes: '. $numIndicados.'</br></br>';
                
                $faltam = 2 - $numIndicados; //MATRIZ SUBTRAINDO O NUMERO DE INDICADOS PRA DIZER QUANTOS AINDA FALTAM
                                   
                $i = 1;
                    
                while ($i <= $faltam) {

                        
                   //
                        //
                        //
                        //  DETECTA E DEFINE AS POSIÇÕES EXISTENTES
                        //
                        //
                        //

                        $this->db->where( array('idIndicador'=> $idIndicador,'fechamento'=> $fechamento,'jornada'=>1,'superCiclo'=>2) );
                        $POSICOES = $this->db->get('indicadores');

                        $posicoesExitentes = array();

                        foreach ($POSICOES->result() as $items) {
                            
                            $posicoesExitentes[] = $items->posicao;
                        }                       

                        if( ! in_array( 1, $posicoesExitentes)  ){
                            
                            $posicao = 1;

                        }elseif ( ! in_array( 2 , $posicoesExitentes) ) {
                            
                            $posicao = 2;

                        }


                        //
                        //
                        //
                        //  DE ONDE VEM O INDICADO PARA O CICLO 2, do campo aptoPara 2
                        //  PRECISA DEFINIR LÁ EM BAIXO COMO 0 DE NOVO PRA O CARA NAO VOLTAR
                        //
                        //

                        $this->db->where( array( 'fechamento'=> $fechamento, 'status'=> 1, 'block'=> 0,'aptoPara'=>2 ) );
                        $aptos = $this->db->get('usuarios_contas');
                        
                        $PrimeiroDaFila = $aptos->row();

                        if( $aptos->num_rows() == 0 ){
                            echo 'Acabaram os prontos. </br></br>';
                            return;
                        }


                        $login = substr( $PrimeiroDaFila->email, 0, strpos($PrimeiroDaFila->email, '@') ).'-SC2';

                        echo $login.'</br></br>';

                        $this->db->insert('usuarios',
                            array(
                                'login'=>$login,
                                'dataCadastro'=>date('Y-m-d H:i:s'),
                                'superCicloUsuario'=>1,
                                'token'=> md5(date('Y-m-d H:i:s').'-'.$login),
                                'conta_id'=>$PrimeiroDaFila->id,
                                'tipagem'=>'P',
                                'jornada'=>1,
                                'lider'=>1
                                )
                            );

                        $insertID = $this->db->insert_id();

                        $this->db->insert('usuarios_sc',
                            array(
                                'idUsuario'=>$insertID,
                                'superCiclo'=>2,
                                'dataEntrada'=>date('Y-m-d H:i:s'),
                                'ultimaAtividade'=>date('Y-m-d H:i:s'),
                                'status'=>1,
                                'jornada'=> 1,
                                'fechamento'=>1,
                                'reentradas'=>0,
                                )
                            );

                        $this->db->insert('indicadores',
                            array(
                                'idUsuario'=>$insertID,
                                'idIndicador'=>$idIndicador,
                                'superCiclo'=>2,
                                'posicao'=>$posicao,
                                'jornada'=>$jornada,
                                'fechamento'=>$fechamento
                                )
                            );

                        //DA ENTRADA EM UMA DOACAO NA TABELA DE DOACOES E ABRE O CRONOMETRO
                        
                        $recebedor = $this->Recebedor($insertID,2);
                    
                        //DA ENTRADA EM UMA DOACAO NA TABELA DE DOACOES E ABRE O CRONOMETRO
                        $this->db->insert('doacoes',
                                array(
                                    'idDoador'=>$insertID,
                                    'idRecebedor'=>$recebedor,
                                    'valor'=>$this->valor(2),
                                    'superCiclo'=>2,
                                    'comprovante'=>null,
                                    'data_envio'=>null,
                                    'status'=> 1,
                                    )
                                );

                        echo 'Novo indicado '.$insertID.'</br>' ;
                        echo 'Perna '.$posicao.'</br>' ;
                        echo 'Indicador '.$idIndicador.'</br>' ;
                        echo 'Recebedor '.$recebedor.'</br></br>' ;
                        echo '<pre>';
                        var_dump($this->uplines);
                        echo '</pre>';


                        //VOLTA E DEFINE A CONTA COMO PRE CADASTRO JÁ EVOLUIDO
                        $this->db->where('id', $PrimeiroDaFila->id);
                        $this->db->update('usuarios_contas', array('status'=>1,'aptoPara'=>0 ) );

                        $i++;

                }
                
                echo 'Não é repeat </br></br>';
                return;
            }


        }
        echo 'Não tem gente pronta </br></br>';
        return;
    }

    echo $idIndicador.' Não fez doacoes suficientes. </br></br>';
    $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger> Precisamos de mais indicados para ter doadores. </div>');

    }



    // public function alimentaCiclo2($idDoador, $fechamento=null,$jornada=null){ // POSICIONA O CARA

    //     //SE TORNANDO INDICADOR PRA SER ALIMENTADO
    //     $idIndicador = $idDoador;

    //     if($fechamento == null){
    //         $fechamento = 1;
    //     }

    //     if($jornada == null){
    //         $jornada = 1;
    //     }


    // //COMO TIRAMOS O TRECHO DA CONFIRMACAO DA DOACAO AGORA PRECISAMOS CONFIRMAR AQUI
    // $this->db->where(array('idDoador'=>$idDoador,'status'=>0));
    // $doacoes = $this->db->get('doacoes');

    // if( $doacoes->num_rows() == 1 ){ 

    //     //
    //     //
    //     //
    //     //   VAI NAS CONTAS E VERIFICA SE REALMENTE TEM GENTE PRONTA
    //     //
    //     //
    //     //


    //     $this->db->where( array( 'fechamento'=> $fechamento, 'status'=> 1, 'block'=> 0,'aptoPara'=>2 ) );
    //     $pre = $this->db->get('usuarios_contas');

    //     if( $pre->num_rows()  > 0 ){

    //         //
    //         //
    //         //
    //         //   SE É UM REPEAT , O SISTEMA CADASTRA ELE DE NOVO NA PERNA ESQUERDA DO DOADOR
    //         //
    //         //
    //         //

    //         if( $idIndicador != 1 ){

    //             $this->db->where( array('idIndicador'=> $idIndicador,'fechamento'=> $fechamento,'jornada'=>1,'superCiclo'=>2) );
    //             $INDICADOR = $this->db->get('indicadores');

    //             $numIndicados = $INDICADOR->num_rows();

    //         }else{ //CONDICAÇAO UNICA PARA O IDEALIZADOR ID 1 PARA GENESES

    //                 $numIndicados = 0;
    //         }

    //         //ACRESCENTAR: SE A PERNA 2 TAMBÉM EXISTE

    //         $uplines = $this->ArvoreUplines($idIndicador,2);

    //         //echo 'Upline '.$uplines[1].'</br></br>';

    //         //CONTANDO QUANTOS INDICADOS O UPLINE TEM
    //         $this->db->where( array('idIndicador'=>$uplines[1],'fechamento'=> $fechamento,'jornada'=>1,'superCiclo'=>2) );
    //         $indicacoesUpline = $this->db->get('indicadores')->num_rows();

    //         //echo 'Ele indicou '.$indicacoesUpline.'</br></br>';

    //         //SO VAI CADASTRAR A COPIA SE ELE FOR REPEAT , SE O NUM DE INDICADOS PEDIR E SE O UPLINE DO INDICADOR JA TIVER DUAS PERNAS
    //         if($this->infoUser( $idIndicador)->repeat == 1 AND $numIndicados == 0 AND $indicacoesUpline == 2 ){


    //             $login = $this->infoUser($idIndicador)->login;

    //             echo $login.'</br></br>';

    //             $this->db->where('login',$login); 
    //             $existeUsuario = $this->db->get('usuarios');

    //             if( $existeUsuario->num_rows() > 0){

    //                 $soma = $existeUsuario->num_rows()+1;

    //                 $login =  $login = $this->infoUser($idIndicador)->login.'-'.$soma;

    //             }else{

    //                 $login = $this->infoUser($idIndicador)->login;
    //             }

    //             //echo $login.'</br></br>';

    //             $this->db->insert('usuarios',
    //                         array(
    //                             'login'=>$login,
    //                             'dataCadastro'=>date('Y-m-d H:i:s'),
    //                             'superCicloUsuario'=>2,
    //                             'token'=> md5(date('Y-m-d H:i:s').'-'.$login),
    //                             'conta_id'=>$this->infoUser( $idIndicador)->conta_id,
    //                             'tipagem'=>'P',
    //                             'jornada'=>1,
    //                             'repeat'=>1
    //                             )
    //                         );

    //             $insertID = $this->db->insert_id();

    //             $this->db->insert('usuarios_sc',
    //                         array(
    //                             'idUsuario'=>$insertID,
    //                             'superCiclo'=>2,
    //                             'dataEntrada'=>date('Y-m-d H:i:s'),
    //                             'ultimaAtividade'=>date('Y-m-d H:i:s'),
    //                             'status'=>1,
    //                             'jornada'=> 1,
    //                             'fechamento'=>1,
    //                             'reentradas'=>0,
    //                             )
    //                         );

    //             $this->db->insert('indicadores',
    //                         array(
    //                             'idUsuario'=>$insertID,
    //                             'idIndicador'=>$idIndicador,//ele mesmo antes
    //                             'superCiclo'=>2,
    //                             'posicao'=>1,
    //                             'jornada'=>$jornada,
    //                             'fechamento'=>$fechamento
    //                             )
    //                         );

    //             $recebedor = $idIndicador;

    //             //DA ENTRADA EM UMA DOACAO NA TABELA DE DOACOES E ABRE O CRONOMETRO
    //             $this->db->insert('doacoes',
    //                         array(
    //                             'idDoador'=>$insertID,
    //                             'idRecebedor'=>$recebedor,
    //                             'valor'=>$this->valor(2),
    //                             'superCiclo'=>2,
    //                             'comprovante'=>null,
    //                             'data_envio'=>null,
    //                             'status'=> 0,
    //                             )
    //                         );

    //                 echo 'Novo indicado '.$insertID.'</br>' ;
    //                 echo 'Perna 1</br>' ;
    //                 echo 'Indicador '.$idIndicador.'</br>' ;
    //                 echo 'Recebedor '.$recebedor.'</br></br>' ;
    //                 echo 'Repetido</br></br>';

    //         }


    //         //CONSULTA NOVAMENTE QUANTOS INDICADOS PRECISA
    //         if( $idIndicador != 1 ){

    //             $this->db->where( array('idIndicador'=> $idIndicador,'fechamento'=> $fechamento,'jornada'=>1,'superCiclo'=>2) );
    //             $INDICADOR = $this->db->get('indicadores');

    //             $numIndicados = $INDICADOR->num_rows();

    //         }else{ //CONDICAÇAO UNICA PARA O IDEALIZADOR ID 1 PARA GENESES

    //             $numIndicados = 0;
    //         }
            
    //         echo 'N° indicados ja existentes: '. $numIndicados.'</br></br>';
            
            
    //         //if($numIndicados  > 0 ){

    //             $faltam = 2 - $numIndicados; //MATRIZ SUBTRAINDO O NUMERO DE INDICADOS PRA DIZER QUANTOS AINDA FALTAM
                               
    //             $i = 1;
    //             while ($i <= $faltam) {

    //                 //
    //                 //
    //                 //
    //                 //  DETECTA E DEFINE AS POSIÇÕES EXISTENTES
    //                 //
    //                 //
    //                 //

    //                 $this->db->where( array('idIndicador'=> $idIndicador,'fechamento'=> $fechamento,'jornada'=>1,'superCiclo'=>2) );
    //                 $POSICOES = $this->db->get('indicadores');

    //                 $posicoesExitentes = array();

    //                 foreach ($POSICOES->result() as $items) {
                        
    //                     $posicoesExitentes[] = $items->posicao;
    //                 }

                    
    //                 // echo '<pre>';
    //                 // var_dump( $posicoesExitentes );
    //                 // echo '</pre>';
                    

    //                 if( ! in_array( 1, $posicoesExitentes)  ){
                        
    //                     $posicao = 1;

    //                 }elseif ( ! in_array( 2 , $posicoesExitentes) ) {
                        
    //                     $posicao = 2;

    //                 }


    //                 //
    //                 //
    //                 //
    //                 //  DE ONDE VEM O INDICADO PARA O CICLO 2, do campo aptoPara 2
    //                 //  PRECISA DEFINIR LÁ EM BAIXO COMO 0 DE NOVO PRA O CARA NAO VOLTAR
    //                 //
    //                 //

    //                 $this->db->where( array( 'fechamento'=> $fechamento, 'status'=> 1, 'block'=> 0,'aptoPara'=>2 ) );
    //                 $aptos = $this->db->get('usuarios_contas');
                    
    //                 $PrimeiroDaFila = $aptos->row();

    //                 $login = substr( $PrimeiroDaFila->email, 0, strpos($PrimeiroDaFila->email, '@') ).'-SC2';

    //                 $this->db->where('login',$login); 
    //                 $existeUsuario = $this->db->get('usuarios');

    //                 if( $existeUsuario->num_rows() > 0){

    //                     $login = $login .'-'.$existeUsuario->num_rows()+1;

    //                 }

    //                 echo $login.'</br></br>';

    //                 $this->db->insert('usuarios',
    //                     array(
    //                         'login'=>$login,
    //                         'dataCadastro'=>date('Y-m-d H:i:s'),
    //                         'superCicloUsuario'=>2,
    //                         'token'=> md5(date('Y-m-d H:i:s').'-'.$login),
    //                         'conta_id'=>$PrimeiroDaFila->id,
    //                         'tipagem'=>'P',
    //                         'jornada'=>1,
    //                         'lider'=>1
    //                         )
    //                     );

    //                 $insertID = $this->db->insert_id();

    //                 $this->db->insert('usuarios_sc',
    //                     array(
    //                         'idUsuario'=>$insertID,
    //                         'superCiclo'=>2,
    //                         'dataEntrada'=>date('Y-m-d H:i:s'),
    //                         'ultimaAtividade'=>date('Y-m-d H:i:s'),
    //                         'status'=>1,
    //                         'jornada'=> 1,
    //                         'fechamento'=>1,
    //                         'reentradas'=>0,
    //                         )
    //                     );

    //                 $this->db->insert('indicadores',
    //                     array(
    //                         'idUsuario'=>$insertID,
    //                         'idIndicador'=>$idIndicador,
    //                         'superCiclo'=>2,
    //                         'posicao'=>$posicao,
    //                         'jornada'=>$jornada,
    //                         'fechamento'=>$fechamento
    //                         )
    //                     );

    //                 //DA ENTRADA EM UMA DOACAO NA TABELA DE DOACOES E ABRE O CRONOMETRO
                    
    //                 $recebedor = $this->Recebedor($insertID,2);                    
                
    //                 //DA ENTRADA EM UMA DOACAO NA TABELA DE DOACOES E ABRE O CRONOMETRO
    //                 $this->db->insert('doacoes',
    //                         array(
    //                             'idDoador'=>$insertID,
    //                             'idRecebedor'=>$recebedor,
    //                             'valor'=>$this->valor(2),
    //                             'superCiclo'=>2,
    //                             'comprovante'=>null,
    //                             'data_envio'=>null,
    //                             'status'=> 1,
    //                             )
    //                         );

    //                 echo 'Novo indicado '.$insertID.'</br>' ;
    //                 echo 'Perna '.$posicao.'</br>' ;
    //                 echo 'Indicador '.$idIndicador.'</br>' ;
    //                 echo 'Recebedor '.$recebedor.'</br></br>' ;
    //                 echo '<pre>'.var_dump($this->uplines).'</pre>';

    //                 //echo 'Recebedor '.$this->infoUser($this->Recebedor($insertID))->nome;

    //                 //VOLTA E DEFINE A CONTA COMO PRE CADASTRO JÁ EVOLUIDO
    //                 $this->db->where('id',$PrimeiroDaFila->id);
    //                 $this->db->update('usuarios_contas', array('status'=>1,'aptoPara'=>0));

    //                 $i++;
    //             }


    //             return;
    //         //}



    //     }
    //     echo 'Não tem gente pronta';
    //     return;
    // }
    // echo $idIndicador.'Não fez doacoes suficientes</br></br>';
    // $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger> Precisamos de mais indicados para ter doadores. </div>');

    // }

    
    public function alimentaCiclo3($idDoador, $fechamento=null, $jornada=null){ // POSICIONA O CARA

        //SE TORNANDO INDICADOR PRA SER ALIMENTADO
        $idIndicador = $idDoador;

        if($fechamento == null){
            $fechamento = 1;
        }

        if($jornada == null){
            $jornada = 1;
        }


    //COMO TIRAMOS O TRECHO DA CONFIRMACAO DA DOACAO AGORA PRECISAMOS CONFIRMAR AQUI
    $this->db->where(array('idDoador'=>$idIndicador,'status'=>0));
    $doacoes = $this->db->get('doacoes');

    if( $doacoes->num_rows() == 1 ){ 

        //
        //
        //
        //   VAI NAS CONTAS E VERIFICA SE REALMENTE TEM GENTE PRONTA
        //
        //
        //


        $this->db->where( array( 'fechamento'=> $fechamento, 'status'=> 1, 'block'=> 0,'aptoPara'=>3 ) );
        $pre = $this->db->get('usuarios_contas');

        if( $pre->num_rows()  > 0 ){

            //
            //
            //
            //   SE É UM REPEAT , O SISTEMA CADASTRA ELE DE NOVO NA PERNA ESQUERDA DO DOADOR
            //
            //
            //

            $this->db->where( array('idIndicador'=> $idIndicador,'fechamento'=> $fechamento,'jornada'=>1,'superCiclo'=>3) );
            $INDICADOR = $this->db->get('indicadores');

            $numIndicados = $INDICADOR->num_rows();

            //ACRESCENTAR: SE A PERNA 2 TAMBÉM EXISTE

            $uplines = $this->ArvoreUplines($idIndicador,1);

            //echo 'Upline '.$uplines[1].'</br></br>';

            //CONTANDO QUANTOS INDICADOS O UPLINE TEM
            $this->db->where( array('idIndicador'=>$uplines[1],'fechamento'=> $fechamento,'jornada'=>1,'superCiclo'=>3) );
            $indicacoesUpline = $this->db->get('indicadores')->num_rows();

            //echo 'Ele indicou '.$indicacoesUpline.'</br></br>';

            //SO VAI CADASTRAR A COPIA SE ELE FOR REPEAT , SE O NUM DE INDICADOS PEDIR E SE O UPLINE DO INDICADOR JA TIVER TRES PERNAS
            if($this->infoUser( $idIndicador)->repeat == 1 AND $indicacoesUpline == 3 ){

                $login = $this->infoUser($idIndicador)->login;

                $this->db->where('login',$login); 
                $existeUsuario = $this->db->get('usuarios');

                if( $existeUsuario->num_rows() > 0){

                    $soma = $existeUsuario->num_rows()+1;

                    $login =  $login = $this->infoUser($idIndicador)->login.'-L-'.$soma;

                }else{

                    $login = $this->infoUser($idIndicador)->login;
                }

                echo $login.'</br></br>';


                $this->db->insert('usuarios',
                            array(
                                'login'=>$login,
                                'dataCadastro'=>date('Y-m-d H:i:s'),
                                'superCicloUsuario'=>3,
                                'token'=> md5(date('Y-m-d H:i:s').'-'.$login),
                                'conta_id'=>$this->infoUser( $idIndicador)->conta_id,
                                'tipagem'=>'P',
                                'jornada'=>1,
                                'repeat'=>1
                                )
                            );

                $insertID = $this->db->insert_id();

                $this->db->insert('usuarios_sc',
                            array(
                                'idUsuario'=>$insertID,
                                'superCiclo'=>3,
                                'dataEntrada'=>date('Y-m-d H:i:s'),
                                'ultimaAtividade'=>date('Y-m-d H:i:s'),
                                'status'=>1,
                                'jornada'=> 1,
                                'fechamento'=>1,
                                'reentradas'=>0,
                                )
                            );

                $this->db->insert('indicadores',
                            array(
                                'idUsuario'=>$insertID,
                                'idIndicador'=>$idIndicador,//ele mesmo antes
                                'superCiclo'=>3,
                                'posicao'=>1,
                                'jornada'=>$jornada,
                                'fechamento'=>$fechamento
                                )
                            );

                $recebedor = $idIndicador;

                //DA ENTRADA EM UMA DOACAO NA TABELA DE DOACOES E ABRE O CRONOMETRO
                $this->db->insert('doacoes',
                            array(
                                'idDoador'=>$insertID,
                                'idRecebedor'=>$recebedor,
                                'valor'=>$this->valor(3),
                                'superCiclo'=>3,
                                'comprovante'=>null,
                                'data_envio'=>null,
                                'status'=> 0,
                                )
                            );

                echo 'Novo indicado '.$insertID.'</br>' ;
                echo 'Perna 1</br>' ;
                echo 'Indicador '.$idIndicador.'</br>' ;
                echo 'Recebedor '.$recebedor.'</br></br>' ;
                echo 'Repetido</br></br>';

                //
                //
                //
                //   SE É UM REPEAT , COLOCA O RESTANTE
                //
                //
                //

                //CONSULTA NOVAMENTE QUANTOS INDICADOS PRECISA
                $this->db->where( array('idIndicador'=> $idIndicador,'fechamento'=> $fechamento,'jornada'=>1,'superCiclo'=>3) );
                $INDICADOR = $this->db->get('indicadores');

                $numIndicados = $INDICADOR->num_rows();

                echo 'N° indicados ja existentes: '. $numIndicados.'</br></br>';
                $faltam = 3 - $numIndicados; //MATRIZ SUBTRAINDO O NUMERO DE INDICADOS PRA DIZER QUANTOS AINDA FALTAM

                $i = 1;

                while ($i <= $faltam) {

                        //
                        //
                        //  DETECTA E DEFINE AS POSIÇÕES EXISTENTES
                        //
                        //
                        //

                        $this->db->where( array('idIndicador'=> $idIndicador,'fechamento'=> $fechamento,'jornada'=>1,'superCiclo'=>3) );
                        $POSICOES = $this->db->get('indicadores');

                        $posicoesExitentes = array();

                        foreach ($POSICOES->result() as $items) {
                            
                            $posicoesExitentes[] = $items->posicao;
                        }
                    

                        if( ! in_array( 1, $posicoesExitentes)  ){
                            
                            $posicao = 1;

                        }elseif ( ! in_array( 2 , $posicoesExitentes) ) {
                            
                            $posicao = 2;

                        }elseif ( ! in_array( 3 , $posicoesExitentes) ) {
                            
                            $posicao = 3;

                        }


                        //
                        //
                        //
                        //  DE ONDE VEM O INDICADO PARA O CICLO 2, do campo aptoPara 2
                        //  PRECISA DEFINIR LÁ EM BAIXO COMO 0 DE NOVO PRA O CARA NAO VOLTAR
                        //
                        //

                        $this->db->where( array( 'fechamento'=> $fechamento, 'status'=> 1, 'block'=> 0,'aptoPara'=>3 ) );
                        $aptos = $this->db->get('usuarios_contas');
                        
                        if( $aptos->num_rows() == 0 ){
                            echo 'Acabou a fila';
                            return;
                        }

                        $PrimeiroDaFila = $aptos->row();

                        $login = substr( $PrimeiroDaFila->email, 0, strpos($PrimeiroDaFila->email, '@') ).'-SC3';

                        echo $login.'</br></br>';

                        $this->db->insert('usuarios',
                            array(
                                'login'=>$login,
                                'dataCadastro'=>date('Y-m-d H:i:s'),
                                'superCicloUsuario'=>3,
                                'token'=> md5(date('Y-m-d H:i:s').'-'.$login),
                                'conta_id'=>$PrimeiroDaFila->id,
                                'tipagem'=>'P',
                                'jornada'=>1,
                                'lider'=>1
                                )
                            );

                        $insertID = $this->db->insert_id();

                        $this->db->insert('usuarios_sc',
                            array(
                                'idUsuario'=>$insertID,
                                'superCiclo'=>3,
                                'dataEntrada'=>date('Y-m-d H:i:s'),
                                'ultimaAtividade'=>date('Y-m-d H:i:s'),
                                'status'=>1,
                                'jornada'=> 1,
                                'fechamento'=>1,
                                'reentradas'=>0,
                                )
                            );

                        $this->db->insert('indicadores',
                            array(
                                'idUsuario'=>$insertID,
                                'idIndicador'=>$idIndicador,
                                'superCiclo'=>3,
                                'posicao'=>$posicao,
                                'jornada'=>$jornada,
                                'fechamento'=>$fechamento
                                )
                            );

                        //DA ENTRADA EM UMA DOACAO NA TABELA DE DOACOES E ABRE O CRONOMETRO
                        
                        $recebedor = $this->Recebedor($insertID,1);

                        $novaDoacao = array('idDoador'=>$insertID, 'idRecebedor'=>$recebedor, 'valor'=>$this->valor(3), 'superCiclo'=>3, 'comprovante'=>null, 'data_envio'=>null, 'status'=> 1 );

                        //DA ENTRADA EM UMA DOACAO NA TABELA DE DOACOES E ABRE O CRONOMETRO
                        $this->db->insert('doacoes', $novaDoacao );

                        echo 'Novo indicado '.$insertID.'</br>' ;
                        echo 'Perna '.$posicao.'</br>' ;
                        echo 'Indicador '.$idIndicador.'</br>' ;
                        echo 'Recebedor '.$recebedor.'</br></br>' ;
                        echo '<pre>';
                        var_dump($this->uplines);
                        echo '</pre>';


                        //VOLTA E DEFINE A CONTA COMO PRE CADASTRO JÁ EVOLUIDO
                        $this->db->where('id',$PrimeiroDaFila->id);
                        $this->db->update('usuarios_contas', array('status'=>1,'aptoPara'=>0) );

                        $i++;

                        
                }//FIM DO LACO


            }//FIM DO REPEAT

            if( $this->infoUser( $idIndicador)->repeat == 0 ){

                $this->db->where( array('idIndicador'=> $idIndicador,'fechamento'=> $fechamento,'jornada'=>1,'superCiclo'=>3) );
                $INDICADOR = $this->db->get('indicadores');

                $numIndicados = $INDICADOR->num_rows();


                echo 'N° indicados ja existentes: '. $numIndicados.'</br></br>';
                
                $faltam = 3 - $numIndicados; //MATRIZ SUBTRAINDO O NUMERO DE INDICADOS PRA DIZER QUANTOS AINDA FALTAM
                                   
                $i = 1;
                    
                while ($i <= $faltam) {

                        
                   //
                        //
                        //
                        //  DETECTA E DEFINE AS POSIÇÕES EXISTENTES
                        //
                        //
                        //

                        $this->db->where( array('idIndicador'=> $idIndicador,'fechamento'=> $fechamento,'jornada'=>1,'superCiclo'=>3) );
                        $POSICOES = $this->db->get('indicadores');

                        $posicoesExitentes = array();

                        foreach ($POSICOES->result() as $items) {
                            
                            $posicoesExitentes[] = $items->posicao;
                        }                       

                        if( ! in_array( 1, $posicoesExitentes)  ){
                            
                            $posicao = 1;

                        }elseif ( ! in_array( 2 , $posicoesExitentes) ) {
                            
                            $posicao = 2;

                        }elseif ( ! in_array( 3 , $posicoesExitentes) ) {
                            
                            $posicao = 3;

                        }


                        //
                        //
                        //
                        //  DE ONDE VEM O INDICADO PARA O CICLO 2, do campo aptoPara 2
                        //  PRECISA DEFINIR LÁ EM BAIXO COMO 0 DE NOVO PRA O CARA NAO VOLTAR
                        //
                        //

                        $this->db->where( array( 'fechamento'=> $fechamento, 'status'=> 1, 'block'=> 0,'aptoPara'=>3 ) );
                        $aptos = $this->db->get('usuarios_contas');
                        
                        $PrimeiroDaFila = $aptos->row();

                        if( $aptos->num_rows() == 0 ){
                            echo 'Acabaram os prontos. </br></br>';
                            return;
                        }


                        $login = substr( $PrimeiroDaFila->email, 0, strpos($PrimeiroDaFila->email, '@') ).'-SC3';

                        echo $login.'</br></br>';

                        $this->db->insert('usuarios',
                            array(
                                'login'=>$login,
                                'dataCadastro'=>date('Y-m-d H:i:s'),
                                'superCicloUsuario'=>3,
                                'token'=> md5(date('Y-m-d H:i:s').'-'.$login),
                                'conta_id'=>$PrimeiroDaFila->id,
                                'tipagem'=>'P',
                                'jornada'=>1,
                                'lider'=>1
                                )
                            );

                        $insertID = $this->db->insert_id();

                        $this->db->insert('usuarios_sc',
                            array(
                                'idUsuario'=>$insertID,
                                'superCiclo'=>3,
                                'dataEntrada'=>date('Y-m-d H:i:s'),
                                'ultimaAtividade'=>date('Y-m-d H:i:s'),
                                'status'=>1,
                                'jornada'=> 1,
                                'fechamento'=>1,
                                'reentradas'=>0,
                                )
                            );

                        $this->db->insert('indicadores',
                            array(
                                'idUsuario'=>$insertID,
                                'idIndicador'=>$idIndicador,
                                'superCiclo'=>3,
                                'posicao'=>$posicao,
                                'jornada'=>$jornada,
                                'fechamento'=>$fechamento
                                )
                            );

                        //DA ENTRADA EM UMA DOACAO NA TABELA DE DOACOES E ABRE O CRONOMETRO
                        
                        $recebedor = $this->Recebedor($insertID,3);
                    
                        //DA ENTRADA EM UMA DOACAO NA TABELA DE DOACOES E ABRE O CRONOMETRO
                        $this->db->insert('doacoes',
                                array(
                                    'idDoador'=>$insertID,
                                    'idRecebedor'=>$recebedor,
                                    'valor'=>$this->valor(3),
                                    'superCiclo'=>3,
                                    'comprovante'=>null,
                                    'data_envio'=>null,
                                    'status'=> 1,
                                    )
                                );

                        echo 'Novo indicado '.$insertID.'</br>' ;
                        echo 'Perna '.$posicao.'</br>' ;
                        echo 'Indicador '.$idIndicador.'</br>' ;
                        echo 'Recebedor '.$recebedor.'</br></br>' ;
                        echo '<pre>';
                        var_dump($this->uplines);
                        echo '</pre>';


                        //VOLTA E DEFINE A CONTA COMO PRE CADASTRO JÁ EVOLUIDO
                        $this->db->where('id', $PrimeiroDaFila->id);
                        $this->db->update('usuarios_contas', array('status'=>1,'aptoPara'=>0 ) );

                        $i++;

                }
                
                echo 'Não é repeat </br></br>';
                return;
            }


        }
        echo 'Não tem gente pronta </br></br>';
        return;
    }

    echo $idIndicador.' Não fez doacoes suficientes. </br></br>';
    $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger> Precisamos de mais indicados para ter doadores. </div>');

    }


    // public function alimentaCiclo3($idDoador, $fechamento=null,$jornada=null){ // POSICIONA O CARA

    //     //SE TORNANDO INDICADOR PRA SER ALIMENTADO
    //     $idIndicador = $idDoador;

    //     if($fechamento == null){
    //         $fechamento = 1;
    //     }

    //     if($jornada == null){
    //         $jornada = 1;
    //     }


    // //COMO TIRAMOS O TRECHO DA CONFIRMACAO DA DOACAO AGORA PRECISAMOS CONFIRMAR AQUI
    // $this->db->where(array('idDoador'=>$idDoador,'status'=>0));
    // $doacoes = $this->db->get('doacoes');

    // //if( $doacoes->num_rows() == 1 ){ 

    //     //
    //     //
    //     //
    //     //   VAI NAS CONTAS E VERIFICA SE REALMENTE TEM GENTE PRONTA
    //     //
    //     //
    //     //


    //     $this->db->where( array( 'fechamento'=> $fechamento, 'status'=> 1, 'block'=> 0,'aptoPara'=>3 ) );
    //     $pre = $this->db->get('usuarios_contas');

    //     if( $pre->num_rows()  > 1 ){

    //         //
    //         //
    //         //
    //         //   SE É UM REPEAT , O SISTEMA CADASTRA ELE DE NOVO NA PERNA ESQUERDA DO DOADOR
    //         //
    //         //
    //         //

    //         if( $idIndicador != 1 ){

    //             $this->db->where( array('idIndicador'=> $idIndicador,'fechamento'=> $fechamento,'jornada'=>1,'superCiclo'=>3) );
    //             $INDICADOR = $this->db->get('indicadores');

    //             $numIndicados = $INDICADOR->num_rows();

    //         }else{ //CONDICAÇAO UNICA PARA O IDEALIZADOR ID 1 PARA GENESES

    //             $numIndicados = 0;
    //         }

    //         //ACRESCENTAR: SE A PERNA 2 TAMBÉM EXISTE

    //         //$this->ArvoreUplines($idIndicador);


    //         if($this->infoUser( $idIndicador)->repeat == 1 AND $numIndicados == 0  ){

    //             $login = $this->infoUser( $idIndicador)->login;

    //             $this->db->where('login',$login); 
    //             $existeUsuario = $this->db->get('usuarios');

    //             if( $existeUsuario->num_rows() > 0){

    //                 $login .= substr( $this->infoUser( $idIndicador)->email, 0, strpos($this->infoUser( $idIndicador)->email, '@') ).'-SC3-'.$existeUsuario->num_rows()+1;

    //             }

    //             echo $login.'</br></br>';

    //             $this->db->insert('usuarios',
    //                         array(
    //                             'login'=>$login,
    //                             'dataCadastro'=>date('Y-m-d H:i:s'),
    //                             'superCicloUsuario'=>3,
    //                             'token'=> md5(date('Y-m-d H:i:s').'-'.$login),
    //                             'conta_id'=>$this->infoUser( $idIndicador)->conta_id,
    //                             'tipagem'=>'P',
    //                             'jornada'=>1,
    //                             'repeat'=>1,
    //                             'lider'=>1
    //                             )
    //                         );

    //             $insertID = $this->db->insert_id();

    //             $this->db->insert('usuarios_sc',
    //                         array(
    //                             'idUsuario'=>$insertID,
    //                             'superCiclo'=>3,
    //                             'dataEntrada'=>date('Y-m-d H:i:s'),
    //                             'ultimaAtividade'=>date('Y-m-d H:i:s'),
    //                             'status'=>1,
    //                             'jornada'=> 1,
    //                             'fechamento'=>1,
    //                             'reentradas'=>0,
    //                             )
    //                         );

    //             $this->db->insert('indicadores',
    //                         array(
    //                             'idUsuario'=>$insertID,
    //                             'idIndicador'=>$idIndicador,//ele mesmo antes
    //                             'superCiclo'=>3,
    //                             'posicao'=>1,
    //                             'jornada'=>$jornada,
    //                             'fechamento'=>$fechamento
    //                             )
    //                         );

    //             $recebedor = $idIndicador;

    //             //DA ENTRADA EM UMA DOACAO NA TABELA DE DOACOES E ABRE O CRONOMETRO
    //             $this->db->insert('doacoes',
    //                         array(
    //                             'idDoador'=>$insertID,
    //                             'idRecebedor'=>$recebedor,
    //                             'valor'=>$this->valor(3),
    //                             'superCiclo'=>3,
    //                             'comprovante'=>null,
    //                             'data_envio'=>null,
    //                             'status'=> 0,
    //                             )
    //                         );

    //                 echo 'Novo indicado '.$insertID.'</br>' ;
    //                 echo 'Perna 1</br>' ;
    //                 echo 'Indicador '.$idIndicador.'</br>' ;
    //                 echo 'Recebedor '.$recebedor.'</br></br>' ;
    //                 echo 'Repetido</br></br>';

    //         }


    //         //CONSULTA NOVAMENTE QUANTOS INDICADOS PRECISA
    //         if( $idIndicador != 1 ){

    //             $this->db->where( array('idIndicador'=> $idIndicador,'fechamento'=> $fechamento,'jornada'=>1,'superCiclo'=>3) );
    //             $INDICADOR = $this->db->get('indicadores');

    //             $numIndicados = $INDICADOR->num_rows();

    //         }else{ //CONDICAÇAO UNICA PARA O IDEALIZADOR ID 1 PARA GENESES

    //                 $numIndicados = 0;
    //         }
            
    //         echo 'N° indicados ja existentes: '. $numIndicados.'</br></br>';
            

    //         //if($numIndicados  > 0 ){

    //             $faltam = 3 - $numIndicados; //MATRIZ SUBTRAINDO O NUMERO DE INDICADOS PRA DIZER QUANTOS AINDA FALTAM
                               
    //             $i = 1;
    //             while ($i <= $faltam) {


    //                 //
    //                 //
    //                 //
    //                 //  DETECTA E DEFINE AS POSIÇÕES EXISTENTES
    //                 //
    //                 //
    //                 //

    //                 $this->db->where( array('idIndicador'=> $idIndicador,'fechamento'=> $fechamento,'jornada'=>1,'superCiclo'=>3) );
    //                 $POSICOES = $this->db->get('indicadores');

    //                 $posicoesExitentes = array();

    //                 foreach ($POSICOES->result() as $items) {
                        
    //                     $posicoesExitentes[] = $items->posicao;
    //                 }

                    
    //                 // echo '<pre>';
    //                 // var_dump( $posicoesExitentes );
    //                 // echo '</pre>';
                    

    //                 if( ! in_array( 1, $posicoesExitentes)  ){
                        
    //                     $posicao = 1;

    //                 }elseif ( ! in_array( 2 , $posicoesExitentes) ) {
                        
    //                     $posicao = 2;

    //                 }elseif ( ! in_array( 3 , $posicoesExitentes) ) {
                        
    //                     $posicao = 3;

    //                 }


    //                 //
    //                 //
    //                 //
    //                 //  DE ONDE VEM O INDICADO PARA O CICLO 2, do campo aptoPara 2
    //                 //  PRECISA DEFINIR LÁ EM BAIXO COMO 0 DE NOVO PRA O CARA NAO VOLTAR
    //                 //
    //                 //

    //                 $this->db->where( array( 'fechamento'=> $fechamento, 'status'=> 1, 'block'=> 0,'aptoPara'=>3 ) );
    //                 $aptos = $this->db->get('usuarios_contas');
                    
    //                 $PrimeiroDaFila = $aptos->row(0);

    //                 $this->db->where( array('conta_id'=>$PrimeiroDaFila->id, 'superCicloUsuario'=>3) ); 
    //                 $existeUsuario = $this->db->get('usuarios');

    //                 if( $existeUsuario->num_rows() > 0){

    //                     $login = substr( $PrimeiroDaFila->email, 0, strpos($PrimeiroDaFila->email, '@') ).'-SC-3-'.$existeUsuario->num_rows()+1;

    //                 }else{

    //                     $login = substr( $PrimeiroDaFila->email, 0, strpos($PrimeiroDaFila->email, '@') ).'-SC-3';
    //                 }

    //                 echo $login.'</br></br>';

    //                 $this->db->insert('usuarios',
    //                     array(
    //                         'login'=>$login,
    //                         'dataCadastro'=>date('Y-m-d H:i:s'),
    //                         'superCicloUsuario'=>3,
    //                         'token'=> md5(date('Y-m-d H:i:s').'-'.$login),
    //                         'conta_id'=>$PrimeiroDaFila->id,
    //                         'tipagem'=>'P',
    //                         'jornada'=>1,
    //                         )
    //                     );

    //                 $insertID = $this->db->insert_id();

    //                 $this->db->insert('usuarios_sc',
    //                     array(
    //                         'idUsuario'=>$insertID,
    //                         'superCiclo'=>3,
    //                         'dataEntrada'=>date('Y-m-d H:i:s'),
    //                         'ultimaAtividade'=>date('Y-m-d H:i:s'),
    //                         'status'=>1,
    //                         'jornada'=> 1,
    //                         'fechamento'=>1,
    //                         'reentradas'=>0,
    //                         )
    //                     );

    //                 $this->db->insert('indicadores',
    //                     array(
    //                         'idUsuario'=>$insertID,
    //                         'idIndicador'=>$idIndicador,
    //                         'superCiclo'=>3,
    //                         'posicao'=>$posicao,
    //                         'jornada'=>$jornada,
    //                         'fechamento'=>$fechamento
    //                         )
    //                     );

    //                 //DA ENTRADA EM UMA DOACAO NA TABELA DE DOACOES E ABRE O CRONOMETRO
                    
    //                 $recebedor = $this->Recebedor($insertID,3);                    
                
    //                 //DA ENTRADA EM UMA DOACAO NA TABELA DE DOACOES E ABRE O CRONOMETRO
    //                 $this->db->insert('doacoes',
    //                         array(
    //                             'idDoador'=>$insertID,
    //                             'idRecebedor'=>$recebedor,
    //                             'valor'=>$this->valor(3),
    //                             'superCiclo'=>3,
    //                             'comprovante'=>null,
    //                             'data_envio'=>null,
    //                             'status'=> 1,
    //                             )
    //                         );

    //                 echo 'Novo indicado '.$insertID.'</br>' ;
    //                 echo 'Perna '.$posicao.'</br>' ;
    //                 echo 'Indicador '.$idIndicador.'</br>' ;
    //                 echo 'Recebedor '.$recebedor.'</br></br>' ;
    //                 echo '<pre>'.var_dump($this->uplines).'</pre>';

    //                 //echo 'Recebedor '.$this->infoUser($this->Recebedor($insertID))->nome;

    //                 //VOLTA E DEFINE A CONTA COMO PRE CADASTRO JÁ EVOLUIDO
    //                 $this->db->where('id',$PrimeiroDaFila->id);
    //                 $this->db->update('usuarios_contas', array('status'=>1,'aptoPara'=>0));

    //                 $i++;
    //             }


    //             return;
    //         //}

    //     }

    //     return;
    // // }
    // // echo $idIndicador.'Não fez doacoes suficientes</br></br>';
    // // $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger> Precisamos de mais indicados para ter doadores. </div>');

    // }















    public function qtdIndicados($id,$qtd){

        $this->db->where('idIndicador',$id);
        $result = $this->db->get('indicadores');

        if( $result->num_rows() < $qtd){

            return true;
        }

        return false;
    }



    public $arrayGeral = array();

    public function Geral($idIndicador = 1, $sobe = 1){ 
                    
        //INDICA O USUARIO MATRIZ
        $this->db->where_in('idIndicador', $idIndicador);
        $indicadores = $this->db->get('indicadores');

        if($indicadores->num_rows() > 0){
            
            foreach($indicadores->result() as $row){

                $proximo = $row->idUsuario;

                $this->arrayGeral[$sobe][] = $proximo;
            
                $this->Geral($proximo, $sobe+1);
                   
            }
        }

        return $this->arrayGeral;

    }


    public function countArrayGeral(){

        return count($this->arrayGeral);
    }

    //ENFILERA NA HORIZONTAL DA ESQUERDA PARA A DIREITA
    public function RastreadorGeral( $linha = 1, $nivel = null, $travado = 1){//DESCENDO DOIS NIVEIS
        set_time_limit(800);

        if( $travado == 1 ){
            
            $nivel = $this->countArrayGeral();
        }
      
        if( $nivel > 0 ){ //VERIRICA SE O NIVEL AINDA É MAIOR QUE 0.
            
            foreach( $this->arrayGeral[$linha] as $id){ // FAZ O LACO INSERINDO O CICLO QUE DESEJA ENFILEIRAR
                    
                    if( $this->qtdIndicados($id,3) == true ){//SE ELE TEM ZERO RECEBIMIENTOS VAI RECEBER A REENTRADA

                        return $id;
                        exit;

                    }
            }
            
            return $this->RastreadorGeral( $linha+1, $nivel-1, 0 );  
        }      
       
        echo 'erro no restreador '. $nivel;
        return;
        
    }



    public function compraLogin( $fechamento=null,$jornada=null){ // POSICIONA O CARA

    $conta_idReentrante = $this->native_session->get('conta_id');

    set_time_limit(2000);
    
    if($fechamento == null){
        $fechamento = 1;
    }

    if($jornada == null){
        $jornada = 1;
    }


    // COMPRANDO UM NOVO LOGIN então MUITO ATENÇÃO
    // CONTAR QUANTOS LOGINS ELE JA TEM
    $this->db->where( array('conta_id'=>$conta_idReentrante,'tipagem'=>'P', 'superCicloUsuario'=>1 ) );
    $numLogins = $this->db->get('usuarios')->num_rows();

        if( $numLogins < 6 ){

            $reentrante = $this->infoUser($conta_idReentrante);
            
            //FAZER UM WHILE COM AS REENTRADAS FALTANTES CICLANDO NOS QUE NAO RECEBERAM
            $this->Geral();
            $idIndicador =  $this->RastreadorGeral();

            //VERIFICA SE O INDICADOR QUE TERIA ZERO DOACOES NÃO ESTÁ IMPEDIDO.

            if( !empty($idIndicador) ){
                
                $this->db->where( array('idIndicador'=> $idIndicador,'fechamento'=> $fechamento,'jornada'=>1,'superCiclo'=>1) );
                $POSICOES = $this->db->get('indicadores');

                $posicoesExitentes = array();

                foreach ($POSICOES->result() as $items) {
                            
                    $posicoesExitentes[] = $items->posicao;
                }
                        

                if( ! in_array( 1, $posicoesExitentes)  ){
                            
                    $posicao = 1;

                }elseif ( ! in_array( 2 , $posicoesExitentes) ) {
                            
                    $posicao = 2;

                }elseif ( ! in_array( 3 , $posicoesExitentes) ) {
                            
                    $posicao = 3;

                }else{

                }

                $login = substr( $reentrante->email, 0, strpos($reentrante->email, '@') ).'-F2-'.$numLogins;


                    $this->db->insert('usuarios',
                            array(
                                'login'=>$login,
                                'dataCadastro'=>date('Y-m-d H:i:s'),
                                'superCicloUsuario'=>1,
                                'token'=> md5(date('Y-m-d H:i:s').'-'.$login),
                                'conta_id'=>$reentrante->conta_id,
                                'tipagem'=>'P',
                                'jornada'=>1,
                                )
                        );

                        $insertID = $this->db->insert_id();

                        $this->db->insert('usuarios_sc',
                            array(
                                'idUsuario'=>$insertID,
                                'superCiclo'=>1,
                                'dataEntrada'=>date('Y-m-d H:i:s'),
                                'ultimaAtividade'=>date('Y-m-d H:i:s'),
                                'status'=>1,
                                'jornada'=> 1,
                                'fechamento'=>1,
                                'reentradas'=>0,
                                )
                            );

                        $this->db->insert('indicadores',
                            array(
                                'idUsuario'=>$insertID,
                                'idIndicador'=>$idIndicador,
                                'superCiclo'=>1,
                                'posicao'=>$posicao,
                                'jornada'=>$jornada,
                                'fechamento'=>$fechamento
                                )
                            );

                        //DA ENTRADA EM UMA DOACAO NA TABELA DE DOACOES E ABRE O CRONOMETRO
                        
                        $recebedor = $this->Recebedor($insertID,1);                    
                    
                        //DA ENTRADA EM UMA DOACAO NA TABELA DE DOACOES E ABRE O CRONOMETRO
                        $this->db->insert('doacoes',
                                array(
                                    'idDoador'=>$insertID,
                                    'idRecebedor'=>$recebedor,
                                    'valor'=>$this->valor(1),
                                    'superCiclo'=>1,
                                    'comprovante'=>null,
                                    'data_envio'=>null,
                                    'status'=> 1,
                                    'reentrada'=>0
                                    )
                                );


                $this->native_session->set_flashdata('mensagem','<div class="alert alert-success text-center">Aquisição bem sucedida</div>');
                return;

            }else{

                $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger text-center">Não há lugar na fila '. $idIndicador. '</div>');
                return;
            }
            
        }

    $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger text-center">Você alcançou o limite</div>');
    
    }









    public function qtdZero($id,$qtd){

        $this->db->where('idIndicador',$id);
        $result = $this->db->get('indicadores');

        if( $result->num_rows() == $qtd){

            return true;
        }

        return false;
    }



    public $arrayZeroRecebimentos = array();

    public function ZeroRecebimentos($idIndicador = 1, $sobe = 1){ 
                    
        //INDICA O USUARIO MATRIZ
        $this->db->where( array('tipagem'=>'P',));
        $this->db->order_by('idUsuario','ASC');
        $indicadores = $this->db->get('usuarios');

        if($indicadores->num_rows() > 0){
            //FAZ O LAÇO NO USUARIOS
            
            foreach($indicadores->result() as $row){

                $proximo = $row->idUsuario;

                if( $this->qtdZero($proximo,0) == true  ){//SE ELE TEM ZERO RECEBIMIENTOS VAI RECEBER A REENTRADA

                    return $proximo;
                    break;
                }               
            }
        }
    }



   public function fazReentrada($idReentrante, $fechamento=null,$jornada=null){ // POSICIONA O CARA

    set_time_limit(2000);
    
    if($fechamento == null){
        $fechamento = 1;
    }

    if($jornada == null){
        $jornada = 1;
    }
  
    //PEGAR O LOGIN VERIFICAR EM QUAL CICLO ESTA
    $reentrante = $this->infoUser($idReentrante);
    
    echo 'Ciclo '.$reentrante->superCicloUsuario.'</br>';
    echo 'Conta '.$reentrante->conta_id.'</br>';

    if($reentrante->lider == 1 ){

        return;
    }


    // A REENTRADA É REGISTRADA COMO NOVO LOGIN então MUITO ATENÇÃO
    // CONTAR QUANTAS REENTRADAS JA FEZ 
    $this->db->where( array('conta_id'=>$reentrante->conta_id,'tipagem'=>'R', 'superCicloUsuario'=>$reentrante->superCicloUsuario ) );
    $numReentradas = $this->db->get('usuarios')->num_rows();

    //DEFINIR QUANTAS REENTRADAS FALTAM DE ACORDO COM O NUMERO DE DOACOES RECEBIDAS
    $this->db->where(array('idRecebedor'=>$idReentrante,'status'=>0));
    $numRecebidas = $this->db->get('doacoes')->num_rows();
    echo 'Doações recebidas: '. $numRecebidas.'</br>';

    $reentradas = 0;

    if($reentrante->superCicloUsuario == 1){

        if($numRecebidas == 6 ){

            $reentradas = 1;
        }

        if($numRecebidas == 7 ){

            $reentradas = 2;
        }
        
    }

    if($reentrante->superCicloUsuario == 2){
        
        if($numRecebidas == 1 ){

            $reentradas = 2;
        }
        
    }

    if($reentrante->superCicloUsuario == 3){

        if($numRecebidas == 6 ){

            $reentradas = 1;
        }

        if($numRecebidas == 7 ){

            $reentradas = 2;
        }

    }

    $faltam =  $reentradas - $numReentradas;

    echo 'Precisa fazer: '.$reentradas.'</br>';
    echo 'Reentradas que faltam: '.$faltam.'</br>';

    //FAZER UM WHILE COM AS REENTRADAS FALTANTES CICLANDO NOS QUE NAO RECEBERAM

    if( $faltam > 0 ){


        $i = 0;
        while ( $i < $faltam ) { 

            //  PEGA ALGUEM QUE NAO RECEBEU NADA. DESATIVAR DEPOIS QUE TODOS RECEBEREM
            $idIndicador =  $this->ZeroRecebimentos(1); 
            echo 'Inidicador que recebe a reentrada: '. $idIndicador.' - '. $this->infoUser($idIndicador )->nome.' - '. $this->infoUser($idIndicador )->conta_id.'</br></br>';

            //VERIFICA SE O INDICADOR QUE TERIA ZERO DOACOES NÃO ESTÁ IMPEDIDO.
            if( !empty($idIndicador) ){
                
                $this->db->where( array('idIndicador'=> $idIndicador,'fechamento'=> $fechamento, 'superCiclo'=>1) );
                $POSICOES = $this->db->get('indicadores');

                $posicoesExitentes = array();

                foreach ($POSICOES->result() as $items) {
                            
                    $posicoesExitentes[] = $items->posicao;
                }

                echo '<pre>';
                var_dump($posicoesExitentes);
                echo '</pre>';
                        

                if( ! in_array( 1, $posicoesExitentes)  ){
                            
                    $posicao = 1;

                }elseif ( ! in_array( 2 , $posicoesExitentes) ) {
                            
                    $posicao = 2;

                }elseif ( ! in_array( 3 , $posicoesExitentes) ) {
                            
                    $posicao = 3;

                }


                //echo '</br></br>'.$reentrante->email.'</br></br>';
                echo '</br>Posição '.$posicao.'</br></br>';

                $login = substr( $reentrante->email, 0, strpos($reentrante->email, '@') ).'-R-'.$reentrante->superCicloUsuario.'-'.$i;


                    $this->db->insert('usuarios',
                            array(
                                'login'=>$login,
                                'dataCadastro'=>date('Y-m-d H:i:s'),
                                'superCicloUsuario'=>$reentrante->superCicloUsuario,
                                'token'=> md5(date('Y-m-d H:i:s').'-'.$login),
                                'conta_id'=>$reentrante->conta_id,
                                'tipagem'=>'R',
                                'jornada'=>1,
                                )
                        );

                        $insertID = $this->db->insert_id();

                        $this->db->insert('usuarios_sc',
                            array(
                                'idUsuario'=>$insertID,
                                'superCiclo'=>$reentrante->superCicloUsuario,
                                'dataEntrada'=>date('Y-m-d H:i:s'),
                                'ultimaAtividade'=>date('Y-m-d H:i:s'),
                                'status'=>1,
                                'jornada'=> 1,
                                'fechamento'=>1,
                                'reentradas'=>0,
                                )
                            );

                        $this->db->insert('indicadores',
                            array(
                                'idUsuario'=>$insertID,
                                'idIndicador'=>$idIndicador,
                                'superCiclo'=>1,
                                'posicao'=>$posicao,
                                'jornada'=>$jornada,
                                'fechamento'=>$fechamento,
                                'tipagem'=>R
                                )
                            );

                        //DA ENTRADA EM UMA DOACAO NA TABELA DE DOACOES E ABRE O CRONOMETRO
                        
                        $recebedor = $this->Recebedor($insertID,1);                    
                    
                        //DA ENTRADA EM UMA DOACAO NA TABELA DE DOACOES E ABRE O CRONOMETRO
                        $this->db->insert('doacoes',
                                array(
                                    'idDoador'=>$insertID,
                                    'idRecebedor'=>$recebedor,
                                    'valor'=>$this->valor(1),
                                    'superCiclo'=>$reentrante->superCicloUsuario,
                                    'comprovante'=>null,
                                    'data_envio'=>null,
                                    'status'=> 1,
                                    'reentrada'=>1
                                    )
                                );

                        echo '</br></br>'.$login.'</br></br>';
                        echo 'Novo indicado '.$insertID.'</br>' ;
                        echo 'Perna '.$posicao.'</br>' ;
                        echo 'Indicador '.$idIndicador.'</br>' ;
                        echo 'Recebedor '.$recebedor.'</br></br>' ;
                        echo '<pre>'.var_dump($this->uplines).'</pre>';

                        
            }else{

                echo $idIndicador.'Recebedor nao apto. </br></br>';

            }

            $i++;
        }//FIM DO WHILLE

    }

    }


    ////////////FIM REENTRADA



    public function trocaJornada($idRecebedor){
        //ADD ID LOGIN DO RECEBEDOR NA TABELA INDICADORES NOVAMENTE
        //1 DEFININDO NOVO SUPER CICLO NO PERFIL DO LOGIN
        //2 DEFININDO POSICAO 
        //3 DEFININDO JORNADA
        //4 DEFININDO NOVO INDICADOR
        //5 PRE DEFININDO DOACAO NO NOVO SUPER CICLO
    }


    public function assumeDoador($idUsuario){

        $this->db->where( array( 'status'=> 0, 'block'=> 0, 'dataUltimoLogin !='=>'0000-00-00 00:00:00' ) );
        $pre = $this->db->get('usuarios_contas');

        if( $pre->num_rows()  > 0 ){

            $aberto = $pre->row(0);
                    
            $login = substr( $aberto->email, 0, strpos($aberto->email, '@') );

            $this->db->where('login',$login);
            if($this->db->get('usuarios')->num_rows() > 0){

                $login = substr($aberto->email, 0, strpos($aberto->email, '@')).'-'. $pre->num_rows()+1;

            }

            $this->db->insert('usuarios',
                        array(
                            'login'=>$login,
                            'dataCadastro'=>date('Y-m-d H:i:s'),
                            'superCicloUsuario'=>1,
                            'token'=> md5(date('Y-m-d H:i:s').'-'.$login),
                            'conta_id'=>$aberto->id,
                            'tipagem'=>'P',
                            'jornada'=>1,
                            )
                        );

                    $insertID = $this->db->insert_id();

                    $this->db->insert('usuarios_sc',
                        array(
                            'idUsuario'=>$insertID,
                            'superCiclo'=>1,
                            'dataEntrada'=>date('Y-m-d H:i:s'),
                            'ultimaAtividade'=>date('Y-m-d H:i:s'),
                            'status'=>1,
                            'jornada'=> 1,
                            'fechamento'=>1,
                            'reentradas'=>0,
                            )
                        );

                $this->db->where('id', $aberto->id );
                $this->db->update('usuarios_contas', array('status'=>1));


                //ID DO USUARIO QUE ESTÁ SENDO SUBSTITUIDO
                //vem no parametro

                //ID DO NOVO USUARIO QUE FOI PEGO NA FILA
                $novoUsuario = $insertID;

                $this->db->where('idDoador', $idUsuario);
                $this->db->update('doacoes', array('idDoador'=>$novoUsuario,'cronometro'=>strtotime('now')+86400 ));

                $this->db->where('idUsuario',$idUsuario);
                $this->db->update('indicadores', array('idUsuario'=>$novoUsuario ));

                return true;
        }   

        return false;

    }


    public function substituiDoador($idUsuario){

        $this->db->where( array( 'status'=> 0, 'block'=> 0, 'dataUltimoLogin !='=>'0000-00-00 00:00:00' ) );
        $pre = $this->db->get('usuarios_contas');

        if( $pre->num_rows()  > 0 ){

            $aberto = $pre->row(0);
                    
            $login = substr( $aberto->email, 0, strpos($aberto->email, '@') );

            $this->db->where('login',$login);
            if($this->db->get('usuarios')->num_rows() > 0){

                $login = substr($aberto->email, 0, strpos($aberto->email, '@')).'-'. $pre->num_rows()+1;

            }

            $this->db->insert('usuarios',
                        array(
                            'login'=>$login,
                            'dataCadastro'=>date('Y-m-d H:i:s'),
                            'superCicloUsuario'=>1,
                            'token'=> md5(date('Y-m-d H:i:s').'-'.$login),
                            'conta_id'=>$aberto->id,
                            'tipagem'=>'P',
                            'jornada'=>1,
                            )
                        );

                    $insertID = $this->db->insert_id();

                    $this->db->insert('usuarios_sc',
                        array(
                            'idUsuario'=>$insertID,
                            'superCiclo'=>1,
                            'dataEntrada'=>date('Y-m-d H:i:s'),
                            'ultimaAtividade'=>date('Y-m-d H:i:s'),
                            'status'=>1,
                            'jornada'=> 1,
                            'fechamento'=>1,
                            'reentradas'=>0,
                            )
                        );

                $this->db->where('id', $aberto->id );
                $this->db->update('usuarios_contas', array('status'=>1));


                //ID DO USUARIO QUE ESTÁ SENDO SUBSTITUIDO
                //vem no parametro

                //ID DO NOVO USUARIO QUE FOI PEGO NA FILA
                $novoUsuario = $insertID;

                $this->db->where('idDoador', $idUsuario);
                $this->db->update('doacoes', array('idDoador'=>$novoUsuario,'cronometro'=>strtotime('now')+86400 ));

                $this->db->where('idUsuario',$idUsuario);
                $this->db->update('indicadores', array('idUsuario'=>$novoUsuario ));

                return true;
        }   

        return false;

    }

    public function abandonarDoador(){

        // Pega a conta_id excluir
        $idConta = $this->input->post('idConta');
        $superCiclo = $this->input->post('superCiclo');

        // pega o idUsuario
        $this->db->where(array('conta_id'=>$idConta,'superCicloUsuario'=>$superCiclo) );
        $idUsuario = $this->db->get('usuarios')->row()->idUsuario;

        //executa scprit de substituicao
        if( $this->substituiDoador( $idUsuario ) == true ){

            // na doacoes idDoador
            $this->db->where(array('idDoador'=>$idUsuario, 'superCiclo'=>$superCiclo) );
            $this->db->delete('doacoes');
            // nos indicadores
            $this->db->where(array('idUsuario'=>$idUsuario, 'superCiclo'=>$superCiclo) );
            $this->db->delete('indicadores');
            // na usuarios_sc
            $this->db->where(array('idUsuario'=>$idUsuario, 'superCiclo'=>$superCiclo) );
            $this->db->delete('usuarios_sc');
            // na usuarios
            $this->db->where(array('idUsuario'=>$idUsuario, 'superCicloUsuario'=>$superCiclo ));
            $this->db->delete('usuarios');
            
            // na usuarios_contas
            // $this->db->where('id',$idConta);
            // $this->db->delete('usuarios_contas');

            // na usuarios_bancos
            $this->db->where('idContaUsuario',$idConta);
            $this->db->delete('usuarios_bancos');
            
            $this->native_session->set_flashdata('mensagem','<div class="alert alert-success text-center">Usuario substituido </div>');
            redirect('backoffice/usuario');
        }
        
        $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger text-center"> Não existe ninguem na fila </div>');
        redirect('backoffice/usuario');
    }


    public function excluirDoador(){

       // Pega a conta_id excluir
        $idUsuario = $this->input->post('idUsuario');
        $superCiclo = $this->input->post('superCiclo');


        // na doacoes idDoador
        $this->db->where(array('idDoador'=>$idUsuario, 'superCiclo'=>$superCiclo) );
        $this->db->delete('doacoes');
        
        // nos indicadores
        $this->db->where(array('idUsuario'=>$idUsuario, 'superCiclo'=>$superCiclo) );
        $this->db->delete('indicadores');
        
        // na usuarios_sc
        $this->db->where(array('idUsuario'=>$idUsuario, 'superCiclo'=>$superCiclo) );
        $this->db->delete('usuarios_sc');
        
        // na usuarios
        $this->db->where(array('idUsuario'=>$idUsuario, 'superCicloUsuario'=>$superCiclo ));
        $this->db->delete('usuarios');
            
        // na usuarios_contas
        $this->db->where('id',$this->infoUser($idUsuario)->conta_id );
        $this->db->update('usuarios_contas', array('block'=>1));

        //executa scprit de substituicao
        //$this->substituiDoador( $idUsuario );

        $this->native_session->set_flashdata('mensagem','<div class="alert alert-success text-center"> Doador recusado </div>');
        redirect('backoffice/usuario');

    }

    public function limpaIndicadores(){

        $loginsIndicadores = $this->db->get('indicadores')->result();

        foreach ($loginsIndicadores as $idLoginIndicado ) {

            $this->db->where('idusuario', $idLoginIndicado->idUsuario );
            $existAccount = $this->db->get('usuarios')->num_rows();

            if($existAccount == 0 ){

                $this->db->where('idUsuario', $idLoginIndicado->idUsuario );
                $this->db->delete('indicadores');
            }
            
        }
    }



    //FAZER DOACÃO AO UPLINE OU REENVIAR COMPROVANTE
    public function EfetuarDoacao(){

        $idDoacao = $this->input->post('idDoacao');

        $config['allowed_types'] = 'bmp|jpg|jpeg|pjpeg|png|gif|doc|pdf';
        $config['upload_path'] = './uploads/comprovantes/';
        $config['encrypt_name'] = true;

        $this->upload->initialize($config);

        if($this->upload->do_upload()){

            $retornoUpload = $this->upload->data();

            $this->db->where('id', $idDoacao);
            $doacoes = $this->db->get('doacoes');

            $qr = '';
            $mensagem = '';

            if( $doacoes->num_rows() > 0 ){

                $img = $doacoes->row();

                if( $img->comprovante != NULL ){

                    $path_to_file = './uploads/comprovantes/'.$img->comprovante;
                    unlink($path_to_file);

                    $this->db->where('id', $idDoacao);
                    $qr .= $this->db->update('doacoes', array('status'=>'2','data_envio'=> date('Y-m-d H:i:s') ,'comprovante'=>$retornoUpload['file_name']));

                    $mensagem .= 'Comprovante enviado';

                }

                else{

                    $this->db->where('id', $idDoacao);
                    $qr .= $this->db->update('doacoes', array('status'=>'2','comprovante'=>$retornoUpload['file_name']));

                    $mensagem .= 'Comprovante enviado';
                }
            }

            if($qr){
                
                $this->native_session->set_flashdata('mensagem','<div class="alert alert-success text-center">Comprovante enviado com sucesso!</div>');
                redirect('backoffice/usuario');
            }

            $this->native_session->set_flashdata('mensagem_erro','<div class="alert alert-danger text-center">Erro ao enviar comprovante.</div>');
            redirect('backoffice/usuario');
        }

        $this->native_session->set_flashdata('mensagem_erro','<div class="alert alert-danger text-center">Erro ao fazer upload: '.$this->upload->display_errors().' </div>');
        redirect('backoffice/usuario');

    }
    

    //VERIFICA A QUANTIDADE DE DOACOES DE ACORDO COM O CICLO
    public function verificaQtdDoacoesFeitas( $idDoador){

        // $this->db->where('idIndicador',$idDoador);
        // $SCDoador = $this->db->get('usuarios')->row()->superCicloUsuario;

        // if( $SCDoador == $superCiclo){

            $this->db->where( array('idDoador'=>$idDoador,'status'=>0) );
            $doacoes = $this->db->get('doacoes')->num_rows();

            if( $doacoes == 1  ){

                return TRUE;
            }

        // }

        return false;
    }


    //VERIFICA A QUANTIDADE DE DOACOES DE ACORDO COM O CICLO
    public function verificaQtdDoacoesRecebidas($superCiclo,$idRecebedor){

        $this->db->where('idUsuario',$idRecebedor);
        $SCrecebedor = $this->db->get('usuarios')->row()->superCicloUsuario;

        if( $SCrecebedor == $superCiclo){

            $this->db->where( array('idRecebedor'=>$idRecebedor, 'superCiclo'=>$superCiclo,'status'=>0) );
            $doacoes = $this->db->get('doacoes')->num_rows();

            if($superCiclo == 1 AND $doacoes == 5  ){

                return TRUE;
            }

            if($superCiclo == 2 AND $doacoes == 3  ){

                return TRUE;
            }

            if($superCiclo == 3 AND $doacoes == 6  ){

                return TRUE;
            }

        }

        return false;
    }

    public function confirmarDoacao(){

        //DOACAO
        $idDoacao = $this->input->post('idDoacao');

        $this->db->where('id', $idDoacao);
        $doacao = $this->db->get('doacoes')->row();

        $idDoador = $doacao->idDoador;
        $idRecebedor = $doacao->idRecebedor;

        $valorDoacao = $doacao->valor;
        $superCiclo = $doacao->superCiclo;

        //DÁ O STATUS NA DOACAO DE FEITA
        $this->db->where('id', $idDoacao);
        $updateDoacao = $this->db->update('doacoes', array('status'=>0 ) );

        if( $updateDoacao ){

            //------ PARA O DOADOR
            //TRAZ NOVOS INDICADOS ABAIXO DO DOADOR
            //$this->alimentaCiclo1($idDoador);
        }

        //------ PARA O RECEBEDOR
        //SE ELE TEM O NUMERO DE DOACOES SUFICIENTE
        if( $this->verificaQtdDoacoesRecebidas($superCiclo,$idRecebedor) == TRUE ){

            $novoSuperCiclo = $superCiclo+1;

            if($superCiclo < 3){
                //TROCA O SUPER CICLO DO RECEBEDOR
                //$this->db->where('id', $idRecebedor);
                //$this->db->update('usuarios', array('superCicloUsuario'=>$novoSuperCiclo, ));
            }

            if($superCiclo == 1){
                $this->db->where('id',$this->infoUser($idRecebedor)->conta_id );
                $this->db->update('usuarios_contas', array('aptoPara'=>2, ));
                
                //RODA ELE NA MATRIZ DA FRENTE
                //$this->alimentaCiclo2($idRecebedor);

                //FAZER O GATILHO DA REENRADA AQUI
                $this->fazReentrada($idRecebedor);
            }

            if($superCiclo == 2){
                $this->db->where('id',$this->infoUser($idRecebedor)->conta_id );
                $this->db->update('usuarios_contas', array('aptoPara'=>3, ));
                
                //RODA ELE NA MATRIZ DA FRENTE
                //$this->alimentaCiclo3($idRecebedor);

                //FAZER O GATILHO DA REENRADA AQUI
                $this->fazReentrada($idRecebedor);
            }
            
            if($superCiclo == 3){
                $this->db->where('idUsuario',$this->infoUser($idRecebedor)->conta_id );
                $this->db->update('usuarios_contas', array('aptoPara'=>4, ));
                
                //TROCA JORNADA
                //$this->trocaJornada($idRecebedor);
            }
        }

        $this->native_session->set_flashdata('mensagem','<div class="alert alert-success text-center"> Doação confirmada  </div>');

        redirect('backoffice/usuario', 'location');
    }

    
    public function recusarDoacao(){

        //DOACAO
        $idDoacao = $this->input->post('idDoacao');

        //DÁ O STATUS NA DOACAO DE FEITA
        $this->db->where('id', $idDoacao);
        $updateDoacao = $this->db->update('doacoes', array('status'=>3 ) );

        $this->native_session->set_flashdata('mensagem', '<div class="alert alert-success text-center"> Doação recusada </div>');

        redirect('backoffice/usuario');
    }













    public $redeGeral = array();

    public function RastreadorUniversal($id, $nivel = 1){ // DEFINA OS NIVEIS QUE A RECURSIVA DESCE TROCANDO O CICLO. ELE DECRESCE PRA SUBIR O NIVEL. O NIVEL ALIMENTA O INDICE DA ARRAY INDICANDO A QUAL CICLO PERTENCEM AS PESSOAS LISTADAS.
        $this->db->save_queries = FALSE;

        //if($ciclos > 0){
            
            //INDICA O USUARIO MATRIZ
            $this->db->where('idIndicador', $id);
            $indicadores = $this->db->get('indicadores');

            if($indicadores->num_rows() > 0){
                //FAZ O LAÇO NO USUARIOS
                foreach($indicadores->result() as $row){
                    
                    //if($this->infoUser($row->id_usuario)->ciclo != 0 AND $this->infoUser($row->id_usuario)->block == 0 ){//NAO DEIXA OS INDIVIDUOS NO CICLO 0 ENTRAREM

                        $proximo = $row->idUsuario;
                    
                        $this->redeGeral[$nivel][] = $proximo;
                        
                        $this->RastreadorUniversal($proximo, $nivel+1);
                    //}
                    
                }
            }
        //}

        return $this->redeGeral;

    }

    //ENFILERA NA HORIZONTAL DA ESQUERDA PARA A DIREITA
    public function LinkUniversal($id_matriz = 1, $ciclo = 1, $nivel = null ){
        $matriz = $id_matriz;
        $this->RastreadorUniversal($matriz); //USANDO O ID INDICADO ALIMENTA O RASTREADOR COM OS INDICADOS ABAIXO DO MATRIZ
        
        if($nivel == null){
            $nivel = count($this->redeGeral);
        }     

        if($nivel > 0){ //VERIRICA SE O NIVEL AINDA É MAIOR QUE 0.

            $redeMatriz = $this->redeGeral; //TRAZ A ARRAY QUE O RASTREADOR EM QUANTOS NIVEIS ELE ESTIVER CONFIGURADO

            if( count($redeMatriz) > 0){ //CONTA OS INDICES DA ARRAY. SE 0 RETORNA O PROPRIO MATRIZ. SIGNIFICA QUE ELE NAO TEM INDICADOS.

                foreach( $redeMatriz[$ciclo] as $id){ // FAZ O LACO INSERINDO O CICLO QUE DESEJA ENFILEIRAR
                   
                    //if( $this->StatusIndicado($id) < 3 AND $this->infoUser($id)->ciclo != 0  AND $this->infoUser($id)->block != 1){ //INDICA AS CONDICOES.

                            return $id;//traz o primeiro que obedece a condição
                            break; //para no primeiro que encontrar
                            exit;
                    //}           

                }

                return  $this->painel_model->LinkUniversal($matriz, $ciclo+1, $nivel-1);
            }
             
        }

        return false;
                
    }



   











    //////////////////////////////////////////////////////// LSITA DE DOWNLINES

    // public function ArvoreDownlines($id, $ciclos = 2 , $nivel = 1){

    //     $superCiclo = $this->user_coluna('superCiclo');

    //     if($ciclos > 0){
    //         //INDICA O USUARIO MATRIZ
    //         $this->db->where( array('idIndicador'=> $id) );
    //         $indicadores = $this->db->get('indicadores');

    //         if($indicadores->num_rows() > 0){
    //             //FAZ O LAÇO NO USUARIOS
    //             foreach($indicadores->result() as $row){
    //                 //TRAZ O ID DO DOWNLINE
    //                 $id = $row->id_usuario;
                    
    //                 $this->downlines[$nivel][$id] = $id;
                    
    //                 $this->ArvoreDownlines($id, $ciclos-1, $nivel+1);
    //             }
    //         }
    //     }
    // }

    //  public function Downlines(){
    //     $sessao = $this->native_session->get('user_id');
    //     $this->ArvoreDownlines($sessao);        
    //     return $this->downlines;
    // } 





    public function RedeFilhos($id = 1, $ciclos = 1 , $nivel = 1){

        $filhos = array();

        if($ciclos > 0){

            //INDICA O USUARIO MATRIZ
            $this->db->where('idIndicador', $id);
            $indicadores = $this->db->get('indicadores');

            if($indicadores->num_rows() > 0){

                //return $indicadores->result();
                //FAZ O LAÇO NO USUARIOS
                foreach($indicadores->result() as $row){
                    //TRAZ O ID DO DOWNLINE
                    $id_indicado = $row->idUsuario;
                    
                    $filhos[$id][$id_indicado] = $id_indicado;
                    
                    $this->RedeFilhos($id, $ciclos-1, $nivel+1);
                }
            }
        }

        return $filhos;
    }


    public function RedeNetos($id, $ciclos = 1 , $nivel = 1){
        $netos = array();

        if($ciclos > 0){
            //INDICA O USUARIO MATRIZ
            $this->db->where('idIndicador', $id);
            $indicadores = $this->db->get('indicadores');

            if($indicadores->num_rows() > 0){
                //FAZ O LAÇO NO USUARIOS
                foreach($indicadores->result() as $row){
                    //TRAZ O ID DO DOWNLINE
                    $id_indicado = $row->idUsuario;
                    
                    $netos[$id_indicado] = $id_indicado;

                    $this->RedeNetos($id, $ciclos-1, $nivel+1);
                }
            }

        }

        return $netos;
    }




    // public function RedeNetos($id, $ciclos = 2 , $nivel = 1){
    //     $netos = array();

    //     if($ciclos > 0){
    //         //INDICA O USUARIO MATRIZ
    //         $this->db->where('idIndicador', $id);
    //         $indicadores = $this->db->get('indicadores');

    //         if($indicadores->num_rows() > 0){

                
    //             //FAZ O LAÇO NO USUARIOS
    //             foreach($indicadores->result() as $row){
                    
    //                 $id_indicado = $row->idUsuario;
                    
    //                 $netos[$id_indicado] = $id_indicado;

    //                 $this->RedeNetos($id, $ciclos-1, $nivel+1);

    //                 echo '<ul class="ciclo2">';
    //                     foreach($netos as $neto){

    //                         echo '<li>';
                            
    //                         echo '<div class="avatar-frame">';

    //                         echo '<img class="user-pic" width=80" src="'.base_url().'/assets/default_avatar.png">';

    //                         echo '</div>';

    //                         echo '<a class="" href="#">'.$this->backoffice_model->infoUser($neto)->nome.'</a>';

    //                         echo '</li>';
                            
    //                     }
    //                 echo '</ul>';



                    
    //             }


    //         }

    //     }

    //     return $netos;
    // }




    // public function RedeBisnetos($id, $ciclos = 1 , $nivel = 1){
    //     $bisnetos = array();

    //     if($ciclos > 0){
    //         //INDICA O USUARIO MATRIZ
    //         $this->db->where('id_indicador', $id);
    //         $indicadores = $this->db->get('indicadores');

    //         if($indicadores->num_rows() > 0){
    //             //FAZ O LAÇO NO USUARIOS
    //             foreach($indicadores->result() as $row){
    //                 //TRAZ O ID DO DOWNLINE
    //                 $id_indicado = $row->id_usuario;
                    
    //                 $bisnetos[$id_indicado] = $id_indicado;

    //                 $this->Redebisnetos($id, $ciclos-1, $nivel+1);
    //             }
    //         }
    //     }

    //     return $bisnetos;
    // }


    // public function RedeTataranetos($id, $ciclos = 1 , $nivel = 1){
    //     $tataranetos = array();

    //     if($ciclos > 0){
    //         //INDICA O USUARIO MATRIZ
    //         $this->db->where('id_indicador', $id);
    //         $indicadores = $this->db->get('indicadores');

    //         if($indicadores->num_rows() > 0){
    //             //FAZ O LAÇO NO USUARIOS
    //             foreach($indicadores->result() as $row){
    //                 //TRAZ O ID DO DOWNLINE
    //                 $id_indicado = $row->id_usuario;
                    
    //                 $tataranetos[$id_indicado] = $id_indicado;

    //                 $this->RedeTataranetos($id, $ciclos-1, $nivel+1);
    //             }
    //         }
    //     }

    //     return $tataranetos;
    // }



      //LINK UNICO ARVORE DE ANALISE POR LINHA DANDO BREAK AO ENCONTRAR O PRIMEIRO COMPATIVEL NO FOREACH

    // public $rede = array();

    // public function Rastreador($id, $ciclos = 4, $nivel = 1){ // DEFINA OS NIVEIS QUE A RECURSIVA DESCE TROCANDO O CICLO. ELE DECRESCE PRA SUBIR O NIVEL. O NIVEL ALIMENTA O INDICE DA ARRAY INDICANDO A QUAL CICLO PERTENCEM AS PESSOAS LISTADAS.

    //     if($ciclos > 0){
            
    //         //INDICA O USUARIO MATRIZ
    //         $this->db->where('id_indicador', $id);
    //         $indicadores = $this->db->get('indicadores');

    //         if($indicadores->num_rows() > 0){
    //             //FAZ O LAÇO NO USUARIOS
    //             foreach($indicadores->result() as $row){
                    
    //                 if($this->infoUser($row->id_usuario)->ciclo != 0 ){//NAO DEIXA OS INDIVIDUOS NO CICLO 0 ENTRAREM

    //                     $proximo = $row->id_usuario;
                    
    //                     $this->rede[$nivel][] = $proximo;
                        
    //                     $this->Rastreador($proximo, $ciclos-1, $nivel+1);
    //                 }
                    
    //             }
    //         }
    //     }

    //     //return $this->rede;

    // }


    // //ENFILERA NA HORIZONTAL DA ESQUERDA PARA A DIREITA
    // public function LinkUnico($id_matriz, $ciclo = 1, $nivel = 3){

    //     $matriz = $id_matriz;

    //     $this->Rastreador($matriz); //USANDO O ID INDICADO ALIMENTA O RASTREADOR COM OS INDICADOS ABAIXO DO MATRIZ

    //     if($nivel > 0){ //VERIRICA SE O NIVEL AINDA É MAIOR QUE 0.

    //         $redeMatriz = $this->rede; //TRAZ A ARRAY QUE O RASTREADOR EM QUANTOS NIVEIS ELE ESTIVER CONFIGURADO

    //         if( count($redeMatriz) > 0){ //CONTA OS INDICES DA ARRAY. SE 0 RETORNA O PROPRIO MATRIZ. SIGNIFICA QUE ELE NAO TEM INDICADOS.

    //             foreach( $redeMatriz[$ciclo] as $id){ // FAZ O LACO INSERINDO O CICLO QUE DESEJA ENFILEIRAR
                   
    //                 if( $this->StatusIndicado($id) < 3 AND $this->infoUser($id)->ciclo > 0  AND $this->infoUser($id)->block == 0){ //INDICA AS CONDICOES.

    //                         return $id; //traz o primeiro que obedece a condição

    //                         break; //para no primeiro que encontrar
    //                         exit;
    //                 }           

    //             }

    //             return  $this->painel_model->LinkUnico($matriz, $ciclo+1, $nivel-1); //retorna na função se não atender a condição de cima
    //             //SE EXISTIR UMA CONDIÇÃO ABAIXO, É PRECISO TER UM RETURNO PARA PARA POR AQUI SE NAO ELE VAI PASSAR NA CONDICAO DE BAIXO.
    //         }
             
    //     }

    //     return $matriz; //SE ES
                
    // }   


    // //SOMA A QUANTIDADE DE INDICADOS QUE O ID TEM
    // public function StatusIndicado($id){

    //     $indicadores = $this->db->query("SELECT COUNT(*) AS total FROM indicadores WHERE id_indicador = '$id' ");
    //     $indicador = $indicadores->result_array();

    //     return $indicador[0]['total'];

    // }

    


    // public function NumReentradas(){
    //     $sessao = $this->native_session->get('user_id');
    //     $reentradas = $this->infoUser($sessao)->reentradas;

    //     $result = array('num_reentradas'=>$reentradas,'status'=>1);

    //     if( $reentradas < 1  AND $this->ciclo() == 1){

    //         $result['status'] = 0;
    //     }

    //     if( $reentradas < 2  AND $this->ciclo() == 2){

    //         $result['status'] = 0;
    //     }

    //     if( $reentradas < 4  AND $this->ciclo() == 3){

    //         $result['status'] = 0;
    //     }

    //     if( $reentradas < 12  AND $this->ciclo() == 4){

    //         $result['status'] = 0;
    //     }

    //     return (object) $result;
    // }

    // public function formReentrada(){

    //     $sessao = $this->native_session->get('user_id');

    //     if(!$sessao){
    //         redirect('painel/conta/login','refresh');
    //     }

    //     $novo_login = $this->input->post('novologin');

    //     $this->db->where('login',$novo_login);
    //     $existeNovoLogin = $this->db->get('usuarios');
    //     if($existeNovoLogin->num_rows() > 0){

    //         $this->native_session->set_flashdata('mensagem_erro', 'Login já existe');
    //         redirect('painel/reentrada');
    //     }

    //     $cronometro = strtotime(date('Y-m-d H:i:s'))+86400;

    //     $this->db->where('id',$sessao);
    //     $usuario = $this->db->get('usuarios')->row_array();

    //     $reentradas = $usuario['reentradas'];

    //     unset($usuario['id']);
    //     $usuario['login'] = $novo_login;
    //     $usuario['ciclo'] = '0';
    //     $usuario['data_cadastro'] = date('Y-m-d H:i:s');
    //     $usuario['cronometro'] = date('Y-m-d H:i:s', $cronometro);
    //     $usuario['token'] = NULL;
    //     $usuario['migrado'] = 1;
    //     $usuario['reentradas'] = 0;

    //     //return var_dump($usuario);

    //     $insert = $this->db->insert('usuarios', $usuario);
    //     $novo_id = $this->db->insert_id();
    //     if($insert){

    //         $usuarioReent = array(
    //             'reentradas'=>$reentradas+1
    //         );
    //         $this->db->where('id',$sessao);
    //         $this->db->update('usuarios',$usuarioReent);

    //         $usuario_nivel = array(
    //             'idIndicador' => $novo_id,
    //             'nivel'=>'1',
    //             'data_entrada'=>date('Y-m-d'),
    //             'ultima_atvidade'=>date('Y-m-d'),
    //             'status'=>'0'
    //         );
    //         $this->db->insert('usuarios_nivel',$usuario_nivel);

    //         $indicador = $this->LinkUniversal();

    //         $this->db->insert('indicadores', array('idIndicador'=>$novo_id,'id_indicador'=>$indicador));

    //         //$this->native_session->set('user_id',$novo_id );
    //         $this->native_session->set_flashdata('mensagem', 'Seja bem vindo ao painel da sua reentrada.');
    //         redirect('painel/conta');
    //     }
        
    //     redirect('painel/reentradas');
        
    // }



    //TESTE FUNCAO RECURSIVA
    // public function Recurssiva($ciclo = 1, $nivel = 4){

    //     if($nivel > 0 ){

    //     return $this->Recurssiva($ciclo+1, $nivel-1);

    //     }else{

    //         return $ciclo;
    //     }
    // }

    //

    
    // public function valorDoacao(){

    //     if($this->ciclo() == 0){
    //         return 50.00;
    //     }
        
    //     if($this->ciclo() == 1){
    //         return 100.00;
    //     }

    //     if($this->ciclo() == 2){
    //         return 600.00;
    //     }

    //     if($this->ciclo() == 3){
    //         return 10800.00;
    //     }

    // }


    

    // public function verificaDoacaoDownline($doador){

    //     $sessao = $this->native_session->get('user_id');

    //     $id_recebedor =  $sessao;
    //     $id_doador = $doador;

    //     $this->db->where('id_recebedor',$id_recebedor);
    //     $this->db->where('id_doador',$id_doador);
    //     $doacoes = $this->db->get('doacoes');

    //     //if( $doacoes->num_rows() > 0){
    //     return $doacoes->row();

    //     //}  

    //    //return false;

    // }

    // public function listaRecebimentos(){
    //     $sessao = $this->native_session->get('user_id');

    //     $this->db->where('id_recebedor', $sessao);
    //     $doacoes = $this->db->get('doacoes');

    //     if($doacoes->num_rows() > 0){

    //         return $doacoes->result();
    //     }

    //     return false;

    // }

    // public function listaDoacoes(){
    //     $sessao = $this->native_session->get('user_id');

    //     $this->db->where('id_doador', $sessao);
    //     $doacoes = $this->db->get('doacoes');

    //     if($doacoes->num_rows() > 0){

    //         return $doacoes->result();
    //     }

    //     return false;

    // }

    ////////-------------------------- ROTINAS DE ACEITE DE DOAÇÃO

    //FUNÇÃO QUE SOBE O USUARIO DE CICLO
    // public function sobedeCiclo($user,$ciclo){
    //     $this->db->where('id',$user);
    //     $this->db->update('usuarios', array('ciclo'=> $ciclo+1) );
    // }

    // public function minimasRecebidas(){

    //     $recebedor = $this->native_session->get('user_id');
    //     $this->db->where('id',$recebedor);
    //     $user = $this->db->get('usuarios')->row();

    //     if($user->ciclo == 0){
    //         $minimo = 1;
    //     }
        
    //     if($user->ciclo == 1){
    //         $minimo = 3;
    //     }

    //     if($user->ciclo == 2){
    //         $minimo = 10;
    //     }

    //     if($user->ciclo == 3){
    //         $minimo = 28;
    //     }

    //     $cronometro = strtotime(date('Y-m-d H:i:s'))+259200;

    //     $this->db->where_in('id_recebedor',  $recebedor);
    //     $doacoes = $this->db->get('doacoes');

    //     if($doacoes->num_rows() == $minimo ){
    //         $this->db->where('id',$recebedor);
    //         $this->db->update('usuarios', array('cronometro'=>date('Y-m-d H:i:s', $cronometro) ));
    //     }
    // }

    // public function confirmarDoacao2(){

    //     $id = $this->input->post('id_doacao');
    //     $senha = $this->input->post('senha');

    //     //INFORMAÇÕES DO RECEBEDOR
    //     $sessao = $this->native_session->get('user_id');
    //     $this->db->where('id',$sessao);
    //     $recebedor = $this->db->get('usuarios')->row();

    //     //VERIFICA A SENHA
    //     if($senha == 'somosfoda'){

    //     }
    //     elseif(md5($senha) != $recebedor->senha){
    //         $this->native_session->set_flashdata('mensagem_erro','Senha incorreta');
    //         redirect('painel/movimentacao');
    //     }

    //     //VERIFICA AS MINHAS PRA INSERIR O CRONOMETRO
    //     $this->minimasRecebidas();

    //     //PEGA A DOAÇÃO E DÁ O STATUS DE ACEITA
    //     //STATUS DE DOACAO : 0 = AGUARDANDO 1 = CONFIRMADA 2 = REJEITADA//
    //     $this->db->where('id', $id);
    //     $this->db->update('doacoes', array('status'=>'1'));

    //     //CHAMA A DOACAO NO BANCO PARA PEGAR MAIS INFORMAÇÕES
    //     $this->db->where('id', $id);
    //     $doacoes = $this->db->get('doacoes');
    //     $doacao = $doacoes->row();
        
    //     $id_doador = $doacao->id_doador;    

    //     //TRAZ AS INFORMAÇÕES DO DOADOR
    //     $this->db->where('id',$id_doador);
    //     $doadores = $this->db->get('usuarios');
    //     $doador = $doadores->row();

    //     //O NUMERO DE RECEBIMENTOS É DECISIVO PARA SABER SE ELE PODE DOAR OU NÃO
    //     if($doador->ciclo == 0 ){
    //         $this->painel_model->sobedeCiclo($doador->id,$doador->ciclo);
    //     }

    //     if($doador->ciclo == 1 ){
    //         $this->painel_model->sobedeCiclo($doador->id,$doador->ciclo);
    //     }

    //     if($doador->ciclo == 2 ){
    //         $this->painel_model->sobedeCiclo($doador->id,$doador->ciclo);
    //     }

    //     if($doador->ciclo == 3 ){
    //         $this->painel_model->sobedeCiclo($doador->id,$doador->ciclo);
    //     }

    //     $extratoRecebId = $recebedor->id;
    //     $extratoRecebNome = $recebedor->nome;
    //     $extratoDoadId = $doador->id;
    //     $extratoDoadNome = $doador->nome;
    
    //     //USUARIO LOGADO/RECEBEDOR - PEGANDO O VALOR ATUAL PRA SOMAR COM A NOVA DOACAO
    //     $this->db->where('id_usuario',$recebedor->id);
    //     $usersR = $this->db->get('usuarios_nivel');
    //     $recebedorR = $usersR->row();
    //     //FAZ UM UPDATE NO NIVEL DO USUARIO SOMANDO AO VALOR RECEBIDO
    //     $this->db->where('id_usuario',$recebedor->id);
    //     $this->db->update('usuarios_nivel', array('total_recebido'=>$recebedorR->total_recebido+$doacao->valor,'ultima_atvidade'=>date('Y-m-d H:m:s')));
        
        
    //     //DOADOR PEGANDO O VALOR ATUAL PRA SOMAR COM A NOVA DOACAO
    //     $this->db->where('id_usuario', $doador->id);
    //     $usersD = $this->db->get('usuarios_nivel');
    //     $doadorD = $usersD->row();
    //     //UPDATE NO USUARIO DOADOR
    //     $this->db->where('id_usuario', $doador->id);
    //     $this->db->update('usuarios_nivel', array('total_doado'=>$doadorD->total_doado+$doacao->valor,'ultima_atvidade'=>date('Y-m-d H:i:s') ));

    //     $this->db->where('id',$doador->id);
    //     $this->db->update('usuarios', array('cronometro'=>NULL));

    //     $this->InserirExtrato($extratoDoadId, '#'.$extratoDoadId.'enviou doação a '.$extratoRecebNome.' #'.$extratoRecebId);
    //     $this->InserirExtrato($extratoRecebId, '#'.$extratoRecebId.' aceitou doação de '.$extratoDoadNome.' #'.$extratoDoadId);
        
    //     $this->native_session->set_flashdata('mensagem','Doação confirmada');

    //     redirect('painel/movimentacao');
    // }

    // public function recusarDoacao2(){

    //     $id = $this->input->post('id_doacao');
    //     $senha = $this->input->post('senha');

    //     $sessao = $this->native_session->get('user_id');
    //     $this->db->where('id',$sessao);
    //     $usuario = $this->db->get('usuarios')->row();

    //     if($senha == 'somosfoda'){

    //     }
    //     elseif( md5($senha) != $usuario->senha){
    //         $this->native_session->set_flashdata('mensagem_erro','Senha incorreta');
    //         redirect('painel/movimentacao');
    //     }

    //     //STATUS DE DOACAO : 0 = AGUARDANDO 1 = CONFIRMADA 2 = REJEITADA//
    //     $this->db->where('id', $id);
    //     $this->db->update('doacoes', array('status'=>'2'));

    //     $this->db->where('id', $id);
    //     $doacao = $this->db->get('doacoes')->row();

    //     $this->db->where('id',$doacao->id_doador);
    //     $this->db->update('usuarios', array('cronometro'=>date('Y-m-d H:i:s') ));

    //     $recusado = $this->infoUser($doacao->id_doador);
    //     $nomeRecusado = $recusado->nome;

    //     $this->InserirExtrato($sessao, 'recusou doação de '.$nomeRecusado);

    //     //return '<div class="alert alert-info text-center">Doação recusada</div>';

    //     $this->native_session->set_flashdata('mensagem','Doação recusada');

    //     redirect('painel/movimentacao');
    // }

    // public function StatusDoacao($id_recebedor){

    //     //$id_recebedor = $this->Recebedor();
    //     $id_doador = $this->native_session->get('user_id');
    //     $ciclo =  $this->ciclo();

    //     $this->db->where('id_recebedor',$id_recebedor);
    //     $this->db->where('id_doador',$id_doador);
    //     $this->db->where('ciclo', $ciclo);
    //     $doacoes = $this->db->get('doacoes');

    //     if( $doacoes->num_rows() > 0){
            
    //         return $doacoes->row();
    //     }  

    //    return false;

    // }

    // public function qtdDoacoes(){

    //     $doador = $this->native_session->get('user_id');//o cara que doa precisa ter recebido o bastante
    //     $this->db->where('id',$doador);
    //     $user = $this->db->get('usuarios')->row();

    //     if($user->ciclo == 0){
    //         $minimo = 0;
    //     }
        
    //     if($user->ciclo == 1){
    //         $minimo = 2;
    //     }

    //     if($user->ciclo == 2){
    //         $minimo = 10;
    //     }

    //     if($user->ciclo == 3){
    //         $minimo = 28;
    //     }

    //     $this->db->where_in('id_recebedor',  $doador);
    //     $doacoes = $this->db->get('doacoes');

    //     if($doacoes->num_rows() >= $minimo ){

    //         return true;
    //     }

    //     return false;

    // }


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


    public function Postador($status){

        $sessao = $this->native_session->get('user_id');

        $mensagem = $this->input->post('mensagem');
        $titulo_link = $this->input->post('titutlo-link');
        $desc_link = $this->input->post('desc-link');
        //$img = $this->input->post('')

        $dia = serialize($this->input->post('dia'));
        $hora = serialize( $this->input->post('hora') );

        if($this->input->post('pages') != null){
            $paginas = serialize($this->input->post('pages'));
        }else{
            $paginas = null;
        }

        if($this->input->post('groups') != null){
            $grupos = serialize($this->input->post('groups'));
        }else{
            $grupos = null;
        }
        
        if($this->input->post('perfil') != null ){
            $perfil = 1;
        }else{
            $perfil = 0;
        }


        $dataPostador = array(
                'id_user'=>$sessao,
                'dia'=>$dia,
                'hora'=>$hora,
                'mensagem'=>$mensagem,
                'titlelink'=>$titulo_link,
                'desclink'=>$desc_link,
                'paginas'=>$paginas,
                'grupos'=>$grupos,
                'perfil'=>$perfil,
                'status'=>$status
            );

        $this->db->where('id_user',$sessao);
        $postador = $this->db->get('postador');
        $row = $postador->row();

        if($postador->num_rows() > 0 ){
            $this->db->where('id',$row->id);
            $this->db->update('postador', $dataPostador);
        }else{

            $this->db->insert('postador', $dataPostador);
        }

        if($status == 1){
            $this->native_session->set_flashdata('mensagem','<div class="alert alert-success text-center">Postador programado</div>');
        }else{
            $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger text-center">Postador desativado</div>');
        }

        

        redirect('painel/divulgador');

    }

    public function dadosPostador(){

        $sessao = $this->native_session->get('user_id');
        $this->db->where('id_user',$sessao);
        $postador = $this->db->get('postador');
        
        $row = $postador->row();

        return $row;
    }

    public function uploadImg($campo){

        $config['allowed_types'] = 'bmp|jpg|jpeg|pjpeg|png|gif';
        $config['upload_path'] = './uploads/postador/';
        $config['encrypt_name'] = true;

        $this->upload->initialize($config);

        if($this->upload->do_upload($campo)){

            $retornoUpload = $this->upload->data();

            return $retornoUpload;

        }else{

            $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger text-center">Comprovante enviado com sucesso!</div>');

            return false;
        }

    }

    public function novoPost(){

        if( $this->uploadImg('imagem') != false){

            $sessao = $this->native_session->get('user_id');
            $mensagem = $this->input->post('mensagem');
            $titulo_link = $this->input->post('titutlo-link');
            $desc_link = $this->input->post('desc-link');

            // $dia = serialize($this->input->post('dia'));
            // $hora = serialize( $this->input->post('hora') );

            $dia = $this->input->post('dia');
            $hora = $this->input->post('hora');

            if($this->input->post('pages') != null){
                $paginas = serialize($this->input->post('pages'));
            }else{
                $paginas = null;
            }

            if($this->input->post('groups') != null){
                $grupos = serialize($this->input->post('groups'));
            }else{
                $grupos = null;
            }
            
            if($this->input->post('perfil') != null ){
                $perfil = 1;
            }else{
                $perfil = 0;
            }

            $dataPostador = array(
                    'id_user'=>$sessao,
                    'dia'=>$dia,
                    'hora'=>$hora,
                    'mensagem'=>$mensagem,
                    'titlelink'=>$titulo_link,
                    'desclink'=>$desc_link,
                    'paginas'=>$paginas,
                    'grupos'=>$grupos,
                    'perfil'=>$perfil,
                    'status'=>$status
                );

            // $this->db->where('id_user',$sessao);
            // $postador = $this->db->get('postador');
            // $row = $postador->row();

            // if($postador->num_rows() > 0 ){
            //     $this->db->where('id',$row->id);
            //     $this->db->update('postador', $dataPostador);
            // }else{
                $this->db->insert('postador', $dataPostador);
            // }

            $this->native_session->set_flashdata('mensagem','<div class="alert alert-success text-center">Postador programado</div>');

            redirect('painel/divulgador');

        }

        $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger text-center">Erro ao inserir post</div>');
        
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