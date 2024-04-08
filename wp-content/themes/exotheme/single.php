<?php get_header(); ?>
<div class="single">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div class="singlePost">
<h1 class="singlePostTitle"><?php the_title(); ?></h1>
<p class="singlePostInfo">
Posté le <?php the_date(); ?> dans <?php the_category(', '); ?> par <?php the_author(); ?>.
</p>
<div class="singlePostContent">
<?php the_content(); ?>
<p> Avez vous aimé cet article ? dites le nous en commentaire!</p>
</div>
<div class="singlePostComments">
<?php comments_template(); ?>
</div>
</div>
<?php endwhile; ?>
<?php endif; ?>
</div>
<?php get_footer(); ?>