<?php

namespace GiveKindness\Frontend;

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

        add_shortcode( 'donor_dashboard', [ $this, 'donoar_dashboard' ] );
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
    public function donoar_dashboard( $atts, $content = '' ) 
    {

        ob_start();

            wp_enqueue_style( 'give-styles' );
            wp_enqueue_style( 'give-donation-summary-style-frontend' );
            wp_enqueue_style( 'give-google-font-montserrat' );
            
            if ( is_user_logged_in() ) {
                givekindness_templates_part('dashboard');
            } else {
                givekindness_templates_part('authentication');
            }
        return ob_get_clean();

    }

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
            givekindness_templates_part('signin');
        return ob_get_clean();

    }

}
