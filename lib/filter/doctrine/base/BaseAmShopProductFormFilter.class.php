<?php

/**
 * AmShopProduct filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAmShopProductFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'category_id'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmShopCategory'), 'add_empty' => true)),
      'user_id'                    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmUser'), 'add_empty' => true)),
      'group_id'                   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmGroup'), 'add_empty' => true)),
      'title'                      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'content'                    => new sfWidgetFormFilterInput(),
      'cover_photo_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmCoverPhoto'), 'add_empty' => true)),
      'price'                      => new sfWidgetFormFilterInput(),
      'price_type'                 => new sfWidgetFormFilterInput(),
      'phone'                      => new sfWidgetFormFilterInput(),
      'email'                      => new sfWidgetFormFilterInput(),
      'product_code'               => new sfWidgetFormFilterInput(),
      'is_active'                  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_featured'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_submit'                  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'am_shop_option_values_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AmShopOptionValue')),
    ));

    $this->setValidators(array(
      'category_id'                => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AmShopCategory'), 'column' => 'id')),
      'user_id'                    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AmUser'), 'column' => 'id')),
      'group_id'                   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AmGroup'), 'column' => 'id')),
      'title'                      => new sfValidatorPass(array('required' => false)),
      'content'                    => new sfValidatorPass(array('required' => false)),
      'cover_photo_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AmCoverPhoto'), 'column' => 'id')),
      'price'                      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'price_type'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'phone'                      => new sfValidatorPass(array('required' => false)),
      'email'                      => new sfValidatorPass(array('required' => false)),
      'product_code'               => new sfValidatorPass(array('required' => false)),
      'is_active'                  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_featured'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_submit'                  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'am_shop_option_values_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AmShopOptionValue', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('am_shop_product_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addAmShopOptionValuesListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('AmShopProductOptionValueConn.value_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'AmShopProduct';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'category_id'                => 'ForeignKey',
      'user_id'                    => 'ForeignKey',
      'group_id'                   => 'ForeignKey',
      'title'                      => 'Text',
      'content'                    => 'Text',
      'cover_photo_id'             => 'ForeignKey',
      'price'                      => 'Number',
      'price_type'                 => 'Number',
      'phone'                      => 'Text',
      'email'                      => 'Text',
      'product_code'               => 'Text',
      'is_active'                  => 'Boolean',
      'is_featured'                => 'Boolean',
      'is_submit'                  => 'Boolean',
      'created_at'                 => 'Date',
      'updated_at'                 => 'Date',
      'am_shop_option_values_list' => 'ManyKey',
    );
  }
}
