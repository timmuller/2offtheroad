<?php
      $my_type = types_render_field('my_type', array('raw' => 'true'));
      if($my_type == "artikel"){
      	get_template_part('content-artikel');
      }
      elseif ($my_type = 'artikel-pdf'){
      	get_template_part('content-artikel-pdf');
      } 
      else {
      	echo "Please define a type for the page";
      }
?>
