
<div class="page-content">

    <!-- ****************** Conteúdo das páginas internas ********************** -->
    <div class="row">
         <script type="text/javascript">
        function pesquisarNomePreencherCombo(){
           var url = "<?php echo base_url().'matricula/listarAlunoPorNome/' ?>";
           $("input[name=q]").keypress(function() {
                        $("select[name=id_aluno_matricula]").html('<option value="0">Carregando...</option>');
                        var nomeAluno = $(this).val();
                        $.post(url+nomeAluno,
                        function(valor) {
                            $("select[name=id_aluno_matricula]").html(valor);
                        }
                   );
             });
           
        }
    </script>

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
                        <?php echo form_error('data_matricula'); ?>
                        <?php echo form_error('id_aluno_matricula'); ?>
                        <?php echo form_error('id_turma_matricula'); ?> 
		</div>
	 </div>
     <?php endif; ?>   
      <?php if(!isset($matriculas) || empty($matriculas)){ ?>
      <div class="alert alert-danger">Matrícula não encontrada</div>
      <?php } else{?>
            <div class="page-header">
                <h1> Editar matrícula de aluno </h1>
            </div>
            <div class="col-xs-12">
                <form id="formulario" name="form1" method="post" >
                    <br>
                      <!-- TEXTFIELD -->
                    <div class="row">
                        <div class="col-xs-3 align-r">
                            <label>Pequisar aluno:</label>
                        </div>

                        <div class="col-xs-5">
                            <input type="text" autocomplete="off" onkeypress="pesquisarNomePreencherCombo();"  id="pesquisarAluno"  name="q" class="full-width">
                        </div>
                        <div class="col-xs-1">
                            <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="right" data-content="Campo pesquisar aluno, comece a digitar o nome, que o sistema irá procurar pelo aluno." title="Pesquisar">?</span>
                        </div>
                    </div>
                    <!-- FIM TEXTFIELD -->
                    
                    <br>
                    <!-- SELECT -->
                    <div class="row">
                        <div class="col-xs-3 align-r">
                            <label>Aluno:</label>
                        </div>
                        <div class="col-xs-5">
                            <div>
                                <select name="id_aluno_matricula">
                                    <?php
                                    if (!isset($alunos) || empty($alunos)) {
                                        ?>
                                        <option value="">
                                            Nenhum aluno cadastrado
                                        </option>
                                    <?php } else {
                                      foreach ($alunos as $a):
                                          $selected = $matriculas->id_aluno_matricula == $a->id_aluno ? "selected" : "";
                                        ?>

                                        <option value="<?php echo $a->id_aluno; ?>" <?php echo $selected; ?> >
                                            <?php echo $a->nome_aluno; ?>
                                        </option>
                                    <?php endforeach; } ?>
                                </select>
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="right" data-content="Campo aluno, é preciso informar qual aluno(a) deseja matricular." title="Aluno">?</span>
                        </div>
                    </div>
                    <!-- FIM SELECT -->
                    
                    <br>
                    <!-- SELECT -->
                    <div class="row">
                        <div class="col-xs-3 align-r">
                            <label>Turma:</label>
                        </div>
                        <div class="col-xs-5">
                            <div>
                                <select name="id_turma_matricula">
                                    <?php
                                    if (!isset($turmas) || empty($turmas)) {
                                        ?>
                                        <option value="">
                                            Nenhuma turma cadastrada
                                        </option>
                                    <?php } else {
                                      foreach ($turmas as $t):
                                          $selected = $matriculas->id_turma_matricula == $t->id_turma ? "selected" : "";
                                        ?>

                                        <option value="<?php echo $t->id_turma; ?>" <?php echo $selected; ?>>
                                            <?php echo $t->nome_turma; ?>
                                        </option>
                                    <?php endforeach; } ?>
                                </select>
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="right" data-content="Campo turma, é preciso informar qual turma esse aluno(a) irá fazer parte." title="Turma">?</span>
                        </div>
                    </div>
                    <br>
                    <!-- FIM SELECT -->

                    <!-- TEXTFIELD -->
                    <div class="row">
                        <div class="col-xs-3 align-r">
                            <label>Data matrícula:</label>
                        </div>

                        <div class="col-xs-5">
                            <input type="date" name="data_matricula" value="<?php echo set_value('data_matricula') ? set_value('data_matricula') : $matriculas->data_matricula;  ?>" class="full-width">
                        </div
                        <div class="col-xs-1">
                            <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="right" data-content="Campo data matrícula, deve ser preenchida com a data que foi matriculado(a)." title="Data matrícula">?</span>
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
                <a href='<?php echo base_url().'matricula/listar' ?>'><button class="btn btn-success">Voltar</button></a>
         </div> 
        </div><!-- /.col -->
        <!-- ****************** Conteúdo das páginas internas FIM ********************** -->
    </div><!-- /.row -->
</div><!-- /.page-content -->

