<?php

/**
 * AmEvent form base class.
 *
 * @method AmEvent getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAmEventForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInputText(),
      'body'       => new sfWidgetFormTextarea(),
      'group_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmGroup'), 'add_empty' => true)),
      'when_date'  => new sfWidgetFormDate(),
      'when_hour'  => new sfWidgetFormTime(),
      'place'      => new sfWidgetFormInputText(),
      'location'   => new sfWidgetFormInputText(),
      'is_blocked' => new sfWidgetFormInputCheckbox(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 200)),
      'body'       => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'group_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmGroup'), 'required' => false)),
      'when_date'  => new sfValidatorDate(array('required' => false)),
      'when_hour'  => new sfValidatorTime(array('required' => false)),
      'place'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'location'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_blocked' => new sfValidatorBoolean(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('am_event[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AmEvent';
  }

}
