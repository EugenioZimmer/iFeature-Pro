<?php

add_action('chimps_page_section', 'chimps_page_section_content' );


function chimps_page_section_content() { 
	global $options, $themeslug, $post;
	
	
	$enable = get_post_meta($post->ID, 'page_enable_slider' , true);
	$size = get_post_meta($post->ID, 'page_slider_size' , true);
	$hidetitle = get_post_meta($post->ID, 'hide_page_title' , true);
	$sidebar = get_post_meta($post->ID, 'page_sidebar' , true);
	$callout = get_post_meta($post->ID, 'enable_callout_section' , true);
	$twitterbar = get_post_meta($post->ID, 'enable_twitter_bar' , true);
	$enableboxes = get_post_meta($post->ID, 'enable_box_section' , true);
	$pagecontent = get_post_meta($post->ID, 'hide_page_content' , true);

?>

<?php if ($sidebar == "4"): ?>
		<div id="content_fullwidth">
	<?php endif;?>

	
	<?php if ($sidebar == "2" && $pagecontent == "on"): ?>
		<div id="content_left">
	<?php endif;?>
	
	<?php if ($sidebar == "0" OR $sidebar == ""): ?>
		<div id="content_left">
	<?php endif;?>
	
	<?php if ($sidebar == "2" && $pagecontent != "on"): ?>
	<?php get_sidebar('left'); ?>
	<?php get_sidebar('right'); ?>
	<?php endif;?>
	
	<?php if ($sidebar == "1" && $pagecontent != "on" OR $sidebar == "2" && $pagecontent != "on"): ?>
	<?php get_sidebar('right'); ?>
	<div class="content_half">
	<?php endif;?>
	
	<?php if ($enable == "on" && $size == "1"): ?>
		<div id = "slider-wrapper">
			<?php get_template_part('nivoslider', 'page' ); ?>
		</div>
	<?php endif;?>

		<?php if ($pagecontent != "on"): ?>
		<div class="content_padding">
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<div class="post_container">
			
			
			
				<div class="post" id="post-<?php the_ID(); ?>">
				<?php if ($hidetitle == ""): ?>
				
			

					<h2 class="posts_title"><?php the_title(); ?></h2>
						<?php endif;?>

					<div class="entry">

						<?php the_content(); ?>
						

					</div><!--end entry-->
					<div style=clear:both;></div>
					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>


				<?php edit_post_link('Edit', '<p>', '</p>'); ?>

				</div><!--end post-->
		
			<?php comments_template(); ?>

			<?php endwhile; endif; ?>
			</div><!--end post_container-->
				<?php endif;?>
		</div><!--end content_padding-->
		
	</div><!--end content_left-->
	
	<?php if ($sidebar == "0" && $pagecontent != "on"  OR $sidebar == ""): ?>
	<?php get_sidebar(); ?>
	<?php endif;?>
	<?php if ($sidebar == "1" && $pagecontent != "on"): ?>
	<?php get_sidebar('left'); ?>
	<?php endif;?>





<?
}


?>