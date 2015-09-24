<?php
	/**
	 * Custom template tags for this theme.
	 *
	 * Eventually, some of the functionality here could be replaced by core features.
	 *
	 * @package view_source
	 */

	if ( !function_exists ( 'the_posts_navigation' ) ) :
		/**
		 * Display navigation to next/previous set of posts when applicable.
		 *
		 * @todo Remove this function when WordPress 4.3 is released.
		 */
		function the_posts_navigation () {
			// Don't print empty markup if there's only one page.
			if ( $GLOBALS[ 'wp_query' ]->max_num_pages < 2 ) {
				return;
			}
			?>
			<nav class="navigation posts-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e ( 'Posts navigation', 'view_source' ); ?></h2>

				<div class="nav-links">

					<?php if ( get_next_posts_link () ) : ?>
						<div
							class="nav-previous"><?php next_posts_link ( esc_html__ ( 'Older posts', 'view_source' ) ); ?></div>
					<?php endif; ?>

					<?php if ( get_previous_posts_link () ) : ?>
						<div
							class="nav-next"><?php previous_posts_link ( esc_html__ ( 'Newer posts', 'view_source' ) ); ?></div>
					<?php endif; ?>

				</div>
				<!-- .nav-links -->
			</nav><!-- .navigation -->
			<?php
		}
	endif;

	if ( !function_exists ( 'the_post_navigation' ) ) :
		/**
		 * Display navigation to next/previous post when applicable.
		 *
		 * @todo Remove this function when WordPress 4.3 is released.
		 */
		function the_post_navigation () {
			// Don't print empty markup if there's nowhere to navigate.
			$previous = ( is_attachment () ) ? get_post ( get_post ()->post_parent ) : get_adjacent_post ( false, '', true );
			$next     = get_adjacent_post ( false, '', false );

			if ( !$next && !$previous ) {
				return;
			}
			?>
			<nav class="navigation post-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e ( 'Post navigation', 'view_source' ); ?></h2>

				<div class="nav-links">
					<?php
						previous_post_link ( '<div class="nav-previous">%link</div>', '%title' );
						next_post_link ( '<div class="nav-next">%link</div>', '%title' );
					?>
				</div>
				<!-- .nav-links -->
			</nav><!-- .navigation -->
			<?php
		}
	endif;

	if ( !function_exists ( 'view_source_posted_on' ) ) :
		/**
		 * Prints HTML with meta information for the current post-date/time and author.
		 */
		function view_source_posted_on () {
			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
			if ( get_the_time ( 'U' ) !== get_the_modified_time ( 'U' ) ) {
				$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
			}

			$time_string = sprintf ( $time_string, esc_attr ( get_the_date ( 'c' ) ), esc_html ( get_the_date () ), esc_attr ( get_the_modified_date ( 'c' ) ), esc_html ( get_the_modified_date () )
			);

			$posted_on = sprintf ( esc_html_x ( 'Posted on %s', 'post date', 'view_source' ), '<a href="' . esc_url ( get_permalink () ) . '" rel="bookmark">' . $time_string . '</a>'
			);

			$byline = sprintf ( esc_html_x ( 'by %s', 'post author', 'view_source' ), '<span class="author vcard"><a class="url fn n" href="' . esc_url ( get_author_posts_url ( get_the_author_meta ( 'ID' ) ) ) . '">' . esc_html ( get_the_author () ) . '</a></span>'
			);

			echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

		}
	endif;

	if ( !function_exists ( 'view_source_entry_footer' ) ) :
		/**
		 * Prints HTML with meta information for the categories, tags and comments.
		 */
		function view_source_entry_footer () {
			// Hide category and tag text for pages.
			if ( 'post' == get_post_type () ) {
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list ( esc_html__ ( ', ', 'view_source' ) );
				if ( $categories_list && view_source_categorized_blog () ) {
					printf ( '<span class="cat-links">' . esc_html__ ( 'Posted in %1$s', 'view_source' ) . '</span>', $categories_list ); // WPCS: XSS OK.
				}

				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list ( '', esc_html__ ( ', ', 'view_source' ) );
				if ( $tags_list ) {
					printf ( '<span class="tags-links">' . esc_html__ ( 'Tagged %1$s', 'view_source' ) . '</span>', $tags_list ); // WPCS: XSS OK.
				}
			}

			if ( !is_single () && !post_password_required () && ( comments_open () || get_comments_number () ) ) {
				echo '<span class="comments-link">';
				comments_popup_link ( esc_html__ ( 'Leave a comment', 'view_source' ), esc_html__ ( '1 Comment', 'view_source' ), esc_html__ ( '% Comments', 'view_source' ) );
				echo '</span>';
			}

			edit_post_link ( esc_html__ ( 'Edit', 'view_source' ), '<span class="edit-link">', '</span>' );
		}
	endif;

	if ( !function_exists ( 'the_archive_title' ) ) :
		/**
		 * Shim for `the_archive_title()`.
		 *
		 * Display the archive title based on the queried object.
		 *
		 * @todo Remove this function when WordPress 4.3 is released.
		 *
		 * @param string $before Optional. Content to prepend to the title. Default empty.
		 * @param string $after  Optional. Content to append to the title. Default empty.
		 */
		function the_archive_title ( $before = '', $after = '' ) {
			if ( is_category () ) {
				$title = sprintf ( esc_html__ ( 'Category: %s', 'view_source' ), single_cat_title ( '', false ) );
			}
			elseif ( is_tag () ) {
				$title = sprintf ( esc_html__ ( 'Tag: %s', 'view_source' ), single_tag_title ( '', false ) );
			}
			elseif ( is_author () ) {
				$title = sprintf ( esc_html__ ( 'Author: %s', 'view_source' ), '<span class="vcard">' . get_the_author () . '</span>' );
			}
			elseif ( is_year () ) {
				$title = sprintf ( esc_html__ ( 'Year: %s', 'view_source' ), get_the_date ( esc_html_x ( 'Y', 'yearly archives date format', 'view_source' ) ) );
			}
			elseif ( is_month () ) {
				$title = sprintf ( esc_html__ ( 'Month: %s', 'view_source' ), get_the_date ( esc_html_x ( 'F Y', 'monthly archives date format', 'view_source' ) ) );
			}
			elseif ( is_day () ) {
				$title = sprintf ( esc_html__ ( 'Day: %s', 'view_source' ), get_the_date ( esc_html_x ( 'F j, Y', 'daily archives date format', 'view_source' ) ) );
			}
			elseif ( is_tax ( 'post_format' ) ) {
				if ( is_tax ( 'post_format', 'post-format-aside' ) ) {
					$title = esc_html_x ( 'Asides', 'post format archive title', 'view_source' );
				}
				elseif ( is_tax ( 'post_format', 'post-format-gallery' ) ) {
					$title = esc_html_x ( 'Galleries', 'post format archive title', 'view_source' );
				}
				elseif ( is_tax ( 'post_format', 'post-format-image' ) ) {
					$title = esc_html_x ( 'Images', 'post format archive title', 'view_source' );
				}
				elseif ( is_tax ( 'post_format', 'post-format-video' ) ) {
					$title = esc_html_x ( 'Videos', 'post format archive title', 'view_source' );
				}
				elseif ( is_tax ( 'post_format', 'post-format-quote' ) ) {
					$title = esc_html_x ( 'Quotes', 'post format archive title', 'view_source' );
				}
				elseif ( is_tax ( 'post_format', 'post-format-link' ) ) {
					$title = esc_html_x ( 'Links', 'post format archive title', 'view_source' );
				}
				elseif ( is_tax ( 'post_format', 'post-format-status' ) ) {
					$title = esc_html_x ( 'Statuses', 'post format archive title', 'view_source' );
				}
				elseif ( is_tax ( 'post_format', 'post-format-audio' ) ) {
					$title = esc_html_x ( 'Audio', 'post format archive title', 'view_source' );
				}
				elseif ( is_tax ( 'post_format', 'post-format-chat' ) ) {
					$title = esc_html_x ( 'Chats', 'post format archive title', 'view_source' );
				}
			}
			elseif ( is_post_type_archive () ) {
				$title = sprintf ( esc_html__ ( 'Archives: %s', 'view_source' ), post_type_archive_title ( '', false ) );
			}
			elseif ( is_tax () ) {
				$tax = get_taxonomy ( get_queried_object ()->taxonomy );
				/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
				$title = sprintf ( esc_html__ ( '%1$s: %2$s', 'view_source' ), $tax->labels->singular_name, single_term_title ( '', false ) );
			}
			else {
				$title = esc_html__ ( 'Archives', 'view_source' );
			}

			/**
			 * Filter the archive title.
			 *
			 * @param string $title Archive title to be displayed.
			 */
			$title = apply_filters ( 'get_the_archive_title', $title );

			if ( !empty( $title ) ) {
				echo $before . $title . $after;  // WPCS: XSS OK.
			}
		}
	endif;

	if ( !function_exists ( 'the_archive_description' ) ) :
		/**
		 * Shim for `the_archive_description()`.
		 *
		 * Display category, tag, or term description.
		 *
		 * @todo Remove this function when WordPress 4.3 is released.
		 *
		 * @param string $before Optional. Content to prepend to the description. Default empty.
		 * @param string $after  Optional. Content to append to the description. Default empty.
		 */
		function the_archive_description ( $before = '', $after = '' ) {
			$description = apply_filters ( 'get_the_archive_description', term_description () );

			if ( !empty( $description ) ) {
				/**
				 * Filter the archive description.
				 *
				 * @see term_description()
				 *
				 * @param string $description Archive description to be displayed.
				 */
				echo $before . $description . $after;  // WPCS: XSS OK.
			}
		}
	endif;

	/**
	 * Returns true if a blog has more than 1 category.
	 *
	 * @return bool
	 */
	function view_source_categorized_blog () {
		if ( false === ( $all_the_cool_cats = get_transient ( 'view_source_categories' ) ) ) {
			// Create an array of all the categories that are attached to posts.
			$all_the_cool_cats = get_categories ( array(
				                                      'fields' => 'ids', 'hide_empty' => 1,

				                                      // We only need to know if there is more than one category.
				                                      'number' => 2,
			                                      )
			);

			// Count the number of categories that are attached to the posts.
			$all_the_cool_cats = count ( $all_the_cool_cats );

			set_transient ( 'view_source_categories', $all_the_cool_cats );
		}

		if ( $all_the_cool_cats > 1 ) {
			// This blog has more than 1 category so view_source_categorized_blog should return true.
			return true;
		}
		else {
			// This blog has only 1 category so view_source_categorized_blog should return false.
			return false;
		}
	}

	/**
	 * Flush out the transients used in view_source_categorized_blog.
	 */
	function view_source_category_transient_flusher () {
		if ( defined ( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		// Like, beat it. Dig?
		delete_transient ( 'view_source_categories' );
	}

	add_action ( 'edit_category', 'view_source_category_transient_flusher' );
	add_action ( 'save_post', 'view_source_category_transient_flusher' );


	function view_source_registration_link () {
		$registration_link = esc_html ( get_post_meta ( 1031, 'vs_registration_link', true ) );
		if ( $registration_link ) :
			echo '<a class="registration-link" href="' . $registration_link . '" target="_blank">';
			echo __ ( 'Register Now', 'view_source' );
			echo '</a>';
		endif;
	}

	function view_source_registration_btn_link () {
		$registration_link = esc_html ( get_post_meta ( 1031, 'vs_registration_link', true ) );
		if ( $registration_link ) :
			echo '<a class="btn btn-primary" href="' . $registration_link . '" target="_blank">';
			echo __ ( 'Register Now', 'view_source' );
			echo '</a>';
		endif;
	}

	function view_source_session_times ( $date ) {
		$args = array(
			'post_type' => 'session', 'post_status' => 'publish', 'meta_query' => array(
				array(
					'key' => 'vs_session_date', 'value' => $date, 'compare' => 'IN',
				),
			),
		);

		$posts           = get_posts ( $args );
		if ( $posts ):
			?>

			<?php foreach ( $posts as $post ):
				$speaker  = get_post_meta ( $post->ID, 'vs_session_speaker', true );
				$datetime = get_field ( 'vs_session_time', $post->ID );
				$time     = 'g:i a';
				?>
				<?php setup_postdata ( $post ); ?>
				<ul class="single-session">
					<li class="time">
						<time>
							<?php echo date ( $time, $datetime ); ?><br>
						</time>
					<span>
						<?php the_field ( 'vs_session_date' ); ?><br>
					</span>
					</li>
					<li class="session-info">
						<a href="<?php echo get_the_permalink($post->ID);?>"<span class="session-title"><?php echo get_the_title ( $post->ID ); ?></span></a>
						<span class="session-speaker"><?php echo get_the_title ( $post->ID ) ; ?></span>
						<span class="speaker-company"><?php the_field ( 'company', $post->ID ); ?></span>
					</li>
				</ul>
			<?php endforeach; ?>

			<?php wp_reset_postdata (); ?>
		<?php endif;
	}

	function view_source_sponsors( $sponsor_type, $image_size ) {
		$args = array(
			'post_type'     => 'sponsor',
			'post_status'   => 'publish',
			'meta_value'    => $sponsor_type,
		);
		$posts = get_posts ( $args );
		foreach ( $posts as $post ) {
			echo '<li class="' . strtolower( $sponsor_type ) . '">';
			echo '<small>' . $sponsor_type . '</small>';
			echo get_the_post_thumbnail ( $post->ID, $image_size );
			echo '</li>';
		}
	}

	function view_source_schedule( $date, $day, $header ) {
		$date = '11/02/2015';
		$day = 'one';
		$header = 'Arrival Day';
	?>
	<div class="day-<?php echo $day;?>">
	<div class="day-header">
		<div class="day-header-date">
			<h3><?php echo $date;?></h3>
		</div>
		<div class="day-header-text">
			<h3><?php echo $header;?></h3>
		</div>
	</div>

	</div>
	<?php
		$posts = get_posts( array(
			                    'post_type' => 'session',
			                    'post_status' => 'publish',
			                    'meta_key' => strtotime( 'view_source_session_time' ),
			                    'order_by' => 'meta_key',
			                    'order' => 'DESC',
			                    'meta_query' => array(
				                    array(
					                    'key' => 'view_source_session_date',
					                    'value' => $date,
					                    'compare' => '=',
				                    )
			                    ))
		);
		if( $posts ):
			foreach( $posts as $post ) {
				$time = strtotime( get_post_meta( $post->ID, 'view_source_session_time', true ) );
				$speaker = get_post_meta( $post->ID, 'view_source_speaker', true );

				echo '<div class="single-session">';

				if( '' != $time ) :
					echo '<div class="time">' . date( 'g:i a', $time ) . '</div>';
				endif;

				if( '' != $speaker ) :
					echo '<div class="headshot">' . get_the_post_thumbnail( $speaker, 'speaker-photo' ) . '</div>';
				endif;

				if( '' != $speaker ) :
					echo '<a href="' . get_permalink( $speaker ) . '">';
					echo '<i class="fa fa-plus"></i>';
					echo '<div class="speaker">' . get_the_title( $speaker ) . '</div>';
					echo '</a>';
				endif;

				if( '' != $post->post_title ) :
					echo '<a href="' . get_permalink( $post->ID ) . '">';
					echo '<div class="title">' . $post->post_title . '</div>';
					echo '</a>';
				endif;

				echo '</div>';
			}
		endif;?>
</div>

<?php	}