<?php

try{
//Connexion a la database
    $coDB = new PDO('mysql:host=localhost;dbname=cinema', 'denis', 'deunsdeuns');
//Definit le fecth -> en tableau associatif
    $coDB->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // echo 'tout est bon';
}catch(Exception $e){
    echo 'Erreur (CONNECT.PHP)'. $e->getMessage();
    die();
}