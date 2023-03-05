<?php

namespace Give_Kindness;
use Give\Framework\Support\Facades\DateTime\Temporal;
use Give\Framework\Database\DB;

class Helpers 
{

    /**
    * Get dashboard page details
    *
    * @param none
    * @return array
    */
    public static function get_dashboard_page_id() {
        $page = get_option('give_kindness_pages');

        if( array_key_exists( 'give_kindness_dashboard', $page ) ) {
            $page_id = $page['give_kindness_dashboard'];
            return $page_id;
        }

        return ''; 
    }

    /**
    * Get user verification status
    *
    *@param int user_id
    *@return boolean 
    */
    public static function get_user_status( $user_id ) {

        $status = FALSE;
        if( empty( $user_id ) ) {
            $user_id =  get_current_user_id();
        }

        $user_verify = get_user_meta( $user_id, 'gk_user_verify', true );
        if( isset( $user_verify ) && $user_verify == 1 ) {
            $status = TRUE;
        }

        return $status; 
    }


    /**
    * Create dummy donation
    *
    *@param int user_id
    *@return boolean
    */
    public static function create_dummy_donations( $user ) {

        $date_created = Temporal::withoutMicroseconds(Temporal::getCurrentDateTime());
        $name = sprintf('%s %s', $user->first_name, $user->last_name);

        $args = [
            'user_id' => $user->ID, 
            'email'   => $user->user_email,
            'name'    => $name,
            'purchase_value' => 0, 
            'purchase_count' => 1,
            'payment_ids' => 1,
            'date_created' => Temporal::getFormattedDateTime($date_created)
        ];

        try {
            DB::table('give_donors')
                ->insert($args);

            $donorId = DB::last_insert_id();
        } catch (Exception $exception) {
            throw new $exception('Failed creating a donor');
        }
    }

    /**
    * Update table dynamically
    *
    *@param string string integer string string
    *@return boolean
    */
    public static function update_user_meta( $user_id, $meta_key, $value ) {
        $res = update_user_meta( $user_id, $meta_key, $value );
        return $res; 
    }

    /**
    * Display posts
    *
    *@param string integer
    *@return array | object
    */
    public static function get_posts( $args ) {
        
        $posts = new \WP_Query( $args );
        return $posts; 

    }


    /**
    * Display posts
    *
    *@param string integer
    *@return array | object
    */
    public static function get_status_color( $status ) {

        $status = strtolower( $status );

        switch ($status) {
            case "publish":
              return "#7AD03A";
              break;
            case "approved":
                return "#2271b1";
                break;
            case "suspend":
                return "#ffba00";
                break;
            case "reject":
                return "#ff2f2f";
                break;
            case "draft":
                return "#a7a7a7";
                break;
            default:
                return "#a7a7a7";
        }

    }


    /**
     * Image upload
     * 
     * @param array | object
     * @return integer
     */
    public static function image_file_upload( $request ){

        $attach_id = 0;
        $files = $request->get_file_params();

        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        require_once( ABSPATH . 'wp-admin/includes/media.php' );

        if ( ! empty( $files ) ) {
            $upload_overrides = array( 'test_form' => false );
            foreach ($files as $key => $file) {
                $attachment_id = media_handle_upload( $key, 0 );
                if ( is_wp_error( $attachment_id ) ) {
                    $attach_id = 0;
                } else {
                    $attach_id = $attachment_id;
                }
            }
        }

        return $attach_id; 

    }

    /**
     * Create campaign
     * 
     * @param array | object
     * @return integer
     */
    public static function create_campaign( $request, $img_url = NULL ){

        $formID = wp_insert_post(
            [
                'post_title' => sanitize_text_field( $request['campaign_name'] ),
                'post_type' => 'give_forms',
                'post_status' => sanitize_text_field( $request['submit_type'] ), // @TODO: Preview needs to work with Draft status.
                'meta_input' => [
                    '_give_onboarding_default_form' => 1,
                    '_give_levels_minimum_amount' => 5.00,
                    '_give_levels_maximim_amount' => 999999.99,
                    '_give_form_template' => 'sequoia',
                    '_give_form_status' => 'open',
                    '_give_sequoia_form_template_settings' => [
                        'introduction' => [
                            'enabled' => 'enabled',
                            'headline' => sanitize_text_field( $request['campaign_name'] ),
                            'description' => sanitize_text_field( $request['campaign_detail'] ),
                            'image' => esc_url( $img_url ),
                            'donate_label' => __('Donate Now', 'give'),
                        ]
                    ],
                    '_give_checkout_label' => __('Donate Now', 'give'),
                    '_give_display_style' => 'buttons',
                    '_give_payment_display' => 'button',
                    '_give_form_floating_labels' => 'enabled',
                    '_give_reveal_label' => __('Donate Now', 'give'),
                    '_give_display_content' => 'enabled',
                    '_give_content_placement' => '',
                    '_give_form_content' => '',
                    '_give_price_option' => 'set',
                    '_give_set_price' => 5,
                    '_give_custom_amount' => 'enabled',
                    '_give_default_gateway' => 'global',
                    '_give_name_title_prefix' => 'global',
                    '_give_title_prefixes' => '',
                    '_give_company_field' => 'global',
                    '_give_anonymous_donation' => 'global',
                    '_give_donor_comment' => 'global',
                    '_give_logged_in_only' => 'enabled',
                    '_give_show_register_form' => 'none',
                    '_give_goal_option' => 'enabled',
                    '_give_goal_format' => 'amount',
                    '_give_set_goal' => sanitize_text_field( $request['fundrais_amount'] ),
                    '_give_number_of_donor_goal' => 100,
                    '_give_close_form_when_goal_achieved' => 'disabled',
                    '_give_form_goal_achieved_message' => __(
                        'Thank you to all our donors, we have met our fundraising goal.',
                        'give'
                    ),
                    '_give_terms_option' => 'global',
                    '_give_agree_label' => __('Agree to terms?', 'give'),
                    '_give_agree_text' => __('The terms can be customized in the donation form settings.', 'give'),
                    'give_stripe_per_form_accounts' => 'disabled', // Note: Doesn't use underscore prefix.
                    '_give_default_stripe_account' => '',
                    '_give_email_options' => 'global',
                    '_give_email_template' => 'default',
                    '_give_email_logo' => '',
                    '_give_from_name' => sanitize_text_field( $request['benefiary_name'] ),
                    '_give_from_email' => sanitize_text_field( $request['campaign_email'] ),
                    '_give_new-donation_notification' => 'global',
                    '_give_new-donation_email_subject' => sprintf('%s - #{payment_id}', __('New Donation', 'give')),
                    '_give_new-donation_email_header' => __('New Donation!', 'give'),
                    '_give_new-donation_email_message' => sanitize_email( $request['campaign_email'] ),
                    '_give_new-donation_email_content_type' => 'text/html',
                    '_give_new-donation_recipient' => [
                        'email' => $request['campaign_email'],
                    ],
                    '_give_donation-receipt_notification' => 'global',
                    '_give_donation-receipt_email_subject' => __('Donation Receipt', 'give'),
                    '_give_donation-receipt_email_header' => __('Donation Receipt', 'give'),
                    '_give_donation-receipt_email_mesage' => give_get_default_donation_receipt_email(),
                ],
            ]
        );

        return $formID;

    }

    /**
     * Edit campaign
     * 
     * @param array | object
     * @return integer
     */
    public static function edit_campaign( $request, $img_url = NULL ) {

        $campaign_id = sanitize_text_field( $request['campaign_id'] );
        if( ! is_null( get_post( $campaign_id ) ) ) {

            wp_update_post(
                [
                    'ID'        => sanitize_text_field( $request['campaign_id'] ),
                    'post_title' => sanitize_text_field( $request['campaign_name'] ),
                    'post_status' => sanitize_text_field( $request['submit_type'] ), // @TODO: Preview needs to work with Draft status.
                    'meta_input' => [
                        '_give_sequoia_form_template_settings' => [
                            'introduction' => [
                                'headline' => sanitize_text_field( $request['campaign_name'] ),
                                'description' => sanitize_text_field( $request['campaign_detail'] ),
                                'image' => esc_url( $img_url ),
                            ]
                        ],
                        '_give_set_goal' => sanitize_text_field( $request['fundrais_amount'] ),
                        '_give_from_name' => sanitize_text_field( $request['benefiary_name'] ),
                    ],
                ]
            );

            update_post_meta( $campaign_id, 'benefiary_name', sanitize_text_field( $request['benefiary_name'] ) );
            update_post_meta( $campaign_id, 'mobile_code', sanitize_text_field( $request['mobile_code'] ) );
            update_post_meta( $campaign_id, 'mobile_number', sanitize_text_field( $request['mobile_number'] ) );
            update_post_meta( $campaign_id, 'beneficiary_relationship', sanitize_text_field( $request['beneficiary_relationship'] ) );
            update_post_meta( $campaign_id, 'beneficiary_country', sanitize_text_field( $request['beneficiary_country'] ) );
            update_post_meta( $campaign_id, 'beneficier_age', sanitize_text_field( $request['beneficier_age'] ) );
            update_post_meta( $campaign_id, 'medical_condition', sanitize_text_field( $request['medical_condition'] ) );
            update_post_meta( $campaign_id, 'medical_document_type', sanitize_text_field( $request['medical_document_type'] ) );
            update_post_meta( $campaign_id, 'campaign_detail', sanitize_text_field( $request['campaign_detail'] ) );
            update_post_meta( $campaign_id, 'campaign_country', sanitize_text_field( $request['campaign_country'] ) );
            update_post_meta( $campaign_id, 'government_assistance', sanitize_text_field( $request['government_assistance'] ) );
            update_post_meta( $campaign_id, 'government_assistance_details', sanitize_text_field( $request['government_assistance_details'] ) );
            update_post_meta( $campaign_id, 'campaign_boosting', sanitize_text_field( $request['campaign_boosting'] ) );
            update_post_meta( $campaign_id, 'medical_document', sanitize_text_field( $request['medical_document_file'] ) );

            return $campaign_id;

        } else {
            return new WP_Error( 'campaign_update', 'Campaign update failed!' );
        }

    }

}