<?php require_once ('bdd.php') ?>
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
    // echo "le champs est présent";
    // determiner les variables
    $nom = trim(htmlspecialchars($_POST['nom']));
    $prix = trim(htmlspecialchars($_POST['prix']));
    if (empty($nom) OR empty($prix)){
        echo "Un champs est vide";
    }
    // Verfier la longueur du nom
    else if (strlen($nom) < 2 OR  strlen($nom) >50){
        echo "le nom est trop longue ou trop court";
    }
    // elseif(!is_float($prix)){
    //     echo "Le prix doit être un nombre";
    // }
    else{
        $sqlQuery = 'INSERT INTO articles(nom, prix) VALUES(:nom, :prix)';
        $insertRecipe = $bdd->prepare($sqlQuery);
        $insertRecipe->execute([
            'nom' => $nom,
            'prix' => $prix,
        ]);
    }

}
?>