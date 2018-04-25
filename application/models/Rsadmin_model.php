<?php


class Rsadmin_model extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->helper('data');
    }

    public function Login(){

        ///$login = $this->input->post('admin');
        $senha = $this->input->post('adminSenha');

        //$this->db->where('login', $login);
        $this->db->where('adminSenha', md5($senha));
        $login = $this->db->get('admin');

        if($login->num_rows() > 0){

            $this->native_session->set('admin_id', $login->row()->id);

            redirect('rsadmin');
        }

        return 'Usuario ou senha inválidos';
    }

    public function user($coluna){

        $sessao = $this->native_session->get('user_id_admin');

        $this->db->where('id', $sessao);
        $adm = $this->db->get('admin_login');

        $row = $adm->row();

        return $row->$coluna;
    }

    public function homologa($empresaId){

        $deviceId = $this->input->post('deviceId');
        
        $this->db->where('deviceId',$deviceId);
        $disp = $this->db->get('dispositivos');

        if($disp->num_rows() > 0){

            if($disp->row()->dispStatus == 1 ){

                return array('result'=>TRUE, 'message'=>'Dispositivo já cadastrado');
            }

            if($disp->row()->dispStatus == 0 ){
                return array('result'=>FALSE, 'message'=>'Aguardando liberação');
            }
            

        }else{

            $save = $this->db->insert('dispositivos',
                array(
                    'dispDeviceId'=>$deviceId,
                    'empresaId'=>$empresaId,
                    'dispStatus'=>0
                )
            );

            if($save){
                return array('result'=>TRUE, 'message'=>'Homologacao solicitada'); 
            }else{
                return array('result'=>TRUE, 'message'=>'Erro na homologacao');
            }
        }

    }

    public function getEmpresa($empresaCnpj){
        $this->db->where('empresaCnpj', $this->input->get('empresaCnpj') );
        $res = $this->db->get('empresas');

        if($res->num_rows() > 0 ){
            return $res->row();
        }

        return false;
    }

    public function ListaEmpresas(){

        $result = $this->db->get('empresas');

        if($result->num_rows() > 0 ){
            return $result->result();
        }
        return false;
    }

    public function AddEmpresa(){

        $rs = $this->db->insert('empresa', 
            array(
                'empresaCnpj'=>$this->input->post('empresaCnpj')
            )
        );

        if($rs){

            //add buckets no google storage
            
            return true;
        }
        return false;
    }

    private function authFirebase(){

        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/gcloud/firebase_credentials.json');

        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();

        $auth = $firebase->getAuth();
    }

    public function AddBuckets($empresaCnpj){

        $this->authFirebase();

        $firebase = (new Firebase\Factory())->withDefaultStorageBucket('remote-sales.appspot.com')->create($empresaCnpj);
        $firebase->getStorage();
        
        $firebase2 = (new Firebase\Factory())->withDefaultStorageBucket('remote-sales.appspot.com')->create($empresaCnpj.'/pedidos');
        $firebase2->getStorage();
    }

    public function ListaDispositivos(){

        $sessao = $this->native_session->get('user_id');

        $this->db->where('empresaId',$sessao);
        $result = $this->db->get('dispositivos');

        if($result->num_rows() > 0 ){

            return $result->result();
        }

        return false;
    }

    public function notificacoes(){

        $arrayToSend = array(
            'to' => 'ffG6bMNQBfk:APA91bG6zgeC5TgPrKK5Lax1Nyo4wzRf0uWP024kEb9z6GfiuMvmzt9F1ORwyCXbLrG_TlhXkHK72mQwe4s6HrsoCuIS6lXkrRYr2y3lwLHDdbni9KnU29DhH4kV5388eXl-DfMI_pfT',
            'data' => array(
                'title'=>'Mensage teste',
                'message'=>'Texto da mensagem'
            ),
            'priority'=>'high',
            'sound'=>true
        );

        $data = json_encode($arrayToSend);
        //FCM API end-point
        $url = 'https://fcm.googleapis.com/fcm/send';
        //api_key in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
        $server_key = 'AAAAqyJULW8:APA91bEIHG6iEgTa_QApPC37PVzweRD7Hl-yLPvfCbwt5AlSrsIaAUlsltbg9RqhAb--tfv795qJRcTT9kZV3WJCz24_bd1tizJJMbRq2rCMUI30ICzNTA3FAsUG1K66-JxHfRQi9YlA';
        //header with content_type api key
        $headers = array(
            'Content-Type:application/json',
            'Authorization:key='.$server_key
        );
        //CURL request to route notification to FCM connection server (provided by Google)
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Oops! FCM Send Error: ' . curl_error($ch));
        }else{
            return true;
        }
        curl_close($ch);
    }

    public function BlockDispositivo($dispositivoId){

        $this->db->where('dispositivoId',$dispositivoId);
        $result = $this->db->update('dispositivos',
            array(
                'dispositivoStatus'=>3
            )    
        );

        if($result){
            return 'Disposivito bloqueado';
        }

        return false;
    }

    public function LiberaDispositivo($dispositivoId){

        $this->db->where('dispositivoId',$dispositivoId);
        $result = $this->db->update('dispositivos',
            array(
                'dispositivoStatus'=>1
            )    
        );

        if($result){
            return 'Disposivito bloqueado';
        }

        return false;
    }

    public function uploadFile($tabela){
        
        $config['upload_path'] = './temp/';
        $config['allowed_types'] = 'csv';

        $this->load->library('upload');
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('baseFile')){
            
            $error = array('error' => $this->upload->display_errors());
            return $error;
        }
        else
        {  

            $data = $this->upload->data();
            $return = $this->CsvToJson( $data['full_path'],$tabela);

            return $return;
            if($return){
                return true;
            }else{
                return false;
            }

        }
    }

    public function CsvToJson($file_path,$filename){

        $filepath = $file_path;
        $lines = file($filepath);

        $headers = array();
        $dataObjects = array();

        foreach ($lines as $index => $line)
        {
            if ($index === 0){

                $headers = (array) str_getcsv($line,';');
            }
            else
            {
                $data = (array) str_getcsv($line,';');
                $obj = new stdClass();

                foreach ($headers as $index => $header){
                   
                    $obj->$header = $data[$index];
                }
                $dataObjects[] = $obj;
            }
        }

        $dir = './base/'.$this->input->get('empresaCnpj');
        
        if(!file_exists($dir)){
            mkdir($dir);
            fopen($dir.'/index.html', 'w');
        }

        $fp = fopen($dir.'/'.$filename.'.json', 'w');
        $write = fwrite($fp, json_encode($dataObjects));
        fclose($fp);
        
        if($write){

            $this->db->where('empresaCnpj',$this->input->get('empresaCnpj'));
            $this->db->update('empresas', array($filename=>1));
            return true;
        }else{
            return false;
        }
    }
}