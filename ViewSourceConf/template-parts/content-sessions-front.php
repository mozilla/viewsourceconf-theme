<?php
  /*
   * Template part for the front page Speakers section.
   */
?>
  <h2><?php _e ( 'Schedule', 'view_source' ); ?></h2>
  <p><?php echo esc_html ( get_post_meta ( get_the_ID (), 'vs_sessions_intro_text', true ) ); ?></p>

<?php
  $posts = get_field ( 'vs_scheduled_sessions' );
  //var_dump($posts);
  if ( $posts ):?>
    <?php foreach ( $posts as $post ): // variable must be called $post (IMPORTANT)?>
      <?php setup_postdata ( $post );
      $datetime = get_field ( 'vs_session_date', $post->ID );
      $time     = 'g:i a';
      ?>
      <ul>
        <li class="time">
          <time>
            <?php echo $datetime; ?>
          </time>
        </li>
        <li class="session-info">
          <h4>
            <a href="<?php the_permalink (); ?>"><?php echo get_the_title ( $post->ID ); ?></a>
          </h4>
          <?php
            $speaker = get_post_meta( $post->ID, 'vs_session_speaker', true ); if( $speaker ) :
            echo '<p class="speaker-name">' . get_the_title( $speaker[0] ) . '</p>'; endif;

            $speaker_company = get_post_meta( $speaker[0], 'company', true ); if( $speaker_company ) :
            echo '<p class="company">' . $speaker_company . '</p>'; endif;
          ?>
        </li>
        <li>
          <a href="<?php the_permalink (); ?>"><i class="fa fa-plus"></i></a>
        </li>
      </ul>
    <?php endforeach; ?>
    <!--<a class="btn btn-primary" href="/schedule">See Full Schedule</a>-->
    <?php wp_reset_postdata (); ?>
  <?php endif; ?>
