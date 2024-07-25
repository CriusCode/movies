<?php get_header('Editer un film', 'admin'); ?>


<a href="<?php echo ($router->generate('list-movies')); ?>"><button class="btn btn-warning">Aller à la liste des films déjà existants</button></a>
<p><label for="movie-out"><input type="checkbox" name="movie-out" id="movie-out" />Film pas encore sorti</label></p>
<?php
if(isset($_GET['id']))
{
    try {
        $movieInfos=getMovieById($_GET['id'])[0];
    } catch (Exception $e) {
        echo "Erreur fatale : " . $e->getMessage();
        exit();
    }
}
else {
    $movieInfos=false;
}
?>
<form method="POST" enctype="multipart/form-data">
    <div class="form-group mb-4">
        <label for="exampleFormControlInput1">Titre du film</label>
        <input type="text" class="form-control" name='title' value="<?= ($movieInfos) ? escapeString($movieInfos->Title) : ''; ?>" placeholder="Scream, l'Exorciste, Evil Dead...">
    </div>
    <div class="form-group text-center mb-4 d-flex justify-content-between">
        <label for="exampleFormControlSelect1">Categorie(s) :</label>
        <!-- Fetch all the categories from the database -->
        <?php
        $allCategories = getAllCategories();
        if($movieInfos) {
        $CategoryMovie=$movieInfos->Category;
        $CategoryMovie=explode(",", $CategoryMovie);
        }
        foreach ($allCategories as $categorySingle) {
            echo "<p><input type='checkbox' name='categories[]' value='" . $categorySingle->CategoryID . "' " . ($movieInfos && in_array($categorySingle->CategoryID, $CategoryMovie) ? 'checked' : '') . "> " . $categorySingle->CategoryName . "</p>";
        }
        ?>
    </div>
    <div class="form-group mb-4">
        <label for="exampleFormControlSelect2">Date de sortie</label>
        <input type="date" multiple class="form-control" value="<?= ($movieInfos) ? escapeString($movieInfos->ReleaseDate) : ''; ?>" name='releaseDate' placeholder="JJ/MM/AA">
    </div>
    <div class="form-group mb-4">
        <label for="exampleFormControlSelect2">Réalisateur</label>
        <input type="text" multiple class="form-control" name='director' value="<?= ($movieInfos) ? escapeString($movieInfos->Director) : ''; ?>" placeholder="Wes Craven, Alexandre Aja...">
    </div>
    <div class="form-group mb-4">
        <label for="exampleFormControlSelect2">Durée</label>
        <input type="text" multiple class="form-control" name='duration' value="<?= ($movieInfos) ? escapeString($movieInfos->Duration) : ''; ?>" placeholder="1h30...">
    </div>
    <div class="form-group mb-4">
        <label for="exampleFormControlSelect2">Distribution</label>
        <textarea class="form-control" name='casting' rows="3" placeholder="Insérer le casting complet ici"><?= ($movieInfos) ? escapeString($movieInfos->Casting) : ''; ?></textarea>
    </div>
    <div class="form-group mb-4">
        <label for="exampleFormControlTextarea1">Synopsis</label>
        <textarea class="form-control" name='synopsis' rows="3" placeholder="Insérer le synopsis ici"><?= ($movieInfos) ? escapeString($movieInfos->Synopsis) : ''; ?></textarea>
    </div>
    <div class="form-group mb-2">
        <input type="radio" name="age-restriction" id="age-restriction-none" value="none" <?= (($movieInfos && $movieInfos->ageRestriction=='none') ? 'checked' : ''); ?>> Aucune restriction
    </div>
    <div class="form-group mb-2">
        <input type="radio" name="age-restriction" id="age-restriction-12" value="12" <?= (($movieInfos && $movieInfos->ageRestriction=='12') ? 'checked' : ''); ?>> -12 ans
    </div>
    <div class="form-group mb-2">
        <input type="radio" name="age-restriction" id="age-restriction-16" value="16" <?= (($movieInfos && $movieInfos->ageRestriction=='16') ? 'checked' : ''); ?>> -16 ans
    </div>
    <div class="form-group mb-2">
        <input type="radio" name="age-restriction" id="age-restriction-18" value="18" <?= (($movieInfos && $movieInfos->ageRestriction=='18') ? 'checked' : ''); ?>> -18 ans
    </div>
    <div class="form-group mb-4">
            <label for="whynotsee">Trouillomètre :</label>
            <input type="text" class="form-control" name='scareometer' value="<?= ($movieInfos) ? $movieInfos->scareometer : ''; ?>" placeholder="0/100">
        </div>
    <div class="form-group mb-4">
        <label for="exampleFormControlFile1">Lien embed YouTube du trailer :</label>
        <input type="link" class="form-control-file" name='ytlink' value="<?= ($movieInfos) ? escapeString($movieInfos->Trailer) : ''; ?>" placeholder="Lien du trailer en français">
    </div>
    <div class="form-group mb-4">
        <label for="exampleFormControlFile1">Inserer l'affiche du film ici :</label>
        <input type="file" class="form-control-file" value="<?= ($movieInfos) ? escapeString($movieInfos->MoviePoster) : ''; ?>" name='movieposter'>
    </div>
    <div id="movie-out-container" hidden="true">
        <div class="form-group mb-4">
            <label for="whysee">Pourquoi faut-il le voir :</label>
            <input type="text" class="form-control" value="<?= ($movieInfos) ? escapeString($movieInfos->whysee) : ''; ?>" name='whysee'>
        </div>
        <div class="form-group mb-4">
            <label for="whynotsee">Pourquoi ne faut-il pas le voir :</label>
            <input type="text" class="form-control" <?= ($movieInfos) ? escapeString($movieInfos->whynotsee) : ''; ?> name='whynotsee'>
        </div>
    </div>
    <div class="form-group mb-4">
        <label for="critique">Ma critique :</label>
        <textarea class="form-control" name="critique"><?= ($movieInfos) ? escapeString($movieInfos->critique) : ''; ?></textarea>
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