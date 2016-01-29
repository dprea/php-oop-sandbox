<?php
/**
* User(Admin Facing) Display of the campaign groups after
*   generation by seeding dummy data.
* --------------------------------------------------------------------------
*/
?>

<?php
    if(isset($_POST['campaignUIForm'])) { 
        // Campaign Group Variables
        
        $campaignGroupKeywordList = explode(', ' , $_POST['field-campaign-group-keywords']);
    
        $campaignGroupFormSubmission = [ 
            campaignGroupName      => $_POST['field-campaign-group-name'],
            campaignGroupPrefix   => $_POST['field-campaign-group-prefix'],
            campaignGroupSuffix  => $_POST['field-campaign-group-suffix'],
            campaignGroupKeywords => $campaignGroupKeywordList,
            campaignName => $_POST['field-campaign-group-campaign-name-mod'],
            
            // Campaign Level Variables
            campaignLocation => $_POST['field-campaign-location'],
            
            // Campaign Keyword Modifiers
            campaignKeywordMods => [
                campaignKeywordMod1 => $_POST['field-campaign-group-keyword-modifier-1'],
                campaignKeywordMod2 => $_POST['field-campaign-group-keyword-modifier-2'],
                campaignKeywordMod3 => $_POST['field-campaign-group-keyword-modifier-3'],
            ],
            
            // Campaign Keyword Templates
            campaignKeywordTemplates => [
                campaignKeywordTemplate1 => [
                    $_POST['field-campaign-group-keyword-template-1-1'],
                    $_POST['field-campaign-group-keyword-template-1-2'],
                    $_POST['field-campaign-group-keyword-template-1-3'],
                    $_POST['field-campaign-group-keyword-template-1-4'],
                    $_POST['field-campaign-group-keyword-template-1-5'], 
                    $_POST['field-campaign-group-keyword-template-1-6'],
                ] ,   
                campaignKeywordTemplate2 => [
                    $_POST['field-campaign-group-keyword-template-2-1'],
                    $_POST['field-campaign-group-keyword-template-2-2'],
                    $_POST['field-campaign-group-keyword-template-2-3'],
                    $_POST['field-campaign-group-keyword-template-2-4'],
                    $_POST['field-campaign-group-keyword-template-2-5'], 
                    $_POST['field-campaign-group-keyword-template-2-6'],
                ],
                campaignKeywordTemplate3 => [
                    $_POST['field-campaign-group-keyword-template-3-1'],
                    $_POST['field-campaign-group-keyword-template-3-2'],
                    $_POST['field-campaign-group-keyword-template-3-3'],
                    $_POST['field-campaign-group-keyword-template-3-4'],
                    $_POST['field-campaign-group-keyword-template-3-5'], 
                    $_POST['field-campaign-group-keyword-template-3-6'],
                ],    
                campaignKeywordTemplate4 => [
                    $_POST['field-campaign-group-keyword-template-4-1'],
                    $_POST['field-campaign-group-keyword-template-4-2'],
                    $_POST['field-campaign-group-keyword-template-4-3'],
                    $_POST['field-campaign-group-keyword-template-4-4'],
                    $_POST['field-campaign-group-keyword-template-4-5'],
                    $_POST['field-campaign-group-keyword-template-4-6'],
                ],
                campaignKeywordTemplate5 => [
                    $_POST['field-campaign-group-keyword-template-5-1'],
                    $_POST['field-campaign-group-keyword-template-5-2'],
                    $_POST['field-campaign-group-keyword-template-5-3'],
                    $_POST['field-campaign-group-keyword-template-5-4'],
                    $_POST['field-campaign-group-keyword-template-5-5'], 
                    $_POST['field-campaign-group-keyword-template-5-6'],
                ],
                campaignKeywordTemplate6 => [
                    $_POST['field-campaign-group-keyword-template-6-1'],
                    $_POST['field-campaign-group-keyword-template-6-2'],
                    $_POST['field-campaign-group-keyword-template-6-3'],
                    $_POST['field-campaign-group-keyword-template-6-4'],
                    $_POST['field-campaign-group-keyword-template-6-5'], 
                    $_POST['field-campaign-group-keyword-template-6-6'],
                ]
            ]
        ];
        
        echo '0. <pre>' . var_export($campaignGroupFormSubmission, true) . '</pre>'; // DEBUG
        
        // Factory Init
        $this->campaignFactory = new DreaFactoryInput($campaignGroupFormSubmission);
        $campaignGroupOutput = $this->campaignFactory->get_campaign_group_list();
    } else {
        // Factory Init
        $this->campaignFactory = new DreaFactory();
        $campaignGroupOutput = $this->campaignFactory->get_campaign_group_list();
    }
?>

<section class="row">
    <h1 class="col-xs-offset-1 col-xs-10">Factory</h1>
    <div class="col-xs-offset-1 col-xs-10">
    <?php        
            echo '1. <pre>' . var_export($campaignGroupOutput, true) . '</pre>'; // DEBUG
            
            $this->campaignTemplateFactory = new DreaTemplateFactory();
            $campaignGroupTemplate = $this->campaignTemplateFactory->create_campaign_template($campaignGroupOutput);
            
            // TODO: Pass this output to this file.
            echo $campaignGroupTemplate;
            
            //echo '2. <pre>' . var_export($campaignGroupOutput, true) . '</pre>'; // DEBUG 
        ?>
    </div>
</section>