

  (function($) {
    'use strict';

    $(".give-donor-dashboard-tab-link").click(function() {
        $(".give-donor-dashboard-tab-link").removeClass("give-donor-dashboard-tab-link--is-active");
        $(this).addClass("give-donor-dashboard-tab-link--is-active");
    });

})(jQuery);