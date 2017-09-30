<?php 
	session_start();

	$conexao=mysql_connect('localhost','root','bcd127');
	mysql_select_db('dbhamburgueria2017a');

?> 
<html>
	<head>
		<title> CMS - Adm.Fale Conosco </title> 
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="shortcut icon" href="imagens/logoletrabranca.png">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
			
			<section >
				<form name="faleconosco" method="post" action="admfaleconosco.php">

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
				
					<div id="Consulta">
						<div id="tituloConsulta" align="center">
							Mensagens de Sugestões/Críticas
						</div>
						<table id="tabelaConsulta" border="1">
							<tr height="10%" width="100%">
								<td class="campoConsulta" align="center" >
										Nome
								</td>
								<td class="campoConsulta" align="center" >
										Telefone
								</td>
								<td class="campoConsulta" align="center" >
										Celular
								</td>
								<td class="campoConsulta" align="center" >
										E-mail
								</td>
								<td class="campoConsulta" align="center" >
										Home Page
								</td>
								<td class="campoConsulta" align="center" >
										Link Facebook
								</td>
								<td class="campoConsulta" align="center" >
										Sexo
								</td>
								<td class="campoConsulta" align="center" >
									Sugestões/Críticas
								</td>
								<td class="campoConsulta" align="center" >
										Opções
								</td>
							</tr>
							<?php 
								$sql = "select * from tblMensagem";
								$select=Mysql_query($sql);
								while ($consulta=mysql_fetch_array($select)){
								
							?>
								<Tr	 height="90%" width="100%">
									<td>
										<?php echo($consulta['nome']);?>
									</td>
									<td>
										<?php echo($consulta['telefone']);?>
									</td>
									<td>
										<?php echo($consulta['celular']);?>

									</td>
									<td>
										<?php echo($consulta['email']);?>

									</td>
									<td>
										<?php echo($consulta['homepage']);?>

									</td>
									<td>
										<?php echo($consulta['facebook']);?>

									</td>
									<td>
										<?php 
											if($consulta['sexo']=="M"){
												echo("Masculino");
											}else if($consulta['sexo']=="F"){
												echo("Feminino");
												
											}
										?>
									</td>
									<td>
										<?php echo($consulta['mensagem']); ?>	
									</td>
									<td>
										
									</td>
									
								</tr>
							
							<?php} ?>
							
						</table>
					</div>
			</section>
			
			<footer>
				<div id="desenvolvido">
					Desenvolvido por : Fabiola Almeida de Jesus
				</div>
			</footer>
		</div>
	</body>
</html>