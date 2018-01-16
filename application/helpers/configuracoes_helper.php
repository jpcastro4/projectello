<?php

function check_manutencao(){
    //date_default_timezone_set('America/Sao_Paulo');

    $_this =& get_instance();

    // if( $_this->native_session->get('conta_id') < 1 ){
    //     if(  strtotime(date('2016-11-16 22:30:00') ) < strtotime('now') AND  strtotime(date('2016-11-17 01:30:00') ) > strtotime('now') ){
    //         $_this->native_session->unset_userdata('user_id');
    //         $_this->native_session->unset_userdata('superuser');
    //         $_this->native_session->unset_userdata('conta_id');
    //         $_this->native_session->unset_userdata('fb_access_token');

    //         redirect('manutencao');
    //     }
    // }

    if( config_site('manutencao') == 1 ){
        
            $_this->native_session->unset_userdata('user_id');
            $_this->native_session->unset_userdata('superuser');
            $_this->native_session->unset_userdata('conta_id');
            $_this->native_session->unset_userdata('fb_access_token');

            redirect('manutencao');
    }  

}

function check_session(){

    $_this =& get_instance();

    if(!$_this->native_session->get('conta_id')){

        redirect('backoffice/login');
    }
}

function check_session_afiliado(){

    $_this =& get_instance();

    if(!$_this->native_session->get('afiliado_id')){

        //echo '<script type="text/javascript"> alert("Faça o login como afiliado"); </script>';

        redirect('afiliado/login');
    }

    return true;
}

function check_session_admin(){

    $_this =& get_instance();

    if(!$_this->native_session->get('user_id_admin')){

        echo '<script type="text/javascript"> alert("Faça o login como administrador"); </script>';

        redirect('boadmin/login');
    }

    return true;
}

function config_site($coluna){

    $_this =& get_instance();

    $_this->db->limit(1);
    $configuracao = $_this->db->get('website_config');

    $row = $configuracao->row();

    return $row->$coluna;
}

function config_nivel($nivel,$coluna){

    $_this =& get_instance();

    $_this->db->where('nivel', $nivel);
    $configNivel = $_this->db->get('admin_niveis');

    $row = $configNivel->row();

    return $row->$coluna;
}

function valorFormat($valor){

    return preg_replace("/\./", ",", $valor ); 
}

function limitarTexto($texto, $limite){
  $contador = strlen($texto);
  if ( $contador >= $limite ) {      
      $texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...';
      return $texto;
  }
  else{
    return $texto;
  }
}

?>