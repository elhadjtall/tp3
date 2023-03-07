<?php require_once('bdd.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>article</title>
</head>
<body>
    <h1>Information de l'article</h1>
<?php
    // On récupère tout le contenu de la table recipes
$sqlQuery = 'SELECT * FROM articles';
$articlesStatement = $bdd->prepare($sqlQuery);
$articlesStatement->execute();
$articles = $articlesStatement->fetchAll();

// On affiche chaque recette une à une
foreach ($articles as $article) {
    echo '<br/>' .$article['nom'];
}
?>
</body>
</html>
