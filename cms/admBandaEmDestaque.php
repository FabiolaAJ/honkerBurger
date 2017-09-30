<?php

	//conexão com o banco
	require_once ('modulo.php');
	session_start();
		
	//quebra de sessão
	if(isset($_POST['btnSair'])){
		include('logout.php');
		
	}
	
//configuração botao excluir	
	if(isset($_POST['btnInserir'])){
		
		$nomeBanda=$_POST['txtnome'];
		$txtCentro=$_POST['txtbanda'];
		$infoBanda=$_POST['txtinfo'];
		
		//pasta onde as imagens ficarão
		$uploaddir ="arquivos/";

		//direcionando imagens para a pasta				
		$foto_info = basename($_FILES['filefotoinfo']['name']);
		$uploadfile = $uploaddir . $foto_info;
		
		$foto_apresentacao = basename($_FILES['filefotoapresentacao']['name']);
		$uploadfile1 = $uploaddir . $foto_apresentacao;
		
		$foto_direita = basename($_FILES['filefotoprimeira']['name']);
		$uploadfile2 = $uploaddir . $foto_direita;
		
		$foto_direita2 = basename($_FILES['filefotosegunda']['name']);
		$uploadfile3 = $uploaddir . $foto_direita2;
			
		$foto_direita3 = basename($_FILES['filefototerceira']['name']);
		$uploadfile4 = $uploaddir . $foto_direita3;
		
		$upload_ext = strtolower(substr($foto_info,strlen($foto_info)-3 ,3));
		$upload_ext2 = strtolower(substr($foto_apresentacao,strlen($foto_apresentacao)-3 ,3));
		$upload_ext3 = strtolower(substr($foto_direita,strlen($foto_direita)-3 ,3));
		$upload_ext4 = strtolower(substr($foto_direita2,strlen($foto_direita2)-3 ,3));
		$upload_ext5 = strtolower(substr($foto_direita3,strlen($foto_direita3)-3 ,3));
		
		
		//verificação das extenções das imagens
		if($upload_ext == 'jpg' || $upload_ext == 'png' && $upload_ext2 == 'jpg' || $upload_ext2 == 'png' && $upload_ext3 == 'jpg' || $upload_ext3 == 'png' && $upload_ext4 == 'jpg' || $upload_ext4 == 'png' && $upload_ext5 == 'jpg' || $upload_ext5 == 'png')
		{
			
			if(move_uploaded_file($_FILES['filefotoinfo']['tmp_name'],$uploadfile)) {
				
				if(move_uploaded_file($_FILES['filefotoapresentacao']['tmp_name'],$uploadfile1)){
				
					if(move_uploaded_file($_FILES['filefotoprimeira']['tmp_name'],$uploadfile2)) {
						
						if(move_uploaded_file($_FILES['filefotosegunda']['tmp_name'],$uploadfile3)) {
							if(move_uploaded_file($_FILES['filefototerceira']['tmp_name'],$uploadfile4)) {
								$sql="insert into tbl_banda(nomeBanda,txtCentral,txtInfoBanda,imagemApresentacao,imagemInfo,imagem1,imagem2,imagem3)values('".$nomeBanda."','".$txtCentro."','".$infoBanda."','".$uploadfile1."','".$uploadfile."','".$uploadfile2."','".$uploadfile3."','".$uploadfile4."');";
								//echo($sql);
								mysql_query($sql);
								header('location:admBandaEmDestaque.php');
							}
						}
					}
				}
			}else{
				
				echo("ERRO no envio do arquivo");

			}	
		}
	}
	//configuração do botao de consulta 
	if(isset($_POST['btnConsultar'])){
		header('location:consultaBanda.php');

		
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
			<header>
				<div id="logo">
					<img src="imagens/logoletrabranca.png" width="100%" height="100%">
				</div>
				<div id="titulo">
					<b>CMS</b> - Administrar Banda em Destaque
				</div>
			</header>
			
			<section>
				<form name="banda" method="post" action="admBandaEmDestaque.php">

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
				<!-- formulario para cadastro da banda -->
				<form name="frmbanda" method="post" enctype="multipart/form-data" action="admBandaEmDestaque.php"> 
					<div id="espacoInsert">
						<div id="tituloConsultaMais">
							&nbsp;&nbsp;&nbsp;Administração Banda em Destaque
						</div>
						
						<table id="espacoCampos2">
							<tr>
								<td class="campoConsulta" type="text" name="txtnomebanda">
									&nbsp;&nbsp;Nome da banda
								</td>		
							</tr>
							<tr>
								<td class="campoConsulta3" align="center">
										Texto Central
								</td>		
							</tr>
							<tr>
								<td class="campoConsulta3" align="center">
									Informações gerais da banda
								</td>		
							</tr>
							<tr>
								<td class="campoConsulta">
									&nbsp;&nbsp;Imagem de informações gerais
								</td>		
							</tr>
							<tr>
								<td class="campoConsulta">
									&nbsp;&nbsp;Imagem de apresentação 
								</td>		
							</tr>
							<tr>
								<td class="campoConsulta">
									&nbsp;&nbsp;Primeira imagem á direita
								</td>		
							</tr>
							<tr>
								<td class="campoConsulta">
									&nbsp;&nbsp;Segunda imagem á direita
								</td>		
							</tr>
							<tr>
								<td class="campoConsulta">
									&nbsp;&nbsp;Terceira imagem á direita
								</td>		
							</tr>
						</table>
						<table id="espacoConsulta">
							<tr>
								<td  class="td_table">
								&nbsp;&nbsp;<input type="text" name ="txtnome"   size="45"/>

								</td>
							</tr>
							<tr>
								<td  class="td_table">
									&nbsp;&nbsp;<textarea name="txtbanda" cols="50" rows="9"></textarea>

								</td>
							</tr>
							<tr>
								<td  class="td_table">
									&nbsp;&nbsp;<textarea name="txtinfo" cols="50" rows="9"></textarea>

								</td>
							</tr>
							<tr>
								<td  class="td_table">
									&nbsp;&nbsp;<input type="file" name ="filefotoinfo"  value="Escolher arquivo" size="12"/>

								</td>
							</tr>
							
							<tr>
								<td  class="td_table">
									&nbsp;&nbsp;<input type="file" name ="filefotoapresentacao"  value="Escolher arquivo" size="12"/>

								</td>
							</tr>
							<tr>
								<td  class="td_table">
									&nbsp;&nbsp;<input type="file" name ="filefotoprimeira"  value="Escolher arquivo" size="12"/>

								</td>
							</tr>
							<tr>
								<td  class="td_table">
									&nbsp;&nbsp;<input type="file" name ="filefotosegunda"  value="Escolher arquivo" size="12"/>

								</td>
							</tr>
							<tr>
								<td  class="td_table">
									&nbsp;&nbsp;<input type="file" name ="filefototerceira"  value="Escolher arquivo" size="12"/>

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