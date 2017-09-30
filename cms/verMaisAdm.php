<?php
//conexão com o banco 
	require_once ('modulo.php');
	session_start();
	//resgatando id da tabela e guardando em uma variavel local
	$idmensagem = $_GET['idmensagem'];
	
//quebra de sessao
	if(isset($_POST['btnSair'])){
		include('logout.php');
		
	}

?> 
<html>
	<head>
	<title> CMS - Ver mais (Fale Conosco) </title> 
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
				<form name="ver" method="post" action="verMaisAdm.php">

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
				<div id="ConsultaVer">
							<?php
								/*pesquisando mensagem na  lista do banco*/
								$sql ="select * from tblmensagem where idmensagem =".$idmensagem ;
								$select=mysql_query($sql);


								while($consulta=mysql_fetch_array($select)){

								
							?>
					<div id="tituloConsultaMais"><!--apresentação de todo conteudo e mensagem enviado pelo usario -->
						&nbsp;&nbsp;Sugestão/Crítica de <?php echo($consulta['nome']);?>
					</div>	
						<div id="tabelaConsultaMais" border="0">
							<table border="1" id="espacoCampos">
								<tr>
									<td class="campoConsulta">
										&nbsp;&nbsp;&nbsp;&nbsp;Nome
									</td>			
								</tr>
								<tr>
									<td class="campoConsulta">
										&nbsp;&nbsp;&nbsp;&nbsp;Telefone
									</td>			
								</tr>
								<tr>
									<td class="campoConsulta">
										&nbsp;&nbsp;&nbsp;&nbsp;Celular
									</td>		
								</tr>
								<tr>
									<td class="campoConsulta">
										&nbsp;&nbsp;&nbsp;&nbsp;E-mail
									</td>		
								</tr>
								<tr>
									<td class="campoConsulta">
										&nbsp;&nbsp;&nbsp;&nbsp;Home page
									</td>		
								</tr>
								<tr>
									<td class="campoConsulta">
										&nbsp;&nbsp;&nbsp;&nbsp;Facebook
									</td>		
								</tr>
								<tr>
									<td class="campoConsulta">
										&nbsp;&nbsp;&nbsp;&nbsp;Sexo
									</td>		
								</tr>
								<tr>
									<td class="campoConsulta">
										&nbsp;&nbsp;&nbsp;&nbsp;Sugestão/Crítica
									</td>		
								</tr>
						    </table>
									
								
							<table id="espacoConsulta">
								<tr>
									<td class="td_table">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo($consulta['nome']);?></td>
								</tr>
								<tr>
									<td class="td_table">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo($consulta['telefone']);?></td>
								</tr>
								<tr>
									<td class="td_table">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo($consulta['celular']);?></td>
								</tr>
								<tr>
									<td class="td_table">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo($consulta['email']);?></td>
								</tr>
								<tr>
									<td class="td_table">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo($consulta['homepage']);?></td>
								</tr>
								<tr>
									<td class="td_table">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo($consulta['facebook']);?></td>
								</tr>
								<tr>
									<td class="td_table">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo($consulta['sexo']);?></td>
								</tr>
								<tr>
									<td class="td_table">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo($consulta['mensagem']);?></td>
								</tr>
							</table>
								
						</div>
						<?php }?>
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