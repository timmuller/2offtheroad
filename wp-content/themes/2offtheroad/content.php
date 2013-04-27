<?php
      $my_type = types_render_field('my_type', array('raw' => 'true'));
      if($my_type == "artikel"){
      	get_template_part('content-artikel');
      }
      else {
      	echo "Please define a type for the page";
      }
?>
