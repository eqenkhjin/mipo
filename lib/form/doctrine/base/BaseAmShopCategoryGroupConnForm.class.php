<?php

/**
 * AmShopCategoryGroupConn form base class.
 *
 * @method AmShopCategoryGroupConn getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAmShopCategoryGroupConnForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'group_id'         => new sfWidgetFormInputHidden(),
      'shop_category_id' => new sfWidgetFormInputHidden(),
      'product_count'    => new sfWidgetFormInputText(),
      'created_user_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmUser'), 'add_empty' => true)),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'group_id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('group_id')), 'empty_value' => $this->getObject()->get('group_id'), 'required' => false)),
      'shop_category_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('shop_category_id')), 'empty_value' => $this->getObject()->get('shop_category_id'), 'required' => false)),
      'product_count'    => new sfValidatorInteger(array('required' => false)),
      'created_user_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmUser'), 'required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('am_shop_category_group_conn[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AmShopCategoryGroupConn';
  }

}
