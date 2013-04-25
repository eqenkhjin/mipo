<?php

/**
 * AmWhere form base class.
 *
 * @method AmWhere getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAmWhereForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'object_type_id'  => new sfWidgetFormInputText(),
      'object_id'       => new sfWidgetFormInputText(),
      'sentence_format' => new sfWidgetFormInputText(),
      'group_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmGroup'), 'add_empty' => true)),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'object_type_id'  => new sfValidatorInteger(array('required' => false)),
      'object_id'       => new sfValidatorInteger(array('required' => false)),
      'sentence_format' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'group_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmGroup'), 'required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('am_where[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AmWhere';
  }

}
