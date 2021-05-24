<?php 

$apikey = '7eabb350d2c7458ab23a83c2e06f670f';

// urlencode è l'equivalente dell'encodeURIComponent
$videogioco = urlencode($_GET['q']);

$curl= curl_init();
curl_setopt($curl, CURLOPT_URL, "https://api.rawg.io/api/games?key=".$apikey."&search=".$videogioco);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result= curl_exec($curl);
echo $result;
curl_close($curl);

?>