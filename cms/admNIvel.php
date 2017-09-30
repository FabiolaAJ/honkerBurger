<?php

//conexão com o banco
	require_once ('modulo.php');
	session_start();
	
	//quebra de sessão
	if(isset($_POST['btnSair'])){
		include('logout.php');
		
	}
	$botao="Cadastrar";
	$idNivel="";
	$nomeNivel="";

	
	if(isset($_GET['opt'])){
		$opt=$_GET['opt'];
		//exclusão de um nivel
		if($opt =='excluirN'){
			$idNivel=$_GET['codigo'];
			$sql="delete from tbl_nivel where idNivel=".$idNivel;
			//echo($sql);
			mysql_query($sql);
			header('location:admNIvel.php');
			
		//edição de um nivel
		}if($opt =='editarN'){
			$idNivel=$_GET['codigo'];
			
			$_SESSION['codigo_registro']=$idNivel;

			$sql="select * from tbl_nivel where idNivel=".$idNivel;
			
			$select = mysql_query($sql);
			if($consulta1=mysql_fetch_array($select)){
				//consulta no banco
				$idNivel=$consulta1['idNivel'];
				$nomeNivel=$consulta1['nomeNivel'];
		
						
				//mudando conteudo do botao
				$botao="Alterar";
					
				
			

			}

		}
	}
	if(isset($_POST['btnCadastrar'])){ 
		//pegando os dados que o usuario digitou e guardando em variaveis
		$nomeNivel=$_POST['txtnome'];
		$idNivel=$_POST['txtid'];
		//configuração do botao cadastrar
		if($_POST['btnCadastrar']=='Cadastrar'){
			
			$sql="insert into tbl_nivel(idNivel,nomeNivel)";
			$sql=$sql."values('".$idNivel."','".$nomeNivel."')";
			
		}elseif($_POST['btnCadastrar']=='Alterar'){
			//salvando alteração
			$sql="update tbl_nivel set idNivel='".$idNivel."',nomeNivel='".$nomeNivel."'where idNivel =".$_SESSION['codigo_registro'];
			//echo($sql);
		}
		mysql_query($sql);
		
		header('location:admNIvel.php');
		
	}
?>

<html>
	<head>
		<title> cms </title> 
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="shortcut icon" href="imagens/logoletrabranca.png">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body >
		
		<div id="principal">
			<header >
				<div id="logo">
					<img src="imagens/logoletrabranca.png" width="100%" height="100%">
				</div>
				<div id="titulo">
					<b>CMS</b> - Sistema de Gerenciamento do Site
				</div>
			</header>
			
			<section >
				<form name="nivel" method="post" action="admNIvel.php">

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
							&nbsp;&nbsp;&nbsp;Cadastre um nivel
					</div>
					<div id="tblUsuario" >
					
						<form name="frmNivel" method="post" action="admNIvel.php">
							<table>
								<tr> 
									<td class="campoConsultaUsu">
										&nbsp;&nbsp;idNível
									</td>		
									<td class="td_table">
										<input  value= "<?php echo($idNivel)?>"type="text" name ="txtid" size="40"/>

									</td>
									
								</tr>
								<tr> 
									<td class="campoConsultaUsu">
										&nbsp;&nbsp;Nome do &nbsp;Nível
									</td>		
									<td class="td_table">
										<input  value= "<?php echo($nomeNivel)?>"type="text" name ="txtnome" size="40"/>

									</td>
									<td>
										&nbsp;&nbsp;<input type="submit" name ="btnCadastrar"  size="30" value="<?php echo($botao);?>"/>


									</td>
								</tr>
							</table>
					</div>
					<div id="tituloCadastro">
							&nbsp;&nbsp;&nbsp;Consulta nivel
					</div>
					<div id="tblUsuario" >
					
							
							
						
							<table id="espacoCampos4" >

									<tr> 
										<td class="campoConsultaUsu">
											&nbsp;IdNivel
						
									
										<td class="campoConsultaUsu">
											&nbsp;Nome do Nivel
										</td>
										<td class="campoConsultaUsu">
											&nbsp;Opções
										</td>
									</tr>
							<?php 
								
								$sql="select * from tbl_nivel";
								$select=mysql_query($sql);
								while($consulta1=mysql_fetch_array($select))
								{
										
							?>

									<tr>
										<td class="td_table"> 
												&nbsp;<?php  echo($consulta1['idNivel']); ?>
										</td>

										<td class="td_table"> 
												&nbsp;<?php  echo($consulta1['nomeNivel']); ?>
										</td>
										<td class="td_table"> 
											<a href="admNIvel.php?opt=excluirN&codigo=<?php echo($consulta1['idNivel']); ?>"><img src="imagens/deletee2.png" alt="delete"></a>
											<a href="admNIvel.php?opt=editarN&codigo=<?php echo($consulta1['idNivel']); ?>"><img src="imagens/editt.png" alt="edit"></a>

										</td>
									</tr>
							<?php
								}
								?>
							</table>	
							
						</form>
					</div>		
				</div>	
				
				</div>
			</section>
			
			<footer >
				<div id="desenvolvido">
						Desenvolvido por : Fabiola Almeida de Jesus
				</div>
			</footer>
		</div>
	</body>

</html>