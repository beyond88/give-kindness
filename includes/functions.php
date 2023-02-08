<?php 

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

function give_kindness_templates_part( $file, $object = NULL ){

    $template = '';
    $file_exists = GIVE_KINDNESS_TEMPLATES . $file. ".php";
    if( file_exists($file_exists) ) {
        $template = require_once GIVE_KINDNESS_TEMPLATES . $file . ".php";
    }
    return $template; 
}