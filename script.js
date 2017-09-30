var index = 1;
var sTempo=3000;			
	function plusIndex(n){
		index = index + n;
		showImage(index);
	}
	
	showImage(1);
	
	function showImage(n){
		var i;
		var x = document.getElementsByClassName("slides");
		if(n > x.length){index = 1};
		if(n < 1){index = x.length};
		for(i=0;i<x.length;i++)
			{
				x[i].style.display = "none";
			}
		x[index-1].style.display = "block";
	}
	
	/* Passar automaticamente as imagens */
	autoSlide();
	function autoSlide(){
		var i;
		var x = document.getElementsByClassName("slides");
		for(i=0;i<x.length;i++)
			{
				x[i].style.display = "none";
			}
		if(index > x.length){ index = 1}
		x[index-1].style.display = "block";
		index++;
		setTimeout(autoSlide, sTempo);
	}
/*sAtual=1;
sMax=3;
sTempo=3960;

var index=1;

function plusIndex(n){
	index = index + n;
	showImage(index);
}
showImage(1);

function showImage(n){
	var i;
	var x =document.getElementsById("img1");
	if (n >x.length)(index=1);
	if(n <1)(index = x.length);
	for(i=0;i<x.length;i++){
		x[i].style.display="none";
	}
	x[index-1].style.display="block";
	
}

function troca(){
	document.getElementById("img1").style.visibility="hidden";
	document.getElementById("img2").style.visibility="hidden";
	document.getElementById("img3").style.visibility="hidden";

	
	document.getElementById("img"+sAtual).style.visibility="visible";

	sAtual=sAtual+1;
	
	if(sAtual > sMax){
		sAtual=1;
	}
}

function slider(){
	document.getElementById("img1").style.visibility="hidden";
	document.getElementById("img2").style.visibility="hidden";
	document.getElementById("img3").style.visibility="visible";
	
	sliderTimer =setInterval(troca,sTempo);
}*/


