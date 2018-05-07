<?php
$servername = "sql.itcn.dk:3306";
$username = "sofi229f.EADANIA";
$password = "k4yV7u68FG"; //se din adgangskode på selfservice.itcn.dk
$database = "sofi229f3.EADANIA"; //skal passe til det website# du har valgt på serveren
// Create connection
$conn = new mysqli($servername, $username, $password, $database); //Her opretter vi en databaseforbindelse ved navn $conn
//mange eksempler udelader angvilse af database, hvis der kun er en
// Check connection
if ($conn->connect_error) {  //Vi tjekker om forbindelsen mislykkedes
    die("Forbindelse mislykkedes: " . $conn->connect_error);
} 
//echo "Forbundet til databasen<br>"; //udkommenteres når vi lige har set at der er hul igennem
?>