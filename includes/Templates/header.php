<?php
    $myProfile = new Give_Kindness\Frontend\MyDashboard();
    $myProfile = $myProfile->profile();
?>

<div class="give-donor-dashboard-desktop-layout__donor-info">
    <div class="give-donor-dashboard-donor-info">
        <div class="give-donor-dashboard-donor-info__avatar">
            <div class="give-donor-dashboard-donor-info__avatar-container">
            <?php 
                if( ! empty( $myProfile['avatarUrl'] ) ) { ?>
                <img alt="Donor Picture" src="<?php echo esc_url($myProfile['avatarUrl']); ?>">
                <?php } else { ?>
                <span class="give-donor-dashboard-donor-info__avatar-initials">
                    <?php echo $myProfile['initials']; ?>
                </span>
            <?php
                }
            ?>
            </div>
        </div>
        <div class="give-donor-dashboard-donor-info__details">
        <div class="give-donor-dashboard-donor-info__name"><?php echo $myProfile['name']; ?></div>
        <div class="give-donor-dashboard-donor-info__detail">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="building" class="svg-inline--fa fa-building fa-w-14 fa-fw " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor" d="M436 480h-20V24c0-13.255-10.745-24-24-24H56C42.745 0 32 10.745 32 24v456H12c-6.627 0-12 5.373-12 12v20h448v-20c0-6.627-5.373-12-12-12zM128 76c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12V76zm0 96c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12v-40zm52 148h-40c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12zm76 160h-64v-84c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v84zm64-172c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40zm0-96c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40zm0-96c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12V76c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40z"></path>
            </svg>
            <?php echo $myProfile['company']; ?>
        </div>
        <div class="give-donor-dashboard-donor-info__detail">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" class="svg-inline--fa fa-clock fa-w-16 fa-fw " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M256,8C119,8,8,119,8,256S119,504,256,504,504,393,504,256,393,8,256,8Zm92.49,313h0l-20,25a16,16,0,0,1-22.49,2.5h0l-67-49.72a40,40,0,0,1-15-31.23V112a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V256l58,42.5A16,16,0,0,1,348.49,321Z"></path>
            </svg>
            <?php echo sprintf(__('Last donated %s ago', 'give_kindness'), $myProfile['sinceLastDonation']); ?>
        </div>
        <div class="give-donor-dashboard-donor-info__detail">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" class="svg-inline--fa fa-heart fa-w-16 fa-fw " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"></path>
            </svg>
            <?php echo sprintf(__('Donor for %s', 'give_kindness'), $myProfile['sinceCreated']); ?>
        </div>
        </div>
        <div class="give-donor-dashboard-donor-info__badges"></div>
    </div>
</div>