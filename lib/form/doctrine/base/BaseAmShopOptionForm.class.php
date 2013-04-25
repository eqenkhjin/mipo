<?php

/**
 * AmShopOption form base class.
 *
 * @method AmShopOption getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAmShopOptionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'name'                    => new sfWidgetFormInputText(),
      'type'                    => new sfWidgetFormChoice(array('choices' => array('selectbox' => 'selectbox', 'checkbox' => 'checkbox', 'textarea' => 'textarea', 'input' => 'input'))),
      'sort_order'              => new sfWidgetFormInputText(),
      'created_at'              => new sfWidgetFormDateTime(),
      'updated_at'              => new sfWidgetFormDateTime(),
      'am_shop_categories_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AmShopCategory')),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'                    => new sfValidatorString(array('max_length' => 100)),
      'type'                    => new sfValidatorChoice(array('choices' => array(0 => 'selectbox', 1 => 'checkbox', 2 => 'textarea', 3 => 'input'), 'required' => false)),
      'sort_order'              => new sfValidatorInteger(array('required' => false)),
      'created_at'              => new sfValidatorDateTime(),
      'updated_at'              => new sfValidatorDateTime(),
      'am_shop_categories_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AmShopCategory', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('am_shop_option[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AmShopOption';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['am_shop_categories_list']))
    {
      $this->setDefault('am_shop_categories_list', $this->object->AmShopCategories->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveAmShopCategoriesList($con);

    parent::doSave($con);
  }

  public function saveAmShopCategoriesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['am_shop_categories_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->AmShopCategories->getPrimaryKeys();
    $values = $this->getValue('am_shop_categories_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('AmShopCategories', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('AmShopCategories', array_values($link));
    }
  }

}
