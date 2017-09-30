<?php 

//conexão com o banco
	require_once ('modulo.php');
	
?>


<html>
<head>
<title>My first chart using FusionCharts Suite XT</title>
<script type="text/javascript" src="fusioncharts/fusioncharts.js"></script>
<script type="text/javascript" src="fusioncharts/themes/fusioncharts.theme.carbon.js"></script>
<script type="text/javascript">
  FusionCharts.ready(function(){
    var revenueChart = new FusionCharts({
        "type": "pie2d",
        "renderAt": "chartContainer",
        "width": "990",
        "height": "530",
		"bgcolor":"#FAFAEC",
        "dataFormat": "json",
        "dataSource":  {
          "chart": {
            "caption": "Acesso de lanches",
            "subCaption": "Quantidade de cliques em detalhes",
            "xAxisName": "Produtos",
            "theme": "carbon",
			 "numberPrefix": "visualizações : ",
         },
         "data": [
				<?php
					$sqll="select idProdutos,nome,clickDetalhes from tbl_produtos";
					$select=mysql_query($sqll);
					$consulta=($select);

					
					while($consulta=mysql_fetch_array($select))
					{
						
				?>
						{
						   "label": "<?php echo ($consulta['nome']); ?>",
						   "value": "<?php echo ($consulta['clickDetalhes']); ?>"
						},
				<?php
					}
				?>
          
			 
			  ]
      }

  });
revenueChart.render();
})
</script>
</head>
<body>
  <div id="chartContainer"></div>
</body>
</html>