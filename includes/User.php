<?php

namespace Give_Kindness;
use Give_Kindness\GiveKindnessEmail;
use Give_Kindness\Helpers;

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
    public function generate_username( $email, $prefix = '' ) {

        if( empty( $email ) ) {
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
        $username = $this->generate_username( $email, $user_prefix );

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
                update_user_meta( $user_id, 'gk_activation_key', $user_activation_key );
                update_user_meta( $user_id, 'gk_user_verify', 0 );


                $response['status'] = 201;
                $response['message'] = __("User '" . $username . "' Registration was Successful", "give-kindness");
                $response['user_id'] = $user_id;

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

    /**
     * 
     * User verify process
     * 
     * @param GET request
     * @return void
     */
    public function check_email_verification() {

        if (isset($_REQUEST['gk_user_verification_action']) && trim($_REQUEST['gk_user_verification_action']) == 'gk_email_verification') {

            $jsData = array();

            wp_enqueue_style('font-awesome-5');

            $activation_key = isset($_REQUEST['gk_activation_key']) ? sanitize_text_field($_REQUEST['gk_activation_key']) : '';
            $verification_success = __('Thanks for Verifying.', 'user-verification');

            $invalid_key = __('Sorry, activation key is not valid.', 'give-kindness');
            $verification_fail = __('Sorry! Verification failed.', 'give-kindness');
            $please_wait = __('Please wait.', 'give-kindness');
            $redirect_after_verify = __('You will redirect after verification', 'give-kindness');
            $not_redirect = __('Click if not redirect automatically', 'give-kindness');

            $title_checking_verification = __('Checking Verification', 'give-kindness');

            $login_after_verification = 'yes';
            $redirect_after_verification = '';
            $verification_page_id = '';
            
            $dashboard_page_id = Helpers::get_dashboard_page_id();
            $redirect_page_url = get_permalink($dashboard_page_id);

            global $wpdb;

            if (is_multisite()) {
                $table = $wpdb->base_prefix . "usermeta";
            } else {
                $table = $wpdb->prefix . "usermeta";
            }

            $meta_data    = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table WHERE meta_value = %s", $activation_key));
            $user_id = $meta_data->user_id;

            if ( ! empty( $meta_data ) ) {

                $jsData['is_valid_key'] = 'yes';
                $user_activation_status = get_user_meta($user_id, 'gk_user_verify', true);

                if ( $user_activation_status != 0 ) {

                    $jsData['activation_status'] = 0;
                    $jsData['status_icon'] = '<i class="fas fa-user-times"></i>';
                    $jsData['status_text'] = $verification_fail;

                } else {

                    $user_data     = get_userdata( $user_id );
                    update_user_meta( $user_id, 'gk_user_verify', 1 );
                    $jsData['activation_status'] = 1;
                    $jsData['status_icon'] = '<i class="far fa-check-circle"></i>';
                    $jsData['status_text'] = wp_specialchars_decode( $verification_success, ENT_QUOTES );

                    $subject = __('User verification success','give-kindness');
                    $message = __('Congratulations! your account has been verified.','give-kindness');

                    $email = new GiveKindnessEmail(); 
                    $email->send( $user_data->user_email, $subject, $message, '');

                    if ($login_after_verification ==  "yes") {

                        $jsData['login_after_verify'] = 'yes';
                        $user = get_user_by('id', $user_id);

                        wp_set_current_user($user_id, $user->user_login);

                        $redirect_page_url = add_query_arg(
                            array(
                                'gk_activation_key' => $activation_key,
                                'gk_user_verification_action' => 'autologin',
                            ),
                            $redirect_page_url
                        );
                    }

                    if ( ( $redirect_after_verification != 'none' ) ) :

                        $jsData['is_redirect'] = 'yes';
                        $jsData['redirect_url'] = esc_url_raw($redirect_page_url);

                    endif;
                }
            } else {
                $jsData['is_valid_key'] = 'no';
                $jsData['is_valid_text'] = wp_specialchars_decode($invalid_key, ENT_QUOTES);
                $jsData['is_valid_icon'] = '<i class="far fa-times-circle"></i>';
            }
        ?>
            <div class="check-email-verification">
                <div class="inner">
                    <span class="close"><i class="fas fa-times"></i></span>
                    <h2 class="status-title"><?php echo esc_html($title_checking_verification); ?></h2>

                    <div class="status">
                        <span class="status-icon"><i class="fas fa-spin fa-spinner"></i></span>
                        <span class="status-text"><?php echo esc_html($please_wait); ?></span>
                    </div>

                    <?php if (!empty($redirect_after_verification) && $redirect_after_verification != 'none') : ?>
                        <div class="redirect">
                            <p><?php echo wp_kses_post($redirect_after_verify); ?></p>
                            <a href="<?php echo esc_url_raw($redirect_page_url); ?>">
                                <?php echo wp_kses_post($not_redirect);  ?>
                            </a>
                        </div>
                    <?php endif; ?>

                </div>
            </div>

            <script>
                jQuery(document).ready(function($) {

                    jsData = <?php echo json_encode($jsData); ?>

                    activation_status = jsData['activation_status'];
                    status_icon = jsData['status_icon'];
                    status_text = jsData['status_text'];
                    redirect_url = jsData['redirect_url'];
                    is_redirect = jsData['is_redirect'];
                    is_valid_key = jsData['is_valid_key'];

                    setTimeout(function() {

                        if (is_valid_key == 'yes') {
                            $('.status-icon').html(status_icon);
                            $('.status-text').html(status_text);

                        } else {
                            is_valid_icon = jsData['is_valid_icon'];
                            is_valid_text = jsData['is_valid_text'];

                            $('.status-icon').html(is_valid_icon);
                            $('.status-text').html(is_valid_text);

                            $('.redirect').fadeOut();
                        }

                    }, 2000);


                    setTimeout(function() {
                        if (is_redirect == 'yes') {
                            window.location.href = redirect_url;
                        }
                    }, 4000);

                    $(document).on('click', '.check-email-verification .close', function() {
                        $('.check-email-verification').fadeOut();
                    })
                })
            </script>

            <style type="text/css">
                .check-email-verification {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: #50505094;
                    z-index: 99999999;
                }

                .inner {
                    width: 350px;
                    background: #fff;
                    top: 50%;
                    position: absolute;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    padding: 15px;
                    text-align: center;
                    border-radius: 4px;
                    box-shadow: -1px 11px 11px 0 rgb(152 152 152 / 50%);
                    overflow: hidden;
                }

                .close {
                    position: absolute;
                    right: 0;
                    top: 0;
                    background: #dc4b1e;
                    padding: 10px 15px;
                    color: #fff;
                    cursor: pointer;
                }

                .status-title {
                    font-size: 20px;
                    padding: 20px 0;
                }

                .status {
                    margin: 20px 0;
                }

                .resend {
                    display: none;
                }

                .status .status-icon {
                    font-size: 30px;
                    vertical-align: middle;
                }

                .redirect {
                    margin: 50px 0 30px 0;
                }
            </style>
<?php
        }

    }
}