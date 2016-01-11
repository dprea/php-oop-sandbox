<?php
/**
* A Simple Sandbox for understanding classes and objects in PHP 
*/ 

// include_once("views/partials/core/layout.php");

class DreaSandbox {
    
    private $template_layout;
    private $router;
    
    public function __construct() {
        $this->name = "DRea_PHP_Sandbox";
        
        // Load Dependencies
        $this->load_dependencies();
        
        // Get Base Template
        $this->get_template_layout();
        
        $this->router = new DreaRouter();
        
    }
    
    public function load_dependencies() {
        require_once("server/router.php");
    }
    
    public function get_template_layout() {
        require_once("views/core/layout.php");
    }
    
    
}

$DreaSandbox = new DreaSandbox();
$DreaSandbox->get_template_layout();



?>