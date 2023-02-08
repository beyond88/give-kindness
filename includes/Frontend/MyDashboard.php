<?php

namespace Give_Kindness\Frontend;

/**
 * Shortcode handler class
 */
class MyDashboard {

    /**
     * Initializes the class
     */

    protected $id;
    function __construct() 
    {

        $this->id = get_current_user_id();

        add_shortcode( 'donor_dashboard', [ $this, 'donor_dashboard' ] );
        add_shortcode( 'donor_authentication', [ $this, 'donor_authentication' ] );
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
    public function donor_dashboard( $atts, $content = '' ) 
    {

        ob_start();

            wp_enqueue_style( 'give-styles' );
            wp_enqueue_style( 'give-donation-summary-style-frontend' );
            wp_enqueue_style( 'give-google-font-montserrat' );
            
            if ( is_user_logged_in() ) {
                give_kindness_templates_part( 'dashboard', self::init() );
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
    public function profile(){
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
    public function donations(){

        if( ! is_user_logged_in() ){
            return NULL;
        }

        $data = [];
        $user_id = get_current_user_id(); 

        $repository = new \Give\DonorDashboards\Repositories\Donations;
        $data['donations'] = $repository->getDonations( $user_id );
        $data['count'] = $repository->getDonationCount( $user_id );
        $data['revenue'] = $repository->getRevenue( $user_id );
        $data['average'] = $repository->getAverageRevenue( $user_id );

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
    public function donor_authentication( $atts, $content = '' ) 
    {
        ob_start();
            give_kindness_templates_part('authentication');
        return ob_get_clean();
    }

}
