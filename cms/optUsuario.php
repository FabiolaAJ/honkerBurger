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
				<nav id="opções">
					<?php  include('moduloMenu.php');?>

					<div id="bemvindo">
						Bem vindo, <?php echo $_SESSION['nome']; ?>
					</div>
					
					<div id="logout">
						<input type="submit" value="Sair" name="btnSair"/>
					</div>
				</nav>
				<table id="espacooptUsu">
					<tr>
						
						<td class="Usu">
						
						
						</td>
						<td class="Usu">
						
						
						</td>
					</tr>
				</div>
			</section>
			
			<footer >
				<div id="desenvolvido">
						Desenvolvido por : Fabiola Almeida de Jesus
				</div>
			</footer>
		</div>
	</body>

</html>