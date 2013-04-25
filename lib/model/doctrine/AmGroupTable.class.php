<?php


class AmGroupTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('AmGroup');
    }
    
    
    public function __search($query)
    {
        $q = self::getInstance()->createQuery();
        $q->where('name like ?', '%'.$query.'%');
        
        return $q->execute();
    }
}