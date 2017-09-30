<?php
	//conexão com o banco
	require_once ('modulo.php');
	session_start();
	
	
	//configuração do botao inserir
	if(isset($_POST ['btnInserir'])){
		
		$cep=$_POST['txtcep'];
		$Endereco=$_POST['txtendereco'];
		
		//pasta que sera direcionada a imagem
		$uploaddir ="arquivos/";
		$foto_local=basename($_FILES['filefotolocal']['name']);
		$uploadfile = $uploaddir . $foto_local;
		$upload_ext = strtolower(substr($foto_local,strlen($foto_local)-3 ,3));
		
		
		//verificação da extenção da imagem
		if($upload_ext == 'jpg' || $upload_ext == 'png'){
			
			//insserção no banco
			if(move_uploaded_file($_FILES['filefotolocal']['tmp_name'],$uploadfile)) {
					$sql="insert into tbl_ambientes(fotoLocal,cep,Endereco)values('".$uploadfile."','".$cep."','".$Endereco."');";
					mysql_query($sql);
					header('location:admAmbientes.php');

			}else{
				//caso os dados da inserção nao estiverem corretos
				echo("ERRO no envio do arquivo");

			}	
		}
		
		
	}
	//configuração do botao que direciona para a pagina de consulta de ambientes já cadastrados
	if(isset ($_POST["btnConsultar"])){
		header('location:consultaAmbientes.php');

		
	}
	//quebra de sessão
	if(isset($_POST['btnSair'])){
		include('logout.php');
		
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
					<b>CMS</b> - Administrar Nossos Ambientes
				</div>
			</header>
			
			<section >
				<form name="ambientes" method="post" action="admAmbientes.php">

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
				<form name="frmAmbientes" method="post" enctype="multipart/form-data" action="admAmbientes.php"> 
						<div id="espacoInsert">
							<div id="tituloConsultaMais">
									&nbsp;&nbsp;&nbsp;Cadastrar Ambientes
							</div>
							<table id="espacoCampos2">
								<tr>
									<td class="campoConsulta">
										&nbsp;&nbsp;Imagem do local
									</td>		
								</tr>
				
								<tr>
									<td class="campoConsulta">
										&nbsp;&nbsp;CEP
									</td>		
								</tr>
								<tr>
									<td class="campoConsulta">
										&nbsp;&nbsp;Endereço
									</td>		
								</tr>
					
							</table>
							<table id="espacoConsulta"><!-- espaço apra o usuario cadastrar o ambiente-->
										<tr>
											<td class="td_table"> 
												&nbsp;&nbsp;<input type="file" name ="filefotolocal"  value="Escolher arquivo" size="12"/>

											</td>
										</tr>
										
										<tr>
											<td class="td_table"> 
												&nbsp;&nbsp;<input type="text" name ="txtcep"   size="45"/>

											</td>
										</tr>
										<tr>
											<td class="td_table"> 
												&nbsp;&nbsp;<input type="text" name ="txtendereco"   size="45"/>

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