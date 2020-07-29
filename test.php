<?php

   /* require_once "Connection.php";
    
    require_once "Staff.php";
    
    require_once "Student.php";
    
    require_once "SchoolFactory.php";
    
    echo "<pre>";
    $m = new SchoolFactory($x);
    
    
    $std = $m->findId("'ccis/c1/001'")[0];
    
    $std->reportBook->loadUp();
    
    //print_r($std->member->payment->history());
    
   // print_r($std);
   
   $m -> studentFactory-> getAllStudents();
   
   print_r($m -> studentFactory-> students);
    */
    
    class Red 
    {
        function __construct( $def )
        {
            $this->def = $def;
        }
    }
    
    $r = "Red";
    
    $m = new $r("Obi");
    
    print_r( $m );

print_r( $_GET);
?>
