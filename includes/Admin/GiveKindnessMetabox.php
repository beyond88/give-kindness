<?php

namespace Give_Kindness\Admin;

/**
 * The admin class
 */
class GiveKindnessMetabox {

  private $post_type = 'give_form';

  /**
  * Initialize the class
  */
  function __construct( $post_type ) {

    if( ! empty( $post_type ) ) {
      $this->post_type = $post_type; 
    }

    add_action( 'add_meta_boxes', [ $this, 'add_meta_box' ] );
  }

  /**
  * Add metabox
  * 
  * @param none
  * @return void
  */
  public function add_meta_box() {

    add_meta_box(
      'camapign-details',
      __( 'Camapign Details', 'give-kindness' ),
      [ $this, 'campaign_details' ],
      $this->post_type
    );

  }

  /**
  * Metabox callback
  * 
  * @param none
  * @return void
  */
  public function campaign_details() {

  }

}