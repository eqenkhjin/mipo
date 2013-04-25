<?php

/**
 * BaseAmGroupType
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property string $body
 * @property Doctrine_Collection $AmGroup
 * 
 * @method integer             getId()      Returns the current record's "id" value
 * @method string              getName()    Returns the current record's "name" value
 * @method string              getBody()    Returns the current record's "body" value
 * @method Doctrine_Collection getAmGroup() Returns the current record's "AmGroup" collection
 * @method AmGroupType         setId()      Sets the current record's "id" value
 * @method AmGroupType         setName()    Sets the current record's "name" value
 * @method AmGroupType         setBody()    Sets the current record's "body" value
 * @method AmGroupType         setAmGroup() Sets the current record's "AmGroup" collection
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Mipo Team
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAmGroupType extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('am_group_type');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 200, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 200,
             ));
        $this->hasColumn('body', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('AmGroup', array(
             'local' => 'id',
             'foreign' => 'gr_type_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}