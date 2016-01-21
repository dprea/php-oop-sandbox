<?php
/**
* A PHP Factory for Creating Adwords Campaign Groups
* 
* TODO: Change class->adgroups to ->adgroupTemplates then parse templates
* --------------------------------------------------------------------
*/ 

class DreaFactory {
    
    private $prefix;
    private $suffix;
    private $campaignGroupName;
    private $adgroups;
    private $keywords;
    private $locations; // Array of Lists Passed In
    
    public function __construct() {
        $this->prefix = "Tav_";
        $this->suffix = "_#3"; // Backslash Escape Underscore
        $this->campaignGroupName = "Location Eye Doctor";
        $this->adgroups = ["Location Keyword", "Keyword Location", "Keyword"];
        $this->keywords = ["Eye Doctor", "Eye Exam"];
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
		    $this->adgroups, 
		    $this->keywords
	    );
    }
    
    public function get_locations() {
        return $this->locations;
    }
    
    public function create_campaign_group($cGroupName, $cGroupLocations, $cGroupAdgroups, $cGroupKeywords) {
        $campaignGroup = [
            "name" => $cGroupName, 
            "locations" => $cGroupLocations, 
            "adgroups" => $cGroupAdgroups, 
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