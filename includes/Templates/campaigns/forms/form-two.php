<div id="give-kindness-campaign-form-two">
    <div class="give-donor-dashboard-text-control">
        <label class="give-donor-dashboard-text-control__label" for="gk-medical-condition">
            <?php echo __('Share your story with us', 'give-kindness'); ?>
        </label>

        <div class="give-donor-dashboard-text-control__input" style="width: auto;align-items:unset; display:inline;">
            <textarea style="display:none" name="post_text" id="posttext"></textarea>   
            <?php 
                $content = '';
                $settings = array( 'textarea_name' => 'post_text', 'media_buttons' => false, 'drag_drop_upload' => false );
                wp_editor( $content, 'posttext', $settings );
            ?>
        </div>
    </div>

    <div class="give-donor-dashboard-field-row">
        <div class="give-donor-dashboard-text-control give-kindness-form-previous">
            <button type="button" id="form-previous" class="give-donor-dashboard-button--default give-kindness-form-previous-btn" onClick="showHideContent('#give-kindness-campaign-form-two', '#give-kindness-campaign-form-one')">
                &laquo; <?php echo __('Previous', 'give-kindness'); ?>
            </button>   
        </div>
        <div class="give-donor-dashboard-text-control give-kindness-form-next">
            <button type="button" id="form-next" class="give-donor-dashboard-button give-donor-dashboard-button--primary give-kindness-form-next-btn" onClick="showHideContent('#give-kindness-campaign-form-two', '#give-kindness-campaign-form-three')">
                <?php echo __('Next', 'give-kindness'); ?> &raquo;
            </button>    
        </div>
    </div>

</div>