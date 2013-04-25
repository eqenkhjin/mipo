<?php

/**
 * AmThread filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAmThreadFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'created_user_id' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'user_count'      => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'am_users_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AmUser')),
    ));

    $this->setValidators(array(
      'created_user_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'user_count'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'am_users_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AmUser', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('am_thread_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addAmUsersListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.AmUserThreadConn AmUserThreadConn')
      ->andWhereIn('AmUserThreadConn.user_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'AmThread';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'created_user_id' => 'Number',
      'user_count'      => 'Number',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
      'am_users_list'   => 'ManyKey',
    );
  }
}
