<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1><?php the_title() ?></h1>
        <span class="date"><?php the_date() ?></span>
        <div class="blogcontent">
          <?php the_content() ?>
        </div>
<?php
	$args = array(
	'post_type' => 'attachment',
        'posts_per_page' => -1,
	'numberposts' => null,
	'post_status' => null,
	'post_parent' => get_the_ID(),
        'post_mime_type' => 'image',
	);
	$attachments = array_reverse(get_posts($args));

	if (!$attachments) {
            echo "Er zijn geen afbeeldingen toegevoegd.";
            exit;
	}
?>
<?php
    $show_date = false;
	foreach($attachments as $attachment){
	    include('picture_wrapper.php');	
	}
?>


<?php endwhile; endif; ?>
