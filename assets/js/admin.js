(function($) {
    'use strict';


    var $postStatusSelect = $('#post-status-select');

    var postStatus = $('#hidden_post_status');
    $('#post-status-display').text(postStatus.val());

    var box = $postStatusSelect.find('.save-post-status');
    if (typeof box === 'object' && box !== null && 'addEventListener' in box) {
        box.addEventListener('click', function onClick() {
            console.log('box clicked');
        });
    }
    // $postStatusSelect.find('.save-post-status').on( 'click', function( event ) {
       
    //     if ( $('#post_status option:selected').val() == 'pending' ) {
    //         $('#save-post').show().val('Save as Pending');
    //     } else if ( $('#post_status option:selected').val() == 'approved' ) {
    //         $('#save-post').show().val('Save as Approved');
    //     } else if ( $('#post_status option:selected').val() == 'suspend' ) {
    //         $('#save-post').show().val('Save as Suspend');
    //     } else {
    //         $('#save-post').show().val('Save Draft');
    //     }

    //     event.preventDefault();
    // });

})(jQuery);