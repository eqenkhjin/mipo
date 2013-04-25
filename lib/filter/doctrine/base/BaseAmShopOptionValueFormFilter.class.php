<?php

/**
 * AmShopOptionValue filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAmShopOptionValueFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'option_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmShopOption'), 'add_empty' => true)),
      'name'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'image_name'            => new sfWidgetFormFilterInput(),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'am_shop_products_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AmShopProduct')),
    ));

    $this->setValidators(array(
      'option_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AmShopOption'), 'column' => 'id')),
      'name'                  => new sfValidatorPass(array('required' => false)),
      'image_name'            => new sfValidatorPass(array('required' => false)),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'am_shop_products_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AmShopProduct', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('am_shop_option_value_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addAmShopProductsListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.AmShopProductOptionValueConn AmShopProductOptionValueConn')
      ->andWhereIn('AmShopProductOptionValueConn.product_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'AmShopOptionValue';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'option_id'             => 'ForeignKey',
      'name'                  => 'Text',
      'image_name'            => 'Text',
      'created_at'            => 'Date',
      'updated_at'            => 'Date',
      'am_shop_products_list' => 'ManyKey',
    );
  }
}
