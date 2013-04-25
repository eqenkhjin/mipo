<?php

/**
 * AmShopOption filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAmShopOptionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'type'                    => new sfWidgetFormChoice(array('choices' => array('' => '', 'selectbox' => 'selectbox', 'checkbox' => 'checkbox', 'textarea' => 'textarea', 'input' => 'input'))),
      'sort_order'              => new sfWidgetFormFilterInput(),
      'created_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'am_shop_categories_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AmShopCategory')),
    ));

    $this->setValidators(array(
      'name'                    => new sfValidatorPass(array('required' => false)),
      'type'                    => new sfValidatorChoice(array('required' => false, 'choices' => array('selectbox' => 'selectbox', 'checkbox' => 'checkbox', 'textarea' => 'textarea', 'input' => 'input'))),
      'sort_order'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'am_shop_categories_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AmShopCategory', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('am_shop_option_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
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
      ->leftJoin($query->getRootAlias().'.AmShopCategoryOptionConn AmShopCategoryOptionConn')
      ->andWhereIn('AmShopCategoryOptionConn.category_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'AmShopOption';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'name'                    => 'Text',
      'type'                    => 'Enum',
      'sort_order'              => 'Number',
      'created_at'              => 'Date',
      'updated_at'              => 'Date',
      'am_shop_categories_list' => 'ManyKey',
    );
  }
}
