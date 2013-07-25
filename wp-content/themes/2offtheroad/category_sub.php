<h1>
  <?php  echo single_cat_title( '', false )?> van <?php echo get_cat_name($parrentcat); ?>
</h1>


<div class="center">
<?php
  $column  = 4;
  $stories = array();
  while ( have_posts() ) : the_post();
    $stories[] = array('id' => get_the_ID(), 'title' => get_the_title(), 'date' => get_the_date(), 'url' => get_permalink());
  endwhile;

  if(!$stories){
?>
    <br/>
    <div class="alert alert-error">
      Helaas kan er nog niets getoond worden op deze pagina.
    </div>
<?php
    exit;
  }

  $totalsize = sizeof($stories);
  $total_rows = ceil($totalsize / $column);

  for($row = 0; $row < $total_rows; $row++){
?>
  <div class="thumbnailrow">
<?php
    for($current_column = 1; $current_column <= $column; $current_column++){
      $current_element = $stories[($row * $column) + ($current_column-1)];
      if(!$current_element){
	break;
      }
     
      $attachment_array = wp_get_attachment_image_src(get_post_thumbnail_id($current_element['id']), 'thumbnail');
      $current_element['attach'] = $attachment_array[0];

      if(!$current_element['attach']){
      $fetch_attachments = array( 'post_type' => 'attachment', 'post_parent' => $current_element['id'] );
      $attachments = get_posts($fetch_attachments);
      if ($attachments) {
        foreach ( $attachments as $attachment ) {
	  $current_element['attach'] = wp_get_attachment_thumb_url($attachment->ID);
	  if($attachment){
		break;
	  }
	}
      }
      }
	if(!$current_element['attach']){
		ob_start();
		the_content();
		$content = ob_get_contents();
		ob_end_clean();
		if($content){
			$pattern = "/<img.+?src=[\"'](.+?)[\"'].+?\/?>/";
			preg_match($pattern, $content, $matches);
			if($matches){
				$current_element['attach'] = $matches[1];
			}
		}
 	}
	
?>
  <div class="storywrapper" style="display:inline-block">
  <a href="<?php echo $current_element['url'] ?>">
  <div class="thumbnail" style="background-image:URL( 
  <?php
	if(!$current_element['attach']){
  ?>
      <?php echo get_template_directory_uri(); ?>/img/unknown_blog.jpg
  <?php
 	} else {
  ?>
      <?php echo $current_element['attach'] ?>
  <?php
	}
  ?>
    );"></div>
    <div class="title"><?php echo $current_element['title'] ?></div>
    <div class="date"><?php echo $current_element['date'] ?></div>
  </a>
  </div>
<?php
    }
?>
  </div>
  <div class="clearfix"></div>
<?php
  }

?>
</div>
