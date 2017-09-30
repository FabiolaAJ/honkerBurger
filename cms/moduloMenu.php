<?php 
	//conexão com o banco
	require_once ('modulo.php');
	
?>

<html>
	<head>
	
	</head>
	
	<body>
				
			
						<!--ADIMINISTRADOR-->
							<?php 
								$nivel = $_SESSION['idNivel'];
								if($nivel ==1){
							
							?>
								<div class="opt0">
									<div class="imgOpt">
										<img src="imagens/conteudo.png" alt="conteudo" width="95%" height="95%">

									</div>

									<div class="opt">
										<a href="conteudoadm.php">Adm. Conteúdo</a>
									</div>
								</div>
								<div class="opt0">
									<div class="imgOpt">
										<img src="imagens/faleconosco2.png" alt="faleconosco" width="100%" height="95%">

									</div>
									<div class="opt">
											<a href="faleconoscoadm.php">Adm. Fale Conosco </a>
									</div>
								</div>
								<div class="opt0">

									<div class="imgOpt">
										<img src="imagens/produto0.png" alt="produto" width="95%" height="95%">

									</div>
									<div class="opt">
										<a href="admProdutos.php">Adm. Produtos</a>

									</div>
								</div>
								<div class="opt0">
									<div class="imgOpt">
										<img src="imagens/user.png" alt="usuario" width="95%" height="95%">

									</div>
									<div class="opt">
										<a href="usuarioadm.php">Adm. Usuários</a>
									</div>
								</div>
					
							<?php 
							    //Operador Basico
								}else if($nivel ==2){
							?>
						
								<div class="opt0">
									<div class="imgOpt">
										<img src="imagens/conteudo.png" alt="conteudo" width="95%" height="95%">

									</div>

									<div class="opt">
										<a href="conteudoadm.php">Adm. Conteúdo</a>
									</div>
								</div>
								<div class="opt0">
									<div class="imgOpt">
										<img src="imagens/faleconosco2.png" alt="faleconosco" width="100%" height="95%">

									</div>
									<div class="opt">
											<a href="faleconoscoadm.php">Adm. Fale Conosco </a>
									</div>
								</div>
								<div class="opt0">

									<div class="imgOpt">
										<img src="imagens/produto0.png" alt="produto" width="95%" height="95%">

									</div>
									<div class="opt">
										Adm. Produtos

									</div>
								</div>
								<div class="opt0">
									<div class="imgOpt">
										<img src="imagens/user.png" alt="usuario" width="95%" height="95%">

									</div>
									<div class="opt">
										<a href="usuarioadm.php">Adm. Usuários</a>
									</div>
								</div>
						
						<?php		
							//Cataloguista
						
							}else if($nivel ==3){
						?>
						
							<div class="opt0">
									<div class="imgOpt">
										<img src="imagens/conteudo.png" alt="conteudo" width="95%" height="95%">

									</div>

									<div class="opt">
										Adm. Conteúdo
									</div>
								</div>
								<div class="opt0">
									<div class="imgOpt">
										<img src="imagens/faleconosco2.png" alt="faleconosco" width="100%" height="95%">

									</div>
									<div class="opt">
										Adm. Fale Conosco 
									</div>
								</div>
								<div class="opt0">

									<div class="imgOpt">
										<img src="imagens/produto0.png" alt="produto" width="95%" height="95%">

									</div>
									<div class="opt">
										<a href="admProdutos.php">Adm. Produtos</a>

									</div>
								</div>
								<div class="opt0">
									<div class="imgOpt">
										<img src="imagens/user.png" alt="usuario" width="95%" height="95%">

									</div>
									<div class="opt">
										Adm. Usuários
									</div>
								</div>
							
						<?php						
							}
						?>
		
				
	</body>

</html>