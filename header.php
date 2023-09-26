<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ringray-films
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

    <div class="wrapper-header">

        <header id="masthead" class="site-header">
            <div class="site-branding">
                <?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo(); } ?>
            </div>

            <div class="hr-articaft"></div>

            <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu"
                    aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'ringray-films' ); ?></button>

                <?php wp_nav_menu(
				array(
					'theme_location'  => 'menu-1',
					'menu_id'         => 'primary-menu',
					'container_class' => 'main-menu-container',
					'menu_class'      => 'navbar-nav',
	) ); ?>
            </nav>

            <div class="switcher">
                <ul>
                    <?php pll_the_languages( 
		[
			'show_flags' => 1,
			'show_names' => 0,
			'dropdown' => 1

		] 
		); ?>
                </ul>
            </div>



        </header>

        <div class="video-wrapper">

            <div class="inner">
                <h2>Slika + Naslov videa</h2>
            </div>


            <video id="video-bg" autoplay loop muted poster="https://assets.codepen.io/6093409/river.jpg">
                <source src="<?= wp_get_attachment_url(88); ?>" type="video/mp4">
            </video>
        </div>

        <hr class="art-blue">

    </div>


    <div id="page" class="site <?= is_front_page() ? 'frontpage' : '';?>">
        <a class="skip-link screen-reader-text"
            href="#primary"><?php esc_html_e( 'Skip to content', 'ringray-films' ); ?></a>