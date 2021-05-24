<?php 

require_once 'auth.php';
if (controllaAuth()) {
    header("Location: homepage.php");
    exit;
}   

// Stiamo usando dei form e quindi inviamo dati post, controlliamoli in $_POST
// Controlliamo che tutti i campi siano riempiti
if(!empty($_POST['username']) && !empty($_POST['nome']) && 
!empty($_POST['cognome']) && !empty($_POST['email']) &&
!empty($_POST['password']) && !empty($_POST['conferma_password']) &&
!empty($_POST['allow'])){
    $error = array();
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

    // username 
    // Controlla che l'username rispetti il pattern specificato
    if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
        $error[] = "Username non valido";
    } else {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        // Cerco se l'username esiste già o se appartiene a una delle 3 parole chiave indicate
        $query = "SELECT username FROM users WHERE username = '$username'";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $error[] = "Username già utilizzato";
        }
    }

    // password
    if(strlen($_POST['password']) < 8 || !preg_match("#[0-9]+#", $_POST['password']) || !preg_match("#[a-z]+#", $_POST['passowrd']) || 
    !preg_match("#[A-Z]+#", $_POST['password']) || !preg_match("/[\'^£$%&*()}{@#~?><>,|=_+!-]/", $_POST['password'])){ 
        $error[]="La password deve essere di 8 caratteri e contenere almeno una lettera maiuscola, una minuscola, un numero ed un carattere speciale.";
    }

    // conferma password 

    if(strcmp($_POST['password'], $_POST['conferma_password']) != 0){
        $error[]= "Le password non coincidono";
    }

    // email 
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error[] = "Email non valida";
    } else {
        $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
        $res = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
        if (mysqli_num_rows($res) > 0) {
            $error[] = "Email già utilizzata";
        }
    }


    // registrazione database 
    if(count($error)==0){
        $nome = mysqli_real_escape_string($conn, $_POST['nome']);
        $cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        
        
        $query = "INSERT INTO users(username, nome, cognome, email, password) VALUES('$username', '$nome', '$cognome', '$email', '$password')";

        if(mysqli_query($conn, $query)){
            // Rimandiamo l'utente alla home se è tutto okay
            $_SESSION['gamecorner_username'] = $_POST['username'];
            $_SESSION['gamecorner_user_id'] = mysqli_insert_id($conn);
            // La funzione mysqli_insert_id va a prendere l'id dell'ultima query

            mysqli_close($conn);
            header("Location: homepage.php");
            exit;
        } else { 
            $error[] = "Errore di connessione al Database";
        }

    }



    mysqli_close($conn);

} else if (isset($_POST["username"])) {
    $error[] = array("Riempi tutti i campi");
}


?>

<html>

<head>

<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Averia+Serif+Libre:wght@700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Prata&display=swap" rel="stylesheet">


    <link rel='stylesheet' href='signup.css'>
    <script src="signup.js" defer></script>
    <script src="mobile.js" defer ></script>

    <meta name="viewport"content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="favicon.png">

    <title> GameCorner - Registrati </title>
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

<p>Pagina di registrazione</p>

<form  name='form_signup' method='post'> 
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
<span>Username già in utilizzo.</span>
</div>

<div class="nome">
<div><label for='nome'>Nome</label></div>
<div><input type='text' name='nome'
<?php 
if(isset($_POST['nome'])){
    echo "value=".$_POST['nome'];
}
?>></div>
<span>Nome non valido</span>
</div>

<div class="cognome">
<div><label for='cognome'>Cognome</label></div>
<div><input type='text' name='cognome'
<?php 
if(isset($_POST['cognome'])){
    echo "value=".$_POST['cognome'];
}
?>></div>
<span>Cognome non valido</span>
</div>

<div class="email">
<div><label for='email'>Email</label></div>
<div><input type='text' name='email'
<?php 
if(isset($_POST['email'])){
    echo "value=".$_POST['email'];
}
?>></div>
<span>E-mail non valida</span>
</div>

<div class="password">
<div><label for='password'>Password</label></div>
<div><input type='password' name='password'></div>
<span>Inserisci una password di almeno 8 caratteri</span>
</div>



<div class="conferma_password">
<div><label for='conferma_password'>Conferma Password</label></div>
<div><input type='password' name='conferma_password'></div>
<span>Le password non coincidono</span>
</div>

<div class="submit"><input type='submit' name='submit' value='Registrati' id="submit" disabled></div>

<div class="allow"> 
<div><input type='checkbox' name='allow' value="1"></div>
<div><label for='allow'>Acconsento al trattamento dei dati personali</label></div>
</div>

</form>


<div class="signup">Hai già un account? <a href="login.php">Accedi</a></div>
</div>

<div class="contenitore_foto_signup"> 
<div class="foto_signup"></div>
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