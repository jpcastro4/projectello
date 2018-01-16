    <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
            <div class="col-lg-12 mt">
                <div class="row content-panel ">
                    <div class="col-lg-12 ">
                        <div class="chat-room-head">
                            <h1>Perfil e Configurações</h1>
                        </div>  
                    
                            <div class="panel-heading">
                                <ul class="nav nav-tabs nav-justified">
                                    <li class="active">
                                        <a data-toggle="tab" href="#tab_1">Dados pessoais</a>
                                    </li>
                                    <li >
                                        <a data-toggle="tab" href="#tab_2">Endereço</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab_3" class="contact-map">Atualizar Senha</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab_4">Editar dados bancários</a>
                                    </li>
                                </ul>
                            </div><! --/panel-heading -->
                            
                            <div class="panel-body">
                                <div class="tab-content">

                                    <div id="tab_1" class="tab-pane <?php echo ( ( !isset($message1) && !isset($message2) && !isset($message3) && !isset($message4) ) OR !isset($_REQUEST['conta'])  OR isset($message1) ) ? 'active' : ''; ?>">

                                        <?php if(isset($message1)) echo $message1; ?>

                                        <div class="row">
                                            <div class="col-lg-8 col-lg-offset-2 detailed">
                                                <h4 class="mb">Informações pessoais</h4>
                                                <form role="form" class="form-horizontal" action="" method="post">
                                                   <!--  <div class="form-group">
                                                        <label class="col-lg-2 control-label"> Avatar</label>
                                                        <div class="col-lg-6">
                                                            <input type="file" id="exampleInputFile" class="file-pos">
                                                        </div>
                                                    </div> -->
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Nome</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="nome" value="<?php echo $this->conta_model->user('nome');?>" class="form-control" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Email</label>
                                                        <div class="col-lg-6">
                                                            <input type="email" name="email" value="<?php echo $this->conta_model->user('email');?>" class="form-control" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">CPF</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="cpf" value="<?php echo $this->conta_model->user('cpf');?>" id="cpf" class="form-control" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Data de nascimento</label>
                                                        <div class="col-lg-4">
                                                            <input type="text" name="nascimento" value="<?php echo date('d/m/Y', strtotime($this->conta_model->user('nascimento')));?>" id="data" class="form-control" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Celular</label>
                                                        <div class="col-lg-4">
                                                            <input type="text" name="celular" value="<?php echo $this->conta_model->user('ddd');?><?php echo $this->conta_model->user('celular');?>" id="celular" class="form-control" required/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-lg-offset-2 col-lg-10">
                                                            <input type="submit" name="submit1" class="btn btn-theme" value="Atualizar dados">
                                                           <!--  <button class="btn btn-theme04" type="button">Cancelar</button> -->
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                            
                                        </div><! --/row -->
                                    </div><! --/tab-pane -->

                                    <div id="tab_2" class="tab-pane <?php echo (isset($message4)) ? 'active' : '';?>">

                                         <?php if(isset($message4)) echo $message4; ?>

                                        <div class="row">
                                            
                                            <div class="col-lg-8 col-lg-offset-2 detailed mt">
                                                <h4 class="mb">Endereço</h4>
                                                <form role="form" class="form-horizontal" action="" method="post">
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">CEP</label>
                                                        <div class="alert alert-info"><small>Digite o CEP e aguarde o sistema preencher seu endereço</small></div>
                                                        <div class="col-lg-6">
                                                            <input type="text" onchange="searchZip();" name="cep" class="form-control" required value="<?php echo $this->conta_model->endereco('cep');?>" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Rua</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="rua" class="form-control" required  value="<?php echo $this->conta_model->endereco('rua');?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Quadra</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="quadra" class="form-control" value="<?php echo $this->conta_model->endereco('quadra');?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Lote</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="lote" class="form-control"  value="<?php echo $this->conta_model->endereco('lote');?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Numero</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="numero" class="form-control" value="<?php echo $this->conta_model->endereco('numero');?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Complemento</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="complemento" class="form-control" value="<?php echo $this->conta_model->endereco('complemento');?>" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Bairro</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="bairro" class="form-control" required value="<?php echo $this->conta_model->endereco('bairro');?>" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Cidade</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="cidade" class="form-control" required value="<?php echo $this->conta_model->endereco('cidade');?>" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Estado</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="estado" class="form-control" required value="<?php echo $this->conta_model->endereco('estado');?>" >
                                                        </div>
                                                    </div>
                                                    
                                                   
                                                    <div class="form-group">
                                                        <div class="col-lg-offset-2 col-lg-10">
                                                             <input type="submit" name="submit4" class="btn btn-theme" value="Inserir endereco">
                                                            
                                                        </div>
                                                    </div>            
                                                    
                                                </form>
                                            </div><! --/col-lg-8 -->
                                        </div><! --/row -->
                                    </div><! --/tab-pane -->


                                    <div id="tab_3" class="tab-pane <?php echo (isset($message2)) ? 'active' : '';?>">

                                         <?php if(isset($message2)) echo $message2; ?>

                                        <div class="row">
                                            
                                            <div class="col-lg-8 col-lg-offset-2 detailed mt">
                                                <h4 class="mb">Trocar a senha</h4>
                                                <form role="form" class="form-horizontal" action="" method="post">
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Senha atual</label>
                                                        <div class="col-lg-6">
                                                            <input type="password" name="senha_atual" class="form-control" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Nova senha</label>
                                                        <div class="col-lg-6">
                                                            <input type="password" name="nova_senha" class="form-control" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Confirmar senha</label>
                                                        <div class="col-lg-6">
                                                            <input type="password" name="confirmar_senha" class="form-control" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-lg-offset-2 col-lg-10">
                                                             <input type="submit" name="submit2" class="btn btn-theme" value="Mudar senha">
                                                            
                                                        </div>
                                                    </div>            
                                                    
                                                </form>
                                            </div><! --/col-lg-8 -->
                                        </div><! --/row -->
                                    </div><! --/tab-pane -->

                                    <div id="tab_4" class="tab-pane <?php echo ( isset($message3) OR isset($_REQUEST['conta']) )? 'active' : '';?>">
                                        <div class="row">
                                            <?php if(isset($message3)) echo $message3; ?>

                                            <div class="col-lg-8 col-lg-offset-2 detailed mt">
                                                <h4 class="mb">Dados bancários</h4>
                                                <form role="form" class="form-horizontal" action="" method="post">
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Banco</label>
                                                        <div class="col-lg-6">
                                                            <select name="banco" autocomplete="off" class="form-control" required>
                                                                <?php
                                                                foreach($bancos as $banco){

                                                                    $selected = ($banco['code'] == $this->conta_model->user('banco')) ? 'selected' : '';
                                                                    echo '<option value="'.$banco['code'].'" '.$selected.'>'.$banco['code'].' - '.$banco['name'].'</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Agência</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="agencia" value="<?php echo $this->conta_model->user('agencia');?>" required class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Conta</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="conta" value="<?php echo $this->conta_model->user('conta');?>" required class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Tipo de conta</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="tipo_conta" value="<?php echo $this->conta_model->user('tipo_conta');?>" required class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Titular da conta</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="titular" value="<?php echo $this->conta_model->user('titular');?>" required class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-lg-offset-2 col-lg-10">
                                                             <input type="submit" name="submit3" class="btn btn-theme" value="Atualizar conta bancária">                                                          
                                                        </div>
                                                    </div>            
                                                    
                                                </form>
                                            </div><! --/col-lg-8 -->
                                            
                                        </div><! --/OVERVIEW -->
                                    </div><! --/tab-pane -->  


                                    
                                </div><!-- /tab-content -->
                            
                            </div><! --/panel-body -->
                            
                        </div><!-- /col-lg-12 -->
                    </div><! --/row -->
            </div><! --/container -->
            
        </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!-- Modal -->
                        <div class="modal fade" id="modalAvisoConta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Aviso importante</h4>
                                    </div>
                                    
                                    <div class="modal-body">

                                
                                        <div class="panel panel-warning">
                                            <div class="panel-heading text-center">Atenção</div>
                                            <div class="panel-body">
                                            <p> Seus dados bancários estão vazios. Preencha por gentileza para que seu perfil esteja completo e não haja constrangimentos ao longo da sua estadia conosco.</p>
                                            </div>
                                        </div>

                                    </div>                       
                                </div>
                          </div>
                        </div> 

      

      <!--main content end-->


