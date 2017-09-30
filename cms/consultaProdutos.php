<?php

//conexão com o banco
	require_once ('modulo.php');
	session_start();
	
	//quebra de sessão
	if(isset($_POST['btnSair'])){
		include('logout.php');
		
	}
	//Startando variaveis
	$Nome="";
	$preco="";
	$Descricao="";
	if(isset($_GET['opt'])){
		$opt=$_GET['opt'];
	
		//exclusão de lanche do Produto
		if($opt =='excluir'){
			$idProdutos=$_GET['codigo'];
			$sql="delete from tbl_produtos where idProdutos=".$idProdutos;
			//echo($sql);
			mysql_query($sql);
			header('location:consultaProdutos.php');
		}
		//configuração do botao editar
		if($opt =='editar'){
			$idProdutos=$_GET['codigo'];
					//variavel global de sessao para update
			$_SESSION['codigo_registro']=$idProdutos;
			
			$sql="select * from tbl_produtos where idProdutos=".$idProdutos;
			//echo($sql);
			$select = mysql_query($sql);
			
			if($consulta1=mysql_fetch_array($select)){
				//resgatando os dados do banco e guardando em variaveis locais
				$Nome=$consulta1['nome'];
				$uploadfile=$consulta1['foto'];
				$preco=$consulta1['preco'];
				$Descricao=$consulta1['descricao'];
				$Subcategoria=$consulta1['idSub'];

			}
		}
		//codigo para configurar a seleção dos produtos
		if($opt== 'status'){
			$idProdutos=$_GET['codigo'];
			
			$sql="update tbl_produtos set statusLanche= 0";
			//echo($sql);
			mysql_query($sql);
			header('location:consultaProdutos.php');
			
			//edição do status se caso "checkbox" estiver selecionado
			$sql="update tbl_produtos set statusLanche= 1 where idProdutos=".$idProdutos;
			//echo($sql);
			mysql_query($sql);
			header('location:consultaProdutos.php');
		}
		
	}
		//salvar edição
	if(isset($_POST['btnAlterar'])){
		$Nome=$_POST['txtNome'];	
		$preco=$_POST['txtPreco'];	
		$Descricao=$_POST['txtDesc'];	
		$subcategoria=$_POST['slcSub'];
		//pasta para guardar as imagens
		$uploaddir ="arquivos/";
		
		
		//direcionamento das imagens ate a pasta arquivos
		$foto_lanche = basename($_FILES['filefotolanche']['name']);
		$uploadfile = $uploaddir . $foto_lanche;
				
		$upload_ext = strtolower(substr($foto_lanche,strlen($foto_lanche)-3 ,3));

		//checando extensão da imagem
		if($upload_ext == 'jpg' || $upload_ext == 'png'){
			if(move_uploaded_file($_FILES['filefotolanche']['tmp_name'],$uploadfile)) {
				//salvando a edição no banco
				$sql="update tbl_produtos set nome='".$Nome."',descricao='".$Descricao."',foto='".$uploadfile."',preco='".$preco."',idSub='".$subcategoria."' where idProdutos =".$_SESSION['codigo_registro'];
				echo($sql);
				mysql_query($sql);
				header('location:consultaProdutos.php');

			}
		}
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
	
						<nav id="opções">
							<?php  include('moduloMenu.php');?>

							<div id="bemvindo">
								Bem vindo, <?php echo $_SESSION['nome']; ?>
							</div>
						
								<div id="logout">
									<input type="submit" value="Sair" name="btnSair"/>
								</div>
							
						</nav>
					
				<form name="consultaProdutos" method="post" action="consultaProdutos.php" enctype="multipart/form-data">
						<!--tabela para consulta-->
					<div id="espacoInsert">
						<div id="tituloConsultaMais">
							&nbsp;&nbsp;&nbsp;Consulta de Produtos
						</div>
						<table id="espacoCampos41">
							<tr>  
								<td class="campoConsultaUsu"> 
									&nbsp;&nbsp;Nome do lanche
								</td>
								<td class="campoConsultaUsu"> 
									&nbsp;&nbsp;foto
								</td>
								<td class="campoConsultaUsu"> 
									&nbsp;&nbsp;Preco
								</td>
								<td class="campoConsultaUsu"> 								
									Categoria
								</td>
								<td class="campoConsultaUsu"> 
									&nbsp;&nbsp;Subcategoria
								</td>
								<td class="campoConsultaUsu"> 
									&nbsp;&nbsp;Descricao
								</td>
								<td class="campoConsultaUsu"> 
									&nbsp;&nbsp;Opções
								</td>
							</tr>
							<?php
								//select nas tabelas relacionadas
								$sql="select p.idProdutos,p.nome,SUBSTRING(descricao,1,55) as descricao,p.foto,p.preco,p.idSub,c.nomeCategoria,s.nomeSub,s.idCategorias,p.statusLanche
									  from tbl_produtos as p
									  join tblsubcategorias as s
									  on p.idSub = s.idSub
									  join tblcategorias as c
									  on s.idCategorias = c.idCategorias;
									  ";
								$select=mysql_query($sql);
								while($consulta1=mysql_fetch_array($select))
								{
							?>
								<tr>
									<td class="td_table"> 
										&nbsp;<?php echo($consulta1['nome']); ?>
									</td>
									<td class="td_table"> 
										&nbsp;<img src="<?php echo($consulta1['foto']); ?>" class="imgConsulta"/>
									</td>
									<td class="td_table"> 
										&nbsp;<?php echo($consulta1['preco']); ?>
									</td>
									<td class="td_table"> 
										&nbsp;<?php echo($consulta1['nomeCategoria']); ?>
									</td>
									<td class="td_table"> 
										&nbsp;<?php echo($consulta1['nomeSub']); ?>
									</td>
									<td class="td_table"> 
										&nbsp;<?php echo($consulta1['descricao']); ?>
									</td>
									<td class="td_table"> 
											<a href="consultaProdutos.php?opt=excluir&codigo=<?php echo($consulta1['idProdutos']); ?>">
												<img src="imagens/deletee2.png"> </img>
											</a>
						
											<a href="consultaProdutos.php?opt=editar&codigo=<?php echo($consulta1['idProdutos']);?>">
												<img src="imagens/editt.png"> </img>
											</a>
											
											

									</td>
								</tr>
							<?php 
								}
							?>
						
					</div>
					<!-- espaço para o usuario fazer a edição do insert -->

						<table id="espacoCampos41">
								<tr>  
									<td class="campoConsultaUsu"> 
											&nbsp;&nbsp;Nome do&nbsp;Lanche
									</td>
									
									<td class="campoConsultaUsu"> 
											&nbsp;&nbsp;Foto
									</td>
									<td class="campoConsultaUsu"> 
											&nbsp;&nbsp;Preco
									</td>
									<td class="campoConsultaUsu"> 
											&nbsp;&nbsp;Subcategoria
									</td>
									<td class="campoConsultaUsu"> 
											&nbsp;&nbsp;Descricao
									</td>
								</tr>
									
								<tr>
									<td  class="td_table"> 
										<input value = "<?php echo($Nome)?>" type="text" name ="txtNome"   size="16"/>

									</td>
									<td class="td_table"> 
										<input value = "<?php echo($uploadfile)?>" type="file" name ="filefotolanche"   size="16"/>

									</td>
									<td class="td_table"> 
										<input value = "<?php echo($preco)?>" type="text" name ="txtPreco"   size="16"/>
									</td>
									<td class="td_table"> 
											<select name ="slcSub"> 
												<option value="<?php echo($idSub)?>" selected > Selecione um Item</option>
												<?php 
													$sql="select * from tblsubcategorias ";
													$select=mysql_query($sql);
													while($consulta1=mysql_fetch_array($select))
													{
												?>

														<option value="<?php echo($consulta1['idSub']); ?>"><?php echo($consulta1['nomeSub']);?></option>												
												<?php
													}
												?>
											</select>
											

									</td>
									<td>
										<textarea  name="txtDesc" cols="30" rows="9"><?php echo($Descricao)?></textarea>

									</td>
								</tr>
						</table>
						<table id="espacoBotao">
							<tr>
								<td><input type="submit" value="Alterar" id="btn" name="btnAlterar"/></td>

								
							</tr>
						</table>
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