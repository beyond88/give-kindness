<div id="give-kindness-edit-campaign-form-four">

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