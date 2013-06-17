<?php
  ob_start();
  the_title();
  $title = ob_get_contents();
  ob_end_clean();
?>

<h1>
  Gallerij van <?php echo $title ?><br/>
</h1><br/>

<?php

$blog_cats = get_term_by('slug', 'Blog-' . $title, 'category');
$cat_id = $blog_cats->term_id;

query_posts('cat='.$cat_id.'&post_status=publish,future');

while(have_posts()): the_post();
 print the_title() . "<br/>";
endwhile;

exit;



$user = get_user_by('login', $title);
if(!$user) {
?>

<div class="alert alert-error" style="margin-top:20px;text-align:center;">
  Helaas konden de blogs en foto's niet getoond worden. Probeer het later nog eens.
</div>

<?php
  exit;
}

print " boe"; 



?>
