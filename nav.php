<?php
/*

	Section: Navigation
	Author: Tyler Cunningham
	Description: Creates site navigation
	Version: 0.1
	
*/
/* Call globals. */	

	global $themename, $themeslug, $options;

/* End globals. */	

/* Define variables. */	

	$homeimage		= $options['file3'];

/* End variable definition. */

?>

<?php 
				
	if ($options[$themeslug.'_menu_color'] == "") {
		$menucolor = 'Grey';
	}
	else {
		$menucolor = $options[($themeslug.'_menu_color')]; 
	}	
?>		

<div class="row" style="background-color: #000;">

  	<div class="ninecol">
        <?php wp_nav_menu( array(
	    'theme_location' => 'header-menu', // Setting up the location for the main-menu, Main Navigation.
	    'menu_class' => 'sf-menu', //Adding the class for dropdowns
	    'container_id' => 'navwrap', //Add CSS ID to the containter that wraps the menu.
	    'fallback_cb' => 'menu_fallback', //if wp_nav_menu is unavailable, WordPress displays wp_page_menu function, which displays the pages of your blog.
	    )
	);
    ?>
    </div>
	
	<div class="threecol last">
				<?php get_search_form(); ?>
		</div>
	
</div>
 
<!--end nav.php-->