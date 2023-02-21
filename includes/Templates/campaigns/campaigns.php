<?php 
    $campaigns = $object->give_kindness_campaigns();
?>
<div class="give-donor-dashboard-tab-content" id="give_kindness-campaigns" data-tab-content="give_kindness-campaigns">
    <div class="give-donor-dashboard-heading give-donor-dashboard-campaign-heading">
        <span>
            <?php echo sprintf(__('%s Total Campaigns', 'give-kindness'), $campaigns->post_count); ?>
        </span>
        <button class="give-donor-dashboard-button give-donor-dashboard-button--primary give-donor-dashboard-create-campaign" id="gk-create-campaign" onClick="showHideContent('#give_kindness-campaigns', '#give_kindness-create-campaign')">
            Create Campaign      
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
            </svg>
        </button>
    </div>
    <div class="give-donor-dashboard-table">
        <div class="give-donor-dashboard-table__header">
            <div class="give-donor-dashboard-table__column"><?php echo __('Campaign','give-kindness');?></div>
            <div class="give-donor-dashboard-table__column"><?php echo __('Date','give-kindness');?></div>
            <div class="give-donor-dashboard-table__column"><?php echo __('Status','give-kindness');?></div>
        </div>

        <div class="give-donor-dashboard-table__rows">
            <?php if( $campaigns->have_posts() ) : ?>
            <?php foreach( $campaigns->posts as $campaign ) : ?>
            <div class="give-donor-dashboard-table__row">
                <div class="give-donor-dashboard-table__column">
                    <?php echo $campaign->post_title; ?>
                </div>
                <div class="give-donor-dashboard-table__column">
                    <div class="give-donor-dashboard-table__donation-date">
                        <?php echo date_i18n('F d, Y', strtotime($campaign->post_date)); ?>
                    </div>
                    <div class="give-donor-dashboard-table__donation-time">
                        <?php echo date_i18n('h:i:s a', strtotime($campaign->post_date)); ?>
                    </div>
                </div>
                <div class="give-donor-dashboard-table__column">
                    <div class="give-donor-dashboard-table__donation-status">
                        <div class="give-donor-dashboard-table__donation-status-indicator" style="background-color: <?php echo $object->give_kindness_campaign_status_color($campaign->post_status); ?>;"></div>
                        <div class="give-donor-dashboard-table__donation-status-label">
                            <?php echo ucfirst($campaign->post_status); ?>
                        </div>
                    </div>
                </div>
                <div class="give-donor-dashboard-table__pill">
                    <div class="give-donor-dashboard-table__donation-id">
                        <?php echo sprintf(__('ID: %d', 'give-kindness'), $campaign->ID); ?> 
                    </div>
                    <div class="give-donor-dashboard-table__donation-receipt">
                        <a href="javascript:void(0)" data-campaign-no="<?php echo $campaign->ID; ?>" class="view-campaign-btn" onClick="editCampaign()">
                            <?php echo __('Edit Campaign', 'give-kindness'); ?> 
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-right" class="svg-inline--fa fa-arrow-right fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path fill="currentColor" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
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

<?php give_kindness_templates_part('campaigns/create-campaign', $object); ?>
<?php give_kindness_templates_part('campaigns/edit-campaign', $object); ?>