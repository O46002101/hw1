<?php 

require_once 'dbconfig.php';

header('Content-Type: application/json');
        

        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);


        $query = "SELECT * FROM videogiochi WHERE nuovi_arrivi = 0 AND preordine = 0";
        $risultati = array();
        
        $res = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($res)){ 
            $risultati[]=array('titolo'=> $row['titolo'], 'immagine'=> $row['immagine'], 'prezzo'=> $row['prezzo'], 'genere'=> $row['genere'], 'anno'=> $row['anno']);
           
        }

        $json = json_encode($risultati);

       echo $json;

        mysqli_close($conn);


    ?>