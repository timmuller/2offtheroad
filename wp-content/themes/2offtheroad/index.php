<?php
	get_header();
?>
  <ul class="nav">
    <?php
	   $menu_content = "";
	   $menu_hash = array();
	   $items = wp_get_nav_menu_items('main-menu');
	   foreach ( (array) $items as $key => $menu_item) {
		if(!$menu_item->menu_item_parent){
			$menu_hash[$menu_item->ID] = array();
			$menu_hash[$menu_item->ID]['object'] = $menu_item;
			$menu_hash[$menu_item->ID]['submenu'] = array();
		} else {
			$menu_hash[$menu_item->menu_item_parent]['submenu'][] = $menu_item;
		}
	   }
	   foreach ((array) $menu_hash as $key => $parent_menu){
		$menu_content .= "<li class=\"dropdown\">";
		if($parent_menu['submenu']){
			$menu_content .= "<a id=\"drop1\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" href=\"". $parent_menu['object']->url ."\">";
		} else {
			$menu_content .= "<a href=\"". $parent_menu['object']->url ."\">";
		}
		$menu_content .= $parent_menu['object']->title;
		if($parent_menu['submenu']){
			$menu_content .= "<b class=\"caret\"></b>";
		}
		$menu_content .= "</a>";

		foreach ($parent_menu['submenu'] as $child_menu){
			$menu_content .= "<ul class=\"dropdown-menu\" aria-labelledby=\"drop1\" role=\"menu\">";
			$menu_content .= "<li>";
			$menu_content .= "<a href=\"". $child_menu->url ."\">";
			$menu_content .= $child_menu->title;
			$menu_content .= "</a>";
			$menu_content .= "</li>";
			$menu_content .= "</ul>";
		}
		$menu_content .= "</li>";
	   }
	   echo $menu_content;
    ?>
  </ul>

  <div class="content">
    <div class="content-inner">
	<?php get_template_part( 'content', 'page' ); ?>
    </div>
  </div>

<?php 
	get_footer();
?>
