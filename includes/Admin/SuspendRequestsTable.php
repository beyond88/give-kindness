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
         * @var SuspendRequestsTable $email_notifications
         * @since  1.1
         * @access private
         */
        private $email_notifications;

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

            $this->email_notifications = SuspendRequestsTable::get_instance();
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
         * Get name column.
         *
         * @since  1.1
         * @access public
         *
         * @param Give_Email_Notification $email
         *
         * @return  string
         */
        public function column_name( $email ) {
            // $edit_url = esc_url( admin_url( 'edit.php?post_type=give_forms&page=give-settings&tab=emails&section=' . $email->config['id'] ) );
            // $actions  = $this->get_row_actions( $email );

            // ob_start();
            // ?>
            // <a class="row-title" href="<?php echo $edit_url; ?>"><?php echo $email->config['label']; ?></a>

            // <?php echo $this->row_actions( $actions ); ?>
            // <?php
            // return ob_get_clean();

            return '';
        }

        /**
         * Get recipient column.
         *
         * @since  1.1
         * @access public
         *
         * @param Give_Email_Notification $email
         *
         * @return string
         */
        public function column_requested_by( $email ) {
            // ob_start();

            // if ( Give_Email_Notification_Util::has_recipient_field( $email ) ) {
            //     $recipients = $email->get_recipient();
            //     if ( is_array( $recipients ) ) {
            //         $recipients = implode( '<br>', $recipients );
            //     }

            //     echo $recipients;

            // } elseif ( ! empty( $email->config['recipient_group_name'] ) ) {
            //     echo $email->config['recipient_group_name'];
            // }

            // return ob_get_clean();

            return '';
        }

        /**
         * Get status column.
         *
         * @since  1.1
         * @access public
         *
         * @param Give_Email_Notification $email
         *
         * @return string
         */
        public function column_cb( $email ) {
            // $notification_status  = $email->get_notification_status();
            // $user_can_edit_status = (int) Give_Email_Notification_Util::is_notification_status_editable( $email );
            // $icon_classes         = Give_Email_Notification_Util::is_email_notification_active( $email )
            //     ? 'dashicons dashicons-yes'
            //     : 'dashicons dashicons-no-alt';
            // $attributes           = array(
            //     'class'       => "give-email-notification-status give-email-notification-{$notification_status}",
            //     'data-id'     => $email->config['id'],
            //     'data-status' => $email->get_notification_status(),
            //     'data-edit'   => $user_can_edit_status,
            // );

            // if ( ! $user_can_edit_status ) {
            //     $icon_classes = 'dashicons dashicons-lock';

            //     $attributes['data-notice'] = esc_attr( $email->config['notices']['non-notification-status-editable'] );
            // }

            // $html = sprintf(
            //     '<span %1$s><i class="%2$s"></i></span></span><span class="spinner"></span>',
            //     give_get_attribute_str( $attributes ),
            //     $icon_classes
            // );
            $html = ''; 

            return $html;
        }

        /**
         * Get email_type column.
         *
         * @since  1.1
         * @access public
         *
         * @param Give_Email_Notification $email
         *
         * @return string
         */
        public function column_reason( Give_Email_Notification $email ) {
            // $email_content_type_label = apply_filters(
            //     "give_email_list_render_{$email->config['id']}_email_content_type",
            //     Give_Email_Notification_Util::get_formatted_email_type( $email->config['content_type'] ),
            //     $email
            // );

            // return $email_content_type_label;
            return '';
        }

        /**
         * Get setting column.
         *
         * @since  1.1
         * @access public
         *
         * @param Give_Email_Notification $email
         *
         * @return string
         */
        public function column_status( Give_Email_Notification $email ) {
            // return Give()->tooltips->render_link(
            //     array(
            //         'label'       => __( 'Edit', 'give' ) . " {$email->config['label']}",
            //         'tag_content' => '<span class="dashicons dashicons-admin-generic"></span>',
            //         'link'        => esc_url( admin_url( 'edit.php?post_type=give_forms&page=give-settings&tab=emails&section=' . $email->config['id'] ) ),
            //         'attributes'  => array(
            //             'class' => 'button button-small',
            //         ),
            //     )
            // );

            return '';
        }

        /**
         * Print row actions.
         *
         * @since  1.1
         * @access private
         *
         * @param Give_Email_Notification $email
         *
         * @return array
         */
        private function get_row_actions( $email ) {
            // $edit_url = esc_url( admin_url( 'edit.php?post_type=give_forms&page=give-settings&tab=emails&section=' . $email->config['id'] ) );

            // /**
            //  * Filter the row actions
            //  *
            //  * @since 1.1
            //  *
            //  * @param array $row_actions
            //  */
            // $row_actions = apply_filters(
            //     'give_email_notification_row_actions',
            //     array(
            //         'edit' => "<a href=\"{$edit_url}\">" . __( 'Edit', 'give' ) . '</a>',
            //     ),
            //     $email
            // );

            $row_actions = '';

            return $row_actions;
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
            $email_notifications   = array();
            $sortable              = $this->get_sortable_columns();
            $this->_column_headers = array( $columns, $hidden, $sortable, $this->get_primary_column_name() );

            $total_items = count( $email_notifications );
            $this->items = $email_notifications;
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