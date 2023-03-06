<?php
$serveurname= 'localhost';
$articlename = 'root';
$password = '';
    $bdd_con = new PDO("mysql:host=$serveurname;dbname=tp3", $articlename, $password);
    $bdd_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "connexion reussi";
?>