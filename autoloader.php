<?php

function autoload($path,$root, $into, $backpath=false)
{

    $ent = "\n\n";
            
    $data = glob($root.'/'.$path.'/*.php');
    
    rsort($data);
    
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
        if ($backpath)
        {
            $item = "require_once '../app/".
            $path."/".$d."';".$ent;
            
        } else {
            $item = "require_once '".
            $path."/".$d."';".$ent;
        }
        echo $item;
        
        fwrite($new, $item);
    }
    
    fwrite($new, "?>");
    
    fclose($new);
    
}

autoload("core","app", "app/bootstrap");

autoload(
    "models","app", "app/core/Models", true
);

?>