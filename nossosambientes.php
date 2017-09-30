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
		<title> Honker Burger - Nossos ambientes </title> 
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="shortcut icon" href="imagens/logoletrabranca.png">
		<script src="script.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body onload="autoSlide();">
		<header>
			<div id="caixaoculta">
			
					<div id="centralizar">
				
						<div id="logo">
							<img src="imagens/logoletrabranca.png" width="100%" height="100%"> </img>
						</div>
						
						<form name="frmlogin" method="post" action="nossosambientes.php">
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
							<img id="img1" src="imagens/rocklocall.png" height="100%" width="100%">
							<img id="img2" src="imagens/locall.png" height="100%" width="100%">
							<img id="img3" src="imagens/locals2.png" height="100%" width="100%">

						</div>
							<?php 
			
								$sql="select * from tbl_ambientes";
								$select = mysql_query($sql);
								while($consulta=mysql_fetch_array($select)){
			
				
							?>
				
								<div class="ambiente">
										<div class="imgAmbientes">
											<img src="cms/<?php echo($consulta['fotoLocal']); ?>"width="100%" height="100%">
										</div>
										<div class="Endereco">
									
											<p><b>&nbsp;&nbsp;CEP:</b> <?php  echo($consulta['cep']); ?> </p>
											<p><b>&nbsp;&nbsp;Endereço:</b> <?php  echo($consulta['Endereco']); ?></p>
										</div>
										
								</div>
								<!--<div class="ambiente">
										<div class="imgAmbientes"> 
											<img src="imagens/localll.png" width="100%" height="100%"> 

										</div>
										<div class="Endereco">
											<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Honker Burger <font color="#CF1212">(Itapevi)</font>  </b>
											<p><b>&nbsp;&nbsp;Endereço:</b> Av.Rubens Caramez- nº 666 - Itapevi(SP)<p>
											<p><b>&nbsp;&nbsp;CEP:</b> 0665-560</p>
										</div>
										
								</div>-->
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