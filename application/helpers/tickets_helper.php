<?php

function StatusUser($id){

    $status = array(0=>'Aguardando Resposta', 1=>'Respondido', 2=>'Fechado', 3=>'Re-aberto');

    return $status[$id];
}

function StatusUserAdmin($id){

    $status = array(0=>'Esperando sua Resposta', 1=>'Esperando interação do usuário', 2=>'Fechado', 3=>'Re-aberto');

    return $status[$id];
}
?>