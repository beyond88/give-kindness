<?php

namespace Give_Kindness;

/**
 * User verification handler class
 */
class User {

    /**
     * Initialize the class
     */
    function __construct() {}

    /**
     * 
     * Generate username
     * 
     * @param string
     * @return string
     */
    public function generate_username( $prefix = '', $email ) {

        if( empty( $email ) ){
            return NULL; 
        }
        
        $username = '';
        $parts = explode('@', $email);
        $username = $parts[0];
        if( ! username_exists( $username ) ) {
            return $username; 
        }

        $user_exists = 1;
        do {
            $rnd_str = sprintf("%06d", mt_rand(1, 999999));
            $username = $prefix . $username . $rnd_str; 
            $user_exists = username_exists( $username );
        } while( $user_exists > 0 );

        return $prefix . $username . $rnd_str;
        
    }


    /**
    * User register
    * 
    * @param array
    * 
    * @return array
    */
    public function user_register( $user ) {

        $email = sanitize_text_field($user['email']);
        $password = sanitize_text_field($user['password']);

        $error = new \WP_Error();
        if ( empty( $email ) ) {
            $response['status'] = 401;
            $response['message'] = __("Email field 'email' is required.", 'give-kindness');
        }

        if ( empty( $password ) ) {
            $response['status'] = 404;
            $response['message'] = __("Password field 'password' is required.", 'give-kindness');
        }

        $user_prefix = '';
        $username = $this->generate_username( $user_prefix, $email );

        $user_id = username_exists( $username );
        if ( ! $user_id && email_exists( $email ) == false ) {
            
            $user_id = wp_create_user($username, $password, $email);
            if ( ! is_wp_error($user_id) ) {

                $user = get_user_by('id', $user_id);
                $user->set_role('subscriber');
                
                if ( class_exists('Give') ) {
                    $user->set_role('give_donor');
                }

                $user_activation_key =  md5(uniqid('', true));
                add_user_meta( $user_id, 'gk_activation_key', $user_activation_key );
                add_user_meta( $user_id, 'gk_user_verify', 0 );


                $response['status'] = 201;
                $response['message'] = __("User '" . $username . "' Registration was Successful", "give-kindness");

            } else {
                $response['status'] = 409;
                $response['message'] = __("User registration failed", "give-kindness");
            }

        } else {
            $response['status'] = 406;
            $response['message'] = __("Email already exists, please try 'Reset Password'", 'give-kindness');
        }

        return $response;

    }
}