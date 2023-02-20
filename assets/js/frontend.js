(function($) {
  'use strict';

  /************************
  * 
  * Logout modal
  * 
  ************************/
  $( document ).ready(function() {
    let logOutMsg = give_kindness.logOutMsg;
    let logOutYes = give_kindness.yes;
    let neverMind = give_kindness.neverMind;

    let logoutModal = `
      <div class="give-donor-dashboard-logout-modal">
        <div class="give-donor-dashboard-logout-modal__frame">
            <div class="give-donor-dashboard-logout-modal__header">
            ${logOutMsg}
            </div>
            <div class="give-donor-dashboard-logout-modal__body">
              <div class="give-donor-dashboard-logout-modal__buttons">
                  <button class="give-donor-dashboard-button give-donor-dashboard-button--primary" id="give-kindness-logout">
                  ${logOutYes}
                  </button>
                  <a class="give-donor-dashboard-logout-modal__cancel">
                    ${neverMind}
                  </a>
              </div>
            </div>
        </div>
        <div class="give-donor-dashboard-logout-modal__bg"></div>
      </div>
    `;

    /************************
     * 
     * Remove logout modal
     * 
     ************************/
    $(document).on('click', '.give-donor-dashboard-logout-modal__cancel', function(){
      $('.give-donor-dashboard-logout-modal').remove();
    });
    

    /************************
     * 
     * Sidebar handle
     * 
     ************************/
    $(".give-donor-dashboard-tab-link").click(function() {
      $(".give-donor-dashboard-tab-link").removeClass("give-donor-dashboard-tab-link--is-active");
      $(this).addClass("give-donor-dashboard-tab-link--is-active");
      const targetTabContent = $(this).data('tab-id');
      $(".give-donor-dashboard-tab-link").each(function(index, item) {
        let currentTabContent = $(this).data('tab-id');
        if( typeof currentTabContent != "undefined" ){   
          if( currentTabContent === targetTabContent ){
            $('#'+currentTabContent).show();
          } else {
            if( typeof targetTabContent !== "undefined"){
              $('#'+currentTabContent).hide();
            }
          }

          // Hide receipt details content
          // Hide create campaign by default
          $('.view-receipt-details').hide();
          $('#give_kindness-create-campaign').hide();
        }
      });

      /*---------------------------------------------------
        * 
        * Show logout modal
        * 
        ---------------------------------------------------*/
      if( $(this).parent().hasClass('give-donor-dashboard-logout') ){
        console.log('checked', $(this).parent().hasClass('give-donor-dashboard-logout'));
        if( ! $('.give-donor-dashboard-desktop-layout__tab-menu').children().hasClass('give-donor-dashboard-logout-modal') ){
          $(this).parent().before(logoutModal);
        }
      }
      
    });

  });

  $(document).on('click', '.give-donor-dashboard-avatar-control__dropzone', function(){
    document.getElementById("give_kindness-avatar").click();
  });

  let avatarFile = '';

  $(document).on('change', '#give_kindness-avatar', function(){
    const file = this.files[0];
    if (file){
      let reader = new FileReader();
      reader.onload = function(event){
        $('.give-donor-dashboard-avatar-control__preview, .give-donor-dashboard-donor-info__avatar-container').children('img').attr('src', event.target.result);
      }

      avatarFile = file;
      reader.readAsDataURL(file);
    }
  });
    
  $(document).on('click', ".give_kindness-prefix-select", function(){
    $('.give_kindness-prefix-menu').toggle();
  });

  $(document).on('click', ".give_kindness-prefix-selector", function(){
    let getPrefix = $(this).text();
    $('.give_kindness-prefix-singleValue').text(getPrefix);
  });

  $("body").click
  (
    function(e)
    {
      if(e.target.className !== "give_kindness-prefix-select")
      {
        $(".give_kindness-prefix-menu").hide();
      }
    }
  );

  /**************************
  *  
  * Manage Email
  * 
  * 
  ***************************/
  $(document).on('click', "#gk-add-email", function(){
    $(this).before(`
      <div class="give-donor-dashboard-field-row additional-emails-area">
        <div class="give-donor-dashboard-text-control">
            <label class="give-donor-dashboard-text-control__label" for="additional-emails">Additional Emails</label>
            <div class="give-donor-dashboard-text-control__input">
              <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" class="svg-inline--fa fa-envelope fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                  <path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path>
              </svg>
              <input id="additional-emails" type="text" name="additional_emails[]" class="additional-emails">
            </div>
        </div>
        <div class="give-donor-dashboard__email-controls">
            <div class="give-donor-dashboard__make-primary-email">Make Primary</div>
            |
            <div class="give-donor-dashboard__delete-email">Delete</div>
        </div>
      </div>
    `);
  })

  $(document).on('click', ".give-donor-dashboard__delete-email", function(){
    $(this).parent().closest('.additional-emails-area').remove();
  });

  $(document).on('click', ".give-donor-dashboard__make-primary-email", function(){
    let primaryEmail = $('#gk-primary-email').val();
    let getEmail = $(this).parent().siblings().closest('.give-donor-dashboard-text-control').find('.additional-emails').val();

    $('#gk-primary-email').val(getEmail);
    $(this).parent().siblings().closest('.give-donor-dashboard-text-control').find('.additional-emails').val(primaryEmail);
  });

  let countryList = `
  <div class="give_kindness-country-list-menu">
    <div class="give_kindness-country-list">
    <div class="give_kindness_country_name" data-countryCode=""></div>
    <div class="give_kindness_country_name" data-countryCode="US">United States</div>
    <div class="give_kindness_country_name" data-countryCode="CA">Canada</div>
    <div class="give_kindness_country_name" data-countryCode="GB">United Kingdom</div>
    <div class="give_kindness_country_name" data-countryCode="AF">Afghanistan</div>
    <div class="give_kindness_country_name" data-countryCode="AL">Albania</div>
    <div class="give_kindness_country_name" data-countryCode="DZ">Algeria</div>
    <div class="give_kindness_country_name" data-countryCode="AS">American Samoa</div>
    <div class="give_kindness_country_name" data-countryCode="AD">Andorra</div>
    <div class="give_kindness_country_name" data-countryCode="AO">Angola</div>
    <div class="give_kindness_country_name" data-countryCode="AI">Anguilla</div>
    <div class="give_kindness_country_name" data-countryCode="AQ">Antarctica</div>
    <div class="give_kindness_country_name" data-countryCode="AG">Antigua and Barbuda</div>
    <div class="give_kindness_country_name" data-countryCode="AR">Argentina</div>
    <div class="give_kindness_country_name" data-countryCode="AM">Armenia</div>
    <div class="give_kindness_country_name" data-countryCode="AW">Aruba</div>
    <div class="give_kindness_country_name" data-countryCode="AU">Australia</div>
    <div class="give_kindness_country_name" data-countryCode="AT">Austria</div>
    <div class="give_kindness_country_name" data-countryCode="AZ">Azerbaijan</div>
    <div class="give_kindness_country_name" data-countryCode="BS">Bahamas</div>
    <div class="give_kindness_country_name" data-countryCode="BH">Bahrain</div>
    <div class="give_kindness_country_name" data-countryCode="BD">Bangladesh</div>
    <div class="give_kindness_country_name" data-countryCode="BB">Barbados</div>
    <div class="give_kindness_country_name" data-countryCode="BY">Belarus</div>
    <div class="give_kindness_country_name" data-countryCode="BE">Belgium</div>
    <div class="give_kindness_country_name" data-countryCode="BZ">Belize</div>
    <div class="give_kindness_country_name" data-countryCode="BJ">Benin</div>
    <div class="give_kindness_country_name" data-countryCode="BM">Bermuda</div>
    <div class="give_kindness_country_name" data-countryCode="BT">Bhutan</div>
    <div class="give_kindness_country_name" data-countryCode="BO">Bolivia</div>
    <div class="give_kindness_country_name" data-countryCode="BA">Bosnia and Herzegovina</div>
    <div class="give_kindness_country_name" data-countryCode="BW">Botswana</div>
    <div class="give_kindness_country_name" data-countryCode="BV">Bouvet Island</div>
    <div class="give_kindness_country_name" data-countryCode="BR">Brazil</div>
    <div class="give_kindness_country_name" data-countryCode="IO">British Indian Ocean Territory</div>
    <div class="give_kindness_country_name" data-countryCode="BN">Brunei Darrussalam</div>
    <div class="give_kindness_country_name" data-countryCode="BG">Bulgaria</div>
    <div class="give_kindness_country_name" data-countryCode="BF">Burkina Faso</div>
    <div class="give_kindness_country_name" data-countryCode="BI">Burundi</div>
    <div class="give_kindness_country_name" data-countryCode="KH">Cambodia</div>
    <div class="give_kindness_country_name" data-countryCode="CM">Cameroon</div>
    <div class="give_kindness_country_name" data-countryCode="CV">Cape Verde</div>
    <div class="give_kindness_country_name" data-countryCode="KY">Cayman Islands</div>
    <div class="give_kindness_country_name" data-countryCode="CF">Central African Republic</div>
    <div class="give_kindness_country_name" data-countryCode="TD">Chad</div>
    <div class="give_kindness_country_name" data-countryCode="CL">Chile</div>
    <div class="give_kindness_country_name" data-countryCode="CN">China</div>
    <div class="give_kindness_country_name" data-countryCode="CX">Christmas Island</div>
    <div class="give_kindness_country_name" data-countryCode="CC">Cocos Islands</div>
    <div class="give_kindness_country_name" data-countryCode="CO">Colombia</div>
    <div class="give_kindness_country_name" data-countryCode="KM">Comoros</div>
    <div class="give_kindness_country_name" data-countryCode="CD">Congo, Democratic People's Republic</div>
    <div class="give_kindness_country_name" data-countryCode="CG">Congo, Republic of</div>
    <div class="give_kindness_country_name" data-countryCode="CK">Cook Islands</div>
    <div class="give_kindness_country_name" data-countryCode="CR">Costa Rica</div>
    <div class="give_kindness_country_name" data-countryCode="CI">Cote d'Ivoire</div>
    <div class="give_kindness_country_name" data-countryCode="HR">Croatia/Hrvatska</div>
    <div class="give_kindness_country_name" data-countryCode="CU">Cuba</div>
    <div class="give_kindness_country_name" data-countryCode="CY">Cyprus Island</div>
    <div class="give_kindness_country_name" data-countryCode="CZ">Czech Republic</div>
    <div class="give_kindness_country_name" data-countryCode="DK">Denmark</div>
    <div class="give_kindness_country_name" data-countryCode="DJ">Djibouti</div>
    <div class="give_kindness_country_name" data-countryCode="DM">Dominica</div>
    <div class="give_kindness_country_name" data-countryCode="DO">Dominican Republic</div>
    <div class="give_kindness_country_name" data-countryCode="TP">East Timor</div>
    <div class="give_kindness_country_name" data-countryCode="EC">Ecuador</div>
    <div class="give_kindness_country_name" data-countryCode="EG">Egypt</div>
    <div class="give_kindness_country_name" data-countryCode="GQ">Equatorial Guinea</div>
    <div class="give_kindness_country_name" data-countryCode="SV">El Salvador</div>
    <div class="give_kindness_country_name" data-countryCode="ER">Eritrea</div>
    <div class="give_kindness_country_name" data-countryCode="EE">Estonia</div>
    <div class="give_kindness_country_name" data-countryCode="ET">Ethiopia</div>
    <div class="give_kindness_country_name" data-countryCode="FK">Falkland Islands</div>
    <div class="give_kindness_country_name" data-countryCode="FO">Faroe Islands</div>
    <div class="give_kindness_country_name" data-countryCode="FJ">Fiji</div>
    <div class="give_kindness_country_name" data-countryCode="FI">Finland</div>
    <div class="give_kindness_country_name" data-countryCode="FR">France</div>
    <div class="give_kindness_country_name" data-countryCode="GF">French Guiana</div>
    <div class="give_kindness_country_name" data-countryCode="PF">French Polynesia</div>
    <div class="give_kindness_country_name" data-countryCode="TF">French Southern Territories</div>
    <div class="give_kindness_country_name" data-countryCode="GA">Gabon</div>
    <div class="give_kindness_country_name" data-countryCode="GM">Gambia</div>
    <div class="give_kindness_country_name" data-countryCode="GE">Georgia</div>
    <div class="give_kindness_country_name" data-countryCode="DE">Germany</div>
    <div class="give_kindness_country_name" data-countryCode="GR">Greece</div>
    <div class="give_kindness_country_name" data-countryCode="GH">Ghana</div>
    <div class="give_kindness_country_name" data-countryCode="GI">Gibraltar</div>
    <div class="give_kindness_country_name" data-countryCode="GL">Greenland</div>
    <div class="give_kindness_country_name" data-countryCode="GD">Grenada</div>
    <div class="give_kindness_country_name" data-countryCode="GP">Guadeloupe</div>
    <div class="give_kindness_country_name" data-countryCode="GU">Guam</div>
    <div class="give_kindness_country_name" data-countryCode="GT">Guatemala</div>
    <div class="give_kindness_country_name" data-countryCode="GG">Guernsey</div>
    <div class="give_kindness_country_name" data-countryCode="GN">Guinea</div>
    <div class="give_kindness_country_name" data-countryCode="GW">Guinea-Bissau</div>
    <div class="give_kindness_country_name" data-countryCode="GY">Guyana</div>
    <div class="give_kindness_country_name" data-countryCode="HT">Haiti</div>
    <div class="give_kindness_country_name" data-countryCode="HM">Heard and McDonald Islands</div>
    <div class="give_kindness_country_name" data-countryCode="VA">Holy See (City Vatican State)</div>
    <div class="give_kindness_country_name" data-countryCode="HN">Honduras</div>
    <div class="give_kindness_country_name" data-countryCode="HK">Hong Kong</div>
    <div class="give_kindness_country_name" data-countryCode="HU">Hungary</div>
    <div class="give_kindness_country_name" data-countryCode="IS">Iceland</div>
    <div class="give_kindness_country_name" data-countryCode="IN">India</div>
    <div class="give_kindness_country_name" data-countryCode="ID">Indonesia</div>
    <div class="give_kindness_country_name" data-countryCode="IR">Iran</div>
    <div class="give_kindness_country_name" data-countryCode="IQ">Iraq</div>
    <div class="give_kindness_country_name" data-countryCode="IE">Ireland</div>
    <div class="give_kindness_country_name" data-countryCode="IM">Isle of Man</div>
    <div class="give_kindness_country_name" data-countryCode="IL">Israel</div>
    <div class="give_kindness_country_name" data-countryCode="IT">Italy</div>
    <div class="give_kindness_country_name" data-countryCode="JM">Jamaica</div>
    <div class="give_kindness_country_name" data-countryCode="JP">Japan</div>
    <div class="give_kindness_country_name" data-countryCode="JE">Jersey</div>
    <div class="give_kindness_country_name" data-countryCode="JO">Jordan</div>
    <div class="give_kindness_country_name" data-countryCode="KZ">Kazakhstan</div>
    <div class="give_kindness_country_name" data-countryCode="KE">Kenya</div>
    <div class="give_kindness_country_name" data-countryCode="KI">Kiribati</div>
    <div class="give_kindness_country_name" data-countryCode="KW">Kuwait</div>
    <div class="give_kindness_country_name" data-countryCode="KG">Kyrgyzstan</div>
    <div class="give_kindness_country_name" data-countryCode="LA">Lao People's Democratic Republic</div>
    <div class="give_kindness_country_name" data-countryCode="LV">Latvia</div>
    <div class="give_kindness_country_name" data-countryCode="LB">Lebanon</div>
    <div class="give_kindness_country_name" data-countryCode="LS">Lesotho</div>
    <div class="give_kindness_country_name" data-countryCode="LR">Liberia</div>
    <div class="give_kindness_country_name" data-countryCode="LY">Libyan Arab Jamahiriya</div>
    <div class="give_kindness_country_name" data-countryCode="LI">Liechtenstein</div>
    <div class="give_kindness_country_name" data-countryCode="LT">Lithuania</div>
    <div class="give_kindness_country_name" data-countryCode="LU">Luxembourg</div>
    <div class="give_kindness_country_name" data-countryCode="MO">Macau</div>
    <div class="give_kindness_country_name" data-countryCode="MK">Macedonia</div>
    <div class="give_kindness_country_name" data-countryCode="MG">Madagascar</div>
    <div class="give_kindness_country_name" data-countryCode="MW">Malawi</div>
    <div class="give_kindness_country_name" data-countryCode="MY">Malaysia</div>
    <div class="give_kindness_country_name" data-countryCode="MV">Maldives</div>
    <div class="give_kindness_country_name" data-countryCode="ML">Mali</div>
    <div class="give_kindness_country_name" data-countryCode="MT">Malta</div>
    <div class="give_kindness_country_name" data-countryCode="MH">Marshall Islands</div>
    <div class="give_kindness_country_name" data-countryCode="MQ">Martinique</div>
    <div class="give_kindness_country_name" data-countryCode="MR">Mauritania</div>
    <div class="give_kindness_country_name" data-countryCode="MU">Mauritius</div>
    <div class="give_kindness_country_name" data-countryCode="YT">Mayotte</div>
    <div class="give_kindness_country_name" data-countryCode="MX">Mexico</div>
    <div class="give_kindness_country_name" data-countryCode="FM">Micronesia</div>
    <div class="give_kindness_country_name" data-countryCode="MD">Moldova, Republic of</div>
    <div class="give_kindness_country_name" data-countryCode="MC">Monaco</div>
    <div class="give_kindness_country_name" data-countryCode="MN">Mongolia</div>
    <div class="give_kindness_country_name" data-countryCode="ME">Montenegro</div>
    <div class="give_kindness_country_name" data-countryCode="MS">Montserrat</div>
    <div class="give_kindness_country_name" data-countryCode="MA">Morocco</div>
    <div class="give_kindness_country_name" data-countryCode="MZ">Mozambique</div>
    <div class="give_kindness_country_name" data-countryCode="MM">Myanmar</div>
    <div class="give_kindness_country_name" data-countryCode="NA">Namibia</div>
    <div class="give_kindness_country_name" data-countryCode="NR">Nauru</div>
    <div class="give_kindness_country_name" data-countryCode="NP">Nepal</div>
    <div class="give_kindness_country_name" data-countryCode="NL">Netherlands</div>
    <div class="give_kindness_country_name" data-countryCode="AN">Netherlands Antilles</div>
    <div class="give_kindness_country_name" data-countryCode="NC">New Caledonia</div>
    <div class="give_kindness_country_name" data-countryCode="NZ">New Zealand</div>
    <div class="give_kindness_country_name" data-countryCode="NI">Nicaragua</div>
    <div class="give_kindness_country_name" data-countryCode="NE">Niger</div>
    <div class="give_kindness_country_name" data-countryCode="NG">Nigeria</div>
    <div class="give_kindness_country_name" data-countryCode="NU">Niue</div>
    <div class="give_kindness_country_name" data-countryCode="NF">Norfolk Island</div>
    <div class="give_kindness_country_name" data-countryCode="KP">North Korea</div>
    <div class="give_kindness_country_name" data-countryCode="MP">Northern Mariana Islands</div>
    <div class="give_kindness_country_name" data-countryCode="NO">Norway</div>
    <div class="give_kindness_country_name" data-countryCode="OM">Oman</div>
    <div class="give_kindness_country_name" data-countryCode="PK">Pakistan</div>
    <div class="give_kindness_country_name" data-countryCode="PW">Palau</div>
    <div class="give_kindness_country_name" data-countryCode="PS">Palestinian Territories</div>
    <div class="give_kindness_country_name" data-countryCode="PA">Panama</div>
    <div class="give_kindness_country_name" data-countryCode="PG">Papua New Guinea</div>
    <div class="give_kindness_country_name" data-countryCode="PY">Paraguay</div>
    <div class="give_kindness_country_name" data-countryCode="PE">Peru</div>
    <div class="give_kindness_country_name" data-countryCode="PH">Philippines</div>
    <div class="give_kindness_country_name" data-countryCode="PN">Pitcairn Island</div>
    <div class="give_kindness_country_name" data-countryCode="PL">Poland</div>
    <div class="give_kindness_country_name" data-countryCode="PT">Portugal</div>
    <div class="give_kindness_country_name" data-countryCode="PR">Puerto Rico</div>
    <div class="give_kindness_country_name" data-countryCode="QA">Qatar</div>
    <div class="give_kindness_country_name" data-countryCode="RE">Reunion Island</div>
    <div class="give_kindness_country_name" data-countryCode="RO">Romania</div>
    <div class="give_kindness_country_name" data-countryCode="RU">Russian Federation</div>
    <div class="give_kindness_country_name" data-countryCode="RW">Rwanda</div>
    <div class="give_kindness_country_name" data-countryCode="SH">Saint Helena</div>
    <div class="give_kindness_country_name" data-countryCode="KN">Saint Kitts and Nevis</div>
    <div class="give_kindness_country_name" data-countryCode="LC">Saint Lucia</div>
    <div class="give_kindness_country_name" data-countryCode="PM">Saint Pierre and Miquelon</div>
    <div class="give_kindness_country_name" data-countryCode="VC">Saint Vincent and the Grenadines</div>
    <div class="give_kindness_country_name" data-countryCode="SM">San Marino</div>
    <div class="give_kindness_country_name" data-countryCode="ST">Sao Tome and Principe</div>
    <div class="give_kindness_country_name" data-countryCode="SA">Saudi Arabia</div>
    <div class="give_kindness_country_name" data-countryCode="SN">Senegal</div>
    <div class="give_kindness_country_name" data-countryCode="RS">Serbia</div>
    <div class="give_kindness_country_name" data-countryCode="SC">Seychelles</div>
    <div class="give_kindness_country_name" data-countryCode="SL">Sierra Leone</div>
    <div class="give_kindness_country_name" data-countryCode="SG">Singapore</div>
    <div class="give_kindness_country_name" data-countryCode="SK">Slovak Republic</div>
    <div class="give_kindness_country_name" data-countryCode="SI">Slovenia</div>
    <div class="give_kindness_country_name" data-countryCode="SB">Solomon Islands</div>
    <div class="give_kindness_country_name" data-countryCode="SO">Somalia</div>
    <div class="give_kindness_country_name" data-countryCode="ZA">South Africa</div>
    <div class="give_kindness_country_name" data-countryCode="GS">South Georgia</div>
    <div class="give_kindness_country_name" data-countryCode="KR">South Korea</div>
    <div class="give_kindness_country_name" data-countryCode="ES">Spain</div>
    <div class="give_kindness_country_name" data-countryCode="LK">Sri Lanka</div>
    <div class="give_kindness_country_name" data-countryCode="SD">Sudan</div>
    <div class="give_kindness_country_name" data-countryCode="SR">Suriname</div>
    <div class="give_kindness_country_name" data-countryCode="SJ">Svalbard and Jan Mayen Islands</div>
    <div class="give_kindness_country_name" data-countryCode="SZ">Eswatini</div>
    <div class="give_kindness_country_name" data-countryCode="SE">Sweden</div>
    <div class="give_kindness_country_name" data-countryCode="CH">Switzerland</div>
    <div class="give_kindness_country_name" data-countryCode="SY">Syrian Arab Republic</div>
    <div class="give_kindness_country_name" data-countryCode="TW">Taiwan</div>
    <div class="give_kindness_country_name" data-countryCode="TJ">Tajikistan</div>
    <div class="give_kindness_country_name" data-countryCode="TZ">Tanzania</div>
    <div class="give_kindness_country_name" data-countryCode="TG">Togo</div>
    <div class="give_kindness_country_name" data-countryCode="TK">Tokelau</div>
    <div class="give_kindness_country_name" data-countryCode="TO">Tonga</div>
    <div class="give_kindness_country_name" data-countryCode="TH">Thailand</div>
    <div class="give_kindness_country_name" data-countryCode="TT">Trinidad and Tobago</div>
    <div class="give_kindness_country_name" data-countryCode="TN">Tunisia</div>
    <div class="give_kindness_country_name" data-countryCode="TR">Turkey</div>
    <div class="give_kindness_country_name" data-countryCode="TM">Turkmenistan</div>
    <div class="give_kindness_country_name" data-countryCode="TC">Turks and Caicos Islands</div>
    <div class="give_kindness_country_name" data-countryCode="TV">Tuvalu</div>
    <div class="give_kindness_country_name" data-countryCode="UG">Uganda</div>
    <div class="give_kindness_country_name" data-countryCode="UA">Ukraine</div>
    <div class="give_kindness_country_name" data-countryCode="AE">United Arab Emirates</div>
    <div class="give_kindness_country_name" data-countryCode="UY">Uruguay</div>
    <div class="give_kindness_country_name" data-countryCode="UM">US Minor Outlying Islands</div>
    <div class="give_kindness_country_name" data-countryCode="UZ">Uzbekistan</div>
    <div class="give_kindness_country_name" data-countryCode="VU">Vanuatu</div>
    <div class="give_kindness_country_name" data-countryCode="VE">Venezuela</div>
    <div class="give_kindness_country_name" data-countryCode="VN">Vietnam</div>
    <div class="give_kindness_country_name" data-countryCode="VG">Virgin Islands (British)</div>
    <div class="give_kindness_country_name" data-countryCode="VI">Virgin Islands (USA)</div>
    <div class="give_kindness_country_name" data-countryCode="WF">Wallis and Futuna Islands</div>
    <div class="give_kindness_country_name" data-countryCode="EH">Western Sahara</div>
    <div class="give_kindness_country_name" data-countryCode="WS">Western Samoa</div>
    <div class="give_kindness_country_name" data-countryCode="YE">Yemen</div>
    <div class="give_kindness_country_name" data-countryCode="YU">Yugoslavia</div>
    <div class="give_kindness_country_name" data-countryCode="ZM">Zambia</div>
    <div class="give_kindness_country_name" data-countryCode="ZW">Zimbabwe</div>
    </div>
  </div>
  `;

  /**************************
  *  
  * Manage Address
  * 
  * 
  ***************************/
  $(document).on('click', ".give_kindness-country", function(){
    $(this).css({
      'border-color': 'rgb(104, 187, 108)'
    });
  
    if( $(this).siblings().length > 0 ){
      $(this).siblings().remove();
    } else {
      $(this).after(countryList);
    }

  });

  /**************************
  *  
  * Get states by country code
  * 
  ***************************/
  const getStatesList = (items) => {

    if(items.length < 2 ){
      return null;
    }

    let startDiv = `
      <div class="give-donor-dashboard-select-control give_kindness-states-area">
        <label class="give-donor-dashboard-select-control__label">
            State
        </label>
        <div class="give_kindness-form-container">
            <div class="give_kindness-form-control">
              <div class=" give_kindness-form-item">
                  <div class="give_kindness-state">
                    Select ...
                  </div>
                  <div class="give_kindness-form-child-item">
                    <div class="" style="display: inline-block;">
                        <input autocapitalize="none" autocomplete="off" autocorrect="off" id="gk-state" spellcheck="false" tabindex="0" type="text" aria-autocomplete="list" value="" style="box-sizing: content-box; width: 2px; background: 0px center; border: 0px; font-size: inherit; opacity: 1; outline: 0px; padding: 0px; color: inherit;">
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
              <div class="give_kindness-states-list">`

              var statesItem = "";
              items.forEach(function(item) {
                statesItem += `<div class="give_kindness_state_name" data-stateCode="${item.value}">${item.label}</div>`;
              });

              let midDiv = statesItem;

            let endDiv = `
                  </div>
                </div>
              </div>
            </div>
            `;
    const output = `${startDiv} ${midDiv} ${endDiv}` 
    return output;
  };

  /**************************
  *  
  * Change country and display states 
  * following the country code
  * 
  ***************************/
  $(document).on('click', ".give_kindness_country_name", function() {

    let countryName = $(this).text();
    $(this).parents('.give_kindness-country-list-menu')
    .siblings('.give_kindness-country')
    .find('.selected-country-name')
    .text(countryName);

    $('#gk-country').val($(this).attr('data-countryCode'));

    if( $(this).attr('data-countryCode') != '' || $(this).attr('data-countryCode') !=  'undefined' ){
      $.ajax({
        type: 'POST',
        dataType: 'json',
        headers: {'X-WP-Nonce': give_kindness.apiNonce },
        url: give_kindness.giveApiURL+'donor-dashboard/location',
        data: {
          countryCode: $(this).attr('data-countryCode')
        },
        success: function(data) {
          const statesList = data.states.map((state) => {
            return {
              value: state.value,
              label: decodeHTMLEntity(state.label),
            };
          });

          if( $('.give_kindness-states-zip').has('.give_kindness-states-area') ){
            $('.give_kindness-states-area').remove();
          }
          $('.give_kindness-states-zip').prepend(getStatesList(statesList));
          
        },
        fail: function (data) {
          console.log('fail==>', data);
        }
      });

      $(this).parents('.give_kindness-country-list-menu').remove();
    }

  });

  /**************************
  *  
  * Decode HTML
  * 
  ***************************/
  const decodeHTMLEntity = (entity) => {
    const div = document.createElement('div');
    div.innerHTML = entity;
    return div.innerText;
  };

  /**************************
  *  
  * Click to choose state and show/hide states list
  * 
  ***************************/
  $(document).on('click', ".give_kindness-states-area .give_kindness-form-item", function(){
    $(this).parent().siblings('.give_kindness-states-list-menu').toggle();
  });

  /**************************
  *  
  * Display state name when select from option list
  * 
  ***************************/
  $(document).on('click', ".give_kindness_state_name", function(){
    const stateName = $(this).text();
    $(this).parent().parent().siblings().children().find(".give_kindness-state").text(stateName);
    $(this).parent().parent().hide();
    $("#gk-state").val($(this).attr('data-stateCode'));
  });

  $( document ).ready(function() {
    $(".give_kindness_state_name").each(function() {
      if( $(this).hasClass('selected') ){
        const stateName = $(this).text(); 
        $(this).parent().parent().siblings().children().find('.give_kindness-state').text(stateName);
        $("#gk-state").val($(this).attr('data-stateCode'));
      }
    });
  });

    
  /**************************
  *  
  * Check donation anonymous giving 
  * or not
  * 
  ***************************/
  $(document).on('click', ".anonymous-giving", function(){
    $('.anonymous-giving').attr('checked', false);
    $(this).attr('checked', true);
  });

  /**************************
  *  
  * Update profile
  * 
  ***************************/
  async function uploadAvatar(file){

    var avatarId = null;
    const formData = new window.FormData();
    formData.append('file', file);

    await $.ajax({
      type: 'POST',
      url: give_kindness.giveApiURL+'donor-dashboard/avatar',
      data: formData,
      processData: false,
      contentType: false,
      beforeSend: function(xhr) {
        xhr.setRequestHeader( 'X-WP-Nonce', give_kindness.apiNonce );
      },
      success: function(data) {
        if(data.id){
          avatarId = data.id;
        }
      },
      error: function (error) {
        console.log('fail==>', error);
      }
    });

    return avatarId; 

  }

  $(document).on('click', "#give_kindness-update-profile", async function(){

    let thisBtn = $(this);
    let titlePrefix = $('.give_kindness-prefix-singleValue').text();
    let firstName = $("#gk-first-name").val();
    let lastName = $("#gk-last-name").val();
    let company = $("#gk-company").val();
    let primaryEmail = $("#gk-primary-email").val();

    let additionalEmails = [];

    if( $('.additional-emails').length > 0 ) {
      $('.additional-emails').each(function() {
        additionalEmails.push( $(this).val() );
      });
    }

    let pCountry = '';
    let pLine1 = '';
    let pLine2 = '';
    let pState = '';
    let pCity = '';
    let pZip = '';
    let isAnonymous = 0;
    let avatarId = $('#avatarId').val();
    
    if( $('#gk-country').length > 0 && $('#gk-country').val() != '' ){
      pCountry = $('#gk-country').val();
    }

    if( $('#gk-address-1').length > 0 && $('#gk-address-1').val() != '' ){
      pLine1 = $('#gk-address-1').val();
    }

    if( $('#gk-address-2').length > 0 && $('#gk-address-2').val() != '' ){
      pLine2 = $('#gk-address-2').val();
    }
    
    if( $('#gk-city').length > 0 && $('#gk-city').val() != '' ){
      pCity = $('#gk-city').val();
    }

    if( $('#gk-state').length > 0 && $('#gk-state').val() != '' ){
      pState = $('#gk-state').val();
    }

    if( $('#gk-zip').length > 0 && $('#gk-zip').val() != '' ){
      pZip = $('#gk-zip').val();
    }

    let primaryAddress = {
      country: pCountry,
      line1:pLine1,
      line2:pLine2,
      state:pState,
      city:pCity,
      zip:pZip
    };

    let additionalAddresses = [];

    $(".anonymous-giving").each(function(){
      if( $(this).is(':checked') ) {
        isAnonymous =  $(this).val();
      }
    });

    if(avatarFile) {
      avatarId = await uploadAvatar(avatarFile);
      $('#avatarId').val(avatarId);
    }

    thisBtn.text(give_kindness.updating);

    $.ajax({
      type: 'POST',
      dataType: 'json',
      headers: {'X-WP-Nonce': give_kindness.apiNonce },
      url: give_kindness.giveApiURL+'donor-dashboard/profile',
      data: {
          data: JSON.stringify({
            titlePrefix,
            firstName,
            lastName,
            company,
            primaryEmail,
            additionalEmails,
            primaryAddress,
            additionalAddresses,
            avatarId,
            isAnonymous,
        }),
        id: give_kindness.userId
      },
      success: function(data) {
        thisBtn.text(give_kindness.updated);
      },
      error: function (error) {
        console.log('fail==>', error);
        thisBtn.text(give_kindness.updateProfile);
      }
    });

  });

  /**************************
  *  
  * Show login form and
  * hide register form
  * 
  ***************************/
  $(document).on('click', '.give-kindness-show-login', function(){
    $('.give-kindness-login-part').attr("style", "display: inline !important");
    $('.give-kindness-signup-part').hide();
  });

  $(document).on('click', '.give-kindness-show-signup', function(){
    $('.give-kindness-login-part').attr("style", "display: none !important");
    $('.give-kindness-signup-part').attr("style", "display: inline !important");
  });

/**************************
  *  
  * Ajax request function
  * 
  ***************************/
  const ajaxRequest = async (requestData) => {
    $.ajax({
      type: requestData.method,
      // dataType: 'json',
      processData: false,
      contentType: false,
      cache: false,
      headers: {'X-WP-Nonce': give_kindness.apiNonce },
      url: requestData.url,
      data: requestData.data,
      success: function(data) {

        console.log('response ==>', data);
        if( data.status === requestData.status ) {
          if( requestData.reload ){
            window.location.reload();
          }
        }
      },
      error: function (error) {
        console.log('fail==>', error);
      }
    });
  }

  /**************************
  *  
  * Login
  * 
  ***************************/
  $(document).on('click', '#give-kindness-login-submit', function(){

    let that = $(this);
    let login = $('#give-kindness-username').val();
    let password = $('#give-kindness-password').val();

    if( login == '' || password == '' ){
      return false; 
    }

    $.ajax({
      type: 'POST',
      dataType: 'json',
      headers: {'X-WP-Nonce': give_kindness.apiNonce },
      url: give_kindness.giveApiURL+'donor-dashboard/login',
      data: {
        login: login,
        password: password
      },
      success: function(data) {
        
        if( data.status === 200 ) {
          window.location.reload();
        }

        if( data.status === 400 ) {
          $('#give-kindness-username').val('');
          $('#give-kindness-password').val('');

          const msg = data.body_response.message; 
          if( that.siblings('.give-donor-dashboard__auth-modal-error').length > 0 ){
            that.siblings('.give-donor-dashboard__auth-modal-error').text(msg);
          } else {
            that.after(`<div class="give-donor-dashboard__auth-modal-error">${msg}</div>`);
          }
        }
      },
      error: function (error) {
        console.log('fail==>', error);
      }
    });
  });

  /**************************
  *  
  * Logout
  * 
  ***************************/
  $(document).on('click', '#give-kindness-logout', function(){

    $.ajax({
      type: 'POST',
      dataType: 'json',
      headers: {'X-WP-Nonce': give_kindness.apiNonce },
      url: give_kindness.giveApiURL+'donor-dashboard/logout',
      success: function(data) {
        if( data.status === 200 ) {
          window.location.reload();
        }
      },
      error: function (error) {
        console.log('fail==>', error);
      }
    });

  });

  /**************************
  *  
  * Signup
  * 
  ***************************/

  const validateEmail = (email) => {
    return email.match(
      /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
  };

  $(document).on('click', '#give-kindness-signup-submit', async function(){

    let that = $(this);
    let email = $('#give-kindness-rusername').val();
    let password = $('#give-kindness-rpassword').val();

    if( email == '' || password == '' ){
      return false; 
    }

    if( password.length < 6 ){

      if( that.siblings('.give-donor-dashboard__auth-modal-error').length > 0 ){
        that.siblings('.give-donor-dashboard__auth-modal-error').text(give_kindness.passwordLength);
      } else {
        that.after(`<div class="give-donor-dashboard__auth-modal-error">${give_kindness.passwordLength}</div>`);
      }

      return false; 
    }

    if ( ! validateEmail(email) ) {

      if( that.siblings('.give-donor-dashboard__auth-modal-error').length > 0 ){
        that.siblings('.give-donor-dashboard__auth-modal-error').text(give_kindness.emailNotValid);
      } else {
        that.after(`<div class="give-donor-dashboard__auth-modal-error">${give_kindness.emailNotValid}</div>`);
      }
      return false; 

    } else {

      that.attr('disabled', true);
      that.text(give_kindness.pleaseWait);
      $.ajax({
        type: 'POST',
        credentials: 'same-origin',
        headers: {
          'X-WP-Nonce': give_kindness.apiNonce, 
          'Content-Type': 'application/x-www-form-urlencoded',
          'Cache-Control': 'no-cache',
        },
        url: give_kindness.giveKindnessApiURL+'register',
        data: {
          email: email,
          password: password
        },
        success: async function(data) {

          if( that.siblings('.give-donor-dashboard__auth-modal-error').length > 0 ){
            that.siblings('.give-donor-dashboard__auth-modal-error').text(data.message);
          } else {
            that.after(`<div class="give-donor-dashboard__auth-modal-error">${data.message}</div>`);
          }

          if(data.status == 201){
            let requestData = {
              method: 'POST', 
              url: give_kindness.giveApiURL+'donor-dashboard/login',
              data: {
                login: email,
                password: password
              }, 
              status: 200,
              reload: true
            };
  
            await ajaxRequest(requestData);
            that.attr('disabled', false);
          }

        },
        error: function (error) {
          console.log('fail==>', error);
          that.attr('disabled', false);
        }
      });
    }

  });

  /**************************
  *  
  * Send verification email 
  * 
  ***************************/
  $(document).on('click', '#give-kindness-verify-submit', async function(){
    
    let that = $(this);
    that.attr('disabled', true);
    that.text(give_kindness.pleaseWait);

    let requestData = {
      method: 'POST', 
      url: give_kindness.giveKindnessApiURL+'send-verify-email',
      data: {
        user_id: give_kindness.userId
      }, 
      status: 200,
      reload: false
    };

    await ajaxRequest(requestData);
    that.text(give_kindness.sendAgain);
    that.attr('disabled', false);
    if( that.siblings('.give-donor-dashboard__auth-modal-error').length > 0 ){
      that.siblings('.give-donor-dashboard__auth-modal-error').text(give_kindness.pleaseCheckEmail);
    } else {
      that.after(`<div class="give-donor-dashboard__auth-modal-error">${give_kindness.pleaseCheckEmail}</div>`);
    }

  });

  /**************************
  *  
  * Has any government assistance been offered 
  * to the person who needs help?
  * 
  ***************************/
  $(document).on('click', '#gk-government-assistance-yes, #gk-government-assistance-no', function() {
    let that = $(this);
    let buttonValue = that.data('button-value');
    $('#gk-government-assistance').val(buttonValue);
    if( buttonValue == 'Yes' ) {
      $('.gk-government-assistance-area').show();
      $('#gk-government-assistance-yes').addClass('give-donor-dashboard-button give-donor-dashboard-button--primary');
      $('#gk-government-assistance-no').removeClass('give-donor-dashboard-button give-donor-dashboard-button--primary');
    } else {
      $('.gk-government-assistance-area').hide();
      $('#gk-government-assistance-no').addClass('give-donor-dashboard-button give-donor-dashboard-button--primary');
      $('#gk-government-assistance-yes').removeClass('give-donor-dashboard-button give-donor-dashboard-button--primary');
    }
  })

  /**************************
  *  
  * Would you like to allocate 10% of 
  * your funds raised for boosting?
  * 
  ***************************/
  $(document).on('click', '#gk-campaign-boosting-no, #gk-campaign-boosting-yes', function() {
    let that = $(this);
    let buttonValue = that.data('button-value');
    $('#gk-campaign-boosting').val(buttonValue);
    if( buttonValue == 'Yes' ) {
      $('#gk-campaign-boosting-yes').addClass('give-donor-dashboard-button give-donor-dashboard-button--primary');
      $('#gk-campaign-boosting-no').removeClass('give-donor-dashboard-button give-donor-dashboard-button--primary');
    } else {
      $('#gk-campaign-boosting-no').addClass('give-donor-dashboard-button give-donor-dashboard-button--primary');
      $('#gk-campaign-boosting-yes').removeClass('give-donor-dashboard-button give-donor-dashboard-button--primary');
    }
  });

  /**************************
  *  
  * Campaign create
  * 
  ***************************/
  $(document).on('click', '#give-kindness-save-draft, #give-kindness-submit-approval', async function() {
    
    let submit_type = $(this).data('submit-type');

    let fields = [
      '#gk-campaign-name',
      '#gk-fundraising-target',
      '#gk-beneficiary-name',
      '#gk-mobile-code',
      '#gk-mobile-number',
      '#gk-beneficiary-relationship',
      '#gk-beneficiary-country',
      '#gk-beneficiary-age',
      '#gk-medical-condition',
      '#gk-medical-document',
      '#gk-campaign-email'
    ]

    let status = true; 
    let campaign_detail = tinymce.get( $("#gk-campaign-detail").attr( 'id' ) ).getContent( { format: 'text' } );
    let medical_document = $('#medical-document-upload').get(0).files.length;
    
    for (let i = 0; i < fields.length; i++) {
      if( $(fields[i]).val() == '' ){
        status = false;
        break;
      }
    }

    if( campaign_detail == '' ) {
      status = false;
    }

    if( medical_document === 0 ) {
      status = false;
    }

    if( status ) {

      var fd = new FormData();
      fd.append( "campaign_name", $('#gk-campaign-name').val() );
      fd.append( "fundrais_amount", $('#gk-fundraising-target').val() );
      fd.append( "benefiary_name", $('#gk-beneficiary-name').val() );
      fd.append( "mobile_code", $('#gk-mobile-code').val() );
      fd.append( "mobile_number", $('#gk-mobile-number').val() );
      fd.append( "beneficiary_relationship", $('#gk-beneficiary-relationship').val() );
      fd.append( "beneficiary_country", $('#gk-beneficiary-country').val() );
      fd.append( "beneficier_age", $('#gk-beneficiary-age').val() );
      fd.append( "medical_condition", $('#gk-medical-condition').val() );
      fd.append( "medical_document_type", $('#gk-medical-document').val() );
      fd.append( "campaign_email", $('#gk-campaign-email').val() );
      fd.append( "medical_document_file", $('#medical-document-upload')[0].files[0]);
      fd.append( "campaign_detail", campaign_detail );
      fd.append( "campaign_country", $('#gk-campaign-country').val() );
      fd.append( "government_assistance", $('#gk-government-assistance').val() );
      fd.append( "government_assistance_details", $('#gk-government-assistance-details').val() );
      fd.append( "campaign_boosting", $('#gk-campaign-boosting').val() );
      fd.append( "submit_type", submit_type );

      let requestData = {
        method: 'POST', 
        url: give_kindness.giveKindnessApiURL+'create-campaign',
        data: fd, 
        status: 200,
        reload: false
      };
      await ajaxRequest(requestData);

    } else {
      alert('All star marked fields are required!');
    }

  }); 

})(jQuery);

/************************
* 
* View receipt details
* 
************************/
function viewReceipt(that, id) {
  jQuery('#'+id).hide();
  let receiptNo = jQuery(that).data('receipt-no');
  let divId = '#receipt-no-'+receiptNo;
  jQuery(divId).show();
};

function closeReceipt(that, id) {
  jQuery('#'+id).show();
  let receiptNo = jQuery(that).data('receipt-no');
  let divId = '#receipt-no-'+receiptNo;
  jQuery(divId).hide();
};

/************************
* 
* Open and close content
* 
************************/
function showHideContent(that, targetId) {
  jQuery(that).hide();
  jQuery(targetId).show();
};

/************************
* 
* Image upload
* 
************************/
function ekUpload(){
  function Init() {
    var fileSelect    = document.getElementById('medical-document-upload'),
        fileDrag      = document.getElementById('file-drag'),
        submitButton  = document.getElementById('submit-button');

    fileSelect.addEventListener('change', fileSelectHandler, false);

    // Is XHR2 available?
    var xhr = new XMLHttpRequest();
    if (xhr.upload) {
      // File Drop
      fileDrag.addEventListener('dragover', fileDragHover, false);
      fileDrag.addEventListener('dragleave', fileDragHover, false);
      fileDrag.addEventListener('drop', fileSelectHandler, false);
    }
  }

  function fileDragHover(e) {
    var fileDrag = document.getElementById('file-drag');

    e.stopPropagation();
    e.preventDefault();

    fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body medical-document-upload');
  }

  function fileSelectHandler(e) {
    // Fetch FileList object
    var files = e.target.files || e.dataTransfer.files;

    // Cancel event and hover styling
    fileDragHover(e);

    // Process all File objects
    for (var i = 0, f; f = files[i]; i++) {
      parseFile(f);
      uploadFile(f);
    }
  }

  // Output
  function output(msg) {
    // Response
    var m = document.getElementById('messages');
    m.innerHTML = msg;
  }

  function parseFile(file) {

    output(
      '<strong>' + encodeURI(file.name) + '</strong>'
    );
    
    var imageName = file.name;

    var isGood = (/\.(?=gif|jpg|png|jpeg|pdf|docx|doc)/gi).test(imageName);
    if (isGood) {
      document.getElementById('start').classList.add("hidden");
      document.getElementById('response').classList.remove("hidden");
      document.getElementById('notimage').classList.add("hidden");
      // Thumbnail Preview
      document.getElementById('file-image').classList.remove("hidden");
      document.getElementById('file-image').src = URL.createObjectURL(file);
    }
    else {
      document.getElementById('file-image').classList.add("hidden");
      document.getElementById('notimage').classList.remove("hidden");
      document.getElementById('start').classList.remove("hidden");
      document.getElementById('response').classList.add("hidden");
      document.getElementById("medical-document-upload-form").reset();
    }
  }

  function setProgressMaxValue(e) {
    var pBar = document.getElementById('file-progress');

    if (e.lengthComputable) {
      pBar.max = e.total;
    }
  }

  function updateFileProgress(e) {
    var pBar = document.getElementById('file-progress');

    if (e.lengthComputable) {
      pBar.value = e.loaded;
    }
  }

  function uploadFile(file) {

    var xhr = new XMLHttpRequest(),
      fileInput = document.getElementById('class-roster-file'),
      pBar = document.getElementById('file-progress'),
      fileSizeLimit = 2024; // In MB
      const fileSize = Math.round((file.size / 1024));

    if (xhr.upload) {
      // Check if file is less than x MB
      if (fileSize <= fileSizeLimit ) {
      } else {
        output('<span style="color:red">Please upload a smaller file (< ' + fileSizeLimit + ' MB).</span>');
      }
    }
  }

  // Check for the various File API support.
  if (window.File && window.FileList && window.FileReader) {
    Init();
  } else {
    document.getElementById('file-drag').style.display = 'none';
  }
}
ekUpload();