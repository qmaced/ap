<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Formulaire</title>
    <link href="css/connexion.css" rel="stylesheet">
  </head>
  <body>

    <h1>Formulaire de connexion</h1>
    <form action="form.php" method="post">
      <div class="inputs">
        <p>login : <input type="text" name="login" /></p>
        <p>mot de passe : <input type="text" name="mot_de_passe" /></p>
      </div>
      <div align="center">
        <button type="submit" name="valider">Connexion</button>
      </div>
    </form>
  </body>
</html>