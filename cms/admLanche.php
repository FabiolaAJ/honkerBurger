<?php 
	//conexão com o banco
	require_once ('modulo.php');
	session_start();
	
	//quebra de sessão
	if(isset($_POST['btnSair'])){
		include('logout.php');
		
	}
		//configuração do botao inserir
		if(isset($_POST ['btnInserir'])){
			//pegando as informaçoes digitadas pelo usuario e guardando elas em variaveis
			$calorias=$_POST['txtcalorias'];
			$proteinas=$_POST['txtproteinas'];
			$carboidratos=$_POST['txtcarboidratos'];
			$colesterol=$_POST['txtcolesterol'];
			$gorduras=$_POST['txtgorduras'];
			$gordurasSaturadas=$_POST['txtgordurasSaturadas'];
			$gordurasTrans=$_POST['txtgordurasTrans'];
			$acucar=$_POST['txtacucar'];
			$sodio=$_POST['txtsodio'];
			
			$idProduto=$_POST['slcNome'];

			
		 
			//fazendo a inserção dos dados no banco		
			$sql="insert into tbl_infonutricional(calorias,proteinas,carboidratos,gorduras,gordurasSaturadas,gordurasTrans,acucar,colesterol,sodio,idProduto)values('".$calorias."','".$proteinas."','".$carboidratos."','".$gorduras."','".$gordurasSaturadas."','".$gordurasTrans."','".$acucar."','".$colesterol."','".$sodio."','".$idProduto."')";
			//echo($sql);
			mysql_query($sql);
			//atualizando a pagina com as novas informaçoes
			header('location:admLanche.php');
				
			
		}
		
		//Configuração do botao consultar
		if(isset($_POST ['btnConsultar'])){
			//direcionando usuario para pg de consulta
			header('location:consultaLanche.php');


		}
?> 
<html>
	<head>
		<title> CMS - Adm. Lanche do mês </title> 
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="shortcut icon" href="imagens/logoletrabranca.png">
		<meta http-equiv="Content-Type" content="text/html; 
		charset=utf-8" />
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
				<form name="lanche" method="post" action="admLanche.php">

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
				
				<!-- espaço para o usuario fazer o cadastro do lanche-->
				<form name="frmlanche" method="post" enctype="multipart/form-data" action="admLanche.php"> 
					<div id="espacoInsert">
						<div id="tituloConsultaMais">
							&nbsp;&nbsp;&nbsp;Administração Lanche do mês 
						</div>
					
						<table id="espacoCampos2">
							

							<tr>
								<td class="campoConsulta">
									&nbsp;&nbsp; Nome do lanche 
								</td>		
							
							<tr>
								<td class="campoConsulta">
									&nbsp;&nbsp;Calorias
								</td>		
							</tr>
							<tr>
								<td class="campoConsulta">
									&nbsp;&nbsp;Proteinas 
								</td>		
							</tr>
							<tr>
								<td class="campoConsulta">
									&nbsp;&nbsp;Carboidratos
								</td>		
							</tr>
							<tr>
								<td class="campoConsulta">
									&nbsp;&nbsp;Gorduras
								</td>		
							</tr>
							<tr>
								<td class="campoConsulta">
									&nbsp;&nbsp;Gorduras saturadas
								</td>		
							</tr>
							<tr>
								<td class="campoConsulta">
									&nbsp;&nbsp;Gorduras Trans
								</td>		
							</tr>
							<tr>
								<td class="campoConsulta">
									&nbsp;&nbsp; Açúcar
								</td>		
							</tr>
							<tr>
								<td class="campoConsulta">
									&nbsp;&nbsp;Colesterol
								</td>		
							</tr>
							<tr>
								<td class="campoConsulta">
									&nbsp;&nbsp;Sódio 
								</td>		
							</tr>
						
						</table>

						<table id="espacoConsulta">
							
							
							<tr>
								<td  class="td_table">
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
							</tr>
							
							
							<tr>
								<td  class="td_table">
									&nbsp;&nbsp;<input type="text" name ="txtcalorias" size="15"/>

								</td>
							</tr>
							<tr>
								<td  class="td_table">
									&nbsp;&nbsp;<input type="text" name ="txtproteinas" size="15"/>

								</td>
							</tr>
							<tr>
								<td  class="td_table">
									&nbsp;&nbsp;<input type="text" name ="txtcarboidratos" size="15"/>
								</td>
							</tr>
							<tr>
								<td  class="td_table">
									&nbsp;&nbsp;<input type="text" name ="txtgorduras" size="15"/>

								</td>
							</tr>
							<tr>
								<td  class="td_table">
									&nbsp;&nbsp;<input type="text" name ="txtgordurasSaturadas" size="15"/>

								</td>
							</tr>
							<tr>
								<td  class="td_table">
									&nbsp;&nbsp;<input type="text" name ="txtgordurasTrans" size="15"/>

								</td>
							</tr>
							<tr>
								<td  class="td_table">
									&nbsp;&nbsp;<input type="text" name ="txtacucar" size="15"/>

								</td>
							</tr>
							<tr>
								<td  class="td_table">
									&nbsp;&nbsp;<input type="text" name ="txtcolesterol" size="15"/>

								</td>
							</tr>
							<tr>
								<td  class="td_table">
									&nbsp;&nbsp;<input type="text" name ="txtsodio" size="15"/>

								</td>
							</tr>
							
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
			<footer>
				<div id="desenvolvido">
						Desenvolvido por : Fabiola Almeida de Jesus
				</div>
			</footer>
					
				
		</div>
			
		</div>
	</body>
</html>