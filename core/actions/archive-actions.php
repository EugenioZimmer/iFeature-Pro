<?php
/**
* Archive actions used by iFeature
*
* Author: Tyler Cunningham
* Copyright: © 2012
* {@link http://cyberchimps.com/ CyberChimps LLC}
*
* Released under the terms of the GNU General Public License.
* You should have received a copy of the GNU General Public License,
* along with this software. In the main directory, see: /licensing/
* If not, see: {@link http://www.gnu.org/licenses/}.
*
* @package iFeature
* @since 5.0
*/

/**
* Synapse archive actions
*/
add_action( 'synapse_archive_title', 'synapse_archive_page_title' );

/**
* Output archive page title based on archive type. 
*
* @since 1.0
*/
function synapse_archive_page_title() { 
	global $post; ?>
	
		<?php if (is_category()) { ?>
			<h2 class="archivetitle"><?php printf( __( 'Archive for the &#8216;', 'ifeature' )); ?><?php single_cat_title(); ?><?php printf( __( '&#8217; Category:', 'ifeature' )); ?></h2><br />

		<?php } elseif( is_tag() ) { ?>
			<h2 class="archivetitle"><?php printf( __( 'Posts Tagged &#8216;', 'ifeature' )); ?><?php single_tag_title(); ?><?php printf( __( '&#8217;:', 'ifeature' )); ?></h2><br />

		<?php } elseif (is_day()) { ?>
			<h2 class="archivetitle"><?php printf( __( 'Archive for', 'ifeature' )); ?> <?php the_time('F jS, Y'); ?>:</h2><br />

		<?php } elseif (is_month()) { ?>
			<h2 class="archivetitle"><?php printf( __( 'Archive for', 'ifeature' )); ?> <?php the_time('F, Y'); ?>:</h2><br />

		<?php } elseif (is_year()) { ?>
			<h2 class="archivetitle"><?php printf( __( 'Archive for:', 'ifeature' )); ?> <?php the_time('Y'); ?>:</h2><br />

		<?php } elseif (is_author()) { ?>
			<h2 class="archivetitle"><?php printf( __( 'Author Archive:', 'ifeature' )); ?></h2><br />

		<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h2 class="archivetitle"><?php printf( __('Blog Archives:', 'ifeature' )); ?></h2><br />
	
		<?php } 
}

/**
* End
*/

?>