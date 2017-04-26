<!doctype html>
<html>
<head>
<meta name="theme-color" content="#651d31" />
<meta charset="utf-8">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="/manifest.json">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="theme-color" content="#ffffff">
<title><?php
define("servername","localhost");
define("username","root");
define("password","");
define("dbname","db_luxvilla");

$id=$_GET['id'];

// Create connection

$conn =new mysqli(servername, username, password, dbname);

// Check connection

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

$query="SELECT local,preco,infocasa FROM casas WHERE id=$id";

$stmt=$conn->prepare($query);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($local, $preco, $info);
$stmt->fetch();

echo $local." - ".$preco;

?></title>
<link href="styles/styles.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="javascript/javascript.js"></script>
</head>

<body bgcolor="#CCC">
<header class="nav-down">
<ul class="menu" id="menusite">
  <li ><a href="http://localhost/luxvilla-web"><img src="favicon.ico"></a></li>
  <li><a href="sobre nos.html">Sobre n&oacute;s</a></li>
  <li><a href="http://localhost/luxvilla-web#casas">Casas</a></li>
  
  <li><a href="http://localhost/luxvilla-web">In&iacute;cio</a></li>
  <li class="icon">
    <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()">☰</a>
  </li>
  
  <form style="float:right; margin-right:5px; margin-top:7px;" action="http://brunoferreira.esy.es/search/" method="post">
	<input type="search" placeholder="Pesquisar casas..." name="q">
</form>
</ul>
</header>
<!--slider-->
<div id="inicio">
<?php
// Create connection

$conn =new mysqli(servername, username, password, dbname);

// Check connection

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

$query="SELECT imgslider1,imgslider2,imgslider3,imgslider4 FROM casas WHERE id=$id";

$stmt=$conn->prepare($query);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($imgslider1, $imgslider2, $imgslider3, $imgslider4);
$stmt->fetch();

if(!empty($imgslider4)){

	echo'<link rel="stylesheet" href="cssslidercasa1_files/csss_engine1/style.css">
			<!--[if IE]><link rel="stylesheet" href="cssslidercasa1_files/csss_engine1/ie.css"><![endif]-->
			<!--[if lte IE 9]><script type="text/javascript" src="cssslidercasa1_files/csss_engine1/ie.js"></script><![endif]-->
			 <div class="csslider1 autoplay">
			<input name="cs_anchor1" id="cs_slide1_0" type="radio" class="cs_anchor slide" >
			<input name="cs_anchor1" id="cs_slide1_1" type="radio" class="cs_anchor slide" >
			<input name="cs_anchor1" id="cs_slide1_2" type="radio" class="cs_anchor slide" >
			<input name="cs_anchor1" id="cs_slide1_3" type="radio" class="cs_anchor slide" >
			<input name="cs_anchor1" id="cs_play1" type="radio" class="cs_anchor" checked>
			<input name="cs_anchor1" id="cs_pause1_0" type="radio" class="cs_anchor pause">
			<input name="cs_anchor1" id="cs_pause1_1" type="radio" class="cs_anchor pause">
			<input name="cs_anchor1" id="cs_pause1_2" type="radio" class="cs_anchor pause">
			<input name="cs_anchor1" id="cs_pause1_3" type="radio" class="cs_anchor pause">
			<ul>
				<li class="cs_skeleton"><img src="'.$imgslider1.'" style="width: 100%;"></li>
				<li class="num0 img slide"> <img src="'.$imgslider1.'" alt="casa1_1" title="casa1_1" /></li>
				<li class="num1 img slide"> <img src="'.$imgslider2.'" alt="casa1_2" title="casa1_2" /></li>
				<li class="num2 img slide"> <img src="'.$imgslider3.'" alt="casa1_3" title="casa1_3" /></li>
				<li class="num3 img slide"> <img src="'.$imgslider4.'" alt="casa1_4" title="casa1_4" /></li>
			</ul>
			
			<div class="cs_arrowprev">
				<label class="num0" for="cs_slide1_0"><span><i></i><b></b></span></label>
				<label class="num1" for="cs_slide1_1"><span><i></i><b></b></span></label>
				<label class="num2" for="cs_slide1_2"><span><i></i><b></b></span></label>
				<label class="num3" for="cs_slide1_3"><span><i></i><b></b></span></label>
			</div>
			<div class="cs_arrownext">
				<label class="num0" for="cs_slide1_0"><span><i></i><b></b></span></label>
				<label class="num1" for="cs_slide1_1"><span><i></i><b></b></span></label>
				<label class="num2" for="cs_slide1_2"><span><i></i><b></b></span></label>
				<label class="num3" for="cs_slide1_3"><span><i></i><b></b></span></label>
			</div>
			</div>';
}else{
	echo '<link href="cssslider_files/csss_engine1/style.css" rel="stylesheet">
		<!--[if IE]><link rel="stylesheet" href="cssslider_files/csss_engine1/ie.css"><![endif]-->
		<!--[if lte IE 9]><script type="text/javascript" src="cssslider_files/csss_engine1/ie.js"></script><![endif]-->
		<script src="cssslider_files/csss_engine1/gestures.js" type="text/javascript"></script> <div class="csslider1 autoplay ">
		<input name="cs_anchor1" id="cs_slide1_0" type="radio" class="cs_anchor slide" >
		<input name="cs_anchor1" id="cs_slide1_1" type="radio" class="cs_anchor slide" >
		<input name="cs_anchor1" id="cs_slide1_2" type="radio" class="cs_anchor slide" >
		<input name="cs_anchor1" id="cs_play1" type="radio" class="cs_anchor" checked>
		<input name="cs_anchor1" id="cs_pause1_0" type="radio" class="cs_anchor pause">
		<input name="cs_anchor1" id="cs_pause1_1" type="radio" class="cs_anchor pause">
		<input name="cs_anchor1" id="cs_pause1_2" type="radio" class="cs_anchor pause">
		<ul>
			<li class="cs_skeleton"><img style="width: 100%;" src="'.$imgslider1.'"></li>
			<li class="num0 img slide">  <a href="google.com" target="_self"><img src="'.$imgslider1.'" alt="Casa x" title="Casa x" /> </a> </li>
			<li class="num1 img slide">  <a href="google.com" target="_self"><img src="'.$imgslider2.'" alt="Casa y" title="Casa y" /> </a> </li>
			<li class="num2 img slide">  <a href="google.com" target="_self"><img src="'.$imgslider3.'" alt="Casa z" title="Casa z" /> </a> </li>
		</ul><div class="cs_engine"></div>
		<div class="cs_arrowprev">
			<label class="num0" for="cs_slide1_0"><span><i></i><b></b></span></label>
			<label class="num1" for="cs_slide1_1"><span><i></i><b></b></span></label>
			<label class="num2" for="cs_slide1_2"><span><i></i><b></b></span></label>
		</div>
		<div class="cs_arrownext">
			<label class="num0" for="cs_slide1_0"><span><i></i><b></b></span></label>
			<label class="num1" for="cs_slide1_1"><span><i></i><b></b></span></label>
			<label class="num2" for="cs_slide1_2"><span><i></i><b></b></span></label>
		</div>
		</div>';
}
?>
</div>
 <div class="conteudo" id="conteudo">
<div class="caixaconteudo">
<p class="pcaixa">
<?php

$id=$_GET['id'];

// Create connection

$conn =new mysqli(servername, username, password, dbname);

// Check connection

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

$query="SELECT local,preco,infocasa FROM casas WHERE id=$id";

$stmt=$conn->prepare($query);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($local, $preco, $info);
$stmt->fetch();

echo "Local: ".$local;
echo "<br><br>";
echo "Preço: ".$preco;
echo "<br><br>";
echo $info;
echo '</p>';
		  if(isset($_COOKIE["heart".$id]) && $_COOKIE["heart".$id]==0){
          echo '<div style="float:right;" id="heart'.$id.'" class="heart">
		  </div>';
		  }else{
			  echo '<div style="float:right;" id="heart'.$id.'" class="heart liked">
		  </div>';
		  }
//echo $local."<br><br>".$preco."<br><br>".$info;

?>

</div>
</div>
<footer id="contactos">
        <div class="center" style="padding-top:40px;">
        <div>
          <a target="new" href="https://github.com/brunomassa/Luxvilla-web"><button class="btn"><span><svg style="width:39px;height:39px" viewBox="-2 -12 35 35">
    <path fill="#ffffff" d="M16.36,14C16.44,13.34 16.5,12.68 16.5,12C16.5,11.32 16.44,10.66 16.36,10H19.74C19.9,10.64 20,11.31 20,12C20,12.69 19.9,13.36 19.74,14M14.59,19.56C15.19,18.45 15.65,17.25 15.97,16H18.92C17.96,17.65 16.43,18.93 14.59,19.56M14.34,14H9.66C9.56,13.34 9.5,12.68 9.5,12C9.5,11.32 9.56,10.65 9.66,10H14.34C14.43,10.65 14.5,11.32 14.5,12C14.5,12.68 14.43,13.34 14.34,14M12,19.96C11.17,18.76 10.5,17.43 10.09,16H13.91C13.5,17.43 12.83,18.76 12,19.96M8,8H5.08C6.03,6.34 7.57,5.06 9.4,4.44C8.8,5.55 8.35,6.75 8,8M5.08,16H8C8.35,17.25 8.8,18.45 9.4,19.56C7.57,18.93 6.03,17.65 5.08,16M4.26,14C4.1,13.36 4,12.69 4,12C4,11.31 4.1,10.64 4.26,10H7.64C7.56,10.66 7.5,11.32 7.5,12C7.5,12.68 7.56,13.34 7.64,14M12,4.03C12.83,5.23 13.5,6.57 13.91,8H10.09C10.5,6.57 11.17,5.23 12,4.03M18.92,8H15.97C15.65,6.75 15.19,5.55 14.59,4.44C16.43,5.07 17.96,6.34 18.92,8M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
</svg><font size="5" color="#FFFFFF"> github (Code)</font></span></button></a></div>
&nbsp;
<div>
       <a target="new" href="https://github.com/brunomassa/LuxVilla"><button class="btn"><span><svg style="width:39px;height:39px;" viewBox="-2 -12 35 35">
    <path fill="#ffffff" d="M15,5H14V4H15M10,5H9V4H10M15.53,2.16L16.84,0.85C17.03,0.66 17.03,0.34 16.84,0.14C16.64,-0.05 16.32,-0.05 16.13,0.14L14.65,1.62C13.85,1.23 12.95,1 12,1C11.04,1 10.14,1.23 9.34,1.63L7.85,0.14C7.66,-0.05 7.34,-0.05 7.15,0.14C6.95,0.34 6.95,0.66 7.15,0.85L8.46,2.16C6.97,3.26 6,5 6,7H18C18,5 17,3.25 15.53,2.16M20.5,8A1.5,1.5 0 0,0 19,9.5V16.5A1.5,1.5 0 0,0 20.5,18A1.5,1.5 0 0,0 22,16.5V9.5A1.5,1.5 0 0,0 20.5,8M3.5,8A1.5,1.5 0 0,0 2,9.5V16.5A1.5,1.5 0 0,0 3.5,18A1.5,1.5 0 0,0 5,16.5V9.5A1.5,1.5 0 0,0 3.5,8M6,18A1,1 0 0,0 7,19H8V22.5A1.5,1.5 0 0,0 9.5,24A1.5,1.5 0 0,0 11,22.5V19H13V22.5A1.5,1.5 0 0,0 14.5,24A1.5,1.5 0 0,0 16,22.5V19H17A1,1 0 0,0 18,18V8H6V18Z" />
</svg><font size="5" color="#FFFFFF"> github (Android)</font></span></button></a>
</div>
        </div>
</footer>
<p class="backtop-hidden" id="back-top">
		<a href="#inicio"><span></span></a>
	</p>
</body>
</html>