<?php 
/*
Template Name: page-template-sumenh
*/
get_header(); 
?>	

<div class="page-wrapper">
	<div class="g_content">
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<div class="g_content_left">
						<?php 
		$content_post = get_post($my_postid);
		$content = $content_post->post_content;
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);
		echo $content;
		?>
	</div>
	
</div>
</div>

</div><!-- container -->
</div>
</div>
<?php get_footer(); ?>