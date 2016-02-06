<?php 

	include('conexao.php');

	class Usuario{

		function __construct(){}

		public function salvarUsuario($idUsuario, $nome, $rg, $patente, $instituicao, $estado, $email, $senha, $administrador, $ativo){

			if($idUsuario){

				$sqlUpdate = "	UPDATE 
									USUARIO 
								SET
									nome = '{$nome}',
									rg = '{$rg}',
									idPatente = {$patente},
									idInstituicao = {$instituicao},
									idEstado = '{$estado}',
									email = '{$email}',
									senha = '{$senha}',
									permissao = {$administrador},
									ativo= {$ativo} 
								WHERE 
									id = {$idUsuario}";

				mysql_query($sqlUpdate);

			}else{
				$sqlInserir = "INSERT INTO usuario(	
									idPatente, 
									idInstituicao, 
									idEstado,
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
			$sqlBuscaSelect = "SELECT id, nome FROM usuario WHERE senha = '$senha' and rg = '$rg'";

			$resultadoSelect = mysql_query($sqlBuscaSelect);

			$numeroDeLinhasRetornadas = mysql_num_rows($resultadoSelect);

			if ($numeroDeLinhasRetornadas > 0) {
				$retornaUsuario = mysql_fetch_assoc($resultadoSelect);

				session_start();
				$_SESSION['idUsuario']	 = $retornaUsuario['id'];
				$_SESSION['nomeUsuario'] = $retornaUsuario['nome'];

				$retorno = true;
			} else {
				$retorno = false;
			}

			return $retorno;
		}

		public function listar(){

			$sqlListaDeUsuarios = "SELECT u.id as id, u.nome as nome, u.email as email, u.ativo as ativo, p.nome as patente 
									FROM usuario u 
									INNER JOIN patente p ON (u.idPatente = p.id) 
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
			//O usuário não poderá ser excluído fisicamente do banco, portando será apenas setado como 'inativo' (0);
			$sqlExcluir = "UPDATE usuario SET ativo = 'NAO' WHERE id = {$idUsuario}";
			$resultado = mysql_query($sqlExcluir);
		}

		public function listarUsuarios(){
			$sqlBuscaUsuarios = "	SELECT 
										u.id, 
									    p.nome AS patente,
										u.rg, 
										u.nome,
										u.email,  
										u.ativo
									FROM 
										usuario u
									    INNER JOIN patente p ON u.idPatente = p.id";

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
			$sqlBuscaUsuarios = "	SELECT 	
										id, 
										rg, 
										idPatente, 
										idInstituicao, 
										nome,
										email, 
										senha, 
										permissao, 
										ativo 
									FROM 
										usuario 
									WHERE 
										id = {$idUsuario}";

			$resultado = mysql_query($sqlBuscaUsuarios);
			$dados = mysql_fetch_assoc($resultado);
			return $dados;
		}
	}





?>