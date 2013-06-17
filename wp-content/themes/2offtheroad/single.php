<?php
  get_header();
?>

<?php
  $id = get_the_ID();
  $category = get_the_category();
  if(!$category){
    echo "Helaas kan deze pagina niet getoond worden.";
    exit;
  }
  $category_name = strtolower($category[0]->name);
  if(!$category_name || ($category_name != 'pics' && $category_name != 'blog')){
    echo "Helaas kan deze pagina niet getoond worden.";
    exit;
  }
?>

<div class="blog">


<?php
if($category_name == 'blog'){
	get_template_part('single-blog');
}
elseif($category_name == 'pics') {
	get_template_part('single-pics');
} else {
    echo "Helaas kan deze pagina niet getoond worden.";
    exit;
}

?>



</div>
<?php
  get_footer();
?>
