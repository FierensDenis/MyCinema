<?php
    require("../CONNEXION/CONNECT.php");
    require("../CRUD/CRUD.php");

    if($_POST){
        if(isset($_POST['id_movie']) && !empty($_POST['id_movie'])
        && isset($_POST['id_room']) && !empty($_POST['id_room'])
        && isset($_POST['date_begin']) && !empty($_POST['date_begin'])){

            $id_movie = strip_tags($_POST['id_movie']);
            $id_room =strip_tags($_POST['id_room']);
            $date_begin =strip_tags($_POST['date_begin']);

            $sql = "INSERT INTO movie_schedule (id_movie, id_room, date_begin) VALUES ($id_movie , $id_room, '$date_begin');";

            $coDB->exec($sql);

            header('Location: ../index.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEANCE</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1 id='my'>MY</h1>
        <h1>SEANCE</h1>
    </header>

    <nav>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../PAGES/MEMBRES.php">Membres</a></li>
            <li><a href="../PAGES/RECHERCHERFILM.php">FILM</a></li>
            <li><a href="../PAGES/AJOUTERSEANCE.php">SEANCE</a></li>
        </ul>
    </nav> 

    <section id="SeanceFilm">
        <div id="FormAjouterSeance">
        <form method="post">   
            <label for="id_movie">id_movie</label>
            <input type="text" class="inputSeance" id="id_movie" name="id_movie" class="form-control" placeholder="1">
            
            <label for="id_room">id_room</label>
            <input type="text" class="inputSeance" id="id_room" name="id_room" class="form-control" placeholder="1-6">

            <label for="date_begin">date_begin</label>
            <input type="text" class="inputSeance" id="date_begin" name="date_begin" class="form-control" placeholder="YYYY-MM-DD hh-mm-ss">
        
            <input type="hidden" name="id">
            <button class="btn btn-primary">Envoyer</button>
        </form>
        </div>

    <div id="formFilm">
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
        rechercherFilmSeance();
        ?>
    </section>

    </section>
</body>
</html>