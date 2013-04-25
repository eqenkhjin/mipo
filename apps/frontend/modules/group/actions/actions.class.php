<?php

/**
 * group actions.
 *
 * @package    sf_sandbox
 * @subpackage group
 * @author     Mipo Team
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class groupActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $this->groups = AmGroupTable::getInstance()->findAll();
  }
}
