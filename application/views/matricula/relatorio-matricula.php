
<!-- Bibliotecas de plugins específicos desta página tabela FIM -->
<!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX COPIAR  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
<script type="text/javascript" src="<?php echo base_url() . DIR_ASSETS_JS ?>jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() . DIR_ASSETS_JS ?>jquery.dataTables.bootstrap.js"></script>
<!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX COPIAR FIM XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
<!-- Bibliotecas de plugins específicos desta página tabela FIM -->
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
    function buscarAluno(){
           var url = "<?php echo base_url().'matricula/buscarAluno/' ?>";
           $("#buscar_aluno").keypress(function() {
      
                        var nomeAluno = $(this).val();
                        if(nomeAluno.length>=2){
                        $.post(url+nomeAluno,
                        function(valor) {
                            $("#buscar_aluno").html(valor);
                        }
                   );
                 }
             });
         
        }
        
  
</script>
<!-- ##################### SCRIPTS FIM ############################################-->


<!-- ****************** Conteúdo das páginas ********************** -->
<div class="page-content">
    <!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX COPIAR tabela  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->		
    <div class="row">
        <div class="col-xs-12">
            <div class="page-header">
                <h1> Relatório de matrículas </h1>
            </div>
            <div class="col-xs-12">
                <form method="post" action="<?php echo base_url().'matricula/relatorio'; ?>" >
                <div class="row">
                    
                    <div class="col-xs-12">
                        <input type="hidden" name="relatorio" value="relatorio">
                        <button class="btn-app">Gerar relatório</button>
                    </div>
                </div>
                </form>
            </div>
            <br>
            <br>
             
            <div class="table-header">
                Alunos matrículados
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
                            <th width="80">Aluno:</th>
                            <th width="120" class="hidden-480">Município-UF:</th>
                            <th width="100" class="hidden-480">Curso:</th>
                            <th width="100" class="hidden-480">Turma:</th>
                            <th width="100" class="hidden-480">Data da matrícula:</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if(!isset($matriculas) || empty($matriculas)){
                           echo 'Nenhum dado encontrado'; 
                        }else{
                         foreach ($matriculas as $m){
                        ?> 
                   
                        <tr id="resultado-busca">
                            <td class="center">
                                <label>
                                    <input type="checkbox" class="ace" />
                                    <span class="lbl"></span>
                                </label>
                            </td>	

                            <td><?php  echo $m->nome_aluno; ?></td>
                            <td><?php  echo $m->nome_municipio.'-'.$m->sigla_estado; ?></td>
                            <td><?php  echo $m->nome_curso; ?></td>
                            <td><?php  echo $m->nome_turma; ?></td>
                            <td><?php  echo parseDateBancoToUser($m->data_matricula); ?></td>

                            <?php
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

