
<?php
if (!empty($_POST['search'])) {
    $searchTerm = $_POST['search'];
    // Use the $searchTerm variable in your code for further processing
    // ...
    $dsn = "mysql:host=localhost;dbname=movieshuffle";
    $db = new PDO($dsn, 'root', "");
    $query = $db->prepare("SELECT movies.title, movies.id FROM movies WHERE movies.title LIKE :searchTerm");
    $query->bindValue(':searchTerm', "%$searchTerm%", PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    if ($query->execute()) {
        header("Location: search.php?q=$searchTerm");
    }
}
?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $data["headerTitle"] ?>
    </title>

    <link rel="stylesheet" id="typekit-css" href="https://use.typekit.net/oek3jfu.css?ver=1.0.4" type="text/css"
        media="all">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <header>
        <div class="container flex-container justify-content">
            <div class="wrapper">

                <a class="brand" href="./">MovieShuffle</a>
            </div>
            <div class="wrapper">
                <form action="" method="post">
                    <label for="search-tool" id="search-tool"></label>
                    <input type="text" id="search-tool" name="search" placeholder="Rechercher..." required class="input">
                    <label for="search-submit"></label>
                    <input type="submit" name="search-submit" id="search-submit" value="Rechercher" class="btn-custom">
                </form>
            </div>
        </div>
    </header>