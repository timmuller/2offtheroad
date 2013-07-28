<h1>
Overzicht van  <?php echo single_cat_title( '', false ) ?>
</h1>
<br/>
<br/>

<?php
  $subcategories = get_categories('child_of='.get_query_var('cat'));

  foreach ($subcategories as $category) {
    include(locate_template('category_highlight.php'));
    print "</br></br>";
  }


?>


