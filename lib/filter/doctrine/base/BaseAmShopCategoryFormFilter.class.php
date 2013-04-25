<?php

/**
 * AmShopCategory filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAmShopCategoryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'parent_id'       => new sfWidgetFormFilterInput(),
      'sort_order'      => new sfWidgetFormFilterInput(),
      'created_user_id' => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'am_options_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AmShopOption')),
      'am_groups_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AmGroup')),
    ));

    $this->setValidators(array(
      'name'            => new sfValidatorPass(array('required' => false)),
      'parent_id'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sort_order'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_user_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'am_options_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AmShopOption', 'required' => false)),
      'am_groups_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AmGroup', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('am_shop_category_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addAmOptionsListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.AmShopCategoryOptionConn AmShopCategoryOptionConn')
      ->andWhereIn('AmShopCategoryOptionConn.option_id', $values)
    ;
  }

  public function addAmGroupsListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.AmShopCategoryGroupConn AmShopCategoryGroupConn')
      ->andWhereIn('AmShopCategoryGroupConn.group_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'AmShopCategory';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'name'            => 'Text',
      'parent_id'       => 'Number',
      'sort_order'      => 'Number',
      'created_user_id' => 'Number',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
      'am_options_list' => 'ManyKey',
      'am_groups_list'  => 'ManyKey',
    );
  }
}
