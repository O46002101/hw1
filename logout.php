<?php 

// Distruggiamoi la sessione e ritorniamo alla login

include 'dbconfig.php';

// Distruggo la sessione esistente
session_start();
session_destroy();


header('Location: login.php');

?>