<?php

/**
 * 1. Importez le fichier SQL se trouvant dans le dossier SQL.
 * 2. Connectez vous à votre base de données avec PHP
 * 3. Sélectionnez tous les utilisateurs et affichez toutes les infos proprement dans un div avec du css
 *    ex:  <div class="classe-css-utilisateur">
 *              utilisateur 1, données ( nom, prenom, etc ... )
 *         </div>
 *         <div class="classe-css-utilisateur">
 *              utilisateur 2, données ( nom, prenom, etc ... )
 *         </div>
 * 4. Faites la même chose, mais cette fois ci, triez le résultat selon la colonne ID, du plus grand au plus petit.
 * 5. Faites la même chose, mais cette fois ci en ne sélectionnant que les noms et les prénoms.
 */
$server = 'localhost';
$bdd = 'table_test_deux';
$user = 'root';
$password = 'dev';

try {
    $bdd = new PDO("mysql:host=$server;dbname=$bdd;charset=utf8",$user,$password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

    $stmt = $bdd->prepare("SELECT * from user");
    $state = $stmt->execute();
    if($state) {
        foreach($stmt->fetchAll() as $user) {
            echo"<div class='classe-css-utilisateur' style='background-color: aquamarine' style='border: inset chartreuse' style='font-size: x-large'> Utilisateur: " .$user['nom'] ." " .$user['prenom']." ".$user['rue']." ".$user['numero']." "
                .$user['code_postal']." ".$user['ville']." ".$user['pays']." ".$user['mail'];
        }
    }
    else {
       echo "Une erreur est apparue!";
    }

}
catch(PDOException $exception) {
    echo $exception->getMessage();

}