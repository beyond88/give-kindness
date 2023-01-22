<?php
   $myProfile = new Give_Kindness\Frontend\MyDashboard();
   $myProfile = $myProfile->profile();
?>

<div class="give-donor-dashboard-tab-content" id="give_kindness-profile" data-tab-content="give_kindness-profile">
   <div class="give-donor-dashboard-heading"><?php echo __('Profile Information', 'give_kindness'); ?></div>
   <div class="give-donor-dashboard-divider"></div>
   <div class="give-donor-dashboard-avatar-control">
      <label class="give-donor-dashboard-avatar-control__label"><?php echo __('Avatar', 'give_kindness'); ?></label>
      <div class="give-donor-dashboard-avatar-control__input" tabindex="0">
        <input accept="image/jpeg, image/png, image/gif" multiple="" type="file" autocomplete="off" tabindex="-1" style="display: none;" id="give_kindness-avatar" >
        <div class="give-donor-dashboard-avatar-control__preview">
            <img src="<?php echo esc_url($myProfile['avatarUrl']); ?>">
        </div>
         <div class="give-donor-dashboard-avatar-control__dropzone">
            <div class="give-donor-dashboard-avatar-control__instructions">
               <p><?php echo __('Drag image here to set', 'give_kindness'); ?> <br><?php echo __('avatar or', 'give_kindness'); ?> <span class="give-donor-dashboard-avatar-control__select-link"><?php echo __('find image', 'give_kindness'); ?></span></p>
            </div>
         </div>
      </div>
   </div>
   <div class="give-donor-dashboard-field-row">
      <div class="give-donor-dashboard-select-control" style="max-width: 120px;">
         <label class="give-donor-dashboard-select-control__label" for="prefix-224"><?php echo __('Prefix', 'give_kindness'); ?></label>
         <div class="css-2b097c-container">
            <div class="give_kindness-prefix-select">
               <div class="give_kindness-form-item">
                  <div class="give_kindness-prefix-singleValue">Ms.</div>
                  <div class="give_kindness-form-child-item">
                     <div class="" style="display: inline-block;">
                        <input autocapitalize="none" autocomplete="off" autocorrect="off" id="prefix-224" spellcheck="false" tabindex="0" type="text" aria-autocomplete="list" value="" style="box-sizing: content-box; width: 2px; background: 0px center; border: 0px; font-size: inherit; opacity: 1; outline: 0px; padding: 0px; color: inherit;">
                        <div style="position: absolute; top: 0px; left: 0px; visibility: hidden; height: 0px; overflow: scroll; white-space: pre; font-size: 14px; font-family: Arial; font-weight: 400; font-style: normal; letter-spacing: normal; text-transform: none;"></div>
                        <div data-lastpass-icon-root="true" style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;"></div>
                     </div>
                  </div>
               </div>
               <div class="css-1wy0on6">
                  <div aria-hidden="true" class=" css-1p95na5-indicatorContainer">
                     <svg height="20" width="20" viewBox="0 0 20 20" aria-hidden="true" focusable="false" class="css-19bqh2r">
                        <path d="M14.348 14.849c-0.469 0.469-1.229 0.469-1.697 0l-2.651-3.030-2.651 3.029c-0.469 0.469-1.229 0.469-1.697 0-0.469-0.469-0.469-1.229 0-1.697l2.758-3.15-2.759-3.152c-0.469-0.469-0.469-1.228 0-1.697s1.228-0.469 1.697 0l2.652 3.031 2.651-3.031c0.469-0.469 1.228-0.469 1.697 0s0.469 1.229 0 1.697l-2.758 3.152 2.758 3.15c0.469 0.469 0.469 1.229 0 1.698z"></path>
                     </svg>
                  </div>
                  <span class=" css-1hyfx7x"></span>
                  <div aria-hidden="true" class=" css-6yl9nk-indicatorContainer">
                     <svg height="20" width="20" viewBox="0 0 20 20" aria-hidden="true" focusable="false" class="css-19bqh2r">
                        <path d="M4.516 7.548c0.436-0.446 1.043-0.481 1.576 0l3.908 3.747 3.908-3.747c0.533-0.481 1.141-0.446 1.574 0 0.436 0.445 0.408 1.197 0 1.615-0.406 0.418-4.695 4.502-4.695 4.502-0.217 0.223-0.502 0.335-0.787 0.335s-0.57-0.112-0.789-0.335c0 0-4.287-4.084-4.695-4.502s-0.436-1.17 0-1.615z"></path>
                     </svg>
                  </div>
               </div>
            </div>
            <div class="give_kindness-prefix-menu">
                <div class="css-1ew0esf">
                    <div class="give_kindness-prefix-selector" tabindex="-1"><?php echo __('Mr.', 'give_kindness'); ?></div>
                    <div class="give_kindness-prefix-selector" tabindex="-1"><?php echo __('Ms.', 'give_kindness'); ?></div>
                    <div class="give_kindness-prefix-selector" tabindex="-1"><?php echo __('Mrs.', 'give_kindness'); ?></div>
                </div>
            </div>
         </div>
      </div>
      <div class="give-donor-dashboard-text-control">
         <label class="give-donor-dashboard-text-control__label" for="first-name-699"><?php echo __('First Name', 'give_kindness'); ?></label>
         <div class="give-donor-dashboard-text-control__input">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" class="svg-inline--fa fa-user fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
               <path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path>
            </svg>
            <input id="first-name-699" type="text" value="<?php echo $myProfile['firstName']; ?>">
         </div>
      </div>
      <div class="give-donor-dashboard-text-control">
         <label class="give-donor-dashboard-text-control__label" for="last-name-804"><?php echo __('Last Name', 'give_kindness'); ?></label>
         <div class="give-donor-dashboard-text-control__input"><input id="last-name-804" type="text" value="<?php echo $myProfile['lastName']; ?>"></div>
      </div>
   </div>
   <div class="give-donor-dashboard-text-control">
      <label class="give-donor-dashboard-text-control__label" for="company-783"><?php echo __('Company', 'give_kindness'); ?></label>
      <div class="give-donor-dashboard-text-control__input"><input id="company-783" type="text" value="<?php echo $myProfile['company']; ?>"></div>
   </div>
   <div class="give-donor-dashboard-text-control">
      <label class="give-donor-dashboard-text-control__label" for="primary-email"><?php echo __('Primary Email', 'give_kindness'); ?></label>
      <div class="give-donor-dashboard-text-control__input">
         <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" class="svg-inline--fa fa-envelope fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path>
         </svg>
         <input id="give_kindness-primary-email" type="text" value="<?php echo $myProfile['emails']['primary']; ?>" name="give_kindness-primary-email">
      </div>
   </div>
   <button class="give-donor-dashboard-button give-donor-dashboard-button--primary" id="give_kindness-add-email">
      <?php echo __('Add Email', 'give_kindness'); ?>
      <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
         <path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
      </svg>
   </button>


   <div class="give-donor-dashboard-heading"><?php echo __('Primary Address', 'give-kindness');?></div>
   <div class="give-donor-dashboard-divider"></div>
   <div class="give-donor-dashboard-select-control">
      <label class="give-donor-dashboard-select-control__label" for="country-862"><?php echo __('Country', 'give-kindness');?></label>
      <div class="css-2b097c-container">
         <div class="give_kindness-form-control give_kindness-country">
            <div class="give_kindness-form-item">
               <div class="selected-country-name">Bangladesh</div>
               <div class="give_kindness-form-child-item">
                  <div class="" style="display: inline-block;">
                     <input autocapitalize="none" autocomplete="off" autocorrect="off" id="country-862" spellcheck="false" tabindex="0" type="text" aria-autocomplete="list" value="" style="box-sizing: content-box; width: 2px; background: 0px center; border: 0px; font-size: inherit; opacity: 1; outline: 0px; padding: 0px; color: inherit;">
                     <div style="position: absolute; top: 0px; left: 0px; visibility: hidden; height: 0px; overflow: scroll; white-space: pre; font-size: 14px; font-family: Arial; font-weight: 400; font-style: normal; letter-spacing: normal; text-transform: none;"></div>
                  </div>
               </div>
            </div>
            <div class="css-1wy0on6">
               <span class=" css-1hyfx7x"></span>
               <div aria-hidden="true" class=" css-6yl9nk-indicatorContainer">
                  <svg height="20" width="20" viewBox="0 0 20 20" aria-hidden="true" focusable="false" class="css-19bqh2r">
                     <path d="M4.516 7.548c0.436-0.446 1.043-0.481 1.576 0l3.908 3.747 3.908-3.747c0.533-0.481 1.141-0.446 1.574 0 0.436 0.445 0.408 1.197 0 1.615-0.406 0.418-4.695 4.502-4.695 4.502-0.217 0.223-0.502 0.335-0.787 0.335s-0.57-0.112-0.789-0.335c0 0-4.287-4.084-4.695-4.502s-0.436-1.17 0-1.615z"></path>
                  </svg>
               </div>
            </div>
         </div>



         <div class="give_kindness-country-list-menu">
            <div class="give_kindness-country-list">
               <div class="css-i2jeyr-option" id="react-select-3-option-0" tabindex="-1">United States</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-1" tabindex="-1">Canada</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-2" tabindex="-1">United Kingdom</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-3" tabindex="-1">Afghanistan</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-4" tabindex="-1">Albania</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-5" tabindex="-1">Algeria</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-6" tabindex="-1">American Samoa</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-7" tabindex="-1">Andorra</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-8" tabindex="-1">Angola</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-9" tabindex="-1">Anguilla</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-10" tabindex="-1">Antarctica</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-11" tabindex="-1">Antigua and Barbuda</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-12" tabindex="-1">Argentina</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-13" tabindex="-1">Armenia</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-14" tabindex="-1">Aruba</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-15" tabindex="-1">Australia</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-16" tabindex="-1">Austria</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-17" tabindex="-1">Azerbaijan</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-18" tabindex="-1">Bahamas</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-19" tabindex="-1">Bahrain</div>
               <div class="css-177jfp2-option" id="react-select-3-option-20" tabindex="-1">Bangladesh</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-21" tabindex="-1">Barbados</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-22" tabindex="-1">Belarus</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-23" tabindex="-1">Belgium</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-24" tabindex="-1">Belize</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-25" tabindex="-1">Benin</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-26" tabindex="-1">Bermuda</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-27" tabindex="-1">Bhutan</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-28" tabindex="-1">Bolivia</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-29" tabindex="-1">Bosnia and Herzegovina</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-30" tabindex="-1">Botswana</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-31" tabindex="-1">Bouvet Island</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-32" tabindex="-1">Brazil</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-33" tabindex="-1">British Indian Ocean Territory</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-34" tabindex="-1">Brunei Darrussalam</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-35" tabindex="-1">Bulgaria</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-36" tabindex="-1">Burkina Faso</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-37" tabindex="-1">Burundi</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-38" tabindex="-1">Cambodia</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-39" tabindex="-1">Cameroon</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-40" tabindex="-1">Cape Verde</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-41" tabindex="-1">Cayman Islands</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-42" tabindex="-1">Central African Republic</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-43" tabindex="-1">Chad</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-44" tabindex="-1">Chile</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-45" tabindex="-1">China</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-46" tabindex="-1">Christmas Island</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-47" tabindex="-1">Cocos Islands</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-48" tabindex="-1">Colombia</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-49" tabindex="-1">Comoros</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-50" tabindex="-1">Congo, Democratic People&amp;#039;s Republic</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-51" tabindex="-1">Congo, Republic of</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-52" tabindex="-1">Cook Islands</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-53" tabindex="-1">Costa Rica</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-54" tabindex="-1">Cote d&amp;#039;Ivoire</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-55" tabindex="-1">Croatia/Hrvatska</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-56" tabindex="-1">Cuba</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-57" tabindex="-1">Cyprus Island</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-58" tabindex="-1">Czech Republic</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-59" tabindex="-1">Denmark</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-60" tabindex="-1">Djibouti</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-61" tabindex="-1">Dominica</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-62" tabindex="-1">Dominican Republic</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-63" tabindex="-1">East Timor</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-64" tabindex="-1">Ecuador</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-65" tabindex="-1">Egypt</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-66" tabindex="-1">Equatorial Guinea</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-67" tabindex="-1">El Salvador</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-68" tabindex="-1">Eritrea</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-69" tabindex="-1">Estonia</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-70" tabindex="-1">Ethiopia</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-71" tabindex="-1">Falkland Islands</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-72" tabindex="-1">Faroe Islands</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-73" tabindex="-1">Fiji</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-74" tabindex="-1">Finland</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-75" tabindex="-1">France</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-76" tabindex="-1">French Guiana</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-77" tabindex="-1">French Polynesia</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-78" tabindex="-1">French Southern Territories</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-79" tabindex="-1">Gabon</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-80" tabindex="-1">Gambia</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-81" tabindex="-1">Georgia</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-82" tabindex="-1">Germany</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-83" tabindex="-1">Greece</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-84" tabindex="-1">Ghana</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-85" tabindex="-1">Gibraltar</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-86" tabindex="-1">Greenland</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-87" tabindex="-1">Grenada</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-88" tabindex="-1">Guadeloupe</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-89" tabindex="-1">Guam</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-90" tabindex="-1">Guatemala</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-91" tabindex="-1">Guernsey</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-92" tabindex="-1">Guinea</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-93" tabindex="-1">Guinea-Bissau</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-94" tabindex="-1">Guyana</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-95" tabindex="-1">Haiti</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-96" tabindex="-1">Heard and McDonald Islands</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-97" tabindex="-1">Holy See (City Vatican State)</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-98" tabindex="-1">Honduras</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-99" tabindex="-1">Hong Kong</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-100" tabindex="-1">Hungary</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-101" tabindex="-1">Iceland</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-102" tabindex="-1">India</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-103" tabindex="-1">Indonesia</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-104" tabindex="-1">Iran</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-105" tabindex="-1">Iraq</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-106" tabindex="-1">Ireland</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-107" tabindex="-1">Isle of Man</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-108" tabindex="-1">Israel</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-109" tabindex="-1">Italy</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-110" tabindex="-1">Jamaica</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-111" tabindex="-1">Japan</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-112" tabindex="-1">Jersey</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-113" tabindex="-1">Jordan</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-114" tabindex="-1">Kazakhstan</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-115" tabindex="-1">Kenya</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-116" tabindex="-1">Kiribati</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-117" tabindex="-1">Kuwait</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-118" tabindex="-1">Kyrgyzstan</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-119" tabindex="-1">Lao People&amp;#039;s Democratic Republic</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-120" tabindex="-1">Latvia</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-121" tabindex="-1">Lebanon</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-122" tabindex="-1">Lesotho</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-123" tabindex="-1">Liberia</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-124" tabindex="-1">Libyan Arab Jamahiriya</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-125" tabindex="-1">Liechtenstein</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-126" tabindex="-1">Lithuania</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-127" tabindex="-1">Luxembourg</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-128" tabindex="-1">Macau</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-129" tabindex="-1">Macedonia</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-130" tabindex="-1">Madagascar</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-131" tabindex="-1">Malawi</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-132" tabindex="-1">Malaysia</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-133" tabindex="-1">Maldives</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-134" tabindex="-1">Mali</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-135" tabindex="-1">Malta</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-136" tabindex="-1">Marshall Islands</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-137" tabindex="-1">Martinique</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-138" tabindex="-1">Mauritania</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-139" tabindex="-1">Mauritius</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-140" tabindex="-1">Mayotte</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-141" tabindex="-1">Mexico</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-142" tabindex="-1">Micronesia</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-143" tabindex="-1">Moldova, Republic of</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-144" tabindex="-1">Monaco</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-145" tabindex="-1">Mongolia</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-146" tabindex="-1">Montenegro</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-147" tabindex="-1">Montserrat</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-148" tabindex="-1">Morocco</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-149" tabindex="-1">Mozambique</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-150" tabindex="-1">Myanmar</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-151" tabindex="-1">Namibia</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-152" tabindex="-1">Nauru</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-153" tabindex="-1">Nepal</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-154" tabindex="-1">Netherlands</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-155" tabindex="-1">Netherlands Antilles</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-156" tabindex="-1">New Caledonia</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-157" tabindex="-1">New Zealand</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-158" tabindex="-1">Nicaragua</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-159" tabindex="-1">Niger</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-160" tabindex="-1">Nigeria</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-161" tabindex="-1">Niue</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-162" tabindex="-1">Norfolk Island</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-163" tabindex="-1">North Korea</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-164" tabindex="-1">Northern Mariana Islands</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-165" tabindex="-1">Norway</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-166" tabindex="-1">Oman</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-167" tabindex="-1">Pakistan</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-168" tabindex="-1">Palau</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-169" tabindex="-1">Palestinian Territories</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-170" tabindex="-1">Panama</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-171" tabindex="-1">Papua New Guinea</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-172" tabindex="-1">Paraguay</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-173" tabindex="-1">Peru</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-174" tabindex="-1">Philippines</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-175" tabindex="-1">Pitcairn Island</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-176" tabindex="-1">Poland</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-177" tabindex="-1">Portugal</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-178" tabindex="-1">Puerto Rico</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-179" tabindex="-1">Qatar</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-180" tabindex="-1">Reunion Island</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-181" tabindex="-1">Romania</div>
               <div class=" css-1fap0ja-option" id="react-select-3-option-182" tabindex="-1">Russian Federation</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-183" tabindex="-1">Rwanda</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-184" tabindex="-1">Saint Helena</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-185" tabindex="-1">Saint Kitts and Nevis</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-186" tabindex="-1">Saint Lucia</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-187" tabindex="-1">Saint Pierre and Miquelon</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-188" tabindex="-1">Saint Vincent and the Grenadines</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-189" tabindex="-1">San Marino</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-190" tabindex="-1">Sao Tome and Principe</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-191" tabindex="-1">Saudi Arabia</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-192" tabindex="-1">Senegal</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-193" tabindex="-1">Serbia</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-194" tabindex="-1">Seychelles</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-195" tabindex="-1">Sierra Leone</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-196" tabindex="-1">Singapore</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-197" tabindex="-1">Slovak Republic</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-198" tabindex="-1">Slovenia</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-199" tabindex="-1">Solomon Islands</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-200" tabindex="-1">Somalia</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-201" tabindex="-1">South Africa</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-202" tabindex="-1">South Georgia</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-203" tabindex="-1">South Korea</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-204" tabindex="-1">Spain</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-205" tabindex="-1">Sri Lanka</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-206" tabindex="-1">Sudan</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-207" tabindex="-1">Suriname</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-208" tabindex="-1">Svalbard and Jan Mayen Islands</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-209" tabindex="-1">Eswatini</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-210" tabindex="-1">Sweden</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-211" tabindex="-1">Switzerland</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-212" tabindex="-1">Syrian Arab Republic</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-213" tabindex="-1">Taiwan</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-214" tabindex="-1">Tajikistan</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-215" tabindex="-1">Tanzania</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-216" tabindex="-1">Togo</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-217" tabindex="-1">Tokelau</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-218" tabindex="-1">Tonga</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-219" tabindex="-1">Thailand</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-220" tabindex="-1">Trinidad and Tobago</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-221" tabindex="-1">Tunisia</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-222" tabindex="-1">Turkey</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-223" tabindex="-1">Turkmenistan</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-224" tabindex="-1">Turks and Caicos Islands</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-225" tabindex="-1">Tuvalu</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-226" tabindex="-1">Uganda</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-227" tabindex="-1">Ukraine</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-228" tabindex="-1">United Arab Emirates</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-229" tabindex="-1">Uruguay</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-230" tabindex="-1">US Minor Outlying Islands</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-231" tabindex="-1">Uzbekistan</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-232" tabindex="-1">Vanuatu</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-233" tabindex="-1">Venezuela</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-234" tabindex="-1">Vietnam</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-235" tabindex="-1">Virgin Islands (British)</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-236" tabindex="-1">Virgin Islands (USA)</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-237" tabindex="-1">Wallis and Futuna Islands</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-238" tabindex="-1">Western Sahara</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-239" tabindex="-1">Western Samoa</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-240" tabindex="-1">Yemen</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-241" tabindex="-1">Yugoslavia</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-242" tabindex="-1">Zambia</div>
               <div class="css-i2jeyr-option" id="react-select-3-option-243" tabindex="-1">Zimbabwe</div>
            </div>
         </div>



      </div>
   </div>
   <div class="give-donor-dashboard-text-control">
      <label class="give-donor-dashboard-text-control__label" for="address-1-490">Address 1</label>
      <div class="give-donor-dashboard-text-control__input"><input id="address-1-490" type="text" value="Dhaka 1216"></div>
   </div>
   <div class="give-donor-dashboard-text-control">
      <label class="give-donor-dashboard-text-control__label" for="address-2-759">Address 2</label>
      <div class="give-donor-dashboard-text-control__input"><input id="address-2-759" type="text" value="Mirpur"></div>
   </div>
   <div class="give-donor-dashboard-text-control">
      <label class="give-donor-dashboard-text-control__label" for="city-903">City</label>
      <div class="give-donor-dashboard-text-control__input"><input id="city-903" type="text" value="Dhaka"></div>
   </div>
   <div class="give-donor-dashboard-field-row">
      <div class="give-donor-dashboard-select-control">
         <label class="give-donor-dashboard-select-control__label" for="state-744">State</label>
         <div class=" css-2b097c-container">
            <div class=" give_kindness-form-control">
               <div class=" give_kindness-form-item">
                  <div class=" css-1uccc91-singleValue">Dhaka</div>
                  <div class="give_kindness-form-child-item">
                     <div class="" style="display: inline-block;">
                        <input autocapitalize="none" autocomplete="off" autocorrect="off" id="state-744" spellcheck="false" tabindex="0" type="text" aria-autocomplete="list" value="" style="box-sizing: content-box; width: 2px; background: 0px center; border: 0px; font-size: inherit; opacity: 1; outline: 0px; padding: 0px; color: inherit;">
                        <div style="position: absolute; top: 0px; left: 0px; visibility: hidden; height: 0px; overflow: scroll; white-space: pre; font-size: 14px; font-family: Arial; font-weight: 400; font-style: normal; letter-spacing: normal; text-transform: none;"></div>
                     </div>
                  </div>
               </div>
               <div class=" css-1wy0on6">
                  <span class=" css-1hyfx7x"></span>
                  <div aria-hidden="true" class=" css-6yl9nk-indicatorContainer">
                     <svg height="20" width="20" viewBox="0 0 20 20" aria-hidden="true" focusable="false" class="css-19bqh2r">
                        <path d="M4.516 7.548c0.436-0.446 1.043-0.481 1.576 0l3.908 3.747 3.908-3.747c0.533-0.481 1.141-0.446 1.574 0 0.436 0.445 0.408 1.197 0 1.615-0.406 0.418-4.695 4.502-4.695 4.502-0.217 0.223-0.502 0.335-0.787 0.335s-0.57-0.112-0.789-0.335c0 0-4.287-4.084-4.695-4.502s-0.436-1.17 0-1.615z"></path>
                     </svg>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="give-donor-dashboard-text-control">
         <label class="give-donor-dashboard-text-control__label" for="zip-348">Zip</label>
         <div class="give-donor-dashboard-text-control__input"><input id="zip-348" type="text" value="1"></div>
      </div>
   </div>
   <button class="give-donor-dashboard-button give-donor-dashboard-button--primary">Add Address<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg></button>



   <!-- <div class="give-donor-dashboard-field-row">
      <div class="give-donor-dashboard-heading">Additional Address</div>
      <div class="give-donor-dashboard__address-controls">
         <div class="give-donor-dashboard__make-primary-address">Make Primary</div>|<div class="give-donor-dashboard__delete-address">Delete</div>
      </div>
   </div>

   <div class="give-donor-dashboard-divider"></div>

   <div class="give-donor-dashboard-select-control">
      <label class="give-donor-dashboard-select-control__label" for="country-862">Country</label>
      <div class=" css-2b097c-container">
         <div class=" give_kindness-form-control">
            <div class=" give_kindness-form-item">
               <div class=" css-1uccc91-singleValue">Bangladesh</div>
               <div class="give_kindness-form-child-item">
                  <div class="" style="display: inline-block;">
                     <input autocapitalize="none" autocomplete="off" autocorrect="off" id="country-862" spellcheck="false" tabindex="0" type="text" aria-autocomplete="list" value="" style="box-sizing: content-box; width: 2px; background: 0px center; border: 0px; font-size: inherit; opacity: 1; outline: 0px; padding: 0px; color: inherit;">
                     <div style="position: absolute; top: 0px; left: 0px; visibility: hidden; height: 0px; overflow: scroll; white-space: pre; font-size: 14px; font-family: Arial; font-weight: 400; font-style: normal; letter-spacing: normal; text-transform: none;"></div>
                  </div>
               </div>
            </div>
            <div class=" css-1wy0on6">
               <span class=" css-1hyfx7x"></span>
               <div aria-hidden="true" class=" css-6yl9nk-indicatorContainer">
                  <svg height="20" width="20" viewBox="0 0 20 20" aria-hidden="true" focusable="false" class="css-19bqh2r">
                     <path d="M4.516 7.548c0.436-0.446 1.043-0.481 1.576 0l3.908 3.747 3.908-3.747c0.533-0.481 1.141-0.446 1.574 0 0.436 0.445 0.408 1.197 0 1.615-0.406 0.418-4.695 4.502-4.695 4.502-0.217 0.223-0.502 0.335-0.787 0.335s-0.57-0.112-0.789-0.335c0 0-4.287-4.084-4.695-4.502s-0.436-1.17 0-1.615z"></path>
                  </svg>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="give-donor-dashboard-text-control">
      <label class="give-donor-dashboard-text-control__label" for="address-1-490">Address 1</label>
      <div class="give-donor-dashboard-text-control__input"><input id="address-1-490" type="text" value="Dhaka 1216"></div>
   </div>
   <div class="give-donor-dashboard-text-control">
      <label class="give-donor-dashboard-text-control__label" for="address-2-759">Address 2</label>
      <div class="give-donor-dashboard-text-control__input"><input id="address-2-759" type="text" value="Mirpur"></div>
   </div>
   <div class="give-donor-dashboard-text-control">
      <label class="give-donor-dashboard-text-control__label" for="city-903">City</label>
      <div class="give-donor-dashboard-text-control__input"><input id="city-903" type="text" value="Dhaka"></div>
   </div>
   <div class="give-donor-dashboard-field-row">
      <div class="give-donor-dashboard-select-control">
         <label class="give-donor-dashboard-select-control__label" for="state-744">State</label>
         <div class=" css-2b097c-container">
            <div class=" give_kindness-form-control">
               <div class=" give_kindness-form-item">
                  <div class=" css-1uccc91-singleValue">Dhaka</div>
                  <div class="give_kindness-form-child-item">
                     <div class="" style="display: inline-block;">
                        <input autocapitalize="none" autocomplete="off" autocorrect="off" id="state-744" spellcheck="false" tabindex="0" type="text" aria-autocomplete="list" value="" style="box-sizing: content-box; width: 2px; background: 0px center; border: 0px; font-size: inherit; opacity: 1; outline: 0px; padding: 0px; color: inherit;">
                        <div style="position: absolute; top: 0px; left: 0px; visibility: hidden; height: 0px; overflow: scroll; white-space: pre; font-size: 14px; font-family: Arial; font-weight: 400; font-style: normal; letter-spacing: normal; text-transform: none;"></div>
                     </div>
                  </div>
               </div>
               <div class=" css-1wy0on6">
                  <span class=" css-1hyfx7x"></span>
                  <div aria-hidden="true" class=" css-6yl9nk-indicatorContainer">
                     <svg height="20" width="20" viewBox="0 0 20 20" aria-hidden="true" focusable="false" class="css-19bqh2r">
                        <path d="M4.516 7.548c0.436-0.446 1.043-0.481 1.576 0l3.908 3.747 3.908-3.747c0.533-0.481 1.141-0.446 1.574 0 0.436 0.445 0.408 1.197 0 1.615-0.406 0.418-4.695 4.502-4.695 4.502-0.217 0.223-0.502 0.335-0.787 0.335s-0.57-0.112-0.789-0.335c0 0-4.287-4.084-4.695-4.502s-0.436-1.17 0-1.615z"></path>
                     </svg>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="give-donor-dashboard-text-control">
         <label class="give-donor-dashboard-text-control__label" for="zip-348">Zip</label>
         <div class="give-donor-dashboard-text-control__input"><input id="zip-348" type="text" value="1"></div>
      </div>
   </div> -->


   <div class="give-donor-dashboard-heading"><?php echo __('Additional Info', 'give_kindness'); ?></div>
   <div class="give-donor-dashboard-divider"></div>
   <fieldset class="give-donor-dashboard-radio-control">
      <legend class="give-donor-dashboard-radio-control__legend"><?php echo __('Anonymous Giving', 'give_kindness'); ?></legend>
      <div class="give-donor-dashboard-radio-control__description"><?php echo __('This will prevent your avatar, first name, donation comments, and other information from appearing publicly on this organization’s website.', 'give_kindness'); ?></div>
      <div class="give-donor-dashboard-radio-control__option"><input type="radio" name="format" id="0" value="0" checked=""><label for="0"><?php echo __('Public - show my donations publicly', 'give_kindness'); ?></label></div>
      <div class="give-donor-dashboard-radio-control__option"><input type="radio" name="format" id="1" value="1"><label for="1"><?php echo __('Private - only organization admins can view my info', 'give_kindness'); ?></label></div>
   </fieldset>
   <button class="give-donor-dashboard-button give-donor-dashboard-button--primary" id="give_kindness-update-profile">
      <?php echo __('Update Profile', 'give_kindness'); ?>
      <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="save" class="svg-inline--fa fa-save fa-w-14 fa-fw " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
         <path fill="currentColor" d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z"></path>
      </svg>
   </button>
</div>