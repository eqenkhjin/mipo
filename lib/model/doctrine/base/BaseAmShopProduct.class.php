<?php

/**
 * BaseAmShopProduct
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $category_id
 * @property integer $user_id
 * @property integer $group_id
 * @property string $title
 * @property string $content
 * @property integer $cover_photo_id
 * @property float $price
 * @property integer $price_type
 * @property string $phone
 * @property string $email
 * @property string $product_code
 * @property boolean $is_active
 * @property boolean $is_featured
 * @property boolean $is_submit
 * @property Doctrine_Collection $AmShopOptionValues
 * @property AmShopCategory $AmShopCategory
 * @property AmShopProductImage $AmCoverPhoto
 * @property AmUser $AmUser
 * @property AmGroup $AmGroup
 * @property Doctrine_Collection $AmShopProductOptionValueConn
 * @property Doctrine_Collection $AmShopPhotos
 * 
 * @method integer             getId()                           Returns the current record's "id" value
 * @method integer             getCategoryId()                   Returns the current record's "category_id" value
 * @method integer             getUserId()                       Returns the current record's "user_id" value
 * @method integer             getGroupId()                      Returns the current record's "group_id" value
 * @method string              getTitle()                        Returns the current record's "title" value
 * @method string              getContent()                      Returns the current record's "content" value
 * @method integer             getCoverPhotoId()                 Returns the current record's "cover_photo_id" value
 * @method float               getPrice()                        Returns the current record's "price" value
 * @method integer             getPriceType()                    Returns the current record's "price_type" value
 * @method string              getPhone()                        Returns the current record's "phone" value
 * @method string              getEmail()                        Returns the current record's "email" value
 * @method string              getProductCode()                  Returns the current record's "product_code" value
 * @method boolean             getIsActive()                     Returns the current record's "is_active" value
 * @method boolean             getIsFeatured()                   Returns the current record's "is_featured" value
 * @method boolean             getIsSubmit()                     Returns the current record's "is_submit" value
 * @method Doctrine_Collection getAmShopOptionValues()           Returns the current record's "AmShopOptionValues" collection
 * @method AmShopCategory      getAmShopCategory()               Returns the current record's "AmShopCategory" value
 * @method AmShopProductImage  getAmCoverPhoto()                 Returns the current record's "AmCoverPhoto" value
 * @method AmUser              getAmUser()                       Returns the current record's "AmUser" value
 * @method AmGroup             getAmGroup()                      Returns the current record's "AmGroup" value
 * @method Doctrine_Collection getAmShopProductOptionValueConn() Returns the current record's "AmShopProductOptionValueConn" collection
 * @method Doctrine_Collection getAmShopPhotos()                 Returns the current record's "AmShopPhotos" collection
 * @method AmShopProduct       setId()                           Sets the current record's "id" value
 * @method AmShopProduct       setCategoryId()                   Sets the current record's "category_id" value
 * @method AmShopProduct       setUserId()                       Sets the current record's "user_id" value
 * @method AmShopProduct       setGroupId()                      Sets the current record's "group_id" value
 * @method AmShopProduct       setTitle()                        Sets the current record's "title" value
 * @method AmShopProduct       setContent()                      Sets the current record's "content" value
 * @method AmShopProduct       setCoverPhotoId()                 Sets the current record's "cover_photo_id" value
 * @method AmShopProduct       setPrice()                        Sets the current record's "price" value
 * @method AmShopProduct       setPriceType()                    Sets the current record's "price_type" value
 * @method AmShopProduct       setPhone()                        Sets the current record's "phone" value
 * @method AmShopProduct       setEmail()                        Sets the current record's "email" value
 * @method AmShopProduct       setProductCode()                  Sets the current record's "product_code" value
 * @method AmShopProduct       setIsActive()                     Sets the current record's "is_active" value
 * @method AmShopProduct       setIsFeatured()                   Sets the current record's "is_featured" value
 * @method AmShopProduct       setIsSubmit()                     Sets the current record's "is_submit" value
 * @method AmShopProduct       setAmShopOptionValues()           Sets the current record's "AmShopOptionValues" collection
 * @method AmShopProduct       setAmShopCategory()               Sets the current record's "AmShopCategory" value
 * @method AmShopProduct       setAmCoverPhoto()                 Sets the current record's "AmCoverPhoto" value
 * @method AmShopProduct       setAmUser()                       Sets the current record's "AmUser" value
 * @method AmShopProduct       setAmGroup()                      Sets the current record's "AmGroup" value
 * @method AmShopProduct       setAmShopProductOptionValueConn() Sets the current record's "AmShopProductOptionValueConn" collection
 * @method AmShopProduct       setAmShopPhotos()                 Sets the current record's "AmShopPhotos" collection
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Mipo Team
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAmShopProduct extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('am_shop_product');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('category_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('group_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('title', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('content', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('cover_photo_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('price', 'float', null, array(
             'type' => 'float',
             'length' => '',
             ));
        $this->hasColumn('price_type', 'integer', 4, array(
             'type' => 'integer',
             'default' => 0,
             'length' => 4,
             ));
        $this->hasColumn('phone', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('product_code', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'default' => true,
             ));
        $this->hasColumn('is_featured', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('is_submit', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('AmShopOptionValue as AmShopOptionValues', array(
             'refClass' => 'AmShopProductOptionValueConn',
             'local' => 'product_id',
             'foreign' => 'value_id'));

        $this->hasOne('AmShopCategory', array(
             'local' => 'category_id',
             'foreign' => 'id'));

        $this->hasOne('AmShopProductImage as AmCoverPhoto', array(
             'local' => 'cover_photo_id',
             'foreign' => 'id'));

        $this->hasOne('AmUser', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $this->hasOne('AmGroup', array(
             'local' => 'group_id',
             'foreign' => 'id'));

        $this->hasMany('AmShopProductOptionValueConn', array(
             'local' => 'id',
             'foreign' => 'product_id'));

        $this->hasMany('AmShopProductImage as AmShopPhotos', array(
             'local' => 'id',
             'foreign' => 'product_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}