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

    register_post_status( 'reject', array(
		'label'                     => _x( 'Reject', 'give_forms' ),
		'label_count'               => _n_noop( 'Reject <span class="count">(%s)</span>', 'Reject <span class="count">(%s)</span>'),
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
    if( @$post->post_type == 'give_forms' ) {

	echo "<script>
        jQuery(document).ready( function() {
            jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"approved\">Approved</option>' ); 
            jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"suspend\">Suspend</option>' );  
            jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"reject\">Reject</option>' );     
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

    if( @$post->post_type == 'give_forms' ) {
        echo "<script>
        jQuery(document).ready( function() {        
            jQuery( 'select[name=\"post_status\"]' ).append( '<option value=\"approved\">Approved</option>' );
        });
        </script>";
    }

    if( @$post->post_type == 'give_forms' ) {
        echo "<script>
        jQuery(document).ready( function() {        
            jQuery( 'select[name=\"post_status\"]' ).append( '<option value=\"suspend\">Suspend</option>' );
        });
        </script>";
    }

    if( @$post->post_type == 'give_forms' ) {
        echo "<script>
        jQuery(document).ready( function() {        
            jQuery( 'select[name=\"post_status\"]' ).append( '<option value=\"reject\">Reject</option>' );
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
add_filter( 'display_post_states', function( $status ) {
    
    global $post;

    if( @$post->post_type == 'give_forms' ) {

        if ( get_query_var( 'post_status' ) != 'approved' ) { // not for pages with all posts of this status
            if ( @$post->post_status == 'approved' ) {
                return array( 'Approved' );
            }
        }

        if ( get_query_var( 'post_status' ) != 'suspend' ) { // not for pages with all posts of this status
            if ( @$post->post_status == 'suspend' ) {
                return array( 'Suspend' );
            }
        }
    }
    return $status;
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

            $dashboard_page_id = Helpers::get_dashboard_page_id();
            $page_url = get_permalink($dashboard_page_id);
            ?>
            <script>
                window.location.href = "<?php echo $page_url; ?>";
            </script>    
            <?php 
        }
    }
}
add_action( 'init', 'gk_user_verification_auto_login' );

/**
 * Add dummy donations
 * 
 * @param none
 * @return void
 */
function gk_dummy_donations() {

    global $wpdb; 
    $user_table = $wpdb->prefix . 'users';
    $user_meta_table = $wpdb->prefix . 'usermeta';
    $role = 'administrator';
    $status = 1;
    $meta_key = 'gk_user_verify';

    $query = "SELECT u.ID, u.user_login, u.user_email
                FROM ".$user_table." u, ".$user_meta_table." m
                    WHERE u.ID = m.user_id
                        AND m.meta_key LIKE 'wp_capabilities'
                            AND m.meta_value LIKE '%".$role."%'";

    $results = $wpdb->get_results( $query, ARRAY_A );

    foreach( $results as $result ){
        $user_id = $result['ID'];
        Helpers::update_user_meta( $user_id, $meta_key, $status );
        $user = get_user_by( 'id', $user_id );
        Helpers::create_dummy_donations( $user );
    }

}
add_action( 'gk_dummy_donations', 'gk_dummy_donations' );

/**
 * Give Get Admin ID
 *
 * Helper function to return the ID of the post for admin usage
 *
 * @return string $post_id
 */
function give_kindness_get_admin_post_id() {
	$post_id = isset( $_REQUEST['post'] ) ? absint( $_REQUEST['post'] ) : null;

	$post_id = ! empty( $post_id ) ? $post_id : ( isset( $_REQUEST['post_id'] ) ? absint( $_REQUEST['post_id'] ) : null );

	$post_id = ! empty( $post_id ) ? $post_id : ( isset( $_REQUEST['post_ID'] ) ? absint( $_REQUEST['post_ID'] ) : null );

	return $post_id;
}

/**
 * Register and load font awesome CSS files using a CDN.
 */
function fontawesome_cdn_enqueue() {
	wp_enqueue_style( 
		'font-awesome-5', 
		'https://use.fontawesome.com/releases/v5.3.0/css/all.css', 
		array(), 
		'5.3.0' 
	);
}
add_action( 'wp_enqueue_scripts', 'fontawesome_cdn_enqueue' );

/**
 * Allow upload media this specific user
 *
 */
function give_kindness_allow_user_media()
{
    global $wp_roles;
    $roles = $wp_roles->get_names();
    $create_role_names = ['administrator', 'editor', 'author', 'contributor', 'subscriber', 'customer', 'shop_manager', 'give_donor', 'give_worker', 'give_accountant', 'give_manager', 'translator'];
    foreach ( $create_role_names as $create_role_name ) {
        if( array_key_exists( $create_role_name, $roles) ) {
            $customer = get_role( $create_role_name );
            $customer->add_cap('upload_files');
        }
    }

}
add_action( 'admin_init', 'give_kindness_allow_user_media' );

/**
 * For show current user attachment
 *
 * @param array $query
 * @return array
 */
function give_kindness_show_current_user_attachments( $query = array() )
{
    $user_id = get_current_user_id();
    if( $user_id && ! current_user_can('manage_options') ) {
        $query['author'] = $user_id;
    }
    return $query;
}
add_filter( 'ajax_query_attachments_args', 'give_kindness_show_current_user_attachments', 10, 1 );