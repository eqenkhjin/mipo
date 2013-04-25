<?php

/**
 * BaseAmPhotoAlbum
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $body
 * @property integer $group_id
 * @property integer $cover_photo_id
 * @property integer $user_id
 * @property boolean $is_blocked
 * @property integer $like_count
 * @property integer $dislike_count
 * @property integer $access_id
 * @property AmGroup $AmGroup
 * @property AmUser $AmUser
 * @property AmAccess $AmAccess
 * @property AmPhoto $CoverPhoto
 * @property Doctrine_Collection $AmPhotos
 * 
 * @method string              getName()           Returns the current record's "name" value
 * @method string              getBody()           Returns the current record's "body" value
 * @method integer             getGroupId()        Returns the current record's "group_id" value
 * @method integer             getCoverPhotoId()   Returns the current record's "cover_photo_id" value
 * @method integer             getUserId()         Returns the current record's "user_id" value
 * @method boolean             getIsBlocked()      Returns the current record's "is_blocked" value
 * @method integer             getLikeCount()      Returns the current record's "like_count" value
 * @method integer             getDislikeCount()   Returns the current record's "dislike_count" value
 * @method integer             getAccessId()       Returns the current record's "access_id" value
 * @method AmGroup             getAmGroup()        Returns the current record's "AmGroup" value
 * @method AmUser              getAmUser()         Returns the current record's "AmUser" value
 * @method AmAccess            getAmAccess()       Returns the current record's "AmAccess" value
 * @method AmPhoto             getCoverPhoto()     Returns the current record's "CoverPhoto" value
 * @method Doctrine_Collection getAmPhotos()       Returns the current record's "AmPhotos" collection
 * @method AmPhotoAlbum        setName()           Sets the current record's "name" value
 * @method AmPhotoAlbum        setBody()           Sets the current record's "body" value
 * @method AmPhotoAlbum        setGroupId()        Sets the current record's "group_id" value
 * @method AmPhotoAlbum        setCoverPhotoId()   Sets the current record's "cover_photo_id" value
 * @method AmPhotoAlbum        setUserId()         Sets the current record's "user_id" value
 * @method AmPhotoAlbum        setIsBlocked()      Sets the current record's "is_blocked" value
 * @method AmPhotoAlbum        setLikeCount()      Sets the current record's "like_count" value
 * @method AmPhotoAlbum        setDislikeCount()   Sets the current record's "dislike_count" value
 * @method AmPhotoAlbum        setAccessId()       Sets the current record's "access_id" value
 * @method AmPhotoAlbum        setAmGroup()        Sets the current record's "AmGroup" value
 * @method AmPhotoAlbum        setAmUser()         Sets the current record's "AmUser" value
 * @method AmPhotoAlbum        setAmAccess()       Sets the current record's "AmAccess" value
 * @method AmPhotoAlbum        setCoverPhoto()     Sets the current record's "CoverPhoto" value
 * @method AmPhotoAlbum        setAmPhotos()       Sets the current record's "AmPhotos" collection
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Mipo Team
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAmPhotoAlbum extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('am_photo_album');
        $this->hasColumn('name', 'string', 200, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 200,
             ));
        $this->hasColumn('body', 'string', 500, array(
             'type' => 'string',
             'length' => 500,
             ));
        $this->hasColumn('group_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('cover_photo_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('is_blocked', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('like_count', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('dislike_count', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('access_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('AmGroup', array(
             'local' => 'group_id',
             'foreign' => 'id'));

        $this->hasOne('AmUser', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $this->hasOne('AmAccess', array(
             'local' => 'access_id',
             'foreign' => 'id'));

        $this->hasOne('AmPhoto as CoverPhoto', array(
             'local' => 'cover_photo_id',
             'foreign' => 'id'));

        $this->hasMany('AmPhoto as AmPhotos', array(
             'local' => 'id',
             'foreign' => 'album_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}