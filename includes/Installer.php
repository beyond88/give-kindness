<?php

namespace GiveKindness;

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
        $installed = get_option( 'givekindness_installed' );

        if ( ! $installed ) {
            update_option( 'givekindness_installed', time() );
        }

        update_option( 'givekindness_version', GIVEKINDNESS_VERSION );
    }
}
