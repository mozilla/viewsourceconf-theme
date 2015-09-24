<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package view_source
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
  return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
  <?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
