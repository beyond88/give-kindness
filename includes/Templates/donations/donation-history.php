<?php 
   $repository = $object->donations();
   $donations = $repository['donations'];
   $count = $repository['count'];
   $revenue = $repository['revenue'];
   $average = $repository['average'];
?>
<div class="give-donor-dashboard-tab-content" id="give_kindness-donation-history" data-tab-content="give_kindness-donation-history">
   <div class="give-donor-dashboard-heading"><?php echo sprintf(__('%s Total Donations', 'give-kindness'), $count); ?></div>
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
               <a href="javascript:void(0)" data-receipt-no="<?php echo $id; ?>" class="view-receipt-btn" onClick="viewReceipt(this, 'give_kindness-donation-history')">
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
         <div class="give-donor-dashboard-table__footer-text">
            <?php echo sprintf(__('Showing %s - %s of %s Donations', 'give-kindness'), 1, 2, 2); ?>
         </div>
         <div class="give-donor-dashboard-table__footer-nav"></div>
      </div>
   </div>
</div>