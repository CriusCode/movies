<?php get_header('Editer un film', 'admin'); ?>


<a href="<?php echo ($router->generate('list-movies')); ?>"><button class="btn btn-warning">Aller à la liste des films déjà existants</button></a>
<p><label for="movie-out"><input type="checkbox" name="movie-out" id="movie-out" />Film pas encore sorti</label></p>

<form method="POST" enctype="multipart/form-data">
    <div class="form-group mb-4">
        <label for="exampleFormControlInput1">Titre du film</label>
        <input type="text" class="form-control" name='title' placeholder="Scream, l'Exorciste, Evil Dead...">
    </div>
    <div class="form-group text-center mb-4 d-flex justify-content-between">
        <label for="exampleFormControlSelect1">Categorie(s) :</label>
        <!-- Fetch all the categories from the database -->
        <?php
        $allCategories = getAllCategories();
        foreach ($allCategories as $categorySingle) {
            echo "<p><input type='checkbox' name='categories[]' value='" . $categorySingle->CategoryID . "'> " . $categorySingle->CategoryName . "</p>";
        }
        ?>
    </div>
    <div class="form-group mb-4">
        <label for="exampleFormControlSelect2">Date de sortie</label>
        <input type="date" multiple class="form-control" name='releaseDate' placeholder="JJ/MM/AA">
    </div>
    <div class="form-group mb-4">
        <label for="exampleFormControlSelect2">Réalisateur</label>
        <input type="text" multiple class="form-control" name='director' placeholder="Wes Craven, Alexandre Aja...">
    </div>
    <div class="form-group mb-4">
        <label for="exampleFormControlSelect2">Durée</label>
        <input type="text" multiple class="form-control" name='duration' placeholder="1h30...">
    </div>
    <div class="form-group mb-4">
        <label for="exampleFormControlSelect2">Distribution</label>
        <textarea class="form-control" name='casting' rows="3" placeholder="Insérer le casting complet ici"></textarea>
    </div>
    <div class="form-group mb-4">
        <label for="exampleFormControlTextarea1">Synopsis</label>
        <textarea class="form-control" name='synopsis' rows="3" placeholder="Insérer le synopsis ici"></textarea>
    </div>
    <div class="form-group mb-2">
        <input type="radio" name="age-restriction" id="age-restriction-none" value="none"> Aucune restriction
    </div>
    <div class="form-group mb-2">
        <input type="radio" name="age-restriction" id="age-restriction-12" value="12"> -12 ans
    </div>
    <div class="form-group mb-2">
        <input type="radio" name="age-restriction" id="age-restriction-16" value="16"> -16 ans
    </div>
    <div class="form-group mb-2">
        <input type="radio" name="age-restriction" id="age-restriction-18" value="18"> -18 ans
    </div>
    <div class="form-group mb-4">
            <label for="whynotsee">Trouillomètre :</label>
            <input type="text" class="form-control" name='scare-o-meter' placeholder="0/100">
        </div>
    <div class="form-group mb-4">
        <label for="exampleFormControlFile1">Lien embed YouTube du trailer :</label>
        <input type="link" class="form-control-file" name='ytlink' placeholder="Lien du trailer en français">
    </div>
    <div class="form-group mb-4">
        <label for="exampleFormControlFile1">Inserer l'affiche du film ici :</label>
        <input type="file" class="form-control-file" name='movieposter'>
    </div>
    <div id="movie-out-container" hidden="true">
        <div class="form-group mb-4">
            <label for="whysee">Pourquoi faut-il le voir :</label>
            <input type="text" class="form-control" name='whysee'>
        </div>
        <div class="form-group mb-4">
            <label for="whynotsee">Pourquoi ne faut-il pas le voir :</label>
            <input type="text" class="form-control" name='whynotsee'>
        </div>
    </div>
    <div class="form-group mb-4">
        <label for="critique">Ma critique :</label>
        <textarea class="form-control" name="critique"></textarea>
    </div>
    <div>
        <input type="submit" class="btn btn-success" value="Sauvegarder">
    </div>
</form>

<script>
    // If the checkbox is checked, show the whysee and the whynotsee sections, for an upcoming movie
    document.getElementById('movie-out').addEventListener('change', (el) => {
        if (el.target.checked) {
            document.getElementById('movie-out-container').removeAttribute('hidden');
        } else {
            document.getElementById('movie-out-container').setAttribute('hidden', true);
        }

    });
</script>

<?php get_footer('admin'); ?>