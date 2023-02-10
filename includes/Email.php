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
    public function send_verification_email( $user ){


        $subject = __( 'User verification', 'give-kindness' );
        $message  = sprintf(__( 'Dear %s,', 'give-kindness' ), $user['name'] ) . "\n\n";
        $message .= __( 'Your registration has been successfully. ', 'give-kindness' );
        $message .= __( 'Click the below link to verify yourself. ', 'give-kindness' );
        $message
         .= sprintf(
            '<a href="%1$s">%2$s</a>',
            admin_url( 'edit.php?post_type=give_forms&page=give-payment-history&view=view-payment-details&id=' . $user['verify_hash'] ),
            __( 'Verify yourself', 'give-kindness' )
        ) . "\n\n";

        $attachments = '';
        $this->emails->send( $to_email, $subject, $message, $attachments );

    }


}