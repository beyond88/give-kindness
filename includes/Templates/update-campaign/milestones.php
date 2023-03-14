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

        <div class="give-kindness-milestone-wrapper">
            <i class="fa fa-trash" aria-hidden="true"></i>
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
        </div>
    </div>

    <div class="give-kindness-milestone-operate give-kindness-milestone-hide">
        <button class="give-donor-dashboard-button give-donor-dashboard-button--primary" id="give-kindness-milestone-add">
            <?php echo __('Add', 'give-kindness'); ?>
        </button>

        <button class="give-donor-dashboard-button give-donor-dashboard-button--primary" id="give-kindness-milestone-save" style="float:right;">
            <?php echo __('Save', 'give-kindness'); ?>
            &nbsp;
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="save" class="svg-inline--fa fa-save fa-w-14 fa-fw " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor" d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z"></path>
            </svg>
        </button>
   </div>
</div>