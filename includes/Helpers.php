<?php

namespace Give_Kindness;

class Helpers 
{

    /*
    * Get dashboard page details
    *
    * @param none
    * @return array
    */
    public static function get_dashboard_page_id() {
        $page = get_option('give_kindness_pages');

        if( array_key_exists( 'give_kindness_dashboard', $page ) ) {
            $page_id = $page['give_kindness_dashboard'];
            return $page_id;
        }

        return ''; 
    }
}