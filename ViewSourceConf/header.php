<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
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

    <div id="main" class="main">
      <header id="page-header" class="page-header">
          <div class="branding" style="width:243px;height: auto;">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
              <?php echo file_get_contents( get_template_directory_uri() . '/assets/images/branding.svg' );?>
            </a>
          </div>

          <a id="responsive-menu" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" href="#sidr"><? _e('Menu', 'view_source') ?></a>

          <nav id="site-navigation" class="main-navigation" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'light-menu' ) ); ?>
            <?php view_source_registration_link()?>
          </nav><!-- #site-navigation -->
          <hr>
      </header>
