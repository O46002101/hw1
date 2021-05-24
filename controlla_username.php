<?php 

// Controlla che l'username sia unico e ritorna un JSON con 
// un solo campo, exists, con valore boolean

// Includendo il file possiamo usare $dbconfig
require_once 'dbconfig.php';

if (!isset($_GET["q"])) {
    echo "Non dovresti essere qui";
    exit;
}

header('Content-Type: application/json');

$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

$username = mysqli_real_escape_string($conn, $_GET["q"]);

$query = "SELECT username FROM users WHERE username = '".$username."'";

$res = mysqli_query($conn, $query) or die(mysqli_error($conn));

$json = json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false));

echo $json;

mysqli_close($conn);

?>