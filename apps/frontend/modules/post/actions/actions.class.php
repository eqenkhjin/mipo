<?php

/**
 * post actions.
 *
 * @package    sf_sandbox
 * @subpackage post 
 * @author     Mipo Team
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class postActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  
  public function executeOwnLastPost()
  {
      $this->post = AmPostTable::getInstance()->getOwnLast();
      
      $this->setLayout(FALSE);
  }
  
  public function executeAddAjax(sfWebRequest $request)
  {
      $this->forward404Unless($request->isXmlHttpRequest());
      
      $post = $request->getParameter('am-post');
      
      $this->post = new AmPost();
      $this->post->name = $post;
      $this->post->body = $post;
      $this->post->user_id = $this->getUser()->getId();
      
      $user = AmUserTable::getInstance()->find($this->getUser()->getId());
      
      AmActivityLogTable::__log($action_slug = 'write_post', $object_type = 'AmPost', $post, $user);
      
      try{
          $this->post->save();
      }catch(Exception $e){
          die('error');
      }
      
      die('success');
  }

}
