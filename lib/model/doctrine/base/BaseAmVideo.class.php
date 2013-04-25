<?php

/**
 * BaseAmVideo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $body
 * @property integer $user_id
 * @property integer $group_id
 * @property integer $type_id
 * @property string $image
 * @property string $small_image
 * @property string $large_image
 * @property string $source
 * @property boolean $is_blocked
 * @property integer $sort_order
 * @property integer $access_id
 * @property AmUser $AmUser
 * @property AmGroup $AmGroup
 * @property AmVideoType $AmVideoType
 * @property AmAccess $AmAccess
 * 
 * @method string      getName()        Returns the current record's "name" value
 * @method string      getBody()        Returns the current record's "body" value
 * @method integer     getUserId()      Returns the current record's "user_id" value
 * @method integer     getGroupId()     Returns the current record's "group_id" value
 * @method integer     getTypeId()      Returns the current record's "type_id" value
 * @method string      getImage()       Returns the current record's "image" value
 * @method string      getSmallImage()  Returns the current record's "small_image" value
 * @method string      getLargeImage()  Returns the current record's "large_image" value
 * @method string      getSource()      Returns the current record's "source" value
 * @method boolean     getIsBlocked()   Returns the current record's "is_blocked" value
 * @method integer     getSortOrder()   Returns the current record's "sort_order" value
 * @method integer     getAccessId()    Returns the current record's "access_id" value
 * @method AmUser      getAmUser()      Returns the current record's "AmUser" value
 * @method AmGroup     getAmGroup()     Returns the current record's "AmGroup" value
 * @method AmVideoType getAmVideoType() Returns the current record's "AmVideoType" value
 * @method AmAccess    getAmAccess()    Returns the current record's "AmAccess" value
 * @method AmVideo     setName()        Sets the current record's "name" value
 * @method AmVideo     setBody()        Sets the current record's "body" value
 * @method AmVideo     setUserId()      Sets the current record's "user_id" value
 * @method AmVideo     setGroupId()     Sets the current record's "group_id" value
 * @method AmVideo     setTypeId()      Sets the current record's "type_id" value
 * @method AmVideo     setImage()       Sets the current record's "image" value
 * @method AmVideo     setSmallImage()  Sets the current record's "small_image" value
 * @method AmVideo     setLargeImage()  Sets the current record's "large_image" value
 * @method AmVideo     setSource()      Sets the current record's "source" value
 * @method AmVideo     setIsBlocked()   Sets the current record's "is_blocked" value
 * @method AmVideo     setSortOrder()   Sets the current record's "sort_order" value
 * @method AmVideo     setAccessId()    Sets the current record's "access_id" value
 * @method AmVideo     setAmUser()      Sets the current record's "AmUser" value
 * @method AmVideo     setAmGroup()     Sets the current record's "AmGroup" value
 * @method AmVideo     setAmVideoType() Sets the current record's "AmVideoType" value
 * @method AmVideo     setAmAccess()    Sets the current record's "AmAccess" value
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Mipo Team
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAmVideo extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('am_video');
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
             ));
        $this->hasColumn('group_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('type_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('image', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('small_image', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('large_image', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('source', 'string', 500, array(
             'type' => 'string',
             'length' => 500,
             ));
        $this->hasColumn('is_blocked', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('sort_order', 'integer', 1, array(
             'type' => 'integer',
             'length' => 1,
             ));
        $this->hasColumn('access_id', 'integer', 4, array(
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

        $this->hasOne('AmGroup', array(
             'local' => 'group_id',
             'foreign' => 'id'));

        $this->hasOne('AmVideoType', array(
             'local' => 'type_id',
             'foreign' => 'id'));

        $this->hasOne('AmAccess', array(
             'local' => 'access_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}