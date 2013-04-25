<?php

/**
 * AmGroup form base class.
 *
 * @method AmGroup getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAmGroupForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'name'                    => new sfWidgetFormInputText(),
      'body'                    => new sfWidgetFormTextarea(),
      'parent_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmGroupParent'), 'add_empty' => true)),
      'gr_type_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmGroupType'), 'add_empty' => true)),
      'image'                   => new sfWidgetFormInputText(),
      'small_image'             => new sfWidgetFormInputText(),
      'large_image'             => new sfWidgetFormInputText(),
      'access_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmGroupAccess'), 'add_empty' => true)),
      'created_by'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AmCreatedUser'), 'add_empty' => false)),
      'updated_by'              => new sfWidgetFormInputText(),
      'created_at'              => new sfWidgetFormDateTime(),
      'updated_at'              => new sfWidgetFormDateTime(),
      'am_users_list'           => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AmUser')),
      'am_shop_categories_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AmShopCategory')),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'                    => new sfValidatorString(array('max_length' => 200)),
      'body'                    => new sfValidatorString(array('required' => false)),
      'parent_id'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmGroupParent'), 'required' => false)),
      'gr_type_id'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmGroupType'), 'required' => false)),
      'image'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'small_image'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'large_image'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'access_id'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmGroupAccess'), 'required' => false)),
      'created_by'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AmCreatedUser'))),
      'updated_by'              => new sfValidatorInteger(array('required' => false)),
      'created_at'              => new sfValidatorDateTime(),
      'updated_at'              => new sfValidatorDateTime(),
      'am_users_list'           => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AmUser', 'required' => false)),
      'am_shop_categories_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AmShopCategory', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('am_group[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AmGroup';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['am_users_list']))
    {
      $this->setDefault('am_users_list', $this->object->AmUsers->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['am_shop_categories_list']))
    {
      $this->setDefault('am_shop_categories_list', $this->object->AmShopCategories->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveAmUsersList($con);
    $this->saveAmShopCategoriesList($con);

    parent::doSave($con);
  }

  public function saveAmUsersList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['am_users_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->AmUsers->getPrimaryKeys();
    $values = $this->getValue('am_users_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('AmUsers', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('AmUsers', array_values($link));
    }
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
