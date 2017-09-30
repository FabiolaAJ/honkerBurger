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
		<title> Honker Burger - Promoções </title> 
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
						
						<form name="frmlogin" method="post" action="promocoes.php">
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
						<img src="imagens/promocao.png" height="100%" width="100%">
				</div>
					<?php 
			
						$sql="select p.idPromocao,p.nomePromocao,p.pDesconto,p.mensagemAdicional,p.idProdutos,pr.nome,pr.foto
								from tbl_promocao as p
								JOIN tbl_produtos as pr
								ON p.idProdutos = pr.idProdutos";
						$select = mysql_query($sql);
						
						while($consulta=mysql_fetch_array($select)){
			
				
					?>
							<div class="promo">
								<div class="imgpromo">
									<img src="cms/<?php echo($consulta['foto']); ?>"width="100%" height="100%">
								</div>
								<div class="descricao">
									<b>Nome: <?php  echo($consulta['nome']); ?></b>
									<p><b>Menssagem Promocional:</b> <?php  echo($consulta['mensagemAdicional']); ?> </p>
									<div class="desconto"><p><b>Desconto : <?php  echo($consulta['pDesconto']); ?></b></p></div>
									<a href="#" class="detalhes">&nbsp;Detalhes</a>
								</div>
											
							</div>
				  <?php 
						}
					?>
							
				<!--<div class="promo">
						<div class="imgpromo">
							<img src="imagens/vegetariano.png" width="100%" height="100%"> 
						</div>
						<div class="descricao">
							<b>Nome: Honker Vegetariano</b>
							<p><b>Preço na promoção :<font color="#CF1212" size="3">8,00</font> Preço original: 10,00</b></p>
								<a href="#" class="detalhes">&nbsp;Detalhes</a>
						</div>
				</div>
				<div class="promo">
						<div class="imgpromo">
							<img src="imagens/simples.png" width="100%" height="100%"> 
						</div>
						<div class="descricao">
							<b>Nome: Honker Simples</b>
							<p><b>Preço na promoção :<font color="#CF1212" size="3">3,00</font> Preço original: 6,50</b></p>
								<a href="#" class="detalhes">&nbsp;Detalhes</a>
						</div>
				</div>
				<div class="promo">
						<div class="imgpromo">
							<img src="imagens/tradicional.png" width="100%" height="100%"> 
						</div>
						<div class="descricao">
							<b>Nome: Tradicional</b>
							<p><b>Preço na promoção :<font color="#CF1212" size="3">6,00</font> Preço original: 11,50</b></p>
								<a href="#" class="detalhes">&nbsp;Detalhes</a>
						</div>
				</div>
				
				<div class="promo">
						<div class="imgpromo">
							<img src="imagens/frango.png" width="100%" height="100%"> 
						</div>
						<div class="descricao">
							<b>Nome: Honker Frango</b>
							<p><b>Preço na promoção :<font color="#CF1212" size="3">9,00</font> Preço original: 12,00</b></p>
								<a href="#" class="detalhes">&nbsp;Detalhes</a>
						</div>
				</div>-->
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