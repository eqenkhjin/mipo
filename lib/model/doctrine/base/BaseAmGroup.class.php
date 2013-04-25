<?php

/**
 * BaseAmGroup
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $body
 * @property integer $parent_id
 * @property integer $gr_type_id
 * @property string $image
 * @property string $small_image
 * @property string $large_image
 * @property integer $access_id
 * @property integer $created_by
 * @property integer $updated_by
 * @property AmGroupType $AmGroupType
 * @property AmGroup $AmGroupParent
 * @property Doctrine_Collection $AmUsers
 * @property Doctrine_Collection $AmShopCategories
 * @property AmUser $AmCreatedUser
 * @property AmGroupAccess $AmGroupAccess
 * @property Doctrine_Collection $AmGroupChilds
 * @property AmGroupUserConn $AmGroupUserConn
 * @property Doctrine_Collection $AmWheres
 * @property Doctrine_Collection $AmEvents
 * @property Doctrine_Collection $AmTopics
 * @property Doctrine_Collection $AmPhotoAlbums
 * @property Doctrine_Collection $AmVideos
 * @property Doctrine_Collection $AmComments
 * @property AmShopCategoryGroupConn $AmShopCategoryGroupConn
 * @property Doctrine_Collection $AmShopProducts
 * 
 * @method string                  getName()                    Returns the current record's "name" value
 * @method string                  getBody()                    Returns the current record's "body" value
 * @method integer                 getParentId()                Returns the current record's "parent_id" value
 * @method integer                 getGrTypeId()                Returns the current record's "gr_type_id" value
 * @method string                  getImage()                   Returns the current record's "image" value
 * @method string                  getSmallImage()              Returns the current record's "small_image" value
 * @method string                  getLargeImage()              Returns the current record's "large_image" value
 * @method integer                 getAccessId()                Returns the current record's "access_id" value
 * @method integer                 getCreatedBy()               Returns the current record's "created_by" value
 * @method integer                 getUpdatedBy()               Returns the current record's "updated_by" value
 * @method AmGroupType             getAmGroupType()             Returns the current record's "AmGroupType" value
 * @method AmGroup                 getAmGroupParent()           Returns the current record's "AmGroupParent" value
 * @method Doctrine_Collection     getAmUsers()                 Returns the current record's "AmUsers" collection
 * @method Doctrine_Collection     getAmShopCategories()        Returns the current record's "AmShopCategories" collection
 * @method AmUser                  getAmCreatedUser()           Returns the current record's "AmCreatedUser" value
 * @method AmGroupAccess           getAmGroupAccess()           Returns the current record's "AmGroupAccess" value
 * @method Doctrine_Collection     getAmGroupChilds()           Returns the current record's "AmGroupChilds" collection
 * @method AmGroupUserConn         getAmGroupUserConn()         Returns the current record's "AmGroupUserConn" value
 * @method Doctrine_Collection     getAmWheres()                Returns the current record's "AmWheres" collection
 * @method Doctrine_Collection     getAmEvents()                Returns the current record's "AmEvents" collection
 * @method Doctrine_Collection     getAmTopics()                Returns the current record's "AmTopics" collection
 * @method Doctrine_Collection     getAmPhotoAlbums()           Returns the current record's "AmPhotoAlbums" collection
 * @method Doctrine_Collection     getAmVideos()                Returns the current record's "AmVideos" collection
 * @method Doctrine_Collection     getAmComments()              Returns the current record's "AmComments" collection
 * @method AmShopCategoryGroupConn getAmShopCategoryGroupConn() Returns the current record's "AmShopCategoryGroupConn" value
 * @method Doctrine_Collection     getAmShopProducts()          Returns the current record's "AmShopProducts" collection
 * @method AmGroup                 setName()                    Sets the current record's "name" value
 * @method AmGroup                 setBody()                    Sets the current record's "body" value
 * @method AmGroup                 setParentId()                Sets the current record's "parent_id" value
 * @method AmGroup                 setGrTypeId()                Sets the current record's "gr_type_id" value
 * @method AmGroup                 setImage()                   Sets the current record's "image" value
 * @method AmGroup                 setSmallImage()              Sets the current record's "small_image" value
 * @method AmGroup                 setLargeImage()              Sets the current record's "large_image" value
 * @method AmGroup                 setAccessId()                Sets the current record's "access_id" value
 * @method AmGroup                 setCreatedBy()               Sets the current record's "created_by" value
 * @method AmGroup                 setUpdatedBy()               Sets the current record's "updated_by" value
 * @method AmGroup                 setAmGroupType()             Sets the current record's "AmGroupType" value
 * @method AmGroup                 setAmGroupParent()           Sets the current record's "AmGroupParent" value
 * @method AmGroup                 setAmUsers()                 Sets the current record's "AmUsers" collection
 * @method AmGroup                 setAmShopCategories()        Sets the current record's "AmShopCategories" collection
 * @method AmGroup                 setAmCreatedUser()           Sets the current record's "AmCreatedUser" value
 * @method AmGroup                 setAmGroupAccess()           Sets the current record's "AmGroupAccess" value
 * @method AmGroup                 setAmGroupChilds()           Sets the current record's "AmGroupChilds" collection
 * @method AmGroup                 setAmGroupUserConn()         Sets the current record's "AmGroupUserConn" value
 * @method AmGroup                 setAmWheres()                Sets the current record's "AmWheres" collection
 * @method AmGroup                 setAmEvents()                Sets the current record's "AmEvents" collection
 * @method AmGroup                 setAmTopics()                Sets the current record's "AmTopics" collection
 * @method AmGroup                 setAmPhotoAlbums()           Sets the current record's "AmPhotoAlbums" collection
 * @method AmGroup                 setAmVideos()                Sets the current record's "AmVideos" collection
 * @method AmGroup                 setAmComments()              Sets the current record's "AmComments" collection
 * @method AmGroup                 setAmShopCategoryGroupConn() Sets the current record's "AmShopCategoryGroupConn" value
 * @method AmGroup                 setAmShopProducts()          Sets the current record's "AmShopProducts" collection
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Mipo Team
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAmGroup extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('am_group');
        $this->hasColumn('name', 'string', 200, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 200,
             ));
        $this->hasColumn('body', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('parent_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('gr_type_id', 'integer', 4, array(
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
        $this->hasColumn('access_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('created_by', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('updated_by', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('AmGroupType', array(
             'local' => 'gr_type_id',
             'foreign' => 'id'));

        $this->hasOne('AmGroup as AmGroupParent', array(
             'local' => 'parent_id',
             'foreign' => 'id'));

        $this->hasMany('AmUser as AmUsers', array(
             'refClass' => 'AmGroupUserConn',
             'local' => 'group_id',
             'foreign' => 'user_id'));

        $this->hasMany('AmShopCategory as AmShopCategories', array(
             'refClass' => 'AmShopCategoryGroupConn',
             'local' => 'group_id',
             'foreign' => 'category_id'));

        $this->hasOne('AmUser as AmCreatedUser', array(
             'local' => 'created_by',
             'foreign' => 'id'));

        $this->hasOne('AmGroupAccess', array(
             'local' => 'access_id',
             'foreign' => 'id'));

        $this->hasMany('AmGroup as AmGroupChilds', array(
             'local' => 'id',
             'foreign' => 'parent_id'));

        $this->hasOne('AmGroupUserConn', array(
             'local' => 'id',
             'foreign' => 'group_id'));

        $this->hasMany('AmWhere as AmWheres', array(
             'local' => 'id',
             'foreign' => 'group_id'));

        $this->hasMany('AmEvent as AmEvents', array(
             'local' => 'id',
             'foreign' => 'group_id'));

        $this->hasMany('AmTopic as AmTopics', array(
             'local' => 'id',
             'foreign' => 'group_id'));

        $this->hasMany('AmPhotoAlbum as AmPhotoAlbums', array(
             'local' => 'id',
             'foreign' => 'group_id'));

        $this->hasMany('AmVideo as AmVideos', array(
             'local' => 'id',
             'foreign' => 'group_id'));

        $this->hasMany('AmComment as AmComments', array(
             'local' => 'id',
             'foreign' => 'group_id'));

        $this->hasOne('AmShopCategoryGroupConn', array(
             'local' => 'id',
             'foreign' => 'group_id'));

        $this->hasMany('AmShopProduct as AmShopProducts', array(
             'local' => 'id',
             'foreign' => 'group_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}