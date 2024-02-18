<?php get_header('Suggestions', 'admin'); ?>

<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom du film</th>
            <th scope="col">Suggéré par</th>
            <th scope="col">Date</th>
        </tr>
    </thead>

    <tbody>
    <!-- Loop that fetch and displays the selected informations from the database -->
        <?php
        foreach ($allMovieSuggestions as $movieSuggestion) {
        ?>
            <tr>
                <td><?php echo $movieSuggestion->suggestionID; ?></td>
                <td><?php echo $movieSuggestion->movieName; ?></td>
                <td><?php echo $movieSuggestion->username; ?></td>
                <td><?php echo $movieSuggestion->created; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>