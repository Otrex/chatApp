<?php

function autoload($path,$root, $into)
{
   // echo "<script>location.assign('".$file_path."');</script>";
            //require_once "../app/models/".$model_name.".php";
    
    $ent = "\n\n";
            
    $data = glob($root.'/'.$path.'/*.php');
    
    $new = fopen($into.".php", "w");
    
    
    $comment = "<?php".$ent.
               "// This is created by".
               " autoloader.".$ent;
            
    fwrite($new, $comment);
    
    echo "<pre>";
    
    foreach($data as $d)
    {
        $d = explode('/', $d);
        
        print_r($d);
        
        $d = $d[2];
        
        $item = "require_once '".
            $path."/".$d."';".$ent;
            
        echo $item;
        
        fwrite($new, $item);
    }
    
    fwrite($new, "?>");
    
    fclose($new);
    
}

autoload("core","app", "app/bootstrap");
?>