<?php 

// Controlla che la mail sia unica e ritorna un JSON con 
// un solo campo, exists, con valore boolean

// Includendo il file possiamo usare $dbconfig
require_once 'dbconfig.php';

// Controllo che l'accesso sia legittimo 
if(!isset($_GET["q"])){
    echo "Non dovresti essere qui";
    exit;
}

header('Content-Type: application/json');

$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

$email = mysqli_real_escape_string($conn, $_GET["q"]);

$query = "SELECT email FROM users WHERE email = '".$email."'";

$res = mysqli_query($conn, $query) or die(mysqli_error($conn));

$json = json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false));

echo $json;

mysqli_close($conn);

?>