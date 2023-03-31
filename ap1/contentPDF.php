<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
</head>
<body>
    <h1> Liste des taches en cours</h1>
    <table>
        <thead>
            <th>id &nbsp;</th>
            <th>priorite &nbsp;</th>
            <th>designation &nbsp;</th>
            <th>user &nbsp;</th>
        </thead>
        <tbody>
            <?php
                foreach($data as $cle=>$value) {
                    echo "<tr></tr>";
                    foreach($value as $cle2=>$value2){
                        echo "<td>$value2</td>";
                    }
                } 
            ?>
        </tbody>
    </table>
</body>
</html>