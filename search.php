<?php
if (isset($_GET['q'])) {
    $dsn = "mysql:host=localhost;dbname=movieshuffle";
    $db = new PDO($dsn, 'root', "");

    $query = $db->prepare("SELECT movies.title, movies.id, movies.description FROM movies WHERE movies.title LIKE '%" . $_GET['q'] . "%'");
    $query->execute();
    $movies = $query->fetchAll(PDO::FETCH_ASSOC);
}



// Le tableau associatif $data est utilisé dans le template header pour avoir une balise title différente en fonction de la page où l'on se trouve mais une en-tête unique
$data = array("headerTitle" => "MovieShuffle");
include("templates/header.php");
?>

<div class="container">
    <h5>
        Votre recherche :
        <?= $_GET["q"] ?>
    </h5>
    <?php
    foreach ($movies as $movie) {


        $poster = str_replace(" ", "-", strtolower($movie["title"]));
        ?>

        <div class="movie-list">
            <img src="img/poster/<?= $poster ?>.jpg" alt="">
            <div class="movie-search">
                <h3>
                    <a href="movie.php?id=<?= $movie["id"] ?>"><?= $movie["title"] ?></a>
                </h3>
                <p>
                    <?= $movie["description"] ?>
                </p>

            </div>
        </div>
    <?php } ?>
    <?php
    include("templates/footer.php");
    ?>