
<?php
	$args = array('post_type' => 'attachment', 'post_parent' => $post->ID );
	$attachments = get_posts($args);
	if($attachments){
		$attachment = $attachments[0];
?>


	<img src="<?php echo $attachment->guid ?>" style="width:100%;" />
<?php
	} else {
		echo "Please add a PDF as attachment to this page"; 
	}
?>
