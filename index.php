<?php
/**
* A Simple Sandbox for understanding classes and objects in PHP 
*/ 

class DreaSandbox {
    
    private $template_layout;
    private $router;
    
    public function __construct() {
        $this->name = "DRea_PHP_Sandbox";
        
        // Load Dependencies
        $this->load_dependencies();
    }
    
    public function load_dependencies() {
        require_once("server/router.php");
        require_once("server/factory.php");
        require_once("server/factory_template.php");
    }
    
    public function get_template_layout() {
        include_once("views/core/header.php");
        
        // Router Init
        $this->router = new DreaRouter();
        
        // Factory Init
        $this->campaignFactory = new DreaFactory();
        $campaignGroupOutput = $this->campaignFactory->get_campaign_group_list();
        
        //echo '1. <pre>' . var_export($campaignGroupOutput, true) . '</pre>';
        
        $this->campaignTemplateFactory = new DreaTemplateFactory($campaignGroupOutput);
        //$this->campaignTemplateFactory->create_campaign_template($campaignGroupOutput);
        
        //echo '2. <pre>' . var_export($campaignGroupOutput, true) . '</pre>';
        
        //$locationList = $this->campaignFactory->get_locations();
        include_once("views/core/footer.php");
    }
    
    public function get_data_manipulated() {
        $dataArr = [0, 1, 2, 3, 4, 5, 6, 7];
        
    }
}

$DreaSandbox = new DreaSandbox();
$DreaSandbox->get_template_layout();

?>