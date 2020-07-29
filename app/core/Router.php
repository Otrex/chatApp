<?php
session_start();

class Router
{
    protected $routes = [
        "GET" => [],
        "POST" => []
    ];

    protected $controller = "home";// Default 
    protected $method = "index";
    protected $params = [];

    public static function load($router_file)
    {
        $router = new Router();

        require $router_file;

        return $router;

    }

    public function get ($uri, $path)
    {
        $this->routes["GET"][$uri] = $path;
    }

    public function post ($uri, $path)
    {
        $this->routes["POST"][$uri] = $path;
    }

    public function direct ($uri, $method, $con)
    {
        print_r($uri);
        if (array_key_exists($uri[0], $this->routes[$method]))
        {
            $uri[0] = $this->routes[$method][$uri[0]];

            $this->directAction($uri, $con);

        } else {

            throw new Exception(
                $uri[0]." --- ".$uri[1].
                " Not existing:: Check Your route file..."); 

        }
        
    }

    protected function directAction($uri, $con)
    {
       // echo "<pre>";
        
      //  print_r($uri);
        
        
        $this->controller = $uri[0];

        unset($uri[0]);

        if (file_exists("../app/controllers/".$this->controller.".php"))
        {
            require_once "../app/controllers/".$this->controller.".php";

            $this->controller = ucfirst($this->controller);
            
            $this->controller = new $this->controller($con);

            if (count($uri) >= 1)
            {
                if (method_exists($this->controller, $uri[1]))
                {
                    $this->method = $uri[1];

                    unset($uri[1]);

                    $this->params = $uri ? array_values($uri) : [];

                    unset($uri);

                }

            }
        }
        
      // print_r($this->method);
        
        call_user_func_array([$this->controller, $this->method], [$this->params]);
    }
}

?>