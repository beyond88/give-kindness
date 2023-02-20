<?php
namespace Give_Kindness\API;


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
    public function create_campaign() {
        return wp_send_json('Hello world!');
    }


}