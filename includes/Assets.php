<?php

namespace Give_Kindness;

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
            // 'give_kindness-moment' => [
            //     'src'     => GIVE_KINDNESS_ASSETS . '/js/moment.min.js',
            //     'version' => filemtime( GIVE_KINDNESS_PATH . '/assets/js/moment.min.js' ),
            //     'deps'    => [ 'jquery' ]
            // ],    
            // 'give_kindness-daterangepicker' => [
            //     'src'     => GIVE_KINDNESS_ASSETS . '/js/daterangepicker.js',
            //     'version' => filemtime( GIVE_KINDNESS_PATH . '/assets/js/daterangepicker.js' ),
            //     'deps'    => []
            // ],
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
            // 'give_kindness-daterangepicker' => [
            //     'src'     => GIVE_KINDNESS_ASSETS . '/css/daterangepicker.css',
            //     'version' => filemtime( GIVE_KINDNESS_PATH . '/assets/css/daterangepicker.css' )
            // ],
        ];
    }

    /**
     * Register scripts and styles
     *
     * @return void
     */
    public function register_assets() {
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

        wp_localize_script( 'give_kindness-admin-script', 'give_kindness', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce( 'give_kindness-admin-nonce' ),
            'confirm' => __( 'Are you sure?', 'give_kindness' ),
            'error' => __( 'Something went wrong', 'give_kindness' ),
            'apiNonce' => wp_create_nonce('wp_rest'),
            'siteURL' => site_url('/'),
        ] );
    }
}