<?php

/**
 * BaseAmShopOption
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property enum $type
 * @property integer $sort_order
 * @property Doctrine_Collection $AmShopCategories
 * @property Doctrine_Collection $AmShopOptionValue
 * @property Doctrine_Collection $AmShopCategoryOptions
 * @property Doctrine_Collection $AmShopProductOptionValueConn
 * 
 * @method integer             getId()                           Returns the current record's "id" value
 * @method string              getName()                         Returns the current record's "name" value
 * @method enum                getType()                         Returns the current record's "type" value
 * @method integer             getSortOrder()                    Returns the current record's "sort_order" value
 * @method Doctrine_Collection getAmShopCategories()             Returns the current record's "AmShopCategories" collection
 * @method Doctrine_Collection getAmShopOptionValue()            Returns the current record's "AmShopOptionValue" collection
 * @method Doctrine_Collection getAmShopCategoryOptions()        Returns the current record's "AmShopCategoryOptions" collection
 * @method Doctrine_Collection getAmShopProductOptionValueConn() Returns the current record's "AmShopProductOptionValueConn" collection
 * @method AmShopOption        setId()                           Sets the current record's "id" value
 * @method AmShopOption        setName()                         Sets the current record's "name" value
 * @method AmShopOption        setType()                         Sets the current record's "type" value
 * @method AmShopOption        setSortOrder()                    Sets the current record's "sort_order" value
 * @method AmShopOption        setAmShopCategories()             Sets the current record's "AmShopCategories" collection
 * @method AmShopOption        setAmShopOptionValue()            Sets the current record's "AmShopOptionValue" collection
 * @method AmShopOption        setAmShopCategoryOptions()        Sets the current record's "AmShopCategoryOptions" collection
 * @method AmShopOption        setAmShopProductOptionValueConn() Sets the current record's "AmShopProductOptionValueConn" collection
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Mipo Team
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAmShopOption extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('am_shop_option');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('type', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'selectbox',
              1 => 'checkbox',
              2 => 'textarea',
              3 => 'input',
             ),
             ));
        $this->hasColumn('sort_order', 'integer', 1, array(
             'type' => 'integer',
             'length' => 1,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('AmShopCategory as AmShopCategories', array(
             'refClass' => 'AmShopCategoryOptionConn',
             'local' => 'option_id',
             'foreign' => 'category_id'));

        $this->hasMany('AmShopOptionValue', array(
             'local' => 'id',
             'foreign' => 'option_id'));

        $this->hasMany('AmShopCategoryOptionConn as AmShopCategoryOptions', array(
             'local' => 'id',
             'foreign' => 'option_id'));

        $this->hasMany('AmShopProductOptionValueConn', array(
             'local' => 'id',
             'foreign' => 'option_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}