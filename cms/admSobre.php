
<?php 
//conexão com  banco
	require_once ('modulo.php');
	session_start();
	
	//configuração do botao de inserir
	if(isset ($_POST["btnInserir"])){
		$Texto=$_POST['txtSobre'];
		
		//pasta de destino das imagens
		$uploaddir ="arquivos/";
			
		//direcionando imagens ate sua pasta de destino
		$foto_nome = basename($_FILES['filefotomaior']['name']);
		$uploadfile = $uploaddir . $foto_nome;
			
		$foto_nome2 = basename($_FILES['filefotoesquerda']['name']);
		$uploadfile2 = $uploaddir . $foto_nome2;
			
		$foto_nome3 = basename($_FILES['filefotodireita1']['name']);
		$uploadfile3 = $uploaddir . $foto_nome3;
	
		$foto_nome4 = basename($_FILES['filefotodireita2']['name']);
		$uploadfile4 = $uploaddir . $foto_nome4;
		
		$foto_nome5 = basename($_FILES['filefotodireita3']['name']);
		$uploadfile5 = $uploaddir . $foto_nome5;
		
		$upload_ext = strtolower(substr($foto_nome,strlen($foto_nome)-3 ,3));
		$upload_ext2 = strtolower(substr($foto_nome2,strlen($foto_nome2)-3 ,3));
		$upload_ext3 = strtolower(substr($foto_nome3,strlen($foto_nome3)-3 ,3));
		$upload_ext4 = strtolower(substr($foto_nome4,strlen($foto_nome4)-3 ,3));
		$upload_ext5 = strtolower(substr($foto_nome5,strlen($foto_nome5)-3 ,3));
		
		//verificando extenções de imagens
		if($upload_ext == 'jpg' || $upload_ext == 'png' && $upload_ext2 == 'jpg' || $upload_ext2 == 'png' && $upload_ext3 == 'jpg' || $upload_ext3 == 'png' && $upload_ext4 == 'jpg' || $upload_ext4 == 'png' && $upload_ext5 == 'jpg' || $upload_ext5 == 'png')
		{
			if(move_uploaded_file($_FILES['filefotomaior']['tmp_name'],$uploadfile)) {
				if (move_uploaded_file($_FILES['filefotoesquerda']['tmp_name'],$uploadfile2)){
					if(move_uploaded_file($_FILES['filefotodireita1']['tmp_name'],$uploadfile3)){
						if(move_uploaded_file($_FILES['filefotodireita2']['tmp_name'],$uploadfile4)){
							if(move_uploaded_file($_FILES['filefotodireita3']['tmp_name'],$uploadfile5)){
								//salvando insert na tabela
								$sql ="insert into tbl_sobre(Texto,imagemMaior,imagem1,imagem2,imagem3,imagem4)values('".$Texto."','".$uploadfile."','".$uploadfile2."','".$uploadfile3."','".$uploadfile4."','".$uploadfile5."');";
								mysql_query($sql);
								
								header('location:admSobre.php');
							}
						}
					
					}
				}
				
			}
		}
	}
	//configuração do botao de consulta
	if(isset ($_POST["btnConsultar"])){
		//direcionando usuario para pagina de consulta do sobre
		header('location:consultaSobre.php');

		
	}
	//quebra de sessão
	if(isset($_POST['btnSair'])){
		include('logout.php');
		
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
				<form name="sobre" method="post" action="admSobre.php">

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
				
				<!-- formulario para cadastro de conteudos da pagina sobre-->
				<form name="frmsobre" method="post" enctype="multipart/form-data" action="admSobre.php"> 
					<div id="espacoInsert">
						<div id="tituloConsultaMais">
							&nbsp;&nbsp;&nbsp;Administração Sobre
						</div>
					
						<table id="espacoCampos2">
							<tr>
								<td class="campoConsulta">
									&nbsp;&nbsp;Imagem Maior a esquerda
								</td>		
							</tr>
							<tr>
								<td class="campoConsulta">
									&nbsp;&nbsp;Imagem a esquerda
								</td>		
							</tr>
						
							<tr>
								<td class="campoConsulta">
									&nbsp;&nbsp;Primeira imagem a direita
								</td>		
							</tr>
							<tr>
								<td class="campoConsulta">
									&nbsp;&nbsp;Segunda imagem a direita
								</td>		
							</tr>
							<tr>
								<td class="campoConsulta">
									&nbsp;&nbsp;Terceira imagem a direita
								</td>		
							</tr>
							
							<tr>
								<td class="campoConsulta3">
									&nbsp;&nbsp;Texto
								</td>		
							</tr>
						</table>
						<table id="espacoConsulta">
							<tr>
								<td  class="td_table">
								&nbsp;&nbsp;<input type="file" name ="filefotomaior"  value="Escolher arquivo" size="12"/>

								</td>
							</tr>
							<tr>
								<td  class="td_table">
								&nbsp;&nbsp;<input type="file" name ="filefotoesquerda"  value="Escolher arquivo" size="12"/>

								</td>
							</tr>
							<tr>
								<td class="td_table">
									&nbsp;&nbsp;<input type="file" name ="filefotodireita1"  value="Escolher arquivo" size="12"/>

								</td>
							</tr>
							<tr>
								<td  class="td_table">
									&nbsp;&nbsp;<input type="file" name ="filefotodireita2"  value="Escolher arquivo" size="12"/>

								</td>
							</tr>
							<tr>
								<td  class="td_table">
									&nbsp;&nbsp;<input type="file" name ="filefotodireita3"  value="Escolher arquivo" size="12"/>

								</td>
							</tr>
							<tr>
								<td  class="td_table">
									&nbsp;&nbsp;<textarea name="txtSobre" cols="50" rows="9"></textarea>

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