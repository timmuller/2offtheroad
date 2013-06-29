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
	foreach($attachments as $attachment){
            $thumbnail_url = wp_get_attachment_thumb_url($attachment->ID);
?>
            <div data-target="#picture<?php echo $attachment->ID ?>" class="storywrapper" style="display:inline-block;cursor:pointer;">
            <div class="thumbnail" style="background-image:URL(
                <?php echo $thumbnail_url ?>
            );">
            </div>
            <div class="title">
                <?php echo $attachment->post_title ?>
            </div>
            </div>


            <div id="picture<?php echo $attachment->ID ?>" class="modal hide picture">
              <div class="top-buttons">
              <div class="topbutton close" data-dismiss="modal" aria-hidden="true"></div>
              <div class="center">
                  <div class="topbutton prev_pic"></div>
                  <div class="next_pic topbutton"></div>
              </div>
              </div>
              <div class="pic_url" style="display:none"><?php echo $attachment->guid ?></div>
                <div class="title"><?php echo $attachment->post_title ?></div>
              <div class="modal-body">
              </div>
            </div>


<?php
	}

?>


<?php endwhile; endif; ?>
