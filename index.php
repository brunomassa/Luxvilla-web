<!--  Copyright 2016 Bruno Massa  -->
<!-- This file is part of LuxVilla.

    LuxVilla is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    LuxVilla is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with LuxVilla.  If not, see <http://www.gnu.org/licenses/>.

 -->
<?php
define("servername","localhost");
define("username","root");
define("password","");
define("dbname","db_luxvilla");

$sql ="SELECT id, imgURL, local,preco,infocasa,linkcasa FROM casas ORDER BY casas.id DESC";

$conn =new mysqli(servername, username, password, dbname);

// Check connection

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $imgurl, $local, $preco, $infocasa, $linkcasa);

while($stmt->fetch()) 
{

if(isset($_COOKIE["heart".$id])) {
		
}else{
	setcookie("heart".$id, 0, time() + (86400 * 30), "/");
}
}
?>
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
<title>Lux Villa</title>
<link href="styles/styles.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<script src="https://www.gstatic.com/firebasejs/4.1.1/firebase.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="javascript/javascript.js"></script>
<script type="text/javascript" src="javascript/epggea.js"></script>

<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
<script>
window.addEventListener("load", function(){
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#ffffff",
      "text": "#651d31"
    },
    "button": {
      "background": "transparent",
      "border": "#651d31",
      "text": "#651d31"
    }
  },
  "content": {
    "message": "Este website usa cookies para melhorar a experiência.",
    "dismiss": "Compreendi",
    "link": "ler mais"
  }
})});
</script>
</head>

<body bgcolor="#f2f2f2">
<header class="nav-down">
    <ul class="menu" id="menusite">
  <li><a href="http://localhost/luxvilla-web/"><img src="favicon.ico"></a></li>
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
  <li><a href="#casas">Casas</a></li>
  
  <li><a href="#inicio">In&iacute;cio</a></li>
  <li class="icon">
    <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()">☰</a>
  </li>
  
  <form style="float:right; margin-right:5px; margin-top:7px;" action="http://localhost/luxvilla-web/search/" method="post">
	<input type="search" placeholder="Pesquisar casas..." name="q">
</form>
</ul>
</header>
<div id="inicio">
<link href="cssslider_files/csss_engine1/style.css" rel="stylesheet">

<script src="cssslider_files/csss_engine1/gestures.js" type="text/javascript"></script> 
<div class='csslider1 autoplay'>
		<input name="cs_anchor1" id='cs_slide1_0' type="radio" class='cs_anchor slide' >
		<input name="cs_anchor1" id='cs_slide1_1' type="radio" class='cs_anchor slide' >
		<input name="cs_anchor1" id='cs_slide1_2' type="radio" class='cs_anchor slide' >
		<input name="cs_anchor1" id='cs_play1' type="radio" class='cs_anchor' checked>
		<input name="cs_anchor1" id='cs_pause1_0' type="radio" class='cs_anchor pause'>
		<input name="cs_anchor1" id='cs_pause1_1' type="radio" class='cs_anchor pause'>
		<input name="cs_anchor1" id='cs_pause1_2' type="radio" class='cs_anchor pause'>
		<ul>
			<li class="cs_skeleton"><img style="width: 100%;" src="casa1.jpg"></li>
			<li class='num0 img slide'>  <a href="casa.php?id=3" target="_self"><img src="casa1.jpg" alt='Braga' title='Braga' /> </a> </li>
			<li class='num1 img slide'>  <a href="casa.php?id=8" target="_self"><img src="casa8.jpg" alt='Porto' title='Porto' /> </a> </li>
			<li class='num2 img slide'>  <a href="casa.php?id=10" target="_self"><img src="casa10.jpg" alt='Porto' title='Porto' /> </a> </li>
		</ul><div class="cs_engine"></div>
		<div class='cs_description'>
			<label class='num0'><span class="cs_title"><span class="cs_wrapper">1.700.000 &euro;</span></span></label>
			<label class='num1'><span class="cs_title"><span class="cs_wrapper">3.200.000 &euro;</span></span></label>
			<label class='num2'><span class="cs_title"><span class="cs_wrapper">1.600.000 &euro;</span></span></label>
		</div>
		<div class='cs_arrowprev'>
			<label class='num0' for='cs_slide1_0'><span><i></i><b></b></span></label>
			<label class='num1' for='cs_slide1_1'><span><i></i><b></b></span></label>
			<label class='num2' for='cs_slide1_2'><span><i></i><b></b></span></label>
		</div>
		<div class='cs_arrownext'>
			<label class='num0' for='cs_slide1_0'><span><i></i><b></b></span></label>
			<label class='num1' for='cs_slide1_1'><span><i></i><b></b></span></label>
			<label class='num2' for='cs_slide1_2'><span><i></i><b></b></span></label>
		</div>
		</div>
        </div>
<div id="casas">
<div class="content">
<?php
/*
10 next pages
for($i = $page + 1; $i <= min($page + 11, $total_pages); $i++)
or if you want 5 prev and 5 next
for($i = max(1, $page - 5); $i <= min($page + 5, $total_pages); $i++)*/

// Create connection

$conn =new mysqli(servername, username, password, dbname);

// Check connection

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

$itens_pagina=10;
$num_itens="SELECT COUNT('id') FROM casas";

$stmt=$conn->prepare($num_itens);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($itens);
$stmt->fetch();

$paginas=ceil($itens/$itens_pagina);

$page=(isset($_GET['page'])) ? (int)$_GET['page'] : 1;

$inicio=($page-1)*$itens_pagina;

$sql ="SELECT id, imgURL, local,preco,infocasa,linkcasa FROM casas ORDER BY casas.id DESC LIMIT $inicio, $itens_pagina";

$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $imgurl, $local, $preco, $infocasa, $linkcasa);
  
while($stmt->fetch()) 
{
	echo '<div class="casacard">
       <div style="width:100%; height:60%;">
       <a href="casa.php?id='.$id.'">
       <img src="'.$imgurl.'" width="100%" height="100%">
       </a>
       </div>
       <div class="divtexto">
       <div style="flex:2 0 0;">
       <p>'.$local.'</p>
       <p>'.$preco.'</p>
       </div>
       <div>';
       if(empty($_COOKIE["heart".$id])||$_COOKIE["heart".$id]==0){
          echo '<div id="heart'.$id.'" class="heart">
		  </div>';
		  }else{
			  echo '<div id="heart'.$id.'" class="heart liked">
		  </div>';
		  }
       echo '</div>
       </div>
       </div>';
}

if($paginas>=1){
	echo '<div class="center" style="width:100%;">';
	echo '<div class="pagination">';
	if($page==1){
		echo '<a id="arrowleft" href="#"><i id="ileft" class="arrowleft"></i></a>';
	}else{
		echo '<a id="arrowleft" href="?page='.($page-1).'"><i id="ileft" class="arrowleft"></i></a>';
	}
	for($i = max(1, $page - 5); $i <= min($page + 5, $paginas);$i++){
		if($i==$page){
			echo '<a href="#" class="active">'.$i.'</a>';
		}else{
			echo '<a href="?page='.$i.'">'.$i.'</a>';
		}
	}
	if($page==$paginas){
		echo '<a id="arrowright" href="#"><i id="iright"  class="arrowright"></i></a>';
	}else{
		echo '<a id="arrowright" href="?page='.($page+1).'"><i  id="iright" class="arrowright"></i></a>';
	}
	echo '</div>';
	echo '</div>';
}else{
	echo '<div class="center" style="width:100%;">';
	echo 'sem resultados para mostrar';
	echo '</div>';
}
$stmt->close();
mysqli_close($conn);
?>
</div>
</div>  
        <footer id="contactos">
        <div class="center" style="padding-top:40px;">
        <div>
          <a target="new" href="https://github.com/brunomassa/Luxvilla-web" style="text-decoration:none;">
          <div class=" btnfooter wave light">
          <i class="material-icons">code</i>
          <font>
          WEB CODE 
          </font>
          </div>
          </a>
   
</div>
<div>
       <a target="new" href="https://github.com/brunomassa/LuxVilla" style="text-decoration:none;">
       <div class="btnfooter wave light">
          &nbsp;<i class="material-icons">android</i> <font>ANDROID</font>
       </div>
       </a>
</div>
        </div>
</footer>
<!-- <div class="subfooter"><div style="position: relative;top: 50%;transform: translateY(-50%);">IF YOU WANT</div></div> -->
<p class="backtop-hidden" id="back-top">
		<a href="#inicio"><span></span></a>
	</p>
     <div id="snackbar"></div>
    </body>
</html>