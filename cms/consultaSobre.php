<?php 
	//conexão com o banco

	require_once ('modulo.php');
	session_start();
	
	if(isset($_GET['opt'])){
		$opt=$_GET['opt'];
	
	//excluir cadastro sobre
		if($opt == 'excluir'){
			$idSobre=$_GET['codigo'];
			$sql="delete from tbl_sobre where idSobre=".$idSobre;
			mysql_query($sql);
			header('location:consultaSobre.php');
		}
	//editar sobre
		if($opt =='editar'){
			
			$idSobre=$_GET['codigo'];

			$_SESSION['codigo_registro']=$idSobre;
			
			$sql="select * from tbl_sobre where idSobre=".$idSobre;
			$select = mysql_query($sql);
			
			if($consulta=mysql_fetch_array($select)){
				$Texto=$consulta['Texto'];
				$uploadfile=$consulta['imagemMaior'];
				$uploadfile2=$consulta['imagem1'];
				$uploadfile3=$consulta['imagem2'];
				$uploadfile4=$consulta['imagem3'];
				$uploadfile5=$consulta['imagem4'];

			
			}
		}
		//codigo para configurar a seleção da banda em destaque
		if($_GET['opt'] == 'status'){
			$idSobre=$_GET['codigo'];
			
			$sql="update  tbl_sobre set statusSobre=0";
			//echo($sql);
			mysql_query($sql);
			header('location:consultaSobre.php');

			$sql="update tbl_sobre set statusSobre=1 where idSobre=".$idSobre;
			//echo($sql);
			mysql_query($sql);
			header('location:consultaSobre.php');
		}
	}
	//salvar edição
	if(isset($_POST['btnAlterar'])){
		$Texto=$_POST['txtSobre'];
		
		$uploaddir ="arquivos/";
				
				
		//direcionamento das imagens ate a pasta arquivos
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
		
		if($upload_ext == 'jpg' || $upload_ext == 'png' && $upload_ext2 == 'jpg' || $upload_ext2 == 'png' && $upload_ext3 == 'jpg' || $upload_ext3 == 'png' && $upload_ext4 == 'jpg' || $upload_ext4 == 'png' && $upload_ext5 == 'jpg' || $upload_ext5 == 'png')
		{
			if(move_uploaded_file($_FILES['filefotomaior']['tmp_name'],$uploadfile)) {
				if (move_uploaded_file($_FILES['filefotoesquerda']['tmp_name'],$uploadfile2)){
					if(move_uploaded_file($_FILES['filefotodireita1']['tmp_name'],$uploadfile3)){
						if(move_uploaded_file($_FILES['filefotodireita2']['tmp_name'],$uploadfile4)){
						
							if(move_uploaded_file($_FILES['filefotodireita3']['tmp_name'],$uploadfile5)){
								$sql="update tbl_sobre set Texto='".$Texto."',imagemMaior='".$uploadfile."',imagem1='".$uploadfile2."',imagem2='".$uploadfile3."',imagem3='".$uploadfile4."',imagem4='".$uploadfile5."' where idSobre =".$_SESSION['codigo_registro'];
								//echo($sql);
								mysql_query($sql);
								header('location:consultaSobre.php');
							}
						}
					
					}
				}
				
			}
		
		}
	}	
	if(isset($_GET['btnSair'])){
		include('logout.php');
		
	}	

?>
<html> 
	<head>
		<title> cms - consulta sobre</title> 
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
				<form name="cSobre" method="post" action="consultaSobre.php">

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
				<div id="espacoInsert">
				
					
					
						<div id="tituloConsultaMais">
						&nbsp;&nbsp;&nbsp;Consulta Sobre
						</div>
						<div id="tblSobre">
			
								<table id="espacoCampos41">
										<tr>  
											<td class="campoConsultaUsu"> 
												&nbsp;&nbsp;Imagem Maior
											</td>
											<td class="campoConsultaUsu"> 
												&nbsp;&nbsp;Imagem a &nbsp;esquerda
											</td>
											
											<td class="campoConsultaUsu"> 
												&nbsp;&nbsp;Primeira &nbsp;imagem a &nbsp;direita
											</td>
											<td class="campoConsultaUsu"> 
												&nbsp;&nbsp;Segunda &nbsp;imagem a &nbsp;direita
											</td>
											<td class="campoConsultaUsu"> 
												&nbsp;&nbsp;Terceira &nbsp;imagem a &nbsp;direita
											</td>
											<td class="campoConsultaUsu"> 
												&nbsp;&nbsp;Texto
											</td>
											<td class="campoConsultaUsu"> 
												&nbsp;&nbsp;Opções
											</td>
										</tr>
									<?php
										//buscando cadastros de sobre no bd
															//limitando caracteres do texto
										$sql="select idSobre,SUBSTRING(Texto, 1, 55)as Texto,imagemMaior,imagem1,imagem2,imagem3,imagem4,statusSobre from tbl_sobre ";
										$select=mysql_query($sql);
										while($consulta=mysql_fetch_array($select))
										{
									?>
												<tr>
													<td class="td_table"> 
														&nbsp;<img src="<?php  echo($consulta['imagemMaior']); ?>"class="imgConsulta">
													</td>
											
													<td class="td_table" > 
														&nbsp;<img src="<?php  echo($consulta['imagem1']); ?>" class="imgConsulta">
														
													</td>
													<td class="td_table"> 
														&nbsp;<img src="<?php  echo($consulta['imagem2']); ?>" class="imgConsulta">
													</td>
											
													<td class="td_table" > 
														&nbsp;<img src="<?php  echo($consulta['imagem3']); ?>" class="imgConsulta" >
														
													</td>
													<td class="td_table"> 
														&nbsp;<img src="<?php  echo($consulta['imagem4']); ?>" class="imgConsulta">
													</td>
												
													
													<td class="td_table"> 
														&nbsp; <?php  echo($consulta['Texto']); ?>...
													</td>
													<td class="td_table"> 
														<!-- passando link do botao excluir e codigos resgatados na url -->
														<a href="consultaSobre.php?opt=excluir&codigo=<?php echo($consulta['idSobre']); ?>"><img src="imagens/deletee2.png" alt="delete"></a>
														<!-- passando link do botao editar e codigos resgatados na url -->
														<a href="consultaSobre.php?opt=editar&codigo=<?php echo($consulta['idSobre']); ?>"><img src="imagens/editt.png" alt="edit"></a>
													<?php 
														if($consulta['statusSobre'] == 0){
													?>				
															<a href="consultaSobre.php?opt=status&codigo=<?php echo($consulta['idSobre']); ?>"><img src="imagens/desabilitado.png" width="13" height="14"></a>	
															
														<?php	
															}elseif($consulta['statusSobre'] == 1) {
														?>
																<a href="consultaSobre.php?opt=status&codigo=<?php echo($consulta['idSobre']); ?>"><img src="imagens/selecionado.png" width="13" height="14"> </a>

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
						
						
						<!--formulario para edição de conteudo cadastrado-->
						<form name="frmSobre"  method="post" enctype="multipart/form-data"  action="consultaSobre.php">
								<table id="espacoCampos41">
									
									<tr>  
										<td class="campoConsultaUsu"> 
												&nbsp;&nbsp;Imagem Maior
										</td>
										<td class="campoConsultaUsu"> 
											&nbsp;&nbsp;Imagem a &nbsp;esquerda
										</td>
											
										<td class="campoConsultaUsu"> 
											&nbsp;&nbsp;Primeira &nbsp;imagem a &nbsp;direita
										</td>
									</tr>
									<tr>
										<td class="td_table"> 
											&nbsp;&nbsp;<input value= "<?php echo($uploadfile)?>" type="file" name ="filefotomaior"  value="Escolher arquivo" size="12"/>

										</td>
										<td class="td_table"> 
											&nbsp;&nbsp;<input value= "<?php echo($uploadfile2)?>" type="file" name ="filefotoesquerda"  value="Escolher arquivo" size="12"/>

										</td>
									
										<td class="td_table">
											&nbsp;&nbsp;<input value= "<?php echo($uploadfile3)?>" type="file" name ="filefotodireita1"  value="Escolher arquivo" size="12"/>

										</td>
									</tr>
								</table>
								<table id="espacoCampos41">

									<tr>
										<td class="campoConsultaUsu"> 
											&nbsp;&nbsp;Segunda &nbsp;imagem a &nbsp;direita
										</td>
										<td class="campoConsultaUsu"> 
											&nbsp;&nbsp;Terceira &nbsp;imagem a &nbsp;direita
										</td>
										<td class="campoConsultaUsu"> 
											&nbsp;&nbsp;Texto
										</td>
										
									</tr>

									<tr>
										<td class="td_table">
											&nbsp;&nbsp;<input value= "<?php echo($uploadfile4)?>" type="file" name ="filefotodireita2"  value="Escolher arquivo" size="12"/>

										</td>
										<td class="td_table">
											&nbsp;&nbsp;<input value= "<?php echo($uploadfile5)?>" type="file" name ="filefotodireita3"  value="Escolher arquivo" size="12"/>

										</td>
										<td class="td_table">
											<textarea   name="txtSobre" cols="50" rows="9"><?php echo($Texto)?></textarea>

										</td>	
									</tr>
								</table>
								<table id="espacoBotao">
									<tr>
										<td><input type="submit" value="Alterar" id="btn" name="btnAlterar"/></td>

										
									</tr>
								</table>
							
						
						</form>	
					
					
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