<?php 

require_once 'auth.php';
    if (!$userid=controllaAuth()) {
        header("Location: login.php");
        exit;
    } 

$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
$userid = mysqli_real_escape_string($conn, $userid);
$query = "SELECT * FROM users WHERE id = $userid";
$res_1 = mysqli_query($conn, $query);
if(mysqli_num_rows($res_1) > 0 ){
$userinfo = mysqli_fetch_assoc($res_1);
$username = mysqli_real_escape_string($conn, $userinfo['username']);
}

$query2 = "SELECT * FROM carrello WHERE username = '$username'";

$res = mysqli_query($conn, $query2);
$articoli_carrello = array();

while ($row = mysqli_fetch_assoc($res)) { 
    $articoli_carrello[] = array('articolo'=> $row['articolo'], 'quantita'=> $row['quantita'],  'prezzo'=> $row['prezzo'], 'immagine'=> $row['immagine']);
}

echo json_encode($articoli_carrello);
mysqli_close($conn);


?>