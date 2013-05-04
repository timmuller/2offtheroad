<?php
$args = array( 'post_type' => 'attachment', 'post_parent' => $post->ID ); 
$attachments = get_posts($args);
if ($attachments) {
	foreach ( $attachments as $attachment ) {
?>

<?php
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $ub = '';
    if(preg_match('/MSIE/i',$u_agent))
    {
	$ub = 'ie';
    }
?>

<div class="image_wrapper">
<?php if ($ub == 'ie') { ?>
  <a href="<?php echo $attachment->guid ?>">
<?php  } else { ?>
  <a href="#fullImage" role="button" data-toggle="modal">
<?php } ?>
    <img src="<?php echo $attachment->guid ?>" />
  </a>
  <div class="image_wrapper_subtitle"><?php echo $attachment->post_excerpt ?></div>
</div>

<div id="fullImage" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <button class="close" data-dismiss="modal" data-target="#myModal">×</button>
  <div class="modal-body" data-dismiss="modal" data-target="#myModal">
      <img src="<?php echo $attachment->guid ?>" />
  </div>
</div>

<?php
	}
}
?>
<br/>
