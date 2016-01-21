<?php
/**
* A PHP Factory for Creating Adwords Campaign Groups
* --------------------------------------------------------------------
*/ 

class DreaFactory {
    
    private $prefix;
    private $suffix;
    private $campaignGroupName;
    private $adgroups;
    private $keywords;
    private $locations; // Array of Lists Passed In
    
    public $campaignGroupList;
    
    
    /**
    * Campaign Groups Consist of a List of Campaigns
    * 
    * 1. New CampaignGroup
    * 2. New CampaignGroup->Campaign
    * 3. Campaign Factory uses CampaignGroup keywords to generate AdGroups
    * 4. Keyword Lists are created with Keyword Templates 
    * 5. TODO: Add Base / Plural (isPlural?) 
    * 6. Keyword Templates are currently crated by combining location and keyword
    * 7. Adgroups are made for each Campaigngroup Keyword
    * 8. The Adgroup contains the list of keywords created from the keyword templates
    * 9. The Location is added to the campaign.
    * 10. TODO: Add Ad Sets with Landing page URLS
    */ 
    public function __construct() {
        $this->prefix = "Tav_";
        $this->suffix = "_#3"; // Backslash Escape Underscore
        $this->campaignGroupName = "Location Eye Doctor";
        $this->keywordTemplates = ["Location Keyword", "Keyword Location", "Keyword"];
        $this->keywords = ["Eye Doctor", "Eye Exam", "Vision Care", "HIP", "Medicaid"];
        $this->locations = [
            "Indianapolis",
			"Indy",
			"Anderson",
			"Bloomington",
			"Columbus",
			"Elkhart",
			"Fishers",
			"Greenwood",
			"Kokomo",
			"Muncie",
			"New Castle",
			"Richmond",
			"Shelbyville",
			"South East St",
			"Terre Haute",
			"Zionsville"
		];
		
		$this->campaignGroupList = $this->create_campaign_group(
		    $this->campaignGroupName, 
		    $this->locations,
		    $this->keywordTemplates, 
		    $this->keywords
	    );
    }
    
    public function get_locations() {
        return $this->locations;
    }
    
    public function get_campaign_group_list() {
        //echo "Dumping factory->get_campaign_group_list <br />";
        //var_dump($this->campaignGroupList);
        return $this->campaignGroupList;
    }
    
    public function create_campaign_group($cGroupName, $cGroupLocations, $cGroupKeywordTemplates, $cGroupKeywords) {
        $campaignGroup = [
            "name" => $cGroupName, 
            "locations" => $cGroupLocations, 
            "keywordTemplates" => $cGroupKeywordTemplates, 
            "keywords" => $cGroupKeywords,
            "campaigns" => []
        ];
        
        // Generate Campaigns
        // 1. name = Prefix + each location + Suffix
        for($i = 0; $i < count($campaignGroup["locations"]); $i++) {
            $campaignGroup["campaigns"][$i] = [
                "name" => $this->prefix . $campaignGroup["locations"][$i] . $this->suffix, 
                "location" => $campaignGroup["locations"][$i], 
                "adgroups" => []
            ];
            
            // Create and Add the Adgroups to the campaignGroup["campaigns"]["adgroups"]
            for($h = 0; $h < count($campaignGroup["keywords"]); $h++) {
                $campaignGroup["campaigns"][$i]["adgroups"][$h] = [
                    "name" => $campaignGroup["keywords"][$h], // Needs to loop all keywords
                    "keywords" => [
                        $campaignGroup["locations"][$i] . " " . $campaignGroup["keywords"][$h], 
                        $campaignGroup["keywords"][$h] . " " . $campaignGroup["locations"][$i], 
                        $campaignGroup["keywords"][$h]
                    ]
                ];
            } // End Adgroup Creation For Loop
        } // End Top Level For Loop
        
        // Send Back the Output
        return $campaignGroup;
    } // End function create_campaign_group

} // End of class