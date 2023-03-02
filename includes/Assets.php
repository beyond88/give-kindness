<?php

namespace Give_Kindness;
use Give_Kindness\Helpers;

/**
 * Assets handlers class
 */
class Assets {

    /**
     * Class constructor
     */
    function __construct() {
        add_action( 'wp_enqueue_scripts', [ $this, 'register_assets' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'register_assets' ] );
    }

    /**
     * All available scripts
     *
     * @return array
     */
    public function get_scripts() {
        return [
            'give_kindness-script' => [
                'src'     => GIVE_KINDNESS_ASSETS . '/js/frontend.js',
                'version' => filemtime( GIVE_KINDNESS_PATH . '/assets/js/frontend.js' ),
                'deps'    => [ 'jquery' ]
            ],
            'give_kindness-ie8gallery' => [
                'src'     => GIVE_KINDNESS_ASSETS . '/js/ie8gallery.js',
                'version' => filemtime( GIVE_KINDNESS_PATH . '/assets/js/ie8gallery.js' ),
                'deps'    => [ 'jquery' ]
            ],  
            'give_kindness-admin-script' => [
                'src'     => GIVE_KINDNESS_ASSETS . '/js/admin.js',
                'version' => filemtime( GIVE_KINDNESS_PATH . '/assets/js/admin.js' ),
                'deps'    => [ 'jquery', 'wp-util' ]
            ],
        

        ];
    }

    /**
     * All available styles
     *
     * @return array
     */
    public function get_styles() {
        return [
            'give_kindness-style' => [
                'src'     => GIVE_KINDNESS_ASSETS . '/css/frontend.css',
                'version' => filemtime( GIVE_KINDNESS_PATH . '/assets/css/frontend.css' )
            ],
            'give_kindness-admin-style' => [
                'src'     => GIVE_KINDNESS_ASSETS . '/css/admin.css',
                'version' => filemtime( GIVE_KINDNESS_PATH . '/assets/css/admin.css' )
            ],
            'give_kindness-ie8gallery' => [
                'src'     => GIVE_KINDNESS_ASSETS . '/css/ie8gallery.css',
                'version' => filemtime( GIVE_KINDNESS_PATH . '/assets/css/ie8gallery.css' )
            ],
        ];
    }

    /**
     * Register scripts and styles
     *
     * @return void
     */
    public function register_assets() {

        wp_enqueue_media();
        
        $scripts = $this->get_scripts();
        $styles  = $this->get_styles();

        foreach ( $scripts as $handle => $script ) {
            $deps = isset( $script['deps'] ) ? $script['deps'] : false;

            wp_enqueue_script( $handle, $script['src'], $deps, $script['version'], true );
        }

        foreach ( $styles as $handle => $style ) {
            $deps = isset( $style['deps'] ) ? $style['deps'] : false;

            wp_enqueue_style( $handle, $style['src'], $deps, $style['version'] );
        }


        $dashboard_page_id = Helpers::get_dashboard_page_id();
        $page_url = get_permalink($dashboard_page_id);

        wp_localize_script( 'give_kindness-admin-script', 'give_kindness', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce( 'give_kindness-admin-nonce' ),
            'confirm' => __( 'Are you sure?', 'give-kindness' ),
            'error' => __( 'Something went wrong', 'give-kindness' ),
            'apiNonce' => wp_create_nonce('wp_rest'),
            'siteURL' => site_url('/'),
            'giveApiURL' => site_url('/wp-json/give-api/v2/'),
            'giveKindnessApiURL' => site_url('/wp-json/give-kindness/v1/'),
            'userId' => get_current_user_id(),
            'updateProfile' => __('Update Profile', 'give-kindness'),
            'updating' => __('Updating...', 'give-kindness'),
            'updated' => __('Updated', 'give-kindness'),
            'logOutMsg' => __('Are you sure you want to logout?', 'give-kindness'),
            'yes' => __('Yes', 'give-kindness'),
            'neverMind' => __('Nevermind', 'give-kindness'),
            'emailNotValid' => __('Email not valid!', 'give-kindness'),
            'passwordLength' => __('Password length minimum 6 character!', 'give-kindness'),
            'pleaseWait' => __('Please wait!', 'give-kindness'),
            'sendAgain' => __('Send again', 'give-kindness'),
            'pleaseCheckEmail' => 'Please your email inbox. An email has been sent.',
            'saveDraft' => __('Save draft', 'give-kindness'),
            'submitForApproval' => __('Submit for approval', 'give-kindness'),
            'signUp' => __('Sign Up', 'give-kindness'),
            'dashboardURL' => $page_url
        ] );
    }
}