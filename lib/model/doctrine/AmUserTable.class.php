<?php


class AmUserTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('AmUser');
    }
    public static function hasEmail($email)
    {
        if(strlen($email) > 0){
            return AmUserTable::getInstance()->findBy('email', $email)->count() > 0;
        }else {
            return false;
        }
    }
    public function getByEmail($email){
        return self::getInstance()->findOneBy('email', $email);
    }
    
    public function __search($query)
    {
        /* SELECT * FROM am_user WHERE email like %%  */
//        $sql  = 'SELECT * FROM am_user WHERE (email like %'.$query.'% OR firstname like %'.$query.'%) AND id <>  ';
        $q = self::getInstance()->createQuery();
        $q->where('email like ? OR firstname like ? OR lastname like ?', array('%'.$query.'%','%'.$query.'%','%'.$query.'%'));
        $q->addWhere('id <> ?', sfContext::getInstance()->getUser()->getId());
        
        return $q->execute();
    }
}