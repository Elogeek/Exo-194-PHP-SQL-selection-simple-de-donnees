<?php
$server = 'localhost';
$bdd = 'table_test_deux';
$user = 'root';
$password = 'dev';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

try {
    $bdd = new PDO("mysql:host=$server;dbname=$bdd;charset=utf8",$user,$password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

    $stmt = $bdd->prepare("SELECT * from user");
    $state = $stmt->execute();
    if($state) {
        foreach($stmt->fetchAll() as $ligne) {
            echo"<div class='classe-css-utilisateur'>";
            echo "Utilisateur:" ." ".$user['nom'] ." " .$user['prenom'].
                " ".$user['rue']." ".$user['numero']." "
                .$user['code_postal']." ".$user['ville']." ".$user['pays']." ".$user['mail'];
            echo "</div>";
        }
    }
}
catch(PDOException $exception) {
    echo $exception->getMessage();
}
?>

</body>
</html>




