<?php 
    $repository = new Give\DonorDashboards\Repositories\Donations;
    $donations = $repository->getDonations(get_current_user_id());
    $count = $repository->getDonationCount(get_current_user_id());
    $revenue = $repository->getRevenue(get_current_user_id());
    $average = $repository->getAverageRevenue(get_current_user_id());

    echo "<pre>";
    print_r($donations);
    echo "</pre>";
?>
<div class="give-donor-dashboard-dashboard-content">
    <div class="give-donor-dashboard-heading">
        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chart-line" class="svg-inline--fa fa-chart-line fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor" d="M496 384H64V80c0-8.84-7.16-16-16-16H16C7.16 64 0 71.16 0 80v336c0 17.67 14.33 32 32 32h464c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16zM464 96H345.94c-21.38 0-32.09 25.85-16.97 40.97l32.4 32.4L288 242.75l-73.37-73.37c-12.5-12.5-32.76-12.5-45.25 0l-68.69 68.69c-6.25 6.25-6.25 16.38 0 22.63l22.62 22.62c6.25 6.25 16.38 6.25 22.63 0L192 237.25l73.37 73.37c12.5 12.5 32.76 12.5 45.25 0l96-96 32.4 32.4c15.12 15.12 40.97 4.41 40.97-16.97V112c.01-8.84-7.15-16-15.99-16z"></path>
        </svg>
        <?php echo __('Your Giving Stats','givekindness'); ?>
    </div>
    <div class="give-donor-dashboard-dashboard__stats">
        <div class="give-donor-dashboard-dashboard__stat">
            <div class="give-donor-dashboard-dashboard__figure" style="color: rgb(104, 187, 108);"><?php echo intval($count); ?></div>
            <div class="give-donor-dashboard-dashboard__detail"><?php echo __('Number of donations','givekindness');?></div>
        </div>
        <div class="give-donor-dashboard-dashboard__stat">
            <div class="give-donor-dashboard-dashboard__figure" style="color: rgb(104, 187, 108);"><span class="give-donor-dashboard-dashboard__figure-currency"><?php echo give_currency_symbol(give_get_currency(), true); ?></span><?php echo $revenue; ?></div>
            <div class="give-donor-dashboard-dashboard__detail"><?php echo __('Lifetime donations','givekindness');?></div>
        </div>
        <div class="give-donor-dashboard-dashboard__stat">
            <div class="give-donor-dashboard-dashboard__figure" style="color: rgb(104, 187, 108);"><span class="give-donor-dashboard-dashboard__figure-currency"><?php echo give_currency_symbol(give_get_currency(), true); ?></span><?php echo $average; ?></div>
            <div class="give-donor-dashboard-dashboard__detail"><?php echo __('Average donation','givekindness');?></div>
        </div>
    </div>
    <div class="give-donor-dashboard-heading">
        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar-alt" class="svg-inline--fa fa-calendar-alt fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path fill="currentColor" d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"></path>
        </svg>
        <?php echo __('Recent Donations','givekindness');?>
    </div>
    <div class="give-donor-dashboard-table">
        <div class="give-donor-dashboard-table__header">
            <div class="give-donor-dashboard-table__column"><?php echo __('Donation','givekindness');?></div>
            <div class="give-donor-dashboard-table__column"><?php echo __('Campaign','givekindness');?></div>
            <div class="give-donor-dashboard-table__column"><?php echo __('Date','givekindness');?></div>
            <div class="give-donor-dashboard-table__column"><?php echo __('Status','givekindness');?></div>
        </div>
        <?php if( ! empty( $donations ) ) : ?>
        <?php foreach( $donations as $donation ): ?>
        <?php 
            $title = $donation['form']['title'];
            $total = $donation['payment']['total'];
            $date = $donation['payment']['date'];
            $time = $donation['payment']['time'];
            $method = $donation['payment']['method'];
            $status = $donation['payment']['status']['label'];
            $color = $donation['payment']['status']['color'];
        ?>
        <div class="give-donor-dashboard-table__rows">
            <div class="give-donor-dashboard-table__row">
            <div class="give-donor-dashboard-table__column">
                <div class="give-donor-dashboard-table__donation-amount"><?php echo $total; ?></div>
            </div>
            <div class="give-donor-dashboard-table__column"><?php echo $title; ?></div>
            <div class="give-donor-dashboard-table__column">
                <div class="give-donor-dashboard-table__donation-date"><?php echo $date; ?></div>
                <div class="give-donor-dashboard-table__donation-time"><?php echo $time; ?></div>
            </div>
            <div class="give-donor-dashboard-table__column">
                <div class="give-donor-dashboard-table__donation-status">
                    <div class="give-donor-dashboard-table__donation-status-indicator" style="background: rgb(122, 208, 58);"></div>
                    <div class="give-donor-dashboard-table__donation-status-label"><?php echo $status; ?></div>
                </div>
                <div class="give-donor-dashboard-table__donation-test-tag"><?php echo $method; ?></div>
            </div>
            <div class="give-donor-dashboard-table__pill">
                <div class="give-donor-dashboard-table__donation-id">ID: 2</div>
                <div class="give-donor-dashboard-table__donation-receipt">
                    <a href="#/donation-history/133">
                        View Receipt 
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-right" class="svg-inline--fa fa-arrow-right fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="currentColor" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"></path>
                        </svg>
                    </a>
                </div>
            </div>
            </div>
    
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
        <div class="give-donor-dashboard-table__footer">
            <div class="give-donor-dashboard-table__footer-text">Showing 1 - 2 of 2 Donations</div>
            <div class="give-donor-dashboard-table__footer-nav"></div>
        </div>
    </div>
</div>