<?php

/**
 * AmObjectActionConn form base class.
 *
 * @method AmObjectActionConn getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAmObjectActionConnForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'action_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmAction'), 'add_empty' => true)),
      'object_type_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmObjectType'), 'add_empty' => true)),
      'slug'            => new sfWidgetFormInputText(),
      'sentence_format' => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'action_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmAction'), 'required' => false)),
      'object_type_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmObjectType'), 'required' => false)),
      'slug'            => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'sentence_format' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'AmObjectActionConn', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('am_object_action_conn[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AmObjectActionConn';
  }

}
