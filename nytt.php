<?php
session_start();
?>
<?php
	require('wp/wp-blog-header.php');
	require("includes/header.php"); 
?>

<div id="nytt">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="post">
<h2><?php the_title(); ?></h2>
<div class="entry-content clearfix">
<?php the_content(); ?>
</div><!-- .entry END -->
</div>
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

</div><!-- #nytt End -->

<?php require("includes/footer.php"); ?>