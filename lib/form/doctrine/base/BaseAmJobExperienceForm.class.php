<?php

/**
 * AmJobExperience form base class.
 *
 * @method AmJobExperience getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAmJobExperienceForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'name'         => new sfWidgetFormInputText(),
      'body'         => new sfWidgetFormTextarea(),
      'company_name' => new sfWidgetFormInputText(),
      'start_date'   => new sfWidgetFormDateTime(),
      'end_date'     => new sfWidgetFormDateTime(),
      'ended_reason' => new sfWidgetFormInputText(),
      'user_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmUser'), 'add_empty' => true)),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'         => new sfValidatorString(array('max_length' => 200)),
      'body'         => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'company_name' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'start_date'   => new sfValidatorDateTime(array('required' => false)),
      'end_date'     => new sfValidatorDateTime(array('required' => false)),
      'ended_reason' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'user_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmUser'), 'required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('am_job_experience[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AmJobExperience';
  }

}
