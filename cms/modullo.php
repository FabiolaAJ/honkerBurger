<?php 
	//conexão com o banco
	require_once ('modulo.php');
	
?>

<html>
	<head>
	
	</head>
	
	<body>
			<!--ADIMINISTRADOR-->
				<?php 
					$nivel = $_SESSION['idNivel'];
					if($nivel ==1){
							
				?>
						<h3>Olá Administrador!</h3>
				<?php
					}
				
				?>
	</body>
</html>