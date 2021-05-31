<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MachineCoffee</title>
    <link rel="stylesheet" href="style.css">
    <script src="javascript.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>

<body>
    <?php include('navbar.php'); ?>

    <!--affichage de tous les pc avec une icone pour les pc utilisé-->
    <section class="hero is-primary">
        <div class="container has-text-centered">
            <img src="https://zupimages.net/up/21/15/9r1f.png" alt="" />

            <p class="title">
                Toutes les machines
            </p> <br>

            <p class="subtitle">
                Modifier une machine ajouter ou annuler une reservation
            </p>

            <form method="post">
                <label for="nom_machine"> Machine </label>
                <br><br>
                <input class="input" type="text" placeholder="Nom de la machine" name="nom_machine">
                <br><br>
                <button type="submit" class="button is-success"><i class="fas fa-rocket"></i>Ajouter</button>

                <?php
                include('config.php');
                $reponse = $db->query('SELECT * FROM machine');

                if (isset($_POST['nom_machine'])) {
                    $requete = 'INSERT INTO machine VALUES(NULL,"' . $_POST['nom_machine'] . '" , "0" )';
                    $resultat = $db->query($requete);
                }
                ?>
            </form>
        </div>
        <br><br><br><br>

        <div class="container has-text-centered">

            <table class="table">
                <thead>
                    <tr>
                        <th>Nom machine</th>
                        <th>Statut</th>
                        <th>Modifier </th>
                        <th>Supprimer</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    $utilisateur = 'Aucun utilisateur defini';
                    // On inclut la connexion à la base
                    require_once('config.php');

                    // On écrit notre requête
                    $sql_machine = 'SELECT * FROM `machine` WHERE disponible = 0';


                    // On prépare la requête
                    $query_machine = $db->prepare($sql_machine);

                    // On exécute la requête
                    $query_machine->execute();

                    // On stocke le résultat dans un tableau associatif
                    $result_machine = $query_machine->fetchAll(PDO::FETCH_ASSOC);

                    require_once('close.php');

                    foreach ($result_machine as $machine) {
                    ?>
                        <tr>
                            <td><?= $machine['nom_machine'] ?></td>
                            <td>Disponible</td>
                            <td>
                                <a class="button is-warning" href="modif-machine.php?id=<?= $machine['id'] ?>"><i class="fas fa-user-edit"></i></a>
                            </td>
                            <td>
                                <a class="button is-danger" href="supprimer-machine.php?id=<?= $machine['id'] ?>"><i class="fas fa-user-times"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

        </div>

        </div>
        <br><br><br>

    </section>

</body>

</html>