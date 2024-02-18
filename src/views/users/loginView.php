<?php get_header('Se connecter', 'login'); ?>

<style>
	html,
	body,
	.vertical-center {
		height: 100%;
	}

	.form-signin {
		max-width: 330px;
		padding: 1rem;
	}

	.form-signin .form-floating:focus-within {
		z-index: 2;
	}

	.form-signin input[type="email"] {
		margin-bottom: -1px;
		border-bottom-right-radius: 0;
		border-bottom-left-radius: 0;
	}

	.form-signin input[type="password"] {
		margin-bottom: 10px;
		border-top-left-radius: 0;
		border-top-right-radius: 0;
	}
</style>

<div class="d-flex align-items-center py-4 bg-body-tertiary vertical-center">
	<form action="" method="post" class="form-signin w-100 m-auto">
		<h1 class="h3 mb-3 fw-normal text-center">Se connecter</h1>
		<div class="form-floating">
			<!-- For every input, the function will check if it's empty or not -->
			<?php $error = checkEmptyFields('email'); ?>
			<input type="email" name="email" class="form-control <?= $error['class']; ?>" id="floatingInput" placeholder="Email">
			<label for="floatingInput">Email</label>
			<?= $error['message']; ?>
		</div>
		<div class="form-floating">
			<?php $error = checkEmptyFields('pwd'); ?>
			<input type="password" name="pwd" class="form-control <?= $error['class']; ?>" id="floatingPassword" placeholder="Mot de passe">
			<label for="floatingPassword">Mot de passe</label>
			<?= $error['message']; ?>
		</div>
		<div class="g-recaptcha" data-sitekey="6Lfeq2kpAAAAALC43NpZDHRPq4ZulsoJcnPATKlQ"></div>
		<button class="btn btn-primary w-100 py-2 mt-2" type="submit">Connexion</button>
		<p class="mt-4 mb-3 text-body-secondary text-center">
			<a href="<?= $router->generate('lostPassword'); ?>">Mot de passe oublié ?</a>
		</p>
	</form>
</div>

<?php get_footer('login'); ?>
<!-- // Clé secrete site HTML User 6Lfeq2kpAAAAALC43NpZDHRPq4ZulsoJcnPATKlQ
// Clé secrète back-end => service captcha 6Lfeq2kpAAAAALDpnV7YzeUXocqD0-XRjoY4ygPn -->