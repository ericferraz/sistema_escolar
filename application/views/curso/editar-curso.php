
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
                        <?php echo form_error('nome_curso'); ?>

		</div>
	 </div>
     <?php endif; ?>   
      
    <?php if(!isset($cursos) || empty($cursos)){ ?>
      <div class="alert alert-danger">Curso não encontrado</div>
    <?php }else{?>
            <div class="page-header">
                <h1> Editar curso </h1>
            </div>
            <div class="col-xs-12">
                <form id="formulario" name="form1" method="post" >
                    

                    <!-- TEXTFIELD -->
                    <div class="row">
                        <div class="col-xs-3 align-r">
                            <label>Curso:</label>
                        </div>

                        <div class="col-xs-5">
                            <input type="text"  name="nome_curso" value="<?php echo set_value('nome_curso') ? set_value('nome_curso') : $cursos->nome_curso; ?>" class="full-width">
                        </div>
                        <div class="col-xs-1">
                            <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="right" data-content="Campo curso, deve ser preenchido com o nome do curso." title="Curso">?</span>
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
                <a href='<?php echo base_url().'curso/listar' ?>'><button class="btn btn-success">Voltar</button></a>
         </div> 
        </div><!-- /.col -->
        <!-- ****************** Conteúdo das páginas internas FIM ********************** -->
    </div><!-- /.row -->
</div><!-- /.page-content -->

