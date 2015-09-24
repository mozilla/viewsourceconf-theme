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

			<header class="page-header">
				<h1><?php _e( 'Sponsors', 'view_source' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

						<?php if ( 'post' == get_post_type() ) : ?>
							<div class="entry-meta">
								<?php view_source_posted_on(); ?>
							</div><!-- .entry-meta -->
						<?php endif; ?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php
							the_content( sprintf(
							             /* translators: %s: Name of current post. */
								             wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'view_source' ), array( 'span' => array( 'class' => array() ) ) ),
								             the_title( '<span class="screen-reader-text">"', '"</span>', false )
							             ) );
						?>

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


			<?php endwhile; ?>

			<?php //the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

	</main><!-- #main -->

</div><!-- #primary -->

<?php get_footer(); ?>
