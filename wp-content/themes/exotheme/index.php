<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

<?php get_header();?>
<?php
// Define our WP Query Parameters
$the_query = new WP_Query( 'posts_per_page=10' ); ?>
<h1>Liste de posts: </h1>

<!-- carousel -->

<section class="slider-wrapper">
  <button class="slide-arrow" id="slide-arrow-prev">
    &#8249;
  </button>
  
  <button class="slide-arrow" id="slide-arrow-next">
    &#8250;
  </button>
  
  <ul class="slides-container" id="slides-container">
<?php $args = array(
	'numberposts'	=> 5,
);
$my_posts = get_posts( $args );

if( ! empty( $my_posts ) ){
	foreach ( $my_posts as $p ){
		 echo'<li class="slide"><a href="' . get_permalink( $p->ID ) . '">' 

		. $p->post_title . "<br />" . get_the_post_thumbnail( $p->ID ) . '</a></li>';
    }
}
?>
  </ul>
</section>

<ul class="postContainer">
  

  
<?php
// Start our WP Query
while ($the_query -> have_posts()) : $the_query -> the_post();
// Display the Post Title with Hyperlink
?>
<li class="post"><a class="postTitle" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
<br />
<a class="postThumbnail" href="<?php the_permalink() ?>" rel="Post Thumbnail">
    <?php the_post_thumbnail('thumbnail'); ?>
</a></li>

  
<?php
// Repeat the process and reset once it hits the limit
endwhile;
wp_reset_postdata();
?>
</ul>
<?php get_footer(); ?>