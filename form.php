<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

/*************************CONNEXION A LA BDD*************************************** */
$host = '127.0.0.1';
$db   = 'ap';
$user = 'root';
$pass = 'root';
$dsn = "mysql:host=$host;dbname=$db";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} 
catch (\PDOException $e) {
    print"ERREUR:".$e;
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
/*************************FIN******************************************** */

if(isset($_POST['login']))
{
    // On créer une variable login afin de stocker le login rentré
    $login=$_POST['login'];

    $stmt=$pdo->prepare("
    SELECT u.mot_de_passe, u.nom, u.prenom, r.intitule
    FROM user u
    INNER JOIN role r
    ON u.id_Role=r.id_Role
    WHERE login=?
    ");

    $stmt->execute(array($login));
    $data=$stmt->fetchall();
    if (count($data)==1) {
        if(isset($_POST["mot_de_passe"])){
            $mot_de_passe=$_POST['mot_de_passe'];
            if ($data[0]["mot_de_passe"] == $mot_de_passe) {
                session_start();
                $_SESSION['nom'] = $data[0]['nom'];
                $_SESSION['prenom'] = $data[0]['prenom'];
                $_SESSION['intitule'] = $data[0]['intitule'];
            
                if ($_SESSION['intitule']=="Employe") {
                    header('Location: Employe.php');
                }
                else if ($_SESSION['intitule']=="Responsable") {
                    header('Location: Responsable.php');
                }
                else {
                    header('Location: Utilisateur.php');
                }
            }
        }
    
    }
}
else{
    echo "KO";
}

?>