<?php

/**
 * BaseAmMail
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $email_address
 * @property boolean $subsribe
 * @property string $ip_address
 * 
 * @method string  getEmailAddress()  Returns the current record's "email_address" value
 * @method boolean getSubsribe()      Returns the current record's "subsribe" value
 * @method string  getIpAddress()     Returns the current record's "ip_address" value
 * @method AmMail  setEmailAddress()  Sets the current record's "email_address" value
 * @method AmMail  setSubsribe()      Sets the current record's "subsribe" value
 * @method AmMail  setIpAddress()     Sets the current record's "ip_address" value
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Mipo Team
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAmMail extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('am_mail');
        $this->hasColumn('email_address', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('subsribe', 'boolean', null, array(
             'type' => 'boolean',
             'default' => true,
             ));
        $this->hasColumn('ip_address', 'string', 25, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}