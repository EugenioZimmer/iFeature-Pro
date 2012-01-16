<?php
/**
* Sidebar section actions used by the CyberChimps Core Framework Pro Extension
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
* @package Pro
* @since 1.0
*/

add_action( 'chimps_sidebar_init', 'chimps_sidebar_init_content' );
add_action( 'chimps_before_content_sidebar', 'chimps_before_content_sidebar_markup' );
add_action( 'chimps_after_content_sidebar', 'chimps_after_content_sidebar_markup' );


/**
* Set sidebar and grid variables.
*
* @since 1.0
*/
function chimps_sidebar_init_content() {

	global $options, $themeslug, $post, $sidebar, $content_grid;
	
	if (is_single()) {
	$sidebar = $options->get($themeslug.'_single_sidebar');
	}
	if (is_archive()) {
	$sidebar = $options->get($themeslug.'_archive_sidebar');
	}
	if (is_search()) {
	$sidebar = $options->get($themeslug.'_search_sidebar');
	}
	if (is_front_page()) {
	$sidebar = $options->get($themeslug.'_blog_sidebar');
	}
	if (is_page()) {
	$sidebar = get_post_meta($post->ID, 'page_sidebar' , true);
	}
	
	if ($sidebar == 'two-right' OR $sidebar == 'right-left' ) {
		$content_grid = 'six columns';
	}
	elseif ($sidebar == 'none' ) {
		$content_grid = 'twelve columns';
	}
	else {
		$content_grid = 'eight columns';
	}
}

/**
* Before entry sidebar
*
* @since 1.0
*/
function chimps_before_content_sidebar_markup() { 
	global $options, $themeslug, $post, $sidebar; // call globals ?>
				
	<?php if ($sidebar == 'right-left' OR $sidebar == "2"): ?>
	<div id="sidebar" class="three columns">
		<?php get_sidebar('left'); ?>
	</div>
	<?php endif; ?>
	
	<?php if ($sidebar == 'left' OR $sidebar == "4"): ?>
	<div id="sidebar" class="four columns">
		<?php get_sidebar(); ?>
	</div>
	<?php endif;
}

/**
* After entry sidebar
*
* @since 1.0
*/
function chimps_after_content_sidebar_markup() {
	global $options, $themeslug, $post, $sidebar; // call globals ?>
	
	<?php if ($sidebar == 'right' OR $sidebar == '' ): ?>
	<div id="sidebar" class="four columns">
		<?php get_sidebar(); ?>
	</div>
	<?php endif;?>
	
	<?php if ($sidebar == 'two-right' OR  $sidebar == '1' ): ?>
	<div id="sidebar" class="three columns">
		<?php get_sidebar('left'); ?>
	</div>
	<?php endif;?> 
	
	<?php if ($sidebar == 'two-right' OR $sidebar == 'right-left' OR $sidebar == '1' OR $sidebar == '2'): ?>
	<div id="sidebar" class="three columns">
		<?php get_sidebar('right'); ?>
	</div>
	<?php endif;?> <?php 
}

/**
* End
*/

?>