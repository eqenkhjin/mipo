<?php

/**
 * BaseAmUserMessageConn
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property integer $message_id
 * @property boolean $is_blocked
 * @property AmUser $AmUser
 * @property AmMessage $AmMessage
 * 
 * @method integer           getUserId()     Returns the current record's "user_id" value
 * @method integer           getMessageId()  Returns the current record's "message_id" value
 * @method boolean           getIsBlocked()  Returns the current record's "is_blocked" value
 * @method AmUser            getAmUser()     Returns the current record's "AmUser" value
 * @method AmMessage         getAmMessage()  Returns the current record's "AmMessage" value
 * @method AmUserMessageConn setUserId()     Sets the current record's "user_id" value
 * @method AmUserMessageConn setMessageId()  Sets the current record's "message_id" value
 * @method AmUserMessageConn setIsBlocked()  Sets the current record's "is_blocked" value
 * @method AmUserMessageConn setAmUser()     Sets the current record's "AmUser" value
 * @method AmUserMessageConn setAmMessage()  Sets the current record's "AmMessage" value
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Mipo Team
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAmUserMessageConn extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('am_user_message_conn');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('message_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('is_blocked', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('AmUser', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $this->hasOne('AmMessage', array(
             'local' => 'message_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}