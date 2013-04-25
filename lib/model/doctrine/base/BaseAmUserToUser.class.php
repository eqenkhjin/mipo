<?php

/**
 * BaseAmUserToUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_1
 * @property integer $user_2
 * @property timestamp $join_date
 * @property integer $relation_id
 * @property boolean $is_blocked
 * @property AmUser $User2
 * @property AmUserRelation $AmUserRelation
 * 
 * @method integer        getUser1()          Returns the current record's "user_1" value
 * @method integer        getUser2()          Returns the current record's "user_2" value
 * @method timestamp      getJoinDate()       Returns the current record's "join_date" value
 * @method integer        getRelationId()     Returns the current record's "relation_id" value
 * @method boolean        getIsBlocked()      Returns the current record's "is_blocked" value
 * @method AmUser         getUser2()          Returns the current record's "User2" value
 * @method AmUserRelation getAmUserRelation() Returns the current record's "AmUserRelation" value
 * @method AmUserToUser   setUser1()          Sets the current record's "user_1" value
 * @method AmUserToUser   setUser2()          Sets the current record's "user_2" value
 * @method AmUserToUser   setJoinDate()       Sets the current record's "join_date" value
 * @method AmUserToUser   setRelationId()     Sets the current record's "relation_id" value
 * @method AmUserToUser   setIsBlocked()      Sets the current record's "is_blocked" value
 * @method AmUserToUser   setUser2()          Sets the current record's "User2" value
 * @method AmUserToUser   setAmUserRelation() Sets the current record's "AmUserRelation" value
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Mipo Team
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAmUserToUser extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('am_user_to_user');
        $this->hasColumn('user_1', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('user_2', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('join_date', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('relation_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('is_blocked', 'boolean', null, array(
             'type' => 'boolean',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('AmUser as User2', array(
             'local' => 'user_2',
             'foreign' => 'id'));

        $this->hasOne('AmUserRelation', array(
             'local' => 'relation_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}