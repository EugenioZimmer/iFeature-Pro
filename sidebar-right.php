<div id="sidebar_right">
	<div id="sidebar240">

    <?php if (dynamic_sidebar('Sidebar Right')) : else : ?>
    
        <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->
    
		<div class="sidebar-widget-style">    
		<h2 class="sidebar-widget-title">Sidebar Right</h2>
    	<ul>
						<li>Thank you for purchasing iFeature Pro.</li>
						<li>&nbsp;</li>
						<li>To remove this Widget login to your admin account, go to Appearance, then Widgets and drag new widgets into Sidebar Right.</li>
						<li>&nbsp;</li>
						<li>We designed iFeature Pro to be as user friendly as possible, if you do run into trouble we provide a <a href="http://cyberchimps.com/forum">free support forum</a>, and <a href="http://www.cyberchimps.com/ifeature-pro/docs/">precise documentation</a>.</li>
						<li>&nbsp;</li>
						<li>If we were all designers then every WordPress theme would look this good.</li>
					</ul>
    	</div>
		
		<div class="sidebar-widget-style">
    	<h2 class="sidebar-widget-title"><?php printf( __( 'Archives', 'ifeature' )); ?></h2>
    	<ul>
    		<?php wp_get_archives('type=monthly'); ?>
    	</ul>
    	</div>
        
        <div class="sidebar-widget-style">
        <h2 class="sidebar-widget-title"><?php printf( __('Categories', 'ifeature' )); ?></h2>
        <ul>
    	   <?php wp_list_categories('show_count=1&title_li='); ?>
        </ul>
        </div>
        
    	<div class="sidebar-widget-style">
    	<h2 class="sidebar-widget-title"><?php printf( __('WordPress', 'ifeature' )); ?></h2>
    	<ul>
    		<?php wp_register(); ?>
    		<li><?php wp_loginout(); ?></li>
    		<li><a href="<?php echo esc_url( __('http://wordpress.org/', 'ifeature' )); ?>" target="_blank" title="<?php esc_attr_e('Powered by WordPress, state-of-the-art semantic personal publishing platform.', 'ifeature'); ?>"> <?php printf( __('WordPress', 'ifeature' )); ?></a></li>
    		<?php wp_meta(); ?>
    	</ul>
    	</div>
	
	<?php endif; ?>
	</div><!--end sidebar150-->
</div><!--end sidebar_right-->