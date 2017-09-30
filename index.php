<?php
	
	$nome="";
	$login="";
	$senha="";

//conexão com o banco
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
			$_SESSION['idNivel'] = $consulta['idNivel'];
			
			header('location:cms/cms.php');
		}else{?>
				<script>
					alert("Usuario invalido!");
				</script>
	<?php	}
		
	}
	
	//contagem de cliques em detalhes do produto
	if(isset($_GET['lanche'])){
			$idProdutos=$_GET['codigo'];
			

			header('location:Detalhes.php');
											
														
													
														
	}			
																																																				
	
 ?>
<html>
	<head>
	
	
		<title> Honker Burger </title> 
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
					
					<form name="frmlogin" method="post" action="index.php">
						<div id="autenticacao">
							Usuário: <input   type="text" name ="txtusuario" size="12"/>&nbsp;
							Senha: <input type="password" name ="txtsenha" size="12"/>
							
							<input   name="btnEntrar" type="submit" value="Entrar"  >
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
							<form name="frmhome" method="post" action="index.php">

								<div id="buscar0">
							
									<input  id="input_pesquisar0" name="txtbusca" placeholder="buscar...">

									<div id="busca0">
										<img width="100%" height="100%" src="imagens/buscaa.png"/>
									</div>
								</div>	
							</form>
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
						<img  class="slides" src="imagens/bannerlanche.png" > 
						<img  class="slides"src="imagens/band2.png" >
						<img class="slides" src="imagens/promocao.png" >
						<button class="button" onClick="plusIndex(-1)" id="btn1">&#10094; </button>
						<button class="button" onClick="plusIndex(1)" id="btn2">&#10095; </button>

					</div>
				
						
		
					<nav id="menu">
						<form name="frmhome" method="post" action="index.php">

											<?php
													/*$sql="select s.idSub,s.nomeSub,s.idCategorias,c.NomeCategoria 
														from tblsubcategorias  as s
														JOIN  tblcategorias as c
														ON s.idCategorias = c.idCategorias";*/
													$sql="select * from tblcategorias";
													$select=mysql_query($sql);
													while($consulta1=mysql_fetch_array($select))
													{
											?>
											
												<table>
													<tr>
														<td>
															<ul >
																<li class="letra">	
																	<a href="index.php?categoria=<?php echo($consulta1['idCategorias']); ?>"><p><b><?php echo($consulta1['NomeCategoria']);?></b></p></a>
																
																		<?php 
																			$sql1="select * from tblsubcategorias where idCategorias = ".$consulta1['idCategorias'];
																			$select1=mysql_query($sql1);
																			while($consulta=mysql_fetch_array($select1))
																			{	
																		?>
																			<ul>	
																				<li class="letra2">
																					
																							<a href="index.php?subcategoria=<?php echo($consulta['idSub']); ?>"><p><?php echo($consulta['nomeSub']);?></p></a>

																				</li>
																			</ul>																														

																		<?php 
																			}
																		?>
																	
																</li>
															</ul>
														</td>
													</tr>
												</table>
										<?php
											}
										?>		
											
								
					</nav>
							<div id="buscar">
							
								<input  id="input_pesquisar" name="txtbusca" placeholder="buscar...">

								<div id="busca">
									<img width="100%" height="100%" src="imagens/buscaa.png"/>
								</div>
							</div>
								<?php 
										$sql0="select idProdutos,nome,substring(descricao,1,60) as descricao,foto,preco,idSub,clickDetalhes from tbl_produtos order by rand()";
										if(isset($_GET['subcategoria'])){
											$sql0 = "select idProdutos,nome,substring(descricao,1,60) as descricao,foto,preco,idSub,clickDetalhes from tbl_produtos where idSub=".$_GET['subcategoria']." order by rand();";											
										}
										if(isset($_GET['categoria'])){
											$sql0 = "select p.idProdutos,p.nome,substring(p.descricao,1,60) as descricao,p.foto,p.preco,p.idSub,p.clickDetalhes from tbl_produtos as p join tblsubcategorias as s 
											ON p.idSub=s.idSub join tblcategorias as c on s.idcategorias = c.idcategorias where c.idcategorias=".$_GET['categoria']." order by rand();";											
										}
										if(isset($_POST['txtbusca'])){
											$busca = $_POST['txtbusca'];
											$sql0 = "select idProdutos,nome,substring(descricao,1,60) as descricao,foto,preco,idSub,clickDetalhes from tbl_produtos where nome like  '%".$busca."%'";
										}
										
										$selectt=mysql_query($sql0);
										$consultaa=($selectt);
											while($consultaa=mysql_fetch_array($selectt))
											{
												
												
												
								?>
												<div class="produto">
													<div class="imgproduto">
														<img src="cms/<?php  echo($consultaa['foto']); ?>" height="100%" width="100%"/>
													</div>
													<div class="descricao">
														<b>Nome:</b><?php echo($consultaa['nome']);?>
														<p><b>Descrição:</b> <?php echo($consultaa['descricao']);?>...
														</p>
														<p><b>Preço:</b> <?php echo($consultaa['preco']);?></p>
														
														
															<a href="Detalhes.php?lanche&detalhes=<?php echo ($consultaa['clickDetalhes']); ?>&codigo=<?php echo($consultaa['idProdutos']); ?>" class="Detalhes">&nbsp;Detalhes</a>
													</div>
												</div>
										
								<?php
												
											}
								?>
								
								
						</form>
	
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