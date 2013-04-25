<?php

/**
 * AmMessage form base class.
 *
 * @method AmMessage getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAmMessageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'created_user_id'   => new sfWidgetFormInputText(),
      'sended_user_count' => new sfWidgetFormInputText(),
      'name'              => new sfWidgetFormInputText(),
      'body'              => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
      'am_users_list'     => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AmUser')),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'created_user_id'   => new sfValidatorInteger(),
      'sended_user_count' => new sfValidatorInteger(array('required' => false)),
      'name'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'body'              => new sfValidatorString(array('max_length' => 255)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
      'am_users_list'     => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AmUser', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('am_message[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AmMessage';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['am_users_list']))
    {
      $this->setDefault('am_users_list', $this->object->AmUsers->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveAmUsersList($con);

    parent::doSave($con);
  }

  public function saveAmUsersList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['am_users_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->AmUsers->getPrimaryKeys();
    $values = $this->getValue('am_users_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('AmUsers', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('AmUsers', array_values($link));
    }
  }

}
