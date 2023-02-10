<?php

namespace Give_Kindness;

/**
 * Email handlers class
 */
class Email {
    

    public $emails;
    
    
    /*
    * 
    * @param none
    * @return void
    */
    public function __construct( ) {
        $this->emails = \Give()->emails;
    }

    /**
    * Send verification email
    *
    * @param string
    * @return void
    **/
    public function send_verification_email( $user ) {

        $dashboard_page_id = Helpers::get_dashboard_page_id();
        $page_url = get_permalink($dashboard_page_id);
        $page_url .= '?subscribe';  
        
        $subject = __( 'User verification', 'give-kindness' );
        $message  = sprintf(__( 'Dear %s,', 'give-kindness' ), $user->display_name ) . "\n\n";
        $message .= __( 'Your registration has been successfull. ', 'give-kindness' );
        $message .= __( 'Click the below link to verify yourself. ', 'give-kindness' );
        $message
         .= sprintf(
            '<a href="%1$s">%2$s</a>',
            $page_url,
            __( 'Verify yourself', 'give-kindness' )
        ) . "\n\n";

        $attachments = '';
        $this->emails->send( $user->user_email, $subject, $message, $attachments );

    }


}