<?php
/**
 * Plugin Name: GiveKindness
 * Description: An extension to enhance donation functionality to donate simultaneously based on GiveWP. 
 * Plugin URI: https://github.com/Getonnet/givekindness
 * Author: Getonnet
 * Author URI: https://github.com/Getonnet
 * Version: 1.0.0
 * Text Domain:       givekindness
 * Domain Path:       /languages
 * Requires PHP:      5.6
 * Requires at least: 4.4
 * Tested up to:      5.7
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * The main plugin class
 */
final class GiveKindness {

    /**
     * Plugin version
     *
     * @var string
     */
    const version = '1.0.0';

    /**
     * Class constructor
     */
    private function __construct() {
        //REMOVE THIS AFTER DEV
        error_reporting(E_ALL ^ E_DEPRECATED);

        $this->define_constants();

        register_activation_hook( GIVEKINDNESS_FILE, [ $this, 'activate' ] );

        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
    }

    /**
     * Initializes a singleton instance
     *
     * @return \GiveKindness
     */
    public static function init() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define the required plugin constants
     *
     * @return void
     */
    public function define_constants() {
        define( 'GIVEKINDNESS_VERSION', self::version );
        define( 'GIVEKINDNESS_FILE', __FILE__ );
        define( 'GIVEKINDNESS_PATH', __DIR__ );
        define( 'GIVEKINDNESS_TEMPLATES', GIVEKINDNESS_PATH . '/includes/Templates/' );
        define( 'GIVEKINDNESS_URL', plugins_url( '', GIVEKINDNESS_FILE ) );
        define( 'GIVEKINDNESS_ASSETS', GIVEKINDNESS_URL . '/assets' );
    }

    /**
     * Initialize the plugin
     *
     * @return void
     */
    public function init_plugin() {
        new GiveKindness\Assets();

        if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
            new GiveKindness\Ajax();
        }

        if ( is_admin() ) {
            new GiveKindness\Admin();
        } else {
            new GiveKindness\Frontend();
        }

        // if ( get_option('wc_settings_tab_GiveKindness_is_enable') == 'yes' ) {
        //     WooCommerce::instance()->register_hooks();
        // }

        new GiveKindness\API();
    }

    /**
     * Do stuff upon plugin activation
     *
     * @return void
     */
    public function activate() {
        $installer = new GiveKindness\Installer();
        $installer->run();
    }
}

/**
 * Initializes the main plugin
 */
function GiveKindness() {
    return GiveKindness::init();
}

// kick-off the plugin
GiveKindness();