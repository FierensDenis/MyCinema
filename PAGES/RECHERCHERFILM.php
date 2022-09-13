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
    <title>MyCinema</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <p id="my">MY </p>
        <h1> FILM</h1>
    </header>

    <nav>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../PAGES/MEMBRES.php">Membres</a></li>
            <li><a href="../PAGES/RECHERCHERFILM.php">FILM</a></li>
            <li><a href="../PAGES/AJOUTERSEANCE.php">SEANCE</a></li>
        </ul>
    </nav> 

    <div class="formFilm" id="">
        <form method="POST">
            <input class="FormFilmElement" type="search" name="film" placeholder ="Rechercher un film">
            
            <select name="distributor" id="menu" class="FormFilmElement" placeholder ="distributor">
                <option value="IS NOT NULL">Distributeur</option>
                <?php
                $finddistributor = $coDB->query('SELECT * FROM distributor ORDER BY id');

                
                if($finddistributor->rowCount() > 0){
                    $i = 0;
                    while($distrib = $finddistributor->fetch()){
                    ?>
                        <option value=" = <?= $distrib['id']?>"><?= $distrib['name'] ?></option>";
                        <?php
                    }
                }
                else{
                    ?>
                    <option value="0">0</option>
                    <?php
                }
                ?>
            </select>

            <select name="genre" id="menu" class="FormFilmElement" placeholder ="genre">
                <option value="IS NOT NULL">Genre</option>
                <?php
                $findgenre = $coDB->query('SELECT * FROM genre ORDER BY id');

                
                if($findgenre->rowCount() > 0){
                    $i = 0;
                    while($genre = $findgenre->fetch()){
                    ?>
                        <option value=" = <?= $genre['id']?>"><?= $genre['name'] ?></option>";
                        <?php
                    }
                }
                else{
                    ?>
                    <option value="0">0</option>
                    <?php
                }
                ?>
            </select>

            <input class="FormFilmElement" type="submit" name="envoyer">

        </form>
    </div>

    <section id="film">
        <?php
        rechercherFilm();
        ?>
    </section>

</body>
</html>