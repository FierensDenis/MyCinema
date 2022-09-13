<?php
    require("CONNEXION/CONNECT.php");
    require("CRUD/CRUD.php");

    $request = $coDB->query('SELECT * FROM movie LEFT JOIN movie_schedule ON movie_schedule.id_movie = movie.id ORDER BY movie_schedule.date_begin DESC LIMIT 3;');

    $resultFilmDate = $request->fetch();
    $resultFilmDate2 = $request->fetch();
    $resultFilmDate3 = $request->fetch();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCinema</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <p id="my">MY </p>
        <h1> CINEMA</h1>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="PAGES/MEMBRES.php">Membres</a></li>
            <li><a href="PAGES/RECHERCHERFILM.php">FILM</a></li>
            <li><a href="PAGES/AJOUTERSEANCE.php">SEANCE</a></li>
        </ul>
    </nav> 

    <section id="filmDuMoment">
        <div id="film1">
            <h2><?= $resultFilmDate['title']; ?></h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae, tempora sit. Aspernatur, impedit adipisci amet itaque, mollitia repudiandae nulla voluptatibus commodi corporis deserunt similique minus, laudantium aliquid omnis iusto quam.</p>
        </div>

        <div id="film2">
            <h2><?= $resultFilmDate2['title']; ?></h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae, tempora sit. Aspernatur, impedit adipisci amet itaque, mollitia repudiandae nulla voluptatibus commodi corporis deserunt similique minus, laudantium aliquid omnis iusto quam.</p>
        </div>

        <div id="film3">
            <h2><?= $resultFilmDate3['title']; ?></h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae, tempora sit. Aspernatur, impedit adipisci amet itaque, mollitia repudiandae nulla voluptatibus commodi corporis deserunt similique minus, laudantium aliquid omnis iusto quam.</p>
        </div>
    </section>

    <div class="formFilm" id="programmedujour">
        <form method="POST">
            <input type="search" name="film" placeholder ="Rechercher un film">
            
            <input type="date" name="date" value="2018-12-31" min="2017-08-01" max="2018-12-31">

            <input type="submit" name="envoyer">
        </form>
    </div>

    <section id="film">
        <?php
        rechercherFilmDate();
        ?>
    </section>

</body>
</html>