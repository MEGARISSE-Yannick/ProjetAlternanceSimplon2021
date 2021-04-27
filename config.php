<?php
try{
    // Connexion à la bdd
    $db = new PDO('mysql:host=localhost;dbname=astrocoffee', 'root','');
    $db->exec('SET NAMES "UTF8"');
    
} catch (PDOException $e){
    echo 'Erreur mauvaise connexion a la Base de donnée: '. $e->getMessage();
    die();
}
?>
    
