<?php

//conexão com o banco
	require_once ('modulo.php');
	session_start();
	
	
	
	if(isset ($_GET['opt'])){
		$opt=$_GET['opt'];
		//configuração do botao excluir
		if ($opt =='excluir'){
			$idmensagem=$_GET['idmensagem'];
			// deletar o registro selecionado
			$sql="delete from tblmensagem where idmensagem=".$idmensagem;
			
			mysql_query($sql);
			//comando para redirecionar para uma pagina	
			header('location:faleconoscoadm.php');
		}
		//configuração do botao ver mais
		if($opt =='ver'){
		
			$idmensagem=$_GET['idmensagem'];
			
			header('location:verMaisAdm.php');
			
		}
	}
	
	//quebra de sessao	
	if(isset($_POST['btnSair'])){
		include('logout.php');
		
	}	


	
	
	

?>
<html>
	<head>
		
	</head><title> CMS - Adm.Fale Conosco </title> 
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="shortcut icon" href="imagens/logoletrabranca.png">
		<meta http-equiv="Content-Type" content="text/html; 
		charset=utf-8" />
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
				<nav id="opções">
					<?php  include('moduloMenu.php');?>

					<div id="bemvindo">
						Bem vindo,<?php echo $_SESSION['nome']; ?>
					</div>
					<div id="logout">
						<input type="submit" value="Sair" name="btnSair"/>
					</div>
					
				</nav>
				<!-- tabela fale conosco -->
				<div id="Consulta">
					<div id="tituloConsulta" align="center">
						Mensagens de Sugestões/Críticas
					</div>
					<table id="tabelaConsulta" border="0">
							<tr>
								<td class="campoConsulta" align="center" >
										&nbsp;Nome&nbsp;
								</td>
								<td class="campoConsulta" align="center" >
										&nbsp;Telefone&nbsp;
								</td>
								<td class="campoConsulta" align="center" >
										&nbsp;Celular&nbsp;
								</td>
								<td class="campoConsulta" align="center" >
										&nbsp;E-mail&nbsp;
								</td>
								
								<td class="campoConsulta" align="center" >
										&nbsp;Sexo&nbsp;
								</td>
								
								<td class="campoConsulta" align="center" >
									&nbsp;	Opções&nbsp;
								</td>
							</tr>
						
							
							<?php
								/*pesquisa da lista no banco*/
								$sql = "select * from tblMensagem";
								$select=mysql_query($sql);
								while($consulta=mysql_fetch_array($select)){
									
									
							?>
							<!--formatação das linhas da tabela -->
							<tr >
								<td class="td_table">&nbsp;&nbsp;<?php echo($consulta['nome']);?> </td>
								<td class="td_table" rowspan="1">&nbsp;&nbsp;<?php echo($consulta['telefone']);?> </td>
								<td class="td_table" rowspan="1">&nbsp;&nbsp;<?php echo($consulta['celular']);?> </td>
								<td class="td_table" rowspan="1">&nbsp;&nbsp;<?php echo($consulta['email']);?> </td>
								
								<td class="td_table" rowspan="1">&nbsp;&nbsp;
									<?php 
									
										if($consulta['sexo'] == "M"){
											echo("Masculino");
										}else if($consulta['sexo'] == "F"){
											echo("Feminino");
										}
											
										
										
									?> 
								</td>
							
								<td class="td_table">
									&nbsp;&nbsp;<a href="faleconoscoadm.php?opt=excluir&idmensagem=<?php echo($consulta['idmensagem']); ?>"><img src="imagens/delete2.png"></a>&nbsp;&nbsp;
									<!-- botao ver mais que resgatara o codigo e levara ate a pagina verMaisAdm mostrando a sugestão/critica por completo/-->
									&nbsp;&nbsp;<a href="verMaisAdm.php?opt=ver&idmensagem=<?php echo($consulta['idmensagem']); ?>"><img src="imagens/mais2.png"></a>&nbsp;&nbsp;
								</td>

							</tr>
							<?php 
								}
							?>
							
					</table>
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