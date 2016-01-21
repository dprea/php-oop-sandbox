<?php
/**
* A PHP Factory for Creating Adwords 
*   Campaign Group Landing Page Templates
* --------------------------------------------------------------------
*/ 

class DreaTemplateFactory {
    
    private $campaignGroupInput;
    
    public function __construct($campaignGroup) {
        $this->campaignGroupInput = $campaignGroup;
        
        $this->create_campaign_template($this->campaignGroupInput);
    } // End Constructor
    
    public function create_campaign_template($campaignGroups) {
        if($campaignGroups == false) {
            echo "Something went wrong during Create Campaign Templates";
        } else {
            echo "<div class='row'><div class='col-xs-offset-1 col-xs-10'>";
            echo "<strong>Campaign Group Name:</strong> " . $campaignGroups["name"] . "<br /><br />";
           
            echo "<div class='row'>";
            for($j = 0; $j < count($campaignGroups["campaigns"]); $j++) {
                echo "<div class='col-xs-2'>";
                echo "<strong>Campaign:</strong> " . $campaignGroups["campaigns"][$j]["name"] . "<br />";
                echo "<strong>Location:</strong> " . $campaignGroups["campaigns"][$j]["location"] . "<br /><br />";
                for($jj = 0; $jj < count($campaignGroups["campaigns"][$j]["adgroups"]); $jj++) {
                    echo "<strong>Adgroup " .  ($jj + 1) . ":</strong> <br />";
                    echo $campaignGroups["campaigns"][$j]["adgroups"][$jj]["name"] . "<br /><br />";
                    echo "<strong>Adgroup " .  ($jj + 1) . " Keywords:</strong> <br />";
                    for($jjj = 0; $jjj < count($campaignGroups["campaigns"][$j]["adgroups"][$jj]["keywords"]); $jjj++) {
                        echo $campaignGroups["campaigns"][$j]["adgroups"][$jj]["keywords"][$jjj] . "<br />";
                    } // End for($jjj)
                    echo "<br /><br />";
                } // End for($jj)
                echo "<br /><br />";
                echo "</div>"; // End Campaign col Class
                
            } // End CampaignGroup->campaigns loop
           
            echo "</div></div></div>"; // End row, col row
        }
        
    } // End Function create_campaign_template
    
} // End Class