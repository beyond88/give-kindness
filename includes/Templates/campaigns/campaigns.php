<?php 

    $campaigns = $object->give_kindness_campaigns();
    // echo "<pre>";
    // print_r($campaigns);
    // echo "</pre>";
?>
<div class="give-donor-dashboard-tab-content" id="give_kindness-campaigns" data-tab-content="give_kindness-campaigns">
    <div class="give-donor-dashboard-heading">
        <?php echo sprintf(__('%s Total Campaigns', 'give-kindness'), 0); ?>
    </div>
    <div class="give-donor-dashboard-table">
        <div class="give-donor-dashboard-table__header">
            <div class="give-donor-dashboard-table__column"><?php echo __('Campaign','give-kindness');?></div>
            <div class="give-donor-dashboard-table__column"><?php echo __('Date','give-kindness');?></div>
            <div class="give-donor-dashboard-table__column"><?php echo __('Status','give-kindness');?></div>
        </div>

        <div class="give-donor-dashboard-table__rows">
            <?php if( $campaigns->have_posts() ) :
            
            ?>
            <div class="give-donor-dashboard-table__row">
                <div class="give-donor-dashboard-table__column">
                </div>
                <div class="give-donor-dashboard-table__column">
                    <div class="give-donor-dashboard-table__donation-date">
                        <?php //echo $date; ?>
                    </div>
                    <div class="give-donor-dashboard-table__donation-time">
                        <?php// echo $time; ?>
                    </div>
                </div>
                <div class="give-donor-dashboard-table__column">
                    <div class="give-donor-dashboard-table__donation-status">
                        <div class="give-donor-dashboard-table__donation-status-indicator" style="background: rgb(122, 208, 58);"></div>
                        <div class="give-donor-dashboard-table__donation-status-label">
                            <?php //echo $status; ?>
                        </div>
                    </div>
                    <div class="give-donor-dashboard-table__donation-test-tag">
                        <?php //echo $method; ?>
                    </div>
                </div>
                <div class="give-donor-dashboard-table__pill">
                    <div class="give-donor-dashboard-table__donation-id">
                        <?php echo __('ID:', 'give-kindness'); ?>  <?php //echo $reciept; ?>
                    </div>
                    <div class="give-donor-dashboard-table__donation-receipt"></div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <div class="give-donor-dashboard-table__footer">
            <div class="give-donor-dashboard-table__footer-text">
                <?php echo sprintf(__('Showing %s - %s of %s Campaigns', 'give-kindness'), 1, 2, 2); ?>
            </div>
            <div class="give-donor-dashboard-table__footer-nav"></div>
        </div>
    </div>
</div>