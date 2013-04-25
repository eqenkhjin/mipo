<?php

/**
 * BaseAmComment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $body
 * @property integer $user_id
 * @property integer $group_id
 * @property integer $object_type_id
 * @property integer $object_id
 * @property integer $like_count
 * @property integer $dislike_count
 * @property boolean $is_blocked
 * @property AmUser $AmUser
 * @property AmGroup $AmGroup
 * 
 * @method string    getName()           Returns the current record's "name" value
 * @method string    getBody()           Returns the current record's "body" value
 * @method integer   getUserId()         Returns the current record's "user_id" value
 * @method integer   getGroupId()        Returns the current record's "group_id" value
 * @method integer   getObjectTypeId()   Returns the current record's "object_type_id" value
 * @method integer   getObjectId()       Returns the current record's "object_id" value
 * @method integer   getLikeCount()      Returns the current record's "like_count" value
 * @method integer   getDislikeCount()   Returns the current record's "dislike_count" value
 * @method boolean   getIsBlocked()      Returns the current record's "is_blocked" value
 * @method AmUser    getAmUser()         Returns the current record's "AmUser" value
 * @method AmGroup   getAmGroup()        Returns the current record's "AmGroup" value
 * @method AmComment setName()           Sets the current record's "name" value
 * @method AmComment setBody()           Sets the current record's "body" value
 * @method AmComment setUserId()         Sets the current record's "user_id" value
 * @method AmComment setGroupId()        Sets the current record's "group_id" value
 * @method AmComment setObjectTypeId()   Sets the current record's "object_type_id" value
 * @method AmComment setObjectId()       Sets the current record's "object_id" value
 * @method AmComment setLikeCount()      Sets the current record's "like_count" value
 * @method AmComment setDislikeCount()   Sets the current record's "dislike_count" value
 * @method AmComment setIsBlocked()      Sets the current record's "is_blocked" value
 * @method AmComment setAmUser()         Sets the current record's "AmUser" value
 * @method AmComment setAmGroup()        Sets the current record's "AmGroup" value
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Mipo Team
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAmComment extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('am_comment');
        $this->hasColumn('name', 'string', 200, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 200,
             ));
        $this->hasColumn('body', 'string', 500, array(
             'type' => 'string',
             'length' => 500,
             ));
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('group_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('object_type_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('object_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('like_count', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('dislike_count', 'integer', 4, array(
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