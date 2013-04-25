<?php

/**
 * BaseAmRememberKey
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property string $remember_key
 * @property string $ip_address
 * @property AmUser $AmUser
 * 
 * @method integer       getUserId()       Returns the current record's "user_id" value
 * @method string        getRememberKey()  Returns the current record's "remember_key" value
 * @method string        getIpAddress()    Returns the current record's "ip_address" value
 * @method AmUser        getAmUser()       Returns the current record's "AmUser" value
 * @method AmRememberKey setUserId()       Sets the current record's "user_id" value
 * @method AmRememberKey setRememberKey()  Sets the current record's "remember_key" value
 * @method AmRememberKey setIpAddress()    Sets the current record's "ip_address" value
 * @method AmRememberKey setAmUser()       Sets the current record's "AmUser" value
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Mipo Team
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAmRememberKey extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('am_remember_key');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('remember_key', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('ip_address', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
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