<div class="give-donor-dashboard-desktop-layout__tab-menu" id="give-kindness-mainmenu">
    <div class="give-donor-dashboard-tab-menu">
        <a aria-current="page" class="give-donor-dashboard-tab-link give-donor-dashboard-tab-link--is-active" href="javascript:void(0)" data-tab-id="give_kindness-stats">
            <i class="fas fa-home"></i>
            <?php echo __('Dashboard', 'give-kindness'); ?>
        </a>
        <a class="give-donor-dashboard-tab-link" href="javascript:void(0)" data-tab-id="give_kindness-donation-history">
            <i class="fas fa-hand-holding-usd"></i>
            <?php echo __('Donated', 'give-kindness'); ?>
        </a>
        <a class="give-donor-dashboard-tab-link" href="javascript:void(0)" data-tab-id="give_kindness-campaigns">
            <i class="fas fa-donate"></i>
            <?php echo __('Fundraised', 'give-kindness'); ?>
        </a>
        <a class="give-donor-dashboard-tab-link" href="javascript:void(0)" data-tab-id="give_kindness-profile">
            <i class="fas fa-id-card"></i>
            <?php echo __('Edit Profile', 'give-kindness'); ?>
        </a>
        <div class="give-donor-dashboard-logout">
            <div class="give-donor-dashboard-tab-link">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-out-alt" class="svg-inline--fa fa-sign-out-alt fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"></path>
                </svg>
                <?php echo __('Logout', 'give-kindness'); ?>
            </div>
        </div>
    </div>
</div>

<!-- 
! 
! Edit campaign menu
!
-->

<div class="give-donor-dashboard-desktop-layout__tab-menu" id="give-kindness-campaign-edit-menu">
    <div class="give-donor-dashboard-tab-menu">
        <a aria-current="page" class="give-donor-dashboard-tab-link" href="javascript:void(0)" data-tab-id="give_kindness-campaigns" onClick="showMenu('#give-kindness-mainmenu', '#give-kindness-campaign-edit-menu', '', '', 'give_kindness-campaigns')">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
            <?php echo __(' Back to campaign', 'give-kindness'); ?>
        </a>
        <a class="give-donor-dashboard-tab-link" href="javascript:void(0)" data-tab-id="give_kindness-view-donations">
            <i class="fa fa-solid fa-list"></i>
            <?php echo __('View donations', 'give-kindness'); ?>
        </a>
        <a class="give-donor-dashboard-tab-link" href="javascript:void(0)" data-tab-id="give_kindness-edit-campaign">
            <!-- <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar-alt" class="svg-inline--fa fa-calendar-alt fa-w-14 fa-fw " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor" d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"></path>
            </svg> -->
            <i class="fas fa-edit"></i>
            <?php echo __(' Edit', 'give-kindness'); ?>
        </a>
        <a class="give-donor-dashboard-tab-link" href="javascript:void(0)" data-tab-id="give_kindness-campaign-fundraisers">
            <i class="fa fa-users" aria-hidden="true"></i>
            <?php echo __(' Fundraisers', 'give-kindness'); ?>
        </a>
        <a class="give-donor-dashboard-tab-link" href="javascript:void(0)" data-tab-id="give_kindness-campaign-milestones">
            <i class="fa fa-history" aria-hidden="true"></i>
            <?php echo __('Milestones', 'give-kindness'); ?>
        </a>
        <a class="give-donor-dashboard-tab-link" href="javascript:void(0)" data-tab-id="give_kindness-donations-preset">
            <i class="fas fa-money-bill-alt" aria-hidden="true"></i>
            <?php echo __('Donation preset amounts', 'give-kindness'); ?>
        </a>
    </div>
</div>