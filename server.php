<?php 

// prelevo il contenuto del file .json e lo salvo nella variabile
// $list_disc_string
$list_disc_string = file_get_contents("dischi.json");

// Trasformo la stringa in un array
// json_decode mi trasforma la stringa in un array associativo grazie anche AL VALORE BOOLEANO TRUE
$list_disc = json_decode($list_disc_string, true);

// var_dump($list_disc);
// Creo array che conterrà un altro array results dove verranno iseriti
// gli oggetti disco con le varie chiavi
$dischi = [
    "results" => $list_disc
];

$json_list_disc = json_encode($dischi);
header("Content_type: application/json");
echo $json_list_disc;
