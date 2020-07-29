<?php

class Home extends Controller 
{
    public function index($data = [])
    {
        // Sends data to model;
        // Loads up the appropriate Views and the models data

        $this->view (
            "home/index", 
            []
        );
        
        print_r($_POST);

    }
    
    public function login($data = [])
    {
       // Tools::redirect("home");
       
      // echo "hello";
        
        $user = $this->dbmodel("Login");
        
        // Create a validating and sanitizing 
        // function later
        
        $user->username = "'".Tools::cleanInput($_POST["user"])."'";
        
        $user->password = Tools::cleanInput($_POST["pass"]);
        
        //print_r($user);
        
        //die("");
        
        if ($user->verify())
        {
            echo "Successful";
            
            Tools::redirect("dashboard");
            
            
        } else {
            echo "Failed";
            // Ajax would handle if not
            Tools::redirect("home");
        }
        //echo "working";
       // print_r($user);
    }
}

?>