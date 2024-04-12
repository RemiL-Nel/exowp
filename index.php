<?php get_header();?>

<?php
// Get the slider data
$slider_data = get_option('theme_exo_slider_setting');

// GET POST WITH CATEGORY
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 5,
    'cat' => $slider_data
);
$slider_items = new WP_Query( $args );
?>

<div class="slider">
  <div class="slideshow-container">
    <?php while ($slider_items->have_posts()) : $slider_items->the_post(); ?>
      <div class="mySlides fade">
          <?php 
          if (has_post_thumbnail()) {
              $image_url = get_the_post_thumbnail_url(); 
          } else {
              $image_url = 'https://via.placeholder.com/150'; // URL d'image par défaut
              echo '<p>Image à la une non trouvée pour le post '.get_the_ID().'</p>';
          }
          ?>
          <img src="<?= $image_url ?>" style="width:100%">
          <div class="text">
            <?php  $title = get_the_title(); ?>
            <h2><?= $title ?></h2>
            <p><?= get_the_excerpt(); ?></p>
            <p><a class="button" href="<?php the_permalink(); ?>">Voir</a></p>
          </div>
      </div>
    <?php endwhile; ?>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>

  <div style="text-align:center">
    <?php $i = 1; while ($slider_items->have_posts()) : $slider_items->the_post(); ?>
      <span class="dot" onclick="currentSlide(<?php echo $i; ?>)"></span>
    <?php $i++; endwhile; ?>
  </div>
</div>
<?php wp_reset_postdata(); ?>


<?php 
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

  $args = array(
      'post_type' => 'post',
      'posts_per_page' => 4,
      'cat' => $slider_data,
      'paged' => $paged
  );

  $posts = new WP_Query( $args );

  echo '<div class="list-posts">';
    // Boucle pour afficher les posts
    while ($posts->have_posts()) : $posts->the_post();
      echo '<div class="post">';
        if (has_post_thumbnail()) {
            $image_url = get_the_post_thumbnail_url(); 
        } else {
            $image_url = 'https://via.placeholder.com/150'; // URL d'image par défaut
        }
        ?>
        <img src="<?= $image_url ?>" style="width:100%">
        <h2><?php the_title(); ?></h2>
        <p><?php the_excerpt(); ?></p>
        <p><a class="button" href="<?php the_permalink(); ?>">Voir</a></p>
      <?php
      echo '</div>';
    endwhile;
  echo '</div>';


  // Pagination
  $big = 999999999; // besoin d'un nombre improbable
  echo "<div class='pagination'>";
    echo paginate_links( array(
      'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
      'format' => '?paged=%#%',
      'current' => max( 1, get_query_var('paged') ),
      'total' => $posts->max_num_pages,
      'prev_next' => false
    ));
  echo "</div>";

  wp_reset_postdata();
?>


<?php get_footer(); ?>