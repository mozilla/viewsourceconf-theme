<?php
/**
 * The header for our theme.
 *
 * @package view_source
 */
    ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!--
         _.-~-.
       7''  Q..\
    _7         (_
  _7  _/    _q.  /
_7 . ___  /VVvv-'_                                            .
7/ / /~- \_\\      '-._     .-'                      /       //
./ ( /-~-/||'=.__  '::. '-~'' {             ___   /  //     ./{
V   V-~-~| ||   __''_   ':::.   ''~-~.___.-'' _/  // / {_   /  {  /
VV/-~-~-|/ \ .'__'. '.    '::                     _ _ _        ''.
/ /~~~~||VVV/ /  \ )  \        _ __ ___   ___ ___(_) | | __ _   .::'
/ (~-~-~\\.-' /    \'   \::::. | '_ ` _ \ / _ \_  / | | |/ _` | :::'
/..\    /..\__/      '     '::: | | | | | | (_) / /| | | | (_| | ::'
vVVv    vVVv                 ': |_| |_| |_|\___/___|_|_|_|\__,_| ''

Hi there, nice to meet you!

Interested in having a direct impact on hundreds of millions of users? Join
Mozilla, and become part of a global community that’s helping to build a
brighter future for the Web.

Visit https://careers.mozilla.org to learn about our current job openings.
Visit https://www.mozilla.org/contribute for more ways to get involved and
help support Mozilla.
-->

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
    <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'view_source' ); ?></a>

    <header id="masthead" class="site-header" style="background:url(<?php echo get_template_directory_uri();?>/images/sky.png) no-repeat top center;background-size:cover;height:90vh;width:100%;position:relative;">
      <div class="header-top" style="width:900px;max-width:100%;margin:0 auto;position:relative;">
        <div class="site-title logo">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <?php echo file_get_contents( get_template_directory_uri() . '/images/branding.svg' );?>
          </a>
        </div>

        <a id="responsive-menu" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" href="#sidr"><?php _e('Menu', 'view_source') ?></a>

        <nav id="site-navigation" class="main-navigation" role="navigation">
          <ul class="social-media">
            <li><a href="<?php esc_html_e( get_theme_mod( 'twitter' ) );?>" target="_blank" class="twitter"><? _e('Twitter', 'view_source') ?></a></li>
            <li><a href="<?php esc_html_e( get_theme_mod( 'facebook' ) );?>" target="_blank" class="facebook"><? _e('Facebook', 'view_source') ?></a></li>
          </ul>

          <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'light-menu' ) ); ?>

          <?php view_source_registration_link()?>
        </nav><!-- #site-navigation -->

      </div><!-- .header-top -->

      <div class="date"><?php _e( '2-4 November 2015' );?></div>

      <h2 class="description"><?php bloginfo( 'description' ); ?></h2>

      <div class="mountains" style="background: url(<?php echo get_template_directory_uri();?>/images/mountains.png) no-repeat top center;background-size:cover;height:90vh;width:100%;position:absolute;top:0;"></div>
    </header><!-- #masthead -->

    <div id="main" class="main remodal-bg">
