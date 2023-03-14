<?php

namespace Give_Kindness\API;
use WP_REST_Request;
use WP_REST_Response;
use WP_REST_Server;
use Give_Kindness\User; 
use Give_Kindness\GiveKindnessEmail; 
use Give_Kindness\Helpers; 
use Give_Kindness\API\CampaignAPI; 

class GiveKindnessAPI
{

  private $restBase = 'give-kindness/v1';
  private $campaignApi = '';


  /**
   * Initialize the class
   */
  function __construct() {

    $this->campaignApi = new CampaignAPI();
    add_action( 'rest_api_init', [ $this, 'customize_rest_cors' ], 15 );
    add_action( 'rest_api_init', [ $this, 'register_api' ] );
  }


  /**
  * Filter rest
  * 
  * @param none
  * @return string
  */
  function customize_rest_cors() {

    remove_filter( 'rest_pre_serve_request', 'rest_send_cors_headers' );
    add_filter( 'rest_pre_serve_request', function( $value ) {
      header( 'Access-Control-Allow-Origin: *' );
      header( 'Access-Control-Allow-Methods: POST, GET' );
      header( 'Access-Control-Allow-Credentials: true' );
      header( 'Access-Control-Expose-Headers: Link', false );
      header( 'Access-Control-Allow-Headers: X-Requested-With' );
      return $value;
    } );

  }

  /**
  * Register the API
  * 
  * @param none
  * @return void
  */
  public function register_api() {

    register_rest_route( $this->restBase, '/register', [
      'methods'  => WP_REST_SERVER::CREATABLE,
      'callback' => [ $this, 'try_register' ],
      'permission_callback' => '__return_true'
    ]);

    register_rest_route( $this->restBase, '/send-verify-email', [
      'methods'  => WP_REST_SERVER::CREATABLE,
      'callback' => [ $this, 'send_verify_email' ],
      'permission_callback' => '__return_true'
    ]);

    register_rest_route( $this->restBase, '/create-campaign', [
      'methods'  => WP_REST_SERVER::CREATABLE,
      'callback' => [ $this->campaignApi, 'create_campaign' ],
      'permission_callback' => '__return_true'
    ]);

    register_rest_route( $this->restBase, '/edit-campaign', [
      'methods'  => WP_REST_SERVER::CREATABLE,
      'callback' => [ $this->campaignApi, 'edit_campaign' ],
      'permission_callback' => '__return_true'
    ]);

    register_rest_route( $this->restBase, '/donations', [
      'methods'  => WP_REST_SERVER::CREATABLE,
      'callback' => [ $this->campaignApi, 'get_donations' ],
      'permission_callback' => '__return_true'
    ]);

    register_rest_route( $this->restBase, '/statistics', [
      'methods'  => WP_REST_SERVER::CREATABLE,
      'callback' => [ $this->campaignApi, 'get_statistics' ],
      'permission_callback' => '__return_true'
    ]);

    register_rest_route( $this->restBase, '/delete', [
      'methods'  => WP_REST_SERVER::CREATABLE,
      'callback' => [ $this->campaignApi, 'delete_campaign' ],
      'permission_callback' => '__return_true'
    ]);

    register_rest_route( $this->restBase, '/suspend-request', [
      'methods'  => WP_REST_SERVER::CREATABLE,
      'callback' => [ $this->campaignApi, 'suspend_request' ],
      'permission_callback' => '__return_true'
    ]);

    register_rest_route( $this->restBase, '/suspend-request-status', [
      'methods'  => WP_REST_SERVER::CREATABLE,
      'callback' => [ $this->campaignApi, 'suspend_request_status' ],
      'permission_callback' => '__return_true'
    ]);

    register_rest_route( $this->restBase, '/invite-fundraisers', [
      'methods'  => WP_REST_SERVER::CREATABLE,
      'callback' => [ $this->campaignApi, 'invite_fundraisers' ],
      'permission_callback' => '__return_true'
    ]);

    register_rest_route( $this->restBase, '/get-donation-preset-amounts', [
      'methods'  => WP_REST_SERVER::CREATABLE,
      'callback' => [ $this->campaignApi, 'get_donation_preset_amounts' ],
      'permission_callback' => '__return_true'
    ]);

    register_rest_route( $this->restBase, '/donation-preset-amounts', [
      'methods'  => WP_REST_SERVER::CREATABLE,
      'callback' => [ $this->campaignApi, 'donation_preset_amounts' ],
      'permission_callback' => '__return_true'
    ]);

    register_rest_route( $this->restBase, '/set-milestones', [
      'methods'  => WP_REST_SERVER::CREATABLE,
      'callback' => [ $this->campaignApi, 'set_milestones' ],
      'permission_callback' => '__return_true'
    ]);

  }

  /**
   * User registration
   *
   * @param array
   * @return array
   */
  public function try_register( WP_REST_Request $request ) {

    $user = new User();
    $response = $user->user_register($_POST);

    if($response['status'] == 201 ){
      $user_id = $response['user_id'];
      $user = get_user_by( 'id', $user_id ); 

      Helpers::create_dummy_donations( $user );

      $email = new GiveKindnessEmail(); 
      $message = $email->prepare_verification_email( $user );
      $subject = $message['subject'];
      $text = $message['message'];
      $email->send( $user->user_email, $subject, $text, '');
    }
  
    return new WP_REST_Response($response, 123);
    
  }

  /**
  * User registration
  *
  * @param array
  * @return array
  */
  public function send_verify_email( WP_REST_Request $request ) {
    
    $user_id = sanitize_text_field($_POST['user_id']);
    $user = get_user_by( 'id', $user_id ); 

    $email = new GiveKindnessEmail(); 
    $email_content = $email->prepare_verification_email( $user );
    $subject = $email_content['subject'];
    $message = $email_content['message'];
    $response = $email->send( $user->user_email, $subject, $message, '');

    return new WP_REST_Response($response, 123);

  }


}