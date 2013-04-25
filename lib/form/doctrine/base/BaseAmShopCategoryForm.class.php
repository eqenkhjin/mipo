<?php

/**
 * AmShopCategory form base class.
 *
 * @method AmShopCategory getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAmShopCategoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'name'            => new sfWidgetFormInputText(),
      'parent_id'       => new sfWidgetFormInputText(),
      'sort_order'      => new sfWidgetFormInputText(),
      'created_user_id' => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
      'am_options_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AmShopOption')),
      'am_groups_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AmGroup')),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'            => new sfValidatorString(array('max_length' => 100)),
      'parent_id'       => new sfValidatorInteger(array('required' => false)),
      'sort_order'      => new sfValidatorInteger(array('required' => false)),
      'created_user_id' => new sfValidatorInteger(array('required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
      'am_options_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AmShopOption', 'required' => false)),
      'am_groups_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AmGroup', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('am_shop_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AmShopCategory';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['am_options_list']))
    {
      $this->setDefault('am_options_list', $this->object->AmOptions->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['am_groups_list']))
    {
      $this->setDefault('am_groups_list', $this->object->AmGroups->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveAmOptionsList($con);
    $this->saveAmGroupsList($con);

    parent::doSave($con);
  }

  public function saveAmOptionsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['am_options_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->AmOptions->getPrimaryKeys();
    $values = $this->getValue('am_options_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('AmOptions', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('AmOptions', array_values($link));
    }
  }

  public function saveAmGroupsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['am_groups_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->AmGroups->getPrimaryKeys();
    $values = $this->getValue('am_groups_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('AmGroups', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('AmGroups', array_values($link));
    }
  }

}
