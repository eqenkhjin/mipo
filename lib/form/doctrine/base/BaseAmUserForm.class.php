<?php

/**
 * AmUser form base class.
 *
 * @method AmUser getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAmUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'email'            => new sfWidgetFormInputText(),
      'firstname'        => new sfWidgetFormInputText(),
      'lastname'         => new sfWidgetFormInputText(),
      'username'         => new sfWidgetFormInputText(),
      'display_name'     => new sfWidgetFormInputText(),
      'salt'             => new sfWidgetFormInputText(),
      'algorithm'        => new sfWidgetFormInputText(),
      'password'         => new sfWidgetFormInputText(),
      'token'            => new sfWidgetFormInputText(),
      'user_type'        => new sfWidgetFormInputText(),
      'is_web'           => new sfWidgetFormInputCheckbox(),
      'is_facebook'      => new sfWidgetFormInputCheckbox(),
      'is_active'        => new sfWidgetFormInputCheckbox(),
      'gender'           => new sfWidgetFormChoice(array('choices' => array('none' => 'none', 'female' => 'female', 'male' => 'male'))),
      'facebook_id'      => new sfWidgetFormInputText(),
      'about_me'         => new sfWidgetFormInputText(),
      'avatar'           => new sfWidgetFormInputText(),
      'small_avatar'     => new sfWidgetFormInputText(),
      'large_avatar'     => new sfWidgetFormInputText(),
      'mgl_avatar'       => new sfWidgetFormInputText(),
      'mgl_small_avatar' => new sfWidgetFormInputText(),
      'mgl_large_avatar' => new sfWidgetFormInputText(),
      'rregistered_at'   => new sfWidgetFormDateTime(),
      'verified'         => new sfWidgetFormInputCheckbox(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
      'am_groups_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AmGroup')),
      'am_threads_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AmThread')),
      'am_messages_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AmMessage')),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'email'            => new sfValidatorString(array('max_length' => 255)),
      'firstname'        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'lastname'         => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'username'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'display_name'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'salt'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'algorithm'        => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'password'         => new sfValidatorString(array('max_length' => 255)),
      'token'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'user_type'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'is_web'           => new sfValidatorBoolean(array('required' => false)),
      'is_facebook'      => new sfValidatorBoolean(array('required' => false)),
      'is_active'        => new sfValidatorBoolean(array('required' => false)),
      'gender'           => new sfValidatorChoice(array('choices' => array(0 => 'none', 1 => 'female', 2 => 'male'), 'required' => false)),
      'facebook_id'      => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'about_me'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'avatar'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'small_avatar'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'large_avatar'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'mgl_avatar'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'mgl_small_avatar' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'mgl_large_avatar' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'rregistered_at'   => new sfValidatorDateTime(array('required' => false)),
      'verified'         => new sfValidatorBoolean(array('required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
      'am_groups_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AmGroup', 'required' => false)),
      'am_threads_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AmThread', 'required' => false)),
      'am_messages_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AmMessage', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'AmUser', 'column' => array('email'))),
        new sfValidatorDoctrineUnique(array('model' => 'AmUser', 'column' => array('username'))),
      ))
    );

    $this->widgetSchema->setNameFormat('am_user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AmUser';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['am_groups_list']))
    {
      $this->setDefault('am_groups_list', $this->object->AmGroups->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['am_threads_list']))
    {
      $this->setDefault('am_threads_list', $this->object->AmThreads->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['am_messages_list']))
    {
      $this->setDefault('am_messages_list', $this->object->AmMessages->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveAmGroupsList($con);
    $this->saveAmThreadsList($con);
    $this->saveAmMessagesList($con);

    parent::doSave($con);
  }

  public function saveAmGroupsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['am_groups_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->AmGroups->getPrimaryKeys();
    $values = $this->getValue('am_groups_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('AmGroups', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('AmGroups', array_values($link));
    }
  }

  public function saveAmThreadsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['am_threads_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->AmThreads->getPrimaryKeys();
    $values = $this->getValue('am_threads_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('AmThreads', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('AmThreads', array_values($link));
    }
  }

  public function saveAmMessagesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['am_messages_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->AmMessages->getPrimaryKeys();
    $values = $this->getValue('am_messages_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('AmMessages', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('AmMessages', array_values($link));
    }
  }

}
