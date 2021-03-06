<?php

add_action('after_setup_theme', 'twooftheroad_setup' );
function twooftheroad_setup(){
	add_theme_support( 'post-thumbnails' );
}




add_action('init', 'register_my_menus');
function register_my_menus(){
  register_nav_menus(
    array(
      "main-menu" => "Main Menu"
    )
  );
}


add_filter('the_content', 'strip_images',2);
function strip_images($content){
    return preg_replace("/\[caption.*\[\/caption\]/", '', $content);
}


add_filter('comment_form_default_fields','remove_comment_fields');
function remove_comment_fields($fields) {
    unset($fields['email']);
    unset($fields['url']);
    return $fields;
}

// Custom callback to list comments in the your-theme style
function custom_comments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
  $GLOBALS['comment_depth'] = $depth;
  ?>
  <li>
	<span class="comment_header">
		<span class="author"><?php echo get_comment_author() ?></span>
		<span class="date"><?php echo get_comment_date() ?> <?php echo get_comment_time() ?></span>
	</span>
	<span class="comment_content"><?php echo get_comment_text() ?></span>
  </li>
<?php } // end custom_comments


?>
