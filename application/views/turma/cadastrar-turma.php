
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
                        <?php echo form_error('nome_turma'); ?>
                        <?php echo form_error('id_curso_turma'); ?>
		</div>
	 </div>
     <?php endif; ?>   
            
            <div class="page-header">
                <h1> Cadastrar turma </h1>
            </div>
            <div class="col-xs-12">
                <form id="formulario" name="form1" method="post" action="<?php echo base_url() ?>turma/cadastrar" >
                    <br>
                    <!-- SELECT -->
                    <div class="row">
                        <div class="col-xs-3 align-r">
                            <label>Curso:</label>
                        </div>
                        <div class="col-xs-5">
                            <div>
                                <select name="id_curso_turma">
                                    <?php
                                    if (!isset($cursos) || empty($cursos)) {
                                     ?>
                                        <option value="">
                                            Nenhum curso cadastrado
                                        </option>
                                    <?php } else {
                                      foreach ($cursos as $c):
                                        ?>
                                        <option value="<?php echo $c->id_curso; ?>">
                                            <?php echo $c->nome_curso; ?>
                                        </option>
                                    <?php endforeach; } ?>
                                </select>
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="right" data-content="Campo curso, é preciso informar a que curso essa turma pertence." title="Curso">?</span>
                        </div>
                    </div>
                    <br>
                    <!-- FIM SELECT -->


                    <!-- TEXTFIELD -->
                    <div class="row">
                        <div class="col-xs-3 align-r">
                            <label>Turma:</label>
                        </div>

                        <div class="col-xs-5">
                            <input type="text" name="nome_turma" value="<?php echo set_value('nome_turma'); ?>" class="full-width">
                        </div>
                        <div class="col-xs-1">
                            <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="right" data-content="Campo turma, deve ser preenchido com o nome da turma." title="Turma">?</span>
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


