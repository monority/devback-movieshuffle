<?php
// Partie "Requête"
/* On calcule le numéro du premier élément à récupérer */
$debut = ($page - 1) * $limite;
/* La requête contient désormais l'indication de l'élément de départ,
 * avec le nouveau marqueur … */
$query = 'SELECT * FROM `my_table` LIMIT :limite OFFSET :debut';
$query = $cnx->prepare($query);
$query->bindValue('limite', $limite, PDO::PARAM_INT);
/* … auquel il faut aussi lier la valeur, comme pour la limite */
$query->bindValue('debut', $debut, PDO::PARAM_INT);
/* Le reste se passe comme auparavant */
$query->execute();

$cnx = new PDO('mysql:host=localhost;dbname=my_database;charset=utf8', 'root', '');

$page = $_GET['page'];
$limite = 10;

// Partie "Requête"
/* On calcule donc le numéro du premier enregistrement */
$debut = ($page - 1) * $limite;
/* On ajoute le marqueur pour spécifier le premier enregistrement */
$query = 'SELECT * FROM `my_table` LIMIT :limite OFFSET :debut';
$query = $cnx->prepare($query);
$query->bindValue('limite', $limite, PDO::PARAM_INT);
/* On lie aussi la valeur */
$query->bindValue('debut', $debut, PDO::PARAM_INT);
$query->execute();

// Partie "Boucle"
while ($element = $query->fetch()) {
    // C'est là qu'on affiche les données  :)
}

// Partie "Liens"
/* Notez que les liens ainsi mis vont bien faire rester sur le même script en passant
 * le numéro de page en paramètre */
?>
<a href="?page=<?php echo $page - 1; ?>">Page précédente</a>
—
<a href="?page=<?php echo $page + 1; ?>">Page suivante</a>
