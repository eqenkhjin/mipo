<?php

/**
 * AmPhoto form base class.
 *
 * @method AmPhoto getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAmPhotoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'name'          => new sfWidgetFormInputText(),
      'album_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmPhotoAlbum'), 'add_empty' => true)),
      'image'         => new sfWidgetFormInputText(),
      'small_image'   => new sfWidgetFormInputText(),
      'large_image'   => new sfWidgetFormInputText(),
      'like_count'    => new sfWidgetFormInputText(),
      'dislike_count' => new sfWidgetFormInputText(),
      'user_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmUser'), 'add_empty' => true)),
      'sort_order'    => new sfWidgetFormInputText(),
      'is_blocked'    => new sfWidgetFormInputCheckbox(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'          => new sfValidatorString(array('max_length' => 200)),
      'album_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmPhotoAlbum'), 'required' => false)),
      'image'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'small_image'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'large_image'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'like_count'    => new sfValidatorInteger(array('required' => false)),
      'dislike_count' => new sfValidatorInteger(array('required' => false)),
      'user_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmUser'), 'required' => false)),
      'sort_order'    => new sfValidatorInteger(array('required' => false)),
      'is_blocked'    => new sfValidatorBoolean(array('required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('am_photo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AmPhoto';
  }

}
