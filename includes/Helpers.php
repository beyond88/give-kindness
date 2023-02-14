<?php

namespace Give_Kindness;
use Give\Framework\Support\Facades\DateTime\Temporal;
use Give\Framework\Database\DB;

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

        $user_verify = get_user_meta( $user_id, 'gk_user_verify', true );
        if( isset( $user_verify ) && $user_verify == 1 ) {
            $status = TRUE;
        }

        return $status; 
    }


    /**
    * Create dummy donation
    *
    *@param int user_id
    *
    *@return boolean
    */
    public static function create_dummy_donations( $user ) {

        $date_created = Temporal::withoutMicroseconds(Temporal::getCurrentDateTime());
        $name = $user->first_name .' ' . $user->last_name;

        $args = [
            'user_id' => $user->ID, 
            'email'   => $user->user_email,
            'name'    => $name,
            'purchase_value' => 0, 
            'purchase_count' => 1,
            'payment_ids' => 1,
            'date_created' => Temporal::getFormattedDateTime($date_created)
        ];

        try {
            DB::table('give_donors')
                ->insert($args);

            $donorId = DB::last_insert_id();
        } catch (Exception $exception) {
            throw new $exception('Failed creating a donor');
        }
    }

    /**
    * Update table dynamically
    *
    *@param string string integer string string
    *
    *@return boolean
    */
    public static function update_user_meta( $user_id, $meta_key, $value ) {
        $res = update_user_meta( $user_id, $meta_key, $value );
        return $res; 
    }

}