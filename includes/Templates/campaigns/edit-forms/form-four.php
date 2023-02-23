<div id="give-kindness-edit-campaign-form-four">
    <div class="give-donor-dashboard-text-control">
        <label class="give-donor-dashboard-text-control__label gke-good-jobs" for="gke-good-jobs">
            &nbsp;
        </label>
        <h3>
            <?php echo __('Good Jobs, ', 'give-kindness'); ?> 
            <span><?php //echo $profile_data['name']; ?>!</span>
        </h3>
    </div>
    
    <div class="give-donor-dashboard-text-control gke-submit-for-approval">
        <label class="give-donor-dashboard-text-control__label" for="gke-submit-for-approval">
            <strong class="gke-submit-for-approval-label">
                <?php echo __('Submit your campaign for approval', 'give-kindness'); ?>
            </strong>
        </label>
        <p>
            To ensure that al campaigns on GiveKindness.asia are authentic, we will take a closer look at your campaign before it can get published. We'll get back to you in the next 2 working days. Thank you.
        </p>
    </div>

    <div class="give-donor-dashboard-text-control gke-submit-for-approval-more-describe">
        <p>
            Meanwhile, we encourage you to add more information to your campaign draft to increase the chances of getting appoved. Please share your relationship with the beneficiary, add more pictures of yourself as well as the beneficiary and also add a video describing the situation. Campaign without pictures of the fundaraisers and beneficiaries usually don't get approved on our website. 
        </p>
    </div>
    
    <input type="hidden" id="gke-campaign-id">
    <div class="give-donor-dashboard-field-row">
        <div class="give-donor-dashboard-text-control give-kindness-form-previous">
            <button type="button" id="form-previous" class="give-donor-dashboard-button--default give-kindness-form-previous-btn" onClick="showHideContent('#give-kindness-edit-campaign-form-four', '#give-kindness-edit-campaign-form-three')">
                &laquo; <?php echo __('Previous', 'give-kindness'); ?>
            </button>   
        </div>
        <div class="give-donor-dashboard-text-control give-kindness-text-right">
            <button type="button" id="give-kindness-save-draft-edit" class="give-donor-dashboard-button give-donor-dashboard-button--primary" data-submit-type="draft">
                <?php echo __('Save draft', 'give-kindness'); ?>
            </button>
        </div>
        <div class="give-donor-dashboard-text-control give-kindness-text-right">
            <button type="button" id="give-kindness-submit-approval-edit" class="give-donor-dashboard-button give-donor-dashboard-button--primary" data-submit-type="pending">
                <?php echo __('Submit for approval', 'give-kindness'); ?>
            </button>   
        </div>
    </div>

</div>