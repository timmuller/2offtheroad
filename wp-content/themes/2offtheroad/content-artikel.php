<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="article-definition"><i>Artikel</i> | <b>REIZEN</b></div>


<?php
  $title = "";
  $main_title = "";
  $sub_title = "";
  ob_start();
  the_title();
  $title = ob_get_contents();
  $title_split = strpos($title, "|");
  if($title_split){
    $main_title = substr($title, 0, $title_split);
    $sub_title = substr($title, $title_split+1, strlen($title));
  } else {
    $main_title = $title;
  }
  ob_end_clean();
?>

  <h1>
    <?php echo $main_title ?>
  </h1>
<?php 
  if($sub_title){
?>
  <h2>
    <?php echo $sub_title ?>
  </h2>
<?php
  }
?>

<div class="seperate_title_content"></div>

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
	$break = strpos($total_content, "[BREAK]");
	if(!$break){ 
        	$break = strpos($total_content, "\n", ($totallength / 2));
	} else {
		$total_content = str_replace( "[BREAK]", "", $total_content );
        	$totallength = strlen($total_content);
	}
        $left_column_content = substr($total_content, 0, $break);
        $right_column_content = substr($total_content, $break, $totallength);


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
  <div class="article-footer">
    <span class="uppercase footer-text">Tekst: <strong>Corona MCmuzisch</strong></span>
    <span class="uppercase footer-text">Fotografie: <strong>Rahul Pandit</strong></span>
  </div>
</article>

