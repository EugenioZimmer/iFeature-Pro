<?php 

/*
	404
	Creates the iFeature 404 page.
	Copyright (C) 2011 CyberChimps
*/

/* Header call. */

	get_header(); 
	
/* End header. */

?>

<div id="content_wrap">
	<div id="content_left">
		<div class="content_padding">
      
      <?php chimps_404(); ?>
		</div><!--end content_padding-->
		
	</div><!--end content_left-->

	<div id="sidebar_right">
		<?php get_sidebar(); ?>
	</div>
	
</div><!--end content_wrap-->
<div style=clear:both;></div><!--clear-->

<?php get_footer(); ?>