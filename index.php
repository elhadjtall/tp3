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
    echo '<p> Articles: ' .$article['nom'] .'<p/>';
    echo '<p> Prix: '   .$article['prix'] .'<p/>';
    echo '<hr/>';
}
?>

<h1>Information de l'utilisateur</h1>
<?php
$sqlQuery= 'SELECT * FROM user';
$userStatement = $bdd->prepare($sqlQuery);
$userStatement->execute();
$users = $userStatement->fetchAll();


foreach ($users as $user){
    echo '<p> Nom: ' .$user['nom'] .'<p/>';
    echo '<p> Prenom: ' .$user['prenom'] .'<p/>';
    echo '<p> email: ' .$user['email'] .'<p/>';
    echo '<hr/>';
}
?>
</body>
</html>
