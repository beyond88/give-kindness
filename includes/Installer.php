<?php

namespace Give_Kindness;

/**
 * Installer class
 */
class Installer {

    /**
     * Run the installer
     *
     * @return void
     */
    public function run() {
        $this->add_version();
    }

    /**
     * Add time and version on DB
     */
    public function add_version() {
        $installed = get_option( 'give_kindness_installed' );

        if ( ! $installed ) {
            update_option( 'give_kindness_installed', time() );
        }

        update_option( 'give_kindness_version', GIVE_KINDNESS_VERSION );
    }
}
