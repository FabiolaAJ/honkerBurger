<?php
	//conexão com o banco
	require_once ('modulo.php');
	session_start();
	//startando variaveis
	$nome="";
	$login="";
	$senha="";
	$botao="Cadastrar";
	$consulta="";

	if(isset($_GET['opt'])){
		$opt=$_GET['opt'];
	

		//exclusão de usuario
		if($opt =='excluir'){
			$idUsuario=$_GET['codigo'];
			$sql="delete from tbl_login where idUsuario=".$idUsuario;
			//echo($sql);
			mysql_query($sql);
			header('location:usuarioadm.php');
			
		//edição dados do usuario
		}elseif($opt=='editar'){
			$idUsuario=$_GET['codigo'];
			//variavel global de sessao para update
			$_SESSION['codigo_registro']=$idUsuario;

			$sql="select * from tbl_login where idUsuario=".$idUsuario;
			
			$select = mysql_query($sql);
			
			if($consulta=mysql_fetch_array($select)){
				//consulta no banco
				$nome=$consulta['nome'];
				$login=$consulta['login'];
				$senha=$consulta['senha'];
						
				//mudando conteudo do botao
				$botao="Alterar";
					
				
			

			}
		}
	}
	if(isset($_POST['btnCadastrar'])){ 
		
		$nome=$_POST['txtnome'];
		$login=$_POST['txtlogin'];
		$senha=$_POST['txtsenha'];
				
						//option
						
		$idNivel=$_POST['slcNivel'];
		
		//salvando cadastro
		if($_POST['btnCadastrar']=='Cadastrar'){
			$sql="insert into tbl_login (nome,login,senha,idNivel)";
			$sql=$sql."values('".$nome."','".$login."','".$senha."','".$idNivel."')";
		
		//alterando caso seu conteudo tenha sido mudado para alterar
		}elseif($_POST['btnCadastrar']=='Alterar'){
			$sql="update tbl_login set nome='".$nome."',login='".$login."',senha='".$senha."',idNivel='".$idNivel."' where idUsuario =".$_SESSION['codigo_registro'];
		}
		mysql_query($sql);
		header('location:usuarioadm.php');

		
	}
	//levando usuario para tela de cadastro de niveis
	if(isset($_POST['btnNivel'])){ 
		header('location:admNIvel.php');

	
	}
	//quebra de sessão
	if(isset($_POST['btnSair'])){
		include('logout.php');
		
	}	
 ?> 
 <!DOCTYPE html>
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
				<form name="usuario" method="post" action="usuarioadm.php">

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
				<div id="inserirUsu">

					
						
					
					<div id="tituloCadastro">
							&nbsp;&nbsp;&nbsp;Cadastre um usuário
					</div>
					<div id="tblUsuario" >
						<form name="frmUsuario" method="post" action="usuarioadm.php">
							<table id="espacoCampos3">
								<tr> 
									<td class="campoConsultaUsu">
										&nbsp;&nbsp;Nome
									</td>		
								</tr>
								
								<tr> 
									<td class="campoConsultaUsu">
										&nbsp;&nbsp;Login
									</td>		
								</tr>
								<tr> 
									<td class="campoConsultaUsu">
										&nbsp;&nbsp;Senha
									</td>		
								</tr>
								<tr> 
									<td class="campoConsultaUsu">
										&nbsp;&nbsp;Nivel
									</td>		
								</tr>
							</table>
							
							<table id="espacoConsulta2"><!--campo para o usuario fazer seu cadastro-->
								<tr> 
									<td class="td_table">
										<input  value= "<?php echo($nome)?>"type="text" name ="txtnome" size="40"/>

									</td>		
								</tr>
								<tr> 
									<td class="td_table">
										<input value="<?php echo($login)?>" type="text" name ="txtlogin" size="40"/>
									</td>		
								</tr>
								<tr> 
									<td class="td_table">
										<input value="<?php echo($senha)?>" type="password" name ="txtsenha" size="40"/>
									</td>		
								</tr>
								<tr>
									
									<td class="td_table">
										
										<select name ="slcNivel"> 
												<option value="<?php echo($idNivel)?>" selected > Selecione um Item</option>
												
												<?php 
												
													
													$sql="select * from tbl_nivel";
													$select=mysql_query($sql);
													while($consulta1=mysql_fetch_array($select))
													{
										
												?>
													<!--apresentando as opções de nivel para o usuario -->
													  <option value="<?php echo($consulta1['idNivel']); ?>"><?php echo($consulta1['nomeNivel']);?></option>

												
												<?php
												}
												?>	
										</select>
										<input type="submit" name ="btnNivel" value="Cadastre um nivel" size="30"/>
									</td>	
						
								</tr>

							</table>
							<div id="espacoCadastrar">
							
								&nbsp;&nbsp;<input type="submit" name ="btnCadastrar" value=<?php echo($botao)?> size="30"/>

							</div>
						</form>
					</div>
					<div id="tituloCadastro">
							&nbsp;&nbsp;Consulta de Usuários
					</div>
					
					<div id="tblUsuario">
					
						<table id="espacoCampos4">
							<tr>  
								<td class="campoConsultaUsu"> 
									&nbsp;&nbsp;Nome
								</td>
								<td class="campoConsultaUsu"> 
									&nbsp;&nbsp;Login
								</td>
								<td class="campoConsultaUsu"> 
									&nbsp;&nbsp;Nivel
								</td>
								<td class="campoConsultaUsu"> 
									&nbsp;&nbsp;Opção
								</td>
							</tr>
							<?php
								$sql="select l.idUsuario,l.nome,l.login,l.idNivel,n.nomeNivel
									  from tbl_login as l
									  Join tbl_nivel as n
									  ON l.idNivel = n.idNivel;
									  ";
								$select=mysql_query($sql);
								while($consulta=mysql_fetch_array($select))
								{
							?>
									<tr>
										<td class="td_table"> 
												&nbsp;<?php  echo($consulta['nome']); ?>
										</td>
									
										<Td class="td_table" > 
												&nbsp;<?php  echo($consulta['login']); ?>

										</td>
										<Td class="td_table" > 
												&nbsp;<?php  echo($consulta['nomeNivel']); ?>

										</td>
										<td class="td_table">
											<a href="usuarioadm.php?opt=excluir&codigo=<?php echo($consulta['idUsuario']); ?>"><img src="imagens/deletee2.png" alt="delete"></a>
											<a href="usuarioadm.php?opt=editar&codigo=<?php echo($consulta['idUsuario']); ?>"><img src="imagens/editt.png" alt="edit"></a>

										</td>
										
									</tr>
					   	<?php   }?>
						</table>
						
					</div>
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