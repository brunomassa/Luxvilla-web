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


$sql = "SELECT Imagens_ID, Casa_ID, IMG_1,IMG_2,IMG_3,IMG_4,IMG_5 FROM Imagens";

$result = mysqli_query($conn, $sql);

$rows = array();

    
while($row = mysqli_fetch_assoc($result)) 
{
        
$rows[] = $row;
    
} 


print(json_encode($rows)); 


mysqli_close($conn);

?>   