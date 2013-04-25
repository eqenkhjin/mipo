<?php

/**
 * AmShopProduct form base class.
 *
 * @method AmShopProduct getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAmShopProductForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'category_id'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmShopCategory'), 'add_empty' => false)),
      'user_id'                    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmUser'), 'add_empty' => true)),
      'group_id'                   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmGroup'), 'add_empty' => true)),
      'title'                      => new sfWidgetFormInputText(),
      'content'                    => new sfWidgetFormTextarea(),
      'cover_photo_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmCoverPhoto'), 'add_empty' => true)),
      'price'                      => new sfWidgetFormInputText(),
      'price_type'                 => new sfWidgetFormInputText(),
      'phone'                      => new sfWidgetFormInputText(),
      'email'                      => new sfWidgetFormInputText(),
      'product_code'               => new sfWidgetFormInputText(),
      'is_active'                  => new sfWidgetFormInputCheckbox(),
      'is_featured'                => new sfWidgetFormInputCheckbox(),
      'is_submit'                  => new sfWidgetFormInputCheckbox(),
      'created_at'                 => new sfWidgetFormDateTime(),
      'updated_at'                 => new sfWidgetFormDateTime(),
      'am_shop_option_values_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AmShopOptionValue')),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'category_id'                => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmShopCategory'))),
      'user_id'                    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmUser'), 'required' => false)),
      'group_id'                   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmGroup'), 'required' => false)),
      'title'                      => new sfValidatorString(array('max_length' => 100)),
      'content'                    => new sfValidatorString(array('required' => false)),
      'cover_photo_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmCoverPhoto'), 'required' => false)),
      'price'                      => new sfValidatorNumber(array('required' => false)),
      'price_type'                 => new sfValidatorInteger(array('required' => false)),
      'phone'                      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'                      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'product_code'               => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'is_active'                  => new sfValidatorBoolean(array('required' => false)),
      'is_featured'                => new sfValidatorBoolean(array('required' => false)),
      'is_submit'                  => new sfValidatorBoolean(array('required' => false)),
      'created_at'                 => new sfValidatorDateTime(),
      'updated_at'                 => new sfValidatorDateTime(),
      'am_shop_option_values_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AmShopOptionValue', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('am_shop_product[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AmShopProduct';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['am_shop_option_values_list']))
    {
      $this->setDefault('am_shop_option_values_list', $this->object->AmShopOptionValues->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveAmShopOptionValuesList($con);

    parent::doSave($con);
  }

  public function saveAmShopOptionValuesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['am_shop_option_values_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->AmShopOptionValues->getPrimaryKeys();
    $values = $this->getValue('am_shop_option_values_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('AmShopOptionValues', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('AmShopOptionValues', array_values($link));
    }
  }

}
