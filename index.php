

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script type="text/javascript" src="jquery.js"></script>
	<meta name="viewport" content="width=device-width">
<body style="background-image: url('tlo2.jpg');background-size: 100%;">
<img src="czerwona.png" style="display: none;" id="czerwona">
	<img src="niebieska.png" style="display: none;" id="niebieska">
<center>
	 
	 <canvas id="myCanvas" width="400" height="400" >
</canvas> 
	 
	 
	 <script>
		 //----------------------------------zmienne
	 var tabx= new Array();
	 var taby= new Array();
		  var tabc= new Array();
	 var ostring=0;
		 var ostring2=0;
	 var opx;
	 var opy;
	 var gox=0;
	 var goy;
	 var blokada=1;
var jeden=1;
		 var obtocz;
		 var pomx;
		 var pomy;
		 var string;
		 var string2;
		 var jakies=1;
		  var img = document.getElementById("czerwona");
		 var img2 = document.getElementById("niebieska");
		 // tab
		 
		 
		 //-----------------------------tablica
		 <?php



$plik = fopen('kropki.txt','r');
$tekst4=fgets($plik, 10000);

$tab=explode("z",$tekst4);

fclose($plik);
//var_dump($tab);
	for ($i=0;$i<=400;$i++){
if (!empty($tab[$i])){
$pom=explode("a",$tab[$i]);
		//echo "alert('".$pom[2]."');";
}
if( !empty($pom[2])){
echo "tabx[".$i."]=".$pom[0].";taby[".$i."]=".$pom[1].";"."tabc[".$i."]='".$pom[2]."';";
}
}
//var_dump($pom);
		?>	  
		
	//------------------------------------------------------kratki	 
var canvas = document.getElementById("myCanvas");
var ctx = canvas.getContext("2d");
		 
ctx.fillStyle = "#000000";

		 for (var i=0;i<=20;i++){
			 for(var j=0;j<=20;j++){
				 ctx.fillRect(i*20,j*20,5,5);
			 }
		 }
document.addEventListener("DOMContentLoaded", init, false);
//----------------------------------------init
      function init()
      {
        var canvas = document.getElementById("myCanvas");
        canvas.addEventListener("mousedown", getPosition, false);
      }
//--------------------------------------onclick
	  function getPosition(event)
      {
		  obtocz=$("#obtocz").val();
        var x = new Number();
        var y = new Number();
        var canvas = document.getElementById("canvas");

        if (event.x != undefined && event.y != undefined)
        {
          x = event.x;
          y = event.y;
        }
        else // Firefox method to get the position
        {
          x = event.clientX + document.body.scrollLeft +
              document.documentElement.scrollLeft;
          y = event.clientY + document.body.scrollTop +
              document.documentElement.scrollTop;
        }

        x -= myCanvas.offsetLeft;
        y -= myCanvas.offsetTop;

        var rx=x;
		  var ry=y;
		  rx=rx/20;
		  ry=ry/20;
		  rx=Math.round(rx);
		  ry=Math.round(ry);
		  rx=rx*20;
		  ry=ry*20;
		  //--------------------------------obtaczanie
		  if(obtocz==1){
		  	if(jeden==1){
				
		  	opx=rx;
		  	opy=ry;
		 	pomx=rx;
			pomy=ry;
			ctx.moveTo(rx,ry);
				//alert('pierwsza');
				ostring=ostring+"z"+rx+"a"+ry+"ac";
				
			}else{
			//alert("rx " + rx + " ==  pomx "+pomx+", ry " + ry +" == pomy "+pomy);
			
				if((jeden!=1) && (((rx+20==pomx) || (rx-20==pomx) || (rx==pomx)) && ((ry+20==pomy) || (ry-20==pomy) || (ry==pomy)))){
				
				  for (var f=0;f<=400;f++){
				  
					  if(tabx[f]==rx && ry==taby[f] && tabc[f] == "c"){
						  //alert('punkt w tablicy');
					  ctx.moveTo(pomx,pomy);
				   	  ctx.lineTo(rx,ry);
	 	  			  ctx.stroke();
			 		  pomx=rx;
			  		  pomy=ry;
			  		  ostring=ostring+"z"+rx+"a"+ry+"ac";
			 		  //alert('rx '+rx+' opx '+opx+' ry '+ry+' opy'+opy);
						  // alert($('#obtocz').val());
						  if(rx==opx && ry==opy){
			  			 ostring2=2;
							  ///$.get( "ready.php", { go: "3"} )
  						  	  ///.done(function( data ) {
    						   ///});
			  			    }
						  
						  
			  		  }
				  }
			   }
			}
			  
			  jeden=2;
		 
			  
			  //alert("x: " + rx + "  y: " + ry);
		  }else{
			  //----------------------------------------------------kropki
			  string=rx/20;
			  string=string.toString();
			  string2=ry/20;	
			  string2=string2.toString();
			  //() 
			  if((string.indexOf(".")==-1) && (string2.indexOf(".")==-1)){
			 //var img = document.getElementById("czerwona");
//ctx.drawImage(img,rx-10,ry-10); 
			  window.location.href="index.php?kolor=c&x="+rx+"&y="+ry;
			  
			  
			 
				  //alert(rx);
				  
				  $.get( "ready.php", { go: "3"} )
  .done(function( data ) {
    //alert( "Data Loaded: " + data );
  });
				  
		
           if(blokada==1){
			   
			   for (var g=0;g<=400;g++){
				  if(tabx[g]==rx && ry==taby[g]){
					jakies=2;  
				  }
				   if(jakies!=2){
            gox=rx;
            goy=ry;
				   }
			   //ctx.drawImage(img,rx-7,ry-7);
            
		   
		   }
            if(jakies!=2){
            blokada=2;
			  //alert(rx+" , "+ry);
			}
			   jakies=1;
			  }
		  }
      }
	  }
		 //string="100";
	//alert(string.indexOf("."));
	//	 var c = document.getElementById("myCanvas");
//var ctx = c.getContext("2d");
	 //----------------------------------------------------------wczytywanie	
	<?php
	
echo "img.onload = function() {";
	for ($i=0;$i<=400;$i++){



//-------------------------------------------------krpek
//fclose($plik);
if(!empty($tab[$i])){
$pom=explode("a",$tab[$i]);
		$pomxm=$pom[0]-7;
		$pomym=$pom[1]-7;
if($pom[2]=="c" and !empty($pom[2])){
echo "ctx.drawImage(img,".$pomxm.",".$pomym."); ";
}
		
if($pom[2]=="n" and !empty($pom[2])){
echo "ctx.drawImage(img2,".$pomxm.",".$pomym."); ";
}
		
}
	}
echo "}";
//----------------------------------------------obtoczek
$plik = fopen('obtoczka.txt','r');
$tekst4=fgets($plik, 10000);
$tab2=explode("z",$tekst4);
	for ($i=0;$i<=200;$i++){

//fclose($plik);
		
$pom=explode("a",$tab2[$i]);
$pom2=explode("a",$tab2[$i+1]);
if( !empty($pom[2]) and $pom[2]=="c" and !empty($pom2[2])){
echo "
ctx.beginPath();ctx.moveTo(".$pom[0].",".$pom[1].");
				   ctx.lineTo(".$pom2[0].",".$pom2[1].");
	 	  ctx.strokeStyle = '#ff0000';
      ctx.stroke();";
}


if( !empty($pom[2]) and $pom[2]=="n" and !empty($pom2[2])){
echo "
ctx.beginPath();ctx.moveTo(".$pom[0].",".$pom[1].");
				   ctx.lineTo(".$pom2[0].",".$pom2[1].");
	 	  ctx.strokeStyle = '#0000ff';
      ctx.stroke();";
}

}
//echo "//----zzz";
//var_dump($pom);
		?>	  
		
		
		//--------------------------------------------reflesh
		function reflesh(){
		 $.get( "ready.php", { } );
				  
				  
$.get( "ready.php", function( data ) {
  //$( ".result" ).html( data );
  //alert( "Load was performed." );
	//alert(data);
		  	if(data==1){
				//$("#ready").val("ready");
				
				
				//window.location.href="index.php?kolor=n&x="+gox+"&y="+goy+"&ostring="+ostring;	
				window.location.href="index.php?reset=3";
				}else if(data==3){
					$("#ready").val("ready");
					$("#re").show();
					if(gox!=0 || ostring2 !=0){
						// ostring != 0
						window.location.href="index.php?reset=2&kolor=c&x="+gox+"&y="+goy+"&ostring="+ostring;
					}
					//alert(gox);
				}
	
});
				
					  
 
		
	
		
		}
		
		
		setInterval(reflesh, 1000);
		 //-----------------------------------body
	 </script>
	
	
	<br><br>
	<input type="button" value="round" onclick="$('#obtocz').val(1);"  style="display:none;" id="re"><br>
	<input type="text" id="ready">
	<input type="hidden" id="obtocz">
	
	
	
	
	<?php
//------------------------------------------zapis kropek
	if(!empty($_GET["kolor"])){
		$kolor=$_GET["kolor"];
	$x=$_GET["x"];
	$y=$_GET["y"];
	$k=$_GET["kolor"];
$plik = fopen('kropki.txt','r');
$tekst4=fgets($plik, 10000);
fclose($plik);

$tekst4.="z".$x."a".$y."a".$kolor;



$plik = fopen('kropki.txt','w');
fputs($plik, $tekst4);
fclose($plik);
		
		echo "<script>window.location.href='index.php?reset=2'</script>";
		
}
//------------------------------------------zapis obtoczek
if(!empty($_GET["ostring"])){
// matma
	
	$plik = fopen('obtoczka.txt','r');
$tekst4=fgets($plik, 10000);
fclose($plik);
	$tab=explode("z",$tekst4);
	
	$tab2=explode("z",$_GET["ostring"]);
	//echo "<script>alert('".$_GET["ostring"]."');</script>";
 
	for($i=0;$i<=200;$i++){
		for($j=0;$j<=200;$j++){
	
	$poms=explode("a",$tab2[$i]);
			$poms2=explode("a",$tab2[$i+1]);
			$zoms=explode("a",$tab[$j]);
			$zoms2=explode("a",$tab[$j+1]);
		if(!empty($tab2[$i+1]) and $zoms[2]=="n"){
			
			$ax=$poms[0];
				$ay=$poms[1];
				$bx=$poms2[0];
				$by=$poms2[1];
				$cx=$zoms[0];
				$cy=$zoms[1];
				$dx=$zoms2[0];
				$dy=$zoms2[1];
				
			if(($cx==$ax and $cy == $by and $bx == $dx and $ay == $dy) or ( $bx == $dx && $dy == $by and $ax == $cx and $cy == $by) or ( $ax == $dx and $dy == $by and $bx == $cx and $cy == $ay) or ($bx == $dx and $dy == $ay and $ax == $cx and $cy == $by) or ($cx == $ax and $cy == $by and $bx == $dx and $dy == $ay ) or ($ax  == $dx and $ay == $cy and $cx == $bx and $by == $dy) or ($ax == $dx and $dy == $by and $bx == $cx and $ay == $cy) or ($dx == $ax and $dy == $by and $cx == $bx and $ay == $cy)){
$czary=1;
				//echo "<script>alert('".$_GET["ostring"]."');</script>";
}
			}
			
		}
	
	}
	
	if($czary!=1){
	
	$x=$_GET["x"];
	$y=$_GET["y"];
	$k=$_GET["kolor"];



for($i=0;$i<=200;$i++){
		for($j=0;$j<=200;$j++){
		$poms=explode("a",$tab2[$j]);
		
		if($maxx<$poms[0]){
		$maxx=$poms[0];
			}
	
	if($maxy<$poms[1]){
		$maxy=$poms[1];
			}
}}
$minx=1000;
		$miny=1000;
	for($i=0;$i<=200;$i++){
		for($j=0;$j<=200;$j++){
		$poms=explode("a",$tab2[$j]);
		if(!empty($poms[0])){
			
		if($minx>$poms[0]){
		$minx=$poms[0];
			//echo "<script>alert('".$minx."')</script>";
			}
		
		if($miny>$poms[1]){
		$miny=$poms[1];
			}

}
	}}
	$point=($maxx-$minx)*($maxy-$miny);

	$plik = fopen('p1.txt','r');
$tekst4=fgets($plik, 10000);
fclose($plik);


$tekst4=$tekst4+$point;
	
//echo "<script>alert('".$point."');</script>";
$plik = fopen('p1.txt','w');
fputs($plik, $tekst4);
fclose($plik);
	
	
	
$x=$_GET["x"];
	$y=$_GET["y"];
	$k=$_GET["kolor"];
$plik = fopen('obtoczka.txt','r');
$tekst4=fgets($plik, 10000);
fclose($plik);

$tekst4.=$_GET["ostring"];



$plik = fopen('obtoczka.txt','w');
fputs($plik, $tekst4);
fclose($plik);
//echo "<script>alert('mx".$minx." my ".$miny." xx ".$maxx." xy ".$maxy."');</script>";
}

	
// -------------------------------------------------------------matma------------------ou, jeu----





}
//-----------------------------------------------reset
$reset=$_GET["reset"];
if(!empty($reset)){
$tekst4=$reset;
$plik = fopen('ready.txt','w');
fputs($plik, $tekst4);
fclose($plik); 
}

	$plik = fopen('p1.txt','r');
$tekst4=fgets($plik, 10000);
fclose($plik);

	$plik = fopen('p2.txt','r');
$tekst5=fgets($plik, 10000);
fclose($plik);
echo "<br>".$tekst4.":".$tekst5;

	?>
	<br>
	<br>
	<input type="button" value="reflesh" onclick="window.location.href='index.php?reset=2'">2