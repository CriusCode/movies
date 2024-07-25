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
        <?php foreach ($allMovieSuggestions as $movieSuggestion) { ?>
            <tr>
                <td><?php echo htmlspecialchars($movieSuggestion->suggestionID, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($movieSuggestion->movieName, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($movieSuggestion->username, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($movieSuggestion->created, ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
