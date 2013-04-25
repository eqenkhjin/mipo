<?php

/**
 * AmPhotoAlbum form base class.
 *
 * @method AmPhotoAlbum getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAmPhotoAlbumForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'name'           => new sfWidgetFormInputText(),
      'body'           => new sfWidgetFormTextarea(),
      'group_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmGroup'), 'add_empty' => true)),
      'cover_photo_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CoverPhoto'), 'add_empty' => true)),
      'user_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmUser'), 'add_empty' => true)),
      'is_blocked'     => new sfWidgetFormInputCheckbox(),
      'like_count'     => new sfWidgetFormInputText(),
      'dislike_count'  => new sfWidgetFormInputText(),
      'access_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmAccess'), 'add_empty' => true)),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'           => new sfValidatorString(array('max_length' => 200)),
      'body'           => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'group_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmGroup'), 'required' => false)),
      'cover_photo_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CoverPhoto'), 'required' => false)),
      'user_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmUser'), 'required' => false)),
      'is_blocked'     => new sfValidatorBoolean(array('required' => false)),
      'like_count'     => new sfValidatorInteger(array('required' => false)),
      'dislike_count'  => new sfValidatorInteger(array('required' => false)),
      'access_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmAccess'), 'required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('am_photo_album[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AmPhotoAlbum';
  }

}
