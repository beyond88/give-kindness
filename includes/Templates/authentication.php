<div id="give-donor-dashboard">
   <div class="give-donor-dashboard__auth">
      <div class="give-donor-dashboard__auth-modal">
         <div class="give-donor-dashboard__auth-modal-frame">
            <div class="give-donor-dashboard__auth-modal-heading"><?php echo __('Sign up/in to see your dashboard', 'give-kindness'); ?></div>
            <div class="give-donor-dashboard__auth-modal-content">
               <form class="give-donor-dashboard__auth-modal-form give-kindness-signup-part" id="give-kindness-register-form" onSubmit="return false;">
                  <div class="give-donor-dashboard-text-control">
                     <div class="give-donor-dashboard-text-control__input">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="envelope" class="svg-inline--fa fa-envelope fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                           <path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path>
                        </svg>
                        <input id="give-kindness-rusername" type="text" maxlength="60" placeholder="<?php echo __('Email', 'give-kindness'); ?>">
                     </div>
                  </div>
                  <div class="give-donor-dashboard-text-control">
                     <div class="give-donor-dashboard-text-control__input">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="lock" class="svg-inline--fa fa-lock fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                           <path fill="currentColor" d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z"></path>
                        </svg>
                        <input id="give-kindness-rpassword" type="password" maxlength="60" placeholder="<?php echo __('Password', 'give-kindness'); ?>">
                     </div>
                  </div>
                  <div class="give-donor-dashboard__auth-modal-row">
                     <button class="give-donor-dashboard-button give-donor-dashboard-button--primary" type="submit" id="give-kindness-signup-submit">
                        <?php echo __('Sign Up', 'give-kindenss'); ?>
                        <svg aria-hidden="true" data-prefix="fas" data-icon="chevron-right" class="svg-inline--fa fa-chevron-right fa-w-10 fa-fw " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                           <path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path>
                        </svg>
                     </button>
                  </div>
                  <div class="give-donor-dashboard__auth-modal-instruction">
                     <?php echo __('Already have an account?', 'give-kindenss'); ?> 
                     <a href="javascript:void(0)" class="give-kindness-show-login"><?php echo __('Sign In', 'give-kindenss'); ?> </a>
                  </div>
               </form>

               <div class="give-donor-dashboard__auth-modal-instruction give-kindness-login-part">
                  <?php echo __('Log in below to access your dashboard', 'give-kindenss'); ?>
               </div>
               <form class="give-donor-dashboard__auth-modal-form give-kindness-login-part" id="give-kindness-login-form" onSubmit="return false;">
                  <div class="give-donor-dashboard-text-control">
                     <div class="give-donor-dashboard-text-control__input">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="user" class="svg-inline--fa fa-user fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                           <path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path>
                        </svg>
                        <input id="give-kindness-username" type="text" maxlength="60" placeholder="<?php echo __('Username or email', 'give-kindness'); ?>">
                     </div>
                  </div>
                  <div class="give-donor-dashboard-text-control">
                     <div class="give-donor-dashboard-text-control__input">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="lock" class="svg-inline--fa fa-lock fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                           <path fill="currentColor" d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z"></path>
                        </svg>
                        <input id="give-kindness-password" type="password" maxlength="60" placeholder="<?php echo __('Password', 'give-kindness'); ?>">
                     </div>
                  </div>
                  <div class="give-donor-dashboard__auth-modal-row">
                     <button class="give-donor-dashboard-button give-donor-dashboard-button--primary" type="submit" id="give-kindness-login-submit">
                        <?php echo __('Log in', 'give-kindenss'); ?>
                        <svg aria-hidden="true" data-prefix="fas" data-icon="chevron-right" class="svg-inline--fa fa-chevron-right fa-w-10 fa-fw " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                           <path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path>
                        </svg>
                     </button>
                  </div>
               </form>
               <div class="give-donor-dashboard__auth-modal-instruction give-kindness-login-part">
                  <?php echo __('Don\'t have an account?', 'give-kindenss'); ?> 
                  <a href="javascript:void(0)" class="give-kindness-show-signup"><?php echo __('Sign Up', 'give-kindenss'); ?> </a>
               </div>
            </div>
         </div>
      </div>
      <div class="give-donor-dashboard__auth-wrapper">
         <div class="give-donor-dashboard-desktop-layout">
            <div class="give-donor-dashboard-desktop-layout__donor-info">
               <div class="give-donor-dashboard-donor-info">
                  <div class="give-donor-dashboard-donor-info__avatar">
                     <div class="give-donor-dashboard-donor-info__avatar-container">
                        <span class="give-donor-dashboard-donor-info__avatar-initials">
                           <svg aria-hidden="true" data-prefix="fas" data-icon="user" class="svg-inline--fa fa-user fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                              <path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path>
                           </svg>
                        </span>
                     </div>
                  </div>
                  <div class="give-donor-dashboard-donor-info__details"></div>
                  <div class="give-donor-dashboard-donor-info__badges"></div>
               </div>
            </div>
            <div class="give-donor-dashboard-desktop-layout__tab-menu">
               <div class="give-donor-dashboard-tab-menu">
                  <a aria-current="page" class="give-donor-dashboard-tab-link give-donor-dashboard-tab-link--is-active" href="#/dashboard">
                     <svg aria-hidden="true" data-prefix="fas" data-icon="home" class="svg-inline--fa fa-home fa-w-18 fa-fw " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path fill="currentColor" d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z"></path>
                     </svg>
                     <?php echo __('Dashboard', 'give-kindenss'); ?>
                  </a>
                  <a class="give-donor-dashboard-tab-link" href="#/donation-history">
                     <svg aria-hidden="true" data-prefix="fas" data-icon="calendar-alt" class="svg-inline--fa fa-calendar-alt fa-w-14 fa-fw " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="currentColor" d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"></path>
                     </svg>
                     <?php echo __('Donation History', 'give-kindenss'); ?>
                  </a>
                  <a class="give-donor-dashboard-tab-link" href="#/edit-profile">
                     <svg aria-hidden="true" data-prefix="fas" data-icon="cog" class="svg-inline--fa fa-cog fa-w-16 fa-fw " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M487.4 315.7l-42.6-24.6c4.3-23.2 4.3-47 0-70.2l42.6-24.6c4.9-2.8 7.1-8.6 5.5-14-11.1-35.6-30-67.8-54.7-94.6-3.8-4.1-10-5.1-14.8-2.3L380.8 110c-17.9-15.4-38.5-27.3-60.8-35.1V25.8c0-5.6-3.9-10.5-9.4-11.7-36.7-8.2-74.3-7.8-109.2 0-5.5 1.2-9.4 6.1-9.4 11.7V75c-22.2 7.9-42.8 19.8-60.8 35.1L88.7 85.5c-4.9-2.8-11-1.9-14.8 2.3-24.7 26.7-43.6 58.9-54.7 94.6-1.7 5.4.6 11.2 5.5 14L67.3 221c-4.3 23.2-4.3 47 0 70.2l-42.6 24.6c-4.9 2.8-7.1 8.6-5.5 14 11.1 35.6 30 67.8 54.7 94.6 3.8 4.1 10 5.1 14.8 2.3l42.6-24.6c17.9 15.4 38.5 27.3 60.8 35.1v49.2c0 5.6 3.9 10.5 9.4 11.7 36.7 8.2 74.3 7.8 109.2 0 5.5-1.2 9.4-6.1 9.4-11.7v-49.2c22.2-7.9 42.8-19.8 60.8-35.1l42.6 24.6c4.9 2.8 11 1.9 14.8-2.3 24.7-26.7 43.6-58.9 54.7-94.6 1.5-5.5-.7-11.3-5.6-14.1zM256 336c-44.1 0-80-35.9-80-80s35.9-80 80-80 80 35.9 80 80-35.9 80-80 80z"></path>
                     </svg>
                     <?php echo __('Edit Profile', 'give-kindenss'); ?>
                  </a>
                  <div class="give-donor-dashboard-logout">
                     <div class="give-donor-dashboard-tab-link">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="sign-out-alt" class="svg-inline--fa fa-sign-out-alt fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                           <path fill="currentColor" d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"></path>
                        </svg>
                        <?php echo __('Logout', 'give-kindenss'); ?>
                     </div>
                  </div>
               </div>
            </div>
            <div class="give-donor-dashboard-desktop-layout__tab-content">
               <div class="give-donor-dashboard-tab-content">
                  <div class="give-donor-dashboard-dashboard-content">
                     <div class="give-donor-dashboard-heading">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="chart-line" class="svg-inline--fa fa-chart-line fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                           <path fill="currentColor" d="M496 384H64V80c0-8.84-7.16-16-16-16H16C7.16 64 0 71.16 0 80v336c0 17.67 14.33 32 32 32h464c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16zM464 96H345.94c-21.38 0-32.09 25.85-16.97 40.97l32.4 32.4L288 242.75l-73.37-73.37c-12.5-12.5-32.76-12.5-45.25 0l-68.69 68.69c-6.25 6.25-6.25 16.38 0 22.63l22.62 22.62c6.25 6.25 16.38 6.25 22.63 0L192 237.25l73.37 73.37c12.5 12.5 32.76 12.5 45.25 0l96-96 32.4 32.4c15.12 15.12 40.97 4.41 40.97-16.97V112c.01-8.84-7.15-16-15.99-16z"></path>
                        </svg>
                        <?php echo __('Your Giving Stats', 'give-kindenss'); ?>
                     </div>
                     <div class="give-donor-dashboard-dashboard__stats"></div>
                     <div class="give-donor-dashboard-heading">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="calendar-alt" class="svg-inline--fa fa-calendar-alt fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                           <path fill="currentColor" d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"></path>
                        </svg>
                        <?php echo __('Recent Donations', 'give-kindenss'); ?>
                     </div>
                     <div class="give-donor-dashboard-table">
                        <div class="give-donor-dashboard-table__header">
                           <div class="give-donor-dashboard-table__column"><?php echo __('Donation', 'give-kindenss'); ?></div>
                           <div class="give-donor-dashboard-table__column"><?php echo __('Campaign', 'give-kindenss'); ?></div>
                           <div class="give-donor-dashboard-table__column"><?php echo __('Date', 'give-kindenss'); ?></div>
                           <div class="give-donor-dashboard-table__column"><?php echo __('Status', 'give-kindenss'); ?></div>
                        </div>
                        <div class="give-donor-dashboard-table__rows"></div>
                        <div class="give-donor-dashboard-table__footer">
                           <div class="give-donor-dashboard-table__footer-text"></div>
                           <div class="give-donor-dashboard-table__footer-nav">
                              <a>
                                 <svg aria-hidden="true" data-prefix="fas" data-icon="chevron-right" class="svg-inline--fa fa-chevron-right fa-w-10 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                    <path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path>
                                 </svg>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>