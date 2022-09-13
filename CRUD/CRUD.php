<?php
//Afficher les film
function rechercherFilm(){
    global $coDB;

    $requete = $coDB->query('
    SELECT title FROM movie 
    LEFT JOIN distributor ON movie.id_distributor = distributor.id 
    LEFT JOIN movie_genre ON movie_genre.id_movie = movie.id 
    LEFT JOIN genre ON genre.id = movie_genre.id_genre
    WHERE title LIKE "%'.$_POST['film'].'%" AND distributor.id '.$_POST['distributor'].' AND movie_genre.id_genre '.$_POST['genre']);
//ROWCOUNT compte le nombre de ligne que contient la requete apres execution.
    if($requete->rowCount() > 0){
        //Affiche les films un par un 
        while($film = $requete->fetch()){
            ?>
            <p><?= $film['title']; ?></p>
            <?php
        }
    }
    else{
        ?>
        <p>Aucun film trouvé</p>
        <?php
    }
}
///////////////////////////////////////////////////////////////////////////
function rechercherFilmDate(){
    global $coDB;

    $requete = $coDB->query('SELECT movie.title, movie.director, movie_schedule.date_begin, movie_schedule.id_room FROM movie_schedule INNER JOIN movie ON movie.id = movie_schedule.id_movie WHERE movie_schedule.date_begin LIKE "'.$_POST['date'].'%" AND movie.title LIKE "%'.$_POST['film'].'%" ORDER BY movie_schedule.date_begin;');
    
    if($requete->rowCount() > 0){?>
        <table>
            <thead>
                <th>Titre</th>
                <th>Director</th>
                <th>Date begin</th>
                <th>Room</th>
            </thead>
            <tbody>
        <?php

        foreach($requete as $membre){
        ?>
            <tr class="FilmDate">
                <td><?= $membre['title']; ?></td>
                <td><?= $membre['director']; ?></td>
                <td><?= $membre['date_begin']; ?></td>
                <td><?= $membre['id_room']; ?></td>
            </tr>
        <?php
        }
        ?>
            </tbody>
        </table>
        <?php
    }
    else{
        ?>
        <p>Aucun membre trouvé</p>
        <?php
    }
}


////////////////////////////////////////////////////////////////////////////////////////////

function rechercherMembre(){
    global $coDB;

    $requete = $coDB->query('SELECT user.id, user.firstname, user.lastname, subscription.name, subscription.description, subscription.duration, membership.date_begin FROM user LEFT JOIN membership ON membership.id_user = user.id LEFT JOIN subscription ON subscription.id = membership.id_subscription WHERE user.lastname LIKE "%'.$_POST['nom'].'%" AND user.firstname LIKE "%'.$_POST['prenom'].'%" ORDER BY user.id;');

    $result = $requete->fetchAll();
    
    if($requete->rowCount() > 0){?>
        <table>
            <thead>
                <th>id</th>
                <th>prenom</th>
                <th>nom</th>
                <th>Abonnement</th>
                <th>Description de l'abonnement</th>
                <th>Duree de l'abonnement</th>
                <th>Date de debut</th>
            </thead>
            <tbody>
        <?php

        foreach($result as $membre){
            
            // var_dump($membre);
        ?>
            <tr>
                <td><?= $membre['id']; ?></td>
                <td><?= $membre['firstname']; ?></td>
                <td><?= $membre['lastname']; ?></td>
                <td><?= $membre['name']; ?></td>
                <td><?= $membre['description']; ?></td>
                <td><?= $membre['duration']; ?></td>
                <td><?= $membre['date_begin']; ?></td>
                <td><a id="ModifAbonnement" href="../CRUD/MODIFabonnement.php?id=<?= $membre['id'] ?>">Modifier</a> <a id="AjouterAbonnement" href="../CRUD/AJOUTERabonnement.php?id=<?= $membre['id'] ?>">Ajouter</a> <a id="SupprimerAbonnement" href="../CRUD/SUPPRIMERabonnement.php?id=<?= $membre['id'] ?>">SUPPRIMER</a></td>
            </tr>
        <?php
        }
        ?>
            </tbody>
        </table>
        <?php
    }
    else{
        ?>
        <p>Aucun membre trouvé</p>
        <?php
    }
}

/////////////////////////////////////////////////////////////////////////////////////////
function rechercherFilmSeance(){
    global $coDB;

    $requete = $coDB->query('
    SELECT movie.id ,title FROM movie 
    LEFT JOIN distributor ON movie.id_distributor = distributor.id 
    LEFT JOIN movie_genre ON movie_genre.id_movie = movie.id 
    LEFT JOIN genre ON genre.id = movie_genre.id_genre
    WHERE title LIKE "%'.$_POST['film'].'%" AND distributor.id '.$_POST['distributor'].' AND movie_genre.id_genre '.$_POST['genre']);
//ROWCOUNT compte le nombre de ligne que contient la requete apres execution.
    if($requete->rowCount() > 0){
        //Affiche les films un par un 
        while($film = $requete->fetch()){
            ?>
            <p><?= $film['id'] . ' / ' . $film['title']; ?></p>
            <?php
        }
    }
    else{
        ?>
        <p>Aucun film trouvé</p>
        <?php
    }
}


//historique de film chek variable static
