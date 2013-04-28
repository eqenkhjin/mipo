<?php

/**
 * public actions.
 *
 * @package    sf_sandbox
 * @subpackage public
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class publicActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function preExecute(){
  }  
  
  public function executeTest()
  {
      echo time();
      
      die;
  }
    
  public function executeIndex(sfWebRequest $request)
  {
      $this->posts = AmPostTable::getInstance()->getPosts();
  }
  
  public function executeSearch(sfWebRequest $request)
  {
      $q = $request->getParameter('q');
      
      $this->user_result = AmUserTable::getInstance()->__search($q);
      
      $this->group_result = AmGroupTable::getInstance()->__search($q);
//      $this->user_result = AmUserTable::getInstance()->searchQuery($q);
  }
}
