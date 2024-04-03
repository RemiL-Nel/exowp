<?php get_header();?>
<ul>
  
<?php
// Define our WP Query Parameters
$the_query = new WP_Query( 'posts_per_page=10' ); ?>
  
<?php
// Start our WP Query
while ($the_query -> have_posts()) : $the_query -> the_post();
// Display the Post Title with Hyperlink
?>
  
<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
<a href="#" rel="prettyPhoto">
    <?php the_post_thumbnail('thumbnail'); ?>
</a></li>

  
<?php
// Repeat the process and reset once it hits the limit
endwhile;
wp_reset_postdata();
?>
</ul>
<?php get_footer(); ?>