

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
        }
      });
    });

    /************************
     * 
     * View receipt details
     * 
     ************************/

})(jQuery);


function viewReceipt(that, id) {
  console.log('data==>', that);
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