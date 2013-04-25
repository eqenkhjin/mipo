<?php

/**
 * AmVideo form base class.
 *
 * @method AmVideo getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAmVideoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'body'        => new sfWidgetFormTextarea(),
      'user_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmUser'), 'add_empty' => true)),
      'group_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmGroup'), 'add_empty' => true)),
      'type_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmVideoType'), 'add_empty' => true)),
      'image'       => new sfWidgetFormInputText(),
      'small_image' => new sfWidgetFormInputText(),
      'large_image' => new sfWidgetFormInputText(),
      'source'      => new sfWidgetFormTextarea(),
      'is_blocked'  => new sfWidgetFormInputCheckbox(),
      'sort_order'  => new sfWidgetFormInputText(),
      'access_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmAccess'), 'add_empty' => true)),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 200)),
      'body'        => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'user_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmUser'), 'required' => false)),
      'group_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmGroup'), 'required' => false)),
      'type_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmVideoType'), 'required' => false)),
      'image'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'small_image' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'large_image' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'source'      => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'is_blocked'  => new sfValidatorBoolean(array('required' => false)),
      'sort_order'  => new sfValidatorInteger(array('required' => false)),
      'access_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmAccess'), 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('am_video[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AmVideo';
  }

}
