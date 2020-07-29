<?php

class Controller 
{
    function __construct($conn)
    {
        $this->conn = $conn;
    }
    
    function model($model_name)
    {
        // This would load up the model required

        $model_name = ucfirst($model_name);

        if (file_exists("../app/models/".$model_name.".php"))
        {
            require_once "../app/models/".$model_name.".php";

            return new $model_name;
        }

    }
    
    function dbmodel($model_name)
    {
        // This would load up the model required

        $model_name = ucfirst($model_name);

        if (file_exists("../app/models/".$model_name.".php"))
        {
            return new $model_name($this->conn);
        }

    }

    function view ($page_path, $data = [])
    {
        // This would load up the required view
        
        if (file_exists("../app/views/".$page_path.".php"))
        {
            $partial_path =explode("/", $page_path)[0];
            
            require_once "../app/views/partials/".$partial_path."/head.php";
            
            require_once "../app/views/".$page_path.".php";
            
            require_once "../app/views/partials/".$partial_path."/tail.php";
            
        }
    }
}

?>