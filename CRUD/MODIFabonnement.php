<?php
// On démarre une session
session_start();

if($_POST){
    if(isset($_POST['id']) && !empty($_POST['id'])){
        // On inclut la connexion à la base
        require_once('../CONNEXION/CONNECT.php');

        // On nettoie les données envoyées
        $id = strip_tags($_POST['id']);
        $id_user = strip_tags($_POST['id_user']);
        $id_subscription = strip_tags($_POST['id_subscription']);
        $date_begin = strip_tags($_POST['date_begin']);

        $sql = 'UPDATE `membership` SET `id_subscription`=:id_subscription WHERE `id_user`=:id;';

        $query = $coDB->prepare($sql);

        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':id_subscription', $id_subscription, PDO::PARAM_INT);
        // $query->bindValue(':date_begin', $date_begin, PDO::PARAM_STR);


        $query->execute();

        $_SESSION['message'] = "Produit modifié";
        // require_once('close.php');

        header('Location: ../PAGES/MEMBRES.php');
    }else{
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}

// Est-ce que l'id existe et n'est pas vide dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('../CONNEXION/CONNECT.php');

    // On nettoie l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `membership` WHERE `id` = :id;';

    // On prépare la requête
    $query = $coDB->prepare($sql);

    // On "accroche" les paramètre (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();

    // On récupère le produit
    $id_user = $query->fetch();

    // On vérifie si le produit existe
    if(!$id_user){
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('Location: ../PAGES/MEMBRES.php');
    }
}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: PAGES/MEMBRES.php');
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
    <main>
        <div>
            <section>

                <h1>Modifier un abonnement</h1>

                <form method="post">
                    <div>

                        <select name="id_subscription" id="id_subscription">
                            <option value="1">VIP</option>
                            <option value="2">GOLD</option>
                            <option value="3">Classic</option>
                            <option value="4">Pass Day</option>
                        </select>

                    </div>


                    <input type="hidden" value="<?= $id_user['id']?>" name="id">
                    <button>Envoyer</button>
                </form>
            </section>
        </div>
    </main>
</body>
</html>