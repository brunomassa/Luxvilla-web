<?php

$servername = "mysql.hostinger.pt";

$username = "u460723307_massa";

$password = "marianaraiodesol";

$dbname = "u460723307_app";


// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection

if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());

}


$sql = "SELECT id, imgURL, local,preco,infocasa FROM casas";

$result = mysqli_query($conn, $sql);

$rows = array();

    
while($row = mysqli_fetch_assoc($result)) 
{
        
$rows[] = $row;
    
} 
$fp = fopen('resultado.json', 'w'); 
fwrite($fp, json_encode($rows)); 
fclose($fp);
 


print(json_encode($rows)); 


mysqli_close($conn);

?>   