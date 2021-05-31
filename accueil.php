<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Astrocoffee!</title>
    <link rel="stylesheet" href="style.css">
    <script src="javascript.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>

<body>
    <?php include('navbar.php'); ?>

    <section class="hero is-info is-small">
        <div class="hero-body">
            <div class="columns">

                <div class="column is-3"></div>
                <div class="column is-6">
                    <div class="container has-text-centered">
                        <img src="https://zupimages.net/up/21/15/9r1f.png" alt="" />
                        <p class="title">
                            Bienvenue sur la partie reservation
                        </p> <br>

                        <p class="subtitle">
                            Reserver une machine pour un utilisateur
                        </p>
                        <br><br>
                        <form action="" method="post">
                        <label for="utilisateur">User</label>
                            <div class="column">
                                <div class="select">

                                    <select name="id_utilisateur">

                                        <?php
                                        require_once('config.php');
                                        $reponse_utilisateur = $db->query('SELECT * FROM utilisateur WHERE disponible = 0');
                                        while ($utilisateur = $reponse_utilisateur->fetch()) {
                                        ?>
                                            <option value="<?= $utilisateur['id'] ?>"><?= $utilisateur['pseudo'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>


                                </div>
                            </div>  
                            <label for="machine">Machine</label>
                            <div class="column">
                                <div class="select">
                                    <select name="id_machine">
                                        <?php
                                        require_once('config.php');
                                        $reponse_machine = $db->query('SELECT * FROM machine WHERE disponible = 0');
                                        while ($machine = $reponse_machine->fetch()) {
                                        ?>
                                            <option value="<?= $machine['id'] ?>"><?= $machine['nom_machine'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                           
                            <div class="column has-text-centered">
                                <label for="pseudo"> Date de reservation </label>
                                <div class="column">

                                    <input class="input" type="date" placeholder="Date de reservation" name="date">
                                </div>
                                <label for="pseudo"> Heure de debut de reservation </label>
                                <div class="column">
                                    <input class="input" name="heure_debut" type="time" placeholder="Heure de debut">
                                </div>
                                <label for="pseudo"> Heure de fin de reservation </label>
                                <div class="column">
                                    <input class="input" name="heure_fin" type="time" placeholder="Heure de fin/uu.">
                                </div>

                                <div class="column">
                                    <button type="submit" name="reserver" class="button is-danger">
                                        <i class="fas fa-user-plus"></i>Reserver
                                    </button>
                                </div>
                            </div>

                        </form>

                        <?php
                        include('config.php');
                        if (isset($_POST['reserver'])) {
                            $requete = 'INSERT INTO reservation VALUES(NULL, 
                                "' . $_POST['id_utilisateur'] . '",
                                "' . $_POST['id_machine'] . '",
                                "' . $_POST['date'] . '",
                                "' . $_POST['heure_debut'] . '",
                                "' . $_POST['heure_fin'] . '")';
                            $resultat = $db->query($requete);
                              //modifier la disponibilite du machine
                              $requete = 'UPDATE machine SET disponible = 1 WHERE id="' . $_POST['id_machine'] . '"';
                              $reponse = $db->query($requete);
                              $requete = 'UPDATE utilisateur SET disponible = 1 WHERE id="' . $_POST['id_utilisateur'] . '"';
                              $reponse = $db->query($requete);
                            echo '<script>document.location.replace("accueil.php");</script>';
                        }


                        ?>


                    </div>
                </div>
                <div class="column is-3"></div>


            </div>
    </section>
</body>

</html>