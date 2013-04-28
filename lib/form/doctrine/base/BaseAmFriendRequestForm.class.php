<?php

/**
 * AmFriendRequest form base class.
 *
 * @method AmFriendRequest getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAmFriendRequestForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'sender_id'     => new sfWidgetFormInputText(),
      'receiver_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Receiver'), 'add_empty' => false)),
      'is_accept'     => new sfWidgetFormInputCheckbox(),
      'is_decline'    => new sfWidgetFormInputCheckbox(),
      'send_date'     => new sfWidgetFormDateTime(),
      'received_date' => new sfWidgetFormDateTime(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'sender_id'     => new sfValidatorInteger(),
      'receiver_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Receiver'))),
      'is_accept'     => new sfValidatorBoolean(array('required' => false)),
      'is_decline'    => new sfValidatorBoolean(array('required' => false)),
      'send_date'     => new sfValidatorDateTime(array('required' => false)),
      'received_date' => new sfValidatorDateTime(array('required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('am_friend_request[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AmFriendRequest';
  }

}
