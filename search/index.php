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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="../javascript/javascript.js"></script>
</head>

<body bgcolor="#CCC">
<div style="min-height:100px;">
<header class="nav-down">
<ul class="menu" id="menusite">
  <li ><a href="http://localhost/luxvilla-web/"><img src="../favicon.ico"></a></li>
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
<div style="background:#CCC; width:100%; min-height:100px; margin-top:10px; padding-bottom:10px; overflow: hidden;" id="casas">
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

echo '<p style="margin-left:5%;"><b>Resultados da pesquisa de: '.$query.'</b></p>';
    
while($stmt->fetch()) 
{
	$locallower=strtolower($local);
	$precolower=strtolower($preco);
	$infocasalower=strtolower($infocasa);
	$querylower=strtolower($query);
	
	 if(strpos($locallower,$querylower)!==false || strpos($precolower,$querylower)!==false || strpos($infocasalower,$querylower) !==false){
		 echo '<div class="caixacasassearchresults">
          <div id="imagem" style="display:inline-block;"><a href="casa.php?id='. $id.'">
          <img width="250px" height="200px" src="'.$imgurl.'" class="imagenscaixassearchresult"></a>
          <p style="margin-top: 10px !important; float:right;">'. $local.'<br><br>'.$preco.'</p>'.
          '</div></div>';
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
	for($i=1;$i<=$paginas;$i++){
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
		<a href="#top"><span></span></a>
	</p>
</body>
</html>