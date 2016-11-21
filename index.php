<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Lux Villa</title>
<link href="styles/styles.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
$(document).ready(function(){

	// hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 650) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
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
    // Document ready shorthand statement
    $(function() {
      // Select link by id and add click event
      $('#casalink').click(function() {

        // Animate Scroll to #bottom
        $('html,body').animate({
          scrollTop: $("#casas").offset().top }, // Tell it to scroll to the top #bottom
          800 // How long scroll will take in milliseconds
        );

        // Prevent default behavior of link
        return false;
      });
    });
  </script>
</head>

<body bgcolor="#CCC">
<ul id="menu">
  <li style="float:left"><a href="http://brunomassa.esy.es/">Lux Villa</a></li>
  <li><a href="sobre nos.html">Sobre n&oacute;s</a></li>
  <li><a href="#casas" id="casalink">Casas</a></li>
  
  <li><a href="http://brunomassa.esy.es/">In&iacute;cio</a></li>
  
  <form style="float:right; margin-right:5px;" action="http://brunomassa.esy.es/search/" method="post">
	<input type="search" placeholder="Pesquisar casas..." name="q">
</form>
 
</ul>

<link href="cssslider_files/csss_engine1/style.css" rel="stylesheet">

<script src="cssslider_files/csss_engine1/gestures.js" type="text/javascript"></script> <div class='csslider1 autoplay '>
		<input name="cs_anchor1" id='cs_slide1_0' type="radio" class='cs_anchor slide' >
		<input name="cs_anchor1" id='cs_slide1_1' type="radio" class='cs_anchor slide' >
		<input name="cs_anchor1" id='cs_slide1_2' type="radio" class='cs_anchor slide' >
		<input name="cs_anchor1" id='cs_play1' type="radio" class='cs_anchor' checked>
		<input name="cs_anchor1" id='cs_pause1_0' type="radio" class='cs_anchor pause'>
		<input name="cs_anchor1" id='cs_pause1_1' type="radio" class='cs_anchor pause'>
		<input name="cs_anchor1" id='cs_pause1_2' type="radio" class='cs_anchor pause'>
		<ul>
			<li class="cs_skeleton"><img style="width: 100%;" src="casa3.jpg"></li>
			<li class='num0 img slide'>  <a href="casa1.html" target="_self"><img src="casa1.jpg" alt='Braga' title='Braga' /> </a> </li>
			<li class='num1 img slide'>  <a href="casa8.html" target="_self"><img src="casa8.jpg" alt='Porto' title='Porto' /> </a> </li>
			<li class='num2 img slide'>  <a href="casa10.html" target="_self"><img src="casa10.jpg" alt='Porto' title='Porto' /> </a> </li>
		</ul><div class="cs_engine"></div>
		<div class='cs_description'>
			<label class='num0'><span class="cs_title"><span class="cs_wrapper">1.100.000 &euro;</span></span></label>
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
		</div><div style="background:#CCC; width:100%; min-height:100px; margin-top:10px; padding-bottom:10px; overflow: hidden;" id="casas">

<?php
define("servername","mysql.hostinger.pt");
define("username","u460723307_massa");
define("password","marianaraiodesol");
define("dbname","u460723307_app");

// Create connection

$conn =new mysqli(servername, username, password, dbname);

// Check connection

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

$sql ="SELECT id, imgURL, local,preco,infocasa,linkcasa FROM casas ORDER BY casas.id DESC";

$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $imgurl, $local, $preco, $infocasa, $linkcasa);

    
while($stmt->fetch()) 
{
	 /*echo " - Name: " . $row["local"]. " " . $row["preco"]. "<br>";*/
	
    echo '<div class="caixacasas">
          <div id="imagem" style="display:inline-block;"><a href="'. $linkcasa.'">
          <img width="250px" height="200px" src="'.$imgurl.'" class="imagenscaixas"></a>
          <p style="margin-top: 10px !important;">'. $local.'</p>'.
          '<p style="margin-top: 10px !important;">'. $preco.'</p>
          </div></div>';
}

$stmt->close();
mysqli_close($conn);
?>
</div>
<footer id="contactos">
        <p style="font-style:italic"><font color="#651D31">Contactos</font></p>
        <div style="margin: 0 auto;  font-style:italic; width: 50%; padding-top:40px;">
        <blockquote>
          <a target="new" href="https://github.com/brunomassa/Luxvilla-web"><button class="btn"><span><svg style="width:39px;height:39px;" viewBox="-3 -14 35 35">
    <path fill="#ffffff" d="M12,2A10,10 0 0,0 2,12C2,16.42 4.87,20.17 8.84,21.5C9.34,21.58 9.5,21.27 9.5,21C9.5,20.77 9.5,20.14 9.5,19.31C6.73,19.91 6.14,17.97 6.14,17.97C5.68,16.81 5.03,16.5 5.03,16.5C4.12,15.88 5.1,15.9 5.1,15.9C6.1,15.97 6.63,16.93 6.63,16.93C7.5,18.45 8.97,18 9.54,17.76C9.63,17.11 9.89,16.67 10.17,16.42C7.95,16.17 5.62,15.31 5.62,11.5C5.62,10.39 6,9.5 6.65,8.79C6.55,8.54 6.2,7.5 6.75,6.15C6.75,6.15 7.59,5.88 9.5,7.17C10.29,6.95 11.15,6.84 12,6.84C12.85,6.84 13.71,6.95 14.5,7.17C16.41,5.88 17.25,6.15 17.25,6.15C17.8,7.5 17.45,8.54 17.35,8.79C18,9.5 18.38,10.39 18.38,11.5C18.38,15.32 16.04,16.16 13.81,16.41C14.17,16.72 14.5,17.33 14.5,18.26C14.5,19.6 14.5,20.68 14.5,21C14.5,21.27 14.66,21.59 15.17,21.5C19.14,20.16 22,16.42 22,12A10,10 0 0,0 12,2Z" />
</svg><font size="5" color="#FFFFFF"> github (Code)</font></span></button></a>
&nbsp;
       <a target="new" href="https://github.com/brunomassa/LuxVilla"><button class="btn"><span><svg style="width:39px;height:39px;" viewBox="-3 -14 35 35">
    <path fill="#ffffff" d="M12,2A10,10 0 0,0 2,12C2,16.42 4.87,20.17 8.84,21.5C9.34,21.58 9.5,21.27 9.5,21C9.5,20.77 9.5,20.14 9.5,19.31C6.73,19.91 6.14,17.97 6.14,17.97C5.68,16.81 5.03,16.5 5.03,16.5C4.12,15.88 5.1,15.9 5.1,15.9C6.1,15.97 6.63,16.93 6.63,16.93C7.5,18.45 8.97,18 9.54,17.76C9.63,17.11 9.89,16.67 10.17,16.42C7.95,16.17 5.62,15.31 5.62,11.5C5.62,10.39 6,9.5 6.65,8.79C6.55,8.54 6.2,7.5 6.75,6.15C6.75,6.15 7.59,5.88 9.5,7.17C10.29,6.95 11.15,6.84 12,6.84C12.85,6.84 13.71,6.95 14.5,7.17C16.41,5.88 17.25,6.15 17.25,6.15C17.8,7.5 17.45,8.54 17.35,8.79C18,9.5 18.38,10.39 18.38,11.5C18.38,15.32 16.04,16.16 13.81,16.41C14.17,16.72 14.5,17.33 14.5,18.26C14.5,19.6 14.5,20.68 14.5,21C14.5,21.27 14.66,21.59 15.17,21.5C19.14,20.16 22,16.42 22,12A10,10 0 0,0 12,2Z" />
</svg><font size="5" color="#FFFFFF"> github (Android)</font></span></button></a>
        </div>
</footer>

<p id="back-top">
		<a href="#top"><span></span></a>
	</p></body>
</html>