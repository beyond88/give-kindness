<?php

namespace Give_Kindness\Frontend;
use Give_Kindness\Helpers; 

/**
 * Shortcode handler class
 */
class MyDashboard {


    /**
     *  Get donor id
     * 
     */
    protected $id;
    
    /**
     * Initializes the class
     */
    function __construct() {
        $this->id = \Give\DonorDashboards\Helpers::getCurrentDonorId();

        add_shortcode( 'give_kindness_dashboard', [ $this, 'give_kindness_dashboard' ] );
        add_shortcode( 'give_kindness_authentication', [ $this, 'give_kindness_authentication' ] );
    }

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
     * Shortcode handler class
     *
     * @param  array $atts
     * @param  string $content
     *
     * @return string
     */
    public function give_kindness_dashboard( $atts, $content = '' ) {

        ob_start();

            wp_enqueue_style( 'give-styles' );
            wp_enqueue_style( 'give-donation-summary-style-frontend' );
            wp_enqueue_style( 'give-google-font-montserrat' );
            
            if ( is_user_logged_in() ) {

                $user_status = Helpers::get_user_status( get_current_user_id() ); 
                if(  $user_status  ){
                    give_kindness_templates_part( 'dashboard', self::init() );
                } else {
                    give_kindness_templates_part( 'verify-email', self::init() );
                }

            } else {
                give_kindness_templates_part('authentication');
            }
            
        return ob_get_clean();

    }

    /**
     * Get profile details
     *
     * @param  none
     *
     * @return object
     */
    public function profile() {
        $profile = new \Give\DonorDashboards\Profile($this->id);
        return $profile->getProfileData();
    }

    /**
     * Get donations detail 
     *
     * @param  none
     *
     * @return object
     */
    public function donations() {

        if( ! is_user_logged_in() ){
            return NULL;
        }

        $data = [];

        $repository = new \Give\DonorDashboards\Repositories\Donations;
        $data['donations'] = $repository->getDonations( $this->id );
        $data['count'] = $repository->getDonationCount( $this->id );
        $data['revenue'] = $repository->getRevenue( $this->id );
        $data['average'] = $repository->getAverageRevenue( $this->id );

        return $data; 
    }

    /**
     * Load authentication form
     *
     * @param  array $atts string $contents
     * @param  string $content
     *
     * @return string
     */
    public function give_kindness_authentication( $atts, $content = '' ) {
        ob_start();
            give_kindness_templates_part('authentication');
        return ob_get_clean();
    }

    /**
     * Load campaign by user id
     *
     * @param  none
     * @param  string $content
     *
     * @return string
     */
    public function give_kindness_campaigns() {

        if( ! is_user_logged_in() ){
            return NULL;
        }

        $author_id = get_current_user_id();
        $args = [
            'post_type' => 'give_forms',
            'author'    => $author_id,
            'post_status' => [
                'publish', 
                'pending', 
                'draft', 
                'future', 
                'private', 
                'inherit',
                'suspend',
                'reject',
                'approved' 
            ]
        ];

        return Helpers::get_posts( $args );
    }


    /**
     * Load color by status
     *
     * @param  string
     * @return string
     */
    public function give_kindness_campaign_status_color( $status ) {
        return Helpers::get_status_color( $status );
    }


}
