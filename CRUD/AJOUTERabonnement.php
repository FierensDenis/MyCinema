<?php
require('../CONNEXION/CONNECT.php');
    if($_POST){
        if(isset($_POST['id_user']) && !empty($_POST['id_user'])
        && isset($_POST['id_subscription']) && !empty($_POST['id_subscription'])){

            $id_user = strip_tags($_POST['id_user']);
            $id_subscription =strip_tags($_POST['id_subscription']);

            $sql = "INSERT INTO membership (id_user, id_subscription) VALUES ($id_user , $id_subscription);";

            $coDB->exec($sql);

            header('Location: ../PAGES/MEMBRES.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un abonnement</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h1>Modifier un abonnement</h1>

    <form method="post">   
        <label for="id_user">id_user</label>
        <input type="text" id="id_user" name="id_user" class="form-control" value=<?= $_GET['id']?>>
        
        <select name="id_subscription" id="id_subscription">
            <option value="1">VIP</option>
            <option value="2">GOLD</option>
            <option value="3">Classic</option>
            <option value="4">Pass Day</option>
        </select>


        <!-- <label for="id_subscription">id_subscription</label>
        <input type="text" id="id_subscription" name="id_subscription" class="form-control"> -->
    
        <input type="hidden" name="id">
        <button class="btn btn-primary">Envoyer</button>
    </form>

</body>
</html>