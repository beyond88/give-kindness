

  (function($) {
    'use strict';


    /************************
     * 
     * Sidebar handle
     * 
     ************************/
    $(".give-donor-dashboard-tab-link").click(function() {
      $(".give-donor-dashboard-tab-link").removeClass("give-donor-dashboard-tab-link--is-active");
      $(this).addClass("give-donor-dashboard-tab-link--is-active");
      const targetTabContent = $(this).data('tab-id');
      $(".give-donor-dashboard-tab-link").each(function(index, item) {
        let currentTabContent = $(this).data('tab-id');
        if( currentTabContent !== undefined ){          
          if( currentTabContent === targetTabContent ){
            $('#'+currentTabContent).show();
          } else {
            $('#'+currentTabContent).hide();
          }

          // Hide receipt details content
          $('.view-receipt-details').hide();
        }
      });
    });

    $(document).on('click', '.give-donor-dashboard-avatar-control__dropzone', function(){
      document.getElementById("givekindness-avatar").click();
    });

    $(document).on('click', '#givekindness-avatar', function(){
      const file = this.files[0];
      if (file){
        let reader = new FileReader();
        reader.onload = function(event){
          $('.give-donor-dashboard-avatar-control__preview').children('img').attr('src', event.target.result);
        }
        reader.readAsDataURL(file);
      }
    });

    
    $(document).on('click', ".givekindness-prefix-select", function(){
      $('.givekindness-prefix-menu').toggle();
    });

    $(document).on('click', ".givekindness-prefix-selector", function(){
      let getPrefix = $(this).text();
      $('.givekindness-prefix-singleValue').text(getPrefix);
    });

    $("body").click
    (
      function(e)
      {
        if(e.target.className !== "givekindness-prefix-select")
        {
          $(".givekindness-prefix-menu").hide();
        }
      }
    );
    

    /**************************
    *  
    * Manage Email
    * 
    * 
    ***************************/

    $(document).on('click', "#givekindness-add-email", function(){
      $(this).before(`
        <div class="give-donor-dashboard-field-row additional-emails-area">
          <div class="give-donor-dashboard-text-control">
              <label class="give-donor-dashboard-text-control__label" for="additional-emails-729">Additional Emails</label>
              <div class="give-donor-dashboard-text-control__input">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" class="svg-inline--fa fa-envelope fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path>
                </svg>
                <input id="additional-emails-729" type="text" name="additional_emails[]" class="additional-emails">
              </div>
          </div>
          <div class="give-donor-dashboard__email-controls">
              <div class="give-donor-dashboard__make-primary-email">Make Primary</div>
              |
              <div class="give-donor-dashboard__delete-email">Delete</div>
          </div>
        </div>
      `);
    })

    $(document).on('click', ".give-donor-dashboard__delete-email", function(){
      $(this).parent().closest('.additional-emails-area').remove();
    });

    $(document).on('click', ".give-donor-dashboard__make-primary-email", function(){
      let primaryEmail = $('#givekindness-primary-email').val();
      let getEmail = $(this).parent().siblings().closest('.give-donor-dashboard-text-control').find('.additional-emails').val();

      $('#givekindness-primary-email').val(getEmail);
      $(this).parent().siblings().closest('.give-donor-dashboard-text-control').find('.additional-emails').val(primaryEmail);
    });


    /**************************
    *  
    * Manage Address
    * 
    * 
    ***************************/
    $(document).on('click', ".givekindness-country", function(){

    })
    $(document).on('click', "#givekindness-update-profile", function(){

    });

})(jQuery);

  /************************
   * 
   * View receipt details
   * 
   ************************/
function viewReceipt(that, id) {
  jQuery('#'+id).hide();
  let receiptNo = jQuery(that).data('receipt-no');
  let divId = '#receipt-no-'+receiptNo;
  jQuery(divId).show();
};

function closeReceipt(that, id) {
  jQuery('#'+id).show();
  let receiptNo = jQuery(that).data('receipt-no');
  let divId = '#receipt-no-'+receiptNo;
  jQuery(divId).hide();
};