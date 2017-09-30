<?php
	//*conexão com o banco */
	require_once ('cms/modulo.php');
	
	session_start(); 
	$idProdutos=$_GET['codigo'];


	
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

	//contagem de cliques em detalhes do produto
	if(isset($_GET['lanche'])){
			$idProduto=$_GET['codigo'];
			$detalhes=$_GET['detalhes'];			
			$sql="update tbl_produtos set clickDetalhes='".$detalhes."'+1 where idProdutos=".$idProduto;					
			//echo($sql);
			mysql_query($sql);								
														
	}		

?>
<html>
	<head>
		<title> Honker Burger - Detalhes </title> 
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
							
							<form name="frmlogin" method="post" action="Detalhes.php">
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
		</header>
	</body>
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
				<?php
					$sqql="select * from tbl_produtos where idProdutos=".$idProdutos;
								  
							$selectt = mysql_query($sqql);
							while($consulta=mysql_fetch_array($selectt)){
				
				
				?>
						<div id="slider">
							<div id="nomeLanche2">
								<b><?php  echo($consulta['nome']); ?></b>
							</div>
							<img src="imagens/lanchemees.png" />
							
						</div>
						<table	width="100%" height="58%" border="0" Valign="middle">
							<tr>
								<td width="30%">
									
									<div id="lanche">
										<div id="lanchemes">
											<img src="cms/<?php  echo($consulta['foto']); ?>" width="100%" height="100%"/>
										</div>
										<div id="nomelanche">
											<h1>&nbsp;&nbsp;&nbsp;<b><?php  echo($consulta['nome']); ?></b></h1>
										
										</div>
										<p> &nbsp;&nbsp;Valor: R$<?php  echo($consulta['preco']); ?></p>

									</div>
								</td>
								<td width="70%">
									<div id="descricaolanchemes">
										<div id="titulodescricao">
											&nbsp; Descrição do lanche
										</div>
										<div id="descricaoo">
											<?php  echo($consulta['descricao']); ?>
											<!--<p> &nbsp; Pão com gergilim com três deliciosos andares de hambúrgueres grelhados, com muito cheddar derretido e muito bacon, acompanhados por um molho especial que você só encontra no Honker Triplo. </p>-->
										</div>
									</div>
								</td>
							</tr>
						</table>
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
</html>