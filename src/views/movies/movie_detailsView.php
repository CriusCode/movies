<?php get_header(' Details films | Terrorama');
?>

<style>
  .movie-title .story {
    font-size: 12px;
  }
</style>

<link rel="stylesheet" type="text/css" href="/public/css/style.css">

<div class="bloc-info">
  <div class="movie-info">
    <div class="poster-title">
      <img src="<?php echo $filmInfo[0]->MoviePoster; ?>" alt="Affiche du film Scream" style="max-width:385px; margin-right:15px; border-radius: 15px; box-shadow: 6px 4px 10px rgba(0,0,0,0.6);" />
      <div class="stickers-details">
        <?php
        if ($_GET['id'] == 9) { ?>
          <img src="../<?= $URLsticker ?>/gfsticker.png" alt="Sticker de Ghostface" id="gf-sticker" />
          <img src="../<?= $URLsticker ?>/woodsborosticker.png" alt="Sticker du clib de film de Woodsboro" id="woodsboro-sticker" />
        <?php } ?>
      </div>
    </div>
    <div class="stickers-streaming">
      <img src="../<?= $URLstreaming ?>/Netflix.png" id="netflix" alt="Logo de Netflix" />
      <img src="../<?= $URLstreaming ?>/PrimeLogo.png" id="amazon" alt="Logo de Amazon" />
      <img src="../<?= $URLstreaming ?>/canalvodlogo.png" id="canal" alt="Logo de Canal VOD" />
    </div>
  </div>
  <div class="movie-title">
    <h2 class="scream"><?php echo $filmInfo[0]->Title; ?><div class="scare-o-meter"><span class="scare">TROUILLOMETRE</span></div>
    </h2>
    <p class="separator"></p>
    <p class="story"><?php echo $filmInfo[0]->Duration; ?></p>
    <p class="story"><?php echo $filmInfo[0]->Director; ?></p>
    <p class="story"><?php echo $filmInfo[0]->Casting; ?></p>
    <p class="story"><?php echo $filmInfo[0]->Synopsis; ?></p>

    <div class="trailer">
      <iframe width="560" height="315" src="<?php echo $filmInfo[0]->Trailer; ?>" frameborder="0" allowfullscreen></iframe>
    </div>
  </div>
</div>

<div class="review-suggestion">
  <div class="my-review">
    <h2>Ma critique :</h2>
    <!-- Takes the first review if it exists, else it shows a predefined message-->
    <p><?php
        if (!empty($filmInfo[0]->critique)) {
          echo $filmInfo[0]->critique;
        } else {
          echo "Critique à venir...";
        }
        ?>
    </p>
  </div>
  <div class="suggestions-like">
    <h2>Quelques suggestions...</h2>

  </div>
</div>

<div class="slider-suggestions">
  <div class="slider">
  <!-- Retrieve and shows the movies suggested via the categories, by ID -->
    <?php
    foreach ($recommandationMovie as $movie) { ?>
      <div class="slide"><a href="<?php echo $router->generate('details') . $movie->id; ?>"><img src="<?php echo $movie->MoviePoster; ?>" alt="Movie 1" id="slide1"></a></div>
    <?php
    }
    ?>
  </div>
  <div class="prev-btn" onclick="prevSlide()">&#8249;</div>
  <div class="next-btn" onclick="nextSlide()">&#8250;</div>
</div>

<script>
  let currentIndex = 0;

  function showSlide(index) {
    const slider = document.querySelector('.slider');
    const slides = document.querySelectorAll('.slide');
    const totalSlides = slides.length;
    const visibleSlides = 3; // Numbers of posters visible in slides


    //Checks if specified index is higher than the total of images, if it's the case, it sets itself back to 0
    if (index >= totalSlides) {
      currentIndex = 0;
    } else if (index < 0) {
      currentIndex = totalSlides - visibleSlides;
    } else {
      currentIndex = index;
    }

    const translateValue = -currentIndex * (100 / visibleSlides) + '%';
    slider.style.transform = 'translateX(' + translateValue + ')';
  }

  // Shows 3 images default
  showSlide(currentIndex);

  function nextSlide() {
    showSlide(currentIndex + 1);
  }

  function prevSlide() {
    showSlide(currentIndex - 1);
  }

  // Auto slide
  setInterval(nextSlide, 5000); // Changes images every 5 seconds
</script>

<?php get_footer(); ?>