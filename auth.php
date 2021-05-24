<?php 

// Controlliamo che l'utente sia già autenticato, per non dover chiedere il login ogni volta


require_once 'dbconfig.php';
session_start();

function controllaAuth(){
    // Innanzitutto verifichiamo che sia presente la variabile di sessione
    // Nel nostro caso sarebbe gamecorner_user_id, nella pagina login.php

    if(isset($_SESSION['gamecorner_user_id'])){
        // Se esiste già una sessione, la ritorno, altrimenti ritorno 0
            return $_SESSION['gamecorner_user_id'];
            
    } else 
        return 0;
    
}

?>