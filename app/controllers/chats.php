
<?php

class Chats extends Controller 
{
    function index()
    {
        echo "About/index.php";
    }

    public function getAllChats()
    {
        $cht = $this->dbmodel("ChatsDB");

        echo json_encode($cht->getChats());
    }
    
    public function putChat()
    {
        $cht = $this->dbmodel("ChatsDB");

        if (isset($_POST))
        {
            echo $cht->putChat($_POST) ? json_encode(true): json_encode(false);

        } 
        
    }

    function test()
    {
        echo "testin jddjjdd.php";
    }
}

?>