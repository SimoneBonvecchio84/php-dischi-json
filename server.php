<?php 
require_once __DIR__ . "/partials/function.php";


$list_disc = get_data(); // array

// var_dump($list_disc);
// Creo array che conterrà un altro array results dove verranno iseriti
// gli oggetti disco con le varie chiavi
// Gestione della risposta
// Non ti mando solo l array così com'è ma ti mando una struttura dove posso aggiungere anche più chiavi
// a mio piacimento in base alle necessità
if(isset($_POST["action"]) && $_POST["action"] === "like") {
   $disc_index  = $_POST["index"];    
   $list_disc[$disc_index]["like"] = !$list_disc[$disc_index]["like"];
   file_put_contents("dischi.jason", json_encode($list_disc));
}


$dischi = [
    "results" => $list_disc,
    // "like" => true
];



// ritrasformiamo l'array strutturato da noi in stringa json per inviarlo a front and
$json_list_disc = json_encode($dischi); // stringa 
// Avvisa il server dell arrivo di dati di tipo json e serve ad impostare la comunicazione http 
header("Content_type: application/json");
echo $json_list_disc;
