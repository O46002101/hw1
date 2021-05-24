<?php

// Verifica che l'utente sia già loggato, in caso positivo va direttamente alla home
include 'auth.php';
if (controllaAuth()) {
    header('Location: homepage.php');
    exit;
}   
 

// Vogliamo gestire una sessione che sia già attiva
// Per farlo useremo una pagina auth.php
// Se l'utente ha già effettuato l'eccesso deve essere reindirizzato alla homepage

 
if(!empty($_POST["username"]) && !empty($_POST["password"])){
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    // ID e Username per sessione, password per controllo
    $query = "SELECT id, username, password FROM users WHERE username = '".$username."' AND password = '".$password."'";
    // Esecuzione
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
    // A questo punto l'utente è stato trovato, se vale la condizione 
    if(mysqli_num_rows($res) > 0){ 
        // fetch_assoc ci ritorna una sola riga ma a noi basta
        $entry = mysqli_fetch_assoc($res);
        
            // Impostiamo una variabile di sessione dell'utente
            $_SESSION["gamecorner_username"] = $entry['username'];
            $_SESSION["gamecorner_user_id"] = $entry['id'];
            // Reindirizziamo l'utente alla homepage
            header('Location: homepage.php');
            mysqli_close($conn);
            exit;
        
    }
    // Se l'if non vale allora non sono trovati username o password
    $error = "Username o password errati";
} else if (isset($_POST["username"]) || isset($_POST["password"])) {
    // Se solo uno dei due è impostato
    $error = "Inserisci username e password.";
}

?>

<html>
<head>
<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Averia+Serif+Libre:wght@700&display=swap" rel="stylesheet">
   
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Prata&display=swap" rel="stylesheet">


    <link rel='stylesheet' href='login.css'>
    <script src="mobile.js" defer ></script>

    <meta name="viewport"content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="favicon.png">

    <title> GameCorner - Accedi </title>
</head>

<body>

<nav>


<div id="menu">
           <div></div>
           <div></div>
           <div></div>
       </div>


        <div class="collegamenti">
        <a href="homepage.php">Homepage</a>
        <a href="videogiochi_nuovi_arrivi.php">Nuovi Arrivi</a>
        <a href="abbonamenti.php">Abbonamenti</a>
        <a href="merchandise.php">Merchandise</a>
        <a>Area Privata</a>
        </div>

        <div id="benvenuto_e_logout">
           <h2>Benvenuto</h2> <span id="username"> Visitatore </span>
           <div id="logout">
               <div>Accedi o registrati per visualizzare il sito.</div>
            </div>
        </div>

    </nav>

    <div class= "hidden menu_tendina">
    <div class= "voce_menu_tendina"> <a href="homepage.php"> Homepage </a> </div>
    <div class= "voce_menu_tendina"> <a href="videogiochi_nuovi_arrivi.php"> Nuovi Arrivi </a> </div>
    <div class= "voce_menu_tendina"> <a href="abbonamenti.php"> Abbonamenti </a> </div>
    <div class= "voce_menu_tendina"> <a href="merchandise.php"> Merchandise </a> </div>
    <div class= "voce_menu_tendina"> <a> Area Privata </a> </div>
    </div>


<section id="corpo"> 

<div class="testo_e_form">

<p>Pagina di login</p>

<?php
                // Verifica la presenza di errori
                if (isset($error)) {
                    echo "<span class='error'>$error</span>";
                }
                
            ?>

<form  name='form_login' method='post'> 
<!--Dobbiamo evitare di perdere i valori già inseriti ricaricando la pagina, dopo aver premuto 'Accedi'-->
<div class="username">
<div><label for='username'>Nome utente</label></div>
<div><input type='text' name='username'
<?php 
// Facciamo così per risolvere il problema dei dati
// Impostiamo il valore del nostro campo di input dinamicamente, tramite PHP
// Il form effettua la richiesta (POST) alla stessa pagina
// Ad ogni input, quindi, effettuiamo il controllo
if(isset($_POST['username'])){
    echo "value=".$_POST['username'];
}
// In questo modo lui ogni volta invierà a sè stesso il valore che c'è nel campo username
// Applicheremo il metodo per ogni campo da compilare
?>></div>
</div>

<div class="password">
<div><label for='password'>Password</label></div>
<div><input type='password' name='password'></div>
</div>

<div class="submit"><input type='submit' name='submit' value='Accedi'></div>

</form>

<div class="signup">Non hai un account? <a href="signup.php">Iscriviti</a></div>
</div>

<div class="contenitore_foto_login"> 
<div class="foto_login"></div>
</div>


</section>

<footer>
        <div><h2>GameCorner</h2>
            <a>Programma fedeltà</a>
            <a>Regolamento</a>
            <a>Informativa e privacy</a>
        </div>

        <div><h2>Servizi</h2>
            <a>Tutti i servizi</a>
            <a>Garanzia acquisti</a>
            <a>Ritiro in negozio</a>
            <a>Newsletter</a>
        </div>

         <div><h2>Business</h2>
            <a>Lavora con noi</a>
            <a>Apri un Corner</a>
         </div>

        <div><h2>Social</h2>
            <a>Facebook</a>
            <a>Instagram</a>
            <a>Twitter</a>
            <a>Twitch</a>
        </div>

        <div><h2>Contatti</h2>
            <a>Cerca un Corner</a>
            <a>Assistenza chat</a>
            <a>Reclami</a>
        </div>

         <div id="nomecognome"><h2>Antonio</h2><h2>Longo</h2><h2>O46002101</h2></div>

    </footer>

</body>
</html>