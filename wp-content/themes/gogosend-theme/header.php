<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gogosend-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<header>
			<section class="navigation">
				<div class="nav-container">
					<div class="brand">
						<?php the_custom_logo(); ?>
					</div>
					<nav>
						<div class="nav-mobile">
							<a id="nav-toggle" href="#!"><span></span></a>
						</div>
						<?php
				$args = array(
					'container' => 'ul',
					'menu_class' => 'nav-list',
					'menu' => '(primary-menu)'
				);
				wp_nav_menu( $args ); ?>
					</nav>
				</div>
			</section>
		</header><!-- #masthead -->