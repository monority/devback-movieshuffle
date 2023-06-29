<?php
function convertMovieDuration($duration)
{
    // floor permet de faire un arrondi à l'entier inférieur
    $hours = floor($duration / 60);
    $minutes = $duration % 60;
    return "{$hours}h {$minutes}min";
}

$dsn = "mysql:host=localhost;dbname=movieshuffle";
$db = new PDO($dsn, 'root', "");


$query = $db->query("SELECT movies.title, movies.id, movies.duration,movies.video, movies.description,movies.releaseDate, GROUP_CONCAT(genre.name SEPARATOR ',') AS genre FROM movies 
INNER JOIN movies_genre 
ON movies.id = movies_genre.movies_id 
INNER JOIN genre 
ON movies_genre.genre_id = genre.id
GROUP BY movies.id, movies.title "
);
$movies = $query->fetchAll(PDO::FETCH_ASSOC);
$find = false;
$data = array("title" => "Film introuvable");
if (isset($_GET["id"])) {
    foreach ($movies as $movie) {
        if ($movie["id"] == $_GET["id"]) {
            $find = true;

            $movie["poster"] = str_replace(" ", "-", strtolower($movie["title"]));
            $movie["duration"] = convertMovieDuration($movie["duration"]);
            $movie["releaseDate"] = new DateTime($movie["releaseDate"]);

            $data = $movie;
        }
    }
}

$data["headerTitle"] = "{$data["title"]} - MovieShuffle";
include("templates/header.php");
?>
<main>
    <div class="container">
        <?php
        if ($find) {
            ?>
            <div class="movie-wrapper flex-container">
                <div class="movie-left-wrapper">
                    <img src="img/poster/<?= $data["poster"] ?>.jpg" alt="">
                </div>
                <div class="movie-right-wrapper">
                    <span class="movie-year">
                        <!-- $data["releaseDate"] contient un objet DateTime sur lequel on fait appel à une méthode format, en PHP l'appel d'une méthode ou d'une propriété sur un objet se fait via la -> et non le . comme en JS -->
                        <?= $data["releaseDate"]->format('Y') ?>
                    </span>
                    <h1>
                        <?= $data["title"] ?>
                    </h1>
                    <p>
                        <?= $data["description"] ?>
                    </p>
                    <ul>
                        <?php
                        $genreList = explode(",", $data["genre"]);
                        foreach ($genreList as $genre) {
                            ?>
                            <li class="movie-genre">
                                <?= $genre ?>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                    <div class="movie-infos">
                        <span>
                            <?= $data["duration"] ?>
                        </span> - <span>
                            <?= $data["releaseDate"]->format('d/m/Y') ?>
                        </span>
                    </div>
                    <a class="btn btn-light" href="<?= $data["video"] ?>">Bande annonce</a>
                </div>
            </div>
            <?php
        } else {
            ?>
            <h1>
                <?= $data["title"] ?>
            </h1>
            <?php
        }
        ?>
    </div>
    </div>
</main>
<?php
include("templates/footer.php");
?>