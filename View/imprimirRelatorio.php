<?php 
		echo "<pre>".print_r($_POST, true)."</pre>";
		echo "<pre>".print_r($_FILES, true)."</pre>";
		//exit;
 ?>


 <!DOCTYPE html>
 <html>
 <head>
 		<title><?=$_POST['tituloRelatorio']?></title>
 </head>
 <body>
 	
 		<H1><?=$_POST['tituloRelatorio']?></H1>
 </body>
 </html>