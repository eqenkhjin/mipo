<?php

/**
 * AmActivityLog form base class.
 *
 * @method AmActivityLog getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAmActivityLogForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'user_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmUser'), 'add_empty' => true)),
      'object_action_conn_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmObjectActionConn'), 'add_empty' => true)),
      'object_type_id'        => new sfWidgetFormInputText(),
      'object_id'             => new sfWidgetFormInputText(),
      'where_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmWhere'), 'add_empty' => true)),
      'group_id'              => new sfWidgetFormInputText(),
      'sentence_html'         => new sfWidgetFormInputText(),
      'created_at'            => new sfWidgetFormDateTime(),
      'updated_at'            => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmUser'), 'required' => false)),
      'object_action_conn_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmObjectActionConn'), 'required' => false)),
      'object_type_id'        => new sfValidatorInteger(array('required' => false)),
      'object_id'             => new sfValidatorInteger(array('required' => false)),
      'where_id'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmWhere'), 'required' => false)),
      'group_id'              => new sfValidatorInteger(array('required' => false)),
      'sentence_html'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'            => new sfValidatorDateTime(),
      'updated_at'            => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('am_activity_log[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AmActivityLog';
  }

}
