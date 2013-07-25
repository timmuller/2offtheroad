<?php

get_header();

$currentcat = get_category(get_query_var('cat'), false);
$parrentcat = $currentcat->category_parent;

if($parrentcat){
  get_template_part('category_sub');
} else {
  get_template_part('category_parent');
}

get_footer();

?>

