<?php

/**
 * AmSmsLog form base class.
 *
 * @method AmSmsLog getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAmSmsLogForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'mobile_number'   => new sfWidgetFormInputText(),
      'message'         => new sfWidgetFormTextarea(),
      'sended_date'     => new sfWidgetFormTextarea(),
      'activity_log_id' => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'mobile_number'   => new sfValidatorString(array('max_length' => 100)),
      'message'         => new sfValidatorString(array('max_length' => 500)),
      'sended_date'     => new sfValidatorString(array('required' => false)),
      'activity_log_id' => new sfValidatorInteger(array('required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('am_sms_log[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AmSmsLog';
  }

}
