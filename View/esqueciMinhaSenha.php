<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../Libs/    img/favicon.png" type="image/x-icon">


        <link rel="stylesheet" href="../Libs/css/bootstrap.min.css">
        <link rel="stylesheet" href="../Libs/bootflat/css/bootflat.css">
        <link rel="stylesheet" href="../Libs/css/logo-nav.css">
        <link rel="stylesheet" href="../Libs/css/font-awesome.min.css">
            
        <style type="text/css" media="screen">
            #login {
                width:500px; /* Tamanho da Largura da Div */
                height:200px; /* Tamanho da Altura da Div */
                position:absolute; 
                top:25%; 
                margin-top:-100px; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
                left:50%;
                margin-left:-250px;                
            }
        </style>
    </head>
    <body>
        <div class="container" id="login">
            <div class="panel panel-primary">
                <div class="panel-heading" style="text-align: center">
                  <img style="max-width: 15%" src="../Libs/img/globo.png">
                  <h3>VZON</h3>
                    <h4>Esqueceu a senha?</h4>
                </div>
              <div class="panel-body">
                <label>E-mail</label>
                <input type="text" class="form-control" name="email" placeholder="Digite o e-mail cadastrado no sistema">
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <a href="login.php"><button type="button" class="btn btn-primary col-md-12" >Voltar</button>
                    </div>
                    <div class="col-md-6">
                        <a href="login.php"><button type="subimit" class="btn btn-primary col-md-12">Enviar</button>
                    </div>
                </div>
              </div>
            </div>
        </div>

        <script type="text/javascript">
            function enviaSenhaPorEmail(email){
                $.ajax({
                    url: "../Controller/controllerUsuario.php",
                    type: 'POST',
                    dataType: 'json',
                    data: { email:email, 
                            action:'enviarEmailSolicitacaoDeSenha'},
                    success: function(msg){
                        if(msg == true){
                            alert('E-mail enviado com sucesso!');
                        } else {
                            alert('E-mail não cadastrado em nosso sistema. Verifique com o administrador do sistema.'); 
                        }
                    },
                    error: function(msg){
                        alert('Falha no envio de dados');
                    }
                });
            }
        </script>
    </body>
</html>

<?php
    include 'inferior.php';
?>
