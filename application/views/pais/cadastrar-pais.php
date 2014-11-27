
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
                        <?php echo form_error('nome_pais'); ?>

		</div>
	 </div>
     <?php endif; ?>   
      
            
            <div class="page-header">
                <h1> Cadastrar país </h1>
            </div>
            <div class="col-xs-12">
                <form id="formulario" name="form1" method="post" action="<?php echo base_url() ?>pais/cadastrar" >
                    

                    <!-- TEXTFIELD -->
                    <div class="row">
                        <div class="col-xs-3 align-r">
                            <label>País:</label>
                        </div>

                        <div class="col-xs-5">
                            <input type="text"  name="nome_pais" value="<?php echo set_value('nome_pais'); ?>" class="full-width">
                        </div>
                        <div class="col-xs-1">
                            <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="right" data-content="Campo país, deve ser preenchido com o nome do país." title="País">?</span>
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

