<?php
  /**
   * Define the metabox and field configurations.
   *
   * @param  array $meta_boxes
   * @return array
   */
  function cmb_sample_metaboxes( array $meta_boxes ) {

    $sessions = array(
      array( 'id' => 'view_source_session_date', 'name' => 'Session Date', 'type' => 'date',  'cols' => 4 ),
      array( 'id' => 'view_source_session_time', 'name' => 'Session Time', 'type' => 'time',  'cols' => 4 ),
      array( 'id' => 'view_source_speaker', 'name' => 'Speaker', 'type' => 'post_select', 'use_ajax' => true, 'query' => array( 'post_type' => 'speaker' ),  'cols' => 4 ),
    );

    $meta_boxes[] = array(
      'title' => 'Session Time/Speaker',
      'pages' => 'session',
      'fields' => $sessions,
    );

    $speakers = array(
      array( 'id' => 'view_source_speaker_twitter', 'name' => 'Twitter Handle', 'type' => 'text' ),
    );

    $meta_boxes[] = array(
      'title' => 'Speaker Info',
      'pages' => 'speaker',
      'context' => 'side',
      'fields' => $speakers
    );

    $speaker_session = array(
      array( 'id' => 'view_source_speaker_session', 'name' => 'Session', 'type' => 'post_select', 'use_ajax' => true, 'query' => array( 'post_type' => 'session' ) ),
    );

    $meta_boxes[] = array(
      'title' => 'Which Session is this speaker associated with?',
      'pages' => 'speaker',
      'fields' => $speaker_session
    );

    return $meta_boxes;

  }
  add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
