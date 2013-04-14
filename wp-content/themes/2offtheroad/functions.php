<?php

add_filter('the_content', 'strip_images',2);

function strip_images($content){
    return preg_replace("/\[caption.*\[\/caption\]/", '', $content);
}

?>
