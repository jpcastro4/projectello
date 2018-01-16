
      <!-- Content -->
      
  <div id="content" class="clearfix">

    <div class="clearfix mb60"><?php if(isset($mensagem)) echo $mensagem;  ?></div>

    <div class="row">
    <div class="col-xs-12">
      <div class="col-xs-12 col-md-6 ">
              <div class="panel panel-info ">
                  <div class="panel-heading ">
                     Aviso
                  </div>
                  <div class="panel-body">
                    <p>Foi enviado um e-mail para todos os participantes da Rede ADS50 contando sobre o novo vídeo da rede e explicando sobre as reentradas. A partir de sexta-feira, dia 28 de outubro, para sustentabilidade da rede as reentradas serão obrigatórias. Por gentileza fazer suas reentradas a cada ciclo completo. Se você ainda não teve acesso ao seu e-mail, segue o link para o vídeo - <a target="_blank" href="https://www.youtube.com/watch?v=3l4-HlfzN5Y">https://www.youtube.com/watch?v=3l4-HlfzN5Y</a></p>
                 </div>
              </div>
                
      </div>

      <div class="col-xs-12 col-md-6 ">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- REDE ADS 50 -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-3215674587886121"
                     data-ad-slot="2424863893"
                     data-ad-format="auto"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
        </div>
    </div>
    </div>

    <div class="col-md-12">

      <!-- ESSENCIAIS -->
      <div class="row mb60">
        <div class="col-xs-12 col-md-6">
          
          <?php  $nivel = $this->painel_model->nivelUser(); ?>
          <div class="col-xs-12 col-sm-3 col-md-6 col-lg-6 ">
            <div class="painel-widget">
              <div class="row">
                <div class="pw-head">Nível</div>
                <div class="pw-icone col-xs-6 col-md-4 hidden-xs hidden-sm">
                  <i class="fa fa-bolt fa-4x "></i>
                </div>
                <div class="pw-resultado col-xs-3 col-sm-6"><?php echo $nivel->nivel; ?></div>
              </div>
            </div>         
          </div>

          <div class="col-xs-12 col-sm-3 col-md-6 col-lg-6">
            <div class="painel-widget">
              <div class="row">
                <div class="pw-head">Ciclo</div>
                <div class="pw-icone col-xs-6 col-md-4 hidden-xs hidden-sm">
                  <i class="fa fa-puzzle-piece fa-4x "></i>
                </div>
                <div class="pw-resultado col-xs-3 col-sm-6"><?php echo $this->painel_model->ciclo(); ?></div>
              </div>
            </div>         
          </div>

          <div class="col-xs-12 col-sm-3 col-md-6 col-lg-6">
            <div class="painel-widget">
              <div class="row">
                <div class="pw-head">Total recebido</div>
                <div class="pw-icone col-xs-6 col-md-4 hidden-xs hidden-sm">
                  <i class="fa fa-institution fa-4x "></i>
                </div>
                <div class="pw-resultado col-xs-3 col-sm-6"><?php echo $nivel->total_recebido; ?></div>
              </div>
            </div>         
          </div>

          <div class="col-xs-12 col-sm-3 col-md-6 col-lg-6">
            <div class="painel-widget">
              <div class="row">
                <div class="pw-head">Total doado</div>
                <div class="pw-icone col-xs-6 col-md-4 hidden-xs hidden-sm">
                  <i class="fa fa-thumbs-o-up fa-4x "></i>
                </div>
                <div class="pw-resultado col-xs-3 col-sm-6"><?php echo $nivel->total_doado; ?></div>
              </div>
            </div>         
          </div>

        </div><!-- fimd a primeira coluna -->
        
        <div class="col-xs-12 col-md-6">
          
          <!-- LINK DIRETO  -->
            <div class="col-xs-12 col-md-12 " id="link-direto">
              <div class="panel panel-default">
                  <div class="panel-heading ">
                    <i class="fa fa-link fa fa-large"></i>
                      Link Direto <a href="#" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="O link direto cadastra apenas em você."><span class="badge" ><i class="fa fa-info fa-large"></i></span></a>
                  </div>
                  <div class="panel-body">
                    <pre><?php echo base_url('amigo/'.$this->painel_model->user('login') ) ?></pre>
                 </div>
              </div>
                
              </div>
          <!-- END LINK DIRETO -->

          <!-- LINK DIRETO  -->
            <div class="col-xs-12 col-md-12 " id="link-unico">
              <div class="panel panel-default">
                  <div class="panel-heading ">
                    <i class="fa fa-link fa fa-large"></i>
                      Link Único <a href="#" data-toggle="popover" data-placement="top" data-trigger="focus" data-content="O Link único descobre pessoas ativas na sua rede com vaga abaixo."><span class="badge" ><i class="fa fa-info fa-large"></i></span></a>
                  </div>
                  <div class="panel-body">
                    <pre><?php echo base_url('linkunico/amigo/'.$this->painel_model->user('login')) ?></pre>
                 </div>
              </div>
                
              </div>
          <!-- END LINK DIRETO -->

          <div class="row mb60">

          <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- REDE ADS 2 -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-3215674587886121"
                 data-ad-slot="2645189891"
                 data-ad-format="auto"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
          </div>

        </div><!-- fimd a primeira coluna -->
      </div>

    <!-- INFORMATIVOS -->
    <div class="row mb60">
        <div class="col-xs-12 col-md-6">
          
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-money fa fa-large"></i> Sua próxima doação <a href="#" data-toggle="popover" data-placement="top" data-trigger="focus" data-content="Fique atento no aceite da sua doação. Ela sobe você de ciclo e te dá a possibilidade de acessar as doações que você ainda irá receber."><span class="badge" ><i class="fa fa-info fa-large"></i></span></a>
                    </div>
                    <div class="panel-body">
                        <?php 
                        //var_dump($this->painel_model->Uplines() );

                        if($this->painel_model->lider() == false ): 
                            $id_recebedor = $this->painel_model->Recebedor(); 
                            $recebedor = $this->painel_model->infoUser($id_recebedor);
                            $doador = $this->painel_model->infoUser($this->native_session->get('user_id'));
                        ?>
                        <div class="clearfix">
                            <div class="recebedor col-sm-12 col-md-12 col-lg-6 text-center">

                            <i class="fa fa-user"></i>
                            
                            <h3><?php echo $recebedor->nome ;?></h3><span style="color:#fff !important"><?php echo $id_recebedor; ?></span>
                            
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6 text-center">
                            
                             <span class="vlrrecebedor"> <?php echo $this->painel_model->valorDoacao(); ?></span><br>
                            </div>
                        </div>
                        <hr>
                        <div class="clearfix text-center">

                            <?php if($this->painel_model->qtdDoacoes() ): //DOE SOMENTE SE RECEBEU O BASTANTE  ?> 
                            
                                <?php $StatusDoacao = $this->painel_model->StatusDoacao();?>

                                <?php if($StatusDoacao != false): // SE A DOACAO EXISTE  ?>

                                    <?php if( $StatusDoacao->status == 0): // SE A DOACAO AINDA AGUARDA APROVACAO ?>
                                        <p class="alert alert-info">Aguarde seu upline aprovar a doação.</p>
                                    <?php elseif($StatusDoacao->status == 2): //SE A DOACAO FOI REJEITADA ?>
                                        <p class="alert alert-danger">Sua doação foi rejeita.</p>
                                        <button data-toggle="modal" data-target="#modalDoacao" class="btn btn-block btn-warning">Reapresentar <div id="cronometro"></div></button>
                                    <?php elseif($StatusDoacao->status == 1): //SE A DOACAO FOI ACEITA E NAO HOUVER UPLINES ?>
                                        <p class="alert alert-success"><small>Sua doação foi aceita. Aguarde seus recebimentos.</small></p>
                                    <?php else:?>
                                        <button data-toggle="modal" data-target="#modalDoacao" class="btn btn-block btn-warning btn-lg"> Doar <div id="cronometro"></div></button>
                                    <?php endif; ?>

                                <?php else: //--- ELSE SE A DOACAO EXISTE ?>
                                    <button data-toggle="modal" data-target="#modalDoacao" class="btn btn-block btn-warning btn-lg"> Doar <div id="cronometro"></div></button>
                                <?php endif; //-- FIM SE A DOACAO EXISTE ?>

                            <?php else: //--- ELSE DOE SOMENTE SE FOR O BASTANTE?>
                             <p class="alert alert-info">Aguardando seu saldo ser suficiente </p>
                            <?php endif; //----- FIM DOE SOMENTE SE FOR O BASTANTE ?>
                            
                            <hr>
                            <pre><?php echo $recebedor->login ;?></pre>
                            <p><strong><?php echo $recebedor->ddd.' '.$recebedor->celular ;?></strong></p>
                        </div>

                        <?php else:?>
                            <p class="alert alert-info">Você não precisa doar. Você é líder </p>
                        <?php endif;?>

                  
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 " id="downline-aberto">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-beer fa fa-large"></i> Downline aberto <a href="#" data-toggle="popover" data-placement="top" data-trigger="focus" data-content="Esse é o seu downline que está com lugar livre abaixo dele na sua fila de link único."><span class="badge" ><i class="fa fa-info fa-large"></i></span></a>
                    </div>
                    <div class="panel-body">
                        <div class="recebedor col-md-12 text-center">

                            <i class="fa fa-user"></i>
                            
                            <?php $aberto = $this->painel_model->LinkUnico( $this->native_session->get('user_id') );

                              $user_aberto = $this->painel_model->infoUser($aberto);

                             ?>

                             <?php if($user_aberto->ciclo > 0 ){ echo "<span class='label label-success'>Ativo</span>";}else{ echo "<span class='label label-danger'>Inativo</span>";}?>

                            <h3><?php echo $user_aberto->nome ;?> <span style="color:#fff"> -<?php echo $user_aberto->id ;?> </span> </h3>
                            <hr>
                            <pre><?php echo $user_aberto->login ;?></pre>
                            <p><strong><?php echo $user_aberto->ddd.' '.$user_aberto->celular ;?></strong></p>
                        </div>
                    </div>
                </div>
            </div><!-- FIM DOWNLINE ABERTO -->

        </div> <!-- FIM DA PRIMEIRA COLUNA -->

        <div class="col-xs-12 col-md-6">
          
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="panel panel-default">
                  <div class="panel-heading">
                    <i class="fa fa-filter fa fa-large"></i> Regras
                    <div class="panel-tools">
                  </div>
                </div>
                <div class="panel-body">
                      <div class="panel-group" id="accordion" role="tablist">
                        <div class="panel panel-default">
                         <div class="panel-heading" role="tab" id="headingOne">
                          <h2 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Sobre ativações e indicações</a></h2>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                          <li>Você precisa se ativar, doando 50,00 ao recebedor indicado no seu painel. Somente após sua doação ser recebida, você poderá indicar 3 pessoas pelo seu link.</li>
                          <li>Caso você não seja ativado em 24h, você perderdá sua posição no sistema e seu cadastro bloqueado.</li>
                          <li>Você tem 15 dias para indicar 3 pessoas. Caso não consiga, você será bloqueado.</li>
                          <li>Se você for bloqueado e ainda assim, em 15 dias, não indicar 3 amigos, seu cadastro será excluído.</li>
                          <li>Você só consegue receber se estiver com as doações em dia. Portanto seja ágil. Doe e poderá receber.</li>
                        </div>
                        </div>
                        </div>
                        <div class="panel panel-default">
                          <div class="panel-heading" role="tab" id="headingTwo">
                          <h2 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Sobre prazos</a></h2>
                          </div>
                          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">
                          <li><p>Nossa meta é alcançar o prazo máximo de derramamentos de rede em 45 dias. Por isso os prazos serão observados criteriosamente.</p></li>
                          <li>Você tem 24h para realizar suas doações.</li>
                          <li>Você também tem 24h para aceitar suas doações.</li>
                          <li>Caso você seja vítima de atraso, utilize o suporte para denúncia. O espírito da rede é a cordialidade. Doar é entender a necessidade do próximo e em segundo plano a suas necessidades mas, ser cordial não significa ser conivente. Denuncie.</li>
                          </div>
                          </div>
                        </div>
                        <div class="panel panel-default">
                          <div class="panel-heading" role="tab" id="headingTree">
                          <h2 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTree" aria-expanded="true" aria-controls="collapseTree">Sobre exclusões</a></h2>
                          </div>
                          <div id="collapseTree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTree">
                          <div class="panel-body">
                          <li><strong>NÃO</strong> se ativar com a primeira doação é passível de <strong>EXCLUSÃO</strong>. Não vamos tolerar pessoas sem o espírito de grupo.</li>
                          <li>Receber e não doar é passível de bloqueio no sistema.</li>
                          <li>Se você é líder, tenha a prática de identificar e manter organizada sua lista de espera. Os punidos que receberem e não doarem serão retirados do sistema, e o lugar ficará disponível para interessados.</li>
                          <li>A equipe de suporte tem a única função de manter a rede funcionando. Não somos responsáveis por colocar pessoas abaixo de doadores 'sedentários'. Se você decidiu entrar para a Rede ADS 50. Trabalhe. Todos trabalhamos. </li>
                          </div>
                          </div>
                        </div>
                      </div>
                     
                </div>
              </div>
            </div> <!-- FIM DAS REGRAS -->
        </div>
      </div><!-- FIM DO ROW -->
    </div>


  <?php $superuser = $this->native_session->get('superuser');

     if($superuser == 1 ):?>

    <div class="col-md-12 ">
    <div class="col-sm-12 col-md-6 col-lg-6 ">
      <div class="mb60">
        <div class="panel panel-default">
            <div class="panel-heading">
              <i class="fa fa-beer fa fa-large"></i>
              Avisos
            </div>
            <div class="panel-body">
              <form method="post">
               <div class="form-group">
                <input type="text" class="form-controle" name="id_user" >
               </div>
                <div class="form-group">
                <input type="submit" class="btn btn-success" name="superadm" value="Acessar">
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>
<?php endif;?>





  </div>



         <!-- Modal -->
                        <div class="modal fade" id="modalDoacao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                  <?php  ?>
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Doação para <?php echo $recebedor->nome ;?></h4>
                                    </div>
                                    
                                    <div class="modal-body">

                                        <h3><?php echo $recebedor->nome.' '.$recebedor->sobrenome ;?></h3>
                                        <p></i><?php echo $recebedor->ddd.' '.$recebedor->celular ;?></p>
                                        <hr>
                                        <h3>Conta bancária</h3>
                                        <p>Banco: <?php foreach($bancos as $banco){
                                          
                                          if( $banco['code'] == $recebedor->banco){ 

                                                echo $banco['code'].' - '.$banco['name'];
                                            }

                                          } ?><br>
                                        Agência: <?php echo $recebedor->agencia ?> <br>
                                        Conta: <?php echo $recebedor->conta ?> <br>
                                        Tipo da conta: <?php echo $recebedor->tipo_conta; ?> <br>
                                        Titular: <?php echo $recebedor->titular ;?>
                                        </p>
                                        <hr>

                                        <div class="panel panel-warning">
                                            <div class="panel-heading text-center">Enviar comprovante</div>
                                            <div class="panel-body">
                                            <form method="post" action="#" enctype="multipart/form-data" >
                      
                                              <input type="hidden" name="id_recebedor" required value="<?php echo $recebedor->id;?>" />

                                                  <div class="form-group">
                                                      <input type="file" name="userfile" required class="default" required/>
                                                  </div>

                                                 <div class="form-group">
                                                   <input type="submit" name="comprovante" class="btn btn-theme" value="Enviar comprovante">
                                                 </div>
                                          </form>
                                            </div>
                                        </div>

                                    </div>                       
                                </div>
                          </div>
                        </div>

                        <?php //if( $this->native_session->get('superuser') ): ?>
                            <div class="modal fade" id="modalEmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                      <?php  ?>
                                        <div class="modal-header">
                                            <?php //if( $this->native_session->get('superuser') ): ?>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <?php //endif;?>
                                            <h4 class="modal-title" id="myModalLabel">Validação do seu email</h4>
                                        </div>
                                        <form method="post" action="#" enctype="multipart/form-data" >
                                        <div class="modal-body">
                                            <p>Seus contatos são importantes para mantermos informações pertinentes a rotina do sistema. Por isso precisamos validar seu e-mail. </p>
                                            <p><strong>Siga os passos seguintes:</strong><br/>
                                            <ol><li>Clique no botão abaixo. Ao clicar enviaremos um e-mail que pode demorar até 5 minutos para chegar.</li>
                                            <li>Vá até a sua caixa de e-mails e abra o e-mail que enviamos.</li>
                                            <li>Clique no link de validação.</li>
                                            <li>Pronto. Tudo certo.</li></ol>
                                            </p>
                                            <hr>
                                            <p class="text-center"><strong>Seu email está correto?</strong></p>
                                            <p>Lembre-se de olhar na sua caixa de SPAM. Caso você não receba nosso email de validação digite outro endereço de email. </p>
                                            <div class="form-group">
                                                <input type="email" id="email" name="emailPost" class="form-control" value="<?php echo $this->painel_model->infoUser( $this->native_session->get('user_id') )->email ?>">
                                            </div>
                                            
                                        </div> 
                                        <div class="modal-footer">
                                            <div class="resposta"></div>

                                                <div class="form-group">
                                                    <input type="submit" name="validacao" class="btn btn-block btn-large btn-success" value="Validar meu email">
                                                </div>

                                                
                                        </div>
                                        </form>
                                    </div>
                              </div>
                            </div>
                            <?php //endif;?>