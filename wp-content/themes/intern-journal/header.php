<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Intern_Journal
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php
		$image = get_field('image_teaser');
		$lead_text = get_field('lead_text');
	?>
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?php echo get_bloginfo(); ?> — <?php echo the_title(); ?>" />
	<?php if( !empty($lead_text) ): ?>
	<meta property="og:description" content="<?php echo $lead_text; ?>" />
	<?php endif; ?>

	<?php if( !empty($image) ): ?>
	<meta property="og:image" content="<?php echo $image['url']; ?>" />
	<meta property="og:image:width" content="<?php echo $image['width']; ?>" />
	<meta property="og:image:height" content="<?php echo $image['height']; ?>" />
	<?php endif; ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>



	<header id="masthead" class="header container">
		<div class="container">
			<div class="column">
				<!-- nav id="site-navigation" class="main-navigation">
					<?php
					// wp_nav_menu( array(
					// 	'theme_location' => 'menu-1',
					// 	'menu_id'        => 'primary-menu',
					// ) );
					?>
				</nav --><!-- #site-navigation -->
				<?php
				// the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
					<?php
				else :
					?>
					<nav>
						<ul>
							<li>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
							</li>
					</ul>
				</nav>
					<?php
				endif;
				?>

				<?php
				// $intern_journal_description = get_bloginfo( 'description', 'display' );
				if (0): //( $intern_journal_description || is_customize_preview() ) :
				?>
					<p class="site-description"><?php echo $intern_journal_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>

			</div>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->

