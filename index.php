<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AstroCoffee!</title>
    <link rel="stylesheet" href="style.css">
    <script src="javascript.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>

<body>
    <section class="hero is-info ">
        <div class="hero-body">
            <div class="container has-text-centered">
                <img src="https://zupimages.net/up/21/15/9r1f.png" alt="" />
                <p class="title">
                    Bienvenue sur AstroCoffee
                </p> <br>

                <p class="subtitle">
                    Connecte toi en tant q'administrateur </p>
            </div>
            <br><br>
            <div class="columns">
                <div class="column is-4"></div>
                <div class="column is-4">
                    <div class="column has-text-centered">
                        <form action="" method="post">
                            <label for=""> pseudo de l'administrateur </label>
                            <div class="column">
                                <input class="input" name="pseudo" type="text">
                            </div>
                            <label for=""> Mot de passe </label>
                            <div class="column">
                                <input class="input" name="pass" type="password">
                            </div>
                            <div class="column">
                                <button type="submit" name="submit" class="button is-danger">
                                    Connexion
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="column is-4">
                    <?php
                    require('config.php');
                    if (isset($_POST['submit']) & !empty($_POST['pseudo']) & !empty($_POST['pass'])) {
                        //Récuperation de l'utilisateur via son pseudo

                        $reponse = $db->query('SELECT * FROM users WHERE pseudo ="' . $_POST['pseudo'] . '"');
                        while ($donnees = $reponse->fetch()) {
                            $pseudo = $donnees['pseudo'];
                            $pass = $donnees['pass'];
                        }

                        //Vérification du mot de passe
                        //Si le mot de passe ne correspond pas afficher un message d'erreur
                        $pass_identique = password_verify($_POST['pass'], $pass);
                        if (!$pass_identique) {
                            echo '<span class="alerte_message">Vos identifiants ne correspondent pas!</span>';
                        } else {

                            //Si le mot de passe correspond, crée une session et récupérer les données de l'utilisateur 
                            //puis le rediriger vers la page d'espace membre
                            if ($pass_identique) {
                                $_SESSION['id'] = $resultat['id'];
                                $_SESSION['pseudo'] = $pseudo;
                                echo "<script>alert(\"Vous êtes connecté !\")</script>";
                                echo '<script>document.location.replace("accueil.php");</script>';
                            } else {
                                echo '<span class="alerte_message">Vos identifiants ne correspondent pas!</span>';
                            }
                        }
                    }
                    ?>

                </div>
            </div>
    </section>
</body>

</html>