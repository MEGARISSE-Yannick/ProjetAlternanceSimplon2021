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
    <?php include('navbar.php'); ?>

    <section class="hero is-info is-small">
        <div class="hero-body">
            <div class="container has-text-centered">
                <img src="https://zupimages.net/up/21/15/9r1f.png" alt="" />
                <p class="title">
                    AstroCoffee modification
                </p> <br>

                <p class="subtitle">
                    Modifie une machine et son atribution
                </p>
                <div class="columns">
                    <div class="column is-4"></div>
                    <div class="column is-4">

                        <div class="container has-text-centered">

                            <form action="" method="post">
                                <?php
                                $id = $_GET['id'];
                                require_once('config.php');
                                $reponse = $db->query('SELECT * FROM machine WHERE id="' . $id . '"');

                                while ($donnees = $reponse->fetch()) {
                                    echo '<div class="column">';
                                    echo '<div class="column">';
                                    echo '<label>' . $donnees['nom_machine'] . '</label>';
                                    echo '<input class="input is-primary" type="text" name="new_nom_machine"  value="' . $donnees['nom_machine'] . '">';
                                    echo '<input type="hidden" name="id" value="' . $donnees['id'] . '">';
                                    echo '<label for="statut">Annuler reservation</label>
                                    <input type="checkbox" name="statut" id="statut" value="1">';
                                    echo '</div>';
                                    echo '<button name="modifier" type="submit" class="button is-danger"><i class="fas fa-rocket"></i>Modifier</button>';



                                    if (isset($_POST['modifier']) && !empty('new_nom_machine')) {
                                        $requete = 'UPDATE machine SET   nom_machine="' . $_POST['new_nom_machine'] . '"  WHERE id="' . $_POST['id'] . '"';
                                        $resultat = $db->query($requete);
                                        echo '<script>document.location.replace("machine.php");</script>';



                                        if (!empty($_POST['statut'] == 1)) {
                                            // On inclut la connexion à la base
                                            $requete = 'UPDATE machine SET   disponible= 0  WHERE id="' . $_POST['id'] . '"';
                                            $resultat = $db->query($requete);
                                        }
                                    }
                                }
                                ?>

                            </form>

                        </div>
                    </div>
                    <div class="column is-4"></div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>