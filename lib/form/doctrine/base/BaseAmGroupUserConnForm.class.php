<?php

/**
 * AmGroupUserConn form base class.
 *
 * @method AmGroupUserConn getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAmGroupUserConnForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'group_id'     => new sfWidgetFormInputHidden(),
      'user_id'      => new sfWidgetFormInputHidden(),
      'joined_at'    => new sfWidgetFormDateTime(),
      'is_moderator' => new sfWidgetFormInputCheckbox(),
      'year1'        => new sfWidgetFormInputText(),
      'year2'        => new sfWidgetFormInputText(),
      'is_joined'    => new sfWidgetFormInputCheckbox(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'group_id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('group_id')), 'empty_value' => $this->getObject()->get('group_id'), 'required' => false)),
      'user_id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('user_id')), 'empty_value' => $this->getObject()->get('user_id'), 'required' => false)),
      'joined_at'    => new sfValidatorDateTime(array('required' => false)),
      'is_moderator' => new sfValidatorBoolean(array('required' => false)),
      'year1'        => new sfValidatorInteger(array('required' => false)),
      'year2'        => new sfValidatorInteger(array('required' => false)),
      'is_joined'    => new sfValidatorBoolean(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('am_group_user_conn[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AmGroupUserConn';
  }

}
