<div class="give-donor-dashboard-tab-content" id="give_kindness-donations-preset" data-tab-content="give_kindness-donations-preset">
    <h4 class='gk-margin-bottom-10'>
        <?php echo __('Donation preset amounts', 'give-kindness'); ?>
    </h4>
    <div class="give-donor-dashboard-divider"></div>
    <div class="give_kindness-donations-preset-area" id="give_kindness-donations-preset-area">

        <div class="give-donor-dashboard-field-row">
            <div class="give-donor-dashboard-text-control">
                <div class="give-donor-dashboard-text-control__input">
                    <input class="gk-preset-amount" name="gk-preset-amount[]" type="text" placeholder="<?php echo __('$25', 'give-kindness'); ?>" maxlength="20">
                </div>
            </div>
        </div>

        <div class="give-donor-dashboard-field-row">
            <div class="give-donor-dashboard-text-control">
                <div class="give-donor-dashboard-text-control__input">
                    <textarea class="gk-preset-amount-label" name="gk-preset-amount-label[]" placeholder="<?php echo __('Description', 'give-kindness'); ?>"></textarea>
                </div>
            </div>
        </div>

        <button class="give-donor-dashboard-button give-donor-dashboard-button--primary" id="give-kindness-donations-preset-add">
            <?php echo __('Add', 'give-kindness'); ?>
        </button>
    </div>
</div>