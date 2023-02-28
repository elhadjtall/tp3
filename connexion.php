<?php require_once("bdd.php") ;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connnexion</title>
</head>
<body>
    <form action="" method="POST">
        <h1>CONNEXION</h1>
        <p><input type="email"     name="email"     placeholder="email"></p>
        <p><input type="password"  name="password"  placeholder="password"></p>
        <p><input type="submit"    name="submit"    value="CONNEXION"></p>
    </form>
</body>
</html>
<?php
if (isset($_POST['submit']) AND isset($_POST['email']) AND isset($_POST['password'])){
    // echo "Les champs sont présent";

    // je vais declarer mes variables
    $email    = trim(htmlspecialchars($_POST['email']));
    $password = trim(htmlspecialchars($_POST['password']));

    // je vais verifier si un champs est vide
    if (empty($email) OR empty($password)){
        echo "Veuillez remplir un champs";
    }
    else{
        // je vais verifier la longueur du contenu du mot de passe
        if (strlen($password) < 8){echo "le mot de pass est trop court";}
        elseif (filter_var($email, FILTER_VALIDATE_EMAIL)){ echo "Votre mail est incorrect"; }
        else{
            // On verifie si les donnée existes dans la base de données
        
        }  
    }
}