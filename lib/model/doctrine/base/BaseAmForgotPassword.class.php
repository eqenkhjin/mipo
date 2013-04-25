<?php

/**
 * BaseAmForgotPassword
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property string $unique_key
 * @property timestamp $expired_at
 * @property AmUser $AmUser
 * 
 * @method integer          getUserId()     Returns the current record's "user_id" value
 * @method string           getUniqueKey()  Returns the current record's "unique_key" value
 * @method timestamp        getExpiredAt()  Returns the current record's "expired_at" value
 * @method AmUser           getAmUser()     Returns the current record's "AmUser" value
 * @method AmForgotPassword setUserId()     Sets the current record's "user_id" value
 * @method AmForgotPassword setUniqueKey()  Sets the current record's "unique_key" value
 * @method AmForgotPassword setExpiredAt()  Sets the current record's "expired_at" value
 * @method AmForgotPassword setAmUser()     Sets the current record's "AmUser" value
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Mipo Team
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAmForgotPassword extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('am_forgot_password');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('unique_key', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('expired_at', 'timestamp', null, array(
             'type' => 'timestamp',
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