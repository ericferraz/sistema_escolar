
<div class="page-content">

    <!-- ****************** Conteúdo das páginas internas ********************** -->
    <div class="row">

        <div class="col-xs-12">	
            <!--Script de mensagem '?' -->
            <script type="text/javascript">
                jQuery(function($) {
                    $('[data-rel=popover]').popover({container: 'body'});
                });
            </script>
           
            <?php if(isset($sucesso)){ ?>
            <div class="alert alert-success"><?php echo $sucesso; ?></div>
            <?php }?>
            <?php if(isset($erro)){ ?>
            <div class="alert alert-danger"><?php echo $erro; ?></div>
            <?php }?>
            
            <?php if(validation_errors()): ?>
            <div class="row" id="alerta">
		<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button"  class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<strong>Atenção!</strong>
                        <?php echo form_error('nome_estado'); ?>
                        <?php echo form_error('id_pais_estado'); ?>
                        <?php echo form_error('sigla_estado'); ?> 
		</div>
	 </div>
     <?php endif; ?>   
            
            <div class="page-header">
                <h1> Cadastrar estado </h1>
            </div>
            <div class="col-xs-12">
                <form id="formulario" name="form1" method="post" action="<?php echo base_url() ?>estado/cadastrar" >
                    <br>
                    <!-- SELECT -->
                    <div class="row">
                        <div class="col-xs-3 align-r">
                            <label>País:</label>
                        </div>
                        <div class="col-xs-5">
                            <div>
                                <select name="id_pais_estado">
                                    <?php
                                    if (!isset($paises) || empty($paises)) {
                                        ?>
                                        <option value="">
                                            Nenhum país cadastrado
                                        </option>
                                    <?php } else {
                                      foreach ($paises as $p):
                                        ?>

                                        <option value="<?php echo $p->id_pais; ?>">
                                            <?php echo $p->nome_pais; ?>
                                        </option>
                                    <?php endforeach; } ?>
                                </select>
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="right" data-content="Campo país, é preciso informar a que país esse estado pertence." title="País">?</span>
                        </div>
                    </div>
                    <br>
                    <!-- FIM SELECT -->


                    <!-- TEXTFIELD -->
                    <div class="row">
                        <div class="col-xs-3 align-r">
                            <label>Estado:</label>
                        </div>

                        <div class="col-xs-5">
                            <input type="text"   name="nome_estado" value="<?php echo set_value('nome_estado'); ?>" class="full-width">
                        </div>
                        <div class="col-xs-1">
                            <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="right" data-content="Campo estado, deve ser preenchido com o nome do estado." title="Estado">?</span>
                        </div>
                    </div>
                    <!-- FIM TEXTFIELD -->
                    <br>
                    
                    <!-- TEXTFIELD -->
                    <div class="row">
                        <div class="col-xs-3 align-r">
                            <label>Sigla(uf):</label>
                        </div>

                        <div class="col-xs-5">
                            <input type="text" name="sigla_estado" value="<?php echo set_value('sigla_estado'); ?>" class="full-width">
                        </div>
                        <div class="col-xs-1">
                            <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="right" data-content="Campo sigla(uf), deve ser preenchido com a sigla(uf) do estado." title="Sigla">?</span>
                        </div>
                    </div>
                    <!-- FIM TEXTFIELD -->
                    <br>

                    <div class="clearfix form-actions">
                        <div class="col-md-9">
                            <button class="btn btn-info" name="acao"> <i class="icon-ok bigger-110"></i> Enviar </button>
                        </div>
                    </div>

                </form> 
            </div>
        </div><!-- /.col -->
        <!-- ****************** Conteúdo das páginas internas FIM ********************** -->
    </div><!-- /.row -->
</div><!-- /.page-content -->

