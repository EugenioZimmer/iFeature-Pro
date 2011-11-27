<?php

require( get_template_directory() . '/core/classy-options/classy-options-framework/classy-options-framework.php');

add_action('init', 'chimps_init_options');

function chimps_init_options() {

global $options, $themeslug, $themename, $themenamefull;
$options = new ClassyOptions($themename, $themenamefull." Options");

$carouselterms2 = get_terms('carousel_categories', 'hide_empty=0');

	$customcarousel = array();
                                    
    	foreach($carouselterms2 as $carouselterm) {

        	$customcarousel[$carouselterm->slug] = $carouselterm->name;

        }

$customterms2 = get_terms('slide_categories', 'hide_empty=0');

	$customslider = array();
                                    
    	foreach($customterms2 as $customterm) {

        	$customslider[$customterm->slug] = $customterm->name;

        }

$terms2 = get_terms('category', 'hide_empty=0');

	$blogoptions = array();
                                    
	$blogoptions['all'] = "All";

    	foreach($terms2 as $term) {

        	$blogoptions[$term->slug] = $term->name;

        }


$options
	->section("Welcome")
		->info("<h1>iFeature Pro 3</h1>
		<h2>A Different Kind of WordPress Theme</h2>
<strong>Introducing Drag &amp; Drop Page Elements. Intuitive New Theme Options. New Design.</strong>
<p>iFeature Pro 3 is one of the most advanced personal content management WordPress Themes in the world and now offers intuitive theme options which make using iFeature Pro even more personal and fun than ever before.</p>

<p>To get started simply work your way through the menus to the left, select your options, add your content, and always remember to hit save after making any changes.</p>

<p>We have moved many of your favorite options including the iFeature Pro Slider to the iFeature Pro Page Options which are available below the Page content entry area in WP-Admin when you edit a page. This way you can configure each page individually. You will also find the new Drag & Drop Page Elements editor within the new iFeature Pro Page Options as well.</p>

<p>If you are using the iFeature Pro Slider on a Page you can upload, and edit your slides from the iFeature Slides menu available in the WP-Admin menu to the far left. Look for the CyberChimps logo.</p>

<p>We tried to make iFeature Pro 3 as easy to use as possible, but if you still need help please read the <a href='http://cyberchimps.com/ifeaturepro/docs/' target='_blank'>documentation</a>, and visit our <a href='http://cyberchimps.com/forum/pro/' target='_blank'>support forum</a>.</p>

<p>Thank you for using iFeature Pro, a <a href='http://cyberchimps.com' target='_blank'>CyberChimps WordPress Theme</a>.</p>
")
	->section("Design")
		->open_outersection()
			->select($themeslug."_color_scheme", "Select a Color Scheme", array( 'options' => array("blue" => "Blue (default)", "black" => "Black", "green" => "Green", "grey" => "Grey", "orange" => "Orange", "pink" => "Pink", "red" => "Red", "white" => "White"), 'default' => 'blue'))
		->close_outersection()
		->subsection("Typopgraphy")
			->select($themeslug."_font", "Choose a Font", array( 'options' => array("Arial" => "Arial (default)", "Courier New" => "Courier New", "Georgia" => "Georgia", "Helvetica" => "Helvetica", "Lucida Grande" => "Lucida Grande", "Tahoma" => "Tahoma", "Times New Roman" => "Times New Roman", "Verdana" => "Verdana", "Actor" => "Actor", "Coda" => "Coda", "Maven+Pro" => "Maven Pro", "Metrophobic" => "Metrophobic", "News+Cycle" => "News Cycle", "Nobile" => "Nobile", "Tenor+Sans" => "Tenor Sans", "Quicksand" => "Quicksand", "Ubuntu" => "Ubuntu", 'custom' => "Custom")))
			->text($themeslug."_custom_font", "Enter a Custom Font")
						->textarea($themeslug."_typekit", "Enter your TypeKit Code")
		->subsection_end()
		->subsection("Background")
			->images($themeslug."_background_image", "Select a background", array( 'options' => array(  'dark' => TEMPLATE_URL . '/images/backgrounds/thumbs/dark.png', 'wood' => TEMPLATE_URL . '/images/backgrounds/thumbs/wood.png', 'default' => TEMPLATE_URL . '/images/backgrounds/thumbs/noise.png','space' => TEMPLATE_URL . '/images/backgrounds/thumbs/space.png', 'blue' => TEMPLATE_URL . '/images/backgrounds/thumbs/blue.png', 'metal' => TEMPLATE_URL . '/images/backgrounds/thumbs/metal.png' ), 'default' => 'default'))
			->checkbox($themeslug."_custom_background", "Toggle to use a custom background")
			->upload($themeslug."_background_upload", "Background Image")
			->radio($themeslug."_bg_image_position", "Select the Image Position", array( 'options' => array("top left" => "Left", "top center" => "Center", "top right" => "Right")))
			->radio($themeslug."_bg_image_repeat", "Select the Image Repeat", array( 'options' => array("repeat-x" => "No Repeat", "repeat" => "Tile", "repeat-x" => "Tile Horizontally", "repeat-y" => "Tile Vertically")))
			->radio($themeslug."_bg_image_attachment", "Select the Image Attachment", array( 'options' => array("scroll" => "Scroll", "fixed" => "Fixed")))
			->color($themeslug."_background_color", "Select a Background Color")
		->subsection_end()
		->subsection("Custom Colors")
			->color($themeslug."_menulink_color", "Menu Link Color")
			->color($themeslug."_sitetitle_color", "Site Title Color")
			->color($themeslug."_tagline_color", "Site Description Color")
			->color($themeslug."_link_color", "Link Color")
			->color($themeslug."_posttitle_color", "Post Title Color")
			->color($themeslug."_footer_color", "Footer Color")
		->subsection_end()
		->subsection("Custom CSS")
			->textarea($themeslug."_css_options", "Custom CSS")
		->subsection_end()
	->section("Header")
		->open_outersection()
		->checkbox($themeslug."_disable_header", "Toggle to show the header", array('default' => true))
		->close_outersection()
		->subsection("Header Options")
			->upload($themeslug."_logo", "Custom Logo")
			->checkbox($themeslug."_enable_header_contact", "Header Contact Area")
			->textarea($themeslug."_header_contact", "Enter Your Information")
			->checkbox($themeslug."_show_description", "Site Description")
			->text($themeslug."_icon_margin", "Social Icon Margin Top", array('default' => '10px'))
			->upload($themeslug."_favicon", "Custom Favicon")
			->checkbox($themeslug."_disable_breadcrumbs", "Breadcrumbs", array('default' => true))
		->subsection_end()
		->subsection("iMenu Options")
			->select($themeslug."_menu_font", "Choose a Menu Font", array( 'options' => array("Arial" => "Arial (default)", "Courier New" => "Courier New", "Georgia" => "Georgia", "Helvetica" => "Helvetica", "Lucida Grande" => "Lucida Grande", "Tahoma" => "Tahoma", "Times New Roman" => "Times New Roman", "Verdana" => "Verdana", "Actor" => "Actor", "Coda" => "Coda", "Maven+Pro" => "Maven Pro", "Metrophobic" => "Metrophobic", "News+Cycle" => "News Cycle", "Nobile" => "Nobile", "Tenor+Sans" => "Tenor Sans", "Quicksand" => "Quicksand", "Ubuntu" => "Ubuntu", 'custom' => "Custom")))
			->text($themeslug."_custom_menu_font", "Enter a Custom Menu Font")
			->color($themeslug."_custom_menu_color", "Custom Menu Color")
			->checkbox($themeslug."_hide_home_icon", "Home Icon", array('default' => true))
			->checkbox($themeslug."_hide_search", "Searchbar", array('default' => true))
		
		->subsection_end()
		->subsection("Social")
			->images($themeslug."_icon_style", "Icon set", array( 'options' => array( 'round' => TEMPLATE_URL . '/images/social/thumbs/icons-round.png', 'legacy' => TEMPLATE_URL . '/images/social/thumbs/icons-classic.png', 'default' =>
TEMPLATE_URL . '/images/social/thumbs/icons-default.png' ), 'default' => 'default' ) )
			->text($themeslug."_twitter", "Twitter Icon URL", array('default' => 'http://twitter.com'))
			->checkbox($themeslug."_hide_twitter", "Hide Twitter Icon", array('default' => true))
			->text($themeslug."_facebook", "Facebook Icon URL", array('default' => 'http://facebook.com'))
			->checkbox($themeslug."_hide_facebook", "Hide Facebook Icon" , array('default' => true))
			->text($themeslug."_gplus", "Google + Icon URL", array('default' => 'http://plus.google.com'))
			->checkbox($themeslug."_hide_gplus", "Hide Google + Icon" , array('default' => true))
			->text($themeslug."_flickr", "Flickr Icon URL", array('default' => 'http://flikr.com'))
			->checkbox($themeslug."_hide_flickr", "Hide Flickr Icon")
			->text($themeslug."_linkedin", "LinkedIn Icon URL", array('default' => 'http://linkedin.com'))
			->checkbox($themeslug."_hide_linkedin", "Hide LinkedIn Icon")
			->text($themeslug."_youtube", "YouTube Icon URL", array('default' => 'http://youtube.com'))
			->checkbox($themeslug."_hide_youtube", "Hide YouTube Icon")
			->text($themeslug."_googlemaps", "Google Maps Icon URL", array('default' => 'http://maps.google.com'))
			->checkbox($themeslug."_hide_googlemaps", "Hide Google maps Icon")
			->text($themeslug."_email", "Email Address")
			->checkbox($themeslug."_hide_email", "Hide Email Icon")
			->text($themeslug."_rsslink", "RSS Icon URL")
			->checkbox($themeslug."_hide_rss", "Hide RSS Icon" , array('default' => true))
		->subsection_end()
		->subsection("Tracking")
			->textarea($themeslug."_ga_code", "Google Analytics Code")
		->subsection_end()
	->section("Blog")
		->subsection("Blog Options")
			->images($themeslug."_blog_sidebar", "Select the Sidebar Type", array( 'options' => array("two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "none" => TEMPLATE_URL . '/images/options/none.png', "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($themeslug."_post_formats", "Post Format Icons",  array('default' => true))
			->checkbox($themeslug."_show_excerpts", "Post Excerpts")
			->text($themeslug."_excerpt_link_text", "Excerpt Link Text", array('default' => '(More)…'))
			->text($themeslug."_excerpt_length", "Excerpt Character Length", array('default' => '55'))
			->checkbox($themeslug."_show_featured_images", "Enable Featured Images")
			->select($themeslug."_featured_image_align", "Featured Image Alignment", array( 'options' => array("key1" => "Left", "key2" => "Center", "key3" => "Right")))
			->text($themeslug."_featured_image_height", "Featured Image Height", array('default' => '100'))
			->text($themeslug."_featured_image_width", "Featured Image Width", array('default' => '100'))
			->checkbox($themeslug."_show_carousel", "Enable Featured Post Carousel")
			->select($themeslug.'_carousel_category', 'Select the carousel category', array( 'options' => $customcarousel ))
			->multicheck($themeslug."_hide_byline", "Post Byline Elements", array( 'options' => array($themeslug."_hide_author" => "Author" , $themeslug."_hide_categories" => "Categories", $themeslug."_hide_date" => "Date", $themeslug."_hide_comments" => "Comments", $themeslug."_hide_share" => "Share", $themeslug."_hide_tags" => "Tags"), 'default' => array( $themeslug."_hide_tags" => true, $themeslug."_hide_share" => true, $themeslug."_hide_author" => true, $themeslug."_hide_date" => true, $themeslug."_hide_comments" => true, $themeslug."_hide_categories" => true ) ) )
			->checkbox($themeslug."_show_fb_like", "Facebook Like Button")
			->checkbox($themeslug."_show_gplus", "Google Plus One Button")
		->subsection_end()->subsection("Blog Slider")
			->checkbox($themeslug."_hide_slider_blog", "Index iFeatre Slider", array('default' => true))
			->select($themeslug."_slider_size", "Select the Slider Size", array( 'options' => array("key1" => "half", "key2" => "full")))
			->select($themeslug."_slider_type", "Select the Slider Type", array( 'options' => array("posts" => "posts", "custom" => "custom")))
			->select($themeslug.'_slider_category', 'Select the post category', array( 'options' => $blogoptions ))
			->select($themeslug.'_customslider_category', 'Select the custom slide category', array( 'options' => $customslider ))
			->text($themeslug."_slider_posts_number", "Number of Featured Blog Posts")
			->text($themeslug."_slider_height", "Slider height")
			->text($themeslug."_slider_delay", "Slider Delay")
			->select($themeslug."_caption_style", "Select the Caption Style", array( 'options' => array("key1" => "Bottom", "key2" => "Right", "key3" => "Left", "key4" => "None")))
			->select($themeslug."_slider_animation", "Select the Sidebar Animation", array( 'options' => array("key1" => "Random", "key2" => "sliceDown", "key3" => "sliceDownLeft", "key4" => "sliceUp", "key5" => "sliceUpLeft", "key6" => "sliceUpDown", "key7" => "sliceUpDownLeft", "key8" => "fold", "key9" => "fade", "key10" => "slideInRight", "key11" => "slideInLeft", "key12" => "boxRandom", "key13" => "boxRain", "key14" => "boxRainReverse", "key15" => "boxRainGrow", "key16" => "boxRainGrowReverse",)))
			->select($themeslug."_slider_nav", "Select the Slider Navigation", array( 'options' => array("key1" => "Dots", "key2" => "Thumbnails", "key3" => "none")))
			->checkbox($themeslug."_hide_slider_arrows", "Slider Navigation", array('default' => true))
			->checkbox($themeslug."_disable_nav_autohide", "Slider Navigation Auto-Hide", array('default' => true))
			->checkbox($themeslug."_enable_wordthumb", "WordThumb Image Resizing")
		->subsection_end()->subsection("SEO")
			->textarea($themeslug."_home_description", "Home Description")
			->textarea($themeslug."_home_keywords", "Home Keywords")
			->text($themeslug."_home_title", "Optional Home Title")
		->subsection_end()
	
	->section("Footer")
		->open_outersection()
			->checkbox($themeslug."_disable_footer", "Toggle to enable the footer", array('default' => true))
			->text($themeslug."_footer_text", "Footer Copyright Text")
			->checkbox($themeslug."_hide_link", "Hide CyberChimps Link")
		->close_outersection()
	->section("Import / Export")
		->open_outersection()
			->export("Export Settings")
			->import("Import Settings")
		->close_outersection()
;
}
