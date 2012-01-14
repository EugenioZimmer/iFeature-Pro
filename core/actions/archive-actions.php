<?php
/**
* Archive actions used by the CyberChimps Core Framework 
*
* Author: Tyler Cunningham
* Copyright: © 2011
* {@link http://cyberchimps.com/ CyberChimps LLC}
*
* Released under the terms of the GNU General Public License.
* You should have received a copy of the GNU General Public License,
* along with this software. In the main directory, see: /licensing/
* If not, see: {@link http://www.gnu.org/licenses/}.
*
* @package Core
* @since 1.0
*/

/**
* Core archive actions
*/
add_action( 'chimps_archive_title', 'chimps_archive_page_title' );
add_action( 'chimps_archive', 'chimps_archive_loop' );

add_action( 'chimps_archive_post_tags', 'chimps_archive_post_tags_content' );

add_action( 'chimps_archive_post_byline', 'chimps_archive_post_byline_content' );

/**
* Sets up the tag area
*
* @since 1.0
*/
function chimps_archive_post_tags_content() {
	global $options, $themeslug; 
	$hidden = $options->get($themeslug.'_archive_hide_byline'); ?>

	<?php if (has_tag() AND ($hidden[$themeslug.'_archive_hide_tags']) != '0'):?>
	<div class="tags">
			<?php the_tags('Tags: ', ', ', '<br />'); ?>
		
	</div><!--end tags--> 
	<?php endif;
}

/**
* Sets the post byline information (author, date, category). 
*
* @since 1.0
*/
function chimps_archive_post_byline_content() {
	global $options, $themeslug; //call globals.  
	$hidden = $options->get($themeslug.'_archive_hide_byline');?>
	
	<div class="meta">
		<?php if (($hidden[$themeslug.'_archive_hide_date']) != '0'):?> <?php printf( __( 'Published on', 'core' )); ?> <a href="<?php the_permalink() ?>"><?php the_time('F jS, Y') ?></a><?php endif;?>
		<?php if (($hidden[$themeslug.'_archive_hide_author']) != '0'):?><?php printf( __( 'by', 'core' )); ?> <?php the_author_posts_link(); ?> <?php endif;?> 
		<?php if (($hidden[$themeslug.'_archive_hide_categories']) != '0'):?><?php printf( __( 'in', 'core' )); ?> <?php the_category(', ') ?> <?php endif;?>
	</div> <?php
}


/**
* Output archive page title based on archive type. 
*
* @since 1.0
*/
function chimps_archive_page_title() { 
	global $post; ?>
	
		<?php if (is_category()) { ?>
			<h2 class="archivetitle"><?php printf( __( 'Archive for the &#8216;', 'core' )); ?><?php single_cat_title(); ?><?php printf( __( '&#8217; Category:', 'core' )); ?></h2><br />

		<?php } elseif( is_tag() ) { ?>
			<h2 class="archivetitle"><?php printf( __( 'Posts Tagged &#8216;', 'core' )); ?><?php single_tag_title(); ?><?php printf( __( '&#8217;:', 'core' )); ?></h2><br />

		<?php } elseif (is_day()) { ?>
			<h2 class="archivetitle"><?php printf( __( 'Archive for', 'core' )); ?> <?php the_time('F jS, Y'); ?>:</h2><br />

		<?php } elseif (is_month()) { ?>
			<h2 class="archivetitle"><?php printf( __( 'Archive for', 'core' )); ?> <?php the_time('F, Y'); ?>:</h2><br />

		<?php } elseif (is_year()) { ?>
			<h2 class="archivetitle"><?php printf( __( 'Archive for:', 'core' )); ?> <?php the_time('Y'); ?>:</h2><br />

		<?php } elseif (is_author()) { ?>
			<h2 class="archivetitle"><?php printf( __( 'Author Archive:', 'core' )); ?></h2><br />

		<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h2 class="archivetitle"><?php printf( __('Blog Archives:', 'core' )); ?></h2><br />
	
		<?php } 
}

/**
* Archive page loop. 
*
* @since 1.0
*/
function chimps_archive_loop($content) { 
	global $options, $themeslug, $post; //call globals
	
	if (get_post_format() == '') {
		$format = "default";
	}
	else {
		$format = get_post_format();
	}
?>
	<div class="post_container">
			
		<div <?php post_class() ?>>
		
		<?php ob_start(); ?>
		
		<?php if ($options->get($themeslug.'_archive_post_formats') != '0') : ?>
			<div class="postformats"><!--begin format icon-->
				<img src="<?php echo get_template_directory_uri(); ?>/images/formats/<?php echo $format ;?>.png" alt="formats" />
			</div><!--end format-icon-->
			<?php endif; ?>

				
			<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				
				<!--Begin @Core post tags hook-->
					<?php chimps_archive_post_byline(); ?>
				<!--Begin @Core post tags hook-->
						
					<div class="entry">
							<?php 
						if ($options->get($themeslug.'_archive_show_excerpts') == '1') {
							the_excerpt();
						}
						else {
							the_content();
						}
					 ?>
					</div>
					
			<?php	
				$content = ob_get_clean();
				$content = apply_filters( 'chimps_post_formats_'.$format.'_content', $content );
	
				echo $content; 
			?>
			
				<!--Begin @Core FB like hook-->
					<?php chimps_fb_like_plus_one(); ?>
				<!--End @Core FB like hook-->
				
				<!--Begin @Core post tags hook-->
					<?php chimps_archive_post_tags(); ?>
				<!--End @Core post tags hook-->	
				
				<!--Begin @iFeature post bar hook-->
					<?php ifeature_archive_post_bar(); ?>
				<!--End @iFeature post bar hook-->					
							
		</div><!--end post-->
				
	</div><!--end post_container-->
			
<?php }


/**
* End
*/

?>