<script>
					FusionCharts.ready(function () {
						var ageGroupChart = new FusionCharts({
							type: 'pie2d',
							renderAt: 'chart-container',
							width: '450',
							height: '300',
							dataFormat: 'json',
							dataSource: {
										"chart": {
											"caption": "Grafico de Acesso dos Produtos",
											"subCaption": "",
											"paletteColors": "#0075c2,#1aaf5d,#f2c500,#f45b00,#8e0000",
											"bgColor": "#ffffff",
											"showBorder": "0",
											"use3DLighting": "0",
											"showShadow": "0",
											"enableSmartLabels": "0",
											"startingAngle": "0",
											"showPercentValues": "1",
											"showPercentInTooltip": "0",
											"decimals": "1",
											"captionFontSize": "14",
											"subcaptionFontSize": "14",
											"subcaptionFontBold": "0",
											"toolTipColor": "#ffffff",
											"toolTipBorderThickness": "0",
											"toolTipBgColor": "#000000",
											"toolTipBgAlpha": "80",
											"toolTipBorderRadius": "2",
											"toolTipPadding": "5",
											"showHoverEffect":"1",
											"showLegend": "1",
											"legendBgColor": "#ffffff",
											"legendBorderAlpha": '0',
											"legendShadow": '0',
											"legendItemFontSize": '10',
											"legendItemFontColor": '#666666'
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
														"label": "<?php echo($consulta['nome']); ?>",
														"value": "<?php echo($consulta['clickDetalhes']); ?>"
													} 
													
											<?php
												}
											?>
											
										]
									}
						}).render();
					});
	</script>		