<div class="give-donor-dashboard-tab-content" id="give_kindness-campaign-docs" data-tab-content="give_kindness-campaign-docs">
    <div class="give-donor-dashboard-field-row">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="gke-medical-document">
                <?php echo __('Medical document upload (Snapshot of the first page of medical consultation report)*', 'give-kindness'); ?>
            </label>
            <select name="gke-medical-document" id="gke-medical-document" class="give-donor-dashboard-text-control__input">
                <option value="image"><?php echo __( 'Image', 'give-kindness' ); ?></option>
                <option value="pdf"><?php echo __( 'File', 'give-kindness' ); ?></option>
            </select>  
        </div>
    </div>


    <div class="give-kindness-media-items give-kindness-hide" id="give-kindness-edit-media-items">
        <!--
            Image or file upload here
        --->
    </div> 

    <div class="give-donor-dashboard-field-row">
        <div class="give-donor-dashboard-text-control">
            <form id="gke-medical-document-upload-form" class="gke-uploader">
                <label for="gke-medical-document-upload" id="gke-file-drag">
                    <div id="gke-start">
                        <i class="fa fa-download" aria-hidden="true"></i>
                        <div><?php echo __( 'Select a file or drag here', 'give-kindness' ); ?></div>
                        <div id="gke-notimage" class="gke-hidden"><?php echo __( 'Please select an image', 'give-kindness' ); ?></div>
                        <span id="gke-medical-document-upload-btn" class="gke-btn btn-primary"><?php echo __( 'Select a file', 'give-kindness' ); ?></span>
                    </div>
                </label>
            </form>
        </div>
    </div>
</div>