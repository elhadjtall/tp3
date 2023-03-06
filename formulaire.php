<?php require_once ('bdd_con.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire</title>
</head>
<body>
    <h1>Formulaire de recherche de Produit</h1>
    <form action="" method="POST">
        <p><input type="text"    name="nom"     placeholder="article"></p>
        <p><input type="number"  name="prix"    placeholder="prix"></p>
        <p><input type="submit"  name="submit"  value="entree"></p>
    </form>
</body>
</html>
<?php
if (isset($_POST['submit']) AND isset($_POST['nom']) AND isset($_POST['prix'])){
    echo "le champs est présent";
    // determiner les variables
    $nom = trim(htmlspecialchars($_POST['nom']));
    $prix = trim(htmlspecialchars($_POST['prix']));
}

?>