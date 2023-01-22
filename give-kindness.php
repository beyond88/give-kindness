<?php
/**
 * Plugin Name: Give Kindness
 * Description: An extension to enhance donation functionality to donate simultaneously based on GiveWP. 
 * Plugin URI: https://github.com/beyond88/give-kindness
 * Author: Mohiuddin Abdul Kader
 * Author URI: https://github.com/beyond88
 * Version: 1.0.0
 * Text Domain:       give-kindness
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
final class Give_Kindness {

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

        if (!function_exists('is_plugin_active')) {
            include_once(ABSPATH . 'wp-admin/includes/plugin.php');
        }
        if ( is_plugin_active( 'give/give.php' ) ) {
            register_activation_hook( GIVE_KINDNESS_FILE, [ $this, 'activate' ] );
            add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );

        } else {
            add_action( 'admin_notices', [ $this, 'givewp_plugin_required' ] );
        }

    }

    public function givewp_plugin_required()
    {
        ?>
        <script>
            (function($) {
                'use strict';
                $(document).on("click", '.notice-dismiss', function(){
                    $(this).parent().fadeOut();
                });
            })(jQuery);
        </script>
        <div id="message" class="error notice is-dismissible">
            <p><?php echo __('GiveWP plugin is required for Give_Kindness!', 'give-kindness'); ?></p>
            <button type="button" class="notice-dismiss">
                <span class="screen-reader-text"><?php echo __('Dismiss this notice.', 'give-kindness'); ?></span>
            </button>
        </div>
        <?php
    }

    /**
     * Initializes a singleton instance
     *
     * @return \Give_Kindness
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
        define( 'GIVE_KINDNESS_VERSION', self::version );
        define( 'GIVE_KINDNESS_FILE', __FILE__ );
        define( 'GIVE_KINDNESS_PATH', __DIR__ );
        define( 'GIVE_KINDNESS_TEMPLATES', GIVE_KINDNESS_PATH . '/includes/Templates/' );
        define( 'GIVE_KINDNESS_URL', plugins_url( '', GIVE_KINDNESS_FILE ) );
        define( 'GIVE_KINDNESS_ASSETS', GIVE_KINDNESS_URL . '/assets' );
    }

    /**
     * Initialize the plugin
     *
     * @return void
     */
    public function init_plugin() {
        new Give_Kindness\Assets();

        if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
            new Give_Kindness\Ajax();
        }

        if ( is_admin() ) {
            new Give_Kindness\Admin();
        } else {
            new Give_Kindness\Frontend();
        }

        new Give_Kindness\API();
    }

    /**
     * Do stuff upon plugin activation
     *
     * @return void
     */
    public function activate() {
        $installer = new Give_Kindness\Installer();
        $installer->run();
    }
}

/**
 * Initializes the main plugin
 */
function Give_Kindness() {
    return Give_Kindness::init();
}

// kick-off the plugin
Give_Kindness();