<?php

class AmFriendRequestTable extends Doctrine_Table {

    public static function getInstance() {
        return Doctrine_Core::getTable('AmFriendRequest');
    }

    public function getFriendRequest($sender_id, $receiver_id) {
        $q = AmFriendRequestTable::getInstance()->createQuery();
        $q->addWhere('receiver_id = ?', $receiver_id);
        $q->addWhere('sender_id = ?', $sender_id);
        
        return  $q->fetchOne(); 
    }

}