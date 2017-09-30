<?php

//conexão com o banco
	require_once ('modulo.php');
	session_start();
	
	//quebra de sessão
	if(isset($_POST['btnSair'])){
		include('logout.php');
		
	}
	$consulta="";
	//startando variaveis
	$NomeCategoria="";
	$botaoCat="Cadastrar";
	$botaoSub="Cadastrar";
	$nomesub="";
	
	
	if(isset($_GET['opt'])){
		$opt=$_GET['opt'];
		//Cofiguração excluir das Categorias
		if($opt =='excluirC'){
			$idCategorias=$_GET['codigo'];
			$sql="delete from tblcategorias where idCategorias=".$idCategorias;
			//echo($sql);
			mysql_query($sql);
			header('location:admCatSub.php');
		}
		//configuração editar categorias
		if($opt =='editarC'){
			$idCategorias=$_GET['codigo'];
			
			//variavel global para o update
			$_SESSION['codigo_registro']=$idCategorias;
				
			//buscando o registro no banco conforme o codigo
			$sql="select * from tblcategorias where idCategorias=".$idCategorias;
			$select = mysql_query($sql);

			if($consulta=mysql_fetch_array($select)){
				//resgatando dados do banco
				$NomeCategoria=$consulta['NomeCategoria'];
		
				$botaoCat="Alterar";

			}
		}
		//configuração excluir subcategoria
		if($opt =='excluirS'){
			$idSub=$_GET['codigo'];
			$sql="delete from tblsubcategorias where idSub=".$idSub;
		
			mysql_query($sql);
			header('location:admCatSub.php');
		}
		if($opt =='editarS'){
			$idSub=$_GET['codigo'];
			
			//variavel global para o update
			$_SESSION['codigo_registro']=$idSub;
				
			//buscando o registro no banco conforme o codigo
			$sql="select * from tblsubcategorias where idSub=".$idSub;
			$select = mysql_query($sql);

			if($consulta=mysql_fetch_array($select)){
				//resgatando dados do banco
				$nomesub=$consulta['nomeSub'];

				$botaoSub="Alterar";

			}
		}
	}
	
	if(isset($_POST['btnCadastrarCat'])){ 
		$NomeCategoria=$_POST['txtCategoria'];
		
		if($_POST['btnCadastrarCat']=='Cadastrar'){
			$sql="insert into tblcategorias(NomeCategoria)";
			$sql=$sql."values('".$NomeCategoria."')";
		
		}elseif($_POST['btnCadastrarCat']=='Alterar'){
			$sql="update tblcategorias set NomeCategoria='".$NomeCategoria."' where idCategorias =".$_SESSION['codigo_registro'];
			//echo($sql);
		}
		mysql_query($sql);
		header('location:admCatSub.php');
		
	}
	if(isset($_POST['btnCadastrarSub'])){ 
		$nomesub=$_POST['txtSub'];
		$idCategorias=$_POST['slcCat'];
		
		if($_POST['btnCadastrarSub']=='Cadastrar'){
			$sql00="insert into tblsubcategorias(nomeSub,idCategorias)";
			$sql00=$sql00."values('".$nomesub."','".$idCategorias."')";
			//echo($sql00);
			mysql_query($sql00);
			header('location:admCatSub.php');
		
		}elseif($_POST['btnCadastrarSub']=='Alterar'){
			$sql="update tblsubcategorias set nomeSub='".$nomesub."',idCategorias='".$idCategorias."' where idSub = ".$_SESSION['codigo_registro'];
			//echo($sql);
		
		}
		mysql_query($sql);
		header('location:admCatSub.php');
		
	}
?>

<html>
	<head>
		<title> cms - adm Categoria & SubCategoria </title> 
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
			
			<section>
		
						<nav id="opções">
								<?php  include('moduloMenu.php');?>

							<div id="bemvindo">
								Bem vindo, <?php echo $_SESSION['nome']; ?>
							</div>
						
								<div id="logout">
									<input type="submit" value="Sair" name="btnSair"/>
								</div>
							
						</nav>
				<form name="frmProdutos" method="post" action="admCatSub.php">		
					<div id="inserirUsu">
						<div id="tituloCadastro">
								&nbsp;&nbsp;&nbsp;Cadastre uma Categoria
						</div>
						<div id="tblC" >
							<table>
								<tr> 
									<td class="campoConsultaUsu">
										&nbsp;&nbsp;Nome Categoria
									</td>		
									<td class="td_table">
										<input  value= "<?php echo($NomeCategoria)?>"type="text" name ="txtCategoria" size="40"/>
									</td>
									<td>
										&nbsp;&nbsp;<input type="submit" name ="btnCadastrarCat"  size="30" value="<?php echo($botaoCat);?>"/>

									</td>
									
								</tr>
							</table>
							
						</div>
						<div id="tituloCadastro">
								&nbsp;&nbsp;&nbsp;Consulta Categorias
						</div>
						<div id="tblUsuario" >
							
							<table id="espacoCampos4" >
									<tr> 
										<td class="campoConsultaUsu">
											&nbsp;Nome da Categoria
										</td>
										<td class="campoConsultaUsu">
											&nbsp;Opções
										</td>
									</tr>
									<?php 
								
									$sql="select * from tblcategorias";
									$select=mysql_query($sql);
									while($consulta=mysql_fetch_array($select))
									{
										
									?>
								
										<tr>
											<td class="td_table"> 
												&nbsp;<?php  echo($consulta['NomeCategoria']);?>
											</td>
											<td class="td_table"> 
												<a href="admCatSub.php?opt=excluirC&codigo=<?php echo($consulta['idCategorias']); ?>"><img src="imagens/deletee2.png" alt="delete"></a>
												<a href="admCatSub.php?opt=editarC&codigo=<?php echo($consulta['idCategorias']); ?>"><img src="imagens/editt.png" alt="edit"></a>

											</td>
										
										</tr>
									<?php 
											}
									?>
								
							</table>
						</div>
						<div id="tituloCadastro">
								&nbsp;&nbsp;&nbsp;Cadastre uma subcategoria
						</div>
						<div id="tblC" >
							<table>
								<tr> 
									<td class="campoConsultaUsu">
										&nbsp;&nbsp;Nome da Subcategoria
									</td>		
									<td class="td_table">
										<input  value= "<?php echo($nomesub)?>"type="text" name ="txtSub" size="40"/>
									</td>
								</tr>
								<tr>
									<td class="campoConsultaUsu">
										&nbsp;&nbsp;Nome da categoria
									</td>
									<td class="td_table">
										<select name ="slcCat"> 
												<option value="<?php echo($idCategorias)?>" selected > Selecione um Item
												
												</option>
												
												<?php 
												
													
													$sql="select * from tblcategorias";
													$select=mysql_query($sql);
													while($consulta1=mysql_fetch_array($select))
													{
										
												?>
													<!--apresentando as opções de nivel para o usuario -->
													  <option value="<?php echo($consulta1['idCategorias']); ?>"><?php echo($consulta1['NomeCategoria']);?></option>

												
												<?php
												}
												?>	
										</select>

									</td>
									<td>
										&nbsp;&nbsp;<input type="submit" name ="btnCadastrarSub"  size="30" value="<?php echo($botaoSub);?>"/>

									</td>
									
								</tr>
							</table>
						
						</div>
						<div id="tituloCadastro2">
								&nbsp;&nbsp;&nbsp;Consulta SubCategorias
						</div>
						<div id="tblUsuario" >
							<table id="espacoCampos4" >
								<tr>
										<td class="campoConsultaUsu">
											&nbsp;Nome da subCategoria
										</td>
										<td class="campoConsultaUsu">
											&nbsp;Nome da Categoria 
										</td>
										<td class="campoConsultaUsu">
											&nbsp;Opções
										</td>
								</tr>
								<?php 
								
									$sql="select s.nomeSub,c.idCategorias,s.idSub,c.NomeCategoria
									  from tblsubcategorias as s
									  join  tblcategorias as c
									  on c.idCategorias = s.idCategorias;
									  ";
									  
									$select=mysql_query($sql);
									
									while($consulta0=mysql_fetch_array($select))
									{
								?>
										<tr>
											<td class="td_table"> 
												&nbsp;<?php  echo($consulta0['nomeSub']);?>
											</td>
											<td class="td_table"> 
												&nbsp;<?php  echo($consulta0['NomeCategoria']);?>
											</td>
											<td class="td_table"> 
												<a href="admCatSub.php?opt=excluirS&codigo=<?php echo($consulta0['idSub']); ?>"><img src="imagens/deletee2.png" alt="delete"></a>
												<a href="admCatSub.php?opt=editarS&codigo=<?php echo($consulta0['idSub']); ?>"><img src="imagens/editt.png" alt="edit"></a>

											</td>
										</tr>
								<?php 
									}
								?>
							</table>
						</div>
					</div>
				</form>
			</section>
			
			<footer >
				<div id="desenvolvido">
						Desenvolvido por : Fabiola Almeida de Jesus
				</div>
			</footer>
		</div>
	</body>

</html>