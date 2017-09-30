<?php
	$Endereco="";
	$cep="";
	//coenxão com o banco
	require_once ('modulo.php');
	
	session_start();
	//quebra de sessão
	if(isset($_POST['btnSair'])){
		include('logout.php');
		
	}	
		

	if(isset($_GET['opt'])){
		$opt=$_GET['opt'];
		//configuração do botao de excluir
		if($opt == 'excluir'){
			$idAmbientes=$_GET['codigo'];
			$sql="delete from tbl_ambientes where idAmbientes=".$idAmbientes;
			mysql_query($sql);
			header('location:consultaAmbientes.php');
		}
		
		//configuração botao editar
		if($opt =='editar'){
			$idAmbientes=$_GET['codigo'];
			
			//variavel global para o update
			$_SESSION['codigo_registro']=$idAmbientes;
			
			//buscando o registro no banco conforme o codigo
			$sql="select * from tbl_ambientes where idAmbientes=".$idAmbientes;
			$select = mysql_query($sql);

			if($consulta=mysql_fetch_array($select)){
				//resgatando dados do banco
				$uploadfile=$consulta['fotoLocal'];
				$cep=$consulta['cep'];
				$Endereco=$consulta['Endereco'];
			
			}
		}
	}	
	//configuração do botao que salva a edição
	if(isset($_POST['btnAlterar'])){
		//pegando o que o usuario digitou e guardando em variaveis locais
		$cep=$_POST['txtcep'];
		$Endereco=$_POST['txtendereco'];
		
	//direcionando imagens ate a pasta 		
		$uploaddir ="arquivos/";
		$foto_local=basename($_FILES['filefotolocal']['name']);
		$uploadfile = $uploaddir . $foto_local;
		$upload_ext = strtolower(substr($foto_local,strlen($foto_local)-3 ,3));
		
	//verificando extenções de imagens
		if($upload_ext == 'jpg' || $upload_ext == 'png'){

			if(move_uploaded_file($_FILES['filefotolocal']['tmp_name'],$uploadfile)) {
				//salvando alteração no banco
				$sql="update tbl_ambientes set fotoLocal='".$uploadfile."',cep='".$cep."',Endereco='".$Endereco."' where idAmbientes =".$_SESSION['codigo_registro'];
				
				mysql_query($sql);
			
				header('location:consultaAmbientes.php');
			}
		}
	}
		

?>
<!DOCTYPE html>

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
				<form name="cAmbientes" method="post" action="consultaAmbientes.php">

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
						&nbsp;&nbsp;&nbsp;Consulta Ambientes 
					</div>
					<!--formulario de consulta de ambientes ja cadastrados-->
					<form name="frmAmbientes" method="post" action="consultaAmbientes.php" enctype="multipart/form-data">

						<table id="espacoCampos41">

								<tr>  
									<td class="campoConsultaUsu"> 
										&nbsp;&nbsp;Foto do local
									</td>
									<td class="campoConsultaUsu"> 
										&nbsp;&nbsp;CEP
									</td>
									<td class="campoConsultaUsu"> 
										&nbsp;&nbsp;Endereço
									</td>
									<td class="campoConsultaUsu"> 
										&nbsp;&nbsp;Opções
									</td>
								</tr>
								<?php
									//buscando cadastros no bd e colocando-os em ordem decrescente conforme seu id
									$sql="select * from tbl_ambientes order by idAmbientes desc";
									$select=mysql_query($sql);
									while($consulta=mysql_fetch_array($select))
									{
								?>
										<tr>
											<td class="td_table"> 
												&nbsp;<img src="<?php  echo($consulta['fotoLocal']); ?>" class="imgConsulta">
												
											</td>
											<td class="td_table"> 
												&nbsp;<?php  echo($consulta['cep']); ?>
												
											</td>
											<td class="td_table"> 
												&nbsp;<?php  echo($consulta['Endereco']); ?>
												
											</td>
										
											</td>
											<td class="td_table"> 
												<a href="consultaAmbientes.php?opt=excluir&codigo=<?php echo($consulta['idAmbientes']); ?>"><img src="imagens/deletee2.png" alt="delete"></a>
												<a href="consultaAmbientes.php?opt=editar&codigo=<?php echo($consulta['idAmbientes']); ?>"><img src="imagens/editt.png" alt="edit"></a>
												<!--<input type="checkbox" name="check" value="M" <?php echo($chkAmbientes);?> />Selecionar?-->

												
											</td>
										</tr>
									
								<?php 
									}
									
								?>
								
							
						</table>
				</div>	
				<!--espaço para edição de cadastros de ambientes-->
				<div id="tituloConsultaMais">
					&nbsp;&nbsp;&nbsp;Editar
				</div>
				<div id="espacoInsert">

					
						<table id="espacoCampos41">
							
								<tr>  
									<td class="campoConsultaUsu"> 
										&nbsp;&nbsp;Foto do local
									</td>
							
								
									<td class="campoConsultaUsu"> 
										&nbsp;&nbsp;CEP
									</td>
									
									<td class="campoConsultaUsu"> 
										&nbsp;&nbsp;Endereço
									</td>
								</tr>
								
								
								<tr>
									<td class="td_table"> 
														<!--guardando a edição do conteudo na variavel-->
										<input  value= "<?php echo($uploadfile)?>"type="file" name ="filefotolocal"  value="Escolher arquivo" size="12"/>
				
									</td>
									<td class="td_table"> 
										
										<input value = "<?php echo($cep)?>" type="text" name ="txtcep"   size="15"/>
									</td>
							
									<td class="td_table">
										<input  value = "<?php echo($Endereco)?>" type="text" name ="txtendereco"   size="12"/>
				
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
			
			<footer >
				<div id="desenvolvido">
						Desenvolvido por : Fabiola Almeida de Jesus
				</div>
			</footer>
		</div>
	</body>

</html>