<?php 
session_start();
require_once("bdd.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <?php include_once('nav.php'); ?>
    <div class="container">
    <div class="formulaire">
    <h1>Formulaire d'Inscription</h1>
    <form action="" method="POST" class="mt-5">
        <div class="mb-3">
        <label for="exampleInputtext" class="form-label"> Votre nom</label>
        <input type="text" class="form-control" id="exampleInputtext1" aria-describedby="nomHelp" name="nom" placeholder="nom">
        </div>
        <div class="mb-3">
        <label for="exampleInputtext2" class="form-label">Votre Prénom</label>
        <input type="text"  class="form-control" id="exampleInputtext2" aria-describedby="prenomHelp" name="prenom" placeholder="prenom">
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail" class="form-label">Addresse Email</label>
        <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" name="email" placeholder="email">
        </div>
        <div class="mb-3">
        <label for="exampleInputPassword" class="form-label">Votre mot de passe</label>
        <input type="password" class="form-control" id="exampleInputpassword" name="password" placeholder="mot de passe">
        </div>
       <button type="submit" class="btn btn-primary" name="submit">Inscription</button>
    </form>
    </div>
    </div>
</body>
</html>
<?php
// Verification de la presence des champs avec la fonction "isset"
if (isset($_POST['submit']) AND isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['email']) AND isset($_POST['password'])){
    // declaration des variables 
    $nom      = trim(htmlspecialchars($_POST['nom']));
    $prenom   = trim(htmlspecialchars($_POST['prenom']));
    $email    = trim(htmlspecialchars($_POST['email']));
    $password = htmlspecialchars($_POST['password']);
    $password = password_hash($password, PASSWORD_ARGON2ID);
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
                'password' => $password,
            ]);
        }
    }

}
?>