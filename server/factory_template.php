<?php
/**
* A PHP Factory for Creating Adwords 
*   Campaign Group Landing Page Templates
* --------------------------------------------------------------------
*/ 

class DreaTemplateFactory {
    
    public function __construct() {} // End Constructor
    
    public function create_campaign_template($campaignGroups) {
        $campaignGroupOutput; // Return Output Buffer
        ob_start();
        
        if($campaignGroups == false) {
            echo "Something went wrong during Create Campaign Templates";
        } else {
            
            echo "<strong>Campaign Group Name:</strong> " . $campaignGroups["name"] . "<br /><br />";
            echo "<div class='row'>";
            
            for($j = 0; $j < count($campaignGroups["campaigns"]); $j++) {
                echo "<div class='col-xs-4 col-md-3'>";
                echo "<div class='list-group'>";
                echo "<span class='list-group-item list-group-item-info'><strong>Campaign:</strong><br />" . $campaignGroups["campaigns"][$j]["name"] . "</span><br />";
                echo "<span class='list-group-item list-group-item-warning'><strong>Location:</strong> " . $campaignGroups["campaigns"][$j]["location"] . "</span><br /><br />";
                
                for($jj = 0; $jj < count($campaignGroups["campaigns"][$j]["adgroups"]); $jj++) {
                    echo "<span class='list-group-item list-group-item-success'><strong>Adgroup " .  ($jj + 1) . ":</strong></span><br />";
                    echo "<span class='list-group-item'>" . $campaignGroups["campaigns"][$j]["adgroups"][$jj]["name"] . "</span><br /><br />";
                    echo "<span class='list-group-item list-group-item-danger'><strong>Adgroup " .  ($jj + 1) . " Keywords:</strong></span><br />";
                    
                    for($jjj = 0; $jjj < count($campaignGroups["campaigns"][$j]["adgroups"][$jj]["keywords"]); $jjj++) {
                        echo "<span class='list-group-item'>" . $campaignGroups["campaigns"][$j]["adgroups"][$jj]["keywords"][$jjj] . "</span><br />";
                    } // End for($jjj)
                    
                    echo "<br /><br />";
                } // End for($jj)
                
                echo "<br /><br />";
                echo "</div></div>"; // End Campaign col Class and list-group
            } // End CampaignGroup->campaigns loop
            echo "</div>"; // End row
        }
        
        $campaignGroupOutput = ob_get_contents();
        ob_end_clean();
        
        return $campaignGroupOutput;
        
    } // End Function create_campaign_template
} // End Class