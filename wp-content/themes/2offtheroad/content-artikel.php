<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <h3>
    <?php the_title(); ?>
  </h3>

<?php
       $total_content = "";
        while ( have_posts() ) : the_post();
          ob_start();
          the_content();
          $total_content = ob_get_contents();
          ob_end_clean();
        endwhile;
        $total_content = strip_shortcodes($total_content);
        $totallength = strlen($total_content);
        $end_of_last_p_for_left = strpos($total_content, "\n", ($totallength / 2));
        $left_column_content = substr($total_content, 0, $end_of_last_p_for_left);
        $right_column_content = substr($total_content, $end_of_last_p_for_left, $totallength);


?>

  <div class="columnleft">
    <div class="columnspacing">
    <?php 
        echo $left_column_content;
    ?>
    </div>
  </div>
  <div class="columnright">
    <div class="columnspacing">
    <?php get_template_part( 'content-image' ); ?>
    <?php 
        echo $right_column_content;
    ?>
    </div>
  </div>
  <div class="clearfix"></div>
</article>

