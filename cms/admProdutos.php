<?php

//conexão com o banco
	require_once ('modulo.php');
	session_start();
	
	//quebra de sessão
	if(isset($_POST['btnSair'])){
		include('logout.php');
		
	}
		
	if(isset($_POST['btnInserir'])){
		$nomeLanche=$_POST['txtNome'];
		$preco=$_POST['txtPreco'];
		$Descricao=$_POST['txtDesc'];
		$subcategorias=$_POST['slcSubCat'];
		//pasta onde as imagens ficarão
		$uploaddir ="arquivos/";
		
		//direcionando imagens para a pasta				
		$foto = basename($_FILES['filefotolanche']['name']);
		$uploadfile = $uploaddir . $foto;
		
		$upload_ext = strtolower(substr($foto,strlen($foto)-3,3));
		
		
		if($upload_ext == 'jpg' || $upload_ext == 'png'){

			if(move_uploaded_file($_FILES['filefotolanche']['tmp_name'],$uploadfile)) {

				$sql="insert into tbl_produtos(nome,descricao,foto,preco,idSub)values('".$nomeLanche."','".$Descricao."','".$uploadfile."','".$preco."','".$subcategorias."');";
				//echo ($sql);
				mysql_query($sql);
				header('location:admProdutos.php');
			}
		}

	}
	if(isset($_POST['btnConsultar'])){
	
		header('location:consultaProdutos.php');

	}
	if(isset($_POST['btnSubCat'])){
		header('location:admCatSub.php');

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
				<form name="admProdutos" method="post" action="admProdutos.php" enctype="multipart/form-data">

						<nav id="opções">
							<?php  include('moduloMenu.php');?>

							<div id="bemvindo">
								Bem vindo, <?php echo $_SESSION['nome']; ?>
							</div>
						
								<div id="logout">
									<input type="submit" value="Sair" name="btnSair"/>
								</div>
							
						</nav>
						<div id="espacoInsert">
							<div id="tituloConsultaMais">
								&nbsp;&nbsp;&nbsp;Administração Produtos
							</div>
							
							<table id="espacoCampos2">
								<tr>
									<td class="campoConsulta">
										&nbsp;&nbsp; Nome do lanche 
									</td>	
								</tr>
							
								<tr>
									<td class="campoConsulta">
										&nbsp;&nbsp;Foto
									</td>		
								</tr>
								<tr>
									<td class="campoConsulta">
										&nbsp;&nbsp;Preço
									</td>		
								</tr>
								<tr>
									<td class="campoConsulta">
										&nbsp;&nbsp;Subcategoria
									</td>		
								</tr>
								<tr>
									<td class="campoConsulta3">
										&nbsp;&nbsp;Descrição
									</td>		
								</tr>
							</table>
							
							
							<table id="espacoConsulta">
								<tr>
									<td class="td_table">
									&nbsp;&nbsp;<input type="text" name ="txtNome" size="50"/>
									</td>
								</tr>
								<tr>
									<td class="td_table">
										<input type="file" name ="filefotolanche" size="50"/>
									</td>
								</tr>
								<tr>
									<td class="td_table" >
										&nbsp;&nbsp;<input type="text" name ="txtPreco"size="10"/>
									</td>
								
								</tr>
						

									<tr>
										<td class="td_table" > 
											
											<select name ="slcSubCat"> 
												<option value="<?php echo($idSub)?>" selected > Selecione um Item</option>
												
												<?php 
												
													
													$sql="select * from tblsubcategorias";
													$select=mysql_query($sql);
													while($consulta1=mysql_fetch_array($select))
													{
										
												?>
													<!--apresentando as opções de nivel para o usuario -->
													  <option value="<?php echo($consulta1['idSub']); ?>"><?php echo($consulta1['nomeSub']);?>
													  
													  </option>

												
												<?php
												}
												?>	
												<input type="submit" name ="btnSubCat" value="Cadastre uma Subcategoria ou uma Categoria" size="30"/>
												
											</select>
										</td>

									
									</tr>
									<tr>
										<td class="td_table"> 
											<textarea  name="txtDesc" cols="40" rows="9"></textarea>
										</td>
									</tr>
									
								
							</table>
							<table id="espacoBotao">
									<tr>
										<td><input type="submit" value="Consultar" id="btn" name="btnConsultar"/></td>
										<td><input type="submit" value="Inserir" id="btn" name="btnInserir"/></td>
										<td><input type="reset" value="Limpar" id="btn" name="btnLimpar" /></td>
									</tr>
							</table>
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