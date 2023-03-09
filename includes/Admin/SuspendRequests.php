<?php
namespace Give_Kindness\Admin;
use Give_Kindness\Admin\SuspendRequestsTable;

/**
 * The suspend requests class
 */
class SuspendRequests {

	/**
	 * This function initiates a submenu page
	 *
	 * @access public
	 * @since  1.1
	 *
	 * @param none
	 *
	 * @return void
	 */
    function __construct() { 
        add_action( 'admin_menu', [ $this, 'add_suspend_requests' ], 10 );
    }

	/**
	 * This function add a submenu page under donations menu
	 *
	 * @access public
	 * @since  1.1
	 *
	 * @param none
	 *
	 * @return void
	 */
    public function add_suspend_requests() {

        add_submenu_page(
            'edit.php?post_type=give_forms',
            esc_html__( 'Suspend requests', 'give-kindness' ),
            esc_html__( 'Suspend requests', 'give-kindness' ),
            'manage_give_settings',
            'suspend-requests',
            [
                $this,
                'output',
            ]
        );

    }

	/**
	 * This function add a submenu page under donations menu
	 *
	 * @access public
	 * @since  1.1
	 *
	 * @param none
	 *
	 * @return string Column Name
	 */
    public function output() {

		$suspend_requests = new SuspendRequestsTable();
        include 'views/html-suspend-requests.php';
    }

}
