<?php

/**
 * AmAction form base class.
 *
 * @method AmAction getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAmActionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'name'                 => new sfWidgetFormInputText(),
      'body'                 => new sfWidgetFormTextarea(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
      'am_object_types_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AmObjectType')),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'                 => new sfValidatorString(array('max_length' => 200)),
      'body'                 => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'created_at'           => new sfValidatorDateTime(),
      'updated_at'           => new sfValidatorDateTime(),
      'am_object_types_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AmObjectType', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('am_action[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AmAction';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['am_object_types_list']))
    {
      $this->setDefault('am_object_types_list', $this->object->AmObjectTypes->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveAmObjectTypesList($con);

    parent::doSave($con);
  }

  public function saveAmObjectTypesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['am_object_types_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->AmObjectTypes->getPrimaryKeys();
    $values = $this->getValue('am_object_types_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('AmObjectTypes', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('AmObjectTypes', array_values($link));
    }
  }

}
