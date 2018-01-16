<div class="container">
    <div class='panel panel-default'>
        <div class='panel-heading'>
        <i class='fa fa-edit fa fa-large'></i>
            Vincule seu Facebook
        </div>
        <div class="panel-body text-center">

        <?php if(isset($mensagemFacebook)) echo $mensagemFacebook; ?>

             <?php if ( ! $this->facebook->is_authenticated() ) : ?>

            <p>Quer facilitar a entrada na sua conta master. Use seu facebook como chave de acesso.</p>
                  <div class="login-facebook">
                    <a id="sign_in" class="waves-effect waves-light z-depth-0" href="<?php echo $this->facebook->login_url(); ?>">
                      <span class="icon-container"><i class="fa fa-facebook"  aria-hidden="true"></i></span>
                      <span>Entre usando o Facebook</span>
                    </a>
                  </div>
            <?php else: ?>

                <h4 class="mb30"><strong>Facebook autorizado e vinculado.</strong></h4>
                <?php $user = (object) $this->facebook->request('get', '/me?fields=id,name,email,picture'); ?>
                <div class="media mb30" style="max-width:320px; margin-left:auto; margin-right:auto;" >
                    <div class="media-left media-middle " style="width:160px" >
                        <a href="#">
                           <!--  <img width="90" style="border-radius:50%;overflow:hidden;" class="media-object" src="<?php echo $user->picture['data']['url'] ; ?>" alt="..."> -->

                            <img width="90" style="border-radius:50%;overflow:hidden;" class="media-object" src="http://graph.facebook.com/<?php echo $user->id; ?>/picture?type=large" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        
                        <h4 class="media-heading"><?php echo $user->name?></h4>
                        <!-- <p><?php echo $user->email?></p> -->
                        <p><?php echo $user->id?></p>
                        <!-- <a class="label label-danger" href="<?php echo $this->facebook->logout_url(); ?>">Cancelar</a> -->
                    </div>
                </div>

              <!--   <label for="viewPhoto">
                <input id="viewPhoto" type="checkbox" value="<?php echo ($this->painel_model->conta('viewPhoto') == 1 ? '0' : '1' ) ?>"  <?php echo ($this->painel_model->conta('viewPhoto') == 1 ? 'checked' : '' ) ?> name="viewPhoto" > Mostrar foto na rede</label>
 -->
            <?php endif; ?>
        </div>
    </div>
    
    <div class='panel panel-default'>
        <div class='panel-heading'>
        <i class='fa fa-edit fa fa-large'></i>
            Atualiza senha
        </div>
        <div class="panel-body">

        <?php if(isset($mensagem)) echo $mensagem; ?>

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
                                                             <input type="submit" name="submit" class="btn btn-success" value="Mudar senha">
                                                            
                                                        </div>
                                                    </div>            
                                                    
            </form>
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

    
