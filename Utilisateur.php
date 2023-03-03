<!DOCTYPE html>
<html>
  <head>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
    <meta charset="utf-8">
    <title>Utilisateur</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <h1>Créer une tache</h1>
    <form action="creer_tache.php" method="post">
        <p>Tache : <input type="text" name="tache" id="tache"/></p>
        <p><input type="submit" value="OK"></p>
    </form>
  </body>
</html>
