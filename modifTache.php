<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Responsable</title>
        <link href="/ap/css/voir_tache.css" rel="stylesheet">
    </head>

    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        
        require("fonction.php");
        $pdo = createBdd();

    ?>

    <table>
        <th>id_Demande</th>
        <th>id_Etat</th>
        <th>designation</th>
        <th>priorite</th>
        <th>id_User</th>
        <?php
            $req="SELECT id_Demande, D.id_Etat, designation, priorite, D.id_User FROM demande D";
            $stmt=$pdo->prepare($req);
            $stmt->execute();
            $data=$stmt->fetchall();
            
            foreach($data as $cle=>$value) {
                echo "<tr></tr>";
                foreach($value as $cle2=>$value2){
                    echo "<td>$value2</td>";
                }
            } 
        ?>
    </table> <br><br>

    <h2>Modifier une tâche</h2>

    <form action="req_modifTache.php" method="post">
        <label>Choissisez l'id de la ligne que vous voulez modifiez : </label>
        <select name="id">
            <option></option>
            <?php
                $stmt=$pdo->prepare("SELECT id_Demande FROM demande D");
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
        </select><br><br>
        <label>etat : </label>
        <select name="etat">
            <option></option>
            <?php
                $stmt=$pdo->prepare("SELECT DISTINCT id_Etat FROM demande D");
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
        </select>
        <label>designation : <input type="text" name="designation" /></label>
        <label>priorite : </label>
        <select name="priorite">
            <option></option>
            <?php
                $stmt=$pdo->prepare("SELECT DISTINCT priorite FROM demande D");
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
        </select><br><br>
        <label>user : </label>
        <select name="user">
            <option></option>
            <?php
                $stmt=$pdo->prepare("SELECT DISTINCT id_User FROM demande D");
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
        </select>

        <p><input type="submit" name="submit" value="OK"></p>
    </form>

</html>