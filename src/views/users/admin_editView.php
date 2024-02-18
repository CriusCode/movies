<?php get_header('Editer un utilisateur', 'admin'); ?>


<div class="mb-4">
    <h1>Editer un utilisateur</h1>


    <form action="" method="post">
        <div class="mb-4">
             <!-- For every input, the function will check if it's empty or not -->
            <?php $error = checkEmptyFields('email'); ?>
            <label for="email">Adresse email :*</label>
            <input type="email" name="email" id="email" value="<?= getValue('email');?>" class="form-control id-invalid" <?= $error['class']; ?> >
            <?= $error['message']; ?>
        </div>
        <div class="mb-4">
            <label for="email">Mot de passe :*</label>
            <input type="password" name="pwd" id="pwd" value="" class="form-control id-invalid" <?= $error['class']; ?> >
            <p class="form-text mb-0">Les règles de mot de passe</p>
            <p class="invalid-feedback">Messages d'erreur</p>
            <?= $error['message']; ?>
        </div>
        <div class="mb-4">
            <label for="email">Confirmation du mot de passe :*</label>
            <input type="password" name="pwdConfirm" id="pwd-confirm" value="" class="form-control id-invalid" <?= $error['class']; ?> >
            <?= $error['message']; ?>
        </div>
        <div>
            <input type="submit" class="btn btn-success" value="Sauvegarder">
        </div>
    </form>
</div>


<?php get_footer('admin'); ?>