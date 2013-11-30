<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<!-- Use the .htaccess and remove these lines to avoid edge case issues.
       More info: h5bp.com/i/378 -->
<!--[if IE ]> 
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<title>
<?php wp_title('&laquo;', true, 'right'); ?>
<?php bloginfo('name'); ?>
</title>

<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo( 'template_url' ); ?>/favicon.ico" />

<!-- Mobile viewport optimized: h5bp.com/viewport -->

<meta name="keywords" content="<?php bloginfo('description'); ?>" />
<meta name="viewport" content="width=device-width">

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" type="text/css"/>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/js/flexslider/flexslider.css" type="text/css">
<link href="<?php bloginfo('template_directory'); ?>/js/selectbox/css/sexy-combo.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('template_directory'); ?>/js/selectbox/css/sexy-combo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
<link type="text/css" href="<?php bloginfo('template_directory'); ?>/js/jScrollPane/jquery.jscrollpane.css" rel="stylesheet" media="all" />

<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/bootstrap.min.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/layout.css" type="text/css" media="screen" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_single() ) { ?>

  <meta property="og:url" content="<?php the_permalink() ?>"/>
  <meta property="og:title" content="<?php single_post_title(''); ?>" />
  <meta property="og:description" content="<?php echo strip_tags(get_excerpt_by_id($post_id)); ?> [...]" />
  <meta property="og:type" content="article" />

	<?php 
		$images =& get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );
		if ($images) {
		  $keys = array_keys($images);
		  $num = $keys[0];
		  $firstImageSrc = wp_get_attachment_thumb_url($num);
		?>
			
			<?php if(has_post_thumbnail()) { ?>
			 
        
				<?php
				global $wp_query;
				$thePostID = $wp_query->post->ID;
				if( has_post_thumbnail( $thePostID )){
          
          $thumb_id = get_post_thumbnail_id($thePostID);
          $thumb_url = wp_get_attachment_image_src($thumb_id,'medium', true);

          ?>

          
          <meta property="og:image" content="<?php echo $thumb_url[0] ?>" />

        <?php } ?>

			<?php } else { ?>

          <meta property="og:image" content="<?php echo $firstImageSrc ?>" />
			
			<?php } ?>

		  
	<?php } else { ?>
		
    <meta property="og:image" content="<?php bloginfo( 'template_url' ); ?>/images/logo-facebook-icon.jpg" />
		
	<?php } ?>


<?php } else { ?>

	<meta property="og:url" content="<?php echo get_option('home'); ?>/"/>
	<meta property="og:title" content="<?php bloginfo('name'); ?>" />
	<meta property="og:description" content="<?php bloginfo('description'); ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:image" content="<?php bloginfo( 'template_url' ); ?>/images/logo-facebook-icon.jpg" />

<?php } ?>

<?php wp_head(); ?>

<!--[if IE ]>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie-only.css" type="text/css" media="screen" />
<![endif]-->

<!--[if (gte IE 6)&(lte IE 8)]>
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/selectivizr-min.js"></script>
<![endif]-->

<script src="<?php bloginfo('template_directory'); ?>/js/modernizr.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/head.min.js"></script>
<script>
    var directory = "<?php echo get_template_directory_uri(); ?>",
        baseUrl = "<?php echo get_option('home'); ?>";
</script>
<!--Display Google Analytics, etc.-->
<?php
   echo get_option('omr_tracking_code');
?>

</head>
<body <?php body_class(); ?>>

	
<!-- Start wrapper -->	
<div class="default wrapper <?php if ( is_single() ) { ?><?php
		$category = get_the_category(); 
		echo $category[0]->category_nicename;
		?><?php }  ?>">
	<header class="header">
		<div class="clearfix header_inner">
			<h1 class="logo_image">
				<a title="<?php bloginfo('name'); ?>" href="<?php echo get_option('home'); ?>/">
					<?php /* ?>
					<?php $wptuts_options = get_option('theme_wptuts_options'); ?>  
	  
		            <?php if ( $wptuts_options['logo'] != '' ): ?>  
		                <div id="logo">  
		                    <img src="<?php echo $wptuts_options['logo']; ?>" />  
		                </div>  
		            <?php endif; ?> 
		            <?php */ ?>
					
					<img class="image_no_margin" alt="<?php bloginfo('name'); ?>" src="<?php bloginfo( 'template_directory' ); ?>/images/logo.jpg" />
					
					<?php /*
					<img class="image_svg" src="<?php bloginfo( 'template_directory' ); ?>/images/logo.svg" class="logo" alt="<?php bloginfo('name'); ?>">
					*/ ?>
					
				</a>
			</h1>

			<nav id="nav" class="nav clearfix">
				<?php //wp_nav_menu( array('menu' => 'Main menu' )); ?>
				<?php //wp_page_menu('show_home=1&menu_class=clearfix menu'); ?>
                <?php wp_nav_menu( array('menu' => 'nav_top' )); ?>
			</nav>
			
		</div>
	</header>
<!-- Start content -->
<div class="clearfix content<?php if ( is_page('your page') ) { ?>my-page<?php }  ?>">
	<div class="clearfix content_inner">


