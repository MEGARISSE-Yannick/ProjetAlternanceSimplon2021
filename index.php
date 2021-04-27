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
                    Bienvenue sur AstroCoffee
                </p> <br>

                <p class="subtitle">
                    Reserver une machine pour un utilisateur
                </p>
            </div>
            <br><br>
            <div class="columns">
                <div class="column is-4"></div>
                <div class="column is-4">
                    <div class="container has-text-centered">
                        <form action="" method="post">
                            <label for="user">User</label>
                            <div class="column">
                                <div class="select">

                                    <select name="user">

                                        <?php
                                        require_once('config.php');
                                        $reponse_utilisateur = $db->query('SELECT * FROM utilisateur');
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
                                    <select name="machine">
                                        <?php
                                        require_once('config.php');
                                        $reponse = $db->query('SELECT * FROM machine');
                                        while ($machine = $reponse->fetch()) {
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
                                    <input class="input" name="heure_debut" type="time">
                                </div>
                                <label for="pseudo"> Heure de fin de reservation </label>
                                <div class="column">
                                    <input class="input" name="heure_fin" type="time">
                                </div>

                                <div class="column">
                                    <button type="submit" name="reserver" class="button is-danger">
                                        <i class="fas fa-user-plus"></i>Reserver
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>

                    <?php
                    include('config.php');
                    $reponse_reservation = $db->query('SELECT * FROM reservation');
                    if (isset($_POST['reserver'])) {
                        $requete = 'INSERT INTO reservation VALUES(NULL, "' . $_POST['user'] . '",
                            "' . $_POST['machine'] . '",
                                "' . $_POST['date'] . '",
                                "' . $_POST['heure_debut'] . '",
                                "' . $_POST['heure_fin'] . '")';
                        $resultat = $db->query($requete);

                        $reponse_disponible = $db->query('SELECT * FROM machine');
                        $requete = 'UPDATE machine SET statut="Indispoonible" WHERE id="' . $_POST['machine'] . '"';
                        $resultat = $db->query($requete);
                        echo '<script>document.location.replace("index.php");</script>';
                    }



                    ?>
                </div>
                <div class="column is-4"></div>
            </div>
        </div>
    </section>
</body>

</html>