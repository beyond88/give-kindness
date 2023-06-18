<?php

namespace Give_Kindness;

use Give_Kindness\Admin\GiveKindnessMetabox;
use Give_Kindness\Admin\SuspendRequests;
use Give_Kindness\Admin\GiveKindnessSettings;

/**
 * The admin class
 */
class Admin {

    /**
     * Initialize the class
     */
    function __construct() {
        new GiveKindnessMetabox();
        new SuspendRequests();
    }

    /**
     * Dispatch and bind actions
     *
     * @return void
     */
    public function dispatch_actions( $main ) {

    }
}