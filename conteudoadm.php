<?php
	$conexao=mysql_connect('localhost','root','bcd127');
	$consulta;
	mysql_select_db('dbhamburgueria20171a');
	session_start();
	

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
				<div id="opções">
					<div class="opt0">
						<div class="imgOpt">
							<img src="imagens/conteudo.png" alt="conteudo" width="95%" height="95%">

						</div>

						<div class="opt">
							<a href="conteudoadm.php">Adm. Conteúdo</a>
						</div>
					</div>
					<div class="opt0">
						<div class="imgOpt">
							<img src="imagens/faleconosco2.png" alt="faleconosco" width="100%" height="95%">

						</div>
						<div class="opt">
								<a href="faleconoscoadm.php">Adm. Fale Conosco </a>
						</div>
					</div>
					<div class="opt0">

						<div class="imgOpt">
							<img src="imagens/produto.png" alt="produto" width="95%" height="95%">

						</div>
						<div class="opt">
							Adm. Produtos
						</div>
					</div>
					<div class="opt0">
						<div class="imgOpt">
							<img src="imagens/user.png" alt="usuario" width="95%" height="95%">

						</div>
						<div class="opt">
							<a href="usuarioadm.php">Adm. Usuários</a>
						</div>
					</div>
					<div id="bemvindo">
						Bem vindo,<?php echo $_SESSION['nome']; ?>
					</div>
					<div id="logout">
						<a href="../home.php">Sair</a>
					</div>
					
				</div>
				<table border="0" id="tbloptConteudo">
					<Tr>
						<td>
							<table class="espaco">
								<tr>
									<td>
										<div class="imgConteudo">
											<img src="imagens/home2.png" alt="home">
										</div>
									</td>	
									<td>
										<div class="optConteudo">
											<a class="a" href="admHome.php">Administrar conteudo da pagina home. </a>
										</div>
									</td>
									
									
								</tr>
							</table>
							<table class="espaco">
								<tr>
									<td>
										<div class="imgConteudo">
											<img src="imagens/sale2.png" alt="promocao">
										</div>
									</td>
									<td>
										<div class="optConteudo">
											<a class="a" href="admPromocao.php">Administrar conteudo da pagina de promoções. </a>
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