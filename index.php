<?php

$dsn = "mysql:host=localhost;dbname=movieshuffle";
$db = new PDO($dsn, 'root', "");


$query = $db->query("SELECT movies.title, movies.id, GROUP_CONCAT(genre.name SEPARATOR ',') AS genre FROM movies 
INNER JOIN movies_genre 
ON movies.id = movies_genre.movies_id 
INNER JOIN genre 
ON movies_genre.genre_id = genre.id
GROUP BY movies.id, movies.title "
);
$movies = $query->fetchAll(PDO::FETCH_ASSOC);



// Le tableau associatif $data est utilisé dans le template header pour avoir une balise title différente en fonction de la page où l'on se trouve mais une en-tête unique
$data = array("headerTitle" => "MovieShuffle");
include("templates/header.php");
?>
<main>
    <div class="container">
        <div class="movies flex-container">
            <?php
            foreach ($movies as $movie) {
        
                
                $poster = str_replace(" ", "-", strtolower($movie["title"]));
            ?>
                <div class="movie">
                    <img src="img/poster/<?= $poster ?>.jpg" alt="">
                    <div class="movie-details">
                        <h3>
                            <a href="movie.php?id=<?= $movie["id"] ?>"><?= $movie["title"] ?></a>
                        </h3>
                        <ul>
                            <?php
                            $genreListe = explode (",", $movie["genre"]);
                            foreach ($genreListe as $genre){
                            ?>
                                <li class="movie-genre"><?= $genre ?></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</main>
<?php
include("templates/footer.php");
?>

