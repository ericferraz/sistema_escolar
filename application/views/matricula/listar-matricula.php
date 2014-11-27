
<!-- Bibliotecas de plugins específicos desta página tabela FIM -->
<!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX COPIAR  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
<script type="text/javascript" src="<?php echo base_url() . DIR_ASSETS_JS ?>jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() . DIR_ASSETS_JS ?>jquery.dataTables.bootstrap.js"></script>
<!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX COPIAR FIM XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
<!-- Bibliotecas de plugins específicos desta página tabela FIM -->

<!-- Scripts inline de plugins específicos desta página tabela -->
<!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX COPIAR FIM XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#sample-table-2').dataTable({                              
          "oLanguage": {
          "sProcessing": "Aguarde enquanto os dados são carregados ...",
          "sLengthMenu": "Mostrar _MENU_ registros por pagina",
          "sZeroRecords": "Nenhum registro correspondente ao criterio encontrado",
          "sInfoEmtpy": "Exibindo 0 a 0 de 0 registros",
          "sInfo": "Exibindo de _START_ a _END_ de _TOTAL_ registros",
          "sInfoFiltered": "",
          "sSearch": "Pesquisar",
         "oPaginate": {
           "sFirst":    "Primeiro",
           "sPrevious": "Anterior",
           "sNext":     "Próximo",
           "sLast":     "Último"
          }
       }                              
    });   
   });
  
</script>

<script type="text/javascript">
    function excluir(id, linha) {
     var url = "<?php echo base_url().'matricula/excluir/' ?>";
        if (confirm("Deseja excluir essa matrícula definitivamente?")) {
            $.post(url+ id).done(function() {
                var objLinha = $("#linha" + linha);
                objLinha.hide({
                    effect: "fade",
                    complete: function() {
                        oTable1.fnDeleteRow(oTable1.fnGetPosition(this));
                    }
                });
            }).fail(function() {
                $(".page-content:eq(0)").prepend('<div class="alert alert-danger">Ocorreu um erro.</div>');
            });
        }
        return false;
    }
</script>
<!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX COPIAR FIM XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
<!-- Scripts inline de plugins específicos desta página tabela FIM -->

<!-- ##################### SCRIPTS FIM ############################################-->


<!-- ****************** Conteúdo das páginas ********************** -->
<div class="page-content">
    <!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX COPIAR tabela  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->		
    <div class="row">
        <div class="col-xs-12">
            <div class="page-header">
                <h1> Gerenciar Matrículas </h1>
            </div>
            <div class="table-header">
                Alunos Matrículados
            </div>

            <div class="table-responsive">
                <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="24" class="center">
                                <label>
                                    <input type="checkbox" class="ace" />
                                    <span class="lbl"></span>
                                </label>
                            </th>
                            <th width="80">Matrícula:</th>
                            <th width="120" class="hidden-480">Nome:</th>
                            <th width="100" class="hidden-480">Turma:</th>
                            <th width="100" class="hidden-480">Data da matrícula:</th>
                            <th width="54">Ação:</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $numLinha = 0;
                        if(!isset($matriculas) || empty($matriculas)){
                           echo 'Nenhum aluno(a) matriculado(a)'; 
                        }else{
                         foreach ($matriculas as $m){
                        ?> 
                   
                        <tr id="linha<?php echo $numLinha; ?>">
                            <td class="center">
                                <label>
                                    <input type="checkbox" class="ace" />
                                    <span class="lbl"></span>
                                </label>
                            </td>	

                            <td><?php  echo $m->registro_matricula; ?></td>
                            <td><?php  echo $m->nome_aluno; ?></td>
                            <td><?php  echo $m->nome_turma; ?></td>
                            <td><?php  echo parseDateBancoToUser($m->data_matricula); ?></td>
      
                            <td>
                                <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">

                                    <a class="green" title="editar infomações" href="<?php echo base_url().'matricula/editar/'.$m->id_matricula.'/'.url_title($m->nome_aluno); ?>">
                                        <i class="icon-pencil bigger-130"></i>
                                    </a>

                                    <a class="red" title="apagar" href="" onClick="return excluir(<?php echo $m->id_matricula, ', ', $numLinha; ?>);">
                                        <i class="icon-trash bigger-130"></i>
                                    </a>
                                </div>

                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                    <div class="inline position-relative">
                                        <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-caret-down icon-only bigger-120"></i>
                                        </button>

                                    </div>
                                </div>
                            </td>

                            <?php
                            $numLinha++;
                            }//fim foreach
                            }//fim else
                            ?>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX  COPIAR tabela FIM XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
</div><!--Fim div co -->
<!-- ****************** Conteúdo das páginas ********************** -->

