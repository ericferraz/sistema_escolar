
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
                        <?php echo form_error('nome_municipio'); ?>
                        <?php echo form_error('id_estado_municipio'); ?>   
		</div>
	 </div>
     <?php endif; ?>   
            
   <?php if(!isset($municipios) || empty($municipios)){ ?>
        <div class="alert alert-danger">Nenhum município encontrado<</div>     
   <?php }else{?>
            <div class="page-header">
                <h1> Editar município </h1>
            </div>
            <div class="col-xs-12">
                <form id="formulario" name="form1" method="post" >
                    <br>
                    <!-- SELECT -->
                    <div class="row">
                        <div class="col-xs-3 align-r">
                            <label>Estado:</label>
                        </div>
                        <div class="col-xs-5">
                            <div>
                                <select name="id_estado_municipio">
                                    <?php
                                    if (!isset($estados) || empty($estados)) {
                                      ?>
                                        <option value="">
                                            Nenhum estado cadastrado
                                        </option>
                                    <?php } else {
                                      foreach ($estados as $e):
                                         $selected = $e->id_estado == $municipios->id_estado_municipio ? "selected" : "";
                                        ?>

                                        <option value="<?php echo $e->id_estado; ?>" <?php echo $selected; ?>>
                                            <?php echo $e->nome_estado; ?>
                                        </option>
                                    <?php endforeach; } ?>
                                </select>
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="right" data-content="Campo estado, é preciso informar a que estado esse município pertence." title="estado">?</span>
                        </div>
                    </div>
                    <br>
                    <!-- FIM SELECT -->


                    <!-- TEXTFIELD -->
                    <div class="row">
                        <div class="col-xs-3 align-r">
                            <label>Município:</label>
                        </div>

                        <div class="col-xs-5">
                            <input type="text"  name="nome_municipio" value="<?php echo set_value('nome_municipio') ? set_value('nome_municipio') : $municipios->nome_municipio; ?>" class="full-width">
                        </div>
                        <div class="col-xs-1">
                            <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="right" data-content="Campo município, deve ser preenchido com o nome do município." title="Município">?</span>
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
   <?php }?>
        <div class="col-xs-12">
                <a href='<?php echo base_url().'municipio/listar' ?>'><button class="btn btn-success">Voltar</button></a>
         </div> 
        </div><!-- /.col -->
        <!-- ****************** Conteúdo das páginas internas FIM ********************** -->
    </div><!-- /.row -->
</div><!-- /.page-content -->