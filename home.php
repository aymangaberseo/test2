<?php
	if (have_posts()){
?>
	<div style='background:red;'>
<?php
	while(have_posts()) { 
		the_post();
?>
	<div style='background:green;'>
	<a href="<?php the_permalink(); ?>">
		<?= get_the_title(); ?>
	</a>
<?php
	the_content();
?>
	<p>This post was written by 
		<?php the_author(); ?>
	</p>
	<br><p>Email: </p>
	<?php echo get_the_author_meta(user_email); ?>
	<br>
	
	<br><p>Date: </p>
	<?php echo the_date('Y-m-d', '<h2>', '</h2>'); ?>
	<br>
	</div>
<?php } ?> 
	</div>
	<?php } ?>
