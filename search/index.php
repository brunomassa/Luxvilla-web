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
<title>Resultados de <?php $title=$_POST["q"]; echo $title;?></title>
<link href="../styles/styles.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<script src="https://www.gstatic.com/firebasejs/3.9.0/firebase.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="../javascript/javascript.js"></script>
<script type="text/javascript" src="../javascript/epggea.js"></script>
</head>

<body bgcolor="#f2f4f5">
<div style="min-height:10px;" id="top">
<header class="nav-down">
<ul class="menu" id="menusite">
  <li ><a href="http://localhost/luxvilla-web/"><img src="../favicon.ico"></a></li>
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
  <li><a href="http://localhost/luxvilla-web/sobre nos.html">Sobre n&oacute;s</a></li>
  <li><a href="http://localhost/luxvilla-web/#casas">Casas</a></li>
  
  <li><a href="http://localhost/luxvilla-web/">In&iacute;cio</a></li>
  <li class="icon">
    <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()">☰</a>
  </li>
  
  <form style="float:right; margin-right:5px; margin-top:7px;" action="http://localhost/luxvilla-web/search/" method="post">
	<input type="search" placeholder="Pesquisar casas..." name="q">
</form>
</ul>
</header>
</div>
<div style="background:#f2f4f5; width:100%; min-height:75vh; margin-top:10px; padding-bottom:10px; overflow: hidden; padding-top:90px;">

<?php

define("servername","localhost");
define("username","root");
define("password","");
define("dbname","db_luxvilla");

$query=$_POST["q"];

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

echo '<p style="margin-left:5%;" align="center"><b>Resultados da pesquisa de: '.$query.'</b></p>';
    
while($stmt->fetch()) 
{
	$locallower=strtolower($local);
	$precolower=strtolower($preco);
	$infocasalower=strtolower($infocasa);
	$querylower=strtolower($query);
	
	 if(strpos($locallower,$querylower)!==false || strpos($precolower,$querylower)!==false || strpos($infocasalower,$querylower) !==false){
		 /* Fazer like button*/
		 echo '<div style="margin-top:10px;">
<div class="container">
  <div class="uva-card uva-card--horizontal">
    <div class="uva-card__media">
    <a href="http://localhost/luxvilla-web/casa.php?id='. $id.'">
      <img src="'.$imgurl.'">
      </a>
    </div>
	<div class="uva-primarydiv">
    <div class="uva-card__content" style="flex: 5 0 0;">
      <div class="uva-card__body">
      <p>
      <strong>'.$local.'</strong>
      </p>
      <p>'.$preco.'</p>
      </div>
    </div>
	<div class="uva-card__content">
      <div class="uva-card__body">';
      if(empty($_COOKIE["heart".$id])||$_COOKIE["heart".$id]==0){
          echo '<div style="float:right;" id="heart'.$id.'" class="heart">
		  </div></div>';
		  }else{
			  echo '<div style="float:right;" id="heart'.$id.'" class="heart liked">
		  </div>';
		  }
      echo '</div>
    </div>
  </div>
  </div>
  
</div>';
	 }
}
if($paginas>=1){
	echo '<div class="center" style="width:100%;">';
	echo '<div class="pagination">';
	if($page==1){
		echo '<a id="arrowleft" href="#"><i id="ileft" class="arrowleft"></i></a>';
	}else{
		echo '<a id="arrowleft" href="?page='.($page-1).'"><i id="ileft" class="arrowleft"></i></a>';
	}
	for($i=max(1, $page - 5);$i<=min($page + 5, $paginas);$i++){
		if($i==$page){
			echo '<a href="#" class="active">'.$i.'</a>';
		}else{
			echo '<a href="?page='.$i.'">'.$i.'</a>';
		}
	}
	if($page==$paginas){
		echo '<a id="arrowright" href="#"><i id="iright"  class="arrowright"></i></a>';
	}else{
		echo '<a id="arrowright" href="?page='.($page+1).'"><i id="iright"  class="arrowright"></i></a>';
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
<div class="footer" id="contactos">
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
&nbsp;
<div>
       <a target="new" href="https://github.com/brunomassa/LuxVilla" style="text-decoration:none;">
       <div class="btnfooter wave light">
          &nbsp;<i class="material-icons">android</i> <font>ANDROID</font>
       </div>
       </a>
</div>
        </div>
</div>
<p class="backtop-hidden" id="back-top">
		<a href="#top"><span></span></a>
	</p>
    <div id="snackbar"></div>
</body>
</html>