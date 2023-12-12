<?php
    require __DIR__."/../php/user.php";
    function FindBy($db, $collection, $type, $data)
    {
        $user = $db->$collection->find([$type=>$data]);
        foreach($user as $usr)
            $users[] = new User($usr->name, $usr->pass, $usr->rol);
        if(isset($users))
            return $users;
        else
            return NULL;
    }


    function InsertOne($db, $collection, $object){
        $db->$collection->insertOne($object);
    }
?>