<!-- BEGIN PAGE CONTENT -->
<?php
 $s_n =array(0=>'Não', 1=>'Sim');
?>
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="<?php echo base_url('backoffice/geadmin');?>">Home</a><i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?php echo base_url('backoffice/geadmin/configuracoes');?>">Configurações</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Editar configurações
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE CONTENT INNER -->

            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal form-row-seperated" action="" method="post" enctype="multipart/form-data">
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-pencil font-green-sharp"></i>
                                    <span class="caption-subject font-green-sharp bold uppercase">
                                    Editar configurações do site</span>
                                </div>
                                <div class="actions btn-set">
                                    <input type="submit" name="submit" class="btn green-haze btn-circle" value="Salvar configurações">

                                </div>
                            </div>

                            <?php if(isset($message)) echo $message; ?>

                            <div class="portlet-body">
                                <div class="tabbable">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_geral" data-toggle="tab">
                                            Informações básicas </a>
                                        </li>
                                        <li>
                                            <a href="#tab_email" data-toggle="tab">
                                            Email </a>
                                        </li>
                                        <li>
                                            <a href="#tab_financeiro" data-toggle="tab">
                                            Financeiro
                                             </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content no-space">
                                        <div class="tab-pane active" id="tab_geral">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Nome dos site
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="nome_site" value="<?php echo $config->nome_site;?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Logo tela de login <br /><small>(104x17)</small>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="file" class="form-control" name="logo_login">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Logo Backoffice <br /><small>(94x14)</small>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="file" class="form-control" name="logo_backoffice">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Logo Admin <br /><small>(104x17)</small>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="file" class="form-control" name="logo_admin">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Favicon <br /><small>(16x16)</small>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="file" class="form-control" name="favicon">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_email">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Remetente de emails:
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="email_remetente" class="form-control" value="<?php echo $config->email_remetente;?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_financeiro">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Ativar Anúncios no site</small>
                                                    </label>
                                                    <div class="col-md-10">
                                                    <select name="permitir_cadastro_anuncio" autocomplete="off" class="form-control">
                                                        <?php

                                                        foreach($s_n as $keyOpc=>$valOpc){

                                                            $selected = ($keyOpc == $config->permitir_cadastro_anuncio) ? 'selected' : '';

                                                            echo '<option value="'.$keyOpc.'" '.$selected.'> '.$valOpc.'</option>';
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Bônus de atividade para o indicador <a href="javascript:void(0);" class="label label-danger img-rounded tooltips" data-container="body" data-placement="bottom" data-html="true" data-original-title="Caso o usuário indicou outro usuário e esse usuário (indicado) comprou alguma cota, então esse indicador ganhará o valor informado aqui direto em seu backoffice."><i class="fa fa-question"></i></a><br /><small>(deixe 0.00 para não pagar)</small>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="valor_indicacao" class="form-control" value="<?php echo $config->valor_indicacao;?>">                                                    </div>
                                                </div>

                                               <div class="form-group">
                                                    <label class="col-md-2 control-label">Valor de cada cota
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="valor_cota" class="form-control" value="<?php echo $config->valor_cota;?>">                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Número máximo de compra de cotas
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="maximo_cotas" value="<?php echo $config->maximo_cotas;?>" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Validade das cotas <br /> <small>(em dias)</small>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="validade_cotas" value="<?php echo $config->validade_cotas;?>" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Permitir transferência entre membros
                                                    </label>
                                                    <div class="col-md-10">
                                                    <select name="permitir_transferencia_membros" autocomplete="off" class="form-control">
                                                        <?php

                                                        foreach($s_n as $keyOpc=>$valOpc){

                                                            $selected = ($keyOpc == $config->permitir_transferencia_membros) ? 'selected' : '';

                                                            echo '<option value="'.$keyOpc.'" '.$selected.'> '.$valOpc.'</option>';
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Valor mínimo de transferência
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="valor_minimo_transferencia" class="form-control" value="<?php echo $config->valor_minimo_transferencia;?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Permitir pagamento com saldo
                                                    </label>
                                                    <div class="col-md-10">
                                                    <select name="pagar_com_saldo" autocomplete="off" class="form-control">
                                                        <?php

                                                        foreach($s_n as $keyOpc=>$valOpc){

                                                            $selected = ($keyOpc == $config->pagar_com_saldo) ? 'selected' : '';

                                                            echo '<option value="'.$keyOpc.'" '.$selected.'> '.$valOpc.'</option>';
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Taxa de pagamento com saldo <br /> <small>(deixe 0.00 para não cobrar)</small>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="taxa_pagamento_saldo" class="form-control" value="<?php echo $config->taxa_pagamento_saldo;?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Habilitar Saque
                                                    </label>
                                                    <div class="col-md-10">
                                                    <select name="saque_disponivel" class="form-control" autocomplete="off">
                                                        <?php

                                                        foreach($s_n as $keyOpc=>$valOpc){

                                                            $selected = ($keyOpc == $config->saque_disponivel) ? 'selected' : '';

                                                            echo '<option value="'.$keyOpc.'" '.$selected.'> '.$valOpc.'</option>';
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Valor mínimo para saque
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="valor_minimo_saque" class="form-control" value="<?php echo $config->valor_minimo_saque;?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Dias para enviar o saque <a href="javascript:void(0);" class="label label-danger img-rounded tooltips" data-container="body" data-placement="bottom" data-html="true" data-original-title="Isso serve só para exibir na mensagem que o usuário vê ao solicitar um saque."><i class="fa fa-question"></i></a>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="dias_saque" class="form-control" value="<?php echo $config->dias_saque;?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Taxa do Saque <br /> <small>(em porcentagem, sem o simbolo %)</small>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="taxa_saque" class="form-control" value="<?php echo $config->taxa_saque;?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Pagar cotas automaticamente <a href="javascript:void(0);" class="label label-danger img-rounded tooltips" data-container="body" data-placement="bottom" data-html="true" data-original-title="Ao deixar NÃO, as cotas diárias não serão pagas automaticamente pelo sistema. Você terá que inserir diretamente pelo banco de dados ou um outro sistema secundário."><i class="fa fa-question"></i></a>
                                                    </label>
                                                    <div class="col-md-10">
                                                    <select name="pagamento_automatico" class="form-control" autocomplete="off">
                                                        <?php

                                                        foreach($s_n as $keyOpc=>$valOpc){

                                                            $selected = ($keyOpc == $config->pagamento_automatico) ? 'selected' : '';

                                                            echo '<option value="'.$keyOpc.'" '.$selected.'> '.$valOpc.'</option>';
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Próxima execução do CRON <a href="javascript:void(0);" class="label label-danger img-rounded tooltips" data-container="body" data-placement="bottom" data-html="true" data-original-title="Configure aqui a próxima execução do CRON. Ele é responsável por executar a função de pagamento das cotas. Nessa data será o próximo pagamento de cotas. Essa data também é alterado automáticamente pelo sistema após pagar a cota nessa data."><i class="fa fa-question"></i></a>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="datacron" name="proxima_execucao" class="form-control" value="<?php echo date('d/m/Y', $cron->proxima_execucao);?>">                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Hora do pagamento
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="hora_pagamento" id="hora" class="form-control" value="<?php echo $config->hora_pagamento;?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Valor mínimo a ser pago
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text"  name="valor_minimo_pago" id="d/d1" class="form-control" value="<?php echo $config->valor_minimo_pago;?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Valor máximo a ser pago
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text"  name="valor_maximo_pago" id="/dd2" class="form-control" value="<?php echo $config->valor_maximo_pago;?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Pagar fim de semana
                                                    </label>
                                                    <div class="col-md-10">
                                                    <select name="paga_fim_de_semana" class="form-control" autocomplete="off">
                                                        <?php

                                                        foreach($s_n as $keyOpc=>$valOpc){

                                                            $selected = ($keyOpc == $config->paga_fim_de_semana) ? 'selected' : '';

                                                            echo '<option value="'.$keyOpc.'" '.$selected.'> '.$valOpc.'</option>';
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Gerar fatura de renovação automaticamente
                                                    </label>
                                                    <div class="col-md-10">
                                                    <select name="permitir_renovacao_automatica" class="form-control" autocomplete="off">
                                                        <?php

                                                        foreach($s_n as $keyOpc=>$valOpc){

                                                            $selected = ($keyOpc == $config->permitir_renovacao_automatica) ? 'selected' : '';

                                                            echo '<option value="'.$keyOpc.'" '.$selected.'> '.$valOpc.'</option>';
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Ativar Gerencia Net ?
                                                    </label>
                                                    <div class="col-md-10">
                                                    <select name="ativa_gerencianet" class="form-control" autocomplete="off">
                                                        <?php

                                                        foreach($s_n as $keyOpc=>$valOpc){

                                                            $selected = ($keyOpc == $config->ativa_gerencianet) ? 'selected' : '';

                                                            echo '<option value="'.$keyOpc.'" '.$selected.'> '.$valOpc.'</option>';
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Token Gerencia Net
                                                    </label>
                                                    <div class="col-md-10">
                                                    <input type="text" class="form-control" name="token_gerencianet" value="<?php echo $config->token_gerencianet;?>">
                                                    </div>
                                                </div>

                                                </div>
                                            </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END PAGE CONTENT INNER -->
        </div>
    </div>
    <!-- END PAGE CONTENT -->
</div>