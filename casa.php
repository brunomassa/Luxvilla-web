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
 <div style="background:#CCC; width:100%; min-height:100px; margin-top:10px; padding-bottom:10px; overflow: hidden;" id="conteudo">
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
          <a target="new" href="https://github.com/brunomassa/Luxvilla-web"><button class="btn"><span><svg style="width:39px;height:39px;" viewBox="-3 -14 35 35">
    <path fill="#ffffff" d="M12,2A10,10 0 0,0 2,12C2,16.42 4.87,20.17 8.84,21.5C9.34,21.58 9.5,21.27 9.5,21C9.5,20.77 9.5,20.14 9.5,19.31C6.73,19.91 6.14,17.97 6.14,17.97C5.68,16.81 5.03,16.5 5.03,16.5C4.12,15.88 5.1,15.9 5.1,15.9C6.1,15.97 6.63,16.93 6.63,16.93C7.5,18.45 8.97,18 9.54,17.76C9.63,17.11 9.89,16.67 10.17,16.42C7.95,16.17 5.62,15.31 5.62,11.5C5.62,10.39 6,9.5 6.65,8.79C6.55,8.54 6.2,7.5 6.75,6.15C6.75,6.15 7.59,5.88 9.5,7.17C10.29,6.95 11.15,6.84 12,6.84C12.85,6.84 13.71,6.95 14.5,7.17C16.41,5.88 17.25,6.15 17.25,6.15C17.8,7.5 17.45,8.54 17.35,8.79C18,9.5 18.38,10.39 18.38,11.5C18.38,15.32 16.04,16.16 13.81,16.41C14.17,16.72 14.5,17.33 14.5,18.26C14.5,19.6 14.5,20.68 14.5,21C14.5,21.27 14.66,21.59 15.17,21.5C19.14,20.16 22,16.42 22,12A10,10 0 0,0 12,2Z" />
</svg><font size="5" color="#FFFFFF"> github (Code)</font></span></button></a></div>
&nbsp;
<div>
       <a target="new" href="https://github.com/brunomassa/LuxVilla"><button class="btn"><span><svg style="width:39px;height:39px;" viewBox="-3 -14 35 35">
    <path fill="#ffffff" d="M12,2A10,10 0 0,0 2,12C2,16.42 4.87,20.17 8.84,21.5C9.34,21.58 9.5,21.27 9.5,21C9.5,20.77 9.5,20.14 9.5,19.31C6.73,19.91 6.14,17.97 6.14,17.97C5.68,16.81 5.03,16.5 5.03,16.5C4.12,15.88 5.1,15.9 5.1,15.9C6.1,15.97 6.63,16.93 6.63,16.93C7.5,18.45 8.97,18 9.54,17.76C9.63,17.11 9.89,16.67 10.17,16.42C7.95,16.17 5.62,15.31 5.62,11.5C5.62,10.39 6,9.5 6.65,8.79C6.55,8.54 6.2,7.5 6.75,6.15C6.75,6.15 7.59,5.88 9.5,7.17C10.29,6.95 11.15,6.84 12,6.84C12.85,6.84 13.71,6.95 14.5,7.17C16.41,5.88 17.25,6.15 17.25,6.15C17.8,7.5 17.45,8.54 17.35,8.79C18,9.5 18.38,10.39 18.38,11.5C18.38,15.32 16.04,16.16 13.81,16.41C14.17,16.72 14.5,17.33 14.5,18.26C14.5,19.6 14.5,20.68 14.5,21C14.5,21.27 14.66,21.59 15.17,21.5C19.14,20.16 22,16.42 22,12A10,10 0 0,0 12,2Z" />
</svg><font size="5" color="#FFFFFF"> github (Android)</font></span></button></a>
</div>
        </div>
</footer>
<p id="back-top">
		<a href="#inicio"><span></span></a>
	</p>
</body>
</html>