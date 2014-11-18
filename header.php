<!DOCTYPE html>
<!--[if lt IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie6 lt-ie7 lt-ie8 lt-ie9"><![endif]-->
<!--[if IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie7 lt-ie8 lt-ie9"><![endif]-->
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="no-js ie ie8 lt-ie9"><![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="no-js ie ie9 lt-ie10"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( ' | ', true, 'right' ); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="wrapper" class="hfeed">
		<header id="header" role="banner">
			<section class="head-inner inner">
				<div id="site-title">
				<?php if ( is_front_page() ) { echo '<h1>'; } ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name' ), 'ashdown' ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
				<?php if ( is_front_page() ) { echo '</h1>'; } ?>
				<?php if(get_bloginfo('description') <> '') { ?>
					<div id="site-description"><?php bloginfo( 'description' ); ?></div>
				<?php } ?>
				</div>
				<nav id="menu" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
				</nav>
			</section>
		</header>