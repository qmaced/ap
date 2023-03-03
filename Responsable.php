<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Responsable</title>
    </head>

    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        
        require("fonction.php");
        $pdo = createBdd();
    ?>

    <body>
        <h2>Critères</h2>
        <form action="view-request.php" method="post">
            <label>etat : </label>
            <select name="etat">
                <option></option>
                <option>non assignee</option>
                <option>en cours</option>
                <option>en attente</option>
                <option>terminee</option>
            </select> </br></br>

            <label>priorite : </label>
            <select name="priorite">
                <option></option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select> </br></br>

            <label>employé : </label>
            <select name="user">
                <option></option>
                <?php
                    $stmt=$pdo->prepare("SELECT nom, prenom FROM user WHERE id_role=3");
                    $stmt->execute();
                    $data=$stmt->fetchall();
                    foreach($data as $cle=>$value) {
                        echo "<option>";
                        foreach($value as $cle2=>$value2) {
                            echo "$value2 ";
                        }
                        echo "</option>";
                    }
                ?>
            </select> </br></br>

            <p><input type="submit" name="submit" value="OK"></p>
        </form>
    
        <form action="genpdf.php" method="post">
            <p><input type="submit" name="submit" value="Générer"></p>
        </form>
    </body>
</html>