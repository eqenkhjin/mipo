<?php

/**
 * AmObjectType filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAmObjectTypeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'object_model_name' => new sfWidgetFormFilterInput(),
      'object_table_name' => new sfWidgetFormFilterInput(),
      'body'              => new sfWidgetFormFilterInput(),
      'sentence_format'   => new sfWidgetFormFilterInput(),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'am_actions_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AmAction')),
    ));

    $this->setValidators(array(
      'name'              => new sfValidatorPass(array('required' => false)),
      'object_model_name' => new sfValidatorPass(array('required' => false)),
      'object_table_name' => new sfValidatorPass(array('required' => false)),
      'body'              => new sfValidatorPass(array('required' => false)),
      'sentence_format'   => new sfValidatorPass(array('required' => false)),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'am_actions_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AmAction', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('am_object_type_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addAmActionsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.AmObjectActionConn AmObjectActionConn')
      ->andWhereIn('AmObjectActionConn.action_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'AmObjectType';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'name'              => 'Text',
      'object_model_name' => 'Text',
      'object_table_name' => 'Text',
      'body'              => 'Text',
      'sentence_format'   => 'Text',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
      'am_actions_list'   => 'ManyKey',
    );
  }
}
