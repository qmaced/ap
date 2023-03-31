<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Responsable</title>
        <link href="/ap/css/connexion.css" rel="stylesheet">
    </head>

    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        
        require("fonction.php");
        $pdo = createBdd();
        echo"Employe";
    ?>

    <body>
        <form action="modifTache.php" method="post">
            <p><input type="submit" name="submit" value="Modifier une tâche"></p>
        </form>
    </body>
</html>