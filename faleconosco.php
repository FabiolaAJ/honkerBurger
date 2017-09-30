<?php 


	
	$nome="";
	$email="";
	$telefone="";
	$mensagem="";
	$celular="";
	$sexo="";
	$chkfeminino ="";
	$chkmasculino ="";
	$facebook ="";
	$homepage ="";
	$botao ="Enviar";
	$nome="";
	$login="";
	$senha="";
	
//*conexão com o banco */
	require_once ('cms/modulo.php');

	session_start();

	if(isset($_GET['btnEnviar'])){
				
		$nome="";
		$login="";
		$senha="";
		$nome=$_GET['txtnome'];
		$telefone=$_GET['txttelefone'];
		$celular=$_GET['txtcelular'];
		$email=$_GET['txtemail'];
		$homepage=$_GET['txthome'];
		$facebook=$_GET['txtlink'];
		$sexo= $_GET['optsexo'];
		$mensagem=$_GET['txtmensagem'];
		
		if($_GET['btnEnviar']=='Enviar'){
			$sql="insert into tblmensagem (nome,telefone,celular,email,homepage,facebook,sexo,mensagem)";
			$sql=$sql."values('".$nome."','".$telefone."','".$celular."','".$email."','".$homepage."','".$facebook."','".$sexo."','".$mensagem."')";
			
		
		}
		
		mysql_query($sql);?>
		
		<?php
			header('location:mensagem.html?modo=fale');

	}
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
		<title> Honker Burger - Fale conosco </title> 
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
					
					<form name="frmlogin" method="post" action="faleconosco.php">
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
					
				<form name="frmlogin" method="get" action="faleconosco.php">
					<div id="divisaofaleconosco">
						<div id="formulario">
							<div id="faleconosco" align="center">
								Fale Conosco
							</div>
							
							<table id="tabelaform" Valign="middle" border="0" >
								<tr>
									<td id="td">Nome:</td>
									<td>
										<input  required pattern="[a-z A-Z]*" placeholder="Digite seu nome" type="text" name="txtnome" size="30" maxlength="50" >
									</td>
								</tr>
								<tr height="15">
									<td> </td>
								</tr>
								<tr>
									<td id="td">Telefone:</td>
									<td>
										<input  pattern="[0-9]{3} [0-9]{4}-[0-9]{4}" placeholder="DDD ****-****" name="txttelefone"type="text"  size="30" maxlength="50">
									</td>
								</tr>
								<tr height="15">
									<td> </td>
								</tr>
								<tr>
									<td id="td">Celular:</td>
									<td>
										<input  pattern="[0-9]{3} [0-9]{5}-[0-9]{4}" placeholder="DDD *****-****" name="txtcelular" type="text"  size="30" maxlength="50">
									</td>
								</tr>
								<tr height="15">
									<td> </td>
								</tr>
								<tr>
									<td id="td">Email:</td>
									<td>
										<input  required placeholder="Digite seu email" required type="email" name="txtemail" value="" size="30" maxlength="50">
									</td>
								</tr>
								<tr height="15">
									<td> </td>
								</tr>
								<tr>
									<td id="td">Home page:</td>
									<td>
										<input placeholder="Digite sua home" name="txthome"type="text"  size="30" maxlength="50">
									</td>
								</tr>
								<tr height="15">
									<td> </td>
								</tr>
								<tr>
									<td id="td">Link Facebook</td>
									<td>
										<input    placeholder="Digite seu link" type="text" name="txtlink"  size="30" maxlength="50">
									</td>
								</tr>
								
								<tr height="15">
									<td> </td>
								</tr>
								<tr>
									<td id="td">Sexo:</td>
									<td>
										<input required type="radio" name="optsexo" value="F">Feminino
										<input required type="radio" name="optsexo" value="M">Masculino
									</td>
								</tr>
								
							</table>
							<table id="tabelaform2" Valign="middle" border="0" >
								<tr>
									<td id="td">Nome:</td>
									<td>
										<input  class="input" required pattern="[a-z A-Z]*" placeholder="Digite seu nome" type="text" name="txtnome" size="60" maxlength="50">
									</td>
								</tr>
								<tr height="15">
									<td> </td>
								</tr>
								<tr>
									<td id="td">Telefone:</td>
									<td>
										<input class="input" pattern="[0-9]{3} [0-9]{4}-[0-9]{4}" placeholder="DDD ****-****" name="txttelefone"type="text"  size="60" maxlength="50">
									</td>
								</tr>
								<tr height="15">
									<td> </td>
								</tr>
								<tr>
									<td id="td">Celular:</td>
									<td>
										<input class="input" pattern="[0-9]{3} [0-9]{5}-[0-9]{4}" placeholder="DDD *****-****" name="txtcelular" type="text"  size="60" maxlength="50">
									</td>
								</tr>
								<tr height="15">
									<td> </td>
								</tr>
								<tr>
									<td id="td">Email:</td>
									<td>
										<input class="input" required placeholder="Digite seu email" required type="email" name="txtemail" value="" size="60" maxlength="50">
									</td>
								</tr>
								<tr height="15">
									<td> </td>
								</tr>
								<tr>
									<td id="td">Home page:</td>
									<td>
										<input class="input" placeholder="Digite sua home" name="txthome"type="text"  size="60" maxlength="50">
									</td>
								</tr>
								<tr height="15">
									<td> </td>
								</tr>
								<tr>
									<td id="td">Link Facebook</td>
									<td>
										<input  class="input"  placeholder="Digite seu link" type="text" name="txtlink"  size="60" maxlength="50">
									</td>
								</tr>
								
								<tr height="15">
									<td> </td>
								</tr>
								<tr>
									<td id="td">Sexo:</td>
									<td>
										<input required type="radio" name="optsexo" value="F"><font size="6">Feminino</font>
										<input required type="radio" name="optsexo" value="M"><font size="6">Masculino</font>
									</td>
								</tr>
								
							</table>
							<table id="mensagem" border="0">
									<tr>
										<td> <font size="9"> Sugestão/Criticas: </font><p> &nbsp;&nbsp;<textarea class="txtmensagem" name="txtmensagem" cols="75" rows="15"><?php echo($mensagem) ?></textarea></p></td>
									</tr>
									 <tr>
										<td>
											<input  class="input"name="btnEnviar" type="submit" value=<?php echo($botao)?> />
										
										</td>
									</tr>
							</table>
						</div>
					</div>
				</form>
			</section>
			<footer>
				<div id="divisaorodape">
					<div id="info">
						Honker Burger @2017
						<p>Av. Bluffington - nº 666, São Paulo - SP</p>
						Tel. +55 011 4956-7890
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