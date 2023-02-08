<?php

namespace Give_Kindness\API;

use WP_REST_Request;
use WP_REST_Response;
use WP_REST_Server;

class GiveKindnessAPI
{

    private $restBase = 'give-kindness/v1';

    /**
     * Initialize the class
     */
    function __construct() {
      add_action( 'rest_api_init', [ $this, 'registerApi' ] );
    }
 
    /**
     * Register the API
    *
    * @return void
    */
    public function registerApi() {

      register_rest_route( $this->restBase, '/register', [
        'methods'  => WP_REST_SERVER::CREATABLE,
        'callback' => [ $this, 'tryRegister' ],
        'permission_callback' => '__return_true'
      ]);

    }

    /**
     * Login
     *
     * @return void
     */
    public function tryRegister( WP_REST_Request $request ) {

        $response = array();
        $parameters = $request->get_json_params();
        $username = sanitize_text_field($parameters['username']);
        $email = sanitize_text_field($parameters['email']);
        $password = sanitize_text_field($parameters['password']);

        $error = new WP_Error();
        if ( empty($username) ) {
          $error->add( 400, __("Username field 'username' is required.", 'wp-rest-user'), array('status' => 400) );
          return $error;
        }
        if ( empty( $email ) ) {
          $error->add( 401, __("Email field 'email' is required.", 'wp-rest-user'), array('status' => 400) );
          return $error;
        }
        if ( empty( $password ) ) {
          $error->add( 404, __("Password field 'password' is required.", 'wp-rest-user'), array('status' => 400) );
          return $error;
        }

        $user_id = username_exists($username);
        if ( !$user_id && email_exists($email) == false ) {
          $user_id = wp_create_user($username, $password, $email);
          if ( ! is_wp_error($user_id) ) {
            // Get User Meta Data (Sensitive, Password included. DO NOT pass to front end.)
            $user = get_user_by('id', $user_id);
            // $user->set_role($role);
            $user->set_role('subscriber');
            // Give specific code
            if ( class_exists('Give') ) {
              $user->set_role('give_donor');
            }
            // Ger User Data (Non-Sensitive, Pass to front end.)
            $response['code'] = 200;
            $response['message'] = __("User '" . $username . "' Registration was Successful", "wp-rest-user");
          } else {
            return $user_id;
          }
        } else {
          $error->add(406, __("Email already exists, please try 'Reset Password'", 'wp-rest-user'), array('status' => 400));
          return $error;
        }
        return new WP_REST_Response($response, 123);
        
    }

}