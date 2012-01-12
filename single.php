<?php 

/*
	Single
	
	Establishes the single post template of iFeature. 
	
	Copyright (C) 2011 CyberChimps
*/


	global $options, $themeslug, $post; // call globals
	
	$sidebar = $options->get($themeslug.'_single_sidebar');
	
	if ($sidebar == 'two-right' OR $sidebar == 'right-left' ) {
		$content_grid = 'six columns';
	}
	
	elseif ($sidebar == 'none' ) {
		$content_grid = 'twelve columns';
	}
	
	else {
		$content_grid = 'eight columns';
	}


/* End variable definition. */	


get_header(); ?>

<div class="container">
	<div class="row">

<?php if (function_exists('chimps_breadcrumbs') && ($options->get($themeslug.'_disable_breadcrumbs') == "1")) { chimps_breadcrumbs(); }?>

<!--Begin @Core index after entry hook-->
	<?php chimps_single_before_entry(); ?>
	<!--End @Core index after entry hook-->

	
		<div id="content" class="eight columns">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<div class="post_container">
				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
		
				<!--Begin @Core index loop hook-->
					<?php chimps_single_loop(); ?>
				<!--End @Core index loop hook-->	
			
				<!--Begin @Core link pages hook-->
					<?php chimps_link_pages(); ?>
				<!--End @Core link pages hook-->
			
				<!--Begin @Core post edit link hook-->
					<?php chimps_edit_link(); ?>
				<!--End @Core post edit link hook-->
			
				<!--Begin @Core FB like hook-->
					<?php ifeature_single_fb_like_plus_one(); ?>
				<!--End @Core FB like hook-->
			
				<!--Begin @Core post tags hook-->
					<?php chimps_single_post_tags(); ?>
				<!--End @Core post tags hook-->
				
				<!--Begin @Core post pagination hook-->
					<?php chimps_post_pagination(); ?>
				<!--End @Core post pagination hook-->
			
				<!--Begin @iFeature post bar hook-->
					<?php ifeature_single_post_bar(); ?>
				<!--End @iFeature post bar hook-->
			
				</div><!--end post_class-->	
		</div><!--end post container--> 
	
			<?php endwhile; ?>
			
			<?php comments_template(); ?>
		
			<?php else : ?>

				<h2>Not Found</h2>

			<?php endif; ?>
		
		</div><!--end content-->

	<!--Begin @Core index after entry hook-->
	<?php chimps_single_after_entry(); ?>
	<!--End @Core index after entry hook-->


	</div>
</div><!--end container-->

<?php get_footer(); ?>