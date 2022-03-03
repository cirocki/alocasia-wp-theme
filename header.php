<?php

/**
 * The header for our theme
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 */

?>

<?php get_template_part('head'); ?>


<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'alocasia_theme'); ?></a>
		<header class="main-header">
			<div class="container">
				<div class="menu-wrapper">

					<div class="top-part">
						<div class="branding-wrapper">
							<a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
								<img src="<?php echo  get_theme_file_uri(); ?>/assets/images/tdsk_logo_white.svg" alt="<?php bloginfo('name'); ?> logo">
							</a>
						</div>
						<div class="hamburger-wrapper">
							<div id="navbar-toggler" aria-expanded="false" aria-label="Toggle navigation" class="hamburger hamburger--spin js-hamburger ">
								<div class="hamburger-box">
									<div class="hamburger-inner">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="bot-part">
						<nav class="nav-primary">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'menu-primary-menu',
								)
							);
							?>
						</nav>
						<div class="more-info">
							<!-- You can use this place to show phone or socials. -->
						</div>
					</div>
				</div>
			</div>
		</header>