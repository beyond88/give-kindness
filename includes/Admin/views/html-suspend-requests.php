<div class="wrap give-settings-page">
    <div class="give-settings-header">
        <h1 class="wp-heading-inline">
            <?php echo __('Suspend requests', 'give-kindness'); ?>
        </h1>
    </div>
    <div class="" id="">
        <?php 
            $suspend_requests->prepare_items();
            $suspend_requests->display();
        ?>
    </div>        
</div>