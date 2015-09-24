<?php
	/**
	 * The template for displaying all single posts.
	 *
	 * @package view_source
	 */

	get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php the_content(); ?>
					<?php
						wp_link_pages( array(
							               'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'view_source' ),
							               'after'  => '</div>',
						               ) );
					?>
				</div><!-- .entry-content -->

				<footer class="entry-footer">
					<?php view_source_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			</article><!-- #post-## -->



			<?php the_post_navigation(); ?>

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->


<?php get_footer(); ?>
