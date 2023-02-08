<?php
    $repository = $object->donations();
    $donations = $repository['donations'];
    $count = $repository['count'];
    $revenue = $repository['revenue'];
    $average = $repository['average'];
?>
<div class="give-donor-dashboard-content" id="give_kindness-stats" data-tab-content="give_kindness-stats">
    <div class="give-donor-dashboard-heading">
        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chart-line" class="svg-inline--fa fa-chart-line fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor" d="M496 384H64V80c0-8.84-7.16-16-16-16H16C7.16 64 0 71.16 0 80v336c0 17.67 14.33 32 32 32h464c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16zM464 96H345.94c-21.38 0-32.09 25.85-16.97 40.97l32.4 32.4L288 242.75l-73.37-73.37c-12.5-12.5-32.76-12.5-45.25 0l-68.69 68.69c-6.25 6.25-6.25 16.38 0 22.63l22.62 22.62c6.25 6.25 16.38 6.25 22.63 0L192 237.25l73.37 73.37c12.5 12.5 32.76 12.5 45.25 0l96-96 32.4 32.4c15.12 15.12 40.97 4.41 40.97-16.97V112c.01-8.84-7.15-16-15.99-16z"></path>
        </svg>
        <?php echo __('Your Giving Stats','give-kindness'); ?>
    </div>
    <div class="give-donor-dashboard-dashboard__stats">
        <div class="give-donor-dashboard-dashboard__stat">
            <div class="give-donor-dashboard-dashboard__figure" style="color: rgb(104, 187, 108);"><?php echo intval($count); ?></div>
            <div class="give-donor-dashboard-dashboard__detail"><?php echo __('Number of donations','give-kindness');?></div>
        </div>
        <div class="give-donor-dashboard-dashboard__stat">
            <div class="give-donor-dashboard-dashboard__figure" style="color: rgb(104, 187, 108);"><span class="give-donor-dashboard-dashboard__figure-currency"><?php echo give_currency_symbol(give_get_currency(), true); ?></span><?php echo $revenue; ?></div>
            <div class="give-donor-dashboard-dashboard__detail"><?php echo __('Lifetime donations','give-kindness');?></div>
        </div>
        <div class="give-donor-dashboard-dashboard__stat">
            <div class="give-donor-dashboard-dashboard__figure" style="color: rgb(104, 187, 108);"><span class="give-donor-dashboard-dashboard__figure-currency"><?php echo give_currency_symbol(give_get_currency(), true); ?></span><?php echo $average; ?></div>
            <div class="give-donor-dashboard-dashboard__detail"><?php echo __('Average donation','give-kindness');?></div>
        </div>
    </div>
    <div class="give-donor-dashboard-heading">
        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar-alt" class="svg-inline--fa fa-calendar-alt fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path fill="currentColor" d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"></path>
        </svg>
        <?php echo __('Recent Donations','give-kindness');?>
    </div>
    <div class="give-donor-dashboard-table">
        <div class="give-donor-dashboard-table__header">
            <div class="give-donor-dashboard-table__column"><?php echo __('Donation','give-kindness');?></div>
            <div class="give-donor-dashboard-table__column"><?php echo __('Campaign','give-kindness');?></div>
            <div class="give-donor-dashboard-table__column"><?php echo __('Date','give-kindness');?></div>
            <div class="give-donor-dashboard-table__column"><?php echo __('Status','give-kindness');?></div>
        </div>

        <div class="give-donor-dashboard-table__rows">

            <?php if( ! empty( $donations ) ) : ?>
            <?php $reciept = count($donations); ?>
            <?php foreach( $donations as $donation ): ?>
            <?php 
                $id = $donation['id'];
                $title = $donation['form']['title'];
                $total = $donation['payment']['total'];
                $date = $donation['payment']['date'];
                $time = $donation['payment']['time'];
                $method = $donation['payment']['method'];
                $status = $donation['payment']['status']['label'];
                $color = $donation['payment']['status']['color'];
                $recieptNo = $reciept-1;
            ?>
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
                    <div class="give-donor-dashboard-table__donation-id"><?php echo __('ID:', 'give-kindness'); ?>  <?php echo $reciept; ?></div>
                    <div class="give-donor-dashboard-table__donation-receipt">
                        <a href="javascript:void(0)" data-receipt-no="<?php echo $id; ?>" class="view-receipt-btn" onClick="viewReceipt(this, 'give_kindness-stats')">
                            <?php echo __('View Receipt', 'give-kindness'); ?> 
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-right" class="svg-inline--fa fa-arrow-right fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path fill="currentColor" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <?php $reciept--; ?>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="give-donor-dashboard-table__footer">
            <div class="give-donor-dashboard-table__footer-text">Showing 1 - 2 of 2 Donations</div>
            <div class="give-donor-dashboard-table__footer-nav"></div>
        </div>
    </div>
</div>

<?php if( ! empty( $donations ) ) : ?>
<?php $reciepts = count($donations); ?>
<?php foreach( $donations as $donation ): ?>
<?php 
    $recieptNO = $reciepts; 
    $formId = $donation['id'];
    $fullName = $donation['donor']['first_name'].' '.$donation['donor']['last_name'];
    $email = $donation['donor']['email'];
    $title = $donation['form']['title'];
    $amount = $donation['payment']['amount'];
    $total = $donation['payment']['total'];
    $date = $donation['payment']['date'];
    $time = $donation['payment']['time'];
    $method = $donation['payment']['method'];
    $status = $donation['payment']['status']['label'];
    $color = $donation['payment']['status']['color'];
?>
<div class="give-donor-dashboard-tab-content view-receipt-details" id="receipt-no-<?php echo $formId; ?>" style="display:none;">
   <div class="give-donor-dashboard-heading"><?php echo sprintf(__('Donation Receipt #%s', 'give-kindness'), $recieptNO); ?></div>
   <div class="give-donor-dashboard-donation-receipt__table">
      <div class="give-donor-dashboard-donation-receipt__row">
         <div class="give-donor-dashboard-donation-receipt__detail">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" class="svg-inline--fa fa-user fa-w-14 fa-fw " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
               <path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path>
            </svg>
            <?php echo __('Donor Name', 'give-kindness'); ?> 
         </div>
         <div class="give-donor-dashboard-donation-receipt__value"><?php echo $fullName; ?></div>
      </div>
      <div class="give-donor-dashboard-donation-receipt__row">
         <div class="give-donor-dashboard-donation-receipt__detail">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" class="svg-inline--fa fa-envelope fa-w-16 fa-fw " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
               <path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path>
            </svg>
            <?php echo __('Email Address', 'give-kindness'); ?> 
         </div>
         <div class="give-donor-dashboard-donation-receipt__value"><?php echo $email; ?></div>
      </div>
   </div>
   <div class="give-donor-dashboard-donation-receipt__table">
      <div class="give-donor-dashboard-donation-receipt__row">
         <div class="give-donor-dashboard-donation-receipt__detail"> <?php echo __('Payment Status', 'give-kindness'); ?> </div>
         <div class="give-donor-dashboard-donation-receipt__value">
            <div class="give-donor-dashboard-donation-receipt__status-indicator" style="background: rgb(122, 208, 58);"></div>
            <?php echo $status; ?>
         </div>
      </div>
      <div class="give-donor-dashboard-donation-receipt__row">
         <div class="give-donor-dashboard-donation-receipt__detail"> <?php echo __('Payment Method', 'give-kindness'); ?></div>
         <div class="give-donor-dashboard-donation-receipt__value"><?php echo $method; ?></div>
      </div>
      <div class="give-donor-dashboard-donation-receipt__row">
         <div class="give-donor-dashboard-donation-receipt__detail"> <?php echo __('Donation Amount', 'give-kindness'); ?></div>
         <div class="give-donor-dashboard-donation-receipt__value"><?php echo $amount; ?></div>
      </div>
      <div class="give-donor-dashboard-donation-receipt__row give-donor-dashboard-donation-receipt__row--footer">
         <div class="give-donor-dashboard-donation-receipt__detail"> <?php echo __('Donation Total', 'give-kindness'); ?></div>
         <div class="give-donor-dashboard-donation-receipt__value"><?php echo $total; ?></div>
      </div>
   </div>
   <div class="give-donor-dashboard__donation-history-footer">
      <a href="javascript:void(0)" class="close-receipt" data-receipt-no="<?php echo $formId; ?>" onClick="closeReceipt(this, 'give_kindness-stats')">
        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" class="svg-inline--fa fa-arrow-left fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path fill="currentColor" d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z"></path>
        </svg>
        <?php echo __('Back to Donation History', 'give-kindness'); ?> 
      </a>
   </div>
</div>
<?php $reciepts--; ?>
<?php endforeach; ?>
<?php endif; ?>