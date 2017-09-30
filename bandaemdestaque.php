<?php 

	$nome="";
	$login="";
	$senha="";
//*conexão com o banco */
	require_once ('cms/modulo.php');

		
	
	session_start(); 
	


	
	if(isset ($_POST['txtusuario']) && isset($_POST['txtsenha'])){
		$login = $_POST ['txtusuario'];
		$senha = $_POST ['txtsenha'];
		//consulta no banco
		$sql="select * from tbl_login where login='$login' and senha='$senha'";
			
		$select = mysql_query($sql);
		
		
		if($consulta=mysql_fetch_array($select)){
			$_SESSION['nome'] = $consulta['nome'];
			header('location:cms/cms.php');
		}else{?>
				<script>
					alert("Usuario invalido!");
				</script>
	<?php	}
		
	}




?>

<html>
	<head>
		<title> Honker Burger - Banda em destaque </title> 
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="shortcut icon" href="imagens/logoletrabranca.png">
		<script src="script.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
		<header>
			<div id="caixaoculta">
			
					<div id="centralizar">
				
						<div id="logo">
							<img src="imagens/logoletrabranca.png" width="100%" height="100%"> </img>
						</div>
						
						<form name="frmlogin" method="post" action="bandaemdestaque.php">
							<div id="autenticacao">
								Usuário: <input  type="text" name ="txtusuario" size="12"/>&nbsp;
								Senha: <input  type="password" name ="txtsenha" size="12"/>
								<input  type="submit" value="Entrar" >
							</div>
						</form>
						
						<nav> 
						
							<div id="menuu">
								<ul class="lstmenu_mobile">
									<li> 
										<img class="menu_img"src="imagens/menu.png">
										<ul class="lstmenu">
											<table>
												<tr><td>&nbsp;&nbsp; </td></tr>
												<tr><td><li><a href="index.php">&nbsp;Inicio</a></li></tr></td>
												<tr><td><li><a href="promocoes.php">&nbsp;Promoções </a></li></tr></td>
												<tr><td><li><a href="lanchedomes.php">&nbsp;Lanche do mês </a></li></tr></td>
												<tr><td><li><a href="bandaemdestaque.php">&nbsp;Banda em destaque </a></li></tr></td>
												<tr><td><li><a href="nossosambientes.php">&nbsp;Nossos ambientes </a></li></tr></td>
												<tr><td><li><a href="sobre.php">&nbsp;Sobre </a> </li></tr></td>
												<tr><td><li><a href="faleconosco.php">&nbsp;Fale Conosco</a> </li></tr></td>
											</table>
										</ul>
									<li>
										
										
								</ul>
							</div>
							<ul class="lstmenu2">
							
								<li><a href="index.php">Inicio</a></li>
								<li><a href="promocoes.php">Promoções </a></li>
								<li><a href="lanchedomes.php">Lanche do mês </a></li>
								<li><a href="bandaemdestaque.php">Banda em destaque </a></li>
								<li><a href="nossosambientes.php">Nossos ambientes </a></li>
								<li><a href="sobre.php"> Sobre </a> </li>
								<li><a href="faleconosco.php">Fale Conosco</a> </li>
							</ul>
							
						</nav>
					</div>
			</div>
			
		</header>
		<div id="principal">
			<section>
				<?php 
					$sql="select * from tbl_banda where statusBand = 1";
					$select = mysql_query($sql);
					while($consulta=mysql_fetch_array($select)){
				
				
				
				?>
						<div>
							<table id="redesSociais">
								<tr> 
									<td><a href="https://www.instagram.com/?hl=pt-br " target="_blank" > <img class="img_redesSociais" src="imagens/insta.png" width="100%" height="100%"></a> </td>
								</tr>
								<tr> 
									<td><a href="https://www.facebook.com/" target="_blank" ><img class="img_redesSociais" src="imagens/facebook.png" width="100%" height="100%"></a> </td>
								</tr>
								<tr> 
									<td><a href="https://twitter.com/?lang=pt-br" target="_blank"><img class="img_redesSociais" src="imagens/twitter.png" width="100%" height="100%"></a> </td>
								</tr>
							</table>
						</div>
							
							<div id="slider">
									<img src="cms/<?php  echo($consulta['imagemApresentacao']); ?>" height="100%" width="100%">
							</div>
							<div id="divisaoo">
								<table width="100%" height="100%" border="0">
									<tr>
										<td height="100%" width="25%">
											<div class="imgband">
												<img src="cms/<?php echo($consulta['imagem1']); ?>" width="100%" height="100%">										
												
											</div>
											<div class="imgband">
												<img src="cms/<?php  echo($consulta['imagem2']); ?>" width="100%" height="100%">										
												
											</div>
											<div class="imgband">
												<img src="cms/<?php  echo($consulta['imagem3']); ?>"width="100%" height="100%">										
												
											</div>
											
										</td>
										<td height="100%" width="50%">		
											<div id ="apresentação">
												<h1>&nbsp;&nbsp;Honker burger apresenta...<?php echo($consulta['nomeBanda']); ?></h1>
											</div>
											<div id="textinho">
												<?php  echo($consulta['txtCentral']); ?>
												<!--<p>&nbsp;<b>Deep Purple</b> é uma banda britânica de rock formada em Hertford, Hertfordshire, em 1968.É considerada uma das pioneiras do heavy metal e do hard rock moderno, embora alguns de seus integrantes tenham tentado não se categorizar como apenas um destes gêneros.
												A banda também incorpora elementos de música clássica, blues-rock e rock progressivo ao seu som. Foram listados pelo Livro Guiness dos Recordes "como a banda com o som mais alto ao vivo no mundo", e venderam mais de 100 milhões de álbuns ao redor do mundo.<p>A banda passou por diversas mudanças de formação, além de um hiato de oito anos (1976-84). As formações do período 1968-76 foram comumente chamadas de fases I, II, III e IV.Sua segunda formação, a mais bem-sucedida comercialmente, contou com Ian Gillan (vocal), Ritchie Blackmore (guitarra), Jon Lord (teclado), Roger Glover (baixo) e Ian Paice (bateria).Esta formação esteve em atividade de 1969 a 1973, e foi reunida de 1984 a 1989 e, brevemente, em 1993, antes que os atritos entre o guitarrista Ritchie Blackmore e os outros membros da banda se tornassem intransponíveis.</p>
												<p>A formação atual é composta por Paice, Gillan, Glover, o guitarrista Steve Morse (membro desde 1994) e o tecladista Don Airey (que entrou em em 2002 após o afastamento de Jon Lord).</p>  -->				
												
											</div>
							
										</td>
										<td height="100%" width="25%">
										
												<div id="imgband2">
													<img src="cms/<?php  echo($consulta['imagemInfo']); ?>" height="99%" width="100%">
												</div>
												
												<div id="textinho02">
													<p><?php  echo($consulta['txtInfoBanda']); ?></P>
													
													
													<!--<p><h3><font color="#CE401F">&nbsp;&nbsp;&nbsp;&nbsp;Informações gerais </font></h3> </p>
													<p><b>&nbsp;Origem:</b>Hertfordshire, Inglaterra</p>
													<p><b>&nbsp;País:</b> Reino Unido</p>
													<p><b>&nbsp;Gênero:</b> Hard rock, heavy metal</p>
													<p><b>&nbsp;Período em atividade:</b>&nbsp;1968–&nbsp;1976 &nbsp;1984–presente</p>
													<p><b>&nbsp;Gravadoras:</b>&nbsp;Edel, EMI, BMG, &nbsp;Polydor, Warner Bros, &nbsp;Tetragrammaton, Aquarius</p>
													<p><b>&nbsp;Integrantes:</b>&nbsp;Ian Gillan, Roger &nbsp;Glover,Ian Paice,Steve Morse,Don &nbsp;Airey</p>
													<p><b>&nbsp;Ex-Integrantes:</b>&nbsp;Rod Evans, Nick &nbsp;Simper, David Coverdale, Tommy &nbsp;Bolin, Glenn Hughes, Joe Lynn &nbsp;Turner, Ritchie Blackmore, Joe &nbsp;Satriani, Jon Lord</p>-->


												</div>

										</td>
									</tr>
								</table>
							</div>
				<?php
					}

				?>				

					
			
			</section>
			<footer>
				<div id="divisaorodape">
					<div id="info">
						<b>Honker Burger @2017</b>
						<p>Av. Bluffington - nº 666, São Paulo - SP</p>
						 CEP: 0767-410
					</div>
					<table id="redesSociais2">
							<tr> 
								<td><a href="https://www.instagram.com/?hl=pt-br " target="_blank" > <img class="img_redesSociais" src="imagens/insta.png" width="100%" height="100%"></a> </td>
							</tr>
							<tr> 
								<td><a href="https://www.facebook.com/" target="_blank" ><img class="img_redesSociais" src="imagens/facebook.png" width="100%" height="100%"></a> </td>
							</tr>
							<tr> 
								<td><a href="https://twitter.com/?lang=pt-br" target="_blank"><img class="img_redesSociais" src="imagens/twitter.png" width="100%" height="100%"></a> </td>
							</tr>
					</table>
				</div>
			</footer>
		</div>
	</body>
</html>