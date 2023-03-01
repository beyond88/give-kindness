<div class="give-donor-dashboard-tab-content" id="give_kindness-create-campaign" style="display:none;">
    <div class="give-donor-dashboard-heading">
        <?php echo __('Create camapaign', 'give-kindness'); ?>
    </div>
    <div class="give-donor-dashboard-divider"></div>
    
    <?php give_kindness_templates_part( 'campaigns/forms/form-one' ); ?>
    <?php give_kindness_templates_part( 'campaigns/forms/form-two' ); ?>
    <?php give_kindness_templates_part( 'campaigns/forms/form-three' ); ?>
    <?php give_kindness_templates_part( 'campaigns/forms/form-four', $object ); ?>

</div>