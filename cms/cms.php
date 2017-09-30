<?php

//conexão com o banco
	require_once ('modulo.php');
	session_start();
	
	//quebra de sessão
	if(isset($_POST['btnSair'])){
		include('logout.php');
		
	}
		
?>

<html>
	<head>
		<title> cms </title> 
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="shortcut icon" href="imagens/logoletrabranca.png">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body >
		
		<div id="principal">
			<header >
				<div id="logo">
					<img src="imagens/logoletrabranca.png" width="100%" height="100%">
				</div>
				<div id="titulo">
					<b>CMS</b> - Sistema de Gerenciamento do Site
				</div>
			</header>
			
			<section >
				<form name="cms" method="post" action="cms.php">

						<nav id="opções">
							<?php 
								include('moduloMenu.php');
							?>
							<div id="bemvindo">
								Bem vindo, <?php echo $_SESSION['nome']; ?>
							</div>
						
								<div id="logout">
									<input type="submit" value="Sair" name="btnSair"/>
								</div>
							
						</nav>
				</form>
				
				<?php 
				
					$nivel = $_SESSION['idNivel'];
					if($nivel ==1){
							
				?>
						<div class="mensageminicio">
							<b><h3>Olá, Administrador <?php echo $_SESSION['nome']; ?>!</h3></b>
							</p><a href="Grafico.php"> <font color="black">Confira o Grafico de Produtos </font> </a></p>
						</div>
				<?php
					}else if ($nivel ==2){
				?>
						<div class="mensageminicio">
							<b>Olá, Operador Básico <?php echo $_SESSION['nome']; ?> !</b>
						</div>

				<?php
					}else if ($nivel ==3){
				?>
						<div class="mensageminicio">
							<b>Olá, Cataloguista <?php echo $_SESSION['nome']; ?> !</b>
						<div >

				<?php 
					}
				?>
			
			</section>
			
			<footer >
				<div id="desenvolvido">
						Desenvolvido por : Fabiola Almeida de Jesus
				</div>
			</footer>
		</div>
	</body>

</html>
