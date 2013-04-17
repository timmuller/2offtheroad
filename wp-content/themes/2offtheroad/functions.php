<?php


function register_my_menus(){
  register_nav_menus(
    array(
      "main-menu" => "Main Menu"
    )
  );
}
add_action('init', 'register_my_menus');


add_filter('the_content', 'strip_images',2);

function strip_images($content){
    return preg_replace("/\[caption.*\[\/caption\]/", '', $content);
}

?>
