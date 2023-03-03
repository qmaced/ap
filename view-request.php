<?php

    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require("fonction.php");
    $pdo = createBdd();

    if(isset($_POST["submit"])) {
?>
    <table>
        <th>id_Demande</th>
        <th>id_Etat</th>
        <th>priorite</th>
        <th>designation</th>
        <th>id_User</th>
        <?php
            $req="SELECT id_Demande, D.id_Etat, designation, priorite, D.id_User FROM demande D";
            if(!empty($_POST["etat"]) && !empty($_POST["priorite"]) && !empty($_POST["user"])) {
                $req=$req." inner join etat E ON D.id_Etat = E.id_Etat inner join user U ON D.id_User = U.id_User where E.intitule=? and CONCAT(U.nom, ' ', U.prenom)=? and priorite=?";
                $params = array($_POST["etat"], $_POST["user"], $_POST["priorite"]);
            }
            else if (!empty($_POST["etat"]) && !empty($_POST["priorite"])) {
                $req=$req." inner join etat E ON D.id_Etat = E.id_Etat where E.intitule=? and priorite=?";
                $params = array($_POST["etat"], $_POST["priorite"]);
            }
            else if (!empty($_POST["etat"]) && !empty($_POST["user"])) {
                $req=$req." inner join etat E ON D.id_Etat = E.id_Etat inner join user U ON D.id_User = U.id_User where E.intitule=? and CONCAT(U.nom, ' ', U.prenom)=?";
                $params = array($_POST["etat"], $_POST["user"]);
            }
            else if (!empty($_POST["priorite"]) && !empty($_POST["user"])) {
                $req=$req." inner join user U ON D.id_User = U.id_User where CONCAT(U.nom, ' ', U.prenom) = ? and priorite=?"; 
                $params = array($_POST["user"], $_POST["priorite"]);
            }
            else if(!empty($_POST["priorite"])) {
                $req=$req." where priorite=?";
                $params = array($_POST["priorite"]);
            }
            else if (!empty($_POST["user"])) {
                $req=$req." inner join user U ON D.id_User = U.id_User where CONCAT(U.nom, ' ', U.prenom) = ?"; 
                $params = array($_POST["user"]);
            }
            else if (!empty($_POST["etat"])) {
                $req=$req." inner join etat E ON D.id_Etat = E.id_Etat where E.intitule=?";
                $params = array($_POST["etat"]);
            }
            $stmt=$pdo->prepare($req);
            $stmt->execute($params);
            $data=$stmt->fetchall();
            
            foreach($data as $cle=>$value) {
                echo "<tr></tr>";
                foreach($value as $cle2=>$value2){
                    echo "<td>$value2</td>";
                }
            } 
        ?>
    </table>
<?php
    }
?>