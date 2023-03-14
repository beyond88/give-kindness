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

    /**
    * Set suspend request status 
    * 
    * @param array
    * @return array
    */
    public function invite_fundraisers( WP_REST_Request $request ) {

        $campaign_id = sanitize_text_field( $request['form'] );
        $email      = sanitize_text_field( $request['email'] );

        $res = '';

        if ( ! is_wp_error( $res ) ) {

            $response['status'] = 200;
            $response['message'] = __( "Invitation has been sent!", "give-kindness" );
            return new WP_REST_Response( $response, 123 );

        }

        $response['status'] = 409;
        $response['message'] = __( "Something went wrong!", "give-kindness" );
        return new WP_REST_Response( $response, 123 );

    }

    /**
    * Get donation preset amounts
    * 
    * @param array
    * @return array
    */
    public function get_donation_preset_amounts( WP_REST_Request $request ) {

        $campaign_id = sanitize_text_field( $request['form'] );
        $multi = get_post_meta( $campaign_id, '_give_price_option', true );
        $presets = get_post_meta( $campaign_id, '_give_donation_levels', true );
        $response['status'] = 200;
        $response['option'] = $multi;

        $html = '';
        if( ! empty( $presets ) ) {
            foreach( $presets as $preset ) {

                $html .='<div class="give_kindness-donations-preset-wrapper"><i class="fa fa-trash" aria-hidden="true"></i>';
                
                    $html .='<div class="give-donor-dashboard-field-row">
                        <div class="give-donor-dashboard-text-control">
                            <div class="give-donor-dashboard-text-control__input">
                                <input class="gk-preset-amount" name="gk-preset-amount[]" type="number" min="1" maxlength="20" value='.number_format($preset['_give_amount'], 2).'>
                            </div>
                        </div>
                    </div>
            
                    <div class="give-donor-dashboard-field-row">
                        <div class="give-donor-dashboard-text-control">
                            <div class="give-donor-dashboard-text-control__input">
                                <textarea class="gk-preset-amount-label" name="gk-preset-amount-label[]" maxlength="100">'.$preset['_give_text'].'</textarea>
                            </div>
                        </div>
                    </div>';
                $html .='</div>';

            }
        }

        $response['presets'] = $html;
        return new WP_REST_Response( $response, 123 );

    }

    /**
    * Set donation preset amounts
    * 
    * @param array
    * @return array
    */
    public function donation_preset_amounts( WP_REST_Request $request ) {

        $res = '';
        $campaign_id = sanitize_text_field( $request['form'] );
        $amount      = json_decode( $request['amount'], true );
        $detail      = json_decode( $request['detail'], true );
        $data        = [];

        if( ! empty( $amount ) ) {
            $i = 0;
            foreach( $amount as $item ) {

                $data_sort = [
                    '_give_id' =>
                        [
                            'level_id' => $i,
                        ],
                    '_give_amount' => give_sanitize_amount_for_db($item),
                    '_give_text' => $detail[$i]
                    ]; 
                   
                array_push( $data,  $data_sort);
                $i++;
            }
            update_post_meta( $campaign_id, '_give_price_option', 'multi' );

            if( ! empty( $data ) ) {
                $res = update_post_meta( $campaign_id, '_give_donation_levels', $data );
            }
        }

        if ( ! is_wp_error( $res ) ) {

            $response['status'] = 200;
            $response['message'] = __( "Donation preset amounts is created!", "give-kindness" );
            return new WP_REST_Response( $response, 123 );

        }

        $response['status'] = 409;
        $response['message'] = __( "Something went wrong!", "give-kindness" );
        return new WP_REST_Response( $response, 123 );

    }

    /**
    * Set milestones
    * 
    * @param array
    * @return array
    */
    public function set_milestones( WP_REST_Request $request ) {


        $res = '';

        if ( ! is_wp_error( $res ) ) {

            $response['status'] = 200;
            $response['message'] = __( "Milestones is created!", "give-kindness" );
            return new WP_REST_Response( $response, 123 );

        }

        $response['status'] = 409;
        $response['message'] = __( "Something went wrong!", "give-kindness" );
        return new WP_REST_Response( $response, 123 );

    }

}