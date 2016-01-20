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
    }
    
    public function get_template_layout() {
        include_once("views/core/header.php");
        
        // Router Init
        $this->router = new DreaRouter();
        
        include_once("views/core/footer.php");
    }
    
    public function get_data_manipulated() {
        $dataArr = [0, 1, 2, 3, 4, 5, 6, 7];
        
    }
}

$DreaSandbox = new DreaSandbox();
$DreaSandbox->get_template_layout();

?>