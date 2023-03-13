<?php
 require_once("bdd.php");
 include('nav.php') ;?><br>
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
if (isset($_POST['submit'])){
    $email    = trim(htmlspecialchars($_POST['email']));
    $password = htmlspecialchars($_POST['password']);
    

    // je vais verifier si un champs est vide
    if (!empty($email) OR !empty($password)){

            // On récupère tout le contenu de la table recipes
        $sqlQuery = 'SELECT * FROM user WHERE email = ? AND password = ?';
        $req = $bdd->prepare($sqlQuery);
        // $userStatement->execute(array($email, $password));
        $req->execute(array( $email,password_hash($password, PASSWORD_ARGON2ID)));
        $resultat = $req->fetchAll();
        
        if(count($resultat)==0) echo "Identifiant incorrecte";
        else {
            echo "Vous ête connecté !";
        }
        
    } 
}

?>