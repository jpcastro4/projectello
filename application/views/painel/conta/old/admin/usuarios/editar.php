<!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="<?php echo base_url('backoffice/geadmin');?>">Home</a><i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?php echo base_url('backoffice/geadmin/usuarios');?>">Usuários</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Editar usuário
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE CONTENT INNER -->

            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal form-row-seperated" action="" method="post">
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-pencil font-green-sharp"></i>
                                    <span class="caption-subject font-green-sharp bold uppercase">
                                    Editar usuário </span>
                                    <span class="caption-helper"><?php echo $usuario->nome;?></span>
                                </div>
                                <div class="actions btn-set">
                                    <input type="submit" name="submit" class="btn green-haze btn-circle" value="Salvar">

                                </div>
                            </div>

                            <?php if(isset($message)) echo $message; ?>

                            <div class="portlet-body">
                                <div class="tabbable">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_geral" data-toggle="tab">
                                            Informações Pessoais </a>
                                        </li>
                                        <li>
                                            <a href="#tab_acesso" data-toggle="tab">
                                            Acesso </a>
                                        </li>
                                        <li>
                                            <a href="#tab_financeiro" data-toggle="tab">
                                            Financeiro
                                             </a>
                                        </li>
                                        <li>
                                            <a href="#tab_bancarios" data-toggle="tab">
                                                Dados Bancários
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content no-space">
                                        <div class="tab-pane active" id="tab_geral">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Nome: <span class="required">
                                                    * </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="nome" value="<?php echo $usuario->nome;?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Email: <span class="required">
                                                    * </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="email" class="form-control" name="email" value="<?php echo $usuario->email;?>" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">CPF: <span class="required">
                                                    * </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="cpf" id="cpf" value="<?php echo $usuario->cpf;?>" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Data de nascimento: <span class="required">
                                                    * </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="nascimento" id="data" value="<?php echo date('d/m/Y', strtotime($usuario->nascimento));?>" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Celular: <span class="required">
                                                    * </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="celular" id="celular" value="<?php echo $usuario->celular;?>" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_acesso">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Login:
                                                    </label>
                                                    <div class="col-md-10">
                                                        <?php echo $usuario->login;?> <em>(Não é possível alterar)</em>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Nova senha
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="password" class="form-control" name="senha" autocomplete="off" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Bloquear usuário
                                                    </label>
                                                    <div class="col-md-10">
                                                       <?php
                                                       $array_block = array(0=>'Não', 1=>'Sim');
                                                       ?>
                                                       <select name="block" class="form-control" autocomplete="off">
                                                       <?php
                                                       foreach($array_block as $blockKey=>$blockVal){

                                                        $selected = ($blockKey == $usuario->block) ? 'selected' : '';
                                                        echo '<option value="'.$blockKey.'" '.$selected.'>'.$blockVal.'</option>';
                                                       }
                                                       ?>
                                                       </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_financeiro">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Saldo disponível
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="saldo_disponivel" class="form-control" value="<?php echo $usuario->saldo_disponivel;?>">                                                    </div>
                                                </div>
                                               <div class="form-group">
                                                    <label class="col-md-2 control-label">Saldo bloqueado
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="saldo_bloqueado" class="form-control" value="<?php echo $usuario->saldo_bloqueado;?>">                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        <div class="tab-pane" id="tab_bancarios">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Banco
                                                    </label>
                                                    <div class="col-md-10">
                                                        <select name="banco" class="form-control" autocomplete="off">
                                                        <?php
                                                        foreach(Bancos() as $banco){

                                                            $selected = ($banco['code'] == $usuario->banco) ? 'selected'  : '';

                                                            echo '<option value="'.$banco['code'].'" '.$selected.'>'.$banco['name'].'</option>';
                                                        }
                                                        ?>
                                                        </select>
                                                                                                            </div>
                                                </div>
                                               <div class="form-group">
                                                    <label class="col-md-2 control-label">Agência
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="agencia" class="form-control" value="<?php echo $usuario->agencia;?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Conta
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="conta" class="form-control" value="<?php echo $usuario->conta;?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Tipo de Conta
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="tipo_conta" class="form-control" value="<?php echo $usuario->tipo_conta;?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Titular
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="titular" class="form-control" value="<?php echo $usuario->titular;?>">
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