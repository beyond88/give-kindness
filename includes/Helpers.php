<?php

namespace Give_Kindness;

class Helpers 
{

    /**
    * Get dashboard page details
    *
    * @param none
    *
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

    /**
    * Get user verification status
    *
    *@param int user_id
    *
    *@return boolean 
    */
    public static function get_user_status( $user_id ) {

        $status = FALSE;
        if( empty( $user_id ) ) {
            $user_id =  get_current_user_id();
        }

        $user_verify = get_user_meta( $user_id, 'gk_user_verify' );
        if( isset( $user_verify ) && $user_verify == 1 ) {
            $status = TRUE;
        }

        return $status; 
    }
}