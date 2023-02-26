<?php
    $serveurname = 'localhost';
    $username = 'root';
    $password = '';
      $bdd = new PDO("mysql:host=$serveurname;dbname=tp3", $username, $password); 
      $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //  echo 'Connexion réussie';
    ?>
