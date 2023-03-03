<?php

    define('designation','designation');
           
try

{

    // Bloc 1 :

    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

    $bdd = new PDO('mysql:host=localhost;dbname=ap', 'root', 'root', $pdo_options);

    $bdd->exec("SET CHARACTER SET utf8");

    // Bloc 2 :

    $requete_ajout = $bdd->prepare('INSERT INTO demande (designation) VALUES (?);');

    // Bloc 3 :

    $requete_ajout->execute(array($_POST['tache']));

    // Bloc 4 : fermeture de la requête

    $requete_ajout->closeCursor();

    // Bloc 5 : fermeture de la base de données

    $bdd=null;

    header('Location:../index.php');
}

// Gestion des erreurs

catch(Exception $e)

{

    exit('Erreur : '.$e->getMessage());

}
?>
