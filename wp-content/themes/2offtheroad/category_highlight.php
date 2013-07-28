
<div class="highlight-wrapper">
    <div class="highlight-title"><?php echo $category->name; ?></div>
    <div class="categoryoutline">
    <?php
      $args = array(
        'posts_per_page'=>10,
        'category' => $category->cat_ID
      );

      foreach(get_posts($args) as $attachment){
        include('picture_wrapper.php');
      }

    ?>
    </div>
</div>
