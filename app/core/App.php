<?php 

class App 
{

    public static function start(
        $route_file, $config)
    {
        $app = new App();
        
        $conn = Connection::start("../config/".$config);

        $conn->setAttribute(
	        PDO::ATTR_DEFAULT_FETCH_MODE,
	        PDO::FETCH_ASSOC
	    );
    
        Router::load("../config/".$route_file)
            ->direct(
                Request::uri(), 
                Request::method(),
                $conn
            );
            
        require "../config/".$config;
        
    }
    
    public function dbConn($db)
    {
        $this->conn = $db;
    }
    
    public function setUpDb()
    {
        $this->conn->setAttribute(
	        PDO::ATTR_DEFAULT_FETCH_MODE,
	        PDO::FETCH_ASSOC
	    );
    }

}

?>