<?php 
//*conexão com o banco */
	require_once ('cms/modulo.php');

	
	
	session_start(); 
	
	
	$nome="";
	$login="";
	$senha="";
	
	
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
		<title> Honker Burger - Sobre </title> 
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
							
							<form name="frmlogin" method="post" action="sobre.php">
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
					$sql="select * from tbl_sobre where statusSobre= 1 ";
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
							<img src="imagens/rockinburger.jpg" height="100%" width="100%">

						</div>
						<div id="divisaoo">
							<table width="100%" height="100%" border="0">
							
								<tr >
									<td height="100%" width="25%">
										
										
										<div class="img00">
											<img src="cms/<?php echo($consulta['imagemMaior']); ?>" width="100%" height="100%">					
											
										</div>
										<div class="imgband">
											<img src="cms/<?php echo($consulta['imagem1']); ?>" width="100%" height="100%">					
										</div>
										
									</td>
									
									<td height="100%" width="50%">
										<div id ="apresentação">
											<h1> &nbsp;&nbsp;Sobre Honker Buger</h1>
										</div>
										<div id="textinho">
											<p><?php  echo($consulta['Texto']); ?></P>

											<!--<p>&nbsp;Honker burger foi fundado por Roger Klotz no ano de 1992 em &nbsp;São Paulo, com finalidade de fazer uma hamburgueria com um &nbsp;diferencial que chamasse a atenção das pessoas, amante de rock &nbsp;sr.Klotz decidiu fazer a sua hamburgueria com tema de rock 'n' &nbsp;roll e 
											carros, o que fez com que ela ganhasse popularidade pela &nbsp;sua essência ainda no ano que foi fundada, e fazendo sucesso até &nbsp;hoje.</p>
											
											<p> &nbsp;Sr.Roger Klotz, nasceu em 1925 e faleceu em 2010 com 85 anos &nbsp;por uma parada cardiaca,
											e deixou sua hamburgueria com seus &nbsp;filhos Alice Klotz e Robert Klotz, 
											nesse ano Honker burger sofreu &nbsp;uma grande dificuldade financeira,
											pela inexperiência que Alice e &nbsp;Robert tinham com a administração do dinheiro que ganhavam,
											&nbsp;as condições financeiras foram melhorando aos poucos, e a &nbsp;hamburgueria voltou com seu grande sucesso no meio do ano &nbsp;seguinte. </p>
											
											<p>&nbsp;Alice e Robert administram Honker Burger até hoje com muito &nbsp;carinho e dizem:"Somos muito gratos pelo nosso publico fiel, &nbsp;funcionarios de toda nossa rede,
											&nbsp;e por toda equipe, nossa familia &nbsp;e amigos que nos ajudaram em tempos dificeis.E nunca &nbsp;desistiremos do sonho de melhorar cada vez mais esse presente &nbsp;que ganhamos do nosso pai, e vamos cuidar da hamburgueria &nbsp;com todo carinho do mundo assim como ele cuidava."</p>
															
											<p> &nbsp;Esse ano Honker Burger fez 25 anos, e somos gratos a todos pelo &nbsp;carinho e sucesso! </p>-->
											
										</div>
										
									</td>
							
							
									<td height="100%" width="25%">
										 <div class="imgband">
												<img src="cms/<?php echo($consulta['imagem2']); ?>" width="85%" height="100%">					
										 </div>
										 <div class="imgband">
												<img src="cms/<?php echo($consulta['imagem3']); ?>" width="85%" height="100%">  
										 </div>
										 <div class="imgband">
												<img src="cms/<?php echo($consulta['imagem4']); ?>" width="85%" height="100%">  
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