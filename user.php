<?php session_start();?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UserCoffee!</title>
    <link rel="stylesheet" href="style.css">
    <script src="javascript.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>

<body>
    <?php include('navbar.php'); ?>


    <section class="hero is-dark is-small">
        <div class="container has-text-centered">
            <img src="https://zupimages.net/up/21/15/9r1f.png" alt="" />

            <p class="title">
                Tous les utilisateurs
            </p> <br>

            <p class="subtitle">
                Creer un utilisateur le modifier ou le supprimer
            </p>
            <form method="post">
                <label for="pseudouser"> User </label>
                <br><br>
                <input id="pseudo" class="input" type="text" placeholder="pseudo de l'utilisateur" name="pseudo">
                <button type="submit" class="button is-black"><i class="fas fa-rocket"></i>Ajouter</button>
            </form>
            <?php
                include('config.php');

                if (isset($_POST['pseudo'])) {
                    $requete = 'INSERT INTO utilisateur VALUES(NULL, "' . $_POST['pseudo'] . '" )';
                    $resultat = $db->query($requete);
                }
                ?>
        </div>
        <br><br><br><br>

        <div class="container has-text-centered">

            <table class="table">
                <thead>
                    <tr>
                        <th>Pseudo</th>
                        <th>Modification</th>
                        <th>Suppression</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    // On inclut la connexion à la base
                    require_once('config.php');

                    // On écrit notre requête
                    $sql = 'SELECT * FROM `utilisateur`';

                    // On prépare la requête
                    $query_ = $db->prepare($sql);

                    // On exécute la requête
                    $query_->execute();

                    // On stocke le résultat dans un tableau associatif
                    $result = $query_->fetchAll(PDO::FETCH_ASSOC);

                    require_once('close.php');

                    foreach ($result as $utilisateur) {
                    ?>
                        <t-r>
                            <td><?= $utilisateur['pseudo'] ?></td>
                            <td><a class="button is-warning" href="modif-user.php?id=<?= $utilisateur['id'] ?>"><i class="fas fa-user-edit"></i></a></td>
                            <td><a class="button is-danger" href="supprimer-user.php?id=<?= $utilisateur['id'] ?>"><i class="fas fa-user-times"></i></a></td>
                            </tr>
                        <?php
                    }
                        ?>
                        <?php

                        ?>


                </tbody>
            </table>

        </div>
        <br><br><br>
    </section>


</body>

</html>