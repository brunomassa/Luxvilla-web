﻿<!doctype html>
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
<link href="styles/styles.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<script src="https://www.gstatic.com/firebasejs/4.1.1/firebase.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="javascript/javascript.min.js"></script>
<script type="text/javascript" src="javascript/epggea.js"></script>
</head>

<body bgcolor="#f2f4f5">
<header class="nav-down">
<ul class="menu" id="menusite">
  <li ><a href="http://localhost/luxvilla-web"><img src="favicon.ico"></a></li>
   <li id="usersignin" class="dropdown"><a href="javascript:void(0)"><i class="material-icons">person</i><i class="material-icons">arrow_drop_down</i></a>
<div id="myDropdown" class="dropdown-content">
<a id="signinlink" href="http://localhost/luxvilla-web/signin/"><i class="material-icons">account_circle</i><br><font>Log in</font></a>
<a id="signuplink" href="http://localhost/luxvilla-web/signup/"><i class="material-icons">person_add</i>
<br><font>Sign up</font></a>
<a id="profilelink" href="http://localhost/luxvilla-web/profile/"><i class="material-icons">account_circle</i><br><font>Perfil</font></a>
<a id="signoutlink" href="javascript:void(0)" onClick="signout()"><i class="material-icons">clear</i>
<br><font>Log out</font></a>
</div>
</li>
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
<div id="inicio" style="height: 100%; overflow: hidden; font-size: 62.5%; background: #000000">
    <script type="text/javascript" src="javascript/slider-js.min.js"></script>
    <link href="styles/style-slidercasa.min.css" rel="stylesheet">
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
	echo'<div class="slider-container">
  <div class="slider-control left inactive"></div>
  <div class="slider-control right"></div>
  <ul class="slider-pagi"></ul>
  <div class="slider">
    <div class="slide slide-0 active">
      <div class="slide__bg" style="background-image: url('.$imgslider1.');"></div>
    </div>
    <div class="slide slide-1 ">
      <div class="slide__bg" style="background-image: url('.$imgslider2.');"></div>
    </div>
    <div class="slide slide-2">
      <div class="slide__bg" style="background-image: url('.$imgslider3.');"></div>
    </div>
    <div class="slide slide-3">
      <div class="slide__bg" style="background-image: url('.$imgslider4.');"></div>
     </div>
  </div>
</div>';
}else{
	echo '<div class="slider-container">
  <div class="slider-control left inactive"></div>
  <div class="slider-control right"></div>
  <ul class="slider-pagi"></ul>
  <div class="slider">
    <div class="slide slide-0 active">
      <div class="slide__bg" style="background-image: url('.$imgslider1.');"></div>
    </div>
    <div class="slide slide-1 ">
      <div class="slide__bg" style="background-image: url('.$imgslider2.');"></div>
    </div>
    <div class="slide slide-2">
      <div class="slide__bg" style="background-image: url('.$imgslider3.');"></div>
    </div>
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
<footer id="contactos" class="footer">
        <div class="center" style="padding-top:40px;">
        <div>
          <a target="new" href="https://github.com/brunomassa/Luxvilla-web" style="text-decoration:none;">
   <div class=" btnfooter wave light">
          <i class="material-icons">code</i>
          <font>
          WEB CODE 
          </font>
          </div>
   </a></div>
<div>
       <a target="new" href="https://github.com/brunomassa/LuxVilla" style="text-decoration:none;">
       <div class="btnfooter wave light">
          &nbsp;<i class="material-icons">android</i> <font>ANDROID</font>
       </div>
       </a>
</div>
        </div>
</footer>
<div class="subfooter" style="background-color:#3D121C"><div style="position: relative;top: 50%;transform: translateY(-50%);">Luxvilla &copy; 2017</div></div>
<a href="#inicio" id="float">
  <br>
<i class="material-icons">keyboard_arrow_up</i>
</a>
    <div id="snackbar"></div>
</body>
</html>