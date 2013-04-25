<?php


class AmPostTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('AmPost');
    }
    
    public function getOwnLast()
    {
        $q = self::getInstance()->createQuery();
        $q->where('user_id = ?', sfContext::getInstance()->getUser()->getId());
        $q->orderBy('created_at DESC');
        
        return $q->fetchOne();
    }
    
    public function getPosts()
    {
        $q = self::getInstance()->createQuery();
        $q->orderBy('created_at DESC');
        
        return $q->execute();
    }
}