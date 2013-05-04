<html>
  <head>
    <?php wp_head(); ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <title><?php bloginfo('name') ?></title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/bootstrap/css/bootstrap.css" />
    <script src="<?php echo get_template_directory_uri(); ?>/bootstrap/js/jquery-1.9.1.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/bootstrap/js/bootstrap.js" type="text/javascript"></script>


    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" />
    <!--[if IE]>
    	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/ie.css" />
    <![endif]-->
    <script src="<?php echo get_template_directory_uri(); ?>/javascript.js" type="text/javascript"></script>
  </head>
  <body>
    <div class="container">

      <div class="header clearfix">
        <img src="<?php echo get_template_directory_uri(); ?>/img/utrecht.jpg" />
      </div>
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
                if($parent_menu['submenu']){
                        $menu_content .= "<ul class=\"dropdown-menu\" aria-labelledby=\"drop1\" role=\"menu\">";
                        foreach ($parent_menu['submenu'] as $child_menu){
                                $menu_content .= "<li>";
                                $menu_content .= "<a href=\"". $child_menu->url ."\"><span>";
                                $menu_content .= $child_menu->title;
                                $menu_content .= "</span></a>";
                                $menu_content .= "</li>";
                        }
                        $menu_content .= "</ul>";
                }
                $menu_content .= "</li>";
           }
           echo $menu_content;
    ?>
  </ul>
<?php 
  if(get_post_type() == 'post') { 
	  if ( function_exists( 'bread_crumb' ) ){
		bread_crumb('author_label="boe"');
	  }
  }
?>


  <div class="content">
    <div class="content-inner">

