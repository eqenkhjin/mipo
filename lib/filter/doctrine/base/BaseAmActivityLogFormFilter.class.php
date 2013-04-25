<?php

/**
 * AmActivityLog filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAmActivityLogFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmUser'), 'add_empty' => true)),
      'object_action_conn_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmObjectActionConn'), 'add_empty' => true)),
      'object_type_id'        => new sfWidgetFormFilterInput(),
      'object_id'             => new sfWidgetFormFilterInput(),
      'where_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmWhere'), 'add_empty' => true)),
      'group_id'              => new sfWidgetFormFilterInput(),
      'sentence_html'         => new sfWidgetFormFilterInput(),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'user_id'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AmUser'), 'column' => 'id')),
      'object_action_conn_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AmObjectActionConn'), 'column' => 'id')),
      'object_type_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'object_id'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'where_id'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AmWhere'), 'column' => 'id')),
      'group_id'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sentence_html'         => new sfValidatorPass(array('required' => false)),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('am_activity_log_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AmActivityLog';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'user_id'               => 'ForeignKey',
      'object_action_conn_id' => 'ForeignKey',
      'object_type_id'        => 'Number',
      'object_id'             => 'Number',
      'where_id'              => 'ForeignKey',
      'group_id'              => 'Number',
      'sentence_html'         => 'Text',
      'created_at'            => 'Date',
      'updated_at'            => 'Date',
    );
  }
}
