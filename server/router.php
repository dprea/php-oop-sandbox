<?php
/**
* DreaRouter Handle's the App's URL Routing.
*/

class DreaRouter {
    
    private $reqRoute; 
    private $routes;
    
    public function __construct() {
        // Route Comparison Variables
        $this->reqRoute = isset($_SREVER['REQUEST_URI']);
        $this->routes = ["home", "about", "factory", "ui"];
        
        // URL Handler Functions
        $this->handle_URL_route($this->routes, $this->reqRoute);
    }
    
    public function handle_URL_route($routes, $reqRoute) {
        if (isset($_SERVER['REQUEST_URI']))  {
            $reqRouteDebug = false; // Disable Debugging
            
            $reqRoute = $_SERVER['REQUEST_URI'];
            
            if($reqRouteDebug == true) {
                $this->debug_reqRoute($reqRoute);
            }
            
            // Remove the First Slash to get Route Name
            $reqRoute = substr($reqRoute, 1);
            // Remove Trailing Whitespace
            $reqRoute = trim($reqRoute);
            
            if($reqRoute == "" || $reqRoute == "index.php") {
                $reqRoute = "home";
            }
        }
        
        for($x =0; $x<count($routes); $x++) {
            if($reqRoute === $routes[$x]) {
                // TODO: Create Getter Function
                include_once("views/core/$reqRoute.php");
                break; // Once the route is found, no reason to continue looping.
            }
            if($x == (count($routes) - 1 )) {
                include_once("views/core/404.php");
                break;
            }
        }
    }
    
    private function debug_reqRoute($reqRouteDebugVar) {
        // DEBUGGING reqRoute
        echo '1. '; var_dump($reqRouteDebugVar); echo '<br />';
        
        // Grabs the Relative Requested URI
        // These two lines of code only work if the first slash
        //   has not been stripped.
        //$reqRoute = explode('/', $reqRouteDebugVar);
        //echo '2. '; var_dump($reqRouteDebugVar); echo '<br />';
    }
    
    public function get_reqRoute() {
        return $this->reqRoute;
    }
}