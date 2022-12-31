

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