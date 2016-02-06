<?php
  include 'menu.php';
?>

<body>
    <div class="container">
        <label>
            <h1>
                <button type="submit" class="btn btn-primary" onclick="location.href= '../Controller/controllerUsuario.php?action=inserirUsuario' ">
                    <i class="glyphicon glyphicon-plus"> Adicionar</i>
                </button>
            </h1>
        </label>
        <div class="row">
            <div class="col-sm-12">
                <table id="tabelaDeUsuarios" class="table table-striped table-bordered" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
                    <thead>
                        <tr role="row">
                            <th style="width:  5%;">Status  </th>
                            <th style="width:  5%;">Código  </th>
                            <th style="width: 10%;">Patente </th>
                            <th style="width: 10%;">Rg      </th>
                            <th style="width: 35%;">Nome    </th>
                            <th style="width: 20%;">E-mail  </th>
                            <th style="width:  5%;">Ativo   </th>
                            <th style="width: 10%;">Opções  </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                          foreach ($listaDeUsuario as $usuario) {
                            $idUsuario = $usuario['id'];
                            ?>
                              <tr role="row" class="odd" align="center">
                                    <td><i class="glyphicon glyphicon-user" ></i></td>
                                    <td class="sorting_1"><?=$usuario['id']?></td>
                                    <td><?=$usuario['id_patente']?></td>
                                    <td><?=$usuario['rg']?></td>
                                    <td><?=$usuario['nome']?></td>
                                    <td><?=$usuario['email']?></td>
                                    <td><?=$usuario['ativo']?></td>
                                    <td nowrap>
                                        <button type="button" class="btn btn-primary" onclick="location.href='../Controller/controllerUsuario.php?action=editarUsuario&idUsuario=<?=$idUsuario?>'">
                                            <i class="glyphicon glyphicon-pencil"> Editar</i>
                                        </button>
                                        <button type="button" class="btn btn-primary" onclick="location.href='../Controller/controllerUsuario.php?action=excluirUsuario&idUsuario=<?=$idUsuario?>'">
                                            <i class="glyphicon glyphicon-trash" > Excluir</i>
                                        </button>
                                    </td>
                                </tr>
                            <?php
                          }
                         ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

<script type="text/javascript">

function excluirUsuario(idUsuario){
    var name = confirm("Deseja realmente excluir este usuário?");
    if(name==true){
      $.ajax({
      url: '../Controller/controllerUsuario.php',
      type: 'POST',
      dataType: 'json',
      data: { sidUsuario:idUsuario,
              action:'excluir'},
      success: function(retorno){
        if(retorno > 0){
          window.location.reload();
        } else {
          alert('Falha ao excluir dados.');
        }
      },
      error: function(){
        alert(retorno.msg);
      }
    });
    }
}
function buscarUsuario(idUsuario){
  $.ajax({
    url: 'Controller/controllerUsuario.php',
    type: 'POST',
    dataType: 'json',
    data: {idUsuario:idUsuario,
         action:'buscar'},
    success: function(retorno){
      $('#action').val('alterar');
      $('#idUsuario').val(retorno.idUsuario);
      $('#nomeUsuario').val(retorno.nome);
      $('#cadastroProfessor').modal();
    },
    error: function(){
      alert("Falha ao buscar dados!");
    }
  });
}

    $(document).ready( function () {
        $('#tabelaDeUsuarios').DataTable(
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

<?php
    include 'inferior.php';
?>