<?php
namespace Give_Kindness\Admin;


/**
 * Campaign suspend request
 *
 * This class handles table html for suspend request listing.
 *
 * @package     Give_Kindness
 * @license     https://opensource.org/licenses/gpl-license GNU Public License
 * @since       1.1
 */
if ( ! class_exists( 'WP_List_Table' ) ) {
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

if ( ! class_exists( 'SuspendRequestsTable' ) ) :

    class SuspendRequestsTable extends \WP_List_Table {

        /**
         * Number of email notifications per page
         *
         * @since  1.1
         * @access private
         * @var int
         */
        private $per_page = - 1;

        /**
         * Give_Email_Notification_Table constructor.
         *
         * @since  1.1
         * @access public
         */
        public function __construct() {
            parent::__construct(
                array(
                    'singular' => 'suspendrequest',
                    'plural'   => 'suspendrequests',
                )
            );
        }

        /**
         * Get table columns.
         *
         * @since  1.1
         * @access public
         *
         * @return array
         */
        public function get_columns() {
            /**
             * Filter the table columns
             *
             * @since 1.1
             */
            return apply_filters(
                'give_kindness_suspend_requests',
                array(
                    'cb'         => __( 'Campaign', 'give-kindness' ),
                    'name'       => __( 'Campaign', 'give-kindness' ),
                    'requested_by' => __( 'Requested by', 'give-kindness' ),
                    'reason'  => __( 'Reason', 'give-kindness' ),
                    'status'    => __( 'Status', 'give-kindness' ),
                    'action'    => __( 'Action', 'give-kindness' ),
                )
            );
        }

        /**
        * Generates content for a single row of the table.
        *
        * @param object $item The current item.
        * @param string $column_name The current column name.
        */
        protected function column_default( $item, $column_name ) {
            switch ( $column_name ) {
                case 'name':
                    return esc_html( $item->post_title );
                case 'requested_by':
                    return esc_html( $item->ID );
                case 'reason':
                    return esc_html( $item->post_title );
                case 'status':
                    return esc_html( $item->post_title );
                return 'Unknown';
            }
        }

        /**
         * Prepare suspend requests data
         *
         * @since  1.1
         * @access public
         */
        public function get_suspend_requests() {

            $suspend_requests_args = array(
                'post_type' => 'give_forms',
                'orderby'   => 'meta_value',
                'order' => 'DESC',
                'meta_query' => array(
                     'meta_value' => array(
                          'key' => 'suspend_request'
              )));
          
            return new \WP_Query($suspend_requests_args);

        }

        /**
         * Decide which columns to activate the sorting functionality on
         * @return array $sortable, the array of columns that can be sorted by the user
         */
        public function get_sortable_columns() {
            $sortable_columns = [
                'name' => [ 'name',true ],
                'requested_by' => [ 'requested_by',true ],
                'reason' => [ 'reason',true ],
                'status' => [ 'status',true ],
                'action' => [ 'action',true ],
            ]; 
            return $sortable_columns;

        }

        /**
         * Prepare email notifications
         *
         * @since  1.1
         * @access public
         */
        public function prepare_items() {
            // Set columns.
            $columns               = $this->get_columns();
            $hidden                = array();
            $suspend_requests       = array();
            $sortable              = $this->get_sortable_columns();
            $this->_column_headers = array( $columns, $hidden, $sortable, $this->get_primary_column_name() );

            $suspend_requests = $this->get_suspend_requests();
            // echo "<pre>";
            // print_r($suspend_requests->posts);
            // echo "</pre>";

            $total_items = $suspend_requests->post_count;
            $this->items = (array) $suspend_requests->posts;
            $this->set_pagination_args(
                array(
                    'total_items' => $total_items,
                    'per_page'    => $this->per_page,
                )
            );
        }

        /**
         * Message to be displayed when there are no items
         *
         * @since  1.1
         * @access public
         */
        public function no_items() {
            _e( 'No suspend requests found.', 'give-kindness' );
        }

        /**
         * Get primary column.
         *
         * @since  2,0
         * @access public
         *
         * @return string Name of the default primary column.
         */
        public function get_primary_column_name() {
            return 'name';
        }

    }

endif; 