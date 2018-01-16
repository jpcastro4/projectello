<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('cron_model');
    }

    public function postador(){
        $this->cron_model->postador();
    }

    public function automacao(){
        $this->cron_model->automacao();
    }

    public function verificaCicloZero(){  
        $this->cron_model->verificaCicloZero();
    }

    public function PendentesBlackList(){
        $this->cron_model->PendentesBlackList();
    }

    public function PendentesRedList(){
        $this->cron_model->PendentesRedList();
    }
    public function verificaCiclados(){
        $this->cron_model->minimasRecebidas();
    }
    public function testeAutoCron(){
        $this->email->to( 'jpcastro4@gmail.com');
            $this->email->from('suporte@redeads50.com', 'Painel Rede ADS50');
            $this->email->set_mailtype('html');
            $this->email->subject('Auto Cron');
            $this->email->message('Tudo funcionando'. date('d/m/Y H:i:s') );

            $envia = $this->email->send();
    }

    public function smtpVerification(){
        $this->cron_model->smtpVerification();
    }
    
}