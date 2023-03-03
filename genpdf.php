<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    use Dompdf\Dompdf;
    use Dompdf\Options;
    
    require("fonction.php");
    $pdo = createBdd();

    $req = 'SELECT id_Demande, priorite, designation, CONCAT(U.nom, " ", U.prenom) FROM demande D INNER JOIN user U ON D.id_User = U.id_User WHERE id_Etat = 2';

    $stmt=$pdo->prepare($req);
    $stmt->execute();
    $data=$stmt->fetchall();

    ob_start();
    require_once 'contentPDF.php';
    $html = ob_get_contents();
    ob_end_clean();

    require_once('dompdf/autoload.inc.php');

    $options = new Options();
    $options->set('defaultFont','Courier');
    $dompdf = new Dompdf($options);

    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait'); 
    $dompdf->render();

    $fichier = 'tachesEnCours.pdf';
    $dompdf->stream($fichier);
?>