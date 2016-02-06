<?php
$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : "";
include '../Model/Usuario.php';
$usuario = new Usuario();

switch ($action) {
	case 'inserirUsuario':
			$listaDeInstituicoes = $usuario->listaInstituicao();
			$listaDePatentes = $usuario->listaPatente();
			$listaDeEstados = $usuario->listaEstado();
			$dadosUsuario = array(	'id'=>"",
									'rg'=>"",
									"idPatente"=>"",
									"idInstituicao"=>"",
									"nome"=>"",
									"email"=>"",
									"senha"=>"",
									"permissao"=>"",
									"ativo"=>"");

			include "../View/adicionarUsuario.php";
		break;

	case 'editarUsuario':
			$listaDeInstituicoes = $usuario->listaInstituicao();
				$listaDePatentes = $usuario->listaPatente();
				$listaDeEstados = $usuario->listaEstado();
			$dadosUsuario  = $usuario->recuperaUsuario($_REQUEST['idUsuario']);

			include "../View/adicionarUsuario.php";
				
			break;

	case 'salvarUsuario':
			$idUsuario 		= $_REQUEST['idUsuario'];
			$nome 			= $_REQUEST['nome'];
			$rg 			= $_REQUEST['rg'];
			$patente 		= $_REQUEST['patente'];
			$instituicao 	= $_REQUEST['instituicao'];
			$estado 		= $_REQUEST['estado'];
			$email 			= $_REQUEST['email'];
			$senha 			= $_REQUEST['senha'];
			$administrador 	= isset($_REQUEST['administrador']) ? $_REQUEST['administrador'] 	: 0;
			$ativo			= isset($_REQUEST['ativo']) 		? $_REQUEST['ativo'] 			: NAO;
				

			$retorno = $usuario->salvarUsuario($idUsuario, $nome, $rg, $patente, $instituicao, $estado, $email, $senha, $administrador, $ativo);

			$listaDeUsuario = $usuario->listarUsuarios();
			include ("../View/usuarios.php");

			exit;
			
	break;

	case 'excluirUsuario':
			$idUsuario = $_REQUEST['idUsuario'];
			$retornoExclusao = $usuario->excluirUsuario($idUsuario);
			$listaDeUsuario = $usuario->listarUsuarios();
			include ("../View/usuarios.php");
		break;

	case 'validarLogin':
			$rg = $_REQUEST['rg'];
			$senha = $_REQUEST['senha'];

			$retorno = $usuario->validarLogin($rg, $senha);

			echo json_encode($retorno);
			
		break;
	
	default:
		$listaDeUsuario = $usuario->listarUsuarios();
		require "../View/usuarios.php";
	break;
}

?>