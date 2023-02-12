<?php

use Give_Kindness\Helpers;

/**
 * Add custom post status
 * 
 * @param none
 * @return void
 */
function give_kindness_campaign_status(){
	register_post_status( 'approved', array(
		'label'                     => _x( 'Approved', 'give_forms' ),
		'label_count'               => _n_noop( 'Approved <span class="count">(%s)</span>', 'Approved <span class="count">(%s)</span>'),
		'public'                    => true,
		'exclude_from_search'       => false,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true
	));

    register_post_status( 'suspend', array(
		'label'                     => _x( 'Suspend', 'give_forms' ),
		'label_count'               => _n_noop( 'Suspend <span class="count">(%s)</span>', 'Suspend <span class="count">(%s)</span>'),
		'public'                    => true,
		'exclude_from_search'       => false,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true
	));
}
add_action( 'init', 'give_kindness_campaign_status' );


/**
 * Add custom post status dropdown
 * 
 * @param none
 * @return void
 */
function give_kindness_status_add_in_quick_edit() {

    global $post;
    if($post->post_type == 'give_forms') {

	echo "<script>
        jQuery(document).ready( function() {
            jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"approved\">Approved</option>' ); 
            jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"suspend\">Suspend</option>' );     
        });
	</script>";
    }

}
add_action('admin_footer-edit.php','give_kindness_status_add_in_quick_edit');

/**
 * Save custom post status
 * 
 * @param none
 * @return void
 */
function give_kindness_status_add_in_post_page() {

    global $post;
    if($post->post_type == 'give_forms') {
        echo "<script>
        jQuery(document).ready( function() {        
            jQuery( 'select[name=\"post_status\"]' ).append( '<option value=\"approved\">Approved</option>' );
        });
        </script>";
    }

    if($post->post_type == 'give_forms') {
        echo "<script>
        jQuery(document).ready( function() {        
            jQuery( 'select[name=\"post_status\"]' ).append( '<option value=\"suspend\">Suspend</option>' );
        });
        </script>";
    }
}
add_action('admin_footer-post.php', 'give_kindness_status_add_in_post_page');
add_action('admin_footer-post-new.php', 'give_kindness_status_add_in_post_page');

/**
 * Filter post status and 
 * check custom post status
 * 
 * @param string
 * @return string
 */
add_filter( 'display_post_states', function( $statuses ) {
    global $post;

    if( $post->post_type == 'give_forms') {

        if ( get_query_var( 'post_status' ) != 'approved' ) { // not for pages with all posts of this status
            if ( $post->post_status == 'approved' ) {
                return array( 'Approved' );
            }
        }

        if ( get_query_var( 'post_status' ) != 'suspend' ) { // not for pages with all posts of this status
            if ( $post->post_status == 'suspend' ) {
                return array( 'Suspend' );
            }
        }
    }
    return $statuses;
});

/**
 * Load template files
 * 
 * @param string, $object
 * @return string
 */
function give_kindness_templates_part( $file, $object = NULL ){

    $template = '';
    $file_exists = GIVE_KINDNESS_TEMPLATES . $file. ".php";
    if( file_exists($file_exists) ) {
        $template = require_once GIVE_KINDNESS_TEMPLATES . $file . ".php";
    }
    return $template; 
}

/**
 * Check user verification
 * 
 * @param none
 * @return string
 */
add_action('wp_footer', [ new Give_Kindness\User(), 'check_email_verification' ] );

/**
 * Auto login after user verification 
 * 
 * @param string, $object
 * @return string
 */
add_action( 'init', 'gk_user_verification_auto_login' );
function gk_user_verification_auto_login(){
    if (
        isset($_REQUEST['gk_user_verification_action']) && trim($_REQUEST['gk_user_verification_action']) == 'autologin' &&
        isset($_REQUEST['gk_activation_key'])
    ) {

        $activation_key = isset($_REQUEST['gk_activation_key']) ? sanitize_text_field($_REQUEST['gk_activation_key']) : '';

        global $wpdb;
        $table = $wpdb->prefix . "usermeta";
        $meta_data    = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table WHERE meta_value = %s AND meta_key = 'gk_activation_key'", $activation_key));

        if (empty($meta_data)) return;

        $user = get_user_by('id', $meta_data->user_id);

        $user_activation_status = get_user_meta($meta_data->user_id, 'gk_user_verify', true);

        if ($user_activation_status == 1) {
            wp_set_current_user($meta_data->user_id, $user->user_login);
            wp_set_auth_cookie($meta_data->user_id);
            do_action('wp_login', $user->user_login, $user);
        }
    }
}

/**
 * Add dummy donations
 * 
 * @param none
 * @return void
 */
add_action( 'gk_dummy_donations', 'gk_dummy_donations' );
function gk_dummy_donations() {

    global $wpdb; 
    $user_table = $wpdb->prefix . 'users';
    $user_meta_table = $wpdb->prefix . 'usermeta';
    $role = 'administrator';

    $query = "SELECT u.ID, u.user_login, u.user_email, m.first_name, m.last_name
                FROM ".$user_table." u, ".$user_meta_table." m
                    WHERE u.ID = m.user_id
                        AND m.meta_key LIKE 'wp_capabilities'
                            AND m.meta_value LIKE '%".$role."%'";

    $results = $wpdb->get_results( $query, ARRAY_A );

    foreach( $results as $result ){
        $user_id = $result['ID'];
        $user = get_user_by( 'id', $user_id );
        Helpers::create_dummy_donations( $user );
    }
}

