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
                give_kindness_templates_part('dashboard');
            } else {
                give_kindness_templates_part('authentication');
            }
            
        return ob_get_clean();

    }

    /**
     * Shortcode handler class
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
     * Shortcode handler class
     *
     * @param  array $atts
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
