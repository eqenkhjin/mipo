<?php

/**
 * AmUserToUser form base class.
 *
 * @method AmUserToUser getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAmUserToUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_1'      => new sfWidgetFormInputHidden(),
      'user_2'      => new sfWidgetFormInputHidden(),
      'join_date'   => new sfWidgetFormDateTime(),
      'relation_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmUserRelation'), 'add_empty' => true)),
      'is_blocked'  => new sfWidgetFormInputCheckbox(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'user_1'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('user_1')), 'empty_value' => $this->getObject()->get('user_1'), 'required' => false)),
      'user_2'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('user_2')), 'empty_value' => $this->getObject()->get('user_2'), 'required' => false)),
      'join_date'   => new sfValidatorDateTime(array('required' => false)),
      'relation_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmUserRelation'), 'required' => false)),
      'is_blocked'  => new sfValidatorBoolean(array('required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('am_user_to_user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AmUserToUser';
  }

}
