<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package view_source
 */

?>
  </div>
    <footer id="colophon" class="site-footer" role="contentinfo">
      <div class="footer-content">
        <h2><?php _e( 'Sponsored By', 'view_source' );?></h2>
        <?php get_template_part( 'template-parts/content', 'footer' );?>
        <div class="site-info">
          <?php get_template_part( 'template-parts/content', 'footer-nav' );?>
        </div><!-- .site-info -->
      </div>
    </footer><!-- #colophon -->
  </div><!-- #page -->

  <?php get_template_part( 'template-parts/content', 'sidr' );?>

  <div id="dragon">
    <button type="button" id="thar-she-goes"><?php _e('Close', 'view_source') ?></button>
    <pre>
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
    </pre>
  </div>

  <?php wp_footer(); ?>

  </body>
</html>
