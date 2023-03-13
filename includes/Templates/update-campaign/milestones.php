<div class="give-donor-dashboard-tab-content" id="give_kindness-campaign-milestones" data-tab-content="give_kindness-campaign-milestones">
    <h4 class='gk-margin-bottom-10'>
        <?php echo __('Milestones', 'give-kindness'); ?>
    </h4>
    <div class="give-donor-dashboard-divider"></div>
    <div class="give-donor-dashboard-field-row">
        <div class="give-donor-dashboard-text-control">
            <label class="give-kindness-switch">
                <input class="widefat" id="give-kindness-milestone-switch" type="checkbox" name="give-kindness-milestone-switch" value="1">
                <div class="give-kindness-slider"></div>
            </label>
        </div>
    </div>
    <div class="give-donor-dashboard-field-row gk-margin-top-10 give-kindness-milestone-hide">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label">
                <?php echo __('Fundraising target', 'give-kindness'); ?>
            </label>
            <h4 class="give-kindness-milestone-label" id="give-kindness-milestone-label">
                $10000
            </h4>
        </div>
    </div>

    <div class="give-kindness-milestone-operate give-kindness-milestone-hide" id="give-kindness-milestone-operate">
        <div class="give-donor-dashboard-field-row">
            <div class="give-donor-dashboard-text-control">
                <label class="give-donor-dashboard-text-control__label" for="gk-milestone-goal">
                    <?php echo __('Milestone GOAL', 'give-kindness'); ?>
                </label>
                <div class="give-donor-dashboard-text-control__input">
                    <input id="gk-milestone-goal" name="gk-milestone-goal[]" type="text" placeholder="<?php echo __('$1000', 'give-kindness'); ?>"  maxlength="20">
                </div>
            </div>
            <div class="give-donor-dashboard-text-control">
                <label class="give-donor-dashboard-text-control__label" for="gk-milestone-goal">
                    <?php echo __('Label (40 characters)', 'give-kindness'); ?>
                </label>
                <div class="give-donor-dashboard-text-control__input">
                    <input id="gk-milestone-goal-label" name="gk-milestone-goal-label[]" type="text" placeholder="<?php echo __('Final Milestone', 'give-kindness'); ?>"  maxlength="40">
                </div>
            </div>
        </div>
        <button class="give-donor-dashboard-button give-donor-dashboard-button--primary" id="give-kindness-milestone-add">
            <?php echo __('Add', 'give-kindness'); ?>
        </button>
   </div>
</div>