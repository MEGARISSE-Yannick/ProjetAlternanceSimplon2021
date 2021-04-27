<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modification user AstroCoffee</title>
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
                    Modifie un utilisateur
                </p>
                <form action="" method="post">
                    <div class="columns">
                        <div class="column is-4"></div>
                        <div class="column is-4">

                            <div class="container has-text-centered">

                                <form action="" method="post">
                                    <?php
                                    $id = $_GET['id'];

                                    require_once('config.php');

                                    $reponse = $db->query('SELECT * FROM utilisateur WHERE id="' . $id . '"');

                                    while ($donnees = $reponse->fetch()) {

                                        echo '<div class="column">';
                                        echo '<div class="column">';
                                        echo '<label>' . $donnees['pseudo'] . '</label>';
                                        echo '<input class="input is-primary" type="text" name="new_pseudo"  value="' . $donnees['pseudo'] . '">';
                                        echo '<input type="hidden" name="id" value="' . $donnees['id'] . '">';
                                        echo '</div>';
                                        echo '<button type="submit" class="button is-danger"><i class="fas fa-rocket"></i>Modifier</button>';

                                        if (isset($_POST['new_pseudo'])) {
                                            $requete = 'UPDATE utilisateur SET 
                                        pseudo="' . $_POST['new_pseudo'] . '"
                                        WHERE id="' . $_POST['id'] . '"';
                                            $resultat = $db->query($requete);
                                            echo '<script>document.location.replace("user.php");</script>';
                                        }
                                    }

                                    ?>
                                </form>
                            </div>
                        </div>

</body>

</html>