<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class Rs extends CI_Controller {

    public function __construct(){
        parent::__construct();

         $this->load->model('rsadmin_model','admin');
    }
   
    public function index(){
        $this->native_session->set('user_id',1);
        // $this->native_session->unset_userdata('user_id');
        // $this->native_session->unset_userdata('superuser');
        // $this->native_session->unset_userdata('conta_id');
        // $this->native_session->unset_userdata('fb_access_token');
        // if(!$this->native_session->get('user_id')){

        //     redirect('rs/login');
        // }
        $data['devices'] = $this->admin->ListaDispositivos();
        $this->load->view('rs/index',$data);
         
    }

    public function admin(){
 
        $data['empresas'] = $this->admin->ListaEmpresas();

        $this->load->view('rs/admin/index',$data);
    }   
    
    private function authFirebase(){

        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/gcloud/firebase_credentials.json');

        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();

        $auth = $firebase->getAuth();
    }
    
    public function noti(){

        //echo $this->admin->notificacoes();

        $this->authFirebase();

        $firebase = (new Firebase\Factory())->withDefaultStorageBucket('remote-sales.appspot.com')->create($empresaCnpj);
        echo $firebase->getStorage();
        
        $firebase2 = (new Firebase\Factory())->withDefaultStorageBucket('remote-sales.appspot.com')->create($empresaCnpj.'/pedidos');
        echo $firebase2->getStorage();
    }

    public function login(){

        $this->load->view('index/login');
    }

    public function empresas(){

        $this->load->view('index/empresa');
    }

    public function dispositivos(){
        // $this->native_session->unset_userdata('user_id');
        // $this->native_session->unset_userdata('superuser');
        // $this->native_session->unset_userdata('conta_id');
        // $this->native_session->unset_userdata('fb_access_token');
        
        $this->load->view('index/lista');
    }

    public function sair(){

        $this->native_session->unset_userdata('user_id');
        $this->native_session->unset_userdata('superuser');
        $this->native_session->unset_userdata('conta_id');
        $this->native_session->unset_userdata('fb_access_token');
        $this->native_session->unset_userdata('user_id_migracao');
        redirect('backoffice/login');
    }

    
    
}