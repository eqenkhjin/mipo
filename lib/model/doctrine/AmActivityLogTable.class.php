<?php


class AmActivityLogTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('AmActivityLog');
    }
    
    public static function __log($object_action_slug, $object_type, $object, $user)
    {
//        $object_action = AmObjectActionConnTable::getInstance()->findByOne('slug', $object_action_slug);
//        $_object_type = AmObjectTypeTable::getInstance()->findByOne('object_model_name', $object_type);
//        
//        $obj = new AmActivityLog();
//        $obj->user_id = $user->id;
//        $obj->object_action_conn_id = $object_action->id;
//        $obj->object_type_id = $_object_type->id;
//        $obj->object_id = $object->id;
    }
}