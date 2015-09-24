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
    <?php
    $posts = get_field( 'vs_scheduled_sessions' );
    var_dump($posts);
    if( $posts ): ?>
    <?php foreach( $posts as $post ): // variable must be called $post (IMPORTANT)?>
        <?php setup_postdata( $post );?>
        <ul>
          <li class="time">
            <time>
              <?php the_field('vs_session_time'); ?>
            </time>
          </li>
          <li class="featured-image">
            <?php echo get_the_post_thumbnail( $post->ID );?>
          </li>
          <li class="session-info">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </li>
        </ul>
    <?php endforeach; ?>
    <a class="button" href="/session">See Full Schedule</a>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>

  </main><!-- #main -->

</div><!-- #primary -->

<?php get_footer(); ?>
