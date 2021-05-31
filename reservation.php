<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AstroReservation!</title>
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
                        <div class="columns">
                            <div class="column is-2"></div>
                            <div class="column is-8">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Utilisateur</th>
                                            <th>Machine</th>
                                            <th>Date</th>
                                            <th>Heure debut</th>
                                            <th>Heure fin</th>
                                            <th>Annuler</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // On inclut la connexion à la base
                                        require_once('config.php');
                                        $reponse = $db->query('SELECT utilisateur.pseudo AS nom_utilisateur, machine.nom_machine, machine.id 
                                            AS id_machine, reservation.id, reservation.id_machine, reservation.id_utilisateur, reservation.date, reservation.heure_debut, reservation.heure_fin
                                            FROM machine,utilisateur,reservation 
                                            WHERE reservation.id_utilisateur = utilisateur.id
                                            AND reservation.id_machine = machine.id');
                                        while ($donnees = $reponse->fetch()) {
                                        ?>
                                            <tr>
                                                <td><?= $donnees['nom_utilisateur'] ?></td>
                                                <td><?= $donnees['nom_machine'] ?></td>
                                                <td><?= $donnees['date'] ?></td>
                                                <td><?= $donnees['heure_debut'] ?></td>
                                                <td><?= $donnees['heure_fin'] ?></td>
                                                <td>
                                                    <form method="post">
                                                        <input type="submit" class="button is-danger" name="annuler">
                                                        <input type="hidden" name="id_reservation" value="<?= $donnees['id'] ?>" />
                                                        <input type="hidden" name="id_machine" value=" <?= $donnees['id_machine'] ?>" />
                                                        <input type="hidden" name="id_utilisateur" value=" <?= $donnees['id_utilisateur'] ?>" />

                                                    </form>
                                                </td>


                                            </tr>
                                        <?php
                                        }

                                        if (isset($_POST['annuler'])) {
                                            $requete = 'DELETE FROM reservation WHERE id="' . $_POST['id_reservation'] . '"';
                                            $reponse = $db->query($requete);
                                            $requete = 'UPDATE utilisateur SET disponible = 0 WHERE id="' . $_POST['id_utilisateur'] . '"';
                                            $reponse = $db->query($requete);
                                            //modifier la disponibilite du machine et l'uitlisateur
                                            $requete = 'UPDATE machine SET disponible = 0 WHERE id="' . $_POST['id_machine'] . '"';
                                            $reponse = $db->query($requete);
                                            
                                            //Fenetre JS affichant un message
                                            echo '<script>
                                            alert("La reservation a bien été annulée");
                                        </script>';
                                            //Raffraichir la page
                                            echo '<script>
                                            document.location.replace("reservation.php");
                                        </script>';
                                        }
                                        ?>
                                    </tbody>

                                </table>
                                <div class="container has-text-centered">

                                

                                </div>
                            </div>
                        </div>
                        <div class="column is-2"></div>

                    </div>
                </div>
                <div class="column is-3"></div>
            </div>
    </section>
</body>

</html>