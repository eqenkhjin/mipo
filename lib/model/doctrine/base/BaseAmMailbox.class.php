<?php

/**
 * BaseAmMailbox
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property string $name
 * @property integer $unread_count
 * @property integer $total_count
 * @property AmUser $AmUser
 * 
 * @method integer   getUserId()       Returns the current record's "user_id" value
 * @method string    getName()         Returns the current record's "name" value
 * @method integer   getUnreadCount()  Returns the current record's "unread_count" value
 * @method integer   getTotalCount()   Returns the current record's "total_count" value
 * @method AmUser    getAmUser()       Returns the current record's "AmUser" value
 * @method AmMailbox setUserId()       Sets the current record's "user_id" value
 * @method AmMailbox setName()         Sets the current record's "name" value
 * @method AmMailbox setUnreadCount()  Sets the current record's "unread_count" value
 * @method AmMailbox setTotalCount()   Sets the current record's "total_count" value
 * @method AmMailbox setAmUser()       Sets the current record's "AmUser" value
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Mipo Team
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAmMailbox extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('am_mailbox');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('unread_count', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('total_count', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('AmUser', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}