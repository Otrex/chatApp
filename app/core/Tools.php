<?php

    class Tools
    {
        public static function redirect
        ($url="/")
        {
            if ($url == "home" ||$url == "/")
            {
                $url = "";
            }
            
            $p = $_SERVER["HTTP_REFERER"];
            
            echo "<script> location.assign('".
                $p.$url."');</script>";
             // echo "".$url;
             // header("Location: ./".$url);
        }
        
        public static function cleanInput($data)
        {
            $data = trim($data);
            
            $data = stripslashes($data);
            
            $data = htmlspecialchars($data);
            
            return $data;
        }
    }
    
?>