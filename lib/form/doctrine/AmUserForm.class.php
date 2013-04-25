<?php

/**
 * AmUser form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AmUserForm extends BaseAmUserForm
{
  public function configure()
  {
      unset(
        $this['salt'], $this['algorithm'], $this['token'], $this['is_web'], 
        $this['is_facebook'], $this['small_avatar'], $this['large_avatar'],
        $this['register_at'], $this['verified'], $this['created_at'], $this['updated_at']
      );
      
      
  }
}
