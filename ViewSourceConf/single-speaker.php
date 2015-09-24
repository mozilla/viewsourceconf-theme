<?php
  /**
   * The template for displaying archive pages.
   *
   * Learn more: http://codex.wordpress.org/Template_Hierarchy
   *
   * @package view_source
   */

  get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
          <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header><!-- .entry-header -->
        <div class="featured-image">
          <?php echo get_the_post_thumbnail( get_the_ID() );?>
        </div>
        <div class="entry-content">
          <?php the_content(); ?>
        </div><!-- .entry-content -->

      </article><!-- #post-## -->
      <?php endwhile; ?>
    <?php endif; ?>

  </main><!-- #main -->

</div><!-- #primary -->

<?php get_footer(); ?>
