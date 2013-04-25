<?php

/**
 * AmUser filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Mipo Team
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAmUserFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'email'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'firstname'        => new sfWidgetFormFilterInput(),
      'lastname'         => new sfWidgetFormFilterInput(),
      'username'         => new sfWidgetFormFilterInput(),
      'display_name'     => new sfWidgetFormFilterInput(),
      'salt'             => new sfWidgetFormFilterInput(),
      'algorithm'        => new sfWidgetFormFilterInput(),
      'password'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'token'            => new sfWidgetFormFilterInput(),
      'user_type'        => new sfWidgetFormFilterInput(),
      'is_web'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_facebook'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_active'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'gender'           => new sfWidgetFormChoice(array('choices' => array('' => '', 'none' => 'none', 'female' => 'female', 'male' => 'male'))),
      'facebook_id'      => new sfWidgetFormFilterInput(),
      'about_me'         => new sfWidgetFormFilterInput(),
      'avatar'           => new sfWidgetFormFilterInput(),
      'small_avatar'     => new sfWidgetFormFilterInput(),
      'large_avatar'     => new sfWidgetFormFilterInput(),
      'mgl_avatar'       => new sfWidgetFormFilterInput(),
      'mgl_small_avatar' => new sfWidgetFormFilterInput(),
      'mgl_large_avatar' => new sfWidgetFormFilterInput(),
      'rregistered_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'verified'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'am_groups_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AmGroup')),
      'am_threads_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AmThread')),
      'am_messages_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AmMessage')),
    ));

    $this->setValidators(array(
      'email'            => new sfValidatorPass(array('required' => false)),
      'firstname'        => new sfValidatorPass(array('required' => false)),
      'lastname'         => new sfValidatorPass(array('required' => false)),
      'username'         => new sfValidatorPass(array('required' => false)),
      'display_name'     => new sfValidatorPass(array('required' => false)),
      'salt'             => new sfValidatorPass(array('required' => false)),
      'algorithm'        => new sfValidatorPass(array('required' => false)),
      'password'         => new sfValidatorPass(array('required' => false)),
      'token'            => new sfValidatorPass(array('required' => false)),
      'user_type'        => new sfValidatorPass(array('required' => false)),
      'is_web'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_facebook'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_active'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'gender'           => new sfValidatorChoice(array('required' => false, 'choices' => array('none' => 'none', 'female' => 'female', 'male' => 'male'))),
      'facebook_id'      => new sfValidatorPass(array('required' => false)),
      'about_me'         => new sfValidatorPass(array('required' => false)),
      'avatar'           => new sfValidatorPass(array('required' => false)),
      'small_avatar'     => new sfValidatorPass(array('required' => false)),
      'large_avatar'     => new sfValidatorPass(array('required' => false)),
      'mgl_avatar'       => new sfValidatorPass(array('required' => false)),
      'mgl_small_avatar' => new sfValidatorPass(array('required' => false)),
      'mgl_large_avatar' => new sfValidatorPass(array('required' => false)),
      'rregistered_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'verified'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'am_groups_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AmGroup', 'required' => false)),
      'am_threads_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AmThread', 'required' => false)),
      'am_messages_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AmMessage', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('am_user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addAmGroupsListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('AmGroupUserConn.group_id', $values)
    ;
  }

  public function addAmThreadsListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.AmUserThreadConn AmUserThreadConn')
      ->andWhereIn('AmUserThreadConn.thread_id', $values)
    ;
  }

  public function addAmMessagesListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.AmUserMessageConn AmUserMessageConn')
      ->andWhereIn('AmUserMessageConn.message_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'AmUser';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'email'            => 'Text',
      'firstname'        => 'Text',
      'lastname'         => 'Text',
      'username'         => 'Text',
      'display_name'     => 'Text',
      'salt'             => 'Text',
      'algorithm'        => 'Text',
      'password'         => 'Text',
      'token'            => 'Text',
      'user_type'        => 'Text',
      'is_web'           => 'Boolean',
      'is_facebook'      => 'Boolean',
      'is_active'        => 'Boolean',
      'gender'           => 'Enum',
      'facebook_id'      => 'Text',
      'about_me'         => 'Text',
      'avatar'           => 'Text',
      'small_avatar'     => 'Text',
      'large_avatar'     => 'Text',
      'mgl_avatar'       => 'Text',
      'mgl_small_avatar' => 'Text',
      'mgl_large_avatar' => 'Text',
      'rregistered_at'   => 'Date',
      'verified'         => 'Boolean',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
      'am_groups_list'   => 'ManyKey',
      'am_threads_list'  => 'ManyKey',
      'am_messages_list' => 'ManyKey',
    );
  }
}
