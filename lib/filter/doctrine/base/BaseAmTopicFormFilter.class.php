<?php

/**
 * AmTopic filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAmTopicFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'body'           => new sfWidgetFormFilterInput(),
      'group_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmGroup'), 'add_empty' => true)),
      'user_id'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'relevance_year' => new sfWidgetFormFilterInput(),
      'like_count'     => new sfWidgetFormFilterInput(),
      'dislike_count'  => new sfWidgetFormFilterInput(),
      'access_id'      => new sfWidgetFormFilterInput(),
      'is_blocked'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'           => new sfValidatorPass(array('required' => false)),
      'body'           => new sfValidatorPass(array('required' => false)),
      'group_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AmGroup'), 'column' => 'id')),
      'user_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'relevance_year' => new sfValidatorPass(array('required' => false)),
      'like_count'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dislike_count'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'access_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_blocked'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('am_topic_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AmTopic';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'name'           => 'Text',
      'body'           => 'Text',
      'group_id'       => 'ForeignKey',
      'user_id'        => 'Number',
      'relevance_year' => 'Text',
      'like_count'     => 'Number',
      'dislike_count'  => 'Number',
      'access_id'      => 'Number',
      'is_blocked'     => 'Boolean',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
