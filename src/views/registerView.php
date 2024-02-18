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

    img {
        width: 100%;
        height: 300px;
    }
</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<div class="d-flex align-items-center py-4 bg-body-tertiary vertical-center">
    <form action="" method="post" class="form-signin w-100 m-auto">
        <h1 class="h3 mb-3 fw-normal text-center">S'inscrire</h1>
        <div class="form-floating">
            <!-- For every input, the function will check if it's empty or not -->
            <?php $error = checkEmptyFields('username'); ?>
            <input type="username" name="username" class="form-control mb-2 <?= $error['class']; ?>" id="floatingInput" placeholder="Pseudo">
            <label for="floatingInput">Pseudo</label>
            <?= $error['message']; ?>
        </div>
        <div class="form-floating">
            <?php $error = checkEmptyFields('email'); ?>
            <input type="email" name="email" class="form-control mb-2 rounded <?= $error['class']; ?>" id="floatingInput" placeholder="Email">
            <label for="floatingInput">Email</label>
            <?= $error['message']; ?>
        </div>
        <div class="form-floating">
            <?php $error = checkEmptyFields('pwd'); ?>
            <input type="password" name="pwd" class="form-control mb-2 rounded <?= $error['class']; ?>" id="floatingPassword" placeholder="Mot de passe">
            <label for="floatingPassword">Mot de passe</label>
            <?= $error['message']; ?>
        </div>
        <div class="form-floating">
            <?php $error = checkEmptyFields('pwd'); ?>
            <input type="password-confirmation" name="pwd" class="form-control mb-2 <?= $error['class']; ?>" id="floatingPassword" placeholder="Confirmation de mot de passe">
            <label for="floatingPassword">Confirmation du mot de passe</label>
            <?= $error['message']; ?>
        </div>
        <button class="btn btn-dark w-100 p-2" type="submit">Je m'inscris sur Terrorama</button>
        <img src="<?= $URLsticker ?>/scream_login.png" />
    </form>
</div>