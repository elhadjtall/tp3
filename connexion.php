<?php
 require_once("bdd.php");
 include('nav.php') ;?><br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Connnexion</title>
</head>
<body>
<div class="container">
<div class="formulaire">
    <h1>Formulaire de Connexion</h1>
<form action="" method="POST" class="mt-5">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Addresse Email</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
    <input type="password"             class="form-control" name="password" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" name="submit" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Connexion</button>
</form>
</div>
</div>
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
