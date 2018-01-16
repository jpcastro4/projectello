<?php

function QuantidadeNotificacao(){

    $_this =& get_instance();

    $sessao = $_this->native_session->get('user_id');

    $_this->db->where('visto', 0);
    $_this->db->where('id_user', $sessao);
    $notificacoes = $_this->db->get('notificacoes');

    return $notificacoes->num_rows();
}

function Notificacoes(){

    $_this =& get_instance();

    $sessao = $_this->native_session->get('user_id');

    $_this->db->order_by('data', 'DESC');
    $_this->db->limit(15);
    $_this->db->where('id_user', $sessao);

    $notificacao = $_this->db->get('notificacoes');

    if($notificacao->num_rows() > 0){

        return $notificacao->result();
    }

    return false;
}
?>