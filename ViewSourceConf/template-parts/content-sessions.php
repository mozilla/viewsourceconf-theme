<?php
  $date = 20151102;
  $args = array(
    'post_type'     => 'session',
    'post_status'   => 'publish',
    'meta_query' => array(
      array(
        'key'     => 'vs_session_date',
        'value'   => $date,
        'compare' => 'IN',
      ),
    ),
  );

  $posts = get_posts( $args );
  var_dump($posts);
  if( $posts ): ?>
    <?php foreach( $posts as $post ):
      $speaker = get_post_meta( $post->ID, 'vs_session_speaker', true );
      $datetime = get_field( 'vs_session_time', $post-> ID );
      $time = 'g:i a';
      ?>
      <?php setup_postdata( $post );?>
      <div class="session">
        <time class="time">
          <?php echo date ( $time, $datetime ); ?><br>
        </time>
        <span class="date">
          <?php the_field( 'vs_session_date' ); ?><br>
        </span>
        <span class="featured-image">
          <?php echo get_the_post_thumbnail( $post->ID );?>
        </span>
        <div class="session-info">
          <h3 class="session-title"><?php echo get_the_title ( $post->ID ); ?></h3>
          <h4 class="session-speaker"><?php echo get_the_title ( $speaker[ 0 ] ); ?></h4>
          <span class="speaker-company"><?php the_field ( 'company', $speaker[ 0 ] ); ?></span>
        </div>
      </div>
    <?php endforeach; ?>

    <?php wp_reset_postdata(); ?>
  <?php endif; ?>
