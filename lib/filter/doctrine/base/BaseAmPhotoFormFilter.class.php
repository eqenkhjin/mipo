<?php

/**
 * AmPhoto filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAmPhotoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'album_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmPhotoAlbum'), 'add_empty' => true)),
      'image'         => new sfWidgetFormFilterInput(),
      'small_image'   => new sfWidgetFormFilterInput(),
      'large_image'   => new sfWidgetFormFilterInput(),
      'like_count'    => new sfWidgetFormFilterInput(),
      'dislike_count' => new sfWidgetFormFilterInput(),
      'user_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmUser'), 'add_empty' => true)),
      'sort_order'    => new sfWidgetFormFilterInput(),
      'is_blocked'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'          => new sfValidatorPass(array('required' => false)),
      'album_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AmPhotoAlbum'), 'column' => 'id')),
      'image'         => new sfValidatorPass(array('required' => false)),
      'small_image'   => new sfValidatorPass(array('required' => false)),
      'large_image'   => new sfValidatorPass(array('required' => false)),
      'like_count'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dislike_count' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'user_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AmUser'), 'column' => 'id')),
      'sort_order'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_blocked'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('am_photo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AmPhoto';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'name'          => 'Text',
      'album_id'      => 'ForeignKey',
      'image'         => 'Text',
      'small_image'   => 'Text',
      'large_image'   => 'Text',
      'like_count'    => 'Number',
      'dislike_count' => 'Number',
      'user_id'       => 'ForeignKey',
      'sort_order'    => 'Number',
      'is_blocked'    => 'Boolean',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
    );
  }
}
