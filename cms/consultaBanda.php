<?php
	//conexão com o banco
	require_once ('modulo.php');
	session_start();
	
	
	if(isset($_GET['opt'])){
		//excluir cadastro da banda
		if($_GET['opt'] == 'excluir'){
			$idBanda=$_GET['codigo'];
			$sql="delete from tbl_banda where idBanda=".$idBanda;
			mysql_query($sql);
			header('location:consultaBanda.php');
		}
		//configuração do editar
		if($_GET['opt']=='editar'){
			
			$idBanda=$_GET['codigo'];
		
		//criando uma variavel global na sessao do navegador para o update
			$_SESSION['codigo_registro']=$idBanda;
			
			//selecionando informações da tabela conforme o id 
			$sql="select * from tbl_banda where idBanda=".$idBanda;
			
			$select = mysql_query($sql);
			
			if($consulta1=mysql_fetch_array($select)){
				//resgatando os dados do banco e guardando em variaveis locais
				$nome=$consulta1['nomeBanda'];
				$txtCentro=$consulta1['txtCentral'];
				$infoBanda=$consulta1['txtInfoBanda'];
				$uploadfile=$consulta1['imagemApresentacao'];
				$uploadfile1=$consulta1['imagemInfo'];
				$uploadfile2=$consulta1['imagem1'];
				$uploadfile3=$consulta1['imagem2'];
				$uploadfile4=$consulta1['imagem3'];

			
			}
		}
		//codigo para configurar a seleção da banda em destaque
		if($_GET['opt'] == 'status'){
			$idBanda=$_GET['codigo'];
			
			$sql="update tbl_banda set statusBand=0";
			//echo($sql);
			mysql_query($sql);
			header('location:consultaBanda.php');
			
			//edição do status se caso "checkbox" estiver selecionado
			$sql="update tbl_banda set statusBand=1 where idBanda=".$idBanda;
			//echo($sql);
			mysql_query($sql);
			header('location:consultaBanda.php');
		}
	}
	//salvar edição
	if(isset($_POST['btnAlterar'])){
		//guardando edição do usuario em variaveis
		$nome=$_POST['txtNome'];
		$txtCentro=$_POST['txtCentro'];
		$infoBanda=$_POST['txtInfoBanda'];
		
		//pasta para guardar as imagens
		$uploaddir ="arquivos/";
		
	//direcionamento das imagens ate a pasta arquivos
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
		
		
	//checar as extenções das imagens

		if($upload_ext == 'jpg' || $upload_ext == 'png' && $upload_ext2 == 'jpg' || $upload_ext2 == 'png' && $upload_ext3 == 'jpg' || $upload_ext3 == 'png' && $upload_ext4 == 'jpg' || $upload_ext4 == 'png' && $upload_ext5 == 'jpg' || $upload_ext5 == 'png')
		{
			
			if(move_uploaded_file($_FILES['filefotoinfo']['tmp_name'],$uploadfile)) {
				
				if(move_uploaded_file($_FILES['filefotoapresentacao']['tmp_name'],$uploadfile1)){
				
					if(move_uploaded_file($_FILES['filefotoprimeira']['tmp_name'],$uploadfile2)) {
						
						if(move_uploaded_file($_FILES['filefotosegunda']['tmp_name'],$uploadfile3)) {
							
							if(move_uploaded_file($_FILES['filefototerceira']['tmp_name'],$uploadfile4)) {
								//salvando a edição no banco
								$sql="update tbl_banda set nomeBanda='".$nome."',txtCentral='".$txtCentral."',txtInfoBanda='".$infoBanda."',imagemApresentacao='".$uploadfile1."',imagemInfo='".$uploadfile."',imagem1='".$uploadfile2."',imagem2='".$uploadfile3."',imagem3='".$uploadfile4."' where idBanda =".$_SESSION['codigo_registro'];

								//echo($sql);
								mysql_query($sql);
								//atualizando pagina com as alterações 
								header('location:consultaBanda.php');
							}
						}
					}
				}
			}
		}
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
				<form name="cBanda" method="post" action="consultaBanda.php">

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
				<!--espaço para consultar o conteudo da tabela-->
				<div id="espacoInsert">
					<div id="tituloConsultaMais">
						&nbsp;&nbsp;&nbsp;Consulta Banda
					</div>
					

						<table id="espacoCampos41">
							<tr>  
								<td class="campoConsultaUsu"> 
									&nbsp;&nbsp;Nome da banda
								</td>
								
								<td class="campoConsultaUsu"> 
									&nbsp;&nbsp;Texto Central
								</td>
								<td class="campoConsultaUsu"> 
									&nbsp;&nbsp;Informações gerais 
								</td>
							
								<td class="campoConsultaUsu"> 
									&nbsp;&nbsp;Imagem de apresentação
								</td>
								 
								<td class="campoConsultaUsu"> 
									&nbsp;&nbsp;Imagem informações
								</td>
								<td class="campoConsultaUsu"> 
									&nbsp;Primeira imagem
								</td>
							
							
								<td class="campoConsultaUsu"> 
									&nbsp;&nbsp;Segunda imagem
								</td>
								<td class="campoConsultaUsu"> 
									&nbsp;&nbsp;Terceira imagem
								</td>
								<td class="campoConsultaUsu"> 
									&nbsp;&nbsp;Opções&nbsp;&nbsp;&nbsp;&nbsp;
								</td>
							</tr>
							<?php
								
																//limitando caracteres do texto
								$sql="select idBanda,nomeBanda,SUBSTRING(txtCentral, 1, 55) as txtCentral,SUBSTRING(txtInfoBanda, 1, 55) as txtInfoBanda,imagemApresentacao,imagemInfo, imagem1,imagem2,imagem3,statusBand from tbl_banda order by idBanda desc";
								$select=mysql_query($sql);
								while($consulta1=mysql_fetch_array($select))
								{
							?>
								
									<tr>
										<td class="td_table"> 
											&nbsp;<?php echo($consulta1['nomeBanda']); ?>
										</td>
										<td class="td_table"> 
											<?php  echo($consulta1['txtCentral']); ?>...
										</td>
										<td class="td_table"> 
											<?php  echo($consulta1['txtInfoBanda']); ?>...
										</td>
									
										<td class="td_table"> 
											&nbsp;<img src="<?php  echo($consulta1['imagemApresentacao']); ?>" class="imgConsulta">
										</td>
										<td class="td_table"> 
											&nbsp;<img src="<?php  echo($consulta1['imagemInfo']); ?>"class="imgConsulta">
										</td>
										<td class="td_table"> 
											&nbsp;<img src="<?php  echo($consulta1['imagem1']); ?>"class="imgConsulta">
										</td>
									
										<td class="td_table"> 
											&nbsp;<img src="<?php  echo($consulta1['imagem2']); ?>" class="imgConsulta">
										</td>
										<td class="td_table"> 
											&nbsp;<img src="<?php  echo($consulta1['imagem3']); ?>" class="imgConsulta">
										</td>
										
										
										<td class="td_table"> 
											<!--opçoes de editar e excluir-->
											<a href="consultaBanda.php?opt=excluir&codigo=<?php echo($consulta1['idBanda']); ?>"><img src="imagens/deletee2.png" alt="delete"> </a>
											<a href="consultaBanda.php?opt=editar&codigo=<?php echo($consulta1['idBanda']); ?>"><img src="imagens/editt.png" alt="edit"></a>
												<?php 
													// codigo para "checkbox" de status nao selecionado
													if($consulta1['statusBand'] == 0){
												?>				
														<a href="consultaBanda.php?opt=status&codigo=<?php echo($consulta1['idBanda']); ?>"><img src="imagens/desabilitado.png" width="13" height="14"></a>	
														
											<?php	
													//codigo para "checkbox" de status selecionado
													}elseif($consulta1['statusBand'] == 1) {
												?>
														<a href="consultaBanda.php?opt=status&codigo=<?php echo($consulta1['idBanda']); ?>"><img src="imagens/selecionado.png" width="13" height="14"> </a>

												<?php
													}
												
												?>
											
										</td>
									</tr>
						    <?php
								}
							
							?>
						</table>
						
				</div>
				<!--espaço para ediçao-->
				<form name="frmBanda" method="post" action="consultaBanda.php" enctype="multipart/form-data">	
					<table id="espacoCampos41">
									
						<tr>  
							<td class="campoConsultaUsu"> 
									&nbsp;&nbsp;Nome da &nbsp;Banda
							</td>
							<td class="campoConsultaUsu"> 
								&nbsp;&nbsp;Texto Central
							</td>
											
							<td class="campoConsultaUsu"> 
								&nbsp;&nbsp;Informações Gerais
							</td>
						
							<td class="campoConsultaUsu"> 
								&nbsp;&nbsp;Imagem de Apresentação
							</td>
						</tr>
						<tr>
							<td class="td_table"> 
								<input value = "<?php echo($nome)?>" type="text" name ="txtNome"   size="10"/>

							</td>
							<td class="td_table"> 
								<textarea name="txtCentro" cols="50" rows="9"><?php echo($txtCentro)?></textarea>

							</td>
									
							<td class="td_table">
								<textarea  name="txtInfoBanda" cols="50" rows="9"><?php echo($infoBanda)?></textarea>

							</td>
							<td class="td_table">
								&nbsp;&nbsp;<input type="file" name="filefotoapresentacao" value= "<?php echo($uploadfile1)?>"  value="Escolher arquivo" size="12"/>

							</td>
						</tr>
					</table>
					<table id="espacoCampos41">
									
						<tr>  
							<td class="campoConsultaUsu"> 
									&nbsp;&nbsp;Imagem Informações
							</td>
							<td class="campoConsultaUsu"> 
								&nbsp;&nbsp;Primeira imagem
							</td>
											
							<td class="campoConsultaUsu"> 
								&nbsp;&nbsp;Segunda imagem
							</td>
						
							<td class="campoConsultaUsu"> 
								&nbsp;&nbsp;Terceira imagem
							</td>
						</tr>
						<tr>
							<td class="td_table"> 
								&nbsp;&nbsp;<input type="file" name="filefotoinfo" value="<?php echo($uploadfile)?>"    value="Escolher arquivo" size="12"/>

							</td>
							<td class="td_table"> 
								&nbsp;&nbsp;<input type="file" name="filefotoprimeira" value="<?php echo($uploadfile2)?>"    value="Escolher arquivo" size="12"/>
							</td>
									
							<td class="td_table">
								&nbsp;&nbsp;<input type="file" name="filefotosegunda"  value="<?php echo($uploadfile3)?>"   value="Escolher arquivo" size="12"/>
							</td>
							<td class="td_table">
								&nbsp;&nbsp;<input type="file"  name="filefototerceira" value="<?php echo($uploadfile4)?>" type="file"  value="Escolher arquivo" size="12"/>
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
			<footer>
				<div id="desenvolvido">
						Desenvolvido por : Fabiola Almeida de Jesus
				</div>
			</footer>
		</div>
		
	</body>
</html>