<?php 

require_once 'auth.php';
    if (!$userid=controllaAuth()) {
        header("Location: login.php");
        exit;
    } 


$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

$articolo = mysqli_real_escape_string($conn, $_GET['articolo']);

$userid = mysqli_real_escape_string($conn, $userid);
$query = "SELECT * FROM users WHERE id = $userid";
$res_1 = mysqli_query($conn, $query);
if(mysqli_num_rows($res_1) > 0 ){
$userinfo = mysqli_fetch_assoc($res_1);
$username = mysqli_real_escape_string($conn, $userinfo['username']);
}

$query2 = "UPDATE carrello SET quantita = quantita - 1  WHERE username='$username' AND articolo='$articolo'";

mysqli_query($conn, $query2);

mysqli_close($conn);



?>