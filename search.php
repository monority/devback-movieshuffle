<?php
if (isset($_GET['q'])) {
    // Initialisation de la base
    $dsn = "mysql:host=localhost;dbname=movieshuffle";
    $db = new PDO($dsn, 'root', "");

    // On test si le parametre page est vide, sinon on lui assigne 1
    $page = (!empty($_GET['page']) ? $_GET['page'] : 1);

    // Déclaration des variables;
    $limit = 3;
    $debut = ($page - 1) * $limit;

    // Premiere query
    $result = $db->prepare("SELECT count(movies.id) FROM movies WHERE movies.title LIKE :q");
    $result->bindValue(':q', '%' . $_GET['q'] . '%');
    $result->execute();
    $totalElements = $result->fetchColumn();
    $pageNumber = ceil($totalElements / $limit);


    // Deuxieme query
    $query = $db->prepare("SELECT movies.title, movies.id, movies.description FROM movies WHERE movies.title LIKE :q LIMIT :limit OFFSET :debut");
    $query->bindValue(':q', '%' . $_GET['q'] . '%');
    $query->bindValue(':debut', $debut, PDO::PARAM_INT);
    $query->bindValue(':limit', $limit, PDO::PARAM_INT);
    $query->execute();
    $movies = $query->fetchAll(PDO::FETCH_ASSOC);

}



// Le tableau associatif $data est utilisé dans le template header pour avoir une balise title différente en fonction de la page où l'on se trouve mais une en-tête unique
$data = array("headerTitle" => "MovieShuffle");
include("templates/header.php");
?>
<?php if (!empty($movies)) { ?>
    <div class="container">
        <h3>
            Votre recherche :
            "
            <?= $_GET["q"] ?>"
        </h3>
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
                    <h3>
                        <a href="movie.php?id=<?= $movie["id"] ?>">En savoir plus</a>
                    </h3>
                </div>
            </div>
        <?php } ?>
        <div class="page">
            <?php for ($i = 1; $i <= $pageNumber; $i++) { ?>
                <a href="?q=<?= urlencode($_GET['q']) ?>&page=<?= $i ?>"><?php echo $i; ?></a>
            <?php } ?>
        </div>
    </div>
    </div>
<?php } else { ?>
    <div class="container">
        Votre recherche :
        "
        <?= $_GET["q"] ?>" est introuvable
    </div>
<?php }
?>
<?php
include("templates/footer.php");
?>