<?php
class ChatsDB extends Query
{
    public function __construct($conn)
    {
        parent::__construct($conn);

        $this->setTable("chats");

        $this->setFetchType(PDO::FETCH_ASSOC);
    }

    public function getChats()
    {

        $x = $this->get()->all();

        return $x;
    }

    public function putChat($data) 
    {
        return $this->put($data);
    }
}
?>