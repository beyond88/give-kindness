<?php
   $myProfile = new Give_Kindness\Frontend\MyDashboard();
   $myProfile = $myProfile->profile();

   // echo "<pre>";
   // print_r($myProfile);
   // echo "</pre>";
?>

<div class="give-donor-dashboard-tab-content" id="give_kindness-profile" data-tab-content="give_kindness-profile">
   <div class="give-donor-dashboard-heading">
      <?php echo __('Profile Information', 'give-kindness'); ?>
   </div>
   <div class="give-donor-dashboard-divider"></div>
   <div class="give-donor-dashboard-avatar-control">
      <label class="give-donor-dashboard-avatar-control__label">
         <?php echo __('Avatar', 'give-kindness'); ?>
      </label>
      <div class="give-donor-dashboard-avatar-control__input" tabindex="0">
         <input type="hidden" name="avatarId" id="avatarId" value="<?php echo $myProfile['avatarId']; ?>">
        <input accept="image/jpeg, image/png, image/gif" type="file" autocomplete="off" tabindex="-1" style="display: none;" id="give_kindness-avatar" >
        <div class="give-donor-dashboard-avatar-control__preview">
            <img src="<?php echo esc_url($myProfile['avatarUrl']); ?>">
        </div>
         <div class="give-donor-dashboard-avatar-control__dropzone">
            <div class="give-donor-dashboard-avatar-control__instructions">
               <p>
                  <?php echo __('Drag image here to set', 'give-kindness'); ?> <br><?php echo __('avatar or', 'give-kindness'); ?> 
                  <span class="give-donor-dashboard-avatar-control__select-link"><?php echo __('find image', 'give-kindness'); ?></span>
               </p>
            </div>
         </div>
      </div>
   </div>
   <div class="give-donor-dashboard-field-row">
      <div class="give-donor-dashboard-select-control" style="max-width: 120px;">
         <label class="give-donor-dashboard-select-control__label" for="prefix-224"><?php echo __('Prefix', 'give-kindness'); ?></label>
         <div class="give_kindness-form-container">
            <div class="give_kindness-prefix-select">
               <div class="give_kindness-form-item">
                  <div class="give_kindness-prefix-singleValue"><?php echo $myProfile['titlePrefix']; ?></div>
                  <div class="give_kindness-form-child-item">
                     <div class="" style="display:inline-block;">
                        <input autocapitalize="none" autocomplete="off" autocorrect="off" id="prefix-224" spellcheck="false" tabindex="0" type="text" aria-autocomplete="list" value="" style="box-sizing: content-box; width: 2px; background: 0px center; border: 0px; font-size: inherit; opacity: 1; outline: 0px; padding: 0px; color: inherit;">
                        <div style="position: absolute; top: 0px; left: 0px; visibility: hidden; height: 0px; overflow: scroll; white-space: pre; font-size: 14px; font-family: Arial; font-weight: 400; font-style: normal; letter-spacing: normal; text-transform: none;"></div>
                        <div data-lastpass-icon-root="true" style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;"></div>
                     </div>
                  </div>
               </div>
               <div class="css-1wy0on6">
                  <div aria-hidden="true" class="css-1p95na5-indicatorContainer">
                     <svg height="20" width="20" viewBox="0 0 20 20" aria-hidden="true" focusable="false" class="css-19bqh2r">
                        <path d="M14.348 14.849c-0.469 0.469-1.229 0.469-1.697 0l-2.651-3.030-2.651 3.029c-0.469 0.469-1.229 0.469-1.697 0-0.469-0.469-0.469-1.229 0-1.697l2.758-3.15-2.759-3.152c-0.469-0.469-0.469-1.228 0-1.697s1.228-0.469 1.697 0l2.652 3.031 2.651-3.031c0.469-0.469 1.228-0.469 1.697 0s0.469 1.229 0 1.697l-2.758 3.152 2.758 3.15c0.469 0.469 0.469 1.229 0 1.698z"></path>
                     </svg>
                  </div>
                  <span class="css-1hyfx7x"></span>
                  <div aria-hidden="true" class=" css-6yl9nk-indicatorContainer">
                     <svg height="20" width="20" viewBox="0 0 20 20" aria-hidden="true" focusable="false" class="css-19bqh2r">
                        <path d="M4.516 7.548c0.436-0.446 1.043-0.481 1.576 0l3.908 3.747 3.908-3.747c0.533-0.481 1.141-0.446 1.574 0 0.436 0.445 0.408 1.197 0 1.615-0.406 0.418-4.695 4.502-4.695 4.502-0.217 0.223-0.502 0.335-0.787 0.335s-0.57-0.112-0.789-0.335c0 0-4.287-4.084-4.695-4.502s-0.436-1.17 0-1.615z"></path>
                     </svg>
                  </div>
               </div>
            </div>
            <div class="give_kindness-prefix-menu">
                <div class="css-1ew0esf">
                    <div class="give_kindness-prefix-selector" tabindex="-1"><?php echo __('Mr.', 'give-kindness'); ?></div>
                    <div class="give_kindness-prefix-selector" tabindex="-1"><?php echo __('Ms.', 'give-kindness'); ?></div>
                    <div class="give_kindness-prefix-selector" tabindex="-1"><?php echo __('Mrs.', 'give-kindness'); ?></div>
                </div>
            </div>
         </div>
      </div>
      <div class="give-donor-dashboard-text-control">
         <label class="give-donor-dashboard-text-control__label" for="gk-first-name"><?php echo __('First Name', 'give-kindness'); ?></label>
         <div class="give-donor-dashboard-text-control__input">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" class="svg-inline--fa fa-user fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
               <path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path>
            </svg>
            <input id="gk-first-name" type="text" value="<?php echo $myProfile['firstName']; ?>">
         </div>
      </div>
      <div class="give-donor-dashboard-text-control">
         <label class="give-donor-dashboard-text-control__label" for="gk-last-name">
            <?php echo __('Last Name', 'give-kindness'); ?>
         </label>
         <div class="give-donor-dashboard-text-control__input">
            <input id="gk-last-name" type="text" value="<?php echo $myProfile['lastName']; ?>">
         </div>
      </div>
   </div>
   <div class="give-donor-dashboard-text-control">
      <label class="give-donor-dashboard-text-control__label" for="gk-company">
         <?php echo __('Company', 'give-kindness'); ?>
      </label>
      <div class="give-donor-dashboard-text-control__input">
         <input id="gk-company" type="text" value="<?php echo $myProfile['company']; ?>">
      </div>
   </div>
   <div class="give-donor-dashboard-text-control">
      <label class="give-donor-dashboard-text-control__label" for="primary-email">
         <?php echo __('Primary Email', 'give-kindness'); ?>
      </label>
      <div class="give-donor-dashboard-text-control__input">
         <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" class="svg-inline--fa fa-envelope fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path>
         </svg>
         <input id="gk-primary-email" type="text" value="<?php echo $myProfile['emails']['primary']; ?>" name="gk-primary-email">
      </div>
   </div>


   <?php if( ! empty($myProfile['emails']) && count($myProfile['emails']) > 1): ?>
   <?php foreach ( $myProfile['emails'] as $key => $value ) : ?>
   <?php if( $key == 'primary') continue;  ?>   
   <div class="give-donor-dashboard-field-row additional-emails-area">
      <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="additional-emails">
            <?php echo __('Additional Emails', 'give-kindness'); ?>
            </label>
            <div class="give-donor-dashboard-text-control__input">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" class="svg-inline--fa fa-envelope fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                  <path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path>
            </svg>
            <input id="additional-emails" type="text" name="additional_emails[]" class="additional-emails" value="<?php echo $value; ?>">
            </div>
      </div>
      <div class="give-donor-dashboard__email-controls">
            <div class="give-donor-dashboard__make-primary-email"><?php echo __('Make Primary', 'give-kindness'); ?></div>
            |
            <div class="give-donor-dashboard__delete-email"><?php echo __('Delete', 'give-kindness'); ?></div>
      </div>
   </div>
   <?php endforeach; ?>
   <?php endif; ?>



   <button class="give-donor-dashboard-button give-donor-dashboard-button--primary" id="gk-add-email">
      <?php echo __('Add Email', 'give-kindness'); ?>
      <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
         <path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
      </svg>
   </button>

   <?php if( ! empty( $myProfile['addresses'] ) ) { ?>
   <?php foreach ( $myProfile['addresses']['billing'] as $address ){ ?>
   <div class="give-donor-dashboard-heading">
      <?php echo __('Primary Address', 'give-kindness');?>
   </div>
   <div class="give-donor-dashboard-divider"></div>
   <div class="give-donor-dashboard-select-control">
      <label class="give-donor-dashboard-select-control__label" for="gk-country">
         <?php echo __('Country', 'give-kindness');?>
      </label>
      <div class="give_kindness-form-container">
         <div class="give_kindness-form-control give_kindness-country">
            <div class="give_kindness-form-item">
               <div class="selected-country-name">
                  <?php echo give_get_country_name_by_key( $address['country'] ); ?>
               </div>
               <div class="give_kindness-form-child-item">
                  <div class="" style="display: inline-block;">
                     <input autocapitalize="none" autocomplete="off" autocorrect="off" id="gk-country" spellcheck="false" tabindex="0" type="text" aria-autocomplete="list" value="<?php echo $address['country']; ?>" style="box-sizing: content-box; width: 2px; background: 0px center; border: 0px; font-size: inherit; opacity: 1; outline: 0px; padding: 0px; color: inherit;">
                     <div style="position: absolute; top: 0px; left: 0px; visibility: hidden; height: 0px; overflow: scroll; white-space: pre; font-size: 14px; font-family: Arial; font-weight: 400; font-style: normal; letter-spacing: normal; text-transform: none;"></div>
                  </div>
               </div>
            </div>
            <div class="css-1wy0on6">
               <span class=" css-1hyfx7x"></span>
               <div aria-hidden="true" class="css-6yl9nk-indicatorContainer">
                  <svg height="20" width="20" viewBox="0 0 20 20" aria-hidden="true" focusable="false" class="css-19bqh2r">
                     <path d="M4.516 7.548c0.436-0.446 1.043-0.481 1.576 0l3.908 3.747 3.908-3.747c0.533-0.481 1.141-0.446 1.574 0 0.436 0.445 0.408 1.197 0 1.615-0.406 0.418-4.695 4.502-4.695 4.502-0.217 0.223-0.502 0.335-0.787 0.335s-0.57-0.112-0.789-0.335c0 0-4.287-4.084-4.695-4.502s-0.436-1.17 0-1.615z"></path>
                  </svg>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="give-donor-dashboard-text-control">
      <label class="give-donor-dashboard-text-control__label" for="gk-address-1">
         <?php echo __('Address 1', 'give-kindness'); ?>
      </label>
      <div class="give-donor-dashboard-text-control__input">
         <input id="gk-address-1" type="text" value="<?php echo $address['line1']; ?>">
      </div>
   </div>
   <div class="give-donor-dashboard-text-control">
      <label class="give-donor-dashboard-text-control__label" for="gk-address-2">
         <?php echo __('Address 2', 'give-kindness'); ?>
      </label>
      <div class="give-donor-dashboard-text-control__input">
         <input id="gk-address-2" type="text" value="<?php echo $address['line2']; ?>">
      </div>
   </div>
   <div class="give-donor-dashboard-text-control">
      <label class="give-donor-dashboard-text-control__label" for="gk-city">
         <?php echo __('City', 'give-kindness'); ?>
      </label>
      <div class="give-donor-dashboard-text-control__input">
         <input id="gk-city" type="text" value="<?php echo $address['city']; ?>">
      </div>
   </div>
   <div class="give-donor-dashboard-field-row give_kindness-states-zip">
      <?php if( ! empty( give_get_states( $address['country'] ) ) ) { ?>
         <div class="give-donor-dashboard-select-control give_kindness-states-area">
         <label class="give-donor-dashboard-select-control__label">
            <?php echo __('State', 'give-kindness'); ?>
         </label>
         <div class="give_kindness-form-container">
            <div class="give_kindness-form-control">
               <div class=" give_kindness-form-item">
                  <div class="give_kindness-state">

                  </div>
                  <div class="give_kindness-form-child-item">
                     <div class="" style="display: inline-block;">
                        <input autocapitalize="none" autocomplete="off" autocorrect="off" id="gk-state" spellcheck="false" tabindex="0" type="text" aria-autocomplete="list" value="<?php echo $address['state']; ?>" style="box-sizing: content-box; width: 2px; background: 0px center; border: 0px; font-size: inherit; opacity: 1; outline: 0px; padding: 0px; color: inherit;">
                        <div style="position: absolute; top: 0px; left: 0px; visibility: hidden; height: 0px; overflow: scroll; white-space: pre; font-size: 14px; font-family: Arial; font-weight: 400; font-style: normal; letter-spacing: normal; text-transform: none;"></div>
                     </div>
                  </div>
               </div>
               <div class="css-1wy0on6">
                  <span class="css-1hyfx7x"></span>
                  <div aria-hidden="true" class="css-6yl9nk-indicatorContainer">
                     <svg height="20" width="20" viewBox="0 0 20 20" aria-hidden="true" focusable="false" class="css-19bqh2r">
                        <path d="M4.516 7.548c0.436-0.446 1.043-0.481 1.576 0l3.908 3.747 3.908-3.747c0.533-0.481 1.141-0.446 1.574 0 0.436 0.445 0.408 1.197 0 1.615-0.406 0.418-4.695 4.502-4.695 4.502-0.217 0.223-0.502 0.335-0.787 0.335s-0.57-0.112-0.789-0.335c0 0-4.287-4.084-4.695-4.502s-0.436-1.17 0-1.615z"></path>
                     </svg>
                  </div>
               </div>
            </div>
            <div class="give_kindness-states-list-menu">
               <div class="give_kindness-states-list">
                  <?php 
                     $getStates = give_get_states($address['country']);
                     foreach( $getStates as $key => $state ):
                        if( $key == ''): 
                           $state = __('Select...', 'give-kindness');
                        endif;
                        
                        $class = '';
                        if( $key == $address['state'] ):
                           $class = 'selected';
                        endif; 
                  ?>
                  <div class="give_kindness_state_name <?php echo $class; ?>" data-stateCode="<?php echo $key; ?>"><?php echo $state; ?></div>
                  <?php endforeach; ?>
               </div>
            </div>
         </div>
      </div>
      <?php } ?>
      <div class="give-donor-dashboard-text-control">
         <label class="give-donor-dashboard-text-control__label">
            <?php echo __('Zip', 'give-kindness'); ?>
         </label>
         <div class="give-donor-dashboard-text-control__input">
            <input id="gk-zip" type="text" value="<?php echo $address['zip']; ?>">
         </div>
      </div>
   </div>
   <?php } ?>

   <button class="give-donor-dashboard-button give-donor-dashboard-button--primary">
      <?php echo __('Add Address', 'give-kindness'); ?>
      <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
   </button>

   <?php } else { ?>
      <div class="give-donor-dashboard__add-primary-address">
         <div class="give-donor-dashboard-heading"><?php echo __('Looks like you have not set up an address!', 'give-kindness'); ?></div>
         <button class="give-donor-dashboard-button give-donor-dashboard-button--primary">
            <?php echo __('Add Address', 'give-kindness'); ?>
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
               <path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
            </svg>
         </button>
      </div>
   <?php } ?>

   <div class="give-donor-dashboard-heading">
      <?php echo __('Additional Info', 'give-kindness'); ?>
   </div>
   <div class="give-donor-dashboard-divider"></div>
   <fieldset class="give-donor-dashboard-radio-control">
      <legend class="give-donor-dashboard-radio-control__legend">
         <?php echo __('Anonymous Giving', 'give-kindness'); ?>
      </legend>
      <div class="give-donor-dashboard-radio-control__description">
         <?php echo __('This will prevent your avatar, first name, donation comments, and other information from appearing publicly on this organization’s website.', 'give-kindness'); ?>
      </div>
      <div class="give-donor-dashboard-radio-control__option">
         <input type="radio" name="format" id="0" value="0" <?php if( $myProfile['isAnonymous'] == 0 ){ echo "checked"; } ?> class="anonymous-giving">
         <label for="0">
            <?php echo __('Public - show my donations publicly', 'give-kindness'); ?>
         </label>
      </div>
      <div class="give-donor-dashboard-radio-control__option">
         <input type="radio" name="format" id="1" value="1" <?php if( $myProfile['isAnonymous'] == 1 ){ echo "checked"; } ?> class="anonymous-giving">
         <label for="1">
            <?php echo __('Private - only organization admins can view my info', 'give-kindness'); ?>
         </label>
      </div>
   </fieldset>
   <button class="give-donor-dashboard-button give-donor-dashboard-button--primary" id="give_kindness-update-profile">
      <?php echo __('Update Profile', 'give-kindness'); ?>
      <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="save" class="svg-inline--fa fa-save fa-w-14 fa-fw " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
         <path fill="currentColor" d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z"></path>
      </svg>
   </button>
</div>