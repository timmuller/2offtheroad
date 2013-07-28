<h1>
  <?php
    $currentcat = get_category(get_query_var('cat'), false);
    $parrentcat = $currentcat->category_parent;
    echo single_cat_title( '', false )?> van <?php echo get_cat_name($parrentcat);
  ?>
</h1>

<div class="blog">
<?php
      $args = array(
        'posts_per_page' => -1,
        'category' => $currentcat->cat_ID
      );

      foreach(get_posts($args) as $attachment){
        include('picture_wrapper.php');
      }
?>
</div>
