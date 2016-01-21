<section class="row">
    <h1 class="col-xs-offset-1 col-xs-10">Factory</h1>
    <div class="col-xs-offset-1 col-xs-10">
        <?php
            // Factory Init
            $this->campaignFactory = new DreaFactory();
            $campaignGroupOutput = $this->campaignFactory->get_campaign_group_list();
            
            //echo '1. <pre>' . var_export($campaignGroupOutput, true) . '</pre>'; // DEBUG
            
            $this->campaignTemplateFactory = new DreaTemplateFactory();
            $campaignGroupTemplate = $this->campaignTemplateFactory->create_campaign_template($campaignGroupOutput);
            
            // TODO: Pass this output to this file.
            echo $campaignGroupTemplate;
            
            //echo '2. <pre>' . var_export($campaignGroupOutput, true) . '</pre>'; // DEBUG 
        ?>
    </div>
</section>