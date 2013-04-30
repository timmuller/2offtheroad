<?php
  get_header();
?>
<div class="blog">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<h1><?php the_title() ?></h1>
	<span class="date"><?php the_date() ?></span>
	<div class="blogcontent">
	  <?php the_content() ?>
	</div>
<?php endwhile; endif; ?>

<?php comments_template('', true); ?>


</div>
<?php
  get_footer();
?>
