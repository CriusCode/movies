<?php get_header('Rédiger un avis', 'admin'); ?>

</div>
<div class="form-group mb-4">
    <label for="exampleFormControlSelect2">Film</label>
    <select class="form-control" name='movieName'></select>
</div>
<div class="form-group mb-4">
    <label for="exampleFormControlSelect2">Avis sur le film</label>
    <textarea class="form-control" name='casting' rows="15" placeholder="Ecrire l'avis ici..."></textarea>
</div>
<a href="#"><button type="button" class="submit-article btn btn-success">Poster l'avis</button></a>

<?php
if (isset($message)) {
echo '<div class="alert alert-success mt-4">' . $message . '</div>';
}
?>