<?php

/**
 * AmComment form base class.
 *
 * @method AmComment getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAmCommentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'name'           => new sfWidgetFormInputText(),
      'body'           => new sfWidgetFormTextarea(),
      'user_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmUser'), 'add_empty' => false)),
      'group_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmGroup'), 'add_empty' => true)),
      'object_type_id' => new sfWidgetFormInputText(),
      'object_id'      => new sfWidgetFormInputText(),
      'like_count'     => new sfWidgetFormInputText(),
      'dislike_count'  => new sfWidgetFormInputText(),
      'is_blocked'     => new sfWidgetFormInputCheckbox(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'           => new sfValidatorString(array('max_length' => 200)),
      'body'           => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'user_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmUser'))),
      'group_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmGroup'), 'required' => false)),
      'object_type_id' => new sfValidatorInteger(array('required' => false)),
      'object_id'      => new sfValidatorInteger(array('required' => false)),
      'like_count'     => new sfValidatorInteger(array('required' => false)),
      'dislike_count'  => new sfValidatorInteger(array('required' => false)),
      'is_blocked'     => new sfValidatorBoolean(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('am_comment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AmComment';
  }

}
