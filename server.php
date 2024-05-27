<?php 
require_once __DIR__ . "/partials/function.php";


$list_disc = get_data(); // array associative
// var_dump($list_disc);
// Creo array che conterrà un altro array results dove verranno iseriti
// gli oggetti disco con le varie chiavi
// Gestione della risposta
// Non ti mando solo l array così com'è ma ti mando una struttura dove posso aggiungere anche più chiavi
// a mio piacimento in base alle necessità
// action è una nuova query che inseriamo nel nostro array di oggetti con valore like
// 
// if(isset($_POST["action"]) && $_POST["action"] === "like") {
//    $disc_index  = $_POST["index"];    
//    $list_disc[$disc_index]["like"] = !$list_disc[$disc_index]["like"];
//    file_put_contents("dischi.json", json_encode($list_disc));
// //    var_dump($list_disc[$disc_index]);
//    die();
// }

// BONUS 1
// aggiunto dinamicamente la chiave disc_like
// for($i = 0; $i < count($list_disc); $i++ ) {
//     $list_disc[$i]['disc_like'] = false;
// }
// foreach($list_disc as $cur_disc) {
//     $cur_disc['disc_like'] = false;
// }
if(isset($_POST["index"])){
    $list_disc[$_POST["index"]]["disc_like"] = !$list_disc[$_POST["index"]]["disc_like"];
}

file_put_contents("dischi.json", json_encode($list_disc));

$lista_preferiti = $list_disc;
//-------------------------------------------------------------------------------------------
// Secondo Bonus
if(isset($_POST["action_prefer"])) {
    $lista_preferiti = array_filter($lista_preferiti, function($lista_preferiti) {
        return $lista_preferiti["disc_like"] === true;
    });
}

$dischi = [
    "results" => $lista_preferiti,   // $list_disc scrivilo al posto di $lista_preferiti 
];




// var_dump($dischi);
// ritrasformiamo l'array strutturato da noi in stringa json per inviarlo a front and
$json_list_disc = json_encode($dischi); // stringa 
// Avvisa il server dell arrivo di dati di tipo json e serve ad impostare la comunicazione http 
header("Content_type: application/json");
echo $json_list_disc;
