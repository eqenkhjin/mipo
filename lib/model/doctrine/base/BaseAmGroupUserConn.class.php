<?php

/**
 * BaseAmGroupUserConn
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $group_id
 * @property integer $user_id
 * @property timestamp $joined_at
 * @property boolean $is_moderator
 * @property integer $year1
 * @property integer $year2
 * @property boolean $is_joined
 * @property AmUser $AmUser
 * @property AmGroup $AmGroup
 * 
 * @method integer         getGroupId()      Returns the current record's "group_id" value
 * @method integer         getUserId()       Returns the current record's "user_id" value
 * @method timestamp       getJoinedAt()     Returns the current record's "joined_at" value
 * @method boolean         getIsModerator()  Returns the current record's "is_moderator" value
 * @method integer         getYear1()        Returns the current record's "year1" value
 * @method integer         getYear2()        Returns the current record's "year2" value
 * @method boolean         getIsJoined()     Returns the current record's "is_joined" value
 * @method AmUser          getAmUser()       Returns the current record's "AmUser" value
 * @method AmGroup         getAmGroup()      Returns the current record's "AmGroup" value
 * @method AmGroupUserConn setGroupId()      Sets the current record's "group_id" value
 * @method AmGroupUserConn setUserId()       Sets the current record's "user_id" value
 * @method AmGroupUserConn setJoinedAt()     Sets the current record's "joined_at" value
 * @method AmGroupUserConn setIsModerator()  Sets the current record's "is_moderator" value
 * @method AmGroupUserConn setYear1()        Sets the current record's "year1" value
 * @method AmGroupUserConn setYear2()        Sets the current record's "year2" value
 * @method AmGroupUserConn setIsJoined()     Sets the current record's "is_joined" value
 * @method AmGroupUserConn setAmUser()       Sets the current record's "AmUser" value
 * @method AmGroupUserConn setAmGroup()      Sets the current record's "AmGroup" value
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Mipo Team
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAmGroupUserConn extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('am_group_user_conn');
        $this->hasColumn('group_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('joined_at', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('is_moderator', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('year1', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('year2', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('is_joined', 'boolean', null, array(
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

        $this->hasOne('AmGroup', array(
             'local' => 'group_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}