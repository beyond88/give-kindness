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

    <button class="give-donor-dashboard-button give-donor-dashboard-button--primary" id="give_kindness-save-doc" data-campaign-id="">
        <?php echo __('Save', 'give-kindness'); ?>    
        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="save" class="svg-inline--fa fa-save fa-w-14 fa-fw " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path fill="currentColor" d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z"></path>
        </svg>
   </button>

</div>