<?php

/**
 * AmGroup filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAmGroupFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'body'                    => new sfWidgetFormFilterInput(),
      'parent_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmGroupParent'), 'add_empty' => true)),
      'gr_type_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmGroupType'), 'add_empty' => true)),
      'image'                   => new sfWidgetFormFilterInput(),
      'small_image'             => new sfWidgetFormFilterInput(),
      'large_image'             => new sfWidgetFormFilterInput(),
      'access_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmGroupAccess'), 'add_empty' => true)),
      'created_by'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmCreatedUser'), 'add_empty' => true)),
      'updated_by'              => new sfWidgetFormFilterInput(),
      'created_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'am_users_list'           => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AmUser')),
      'am_shop_categories_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AmShopCategory')),
    ));

    $this->setValidators(array(
      'name'                    => new sfValidatorPass(array('required' => false)),
      'body'                    => new sfValidatorPass(array('required' => false)),
      'parent_id'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AmGroupParent'), 'column' => 'id')),
      'gr_type_id'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AmGroupType'), 'column' => 'id')),
      'image'                   => new sfValidatorPass(array('required' => false)),
      'small_image'             => new sfValidatorPass(array('required' => false)),
      'large_image'             => new sfValidatorPass(array('required' => false)),
      'access_id'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AmGroupAccess'), 'column' => 'id')),
      'created_by'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AmCreatedUser'), 'column' => 'id')),
      'updated_by'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'am_users_list'           => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AmUser', 'required' => false)),
      'am_shop_categories_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AmShopCategory', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('am_group_filters[%s]');

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
      ->leftJoin($query->getRootAlias().'.AmGroupUserConn AmGroupUserConn')
      ->andWhereIn('AmGroupUserConn.user_id', $values)
    ;
  }

  public function addAmShopCategoriesListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('AmShopCategoryGroupConn.category_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'AmGroup';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'name'                    => 'Text',
      'body'                    => 'Text',
      'parent_id'               => 'ForeignKey',
      'gr_type_id'              => 'ForeignKey',
      'image'                   => 'Text',
      'small_image'             => 'Text',
      'large_image'             => 'Text',
      'access_id'               => 'ForeignKey',
      'created_by'              => 'ForeignKey',
      'updated_by'              => 'Number',
      'created_at'              => 'Date',
      'updated_at'              => 'Date',
      'am_users_list'           => 'ManyKey',
      'am_shop_categories_list' => 'ManyKey',
    );
  }
}
