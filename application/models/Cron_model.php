<?php
class Cron_model extends CI_Model{

    public function __construct(){
        parent::__construct();

        $this->load->helper('valor');
        $this->load->library('email');
        $this->load->model('admin_model');
    }

    public function userSocial($id){

        $this->db->where_in('id_user', $id);
        $user = $this->db->get('usuarios_token_redes');

        return $user->row();

    }

    // public function postador(){
           // $this->load->library('facebook');
    //      $dia = date('w');
    //      $hora = date('H:m');

    //      $this->db->where('status',1);
    //      $postador = $this->db->get('postador');
    //      $row = $postador->row();

    //      if($postador->num_rows() > 0 ){

    //         foreach($postador->result() as $post ){

    //             //if( in_array($dia, unserialize( $row->dia) ) ){ //in_array($hora, unserialize($row->hora) ) && 

    //                 if( $post->perfil == 1){ //se o perfil está ativo ou não. Exemplo: se ele pagou ou não.

    //                     $params = array(
    //                         'access_token'=>$this->userSocial($post->id_user)->token_long,
    //                         'message' => $post->mensagem,
    //                         'link' => base_url('linkunico/amigo/gustavog'),
    //                         'picture'=> base_url('uploads/padrao-post.jpg'),
    //                         'name'=> $post->titlelink,
    //                         'caption'=>base_url(),
    //                         'description'=>$post->desclink,
    //                     );

    //                     $user = $this->facebook->request('POST', '/'.$this->userSocial($post->id_user)->id_facebook.'/feed',$params );
    //                     // echo '<pre>';
    //                     // echo var_dump($user);
    //                     // echo '</pre>';
    //                 }

    //                 if( $post->paginas == null){

    //                     foreach(unserialize($post->paginas) as $pagina){

    //                         //echo $pagina;

    //                         $tokenPage = $this->facebook->request('GET', '/'.$pagina.'?fields=access_token', $this->userSocial($post->id_user)->token_long);

    //                         var_dump($tokenPage);

    //                         $params = array(
    //                             'message' => $row->mensagem,
    //                             'link' => base_url('linkunico/amigo/gustavog'),
    //                             'picture'=> base_url('uploads/padrao-post.jpg'),
    //                             'name'=> $row->titlelink,
    //                             'caption'=>base_url(),
    //                             'description'=>$row->desclink,
    //                             'access_token'=>$tokenPage['access_token'],
    //                         );

    //                         $postPage = $this->facebook->request('post', '/'.$pagina.'/feed',$params );
    //                         // echo '<pre>';
    //                         // echo var_dump($postPage );
    //                         // echo '</pre>';
                           
    //                     }                        
    //                 }

    //                 if($post->grupos != null){

    //                     foreach(unserialize($post->grupos) as $grupo){

    //                         $params = array(
    //                             'message' => $post->mensagem,
    //                             'link' => base_url('linkunico/amigo/gustavog'),
    //                             'picture'=> base_url('uploads/padrao-post.jpg'),
    //                             'name'=> $post->titlelink,
    //                             'caption'=>base_url(),
    //                             'description'=>$post->desclink,
    //                             'access_token'=>$this->userSocial($post->id_user)->token_long,
    //                         );

    //                         $postGroup = $this->facebook->request('post', '/'.$grupo.'/feed',$params );
    //                         // echo '<pre>';
    //                         // echo var_dump($postGroup );
    //                         // echo '</pre>';
    //                     } 

    //                 }
    //             //}
    //         }
    //     }
    // }

    

    public function smtpVerification(){

        require_once('smtp-validate-email.php');

        $from = 'suporte@redeads50.com'; // for SMTP FROM:<> command
        $emails = 'sabino@greccolog.com';

        $validator = new SMTP_Validate_Email($emails, $from);
        $smtp_results = $validator->validate();

        // or passing to the validate() method
        // $validator = new SMTP_Validate_Email();
        // $smtp_results = $validator->validate($emails, $from);
        echo '<pre>';
        var_dump($smtp_results);
        echo '</pre>';

    }

    public function userSuporteMail(){

        $config['protocol'] ='smtp';
        $config['smtp_host'] = 'srv30.prodns.com.br';
        $config['smtp_user'] = 'suporte@redeads50.com';
        $config['smtp_pass'] = 'ads502016';
        $config['smtp_port'] = '465';
        $config['smtp_crypto'] = 'ssl';
        $config['mailtype'] = 'html';

        return $this->email->initialize($config);

    }

    public function automacao(){

    	$ciclo = array();
    	$block = array();

        $this->db->where('status',0);
        $automacao = $this->db->get('automacao');

        if($automacao->num_rows() > 0){

            foreach ($automacao->result() as $email) {

                $segm = unserialize($email->filtros);

                // echo '<pre>';
                // echo var_dump($segm) ;
                // echo '</pre>';

                foreach ($segm as $value) {
                  
                	list($val1,$val2) = explode('-', $value);

                	if($val1 == 'todos'){

                	}

                	if($val1 == 'ciclo'){

                		$ciclo[] = $val2;
                	}

                	if($val1 == 'block'){

                		$block[] = $val2;
                	}
                }

                if( !empty($ciclo) ){

                	$this->db->where_in('ciclo', $ciclo );
                }

                if( !empty($block) ){

                	$this->db->where_in('block', $block );
                }

                //$this->db->where("lider",1);
                $usuarios = $this->db->get('usuarios');

                set_time_limit(0);

                $count=0;

                foreach ($usuarios->result() as $usuario){
                    $count++;
                                        
                    $data['user'] = $usuario;
                    $data['email'] = $email;//corpo do email

                    $body = $this->load->view('email/geral',$data,TRUE);

                    $config['protocol'] ='smtp';
                    $config['smtp_host'] = 'srv30.prodns.com.br';
                    $config['smtp_user'] = 'cadastro@nowx.club';
                    $config['smtp_pass'] = 'somosfoda';
                    $config['smtp_port'] = '465';
                    $config['smtp_crypto'] = 'ssl';
                    $config['mailtype'] = 'html';

                    $this->email->initialize($config);

                    $this->email->to( $usuario->email );
                    $this->email->from('suporte@redeads50.com', 'Suporte Ads');
                    $this->email->subject( $email->assunto );
                    $this->email->set_alt_message($body);
                    $this->email->message($body);

                    $envia = $this->email->send();

                    //echo $count.' - '.$usuario->nome.' > '.$usuario->email.' > '.$usuario->login.' > '.$usuario->ciclo.' > Envio: '. $envia .'<br><br>';
                    
                    //echo $count.' - '.$usuario->nome.'<br><br>';

                    if( ($count%10) == 0)
                    {
                        sleep(5);

                        //echo $count.'<br><br>';
                    }

                }

                echo $count.' - enviados';
                $this->db->where('id',$email->id);
                $this->db->update('automacao', array('log'=>date('Y-m-d H:i:s'),'status'=>1 ) );
               
            }
        }
    }

    //VERIFICACAO TEMPORÁRIA PARA INSERÇÃO DO CRONOMETRO NOS USUARIOS CICLO 0 DESBLOQUEADOS
    public function verificaCicloZero(){

        //VERIFICA SE O USUARIO ESTÁ NO CICLO 0 E SE NAO ESTA BLOQUEADO
        $this->db->where('ciclo',0);
        $this->db->where('block',0);
        $users = $this->db->get('usuarios');

        //TRAZ OS USUARIOS NA CONDIÇÃO
        $i = 0;
        foreach($users->result() as $user): //LISTA CADA UM

            if(!$this->verificaDoacao($user->id)){ //VERIRICA SE ATENTE

                $this->db->where('id',$user->id);
                $this->db->update('usuarios', array('cronometro'=>date('Y-m-d H:i:s'))); //INSERE O CRONOMETRO

                echo $user->id.' - '.$user->nome.' - '.$user->data_cadastro.'<br><br>';

                $i++;
            }

        endforeach;

        echo 'Total'. $i;
    }

    //VERIFICAÇÃO TEMPORARIA DE QUEM ESTÁ NOS CICLOS RECEBERAM DOAÇÕES SUFICIENTES E NÃO DOARAM ACIMA
    public function minimasRecebidas(){

        $this->db->where_in('lider',0);
        $this->db->where_in('block',0);
        $users = $this->db->get('usuarios');

        $i = 0;
        foreach($users->result() as $user):
           
            if($user->ciclo == 1){
                $minimo = 2;
            }

            if($user->ciclo == 2){
                $minimo = 10;
            }

            if($user->ciclo == 3){
                $minimo = 28;
            }

            $cronometro = strtotime(date('Y-m-d H:i:s'))+259200;

            $this->db->where('status',1);
            $this->db->where_in('id_recebedor', $user->id);
            $doacoes = $this->db->get('doacoes');

            if($doacoes->num_rows() == $minimo ){

                $this->db->where('id',$user->id);
                $this->db->update('usuarios', array('cronometro'=>date('Y-m-d H:i:s', $cronometro)));
                $i++;

                echo $user->id.' - '.$user->nome.'<br>';
            }

        endforeach;

        echo '<br><br>Total:'. $i;
    }


    //////// ------------------------------------------------------------------------ ROTINAS DE CONDENAÇÃO

    /* 
    CARA DOADOR FAZ APENAS UMA DOACAO ACIMA A CADA CICLO. 
    NAS DOACOES EXISTE UM CAMPO QUE GUARDA O CICLO EM QUE USUARIO FEZ A DOACAO. 
    O STATUS DA DOACAO DEFINE SE O BLOQUEIO ACONTECE OU NAO.*/
    // public function minimasRecebidas(){

    //     $this->db->where_in('lider',0)
    //     $users = $this->db->get('usuarios');

    //     foreach($users->result() as $user):
           
    //         if($user->ciclo == 1){
    //             $minimo = 2;
    //         }

    //         if($user->ciclo == 2){
    //             $minimo = 10;
    //         }

    //         if($user->ciclo == 3){
    //             $minimo = 28;
    //         }

    //         $this->db->where('status',1);
    //         $this->db->where_in('id_recebedor',  $user->id);
    //         $doacoes = $this->db->get('doacoes');

    //         if($doacoes->num_rows() == $minimo ){

    //             //ao completar o minimo de recebidas o sistema dá entrada automatica na doação acima inserindo a data e hora para inicio do cronometro. 
    //             //Aqui vamos verificar se a doação existe e se o 

    //             $this->db->where('ciclo',$user->ciclo);
    //             $this->db->where_in('id_doador',  $user->id);
    //             $doacao = $this->db->get('doacoes')->row();

    //             $agora = strtotime(date('Y-m-d H:i'));
    //             $vencida = strotime($doacao->data_envio);

    //             if( )
    //             if($doacao->status == 0){ //FALTA VERIFICACAO DE CRITERIO PARA BLOQUEIO NA HORA CERTA
    //                 if($doacao->comprovante == null){
    //                     $this->redList($user->id);
    //                 }
    //             }
    //         }

    //     endforeach;
    // }
    
    //  VERIFICAÇÃO SE HÁ DOAÇÃO
    public function verificaDoacao($id){
        
        $this->db->where_in('id_doador',$id);
        $this->db->where_in('status', array(0,1));
        $doacoes = $this->db->get('doacoes');

        if($doacoes->num_rows() > 0 ){
            return true;
        }
        return false;
    }


    //PENDENTES CADASTRADOS OCUPANDO VAGA E NÃO SE ATIVARAM A MAIS DE 24H - RED LIST - SOMENTE BLOQUEIO
    public function PendentesRedList(){

        $umDia = 86400;
        $doisDias = 172800;
        $tresDias = 259200;

        //$hojeMenos = strtotime(date('Y-m-d h:i')) - $tresDias;

        $this->db->where('ciclo',0);
        $this->db->where('block',0);
        $pendentes = $this->db->get('usuarios');

        if($pendentes->num_rows() > 0){

            $i = 0;

            foreach($pendentes->result() as $pendente){

                $dataDeCadastro = $pendente->data_cadastro;

                $diff = strtotime(date('Y-m-d H:i')) - strtotime($dataDeCadastro);

                if( $diff > $umDia){

                    if(!$this->verificaDoacao($pendente->id)){
                        
                        $this->redList($pendente->id);
                        echo $pendente->id.' - '.$pendente->nome.'-'.$dataDeCadastro.'-'.$pendente->block.'</br>';

                        $i++;
                    }
                } 
            }

            echo 'Total: '.$pendentes->num_rows().'</br></br>';
        }
    }

    //BLOQUEIA 
    public function redList($id){

        $this->db->where('id',$id);
        $this->db->update('usuarios', array('block'=> 1));

        $this->painel_model->InserirExtrato($id, 'Foi bloqueado' , 'redlist');
    }



    public function verificaIndicador($id){

        $this->db->where_in('id_usuario', $id);
        $indicador = $this->db->get('indicadores');
        $row = $indicador->row();

        if( isset($row->id_indicador) != 0 ){
            
            return $row->id_indicador;
        }
        return false;
    }
    
    //PENDENTES QUE ESTÃO A DIAS CADASTRADOS OCUPANDO VAGA E NÃO SE ATIVARAM
    public function PendentesBlackList(){

        $Umdia = 86400;
        $doisDias = 172800;
        $tresDias = 259200;

        $this->db->where('ciclo',0);
        $this->db->where('block',1);
        $pendentes = $this->db->get('usuarios');

        if($pendentes->num_rows() > 0){

            $i = 0;
            foreach($pendentes->result() as $pendente){

                $dataDeCadastro = $pendente->data_cadastro;

                $diff = strtotime(date('Y-m-d H:i')) - strtotime($dataDeCadastro);

                if( $diff > $doisDias){

                    if(!$this->verificaDoacao($pendente->id)){

                        if($this->verificaIndicador($pendente->id) ){
                            $this->blackList($pendente->id);
                            echo $pendente->id.' - '.$pendente->nome.'-'.$dataDeCadastro.'-'.$pendente->block. ' - '. $this->verificaIndicador($pendente->id) .'</br>';
                            $i++;
                        }
                        
                    }
                } 

            }

            echo 'Total: '.$i.'</br></br>';
        }
    }

    
    //BLOQUEIA E TIRA POSIÇÃO
    public function blackList($id){

        $this->db->where('id',$id);
        $this->db->update('usuarios', array('block'=> 1));

        $this->db->where('id_usuario',$id);
        $this->db->update('indicadores', array('id_indicador' => 0, ) );

        $this->painel_model->InserirExtrato($id, 'Foi bloqueado e perdeu posicao' , 'blacklist');
    }




    //---------------------------------------------------------------------------------------------------------------------------

    
}