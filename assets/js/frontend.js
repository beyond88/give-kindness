

  (function($) {
    'use strict';

    $(".give-donor-dashboard-tab-link").click(function() {
        $(".give-donor-dashboard-tab-link").removeClass("give-donor-dashboard-tab-link--is-active");
        $(this).addClass("give-donor-dashboard-tab-link--is-active");
    });

    $(document).on('click', '.view-receipt-btn', function(){
      
      $('#givekindness-dashboard-content').hide();
      let receiptNo = $(this).data('receipt-no');
      let divId = '#receipt-no-'+receiptNo;
      console.log('my data==>',divId);
      $(divId).show();
    });


    $(document).on('click', '.close-receipt', function(){
      
      $('#givekindness-dashboard-content').show();
      let receiptNo = $(this).data('receipt-no');
      let divId = '#receipt-no-'+receiptNo;
      console.log('my data==>',divId);
      $(divId).hide();
    });
    

})(jQuery);