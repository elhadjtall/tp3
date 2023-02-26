<?php require_once("bdd.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h1>inscription</h1>
    <form action="" method="POST">
        <input type="text"      name="nom"      placeholder="nom"> <br><br>
        <input type="text"      name="prenom"   placeholder="prenom"><br><br>
        <input type="email"     name="email"    placeholder="email"><br> <br>
        <input type="password"  name="password" placeholder="Password"><br><br>
        <input type="submit"    name="submit"   value="INSCRIPTION">
    </form>
</body>
</html>
<?php
// Verification de la presence des champs avec la fonction "isset"
if (isset($_POST['submit']) AND isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['email']) AND isset($_POST['password'])){
    // declaration des variables 
    $nom      = trim(htmlspecialchars($_POST['nom']));
    $prenom   = trim(htmlspecialchars($_POST['prenom']));
    $email    = trim(htmlspecialchars($_POST['email']));
    $password = trim(htmlspecialchars($_POST['password']));

    // Verification si les champs sont vides avec "empty"
    if (empty($nom) OR empty($prenom) OR empty($email) OR empty($password)) {
        echo "L'un des champs est vide";
    }
    else{
        // verification du mot de pass s'il à 8 caractères
        if (strlen($password)<8) { echo "le mot de pass est trop court"; }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { echo "Le mail est incorrecte"; }
        else{
            // Enregistrement des données dans la base de données tp3
            // Ecriture de la requête
            $sqlQuery = 'INSERT INTO user(nom, prenom, email, password) VALUES (:nom, :prenom, :email, :password)';

            // Préparation
            $insertRecipe = $bdd->prepare($sqlQuery);

            // Exécution ! La recette est maintenant en base de données
            $insertRecipe->execute([
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'password' => $password, // 1 = true, 0 = false
            ]);
        }
    }

}
