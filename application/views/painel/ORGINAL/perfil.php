      <!-- Tools -->
      <section id='tools'>
        <ul class='breadcrumb' id='breadcrumb'>
          <li class='title'>Forms</li>
          <li><a href="#">Lorem</a></li>
          <li class='active'><a href="#">ipsum</a></li>
        </ul>
        <div id='toolbar'>
          
        </div>
      </section>
      <!-- Content -->
      <div id='content'>

          <div class='panel panel-default'>
            <div class='panel-heading'>
              <i class='fa fa-edit fa fa-large'></i>
              Dados bancários
            </div>

            <div class="panel-body">
            <?php if(isset($message3)) echo $message3; ?>
              <form role="form" class="form-horizontal" action="" method="post">
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Banco</label>
                                                        <div class="col-lg-6">
                                                            <select name="banco" autocomplete="off" class="form-control" required>
                                                                <?php
                                                                foreach($bancos as $banco){

                                                                    $selected = ($banco['code'] == $this->painel_model->user('banco')) ? 'selected' : '';
                                                                    echo '<option value="'.$banco['code'].'" '.$selected.'>'.$banco['code'].' - '.$banco['name'].'</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Agência</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="agencia" value="<?php echo $this->painel_model->user('agencia');?>" required class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Conta</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="conta" value="<?php echo $this->painel_model->user('conta');?>" required class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Tipo de conta</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="tipo_conta" value="<?php echo $this->painel_model->user('tipo_conta');?>" required class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Titular da conta</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="titular" value="<?php echo $this->painel_model->user('titular');?>" required class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-lg-offset-2 col-lg-10">
                                                             <input type="submit" name="submit3" class="btn btn-success" value="Atualizar conta bancária">                                                          
                                                        </div>
                                                    </div>            
                                                    
                                                </form>
            </div>
          </div>
          <div class='panel panel-default'>
          <div class='panel-heading'>
            <i class='fa fa-edit fa fa-large'></i>
            Informações pessoais
          </div>
          <div class='panel-body'>

          <?php if(isset($message1)) echo $message1; ?>
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
                                                            <input type="text" name="nome" value="<?php echo $this->painel_model->user('nome');?>" class="form-control" required readonly />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Sobrenome</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="sobrenonome" value="<?php echo $this->painel_model->user('sobrenome');?>" class="form-control" required readonly />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Email</label>
                                                        <div class="col-lg-6">
                                                            <input type="email" name="email" value="<?php echo $this->painel_model->user('email');?>" class="form-control" required readonly />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">CPF</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="cpf" value="<?php echo $this->painel_model->user('cpf');?>" id="cpf" class="form-control" required readonly />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Data de nascimento</label>
                                                        <div class="col-lg-4">
                                                            <input type="text" name="nascimento" value="<?php echo date('d/m/Y', strtotime($this->painel_model->user('nascimento')));?>" id="data" class="form-control" required readonly />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Celular</label>
                                                        <div class="col-lg-4">
                                                            <input type="text" name="celular" value="<?php echo $this->painel_model->user('ddd');?><?php echo $this->painel_model->user('celular');?>" id="celular" class="form-control" required/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-lg-offset-2 col-lg-10">
                                                            <input type="submit" name="submit1" class="btn btn-success" value="Atualizar dados">
                                                           <!--  <button class="btn btn-success04" type="button">Cancelar</button> -->
                                                        </div>
                                                    </div>

                                                </form>
          </div>
          </div>

          <div class='panel panel-default'>
          <div class='panel-heading'>
            <i class='fa fa-edit fa fa-large'></i>
            Atualiza senha
          </div>
          <div class="panel-body">

           <?php if(isset($message2)) echo $message2; ?>

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
                                                             <input type="submit" name="submit2" class="btn btn-success" value="Mudar senha">
                                                            
                                                        </div>
                                                    </div>            
                                                    
                                                </form>
          </div>
          </div>

          

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


