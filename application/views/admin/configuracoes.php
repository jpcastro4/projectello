 
        
        <div class="container relative my-5 ">
            <div class="row">
                <div class="col-12 pb-5">
                    <h1 class="contain-title pull-left"> Configurações do Sistema </h1>
                </div>
                
                <div class="col-12">
                    <div class="contain-card p-4">
                        <form action="<?php echo base_url()?>form/configuracoes"  method="post" enctype="multipart/form-data" class="col-12">
                                                        <div class="row" >
                                                            <div class="form-group col-12 ">
                                                                <div class="label">Nome do Site</div>
                                                                <input type="text" name="nome_site" class="form-control" value="<?php echo $config->nome_site; ?>" />
                                                            </div>
                                                            <div class="form-group col-12 ">
                                                                <div class="label">Logo do site</div>
                                                                <input type="file" name="imagem_logo" class="form-control" value="<?php echo $config->imagem_logo; ?>" />
                                                            </div>

                                                            <div class="form-group col-12 ">
                                                                <div class="label">Logo backoffice</div>
                                                                <input type="file" name="imagem_logo_backoffice" class="form-control" value="<?php echo $config->imagem_logo_backoffice; ?>" />
                                                            </div>

                                                            <div class="form-group col-12 ">
                                                                <div class="label">Logo admin</div>
                                                                <input type="file" name="imagem_logo_admin" class="form-control" value="<?php echo $config->imagem_logo_admin; ?>" />
                                                            </div>
                                                            <div class="form-group col-12 ">
                                                                <div class="label">Favicon</div>
                                                                <input type="file" name="favicon" class="form-control" value="<?php echo $config->favicon; ?>" />
                                                            </div>


                                                            <div class="form-group col-12 ">
                                                                <div class="label">Email remetente</div>
                                                                <input type="text" name="email_remetente" class="form-control" value="<?php echo $config->email_remetente; ?>" />
                                                            </div>

                                                             <div class="form-group col-12 ">
                                                                <div class="label">Saque disponível</div>
                                                                <select type="text" name="saque_disponivel" class="form-control" >
                                                                    <option value="1" <?php if($config->saque_disponivel == 1) echo 'selected'; ?> >Sim</option>
                                                                    <option value="0" <?php if($config->saque_disponivel == 0) echo 'selected'; ?> >Não</option>
                                                                </select>
                                                            </div>



                                                            <div class="form-group col-6 ">
                                                                <div class="label">Valor min de saque (BTP)</div>
                                                                <input type="number" name="valor_maximo_saque" class="form-control" value="<?php echo $config->valor_maximo_saque; ?>" />
                                                            </div>
                                                            <div class="form-group col-6 ">
                                                                <div class="label">Taxa de Saque (%)</div>
                                                                <input type="number" name="taxa_saque" class="form-control" value="<?php echo $config->taxa_saque; ?>" />
                                                            </div>


                                                            
                                                            <div class="form-group col-12 ">
                                                                <div class="label">Aviso</div>
                                                                <textarea name="aviso" class="form-control" value="<?php echo $config->aviso ?>" ></textarea>
                                                            </div>

                                                            <div class="form-group col-12 ">
                                                                <div class="label">Manutenção</div>
                                                                <select type="text" name="manutencao" class="form-control">
                                                                    <option value="1" <?php if($config->manutencao == 1) echo 'selected'; ?> >Sim</option>
                                                                    <option value="0" <?php if($config->manutencao == 0) echo 'selected'; ?> >Não</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group  col-12 text-right">
                                                                <button type="submit" class="btn btn-success" > Salvar </button>
                                                            </div>
                                                        </div>
                                                    </form>       
                    </div>
                </div>
                 
            </div>
        </div>