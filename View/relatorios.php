<?php
    include 'menu.php';
?>
    <body>

	<div class="container">
		<div class="row">
			<div class="col-md-6">
			</div>
		</div>		
		
        <div class="row" style="margin-top: 1%">
            <div class="col-md-12">
                <table id="tabelaDeRelatorios" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Data</th>                           
                            <th>Imprimir</th>                           
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Busca 1</th>
                            <td style="width: 15%">10/10/2010</td>                            
                            <td style="width: 10%">
                                <a href="relatoriosPrint.php"> <button type="button" class="btn btn-primary" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                                    </button>
                                </a>
                                
                            
                            </td>
                        </tr> 
                        <tr>
                            <th scope="row">Busca 2</th>
                            <td style="width: 15%">10/10/2010</td>                            
                            <td style="width: 10%">
                                <a href="relatoriosPrint.php"> <button type="button" class="btn btn-primary" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                                    </button>
                                </a>
                                
                            
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Busca 3</th>
                            <td style="width: 15%">10/10/2010</td>                            
                            <td style="width: 10%">
                                <a href="relatoriosPrint.php"> <button type="button" class="btn btn-primary" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                                    </button>
                                </a>
                                
                            
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
	
            
            
            
         <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Remover usuário</h4>
                  </div>
                  <div class="modal-body">
                      <h4>Deseja excluir esse usuário?</h4>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Excluir</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
<script type="text/javascript">

    $(document).ready( function () {
        $('#tabelaDeRelatorios').DataTable(
            {
               "aaSorting": [[ 2, "asc" ]],
               "oLanguage": { 
                   "sLengthMenu": "Mostrar _MENU_ itens por página", 
                   "sZeroRecords": "<i>Não há itens neste modo de exibição.</i>",
                   "sInfo": "_TOTAL_ itens encontrados (exibindo de _START_ a _END_)", 
                   "sInfoEmpty": "Não há itens para o filtro selecionado.", 
                   "sInfoFiltered": " - total de _MAX_ registros", 
                   "sSearch": "<b>Filtrar: </b>",
                   "oPaginate": { 
                       "sFirst": "Início", 
                       "sPrevious": "&lt;", 
                       "sNext": "&gt;", 
                       "sLast": "Último" 
                  }
              },
              "iDisplayLength" : 10,
            }
        );
    });
</script>
    </body>
</html>
	
	
	
	
	
