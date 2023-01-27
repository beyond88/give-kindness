

  (function($) {
    'use strict';


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
        if( currentTabContent !== undefined ){          
          if( currentTabContent === targetTabContent ){
            $('#'+currentTabContent).show();
          } else {
            $('#'+currentTabContent).hide();
          }

          // Hide receipt details content
          $('.view-receipt-details').hide();
        }
      });
    });

    $(document).on('click', '.give-donor-dashboard-avatar-control__dropzone', function(){
      document.getElementById("give_kindness-avatar").click();
    });

    $(document).on('click', '#give_kindness-avatar', function(){
      const file = this.files[0];
      if (file){
        let reader = new FileReader();
        reader.onload = function(event){
          $('.give-donor-dashboard-avatar-control__preview').children('img').attr('src', event.target.result);
        }
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

    $(document).on('click', "#give_kindness-add-email", function(){
      $(this).before(`
        <div class="give-donor-dashboard-field-row additional-emails-area">
          <div class="give-donor-dashboard-text-control">
              <label class="give-donor-dashboard-text-control__label" for="additional-emails-729">Additional Emails</label>
              <div class="give-donor-dashboard-text-control__input">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" class="svg-inline--fa fa-envelope fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path>
                </svg>
                <input id="additional-emails-729" type="text" name="additional_emails[]" class="additional-emails">
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
      let primaryEmail = $('#give_kindness-primary-email').val();
      let getEmail = $(this).parent().siblings().closest('.give-donor-dashboard-text-control').find('.additional-emails').val();

      $('#give_kindness-primary-email').val(getEmail);
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

    $(document).on('click', ".give_kindness_country_name", function() {

      let countryName = $(this).text();
      $(this).parents('.give_kindness-country-list-menu')
      .siblings('.give_kindness-country')
      .find('.selected-country-name')
      .text(countryName);

      if( $(this).attr('data-countryCode') != '' || $(this).attr('data-countryCode') !=  'undefined' ){
        $.ajax({
          type: 'POST',
          dataType: 'json',
          headers: {'X-WP-Nonce': give_kindness.apiNonce },
          url: give_kindness.siteURL+'wp-json/give-api/v2/donor-dashboard/location',
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

            console.log("RESPONSE: ", statesList);
          },
          fail: function (data) {
            console.log('fail==>', data);
          }
        });

        //$(this).parents('.give_kindness-country-list-menu').remove();
      }

    });

    $(document).on('click', "#give_kindness-update-profile", function(){

    });

    const decodeHTMLEntity = (entity) => {
      const div = document.createElement('div');
      div.innerHTML = entity;
      return div.innerText;
    };

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