	<?PHP
		# dados para a conexao com oo banco de dados

		$servidor = 'localhost';
		$usuario = 'root';
		$senha = '';
		$banco = 'vzon	;'


		# Executa a conexão com o MySQL
   		$link = mysql_connect($servidor, $usuario, $senha) or die('Não foi possivel conectar: ' . mysql_error());

   		# Seleciona o banco de dados que deseja utilizar
  		$select = mysql_select_db($banco);


  		# Cria a expressão SQL de consulta aos registros
  		$sql = "SELECT * FROM USUARIO";


  		<HTML>
  			<TABLE border=1>
			   <TR>
			    <TD>ID</TD>
			    <TD>PATENTE</TD>
			    <TD>NOME</TD>
			    <TD>Instituição</TD>
			    <TD>EMAIL</TD>
			   </TR>

		<?
		  # Exibe os resultados 
		  $result = mysql_query($sql);
		  while ($tbl = mysql_fetch_array($result)) 
		  {
		  
		    $nome  = $tbl["nome"];
		    $instiuicao  = $tbl["Instituicao"];
		    $email   = $tbl["email"];
		   

		    echo "<TR>";
		    echo "<TD>$Codigo ";
		    echo "<A href=\"inserir.php?acao=editar&buscacodigo=$Codigo\">";
		    echo "(Editar)</A>";
		    echo "<A href=\"gerencia-registro.php?acao=excluir&buscacodigo=$Codigo\">";
		    echo "(Excluir)</A>";
		    echo "</TD>";
		    echo "<TD>$Livro</TD>";
		    echo "<TD>$Autor</TD>";
		    echo "<TD>$Editora</TD>";
		    echo "</TR>";
		  }
		?>
		  </TABLE>
		  <BR><A href="inserir.php">Clique aqui para inserir um novo registro.</A>
		</HTML>






	?>