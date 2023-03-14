(function($, window, document ) {
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
                  <button class="give-donor-dashboard-button give-donor-dashboard-button--primary give-kindness-logout" id="give-kindness-logout">
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
            $(this).addClass("give-donor-dashboard-tab-link--is-active");
          } else {
            if( typeof targetTabContent !== "undefined"){
              $('#'+currentTabContent).hide();
            }
          }

          // Hide receipt details content
          // Hide create campaign by default
          // Hide edit campaign by default
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

    thisBtn.attr('disabled', true);
    thisBtn.text(give_kindness.updating);

    if(avatarFile) {
      avatarId = await uploadAvatar(avatarFile);
      $('#avatarId').val(avatarId);
    }

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
        thisBtn.attr('disabled', false);
      },
      error: function (error) {
        console.log('fail==>', error);
        thisBtn.text(give_kindness.updateProfile);
        thisBtn.attr('disabled', false);
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
      dataType: 'json',
      processData: false,
      contentType: false,
      cache: false,
      headers: {'X-WP-Nonce': give_kindness.apiNonce },
      url: requestData.url,
      data: requestData.data,
      success: function(data) {

        if( requestData.btn ){
          requestData.btn.attr('disabled', false);
        }

        if( data.status === requestData.status ) {

          if(data.message.length > 0 ){
            alert(data.message);
          }

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

    that.attr('disabled', true);

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
        
        that.attr('disabled', false);

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
  $(document).on('click', '#give-kindness-logout, .give-kindness-logout', function(){

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

          console.log('register response==>',data)
          if( that.siblings('.give-donor-dashboard__auth-modal-error').length > 0 ){
            that.siblings('.give-donor-dashboard__auth-modal-error').text(data.message);
          } else {
            that.after(`<div class="give-donor-dashboard__auth-modal-error">${data.message}</div>`);
          }

          /***********************
           * Auto login
           * 
           **********************/
          $.ajax({
            method: 'POST',
            dataType: 'json',
            cache: false,
            headers: {'X-WP-Nonce': give_kindness.apiNonce },
            url: give_kindness.giveApiURL+'donor-dashboard/login',
            data: {
              login: email,
              password: password
            }, 
            success: function(data) {
              console.log('login res ==>', data);
              if( data.status === 200 ) {
                // window.location.reload();
                window.location.href= give_kindness.dashboardURL;
              }
              //that.attr('disabled', false);
            },
            error: function (error) {
              console.log('fail==>', error);
              alert('Auto login failed. Please try again.')
            }
          });

        },
        error: function (error) {
          console.log('fail==>', error);
          that.attr('disabled', false);
          that.text(give_kindness.signUp);
          alert('Something went wrong! Please try again.')
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
      reload: false,
      btn: that
    };

    await ajaxRequest(requestData);
    that.text(give_kindness.sendAgain);
    //that.attr('disabled', false);

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
  $(document).on('click', '#gk-government-assistance-yes, #gk-government-assistance-no, #gke-government-assistance-yes, #gke-government-assistance-no', function() {
    let that = $(this);
    let buttonValue = that.data('button-value');
    $('#gk-government-assistance').val(buttonValue);
    if( buttonValue == 'Yes' ) {
      $(".gk-government-assistance-area").show();
      $("#gk-government-assistance-yes").addClass("give-donor-dashboard-button--primary").removeClass("give-donor-dashboard-button--default");
      $("#gk-government-assistance-no").removeClass("give-donor-dashboard-button--primary").addClass("give-donor-dashboard-button--default");

      $(".gke-government-assistance-area").show();
      $("#gke-government-assistance-yes").addClass("give-donor-dashboard-button--primary").removeClass("give-donor-dashboard-button--default");
      $("#gke-government-assistance-no").removeClass("give-donor-dashboard-button--primary").addClass("give-donor-dashboard-button--default");

    } else {
      $(".gk-government-assistance-area").hide();
      $("#gk-government-assistance-no").addClass("give-donor-dashboard-button--primary").removeClass("give-donor-dashboard-button--default");
      $("#gk-government-assistance-yes").removeClass("give-donor-dashboard-button--primary").addClass("give-donor-dashboard-button--default");

      $(".gke-government-assistance-area").hide();
      $("#gke-government-assistance-no").addClass("give-donor-dashboard-button--primary").removeClass("give-donor-dashboard-button--default");
      $("#gke-government-assistance-yes").removeClass("give-donor-dashboard-button--primary").addClass("give-donor-dashboard-button--default");
    }

    // For edit campaign
    $("#gke-government-assistance").val(buttonValue);
    if( buttonValue == "Yes" ) {
      $(".gke-government-assistance-area").show();
      $("#gke-government-assistance-yes").addClass("give-donor-dashboard-button--primary").removeClass( "give-donor-dashboard-button--default");
      $("#gke-government-assistance-no").removeClass("give-donor-dashboard-button--primary").addClass( "give-donor-dashboard-button--default");
    } else {
      $(".gke-government-assistance-area").hide();
      $("#gke-government-assistance-no").addClass("give-donor-dashboard-button--primary").removeClass("give-donor-dashboard-button--default");
      $("#gke-government-assistance-yes").removeClass("give-donor-dashboard-button--primary").addClass("give-donor-dashboard-button--default");
    }

  })

  /**************************
  *  
  * Would you like to allocate 10% of 
  * your funds raised for boosting?
  * 
  ***************************/
  $(document).on('click', '#gk-campaign-boosting-no, #gk-campaign-boosting-yes, #gke-campaign-boosting-no, #gke-campaign-boosting-yes', function() {
    let that = $(this);
    let buttonValue = that.data('button-value');
    $('#gk-campaign-boosting').val(buttonValue);
    if( buttonValue == 'Yes' ) {
      $('#gk-campaign-boosting-yes').addClass('give-donor-dashboard-button--primary').removeClass('give-donor-dashboard-button--default');
      $('#gk-campaign-boosting-no').removeClass('give-donor-dashboard-button--primary').addClass('give-donor-dashboard-button--default');
    } else {
      $('#gk-campaign-boosting-no').addClass('give-donor-dashboard-button--primary').removeClass('give-donor-dashboard-button--default');
      $('#gk-campaign-boosting-yes').removeClass('give-donor-dashboard-button--primary').addClass('give-donor-dashboard-button--default');
    }

    $('#gke-campaign-boosting').val(buttonValue);
    if( buttonValue == 'Yes' ) {
      $('#gke-campaign-boosting-yes').addClass('give-donor-dashboard-button--primary').removeClass('give-donor-dashboard-button--default');
      $('#gke-campaign-boosting-no').removeClass('give-donor-dashboard-button--primary').addClass('give-donor-dashboard-button--default');
    } else {
      $('#gke-campaign-boosting-no').addClass('give-donor-dashboard-button--primary').removeClass('give-donor-dashboard-button--default');
      $('#gke-campaign-boosting-yes').removeClass('give-donor-dashboard-button--primary').addClass('give-donor-dashboard-button--default');
    }
  });

  /**************************
  *  
  * Enable media uploader
  * 
  ***************************/
	$(document).ready(function() {

    let file_frame;
    let attachment;
    let wrapper = $('#give-kindness-media-items'); //Input image wrapper
    $(document).on('click', '#gk-file-drag', function(event) { 
      
      event.preventDefault();
      let file_type = $('#gk-medical-document').val();
      if ( file_frame ) {
        file_frame = '';
      }

      file_frame = wp.media.frames.file_frame = wp.media({
        title: 'File upload',
        button: {
          text: 'Upload now',
        },
        library: {
          type: [ file_type ]
        },
        multiple: true // set this to true for multiple file selection
      });

      file_frame.on( 'select', function() {
        attachment = file_frame.state().get('selection').toJSON();
        $('#give-kindness-media-items').removeClass('give-kindness-hide');
        $.each(attachment, function(index, value) {

          if(file_type == 'image') {
            $(wrapper).prepend(`<div class="give-kindness-media-item">
              <img src="${value.url}" alt="">
              <a href="javascript:void(0);" class="give-kindness-media-item-remove" title="Remove Image">
                <svg style="width: 15px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="svg-inline--fa fa-times-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#ff0000" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
                </svg>
              </a>
              <input type="hidden" class="gk-campaign-files" name="gk-campaign-files[]" value="${value.id}">
            </div>`); // display image
          } else {
            $(wrapper).prepend(`<div class="give-kindness-media-item">
            <object data="${value.url}" type="application/pdf" width="100px" height="100px">
              <embed src="${value.url}" type="application/pdf">
                <p>This browser does not support PDFs. Please download the PDF to view it: <a href="${value.url}" download>Download PDF</a>.</p>
              </embed>
            </object>
              <a href="javascript:void(0);" class="give-kindness-media-item-remove" title="Remove Image">
                <svg style="width: 15px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="svg-inline--fa fa-times-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#ff0000" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
                </svg>
              </a>
              <input type="hidden" class="gk-campaign-files" name="gk-campaign-files[]" value="${value.id}">
            </div>`); // display image
          }

        });
      });

      file_frame.open();
    });

    /****
     * 
     * 
     */
    $(document).on('click', '#gke-file-drag', function(event) { 
      event.preventDefault();

      let that = $(this);
      let wrapper = $('#give-kindness-edit-media-items');
      let file_type = $('#gke-medical-document').val();
      if ( file_frame ) {
        file_frame = '';
      }

      file_frame = wp.media.frames.file_frame = wp.media({
        title: 'File upload',
        button: {
          text: 'Upload now',
        },
        library: {
          type: [ file_type ]
        },
        multiple: true // set this to true for multiple file selection
      });

      file_frame.on( 'select', function() {
        attachment = file_frame.state().get('selection').toJSON();
        wrapper.removeClass('give-kindness-hide');
        $.each(attachment, function(index, value) {

          if(file_type == 'image') {
            wrapper.prepend(`<div class="give-kindness-media-item">
              <img src="${value.url}" alt="">
              <a href="javascript:void(0);" class="give-kindness-media-item-remove" title="Remove Image">
                <svg style="width: 15px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="svg-inline--fa fa-times-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#ff0000" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
                </svg>
              </a>
              <input type="hidden" class="gk-campaign-files" name="gk-campaign-files[]" value="${value.id}">
            </div>`); // display image
          } else {
            wrapper.prepend(`<div class="give-kindness-media-item">
            <object data="${value.url}" type="application/pdf" width="100px" height="100px">
              <embed src="${value.url}" type="application/pdf">
                <p>This browser does not support PDFs. Please download the PDF to view it: <a href="${value.url}" download>Download PDF</a>.</p>
              </embed>
            </object>
              <a href="javascript:void(0);" class="give-kindness-media-item-remove" title="Remove Image">
                <svg style="width: 15px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="svg-inline--fa fa-times-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#ff0000" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
                </svg>
              </a>
              <input type="hidden" class="gk-campaign-files" name="gk-campaign-files[]" value="${value.id}">
            </div>`); // display image
          }

        });
      });

      file_frame.open();
    });

		$(document).on('click', '.give-kindness-media-item-remove', function(e){ //Once remove button is clicked
			e.preventDefault();
			$(this).parent().remove(); //Remove image
		});

  });

  /**************************
  *  
  * Campaign create
  * 
  ***************************/
  $(document).on('click', '#give-kindness-save-draft, #give-kindness-submit-approval', async function() {
    
    let submit_type = $(this).data('submit-type');
    let that = $(this);

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
    let medical_document = $('.gk-campaign-files');
    let medical_documents = [];

    if( medical_document.length > 0 ){
      medical_documents = medical_document.map(function () {
        return this.value;
      }).get();
    }
    
    for (let i = 0; i < fields.length; i++) {
      if( $(fields[i]).val() == '' ){
        status = false;
        break;
      }
    }

    if( campaign_detail == '' ) {
      status = false;
    }

    if( medical_document.length === 0 ) {
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
      fd.append( "medical_document_file", medical_documents);
      fd.append( "campaign_email", $('#gk-campaign-email').val() );
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
        reload: true,
        btn: that
      };

      that.attr('disabled', true);
      that.text(give_kindness.pleaseWait);
      await ajaxRequest(requestData);
      //that.attr('disabled', false);

      if( submit_type == 'draft' ) {
        that.text(give_kindness.saveDraft);
      } else {
        that.text(give_kindness.submitForApproval);
      }

    } else {
      alert('All star marked fields are required!');
    }

  });

  /**************************
  *  
  * Campaign edit
  * 
  ***************************/
  $(document).on('click', '#give_kindness-update-campaign', async function() {
      
    let that = $(this);

    let fields = [
      '#gke-campaign-name',
      '#gke-fundraising-target',
      '#gke-beneficiary-name',
      '#gke-mobile-code',
      '#gke-mobile-number',
      '#gke-beneficiary-relationship',
      '#gke-beneficiary-country',
      '#gke-beneficiary-age',
      '#gke-medical-condition',
      '#gke-campaign-email',
      '#gke-medical-document'
    ]

    let status = true; 
    let campaign_detail = tinymce.get( $("#gke-campaign-detail").attr( 'id' ) ).getContent( { format: 'text' } );
    let medical_document = $('.gk-campaign-files');
    let medical_documents = [];

    if( medical_document.length > 0 ){
      medical_documents = medical_document.map(function () {
        return this.value;
      }).get();
    }
    
    for (let i = 0; i < fields.length; i++) {
      if( $(fields[i]).val() == '' ){
        status = false;
        break;
      }
    }

    if( campaign_detail == '' ) {
      status = false;
    }

    if( medical_document.length === 0 ) {
      status = false;
    }

    if( status ) {

      var fd = new FormData();
      fd.append( "campaign_name", $('#gke-campaign-name').val() );
      fd.append( "fundrais_amount", $('#gke-fundraising-target').val() );
      fd.append( "benefiary_name", $('#gke-beneficiary-name').val() );
      fd.append( "mobile_code", $('#gke-mobile-code').val() );
      fd.append( "mobile_number", $('#gke-mobile-number').val() );
      fd.append( "beneficiary_relationship", $('#gke-beneficiary-relationship').val() );
      fd.append( "beneficiary_country", $('#gke-beneficiary-country').val() );
      fd.append( "beneficier_age", $('#gke-beneficiary-age').val() );
      fd.append( "medical_condition", $('#gke-medical-condition').val() );
      fd.append( "medical_document_type", $('#gke-medical-document').val() );
      fd.append( "medical_document_file", medical_documents);
      fd.append( "campaign_email", $('#gke-campaign-email').val() );
      fd.append( "campaign_detail", campaign_detail );
      fd.append( "campaign_country", $('#gke-campaign-country').val() );
      fd.append( "government_assistance", $('#gke-government-assistance').val() );
      fd.append( "government_assistance_details", $('#gke-government-assistance-details').val() );
      fd.append( "campaign_boosting", $('#gke-campaign-boosting').val() );
      fd.append( "campaign_id", that.data('campaign-id') );

      let requestData = {
        method: 'POST', 
        url: give_kindness.giveKindnessApiURL+'edit-campaign',
        data: fd, 
        status: 200,
        reload: false,
        btn: that
      };

      that.attr('disabled', true);
      that.text(give_kindness.pleaseWait);
      await ajaxRequest(requestData);
      // await that.attr('disabled', false);
      await that.text(give_kindness.saveSeeCampaign);
      
    } else {
      alert('Please check required fields or invalid data');
    }

  });

  /************************
  * 
  * View donations
  * == It will fire when 
  * == click on view-donation menu
  * 
  * 
  * View statistics 
  * == It will fire when 
  * == click on statistics menu
  * 
  ************************/
  $(document).on('click', '#give-kindness-campaign-edit-menu .give-donor-dashboard-tab-link', async function() {

    const viewDonations = 'give_kindness-view-donations';
    const viewStatistics = 'give_kindness-campaign-statistics';
    const viewDonationPresets = 'give_kindness-donations-preset';
    let currentTabContent = $(this).data('tab-id');

    if( typeof currentTabContent != "undefined" ) {
      if( currentTabContent === viewDonations ) {

        let campaign_id = jQuery('#give_kindness-update-campaign').attr('data-campaign-id');
        if( campaign_id == '' ) {
          return; 
        }

        $("#give-kindness-campaign-donations").html(give_kindness.pleaseWait);
        $("#give-kindness-campaign-donations").css({'opacity': '0.5'});

        $.ajax({
          type: 'POST',
          dataType: 'json',
          headers: {'X-WP-Nonce': give_kindness.apiNonce },
          url: give_kindness.giveKindnessApiURL+'donations',
          data: {
            form: campaign_id
          },
          success: function(data) {
            $("#give-kindness-campaign-donations").css({'opacity': '1'});
            $("#give-kindness-campaign-donations").html(data);
          },
          error: function (error) {
            console.log('fail==>', error);
            $("#give-kindness-campaign-donations").css({'opacity': '1'});
          }
        });

      }

      if( currentTabContent === viewStatistics ) {

        let campaign_id = jQuery('#give_kindness-update-campaign').attr('data-campaign-id');
        if( campaign_id == '' ) {
          return; 
        }

        $.ajax({
          type: 'POST',
          dataType: 'json',
          headers: {'X-WP-Nonce': give_kindness.apiNonce },
          url: give_kindness.giveKindnessApiURL+'statistics',
          data: {
            form: campaign_id
          },
          success: function(data) {
            if( data !='' ) {
              $("#give-kindness-goal").html(data.goal);
              $("#give-kindness-donations").html(data.donations);
              $("#give-kindness-revenue").html(data.revenue);
            }
          },
          error: function (error) {
            console.log('fail==>', error);
          }
        });

      }

      if( currentTabContent === viewDonationPresets ) {
        let campaign_id = jQuery('#give_kindness-update-campaign').attr('data-campaign-id');
        if( campaign_id == '' ) {
          return; 
        }

        $.ajax({
          type: 'POST',
          dataType: 'json',
          headers: {'X-WP-Nonce': give_kindness.apiNonce },
          url: give_kindness.giveKindnessApiURL+'get-donation-preset-amounts',
          data: {
            form: campaign_id
          },
          success: function(data) {
            $("#give_kindness-donations-preset-area").html(data.presets);
          },
          error: function (error) {
            console.log('fail==>', error);
          }
        });
      }

    }

  });

  /**************************
  *  
  * Campaign delete
  * 
  ***************************/
  $(document).on('click', '#give-kindness-campaign-action-delete', async function() {
    let that = $(this);
    let campaign_id = that.attr('data-campaign-id');
    
    if( campaign_id == '' ){
      return false;
    }

    var result = confirm(give_kindness.deleteMsg);
    if (result) {

      that.attr('disabled', true);

      $.ajax({
        type: 'POST',
        dataType: 'json',
        headers: {'X-WP-Nonce': give_kindness.apiNonce },
        url: give_kindness.giveKindnessApiURL+'delete',
        data: {
          form: campaign_id
        },
        success: function(data) {

          if( data.status == 200 ) {
            alert(data.message);
            window.location.reload();
          } else {
            alert(data.message);
            that.attr('disabled', false);
          }
          
        },
        error: function (error) {
          that.attr('disabled', false);
          console.log('fail==>', error);
        }
      });

    }

  });

  /**************************
  *  
  * Campaign suspend request
  * 
  ***************************/
  $(document).on('click', '#give-kindness-suspend-request-submit', async function() {
    
    let that = $(this);
    let campaign_id = $("#give-kindness-campaign-action-suspend").attr('data-campaign-id');
    let suspend_request = $("#give-kindness-suspend-request-msg").val();
    
    if( campaign_id == '' || suspend_request == ''){
      return false;
    }

    that.attr('disabled', true);
    $.ajax({
      type: 'POST',
      dataType: 'json',
      headers: {'X-WP-Nonce': give_kindness.apiNonce },
      url: give_kindness.giveKindnessApiURL+'suspend-request',
      data: {
        form: campaign_id,
        msg: suspend_request
      },
      success: function(data) {

        if( data.status == 200 ) {
          $("#give-kindness-suspend-request-msg").val("");
          that.attr('disabled', false);
          that.after(`<span class="give-kindness-suspend-request-submit-status-msg">${data.message}</span>`);
          setTimeout(showHideContent('#give-kindness-suspend-request-modal', ''), 500);
        } else {
          alert(data.message);
          that.attr('disabled', false);
        }
        
      },
      error: function (error) {
        that.attr('disabled', false);
        console.log('fail==>', error);
      }
    });

  });

  /**************************
  *  
  * Suspend request accept/reject
  * 
  ***************************/
  $(document).on('click', '.give-kindness-suspend-request-action', async function() {
      
    let that = $(this);

    console.log('this action==>', that.attr('data-suspend-id'));
    let campaign_id = that.attr('data-suspend-id');
    let action = that.attr('data-action');
    
    if( campaign_id == '' || action == ''){
      return false;
    }

    $.ajax({
      type: 'POST',
      dataType: 'json',
      headers: {'X-WP-Nonce': give_kindness.apiNonce },
      url: give_kindness.giveKindnessApiURL+'suspend-request-status',
      data: {
        form: campaign_id,
        action: action
      },
      success: function(data) {

        if( data.status == 200 ) {
          window.location.reload();
        } else {
          alert(data.message);
        }
        
      },
      error: function (error) {
        console.log('fail==>', error);
      }
    });

  });

  /************************
  * 
  * Enable milestone goal
  * 
  ************************/
  $(document).on('click', '#give-kindness-milestone-switch', function() {
    if($(this).is(":checked")){
      $('.give-kindness-milestone-hide').fadeIn('slow');
    } else {
      $('.give-kindness-milestone-hide').fadeOut('slow');
    }
  })

  /************************
  * 
  * Add milestone goal
  * 
  ************************/
  $(document).on('click', '#give-kindness-milestone-add', function() {
    $(this).before(`
      <div class="give-kindness-milestone-wrapper">
        <i class="fa fa-trash" aria-hidden="true"></i>
        <div class="give-donor-dashboard-field-row">
          <div class="give-donor-dashboard-text-control">
              <label class="give-donor-dashboard-text-control__label" for="gk-milestone-goal">
                Milestone GOAL
              </label>
              <div class="give-donor-dashboard-text-control__input">
                  <input class="gk-milestone-goal" name="gk-milestone-goal[]" type="number" placeholder="$1000" min="1">
              </div>
          </div>
          <div class="give-donor-dashboard-text-control">
              <label class="give-donor-dashboard-text-control__label" for="gk-milestone-goal-label">
                Label (40 characters)
              </label>
              <div class="give-donor-dashboard-text-control__input">
                <input class="gk-milestone-goal-label" name="gk-milestone-goal-label[]" type="text" placeholder="Final Milestone" maxlength="40">
              </div>
          </div>
        </div>
      </div>
    `);
  });

  /************************
  * 
  * Add milestone goal
  * 
  ************************/
  $(document).on('click', '#give-kindness-milestone-save', function() {

    let that = $(this);
    let milestoneGoal = [];
    let milestoneGoalLabel = [];
    let campaign_id = jQuery('#give_kindness-update-campaign').attr('data-campaign-id');
    let enable_milestone = $('#give-kindness-milestone-switch').val();

    jQuery(".gk-milestone-goal").each(function(index, item) {
      if(item.value !=''){
        milestoneGoal.push(item.value);
      }
    });

    jQuery(".gk-milestone-goal-label").each(function(index, item) {
      if(item.value !=''){
        milestoneGoalLabel.push(item.value);
      }
    });

    if( milestoneGoal.length > 0 ) {

      that.attr('disabled', true);
      $.ajax({
        type: 'POST',
        dataType: 'json',
        headers: {'X-WP-Nonce': give_kindness.apiNonce },
        url: give_kindness.giveKindnessApiURL+'set-milestones',
        data: {
          form: campaign_id,
          enable_milestone: enable_milestone,
          amount: JSON.stringify(milestoneGoal),
          label: JSON.stringify(milestoneGoalLabel),
        },
        success: function(data) {
          alert(data.message);
          that.attr('disabled', false);
        },
        error: function (error) {
          console.log('fail==>', error);
          that.attr('disabled', false);
        }
      });
    }

  });

  /************************
  * 
  * Delete donation preset amounts
  * 
  ************************/
  $(document).on('click', '.give-kindness-milestone-wrapper i', function() {
    $(this).parent().remove();
  });

  /************************
  * 
  * Add donation preset
  * 
  ************************/
  $(document).on('click', '#give-kindness-donations-preset-add', function() {
    $('#give_kindness-donations-preset-area').append(`
      <div class="give-donor-dashboard-field-row">
        <div class="give-donor-dashboard-text-control">
            <div class="give-donor-dashboard-text-control__input">
              <input class="gk-preset-amount" name="gk-preset-amount[]" type="text" placeholder="$25" maxlength="20">
            </div>
        </div>
      </div>

      <div class="give-donor-dashboard-field-row">
          <div class="give-donor-dashboard-text-control">
              <div class="give-donor-dashboard-text-control__input">
                <textarea class="gk-preset-amount-label" name="gk-preset-amount-label[]" placeholder="Description"></textarea>
              </div>
          </div>
      </div>
    `);
  });
  
  /************************
  * 
  * Invite co-fundraisers
  * 
  ************************/
  $(document).on('click', '#give_kindness-fundraisers-invite-send', function() {

    var regexEmail = /\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
    let email = $('#give-kindness-fundraisers-invite-email').val();
    let campaign_id = jQuery('#give_kindness-update-campaign').attr('data-campaign-id');
    
    if( email == '' || !regexEmail.test(email) ) {
      alert(give_kindness.inValidEmail);
      return false;
    }

    $.ajax({
      type: 'POST',
      dataType: 'json',
      headers: {'X-WP-Nonce': give_kindness.apiNonce },
      url: give_kindness.giveKindnessApiURL+'invite-fundraisers',
      data: {
        form: campaign_id,
        email: email
      },
      success: function(data) {
        console.log('res==>',data);
        if( data.status == 200 ) {
        } else {
          alert(data.message);
        }
      },
      error: function (error) {
        console.log('fail==>', error);
      }
    });

  });

  /************************
  * 
  * 
  * 
  ************************/
  $(document).on('click', '#give_kindness-fundraisers-invite-send', function() {

  });


  /************************
  * 
  * Save donation preset amounts
  * 
  ************************/
  $(document).on('click', '#give-kindness-donations-preset-save', function() {

    let that = $(this);
    let presetAmount = [];
    let presetDetail = [];
    let campaign_id = jQuery('#give_kindness-update-campaign').attr('data-campaign-id');

    jQuery(".gk-preset-amount").each(function(index, item) {
      if(item.value !=''){
        presetAmount.push(item.value);
      }
    });

    jQuery(".gk-preset-amount-label").each(function(index, item) {
      if(item.value !='') {
        presetDetail.push(item.value);
      }
    });

    if( presetAmount.length > 0 ) {

      that.attr('disabled', true);
      $.ajax({
        type: 'POST',
        dataType: 'json',
        headers: {'X-WP-Nonce': give_kindness.apiNonce },
        url: give_kindness.giveKindnessApiURL+'donation-preset-amounts',
        data: {
          form: campaign_id,
          amount: JSON.stringify(presetAmount),
          detail: JSON.stringify(presetDetail),
        },
        success: function(data) {
          alert(data.message);
          that.attr('disabled', false);
        },
        error: function (error) {
          console.log('fail==>', error);
          that.attr('disabled', false);
        }
      });
    }

  });

  /************************
  * 
  * Delete donation preset amounts
  * 
  ************************/
  $(document).on('click', '.give_kindness-donations-preset-wrapper i', function() {
    $(this).parent().remove();
  });
  

})(jQuery, window, document);

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

/**************************
*  
* Edit campaign
* 
***************************/
function editCampaign(dat){

  //Active current menu
  jQuery(".give-donor-dashboard-tab-link").each(function(index, item) {
    let currentTabContent = jQuery(this).data('tab-id');
    if( typeof currentTabContent != "undefined" ){   
      jQuery('#'+currentTabContent).hide();
      if( currentTabContent == 'give_kindness-edit-campaign'){
        jQuery(".give-donor-dashboard-tab-link").removeClass("give-donor-dashboard-tab-link--is-active");
        jQuery(this).addClass("give-donor-dashboard-tab-link--is-active");
      }
    }
  });

  jQuery('#give-kindness-mainmenu').hide(); //hide main menu
  jQuery('#give-kindness-campaign-edit-menu').show(); //show campaign edit menu
  jQuery('#give_kindness-edit-campaign').show(); // show cmapaign edit template
  // jQuery('#give_kindness-campaigns').hide();
  // jQuery('#give_kindness-create-campaign').hide();


  let data = jQuery(dat).attr('data-campaign-info');
      data = JSON.parse(data);

  let campaign_name = data['campaign_name'];
  let beneficiary_name = data['beneficiary_name'];
  let mobile_code = data['mobile_code'];
  let mobile_number = data['mobile_number'];
  let beneficiary_relationship = data['beneficiary_relationship'];
  let beneficiary_country = data['beneficiary_country'];
  let beneficiary_age = data['beneficiary_age'];
  let medical_condition = data['medical_condition'];
  let medical_document_type = data['medical_document_type'];
  let medical_document = data['medical_document'];
  let medical_document_url = data['medical_document_url'];
  let campaign_detail = data['campaign_detail'];
  let campaign_email = data['campaign_email'];
  let campaign_country = data['campaign_country'];
  let government_assistance = data['government_assistance'];
  let government_assistance_details = data['government_assistance_details'];
  let fundraising_target = data['fundraising_target'];
  let campaign_boosting = data['campaign_boosting'];
  let campaign_id = data['campaign_id'];
  let status = data['status'];

  jQuery('#gke-campaign-name').val(campaign_name);
  jQuery('#gke-fundraising-target').val(fundraising_target);
  jQuery('#gke-beneficiary-name').val(beneficiary_name);
  jQuery('#gke-mobile-code').val(mobile_code);
  jQuery('#gke-mobile-number').val(mobile_number);
  jQuery('#gke-beneficiary-relationship').val(beneficiary_relationship);
  jQuery('#gke-beneficiary-country').val(beneficiary_country);
  jQuery('#gke-beneficiary-age').val(beneficiary_age);
  jQuery('#gke-medical-condition').val(medical_condition);
  jQuery('#gke-medical-document').val(medical_document_type);
  jQuery('#gke-campaign-email').val(campaign_email);
  jQuery('#gke-campaign-detail').text(campaign_detail);
  tinymce.get( jQuery("#gke-campaign-detail").attr( 'id' ) ).setContent(campaign_detail);
  jQuery('#gke-campaign-country').val(campaign_country);
  jQuery('#gke-government-assistance').val(government_assistance);
  jQuery('#gke-government-assistance-details').val(government_assistance_details);
  jQuery('#gke-campaign-boosting').val(campaign_boosting);
  jQuery('#gke-campaign-status').text(status);

  // Add CSS class to change status label color
  jQuery('#gke-campaign-status').removeClass();
  if(status == 'pending'){
    jQuery('#gke-campaign-status').addClass('give-kindness-campaign-pending-label');
  } else if(status == 'draft') {
    jQuery('#gke-campaign-status').addClass('give-kindness-campaign-draft-label');
  } else if(status == 'suspend') {
    jQuery('#gke-campaign-status').addClass('give-kindness-campaign-suspend-label');
  } else if(status == 'publish') {
    jQuery('#gke-campaign-status').addClass('give-kindness-campaign-publish-label');
  } else if(status == 'reject') {
    jQuery('#gke-campaign-status').addClass('give-kindness-campaign-reject-label');
  } else {
    jQuery('#gke-campaign-status').addClass('give-kindness-campaign-publish-label');
  }

  jQuery('#give_kindness-update-campaign').attr('data-campaign-id', campaign_id); //for update campaign
  jQuery('#give-kindness-campaign-action-delete').attr('data-campaign-id', campaign_id); //for delete campaign
  jQuery('#give-kindness-campaign-action-suspend').attr('data-campaign-id', campaign_id); //for campaign suspend

  if( status == 'publish') {
    jQuery('#give-kindness-campaign-action-delete').hide(); //for delete campaign
    jQuery('#give-kindness-campaign-action-suspend').show(); //for campaign suspend
  }

  /******
   * 
   * Set campaign id for view donations
   * 
   */
  jQuery('#give-kindness-campaign-donations').attr('data-camapign-id', campaign_id);

  if( government_assistance == "Yes") {
    jQuery("#gke-government-assistance-no").removeClass("give-donor-dashboard-button--primary").addClass("give-donor-dashboard-button--default");
    jQuery("#gke-government-assistance-yes").removeClass("give-donor-dashboard-button--default").addClass("give-donor-dashboard-button--primary");
    jQuery(".gke-government-assistance-area").show();
  }

  if( campaign_boosting == "Yes") {
    jQuery("#gke-campaign-boosting-no").removeClass("give-donor-dashboard-button--primary").addClass("give-donor-dashboard-button--default");
    jQuery("#gke-campaign-boosting-yes").removeClass("give-donor-dashboard-button--default").addClass("give-donor-dashboard-button--primary");
  }

  let medical_document_wrapper = jQuery('#give-kindness-edit-media-items');
  medical_document_wrapper.html(""); //Initiallly blank

  if( medical_document.length > 0){
    for(let i=0; i < medical_document.length; i++){
      if(medical_document_type == 'image') {
        medical_document_wrapper.prepend(`<div class="give-kindness-media-item">
          <img src="${medical_document_url[i]}" alt="">
          <a href="javascript:void(0);" class="give-kindness-media-item-remove" title="Remove Image">
            <svg style="width: 15px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="svg-inline--fa fa-times-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#ff0000" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
            </svg>
          </a>
          <input type="hidden" class="gk-campaign-files" name="gk-campaign-files[]" value="${medical_document[i]}">
        </div>`); // display image
      } else {
        medical_document_wrapper.prepend(`<div class="give-kindness-media-item">
        <object data="${medical_document_url[i]}" type="application/pdf" width="100px" height="100px">
          <embed src="${medical_document_url[i]}" type="application/pdf">
            <p>This browser does not support PDFs. Please download the PDF to view it: <a href="${medical_document_url[i]}" download>Download PDF</a>.</p>
          </embed>
        </object>
          <a href="javascript:void(0);" class="give-kindness-media-item-remove" title="Remove Image">
            <svg style="width: 15px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="svg-inline--fa fa-times-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#ff0000" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
            </svg>
          </a>
          <input type="hidden" class="gk-campaign-files" name="gk-campaign-files[]" value="${medical_document[i]}">
        </div>`); // display image
      }
    }

  }

}

/**************************
*  
* Forcefully show/hide menu
* 
***************************/
function showMenu(show_menu, hide_menu, show_menu_item = null, show_content = null, active_menu = null ) {

  jQuery(show_menu).show();
  jQuery(hide_menu).hide();

  if( show_menu_item != null ){
    jQuery(show_menu_item).show();
  }

  if( show_content != null ){
    jQuery(show_content).show();
  }

}