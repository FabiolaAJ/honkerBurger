<?php

	//conexao com o banco
	require_once ('modulo.php');
	
	session_start();

	//quebra de sessão
	if(isset($_POST['btnSair'])){
		include('logout.php');
		
	}
	//startando variaveis
	$botao="Cadastre";
	$nomePromocao="";
	$desconto="";
	$menssagem="";
	
	if(isset($_GET['opt'])){
		$opt=$_GET['opt'];
		
		//exclusão da promoção
		if($opt =='excluir'){
			$idPromocao=$_GET['codigo'];
			$sql="delete from tbl_promocao where idPromocao=".$idPromocao;
			//echo($sql);
			mysql_query($sql);
			header('location:admPromocoes.php');
			
		//edição dados da promoção
		}
		if($opt=='editar'){
			$idPromocao=$_GET['codigo'];
			//variavel global de sessao para update
			$_SESSION['codigo_registro']=$idPromocao;

			$sql="select * from tbl_promocao where idPromocao=".$idPromocao;
			
			$select = mysql_query($sql);
			
			if($consulta=mysql_fetch_array($select)){
				//consulta no banco
				$nomePromocao=$consulta['nomePromocao'];
				$desconto=$consulta['pDesconto'];
				$menssagem=$consulta['mensagemAdicional'];
				//mudando conteudo do botao
				$botao="Alterar";
					
				
			

			}
		}
	}
	
	if(isset($_POST ['btnCadastrar'])){
		$nomePromocao=$_POST['txtnome'];
		$desconto=$_POST['txtDesconto'];
		$menssagem=$_POST['txtMenssagem'];
							//option	
		$idProdutos=$_POST['slcProdutos'];
				//salvando cadastro
		if($_POST['btnCadastrar']=='Cadastre'){
			$sql="insert into tbl_promocao (pDesconto,mensagemAdicional,nomePromocao,idProdutos)";
			$sql=$sql."values('".$desconto."','".$menssagem."','".$nomePromocao."','".$idProdutos."')";
			mysql_query($sql);
			header('location:admPromocoes.php');
				
				
			//alterando dados no banco caso a palavra escrita no botão seja alterar
		}elseif($_POST['btnCadastrar']=='Alterar'){
			$sql="update tbl_promocao set pDesconto='".$desconto."',mensagemAdicional='".$menssagem."',nomePromocao='".$nomePromocao."'where idPromocao =".$_SESSION['codigo_registro'];;
			mysql_query($sql);
			header('location:admPromocoes.php');

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
					<b>CMS</b> - Administrar Promoções
				</div>
			</header>
			
			<section >
				<form name="promocoes" method="post" action="admPromocoes.php">

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
							&nbsp;&nbsp;&nbsp;Cadastre uma Promoção
					</div>
					<div id="tblUsuario" >
						<form name="frmPromocoes" method="post" action="admPromocoes.php">
							<table id="espacoCampos3">
								<tr> 
									<td class="campoConsultaUsu">
										&nbsp;&nbsp;Nome Promoção
									</td>		
								</tr>
								<tr> 
									<td class="campoConsultaUsu">
										&nbsp;&nbsp;Desconto
									</td>		
								</tr>
								<tr> 
									<td class="campoConsultaUsu">
										&nbsp;&nbsp;Menssagem &nbsp;adicional 
									</td>		
								</tr>
								<tr> 
									<td class="campoConsultaUsu">
										&nbsp;&nbsp;Produtos
									</td>		
								</tr>
							</table>
							<table id="espacoConsulta2">
								<tr> 
									<td class="td_table">
										<input  value= "<?php echo($nomePromocao)?>"type="text" name ="txtnome" size="40"/>

									</td>		
								</tr>
								<tr> 
									<td class="td_table">
										<input  value= "<?php echo($desconto)?>"type="text" name ="txtDesconto" size="40"/>

									</td>		
								</tr>
								<tr> 
									<td class="td_table">
										<textarea name="txtMenssagem" cols="50" rows="2"><?php echo($menssagem)?></textarea>

									</td>		
								</tr>
								<tr>
									<td class="td_table"> 
											<select name ="slcProdutos"> 
												<option value="<?php echo($idProdutos)?>" selected > Selecione um Item</option>
												<?php 
													$sql="select * from tbl_produtos ";
													$select=mysql_query($sql);
													while($consulta1=mysql_fetch_array($select))
													{
												?>

														<option value="<?php echo($consulta1['idProdutos']); ?>"><?php echo($consulta1['nome']);?></option>												
												<?php
													}
												?>
											</select>
									</td>
								</tr>
							</table>
							<div id="espacoCadastrar">
							
								<input type="submit" name ="btnCadastrar" value=<?php echo($botao)?> size="30"/>

							</div>
						</form>
					
					</div>
					<div id="tituloCadastro">
						&nbsp;&nbsp;Consulta de Promoções
					</div>
					<div id="tblUsuario">
						
							<table id="espacoCampos4">
								<tr>  
									<td class="campoConsultaUsu"> 
										&nbsp;&nbsp;Produtos
									</td>
									<td class="campoConsultaUsu"> 
										&nbsp;&nbsp;Nome &nbsp;Promoção
									</td>
									<td class="campoConsultaUsu"> 
										&nbsp;&nbsp;Desconto
									</td>
									<td class="campoConsultaUsu"> 
										&nbsp;&nbsp;Menssagem &nbsp;adicional
									</td>
									<td class="campoConsultaUsu"> 
										&nbsp;&nbsp;Opções
									</td>
								</tr>
								<?php
									$sql="select p.idPromocao,p.nomePromocao,p.pDesconto,p.mensagemAdicional,p.idProdutos,pr.nome
										 from tbl_promocao as p
										 JOIN tbl_produtos as pr
										 ON p.idProdutos = pr.idProdutos;

										 ";
									$select=mysql_query($sql);
									while($consulta=mysql_fetch_array($select))
									{
								?>
								
									<tr>
										
										<td class="td_table"> 
											&nbsp;<?php  echo($consulta['nome']); ?>
										</td>
									
										<Td class="td_table" > 
												&nbsp;<?php  echo($consulta['nomePromocao']); ?>
										</td>
										
										<Td class="td_table" > 
												&nbsp;<?php  echo($consulta['pDesconto']); ?>
										</td>
										<Td class="td_table" > 
												&nbsp;<?php  echo($consulta['mensagemAdicional']); ?>
										</td>
										
										<td class="td_table">
											&nbsp;&nbsp;<a href="admPromocoes.php?opt=excluir&codigo=<?php echo($consulta['idPromocao']); ?>"><img src="imagens/deletee2.png" alt="delete"></a>&nbsp;&nbsp;
												&nbsp;<a href="admPromocoes.php?opt=editar&codigo=<?php echo($consulta['idPromocao']); ?>"><img src="imagens/editt.png" alt="edit"></a>
										</td>
									</tr>
								<?php 
									}
								?>
							</table>
						
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