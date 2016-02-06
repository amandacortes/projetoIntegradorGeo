<?php 

	include('conexao.php');

	class Usuario{

		function __construct(){}

		public function salvarUsuario($idUsuario, $nome, $rg, $patente, $instituicao, $estado, $email, $senha, $administrador, $ativo){

			if($idUsuario){

					$sqlUpdate = "UPDATE USUARIO SET
								nome = '{$nome}',
								rg = '{$rg}',
								id_patente = {$patente},
								id_instituicao = {$instituicao},
								id_estado = '{$estado}',
								email = '{$email}',
								senha = '{$senha}',
								permissao = {$administrador},
								ativo= {$ativo} where id = {$idUsuario}";
					mysql_query($sqlUpdate);

			}else{
						$sqlInserir = "INSERT INTO usuario(	id_patente, 
												id_instituicao, 
												id_estado,
												rg, 
												nome, 
												email, 
												senha, 
												permissao, 
												ativo
									) VALUES (
											{$patente},
											{$instituicao},
											'{$estado}',
											'{$rg}',
											'{$nome}',
											'{$email}',
											'{$senha}',
											{$administrador},
											{$ativo} )";
						mysql_query($sqlInserir);
			}
			return true;
		}

		public function editar($rg, $id_instituicao, $id_estado, $nome, $email, $permissao, $ativo, $senha){

			$sqlUpdate = "UPDATE usuario SET 
								id_instituicao 	= $id_instituicao, 
								id_estado		= $id_estado, 
								nome 			= 'nome', 
								email 			= '$email', 
								permissao 		= $permissao, 
								ativo 			= $ativo 
						  WHERE id 				= $id";

			mysql_query($sqlUpdate);
		}

		//verifica se email já não está cadastrado.
		public function jaExiste($email){
			if($email){
				$sqlSelect = "SELECT email FROM usuario WHERE email='".$email."'";
				$query = mysql_query($sqlSelect);
				if(mysql_num_rows($query)>0){
					return true;
				}else{
					return false;
				}
			}else{
				return true; //E-mail inválido
			}
		}

		//valida a senha e o rg inserido pelo usuario no momento do login
		public function validarLogin($rg, $senha){
			$sqlBuscaSelect = "SELECT nome FROM usuario WHERE senha = $senha and rg = $rg";
			$resultadoSelect = mysql_query($sqlBuscaSelect);

			$numeroDeLinhasRetornadas = mysql_affected_rows();

			if ($numeroDeLinhasRetornadas > 0) {
				$retornaNome = mysql_fetch_assoc($resultadoSelect);

				session_start();
				$_SESSION['nomeUsuario'] = $retornaNome['nome'];

				return true;
			} else {
				return false;
			}
		}

		public function listar(){

			$sqlListaDeUsuarios = "SELECT u.id as id, u.nome as nome, u.email as email, u.ativo as ativo, p.nome as patente 
									FROM usuario u 
									INNER JOIN patente p ON (u.id_patente = p.id) 
									ORDER BY nome";
			
			$resultado = mysql_query($sqlListaDeUsuarios);
		
			return $resultado;
		}

		public function buscarUsuario($idUsuario){
			$sqlBuscar = "SELECT * FROM usuario WHERE id = {$idUsuario} ";
			$resultado = mysql_query($sqlBuscar);
			return $resultado;
		}

		public function excluirUsuario($idUsuario){
			$sqlExcluir = "DELETE FROM usuario WHERE id = {$idUsuario}";
			$resultado = mysql_query($sqlExcluir);
		}

		public function listarUsuarios(){
			$sqlBuscaUsuarios = "SELECT id, 
										rg, 
										id_patente, 
										id_instituicao, 
										nome,
										email, 
										senha, 
										permissao, 
										ativo 
									from projetointegradorgeo.usuario";
			$resultadoBuscaUsuarios = mysql_query($sqlBuscaUsuarios);

			$usuarios = array();

			while ($row = mysql_fetch_assoc($resultadoBuscaUsuarios)) {
				$usuarios[] = $row;
			}

			return $usuarios;		
		}

		public function listaInstituicao(){
			$buscaInstutiocao = "select id, nome from instituicao";
			$resultado =mysql_query($buscaInstutiocao);

			$retorno = array();

			while ($row = mysql_fetch_assoc($resultado)) {
				$retorno[] = $row;
			}

			return $retorno;
		}
		
		public function listaPatente(){
			$buscaPatente = "select id, nome from patente";
			$resultado =mysql_query($buscaPatente);

			$retorno = array();

			while ($row = mysql_fetch_assoc($resultado)) {
				$retorno[] = $row;
			}

			return $retorno;
		}

		public function listaEstado(){
			$buscaEstados = "select sigla, nome from estado;";
			$resultado =mysql_query($buscaEstados);

			$retorno = array();

			while ($row = mysql_fetch_assoc($resultado)) {
				$retorno[] = $row;
			}

			return $retorno;
		}	
	

		public function recuperaUsuario($idUsuario){
			$sqlBuscaUsuarios = "SELECT id, 
										rg, 
										id_patente, 
										id_instituicao, 
										nome,
										email, 
										senha, 
										permissao, 
										ativo 
									from projetointegradorgeo.usuario where id = {$idUsuario}";
			$resultado = mysql_query($sqlBuscaUsuarios);
			$dados = mysql_fetch_assoc($resultado);
			return $dados;
		}
	}





?>