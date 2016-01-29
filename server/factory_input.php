<?php
/**
* A PHP Factory for Creating Adwords Campaign Groups
* --------------------------------------------------------------------
*/ 

class DreaFactoryInput {
    
    private $prefix;
    private $suffix;
    private $campaignGroupName;
    private $campaignNameMod;
    private $adgroups;
    private $keywords;
    private $keywordModifiers;
    private $locations; // Array of Lists Passed In
    private $keywordTemplates;
    private $keywordTemplateCount;
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
    public function __construct($cgInput) {
        // Campaign Group Meta Information
        $this->campaignGroupName = $cgInput->campaignGroupName;
        $this->prefix = $cgInput->campaignGroupPrefix;
        $this->suffix = $cgInput->campaignGroupSuffix;
        
        $this->campaignNameMod = $cgInput->campaignNameMod;
        
        // Which Locations apply to the Campaign Group
        $this->locations = $cgInput->campaignLocation;
        
        // Base Keywords
        $this->keywords = $cgInput->campaignGroupKeywords;
        
        // Prepare the Keywords for Generation
        // Trim White Space
        for($tt = 0; $tt < count($this->keywords); $tt++) {
            trim($this->keywords[$tt]);
        }
        
        // Keyword Modifiers
        $this->keywordModifiers = $cgInput->campaignKeywordMods; 
        // Keyword Templates
        $this->keywordTemplates = $cgInput->campaignKeywordTemplates;
        // Cache the KW Template Count to avoid recalculation on each loop.
        $this->keywordTemplateCount = count($this->keywordTemplates);
		
		// Combine Campaign Group Meta Data to create the Campaign Group name
		$this->campaignGroupName = $this->prefix . $this->campaignGroupName . $this->suffix;
		
		$this->campaignGroupList = $this->create_campaign_group(
		    $this->campaignGroupName,
		    $this->campaignNameMod,
		    $this->locations,
		    $this->keywords,
		    $this->keywordModifiers,
		    $this->keywordTemplates
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
    
    public function create_campaign_group($cGroupName, $cGroupNameMod, $cGroupLocations, $cGroupKeywordTemplates, $cGroupKeywords, $cGroupKeywordModifiers) {
        $campaignGroup = [
            "name" => $cGroupName, 
            "locations" => $cGroupLocations, 
            "keywordTemplates" => $cGroupKeywordTemplates, 
            "keywords" => $cGroupKeywords,
            "keywordModifiers" => $cGroupKeywordModifiers, // Needs to be passed to generateKeywordList
            "campaigns" => []
        ];
        
        // Generate Campaigns
        // 1. name = Prefix + each location + Suffix
        for($i = 0; $i < count($campaignGroup["locations"]); $i++) {
            $campaignGroup["campaigns"][$i] = [
                // Below, $cGroupNameMod is Most likely Locations
                // In that case, there is a location for each $i
                // Imagine other use cases where this wont work. 
                "name" => $this->prefix . $campaignGroup[$cGroupNameMod][$i] . $this->suffix, 
                // Needs to be passed to generateKeywordList
                "location" => $campaignGroup["locations"][$i],  
                "adgroups" => []
            ];
            
            // Create and Add the Adgroups to the campaignGroup["campaigns"]["adgroups"]
            for($h = 0; $h < count($campaignGroup["keywords"]); $h++) {
                
                
                // TODO: Refactor this block into a function called for each Campaign Group Keyword Set
                //   $thisLoopIteration = $campaignGroup["keywords"]);
                //   Function Name: generatorKeywordList($ThisLoopIteration)
                
                $adgroupKeywordList = generateKeywordList(
                    $campaignGroup["keywords"][$h], 
                    $campaignGroup["locations"][$i], 
                    $campaignGroup["keywordModifiers"] 
                );
                
                $campaignGroup["campaigns"][$i]["adgroups"][$h] = [
                    "name" => $campaignGroup["keywords"][$h], // Needs to loop all keywords
                    "keywords" => $adgroupKeywordList
                ];
            } // End Adgroup Creation For Loop
        } // End Top Level For Loop
        
        // Send Back the Output
        return $campaignGroup;
    } // End function create_campaign_group
    
    
    // Returns an Array of Keywords
    // @param - $adgroupKeyword - The Adgroup Keyword to generate variations
    // @param - $adgroupLocation - The Adgroup Location for this keyword
    // @param - $adgroupKeywordMods Array[] - The list of possible Keyword Modifications
    public function generateKeywordList($adgroupKeyword, $adgroupLocation, $adgroupKeywordMods) {
        // KeywordBuilder is for building the Output of each Keyword from a KW Template
        $keywordBuilder = "";
        // The Final Output list to be returned. 
        $keywordListOutput = [];
        
        // Loop Through all Keyword Templates
        for($kwt = 0; $kwt < $this->keywordTemplateCount; $kwt++) {
            // Reset KeywordBuilder Output on Each Template Output
            $keywordBuilder = "";
            
            // Check type of each value and replace with proper KW or KW Mod
            for($kwtv = 0; $kwtv < count($this->keywordTemplate[$kwt]); $kwtv++) {
                switch($this->keywordTemplate[$kwt][$kwtv]) {
                    case "Keyword":
                        $keywordBuilder = $keywordBuilder . $adgroupKeyword . " ";
                        break;
                    case "Location":
                        $keywordBuilder = $keywordBuilder . $adgroupLocation . " "; 
                        break;
                    case "Modifier 1":
                        $keywordBuilder = $keywordBuilder . $adgroupKeywordMods[0] . " "; 
                        break;
                    case "Modifier 2":
                        $keywordBuilder = $keywordBuilder . $adgroupKeywordMods[1] . " "; 
                        break;
                    case "Modifier 3":
                        $keywordBuilder = $keywordBuilder . $adgroupKeywordMods[2] . " ";  
                        break;
                    case "none": 
                        break;
                    default: 
                        break;
                } // End Switch Case
            } // End Keyword Builder Loop
            
            // Add the Keyword that was built to the output list
            $keywordListOutput[$kwt] = $keywordBuilder;
            
        } // End Keyword Template Loop
        
        // Outputs Array of Keywords for the Adgroup(keyword) passed in
        return $keywordListOutput;
    } // END public function generateKeywordList()

} // End of class