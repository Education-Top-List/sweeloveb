<?php 
/*
Template Name: page-template-chinhsach
*/
get_header(); 
?>	
<div class="page-wrapper">
	<div class="g_content">
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		<div class="img_category_single" style="background:url('<?php echo $image[0]; ?>">
			<div class="single_post_info">
				<h2><?php the_title(); ?></h2>
			</div>
		</div>
		<div class="container">
			<div class="g_content_left">
				<?php 
				$content_post = get_post($my_postid);
				$content = $content_post->post_content;
				$content = apply_filters('the_content', $content);
				$content = str_replace(']]>', ']]&gt;', $content);
				echo $content;
				?>

			</div>

		</div><!-- container -->
	</div>
</div>
<?php get_footer(); ?>