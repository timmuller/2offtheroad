<?php

     if(!isset($show_date)){
        $show_date = true;
     }

     $thumbnail_url = wp_get_attachment_thumb_url($attachment->ID);
     if (!$thumbnail_url){
     	$array_thumb = wp_get_attachment_image_src(get_post_thumbnail_id($attachment->ID, 'thumbnail'));
     	if($array_thumb){
     	    $thumbnail_url = $array_thumb[0];
     	}
     }
     if (!$thumbnail_url){
       $post_of_category = get_posts(array(
	'post_type' => 'attachment',
	'post_parent' => $attachment->ID
       ));
       foreach ($post_of_category as $cat_attachment){
	$thumbnail_url = wp_get_attachment_thumb_url($cat_attachment->ID);
	if($thumbnail_url){
		break;
	}
       }
     }
     if (!$thumbnail_url){
	$thumbnail_url = get_template_directory_uri() . "/img/unknown_blog.jpg";
     }

     $show_behaviour = 'link';
     if($attachment->post_type == 'attachment'){
	$show_behaviour = 'popup';
     }
?>

<?php
	if ($show_behaviour == 'popup'){
?>
          <div data-target="#picture<?php echo $attachment->ID ?>" class="storywrapper" style="display:inline-block;cursor:pointer;">
<?php
	} else {
?>
          <div class="storywrapper" style="display:inline-block;cursor:pointer;">
	  <a href="<?php echo $attachment->guid ?>">
<?php
	}
?>
            <div class="thumbnail" style="background-image:URL(
                <?php echo $thumbnail_url ?>
            );">
            </div>
<?php
    if($show_date){
?>
            <div class="date">
                <?php echo date("d-m-Y", strtotime($attachment->post_date)) ?>
            </div>
<?php
    }
?>
            <div class="title">
                <?php echo $attachment->post_title ?>
            </div>
<?php
	if($show_behaviour != 'popup'){
?>
	</a>
<?php
	}
?>

          </div>

<?php
	if ($show_behaviour == 'popup'){
?>

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


