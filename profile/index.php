<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>User - profile</title>

<link rel='stylesheet prefetch' href='css/epggea.css'>
<link rel="stylesheet" href="../styles/styles.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<script src="https://www.gstatic.com/firebasejs/4.1.1/firebase.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="../javascript/javascript.min.js"></script>
<script src='js/epggea.min.js'></script>

<script>
$(document).ready(function(){
	
	userprofile();

	// hide #back-top first
	$("#float").addClass("float-hidden");
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 400) {
				$('#float').removeClass("float-hidden").addClass("shown");
			} else {
				$('#float').removeClass("shown").addClass("float-hidden");
			}
			if ($(this).scrollTop() > 0) {
		document.getElementById("menusite").style.boxShadow = "0px 3px 6px rgba(50,50,50,0.28)";
			} else {
				document.getElementById("menusite").style.boxShadow = "0px 0px 0px grey";
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});
</script>
<script>
function myFunction() {
    var x = document.getElementById("menusite");
    if (x.className === "menu") {
        x.className += " responsive";
    } else {
        x.className = "menu";
    }
}
</script>
</head>

<body bgcolor="#f2f4f5">
<ul class="menu" id="menusite" style="top:0; position:fixed;">
  <li ><a href="http://brunoferreira.esy.es"><img src="../favicon.ico"></a></li>
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
  <li><a href="http://brunoferreira.esy.es/#casas">Casas</a></li>
  
  <li><a href="http://brunoferreira.esy.es">In&iacute;cio</a></li>
  <li class="icon">
    <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()">☰</a>
  </li>
  
  <form style="float:right; margin-right:5px; margin-top:7px;" action="http://brunoferreira.esy.es/search/" method="post">
	<input type="search" placeholder="Pesquisar casas..." name="q">
</form>
</ul>
<div style="background:#FFF" id="inicio">
<div class="profileparallax" style="display: flex;">
<div id="preloader" class="center" style="margin:auto;">

<div class="preloader-wrapper big active">
    <div class="spinner-layer spinner-white-only">
      <div class="circle-clipper left">
        <div class="circle"></div>
      </div><div class="gap-patch">
        <div class="circle"></div>
      </div><div class="circle-clipper right">
        <div class="circle"></div>
      </div>
    </div>
</div>

</div>
<div id="profilename" style="margin:auto; display:none;"><img id="profileimage" src="../logo.jpg" class="circular_image"><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font color="#FFFFFF" id="username">@Username</font>
<br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://localhost/luxvilla-web/editprofile/" class="profileeditlink"><i class="material-icons">create</i>&nbsp;Editar perfil</a>
</div>
</div>
</div>

<div class="sub-header ">
  <div class="swipe-tabs">
    <div class="swipe-tab">Sobre o usuario</div>
    <div class="swipe-tab">Casas de que gosta</div>
  </div>
</div>
<div class="main-container">
  <div class="swipe-tabs-container ">
    <div class="swipe-tab-content">
<div id="preloaderinfo" class="center">
    <div class="preloader-wrapper big active">
    <div class="spinner-layer spinner-custom-only">
      <div class="circle-clipper left">
        <div class="circle"></div>
      </div><div class="gap-patch">
        <div class="circle"></div>
      </div><div class="circle-clipper right">
        <div class="circle"></div>
      </div>
    </div>
	</div>
</div>
    
    <div class="conteudo" id="conteudo" style="display:none;">
<div class="caixaconteudo" style="margin-top:10px;">
<h2 style="text-align:center">Sobre o utilizador</h2>
<p class="pcaixa" id="userbio">Informações de utilizador.&nbsp;</p>
</div>
</div>
    
    </div>
    <div class="swipe-tab-content">
       <div class="content">
       <?php
/*
10 next pages
for($i = $page + 1; $i <= min($page + 11, $total_pages); $i++)
or if you want 5 prev and 5 next
for($i = max(1, $page - 5); $i <= min($page + 5, $total_pages); $i++)*/

define("servername","localhost");
define("username","root");
define("password","");
define("dbname","db_luxvilla");

// Create connection

$conn =new mysqli(servername, username, password, dbname);

// Check connection

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

$itens_pagina=10;
$likes=0;
$likesarray=array();
$alldataquery="SELECT id FROM casas ORDER BY casas.id DESC";

$stmt=$conn->prepare($alldataquery);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($rowid);
while($stmt->fetch()){
	if($_COOKIE["heart".$rowid]!=0){
		array_push($likesarray,$rowid);
	}
}
		   
if(!empty($likesarray)){
	$strarray=implode(',',$likesarray);
	$numlikes="SELECT COUNT('id') FROM casas WHERE id IN({$strarray})";

	$stmt=$conn->prepare($numlikes);
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($totallikes);
	$stmt->fetch();
	
	$paginas=ceil($totallikes/$itens_pagina);
	
	$page=(isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	$inicio=($page-1)*$itens_pagina;
	
	$sql ="SELECT id, imgURL, local,preco,infocasa,linkcasa FROM casas WHERE id IN({$strarray}) ORDER BY casas.id DESC LIMIT $inicio, $itens_pagina";

	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($id, $imgurl, $local, $preco, $infocasa, $linkcasa);
	while($stmt->fetch()){
		echo ('<div class="casacard">
       <div style="width:100%; height:60%;">
       <a href="http://localhost/luxvilla-web/casa.php?id='.$id.'">
       <img src="'.$imgurl.'" width="100%" height="100%">
       </a>
       </div>
       <div class="divtexto">
       <div style="flex:2 0 0;">
       <p>'.$local.'</p>
       <p>'.$preco.'</p>
       </div>
       <div>');
	   echo ('<div id="heart'.$id.'" class="heart liked">
	   </div>');
       echo ('</div>
       </div>
       </div>');
	}
	
	if($paginas>=1){
		echo ('<div class="center" style="width:100%;">');
		echo ('<div class="pagination">');
		if($page==1){
			echo ('<a id="arrowleft" href="#"><i id="ileft" class="arrowleft"></i></a>');
		}else{
			echo ('<a id="arrowleft" href="?page='.($page-1).'"><i id="ileft" class="arrowleft"></i></a>');
		}
		for($i = max(1, $page - 5); $i <= min($page + 5, $paginas);$i++){
			if($i==$page){
				echo ('<a href="#" class="active">'.$i.'</a>');
			}else{
				echo ('<a href="?page='.$i.'">'.$i.'</a>');
			}
		}
		if($page==$paginas){
			echo ('<a id="arrowright" href="#"><i id="iright"  class="arrowright"></i></a>');
		}else{
			echo ('<a id="arrowright" href="?page='.($page+1).'"><i  id="iright" class="arrowright"></i></a>');
		}
		echo ('</div>');
		echo ('</div>');
	}
	
		
}else{
	echo('<div class="caixaconteudo" style="margin-top:10px;">
<h2 style="text-align:center">Sem favoritos</h2>
<p class="pcaixa" id="userbio">Não tem casas de que goste.&nbsp;</p>
</div>');
}

$stmt->close();
mysqli_close($conn);
?>
       </div>
  </div>
    
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
       </a></div>
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
