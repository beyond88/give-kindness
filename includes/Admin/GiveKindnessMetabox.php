<?php

namespace Give_Kindness\Admin;

/**
 * The admin class
 */
class GiveKindnessMetabox {

	/**
   * Metabox ID.
   *
   * @since 1.8
   * @var   string
   */
  private $post_type;

	/**
	 * Metabox ID.
	 *
	 * @since 1.8
	 * @var   string
	 */
	private $metabox_id;

	/**
	 * Metabox Label.
	 *
	 * @since 1.8
	 * @var   string
	 */
	private $metabox_label;

  /**
  * Initialize the class
  */
  function __construct() {

    $this->post_type = 'give_forms';
		$this->metabox_id    = 'give-metabox-campaign-data';
		$this->metabox_label = __( 'Campaign Information', 'give-kindness' );

    add_action( 'add_meta_boxes', [ $this, 'add_meta_box' ] );
    
  }

  /**
	 * Get metabox id.
	 *
	 * @since 1.8
	 *
	 * @return string
	 */
	function get_metabox_ID() {
		return $this->metabox_id;
	}

	/**
	 * Get metabox label.
	 *
	 * @since 1.8
	 *
	 * @return string
	 */
	function get_metabox_label() {
		return $this->metabox_label;
	}

  /**
  * Add metabox
  * 
  * @param none
  * @return void
  */
  public function add_meta_box() {

		add_meta_box(
			$this->get_metabox_ID(),
			$this->get_metabox_label(),
			[ $this, 'output' ],
			[ $this->post_type ],
			'normal',
			'high'
		);

  }

	/**
	 * Output metabox settings.
	 *
	 * @since 1.8
	 *
	 * @return void
	 */
	public function output() {

    $campaign_id = give_kindness_get_admin_post_id();

    $benefiary_name = get_post_meta( $campaign_id, 'benefiary_name', true );
    $mobile_number = get_post_meta( $campaign_id, 'mobile_number', true );
    $beneficiary_relationship = get_post_meta( $campaign_id, 'beneficiary_relationship', true );
    $beneficiary_country = get_post_meta( $campaign_id, 'beneficiary_country', true );
    $beneficier_age = get_post_meta( $campaign_id, 'beneficier_age', true );
    $medical_condition = get_post_meta( $campaign_id, 'medical_condition', true );
    $medical_document_type = get_post_meta( $campaign_id, 'medical_document_type', true );
    $campaign_email = get_post_meta( $campaign_id, 'campaign_email', true );
    $campaign_detail = get_post_meta( $campaign_id, 'campaign_detail', true );
    $campaign_country = get_post_meta( $campaign_id, 'campaign_country', true );
    $government_assistance = get_post_meta( $campaign_id, 'government_assistance', true );
    $government_assistance_details = get_post_meta( $campaign_id, 'government_assistance_details', true );
    $campaign_boosting = get_post_meta( $campaign_id, 'campaign_boosting', true );
    $medical_document = get_post_meta( $campaign_id, 'medical_document', true );
    ?>

      <p>
        <strong><?php echo __('Beneficiary name:', 'give-kindness'); ?></strong> <?php echo esc_attr($benefiary_name); ?>
      </p>
      <p>
        <strong><?php echo __('Beneficiary mobile:', 'give-kindness'); ?></strong> <?php echo esc_attr($mobile_number); ?>
      </p>
      <p>
        <strong><?php echo __('Beneficiary relationship:', 'give-kindness'); ?></strong> <?php echo esc_attr($beneficiary_relationship); ?>
      </p>
      <p>
        <strong><?php echo __('Beneficiary country:', 'give-kindness'); ?></strong> <?php echo esc_attr($beneficiary_country); ?>
      </p>
      <p>
        <strong><?php echo __('Beneficiary age:', 'give-kindness'); ?></strong> <?php echo esc_attr($beneficier_age); ?>
      </p>
      <p>
        <strong><?php echo __('Medical condition:', 'give-kindness'); ?></strong> <?php echo esc_attr($medical_condition); ?>
      </p>
      <p>
        <strong><?php echo __('Medical document type:', 'give-kindness'); ?></strong> <?php echo esc_attr($medical_document_type); ?>
      </p>
      <p>
        <strong><?php echo __('Email:', 'give-kindness'); ?></strong> <?php echo esc_attr($campaign_email); ?>
      </p>
      <p>
        <strong><?php echo __('Campaign country:', 'give-kindness'); ?></strong> <?php echo esc_attr($campaign_country); ?>
      </p>
      <p>
        <strong><?php echo __('Government Assistance:', 'give-kindness'); ?></strong> <?php echo esc_attr($government_assistance); ?>
      </p>
      <p>
        <strong><?php echo __('Government assistance details:', 'give-kindness'); ?></strong> <?php echo esc_attr($government_assistance_details); ?>
      </p>
      <p>
        <strong><?php echo __('Campaign boosting:', 'give-kindness'); ?></strong> <?php echo esc_attr($campaign_boosting); ?>
      </p>

      <p id="give-kindness-admin-campaign-images" class="thumbs">
        <strong><?php echo __('Medical document:', 'give-kindness'); ?></strong> 

        <?php 
          $attach_ids = explode(",", $medical_document);
          if( ! empty( $attach_ids ) && $medical_document_type == "image" ) {
            foreach( $attach_ids as $attach_id) {
              if( $attach_id == ''){
                continue;
              }
              $image = wp_get_attachment_image_src( $attach_id, 'full' );
              $image_url = $image[0];
              ?>
                <img src="<?php echo esc_url($image_url); ?>" data-img-src="<?php echo esc_url($image_url); ?>" with="150px" height="150px" class="thumb"/>
              <?php
            }
          }

          if( ! empty( $attach_ids ) && $medical_document_type == "pdf" ) {
            foreach( $attach_ids as $attach_id ) {
              $attach_url = wp_get_attachment_url( $attach_id );

              ?>
              <object data="<?php echo esc_url( $attach_url ); ?>" type="application/pdf" width="150px" height="150px">
                <embed src="<?php echo esc_url( $attach_url ); ?>" type="application/pdf">
                  <p><?php echo __('This browser does not support PDFs. Please download the PDF to view it:', 'give-kindness'); ?> <a href="<?php echo esc_url( $attach_url ); ?>" download><?php echo __('Download PDF', 'give-kindness'); ?></a>.</p>
                </embed>
              </object>
              <?php

            }
          }
        ?>

      </p>
        
    <?php

  }

}