<?php
//startando variaveis
	$calorias="";
	$proteinas="";
	$carboidratos="";
	$gorduras="";
	$gordurasSaturadas="";
	$gordurasTrans="";
	$acucar="";
	$colesterol="";
	$sodio="";
	
//conexão com o banco
	require_once ('modulo.php');
	session_start();
	
	//quebra de sessão
	if(isset($_POST['btnSair'])){
		include('logout.php');
		
	}
	
	//opçoes do opt
	if(isset($_GET['opt'])){
		$opt=$_GET['opt'];
	

		//exclusão de lanche do mes
		if($opt =='excluir'){
			$idInfo=$_GET['codigo'];
			$sql="delete from tbl_infonutricional where idInfo=".$idInfo;
			//echo($sql);
			mysql_query($sql);
			header('location:consultaLanche.php');
			
			
		}
		//configuração do botao editar
		if($opt =='editar'){
			$idInfo=$_GET['codigo'];
			
		//variavel global de sessao para update
			$_SESSION['codigo_registro']=$idInfo;
			
			$sql="select * from tbl_infonutricional where idInfo=".$idInfo;
			//echo($sql);
			$select = mysql_query($sql);
			
			
			//codigo para transformar os resultados do bd em array e guarda em variaveis
			if($consulta=mysql_fetch_array($select)){
				
				$calorias=$consulta['calorias'];
				$proteinas=$consulta['proteinas'];
				$carboidratos=$consulta['carboidratos'];
				$gorduras=$consulta['gorduras'];
				$gordurasSaturadas=$consulta['gordurasSaturadas'];
				$gordurasTrans=$consulta['gordurasTrans'];
				$acucar=$consulta['acucar'];
				$colesterol=$consulta['colesterol'];
				$sodio=$consulta['sodio'];


			}
		}
	//codigo para configurar a seleção do Lanche
		if($_GET['opt'] == 'status'){
			$idInfo=$_GET['codigo'];
			
			$sql="update tbl_infonutricional set status=0";
			//echo($sql);
			mysql_query($sql);
			header('location:consultaLanche.php');

			$sql="update tbl_infonutricional set status=1 where idInfo=".$idInfo;
			//echo($sql);
			mysql_query($sql);
			header('location:consultaLanche.php');
		}
			
	}
	

	if(isset($_POST ['btnAlterar'])){
		//resgatando as informações digitadas pelo usuario e as guardando em variaveis
		$nomeLanche=$_POST['slcNome'];
		$calorias=$_POST['txtCalorias'];
		$proteinas=$_POST['txtProteinas'];
		$carboidratos=$_POST['txtCarboidratos'];
		$gorduras=$_POST['txtGorduras'];
		$gordurasSaturadas=$_POST['txtGordurasSaturadas'];			
		$gordurasTrans=$_POST['txtGordurasTrans'];
		$acucar=$_POST['txtAcucar'];
		$colesterol=$_POST['txtColesterol'];
		$sodio=$_POST['txtSodio'];
			
		//salvando a edição no banco 
		$sql="update tbl_infonutricional set calorias='".$calorias."',proteinas='".$proteinas."',carboidratos='".$carboidratos."',gorduras='".$gorduras."',gordurasSaturadas='".$gordurasSaturadas."',gordurasTrans='".$gordurasTrans."',acucar='".$acucar."',colesterol='".$colesterol."',sodio='".$sodio."'where idInfo=".$_SESSION['codigo_registro'];
		//echo($sql);
		mysql_query($sql);
		
		header('location:consultaLanche.php');


	}
		
?>

<html>
	<head>
		<title> cms - Consulta Lanche do mês </title> 
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
				<form name="cLanche" method="post" action="consultaLanche.php">

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
				<!--tabela para consulta-->
				<div id="espacoInsert">
					<div id="tituloConsultaMais">
						&nbsp;&nbsp;&nbsp;Consulta do lanche
					</div>
					<table id="espacoCampos41">
						<tr>  
							<td class="campoConsultaUsu"> 
								&nbsp;&nbsp;Nome do lanche
							</td>
							
							<td class="campoConsultaUsu"> 
								&nbsp;&nbsp;Calorias
							</td>
							<td class="campoConsultaUsu"> 
								&nbsp;&nbsp;Proteinas
							</td>
							<td class="campoConsultaUsu"> 
								&nbsp;&nbsp;Carboidratos
							</td>
							<td class="campoConsultaUsu"> 
								&nbsp;&nbsp;Gorduras
							</td>
							<td class="campoConsultaUsu"> 
								&nbsp;&nbsp;Gorduras Saturadas
							</td>
							<td class="campoConsultaUsu"> 
								&nbsp;&nbsp;Gorduras Trans
							</td>
							<td class="campoConsultaUsu"> 
								&nbsp;&nbsp;Açucar
							</td>
							<td class="campoConsultaUsu"> 
								&nbsp;&nbsp;Colesterol
							</td>
							<td class="campoConsultaUsu"> 
								&nbsp;&nbsp;Sodio
							</td>
							<td class="campoConsultaUsu"> 
								&nbsp;&nbsp;opções
							</td>
						</tr>
							<?php
								//select nas tabelas relacionadas
								$sql="select i.idInfo,i.calorias,i.proteinas,i.carboidratos,i.gorduras,
									i.gordurasSaturadas,i.gordurasTrans,i.acucar,i.colesterol,i.sodio,i.idProduto,p.nome,i.status
									  from tbl_infonutricional as i
									  Join tbl_produtos as p
									  ON i.idProduto = p.idProdutos;
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
											&nbsp;<?php echo($consulta1['calorias']); ?>
										</td>
										<td class="td_table"> 
											&nbsp;<?php echo($consulta1['proteinas']); ?>
										</td>
										<td class="td_table"> 
											&nbsp;<?php echo($consulta1['carboidratos']); ?>
										</td>										
										<td class="td_table">
											&nbsp;<?php echo($consulta1['gorduras']); ?>
										</td>
										<td class="td_table"> 
											&nbsp;<?php echo($consulta1['gordurasSaturadas']); ?>
										</td>
										<td class="td_table"> 
											&nbsp;<?php echo($consulta1['gordurasTrans']); ?>
										</td>
										<td class="td_table"> 
											&nbsp;<?php echo($consulta1['acucar']); ?>
										</td>
										<td class="td_table"> 
											&nbsp;<?php echo($consulta1['colesterol']); ?>
										</td>
										<td class="td_table"> 
											&nbsp;<?php echo($consulta1['sodio']); ?>
										</td>
										<td class="td_table"> 
											<a href="consultaLanche.php?opt=excluir&codigo=<?php echo($consulta1['idInfo']); ?>">
												&nbsp;&nbsp;<img src="imagens/deletee2.png"> </img>&nbsp;
											</a>
						
											<a href="consultaLanche.php?opt=editar&codigo=<?php echo($consulta1['idInfo'])?>">
												&nbsp;<img src="imagens/editt.png"> </img>
											</a>
											<!-- checkbox do status-->
											<?php 
													if($consulta1['status'] == 0){
												?>				
														<a href="consultaLanche.php?opt=status&codigo=<?php echo($consulta1['idInfo']); ?>"><img src="imagens/desabilitado.png" width="13" height="14"></a>	
														
											<?php	
													}elseif($consulta1['status'] == 1) {
												?>
														<a href="consultaLanche.php?opt=status&codigo=<?php echo($consulta1['idInfo']); ?>"><img src="imagens/selecionado.png" width="13" height="14"> </a>

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
				<!-- espaço para o usuario fazer a edição do insert -->
				<form name="frmLanche" method="post" action="consultaLanche.php" >	
					<table id="espacoCampos41">
								
						<tr>  
							<td class="campoConsultaUsu"> 
									&nbsp;&nbsp;Nome do&nbsp;Lanche
							</td>
							<td class="campoConsultaUsu"> 
								&nbsp;&nbsp;Calorias
							</td>
											
							<td class="campoConsultaUsu"> 
								&nbsp;&nbsp;Proteinas
							</td>
						
							<td class="campoConsultaUsu"> 
								&nbsp;&nbsp;Carboidratos
							</td>
							<td class="campoConsultaUsu"> 
								&nbsp;&nbsp;Gorduras
							</td>
							<td class="campoConsultaUsu"> 
								&nbsp;&nbsp;Gorduras Saturadas
							</td>
							<td class="campoConsultaUsu"> 
								&nbsp;&nbsp;Gorduras Trans
							</td>
							<td class="campoConsultaUsu"> 
								&nbsp;&nbsp;Açucar
							</td>
						
						</tr>
						
						<tr>
							<td class="td_table"> 
									<select name ="slcNome"> 
												<option value="<?php echo($idProdutos)?>" selected > Selecione um Item</option>
												
												<?php 
												
													
													$sql="select * from tbl_produtos";
													$select=mysql_query($sql);
													while($consulta1=mysql_fetch_array($select))
													{
										
												?>
													<!--apresentando as opções de produtos para o usuario -->
													  <option value="<?php echo($consulta1['idProdutos']); ?>"><?php echo($consulta1['nome']);?></option>

												
												<?php
												}
												?>	
									</select>												
							</td>
												
							<td class="td_table"> 
								<input value = "<?php echo($calorias)?>" type="text" name ="txtCalorias"   size="16"/>
							</td>
							<td class="td_table"> 
								<input value = "<?php echo($proteinas)?>" type="text" name ="txtProteinas"   size="16"/>
							</td>
							<td class="td_table"> 
								<input value = "<?php echo($carboidratos)?>" type="text" name ="txtCarboidratos"   size="16"/>
							</td>
							<td class="td_table"> 
								<input value = "<?php echo($gorduras)?>" type="text" name ="txtGorduras"   size="16"/>
							</td>
							<td class="td_table"> 
								<input value = "<?php echo($gordurasSaturadas)?>" type="text" name ="txtGordurasSaturadas"   size="16"/>
							</td>
							<td class="td_table"> 
								<input value = "<?php echo($gordurasTrans)?>" type="text" name ="txtGordurasTrans"   size="16"/>
							</td>
							<td class="td_table"> 
								<input value = "<?php echo($acucar)?>" type="text" name ="txtAcucar"   size="16"/>
							</td>
							
						</tr>

						<tr>
						
							<td class="campoConsultaUsu"> 
								&nbsp;&nbsp;Colesterol
							</td>
							<td class="campoConsultaUsu"> 
								&nbsp;&nbsp;Sodio
							</td>
							
						</tr>
						<tr>
							<td class="td_table"> 
								<input value = "<?php echo($colesterol)?>" type="text" name ="txtColesterol"   size="16"/>
							</td>
							<td class="td_table"> 
								<input value = "<?php echo($sodio)?>" type="text" name ="txtSodio"   size="16"/>
							</td>
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