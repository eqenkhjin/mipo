<?php

/**
 * AmUserEducation form base class.
 *
 * @method AmUserEducation getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAmUserEducationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'user_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmUser'), 'add_empty' => false)),
      'group_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmGroup'), 'add_empty' => true)),
      'profession'         => new sfWidgetFormInputText(),
      'school_name'        => new sfWidgetFormInputText(),
      'start_year'         => new sfWidgetFormInputText(),
      'education_level_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmEducationLevel'), 'add_empty' => true)),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmUser'))),
      'group_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmGroup'), 'required' => false)),
      'profession'         => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'school_name'        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'start_year'         => new sfValidatorInteger(array('required' => false)),
      'education_level_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmEducationLevel'), 'required' => false)),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('am_user_education[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AmUserEducation';
  }

}
