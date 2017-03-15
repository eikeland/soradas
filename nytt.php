<?php
session_start();
?>
<?php
require('wp/wp-blog-header.php');
?>
<?php require("includes/header.php"); ?>

<div id="wrapper">



<div id="menu">
<ul>
<li><a href="index.php">Hjem</a></li>
<li><a href="meny.php">Meny</a></li>
<li><a class="current" href="nytt.php">Nytt</a></li>
<li><a href="kontakt.php">Kontakt</a></li>
</ul>
</div>

<div id="header">
<div id="bar"></div>
<img src="media/logo_orig_top.png" alt="logo" />
<img src="media/logo_orig_bott.png" alt="logo" />
</div><!-- End header -->

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