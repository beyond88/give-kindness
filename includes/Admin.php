<?php

namespace Give_Kindness;

use Give_Kindness\Admin\GiveKindnessMetabox;
use Give_Kindness\Admin\CampaignSuspend;

/**
 * The admin class
 */
class Admin {

    /**
     * Initialize the class
     */
    function __construct() {
        new GiveKindnessMetabox();
        new CampaignSuspend();
    }

    /**
     * Dispatch and bind actions
     *
     * @return void
     */
    public function dispatch_actions( $main ) {

    }
}