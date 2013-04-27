<?php
  get_header();
?>
<div class="blog">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<h1><?php the_title() ?><span><?php the_date() ?></span></h1>
	<div class="blogcontent">
	  <?php the_content() ?>
	</div>
<?php endwhile; endif; ?>
</div>
<?php
  get_footer();
?>
