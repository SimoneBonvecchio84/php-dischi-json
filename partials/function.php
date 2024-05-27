<?php
// prelevo il contenuto del file .json e lo salvo nella variabile
// $list_disc_string
// file_get_contents() (funzione PHP) legge un intero file e ne restituisce 
// il contenuto sotto forma di stringa
// Trasformo la stringa in un array
// json_decode mi trasforma la stringa in un array associativo grazie anche AL VALORE BOOLEANO TRUE

/*
    Creo funzione che converte file.json in stringa 
    e restituisce tramite json_decode un array associativo
*/ 
function get_data() {
    $file_to_string = file_get_contents("dischi.json"); // string
    return json_decode($file_to_string, true);
}

// function add_like($index, $dischi) {
//     $dischi[$index]["like"] = !$dischi[$index]["like"];
//     file_get_contents("dischi.json", json_encode($dischi));
//     return $dischi;
// }