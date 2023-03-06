<div id="give-donor-dashboard">
   <div class="give-donor-dashboard-desktop-layout">
        <?php give_kindness_templates_part( 'header', $object ); ?>
        <?php give_kindness_templates_part( 'sidebar' ); ?>

      <div class="give-donor-dashboard-desktop-layout__tab-content">
         <?php give_kindness_templates_part( 'stats/stats', $object ); ?>
         <?php give_kindness_templates_part( 'campaigns/campaigns', $object ); ?>
         <?php give_kindness_templates_part( 'donations/donation-history', $object ); ?>
         <?php give_kindness_templates_part( 'profile/profile', $object ); ?>

         <!--
         |
         | Update campaign template
         |
         -->
         <?php give_kindness_templates_part( 'update-campaign/statistics', $object ); ?>
         <?php give_kindness_templates_part( 'update-campaign/view-donations', $object ); ?>
         <?php give_kindness_templates_part( 'update-campaign/edit-campaign', $object ); ?>
         <?php give_kindness_templates_part( 'update-campaign/fundraisers', $object ); ?>
         <?php //give_kindness_templates_part( 'update-campaign/milestones', $object ); ?>
         <?php //give_kindness_templates_part( 'update-campaign/chat-presets', $object ); ?>
         <?php //give_kindness_templates_part( 'update-campaign/donation-preset-amounts', $object ); ?>
         <?php //give_kindness_templates_part( 'update-campaign/share', $object ); ?>
         <?php give_kindness_templates_part( 'update-campaign/docs', $object ); ?>
         <?php //give_kindness_templates_part( 'update-campaign/widget', $object ); ?>

      </div>
   </div>
</div>