<div class="give-kindness-campaign-form-two">
    <div class="give-donor-dashboard-text-control">
        <label class="give-donor-dashboard-text-control__label" for="gk-medical-condition">
            <?php echo __('Share your story with us', 'give-kindness'); ?>
        </label>
    </div>
    <textarea style="display:none" name="post_text" id="posttext"></textarea>   
    <?php 
        $content = '';
        $settings = array( 'textarea_name' => 'post_text', 'media_buttons' => false, 'drag_drop_upload' => false );
        wp_editor( $content, 'posttext', $settings );
    ?>

</div>