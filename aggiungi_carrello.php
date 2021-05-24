<?php 

require_once 'auth.php';
    if (!$userid=controllaAuth()) {
        header("Location: login.php");
        exit;
    } 

$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

$articolo = mysqli_real_escape_string($conn, $_POST['titolo']);
$prezzo = mysqli_real_escape_string($conn, $_POST['prezzo']);
$immagine = mysqli_real_escape_string($conn, $_POST['immagine']);


$userid = mysqli_real_escape_string($conn, $userid);
$query = "SELECT * FROM users WHERE id = $userid";
$res_1 = mysqli_query($conn, $query);
if(mysqli_num_rows($res_1) > 0 ){
$userinfo = mysqli_fetch_assoc($res_1);
$username = mysqli_real_escape_string($conn, $userinfo['username']);
}

$query2 = "INSERT INTO carrello(username, articolo, quantita, prezzo, immagine) VALUES('$username', '$articolo', 1, '$prezzo', '$immagine')";

mysqli_query($conn, $query2);

mysqli_close($conn);



?>