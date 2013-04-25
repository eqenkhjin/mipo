<?php

/**
 * BaseAmUserThreadConn
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property integer $thread_id
 * @property boolean $is_blocked
 * @property AmUser $AmUser
 * @property AmThread $AmThread
 * 
 * @method integer          getUserId()     Returns the current record's "user_id" value
 * @method integer          getThreadId()   Returns the current record's "thread_id" value
 * @method boolean          getIsBlocked()  Returns the current record's "is_blocked" value
 * @method AmUser           getAmUser()     Returns the current record's "AmUser" value
 * @method AmThread         getAmThread()   Returns the current record's "AmThread" value
 * @method AmUserThreadConn setUserId()     Sets the current record's "user_id" value
 * @method AmUserThreadConn setThreadId()   Sets the current record's "thread_id" value
 * @method AmUserThreadConn setIsBlocked()  Sets the current record's "is_blocked" value
 * @method AmUserThreadConn setAmUser()     Sets the current record's "AmUser" value
 * @method AmUserThreadConn setAmThread()   Sets the current record's "AmThread" value
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Mipo Team
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAmUserThreadConn extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('am_user_thread_conn');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('thread_id', 'integer', null, array(
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

        $this->hasOne('AmThread', array(
             'local' => 'thread_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}