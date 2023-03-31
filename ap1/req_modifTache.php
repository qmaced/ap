<?php

    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require("fonction.php");
    $pdo = createBdd();

    $id_Etat=$_POST["etat"];
    $designation=$_POST["designation"];
    $priorite=$_POST["priorite"];
    $id_User=$_POST["user"];
    $id_Demande=$_POST["id"];

    print_r($_POST);

    $req='UPDATE demande SET id_Etat=:id_Etat, designation=:designation, priorite=:priorite, id_User=:id_User WHERE id_Demande=:id_Demande ';

    $stmt=$pdo->prepare($req);
    $stmt->execute([
        ':id_Etat' => $id_Etat,
        ':designation' => $designation,
        ':priorite' => $priorite,
        ':id_User' => $id_User,
        ':id_Demande' => $id_Demande
    ]);
    $data=$stmt->fetchall();

    echo "reussi";

?>