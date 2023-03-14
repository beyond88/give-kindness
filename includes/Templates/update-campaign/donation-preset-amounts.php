<div class="give-donor-dashboard-tab-content" id="give_kindness-donations-preset" data-tab-content="give_kindness-donations-preset">
    <h4 class='gk-margin-bottom-10'>
        <?php echo __('Donation preset amounts', 'give-kindness'); ?>
    </h4>
    <div class="give-donor-dashboard-divider gk-margin-bottom-10"></div>

    <div class="give_kindness-donations-preset-area" id="give_kindness-donations-preset-area">

        <div class="give_kindness-donations-preset-wrapper">
            <div class="give-donor-dashboard-field-row">
                <div class="give-donor-dashboard-text-control">
                    <div class="give-donor-dashboard-text-control__input">
                        <input class="gk-preset-amount" name="gk-preset-amount[]" type="number" min="1" placeholder="<?php echo __('$25', 'give-kindness'); ?>" maxlength="20">
                    </div>
                </div>
            </div>

            <div class="give-donor-dashboard-field-row">
                <div class="give-donor-dashboard-text-control">
                    <div class="give-donor-dashboard-text-control__input">
                        <textarea class="gk-preset-amount-label" name="gk-preset-amount-label[]" placeholder="<?php echo __('Description', 'give-kindness'); ?>" maxlength="100"></textarea>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <div class="give_kindness-donations-preset-area">

        <button class="give-donor-dashboard-button give-donor-dashboard-button--primary" id="give-kindness-donations-preset-add">
            <?php echo __('Add', 'give-kindness'); ?>
        </button>
        <button class="give-donor-dashboard-button give-donor-dashboard-button--primary" id="give-kindness-donations-preset-save" style="float:right;">
            <?php echo __('Save', 'give-kindness'); ?>
            &nbsp;
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="save" class="svg-inline--fa fa-save fa-w-14 fa-fw " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor" d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z"></path>
            </svg>
        </button>
    </div>
</div>