<?php
//conexao com o banco
	require_once ('modulo.php');
	session_start();
	//quebrando Sessão
	if(isset($_POST['btnSair'])){
		include('logout.php');
		
	}	

 ?> 
<html>
	<head>
		<title> CMS - Adm.Conteudo </title> 
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="shortcut icon" href="imagens/logoletrabranca.png">
		<meta http-equiv="Content-Type" content="text/html; 
		charset=utf-8" />
	</head>
	<body>
		<div id="principal">
			<header>
				<div id="logo">
					<img src="imagens/logoletrabranca.png" width="100%" height="100%">
				</div>
				<div id="titulo">
					<b>CMS</b> - Sistema de Gerenciamento do Site
				</div>
			</header>
			<section>
				<form name="conteudo" method="post" action="conteudoadm.php">

						<nav id="opções">
							<?php  include('moduloMenu.php');?>

							
							<div id="bemvindo">
								Bem vindo, <?php echo $_SESSION['nome']; ?>
							</div>
						
								<div id="logout">
									<input type="submit" value="Sair" name="btnSair"/>
								</div>
							
						</nav>
				</form>
				<table border="0" id="tbloptConteudo"><!-- opções de administração de conteudos -->
					<Tr>
						<td>
							
							<table class="espaco">
								<tr>
									<td>
										<div class="imgConteudo">
											<img src="imagens/sale2.png" alt="promocao">
										</div>
									</td>
									<td>
										<div class="optConteudo">
											<a class="a" href="admPromocoes.php">Administrar conteudo da pagina de promoções. </a>
										</div>
									</td>
									
								</tr>
							</table>
							<table class="espaco">
								<tr>
									<td>
										<div class="imgConteudo">
											<img src="imagens/lanche2.png" alt="lanche_do_mes">
										</div>
									</td>									
									<td>
										<div class="optConteudo">
											<a class="a" href="admLanche.php">Administrar conteudo da pagina do lanche do mês. </a>
										</div>
									</td>									
									
								</tr>
							</table>
							
						</td>
						<td>
							<table class="espaco">
								<tr>
									<td>
										<div class="imgConteudo">
											<img src="imagens/banda2.png" alt="banda_em_destaque">
										</div>
									</td>									
									<td>
										<div class="optConteudo">
											<a class="a" href="admBandaEmDestaque.php">Administrar conteudo da pagina da banda em destaque. </a>
										</div>
									</td>									
									
								</tr>
							</table>
							<table class="espaco">
								<tr>
									<td>
										<div class="imgConteudo">
											<img src="imagens/ambientes.png" alt="nossos_ambientes">
										</div>
									</td>									
									<td>
										<div class="optConteudo">
											<a class="a" href="admAmbientes.php">Administrar conteudo da pagina nossos ambientes. </a>
										</div>
									</td>									
									
								</tr>
							</table>
							<table class="espaco">
								<tr>
									<td>
										<div class="imgConteudo">
											<img src="imagens/sobre2.png" alt="sobre_nos">
										</div>
									</td>											
									<td>
										<div class="optConteudo">
											<a class="a" href="admSobre.php">Administrar conteudo da pagina sobre. </a>
										</div>
									</td>										
									
								</tr>
							</table>
							
						</td>
						
					</tr>
				</table>	
				
			</section>
			<footer>
				<div id="desenvolvido">
					Desenvolvido por : Fabiola Almeida de Jesus
				</div>
			</footer>
		</div>
	</body>

</html>