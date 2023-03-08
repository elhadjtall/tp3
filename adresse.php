<?php require_once('bdd.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adresse</title>
</head>
<body>
    <h1>Votre Adresse</h1>
    <form action="" method="POST">
    <p><input type="text"   name="nomAdresse" placeholder="Adresse"></p>
    <p><input type="text"   name="cp"         placeholder="cp"></p>
    <p><input type="text"   name="ville"      placeholder="ville"></p>
    <p><input type="submit" name="submit"     value="contunier"></p>
    </form>
</body>
</html>
<?php
if (isset($_POST['submit']) AND isset($_POST['nomAdresse']) AND isset($_POST['cp']) AND isset($_POST['ville'])){
    // echo "le champs est present";

    $nomAdresse = trim(htmlspecialchars($_POST['nomAdresse']));
    $cp =         trim(htmlspecialchars($_POST['cp']));
    $ville = trim(htmlspecialchars($_POST['ville']));

    if(empty($nomAdresse) OR empty($cp) OR empty($ville)){
        echo "Un champs est vide";
    }
    elseif(strlen($ville)< 2 OR strlen($ville)>100){
        echo "le nom de la ville est trop court ou trop long";
    }
    // Verifier si le code postal est un chiffre numerique
    elseif(!is_numeric($cp)){
        echo "le code postal est incorrect";
    }
    //Enregistrement dans la base de données
    else{
        $sqlQuery = 'INSERT INTO adresse(nomAdresse, cp, ville) VALUES(:nomAdresse, :cp, :ville)';

        $insertRecipe = $bdd->prepare($sqlQuery);
        //executer la requette
        $insertRecipe->execute([
            'nomAdresse' => $nomAdresse,
            'cp' => $cp,
            'ville' => $ville, 
        ]);

    }
}


?>