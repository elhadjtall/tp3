<?php
 require_once("bdd.php") ;?>
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
    // je vais verifier si un champs est vide
    if (!empty($_POST['email']) OR !empty($_POST['password'])){
        // echo "Veuillez remplir un champs";
        $email    = trim(htmlspecialchars($_POST['email']));
        $password = htmlspecialchars($_POST['password']);
        $password = password_hash($password, PASSWORD_ARGON2ID);
        
        $recupUser = $bdd->prepare('SELECT * FROM user WHERE email= ? AND password = ?');
        $recupUser->execute(array($email, $password));
        if($recupUser->rowCount()>0){
            $recupUser->fetch()['idUser'];
            echo "ok";
        }else{
            echo "Votre email ou mot de passe est incorrect";
        }
    }else{
        // je vais verifier la longueur du contenu du mot de passe
        if (strlen($password) < 8){echo "le mot de pass est trop court";}
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){ 
            echo "Votre mail est incorrect";
        }  
    }
}
?>