<?php

session_start();

if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('../CONNEXION/CONNECT.php');

    $id = strip_tags($_GET['id']);

    $sql = "DELETE FROM membership WHERE id_user = $id;";

    $coDB->exec($sql);

    header('Location: ../PAGES/MEMBRES.php');
}