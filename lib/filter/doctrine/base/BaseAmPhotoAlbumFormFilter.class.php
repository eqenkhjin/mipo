<?php

/**
 * AmPhotoAlbum filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAmPhotoAlbumFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'body'           => new sfWidgetFormFilterInput(),
      'group_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmGroup'), 'add_empty' => true)),
      'cover_photo_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CoverPhoto'), 'add_empty' => true)),
      'user_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmUser'), 'add_empty' => true)),
      'is_blocked'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'like_count'     => new sfWidgetFormFilterInput(),
      'dislike_count'  => new sfWidgetFormFilterInput(),
      'access_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmAccess'), 'add_empty' => true)),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'           => new sfValidatorPass(array('required' => false)),
      'body'           => new sfValidatorPass(array('required' => false)),
      'group_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AmGroup'), 'column' => 'id')),
      'cover_photo_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CoverPhoto'), 'column' => 'id')),
      'user_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AmUser'), 'column' => 'id')),
      'is_blocked'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'like_count'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dislike_count'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'access_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AmAccess'), 'column' => 'id')),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('am_photo_album_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AmPhotoAlbum';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'name'           => 'Text',
      'body'           => 'Text',
      'group_id'       => 'ForeignKey',
      'cover_photo_id' => 'ForeignKey',
      'user_id'        => 'ForeignKey',
      'is_blocked'     => 'Boolean',
      'like_count'     => 'Number',
      'dislike_count'  => 'Number',
      'access_id'      => 'ForeignKey',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
