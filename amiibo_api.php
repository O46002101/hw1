<?php 

// urlencode è l'equivalente dell'encodeURIComponent
$personaggio = urlencode($_GET['q']);

$curl= curl_init();
curl_setopt($curl, CURLOPT_URL, "https://www.amiiboapi.com/api/amiibo/?character=".$personaggio);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result= curl_exec($curl);
echo $result;
curl_close($curl);

?>