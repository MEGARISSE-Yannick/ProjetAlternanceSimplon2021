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
	<section class="hero is-info is-small">
		<div class="hero-body">
			<div class="container has-text-centered">
				<img src="https://zupimages.net/up/21/15/9r1f.png" alt="" />
				<p class="title">
					Bienvenue sur AstroCoffee
				</p> <br>

				<p class="subtitle">
					Ajouter un administrateur
				</p>
			</div>
			<br><br>
			<div class="columns">
				<div class="column is-4"></div>
				<div class="column is-4">

					<div class="column has-text-centered">

						<form action="" method="post">
							<label for=""> Pseudo de l'administrateur </label>
							<div class="column">

								<input class="input" name="username" type="text">
							</div>

							<label for=""> Mot de passe </label>
							<div class="column">
								<input class="input" name="pass" type="password">
							</div>
							<label for=""> Mot de passe encore </label>
							<div class="column">
								<input class="input" name="pass2" type="password">
							</div>
							<div class="column">
								<button type="submit" name="submit" class="button is-danger">
									<i class="fas fa-user-plus"></i>Ajout Admin
								</button>
								<p>Déjà inscrit? <a href="index.php">Connectez-vous ici</a></p>

							</div>
						</form>

						<?php
						require('config.php');
						if (isset($_POST['submit'])) {
							$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
							if (empty($_POST['username'] && $_POST['pass'] && $_POST['pass2'])) {
								echo "<script>alert(\"Complete le formulaire pour continuer\")</script>";
							}
							if (isset($_POST['username']) && $_POST['pass'] == $_POST['pass2']) {
								// Hachage du mot de passe et emvoie dans la bdd
								$requete = 'INSERT INTO users VALUES(NULL,"' . $_POST['username'] . '","' . $pass_hache . '")';
								$resultat = $db->query($requete);
								echo "<script>alert(\"ajout ADMIN reussi connect toi!!\")</script>";

								echo '<script>document.location.replace("index.php");</script>';
							} else {
								echo "<script>alert(\"Les mots de passe ne correspondent pas\")</script>";
							}
						}

						?>
					</div>

				</div>


			</div>
			<div class="column is-4"></div>
		</div>
		</div>
	</section>
</body>

</html