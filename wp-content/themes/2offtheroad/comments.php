<br/>
<h2>Reacties</h2>
<ul class="commentlist">
	<?php wp_list_comments('type=comment&callback=custom_comments'); ?>
<!--	<?php wp_list_comments(); ?> -->
</ul>



<?php
	comment_form(array(
		'title_reply' => 'Reageer',
		'title_reply_to' => 'Reageer',
		'comment_notes_before' => '',
		'comment_notes_after' => ''
	));
?>


