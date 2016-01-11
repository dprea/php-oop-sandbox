<?php
/**
* DreaRouter Handle's the App's URL Routing.
*/

class DreaRouter {
    
    private $router; 
    private $routes ;
    
    public function __construct() {
        // Route Comparison Variables
        $this->router = "";
        $this->routes = ["home", "about"];
        
        // URL Handler Functions
        $this->handle_URL_route($this->router, $this->routes);
    }
    
    public function handle_URL_route($router, $routes) {
        if (isset($_SERVER['REQUEST_URI']))  {
            // Grabs the Relative Requested URI
            $router = $_SERVER['REQUEST_URI'];
            $router = substr($router, 1);
            if($router == "") {
                $router = "home";
            }
        }
        
        if(in_array($router, $routes) == false) {
            
            // TODO: Turn into Error Handler
            include_once("views/core/404.php"); 
        
            
        } else {
            for($x =0; $x<count($routes); $x++) {
                if($router == $routes[$x]) {
                    
                    // TODO: Create Getter Function
                    include_once("views/core/" . $router . ".php");
                    break; // Once the route is found, no reason to continue looping.
                }
            }
        }
    } 
}