
<?php 
    require_once 'auth.php';
    if (!$userid=controllaAuth()) {
        header("Location: login.php");
        exit;
    } 
?>

<html>

<?php 
        // Carico le informazioni dell'utente loggato per visualizzarle nella sidebar (mobile)
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        $userid = mysqli_real_escape_string($conn, $userid);
        $query = "SELECT * FROM users WHERE id = $userid";
        $res_1 = mysqli_query($conn, $query);
        if(mysqli_num_rows($res_1) > 0 ){
        $userinfo = mysqli_fetch_assoc($res_1);
        $username = mysqli_real_escape_string($conn, $userinfo['username']);
        }
    ?>


<head>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Averia+Serif+Libre:wght@700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Prata&display=swap" rel="stylesheet">


    <link rel='stylesheet' href='articoli.css'>

    <script src="abbonamenti.js" defer ></script>
    <script src="gestione_carrello.js" defer ></script>
    <script src="mobile.js" defer ></script>


    <meta name="viewport"content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="favicon.png">

<title> GameCorner - Abbonamenti</title>

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
        <div class="carrello">
        <a id="carrello"></a>
         </div>
        

        <div id="benvenuto_e_logout">
           <h2>Benvenuto</h2> <span id="username"><?php echo $username; ?></span>
           <div id="logout">
               <span></span>
               <a href="logout.php">Logout</a>
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

<div id="ricerca"> <span id="lente"></span> <input type='text' id="barradiricerca"  placeholder="Digita qualcosa..."> </div>

<section id="corpo"> 


    <p id="popolari">Abbonamenti</p>

        <div id="blocchi"></article>


</section>

<div class= "hidden pannello_carrello">

    <div class="pannello_carrello2">
    </div>
    
    <div class="totale_carrello">Totale: €<span>0,00</span></div>

</div>

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