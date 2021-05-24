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

$query2 = "SELECT quantita, prezzo FROM carrello WHERE username='$username'";

$res = mysqli_query($conn, $query2);

$array_totale = array();
$totale = 0;

while ($row = mysqli_fetch_assoc($res)) { 

    $totale = $totale + ($row['prezzo'] * $row['quantita']);
    
}

$array_totale[] = array( 'totale' => $totale);

echo json_encode($array_totale);
mysqli_close($conn);


?>