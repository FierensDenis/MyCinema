<?php
    require("../CONNEXION/CONNECT.php");
    require("../CRUD/CRUD.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace MEMBRE</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <H1 id='my'>MY</H1>
        <h1>MEMBRE</h1>
    </header>

    <nav>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../PAGES/MEMBRES.php">Membres</a></li>
            <li><a href="../PAGES/RECHERCHERFILM.php">FILM</a></li>
            <li><a href="../PAGES/AJOUTERSEANCE.php">SEANCE</a></li>
        </ul>
    </nav> 

    <div class="formFilm">
        <form method="POST">
            <input type="search" name="nom" placeholder ="nom">
    
            <input type="search" name="prenom" placeholder ="prenom">
    
            <input type="submit" name="envoyer">
        </form>
    </div>

    <section id="Membre">
        <?php
        rechercherMembre();
        ?>
    </section>

</body>
</html>