<?php
	get_header();
?>
  <ul class="nav">
    <li>Home</li>
    <li class="dropdown">
	<a id="drop1" class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">
		Connor
		<b class="caret"></b>
	</a>
	<ul class="dropdown-menu" aria-labelledby="drop1" role="menu">
	  <li>Blog</li>
	  <li>Pics</li>
	</ul>
    </li>
    <li class="dropdown">
	<a id="drop1" class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">
		Marjolijn
		<b class="caret"></b>
	</a>
	<ul class="dropdown-menu" aria-labelledby="drop1" role="menu">
	  <li>Blog</li>
	  <li>Pics</li>
	</ul>
    </li>
    <li class="dropdown">
	<a id="drop1" class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">
		Extra
		<b class="caret"></b>
	</a>
	<ul class="dropdown-menu" aria-labelledby="drop1" role="menu">
	  <li>Route</li>
	  <li>Post</li>
	</ul>
    </li>
  </ul>

  <div class="content">
    <div class="content-inner">
	<?php get_template_part( 'content', 'page' ); ?>
    </div>
  </div>

<?php 
	get_footer();
?>
