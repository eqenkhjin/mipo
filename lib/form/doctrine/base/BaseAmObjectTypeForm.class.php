<?php

/**
 * AmObjectType form base class.
 *
 * @method AmObjectType getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAmObjectTypeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'name'              => new sfWidgetFormInputText(),
      'object_model_name' => new sfWidgetFormInputText(),
      'object_table_name' => new sfWidgetFormInputText(),
      'body'              => new sfWidgetFormInputText(),
      'sentence_format'   => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
      'am_actions_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AmAction')),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'              => new sfValidatorString(array('max_length' => 200)),
      'object_model_name' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'object_table_name' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'body'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sentence_format'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
      'am_actions_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AmAction', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('am_object_type[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AmObjectType';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['am_actions_list']))
    {
      $this->setDefault('am_actions_list', $this->object->AmActions->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveAmActionsList($con);

    parent::doSave($con);
  }

  public function saveAmActionsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['am_actions_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->AmActions->getPrimaryKeys();
    $values = $this->getValue('am_actions_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('AmActions', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('AmActions', array_values($link));
    }
  }

}
