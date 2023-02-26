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
if (isset($_POST['submit']) AND isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['email']) AND isset($_POST['password'])){
    echo "OK";
}
