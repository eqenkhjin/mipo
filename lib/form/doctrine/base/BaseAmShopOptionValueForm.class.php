<?php

/**
 * AmShopOptionValue form base class.
 *
 * @method AmShopOptionValue getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAmShopOptionValueForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'option_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmShopOption'), 'add_empty' => true)),
      'name'                  => new sfWidgetFormInputText(),
      'image_name'            => new sfWidgetFormInputText(),
      'created_at'            => new sfWidgetFormDateTime(),
      'updated_at'            => new sfWidgetFormDateTime(),
      'am_shop_products_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AmShopProduct')),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'option_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmShopOption'), 'required' => false)),
      'name'                  => new sfValidatorString(array('max_length' => 100)),
      'image_name'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'            => new sfValidatorDateTime(),
      'updated_at'            => new sfValidatorDateTime(),
      'am_shop_products_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AmShopProduct', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('am_shop_option_value[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AmShopOptionValue';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['am_shop_products_list']))
    {
      $this->setDefault('am_shop_products_list', $this->object->AmShopProducts->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveAmShopProductsList($con);

    parent::doSave($con);
  }

  public function saveAmShopProductsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['am_shop_products_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->AmShopProducts->getPrimaryKeys();
    $values = $this->getValue('am_shop_products_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('AmShopProducts', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('AmShopProducts', array_values($link));
    }
  }

}
