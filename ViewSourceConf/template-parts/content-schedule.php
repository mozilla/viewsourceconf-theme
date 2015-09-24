<div class="day-one">
  <div class="day-header">
    <div class="day-header-date">
      <h3><?php _e( 'Nov. 2', 'view_source' );?></h3>
    </div>
    <div class="day-header-text">
      <h3><?php _e( 'Arrival Day', 'view_source' );?></h3>
    </div>
  </div>

  <div class="time-header">
    <div class="time-header-time">
      <h3><?php _e( '4:30 pm', 'view_source' );?></h3>
    </div>
    <div class="time-header-title">
      <h3><?php _e( 'Registration Opens', 'view_source' );?></h3>
    </div>
  </div>
  <?php
    $date = '11/02/2015';
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

<div class="day-two">

  <div class="day-header">
    <div class="day-header-date">
      <h3>
        <?php _e( 'Nov. 3', 'view_source' );?>
      </h3>
    </div>
    <div class="day-header-text">
      <h3>
        <?php _e( 'Day One', 'view_source' );?>
      </h3>
    </div>
  </div>

  <!-- Time Header -->
  <div class="time-header">
    <div class="time-header-time">
      <h3>
        <?php _e( '8:00 pm', 'view_source' );?>
      </h3>
    </div>
    <div class="time-header-title">
      <h3>
        <?php _e( 'Registration Opens', 'view_source' );?>
      </h3>
    </div>
  </div>
  <?php
    $posts = get_posts(array(
                         'post_type' => 'session',
                         'post_status' => 'publish',
                         'meta_key' => strtotime( 'view_source_session_time' ),
                         'order_by' => 'meta_key',
                         'order' => 'DESC',
                         'meta_query' => array(
                           array(
                             'key' => 'view_source_session_date',
                             'value' => '11/03/2015',
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

<div class="day-three">

  <div class="day-header">
    <div class="day-header-date">
      <h3>
        <?php _e( 'Nov. 4', 'view_source' );?>
      </h3>
    </div>
    <div class="day-header-text">
      <h3>
        <?php _e( 'Day Two', 'view_source' );?>
      </h3>
    </div>
  </div>

  <!-- Time Header -->
  <div class="time-header">
    <div class="time-header-time">
      <h3>
        <?php _e( '8:00 am', 'view_source' );?>
      </h3>
    </div>
    <div class="time-header-title">
      <h3>
        <?php _e( 'Registration Opens', 'view_source' );?>
      </h3>
    </div>
  </div>
  <?php
    $posts = get_posts( array(
                          'post_type' => 'session',
                          'post_status' => 'publish',
                          'meta_key' => strtotime( 'view_source_session_time' ),
                          'order_by' => 'meta_key',
                          'order' => 'DSC',
                          'meta_query' => array(
                            array(
                              'key' => 'view_source_session_date',
                              'value' => '11/04/2015',
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
