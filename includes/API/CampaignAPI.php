<?php
namespace Give_Kindness\API;
use WP_REST_Request;
use WP_REST_Response;
use WP_REST_Server;
use Give_Kindness\Helpers; 

class CampaignAPI
{

    /**
     * Initialize the class
     */
    public function __construct() {}

    /**
     * Initializes a singleton instance
     *
     * @return \MyDashboard
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

        Helpers::image_file_upload( $request );
        return wp_send_json($_POST);
    }


}