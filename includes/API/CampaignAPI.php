<?php

namespace Give_Kindness\API;
use WP_REST_Request;
use WP_REST_Response;
use WP_REST_Server;
use Give_Kindness\Helpers;
use Give_Kindness\API\Donations; 

class CampaignAPI
{

    /**
     * Initialize the class
     */
    public function __construct() {}

    /**
     * Initializes a singleton instance
     *
     * @return \CampaignAPI
     */
    public static function init() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
    * Create campaign
    * 
    * @param array
    * @return bool
    */
    public function create_campaign( WP_REST_Request $request ) {

        $attach_id = 0;
        $attach_ids = $request['medical_document_file'];
        $attach_ids = explode(",", sanitize_text_field( $request['medical_document_file'] ) );

        if( is_array( $attach_ids ) && $request['medical_document_type'] == 'image' ) {            
            $attach_id = $attach_ids[0];
        }

        $img_src = '';
        $image = wp_get_attachment_image_src( $attach_id, 'full' );
        if( is_array( $image ) ) {
            $img_src = $image[0];
        }

        $campaign_id = Helpers::create_campaign( $request, $img_src );

        if ( ! is_wp_error( $campaign_id ) ) {

            update_post_meta( $campaign_id, 'benefiary_name', sanitize_text_field( $request['benefiary_name'] ) );
            update_post_meta( $campaign_id, 'mobile_code', sanitize_text_field( $request['mobile_code'] ) );
            update_post_meta( $campaign_id, 'mobile_number', sanitize_text_field( $request['mobile_number'] ) );
            update_post_meta( $campaign_id, 'beneficiary_relationship', sanitize_text_field( $request['beneficiary_relationship'] ) );
            update_post_meta( $campaign_id, 'beneficiary_country', sanitize_text_field( $request['beneficiary_country'] ) );
            update_post_meta( $campaign_id, 'beneficier_age', sanitize_text_field( $request['beneficier_age'] ) );
            update_post_meta( $campaign_id, 'medical_condition', sanitize_text_field( $request['medical_condition'] ) );
            update_post_meta( $campaign_id, 'medical_document_type', sanitize_text_field( $request['medical_document_type'] ) );
            update_post_meta( $campaign_id, 'campaign_email', sanitize_text_field( $request['campaign_email'] ) );
            update_post_meta( $campaign_id, 'campaign_detail', sanitize_text_field( $request['campaign_detail'] ) );
            update_post_meta( $campaign_id, 'campaign_country', sanitize_text_field( $request['campaign_country'] ) );
            update_post_meta( $campaign_id, 'government_assistance', sanitize_text_field( $request['government_assistance'] ) );
            update_post_meta( $campaign_id, 'government_assistance_details', sanitize_text_field( $request['government_assistance_details'] ) );
            update_post_meta( $campaign_id, 'campaign_boosting', sanitize_text_field( $request['campaign_boosting'] ) );
            update_post_meta( $campaign_id, 'medical_document', sanitize_text_field( $request['medical_document_file'] ) );

            $response['status'] = 200;
            $response['message'] = __("Campaign created successfully!", "give-kindness");
            $response['campaign_id'] = $campaign_id;

            return new WP_REST_Response($response, 123);
        }

        $response['status'] = 409;
        $response['message'] = __("Something went wrong!", "give-kindness");
        return new WP_REST_Response($response, 123);
    }

    /**
    * Edit campaign
    * 
    * @param array
    * @return bool
    */
    public function edit_campaign( WP_REST_Request $request ) {

        $campaign_id = sanitize_text_field( $request['campaign_id'] );
        $attach_id = 0;
        $attach_ids = $request['medical_document_file'];
        $attach_ids = explode(",", sanitize_text_field( $request['medical_document_file'] ) );

        if( is_array( $attach_ids ) && $request['medical_document_type'] == 'image' ) {            
            $attach_id = $attach_ids[0];
        }

        $img_src = '';
        $image = wp_get_attachment_image_src( $attach_id, 'full' );
        if( is_array( $image ) ) {
            $img_src = $image[0];
        }

        $campaign_id = Helpers::edit_campaign( $request, $img_src );

        if ( ! is_wp_error( $campaign_id ) ) {

            $response['status'] = 200;
            $response['message'] = __( "Campaign updated successfully!", "give-kindness" );
            $response['campaign_id'] = $campaign_id;
            return new WP_REST_Response( $response, 123 );

        }

        $response['status'] = 409;
        $response['message'] = __( "Something went wrong!", "give-kindness" );
        return new WP_REST_Response( $response, 123 );

    }

    /**
    * Get donations by campaign id
    * 
    * @param array
    * @return array
    */
    public function get_donations( WP_REST_Request $request ){

        $req = [];
        $req['form'] = $request['form'];
        $req['page'] = 1;
        $req['perPage'] = 30;
        $req['sortColumn'] = 'id';
        $req['sortDirection'] = 'desc';
        $req['locale'] = 'en-US';
        $req['testMode'] = true;

        $donations = new Donations( $req );

        return new WP_REST_Response(
            $donations->handleRequest(),
            123
        );

    }

    /**
    * Get donation statistics by campaign id
    * 
    * @param array
    * @return array
    */
    public function get_statistics( WP_REST_Request $request ) {

        $campaign_id = sanitize_text_field( $request['form'] );
        $goal_stats = give_goal_progress_stats( $campaign_id );
        $goal = html_entity_decode( $goal_stats['goal'] );
        $donations = give_get_form_sales_stats( $campaign_id );
        $revenue = html_entity_decode( $goal_stats['actual'] );

        return new WP_REST_Response(
            [
                'goal' => str_replace("$", "", $goal),
                'donations' => $donations,
                'revenue' => str_replace("$", "", $revenue),
                // $goal_stats
            ],
            123
        );

    }

    /**
    * Get donation statistics by campaign id
    * 
    * @param array
    * @return array
    */
    public function delete_campaign( WP_REST_Request $request ) {

        $campaign_id = sanitize_text_field( $request['form'] );
        $delete = wp_delete_post( $campaign_id );

        if ( ! is_wp_error( $delete ) ) {

            $response['status'] = 200;
            $response['message'] = __( "Campaign deleted successfully!", "give-kindness" );
            return new WP_REST_Response( $response, 123 );

        }

        $response['status'] = 409;
        $response['message'] = __( "Something went wrong!", "give-kindness" );
        return new WP_REST_Response( $response, 123 );

    }

    /**
    * Create campaign suspend request
    * 
    * @param array
    * @return array
    */
    public function suspend_request( WP_REST_Request $request ) {

        $campaign_id = sanitize_text_field( $request['form'] );
        $msg = sanitize_textarea_field( $request['msg'] );

        $update = update_post_meta( $campaign_id, 'suspend_request', $msg );

        if ( ! is_wp_error( $update ) ) {

            $response['status'] = 200;
            $response['message'] = __( "Suspend request is submitted!", "give-kindness" );
            return new WP_REST_Response( $response, 123 );

        }

        $response['status'] = 409;
        $response['message'] = __( "Something went wrong!", "give-kindness" );
        return new WP_REST_Response( $response, 123 );

    }

    /**
    * Set suspend request status 
    * 
    * @param array
    * @return array
    */
    public function suspend_request_status( WP_REST_Request $request ) {

        $campaign_id = sanitize_text_field( $request['form'] );
        $action      = sanitize_text_field( $request['action'] );

        $update = update_post_meta( $campaign_id, 'suspend_request_status', $action );

        if ( ! is_wp_error( $update ) ) {

            $response['status'] = 200;
            $response['message'] = __( "Submitted!", "give-kindness" );
            return new WP_REST_Response( $response, 123 );

        }

        $response['status'] = 409;
        $response['message'] = __( "Something went wrong!", "give-kindness" );
        return new WP_REST_Response( $response, 123 );

    }
    


}