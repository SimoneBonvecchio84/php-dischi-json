<?php 

// prelevo il contenuto del file .json e lo salvo nella variabile
// $list_disc_string
// file_get_contents() (funzione PHP) legge un intero file e ne restituisce 
// il contenuto sotto forma di stringa
$list_disc_string = file_get_contents("dischi.json"); // stringa

// Trasformo la stringa in un array
// json_decode mi trasforma la stringa in un array associativo grazie anche AL VALORE BOOLEANO TRUE
$list_disc = json_decode($list_disc_string, true); // array

// var_dump($list_disc);
// Creo array che conterrà un altro array results dove verranno iseriti
// gli oggetti disco con le varie chiavi
// Gestione della risposta
// Non ti mando solo l array così com'è ma ti mando una struttura dove posso aggiungere anche più chiavi
// a mio piacimento in base alle necessità

$dischi = [
    "results" => $list_disc,
    "success" => true
];

// ritrasformiamo l'array strutturato da noi in stringa json per inviarlo a front and
$json_list_disc = json_encode($dischi); // stringa 
// Avvisa il server dell arrivo di dati di tipo json e serve ad impostare la comunicazione http 
header("Content_type: application/json");
echo $json_list_disc;
