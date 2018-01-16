    <div class="container">

        <?php  if(isset($mensagem)) echo $mensagem; ?>

        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-warning ">
                    <div class="panel-heading ">
                         Aviso
                    </div>
                    <div class="panel-body text-center">
                        <p>A grande novidade é que agora se você quiser vincular sua conta de Facebook à sua Conta Master, seu login ficará mais fácil e mais rápido. Acesse <a href="<?php echo base_url('painel/conta_configuracoes')?>">Configurações da Conta Master </a>. A outra novidade é que você já pode trocar sua senha da Conta Master. Acesse e veja.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default clearfix">
            <div class="panel-heading">Conta Master</div>
            <div class="panel-body">

            <?php if($usuarios != false):

            foreach($usuarios as $usuario):?>
            
                <div class="col-xs-12 col-sm-6 col-md-2 <?php if($usuario->block == 1){ echo 'bg-danger';}?>">

                    <div class="thumbnail clearfix ">
                        <img class="col-xs-6 col-sm-12" src="http://www.w3schools.com/bootstrap/img_avatar2.png" alt="...">
                        
                        <div class="col-xs-6 col-sm-12">
                            <div class="caption text-center">
                                <h4><?php echo $usuario->login; ?></h4>
                            </div>
                        
                            <p><button class="btn btn-block btn-info <?php if($usuario->block == 1){ echo 'btn-danger';}?>" name="idUser" value="<?php echo $usuario->id ?>" ><?php if($usuario->block == 1){ echo 'BLOQUEADO';}else{ echo 'Acessar';}?></button></p>
                        </div>
                    </div>
                </div> 

            <?php endforeach; else: ?>

                <p class="alert alert-info text col-xs-12 text-center">Você não tem nenhum login cadastrado.</p>

            <?php endif;?>
            </div>       
        </div>

        <div class="adsense" style="max-width:900px; margin-left:auto;margin-right:auto;"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- REDE ADS 50 -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-3215674587886121"
             data-ad-slot="2424863893"
             data-ad-format="auto"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script></div>

        <div class="row">
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

        <div class="adsense" style="max-width:900px; margin-left:auto;margin-right:auto;"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- REDE ADS 50 -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-3215674587886121"
             data-ad-slot="2424863893"
             data-ad-format="auto"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script></div>
    </div>