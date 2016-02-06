<!DOCTYPE html>
<!--
Projeto integrador - sistema de geolocalização de celulares
-->
<html style="overflow-x: hidden;">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../Libs/	img/favicon.png" type="image/x-icon">


	<link rel="stylesheet" href="../Libs/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../Libs/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="../Libs/css/font-awesome.min.css">

	<script src="../Libs/js/jquery-1.11.3.min.js"></script>
	
	<link rel="stylesheet" href="../Libs/css/bootstrap-select.css">
	
    <!-- bootstrap's JS files.-->
    <script src="../Libs/bootstrap/js/icheck.min.js"></script>
    <script src="../Libs/bootstrap/js/jquery.fs.selecter.min.js"></script>
    <script src="../Libs/bootstrap/js/jquery.fs.stepper.min.js"></script>
    <script src="../Libs/bootstrap/js/bootstrap.min.js"></script>

  	<!-- DataTables CSS -->
  	<link rel="stylesheet" type="text/css" href="../Libs/DataTables-1.10.9/css/jquery.dataTables.css">
  	<!-- JQuery -->
  	<script type="text/javascript" charset="utf8" src="../Libs/DataTables-1.10.9/js/jquery.min.js"></script>
  	<!-- DataTables -->
  	<script type="text/javascript" charset="utf8" src="../Libs/DataTables-1.10.9/js/jquery.dataTables.js"></script>
	
	<script src="../Libs/js/bootstrap-select.js"></script>

	<style type="text/css" media="screen">
		#body {
			background-color: #2e6da4;
			border-color: #2e6da4;
		}	

		.margemTopo{
			margin-top: 0.05cm;
		}

		.fontebranca{
			color: white;
		}
		#imgLogoEsquerda{
			margin-right: 5px;
			margin-top: 5px;
			max-width: 40px;
		}

		.navbar-inverse .navbar-text, .navbar-inverse .navbar-nav > li > a{
			color: #ffffff;
		}

		.navbar-inverse .navbar-text, .navbar-inverse .navbar-nav > li > a:hover{
			color: #CACACA;
		}

		.fundoDeTela{
			color: #2e6da4; 
			width: 100%;
			font-size: 200px;
			font-weight: 400;
			text-align: center;
			margin-top: 3.5cm;	
			opacity: 0.5;		
		}

	</style>

<?php 
	session_start();
?>

	<nav class="navbar navbar-inverse" role="navigation" id="body">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-6" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class=""  ><img id="imgLogoEsquerda" src="../Libs/img/globo.png"></a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-6">
				<ul class="nav navbar-nav">
					<li><a href="../View/inicio.php">Home</a></li>
					<li><a href="../View/relatoriosPrint.php">Relatórios</a></li>	
					<li><a href="../View/busca.php">Busca</a></li>					
					<li><a href="../Controller/controllerUsuario.php">Usuários</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="../View/login.php"><?=$_SESSION['nomeUsuario'];?><i style="margin-left: 5px" class="fa fa-sign-out"></i></a>
					</li>					
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</div>
</nav>
</div>
<div class="container">

</div>