<?php

/**
 * user actions.
 *
 * @package    sf_sandbox
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions
{
    
  public function executeAddFriend(sfWebRequest $request)
  {
      
  }
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeRegister(sfWebRequest $request){
      $this->setLayout('loginLayout');
      
      $this->form = new RegisterForm();
      
      if($request->isMethod('post')){
          $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));

          if(AmUserTable::hasEmail($this->form->getValue('email'))){
             $this->getUser()->setFlash('error', 'Энэ мэйл хаяг бүртгэгдсэн байна'); 
          }else{
            if($this->form->isValid()){
                $user = $this->form->save();
                
                $user->setRegisteredAt(date('Y-m-d H:i:s'));
                $user->save();
                
                /* mail register */
                $mail = new AmMail();
                $mail->setEmailAddress($user->getEmail());
                $mail->setIpAddress($request->getRemoteAddress());
                $mail->save();

                /* mail login history */
                $login_history = new AmLoginHistory();
                $login_history->setUserId($user->getId());
                $login_history->setIpAddress($request->getRemoteAddress());
                $login_history->save();
                
                $this->getUser()->signIn($user);
                $this->redirect('@homepage');
            }else{
                $this->getUser()->setFlash('error', 'Та дахин бүртгүүлнэ үү!');
            }
          }
      }
  }
  
  public function executeRecoverPassword(sfWebRequest $request)
  {
      $id = $request->getParameter('id');
      $token = $request->getParameter('token');
      
      $this->user = JimUserTable::getInstance()->find($id);
      $this->forward404Unless($this->user);
      
      $this->forward404Unless(strcmp($this->user->getPassword(), $token) == 0);
        
      $this->form = new recoverPasswordForm();
      
      if($request->isMethod('post')){
          $this->form->bind($request->getParameter($this->form->getName()));
          if($this->form->isValid()){
              $this->user->setPassword(md5($this->form->getValue('new_password')));
              $this->user->save();
              
              $this->getUser()->setFlash('success', 'Нууц үгийг амжилттай өөрчиллөө');
              $this->redirect('@homepage');
          }
      }
      
  }
  
  public function executeLoginAjax(sfWebRequest $request)
  {
      $this->forward404Unless($request->isMethod(sfRequest::POST));
      
      $this->form = new LoginForm();
      
      $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));

      if($this->form->isValid()){
          if($this->getUser()->getSessionId())
          {
              $baskets = JimBasketTable::getInstance()->findBy('session_id', $this->getUser()->getSessionId());
              foreach($baskets as $basket)
                  $basket->setUserId($this->getUser()->getId());
              $baskets->save();
          }
		  
        /* update user info */ 
        $user = JimUserTable::getInstance()->find($this->getUser()->getId());
        if(!$user->getLastLoginAt() || !$user->getCityId() || !$user->getMobile() || !$user->getMobile2())
            $this->getUser()->setAttribute('is_first_login', true);
            
        $user->setLastLoginAt(date('Y-m-d H:i:s'));
        $user->setLastLoginIpAddress($request->getRemoteAddress());
        $user->save();
        
              $orders = Doctrine_Core::getTable('JimOrder')->getProcessingOrders($this->getUser()->getId());
              
              if(count($orders)>0):
              {
                $this->getUser()->setFlash('success', 'Амжилттай нэвтэрлээ');
              }
              else:
              {
                $this->getUser()->setFlash('success', 'Амжилттай нэвтэрлээ');
              }
              endif;
          die("success");
      }else{
          die("error");
      }
      
        
      $this->hasLayout(false);
      return sfView::NONE;
  }
  
  public function executeRegisterAjax(sfWebRequest $request){
      $this->forward404Unless($request->isMethod(sfRequest::POST));
	  
      $this->form = new RegisterForm();
      
      $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));

            if(JimUserTable::getInstance()->findBy('email', $this->form->getValue('email'))->count() > 0)
                die("email_error");

            if($this->form->isValid()){

                try{
                $user = $this->form->save();
                }catch(exception $e){
                    echo $e->getMessage();
                    die('Error in saving proccesing');
                }
                
                $mail = new JimMail();
                $mail->setEmail($user->getEmail());
                $mail->setCreatedAt(date('Y-m-d H:i:s'));
                $mail->setIpAddress($request->getRemoteAddress());
                $mail->save();

                $user->setPassword(md5($user->getPassword()));
                $user->setGroupId(JimUserGroupTable::CUSTOMER);
                $user->setRegisteredAt(date('Y-m-d H:i:s'));
                $user->setLastLoginAt(date('Y-m-d H:i:s'));
                $user->setLastLoginIpAddress($request->getRemoteAddress());
                $user->save();

            die("success");
      }else{
          die("error");
      }
      
  }
  
  /*
   * jishee ni nuur huudsand bga newtreh towchiun deer darahad ene action duudagdana
   */
  public function executeLoginDialog()
  {
      $this->form = new LoginForm();
  }
  public function executeSignout(sfWebRequest $request)
  {
      $this->getUser()->signOut();

      $this->redirect('@homepage');
  }
  
  public function executeRegisterDialog(sfWebRequest $request)
  {
      $this->form = new RegisterForm();
      
      if($request->isMethod('post'))
      {
          $this->form->bind($request->getParameter($this->form->getName()));
          
          if($this->form->isValid())
          {
              die("ok");
          }
      }
  }
  
  public function executeMyOrders(sfWebRequest $request)
  {

    $query = JimOrderTable::getInstance()->getUserOrdersQuery($this->getUser()->getId());

    $this->pager = new sfDoctrinePager('JimOrder');
    $this->pager->setMaxPerPage($max_per_page = 10);
    $this->pager->setQuery($query);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
    
    if($this->getUser()->getAttribute('delete_order', false)){
        $this->getUser()->setFlash('success', 'Захиалга устгагдлаа');
        $this->getUser()->setAttribute('delete_order', false);
        $this->getUser()->setAttribute('order_not_found', false);
    }else if($this->getUser()->getAttribute('order_not_found', false)){
        $this->getUser()->setFlash('error', 'Захиалга олдсонгүй');
        $this->getUser()->setAttribute('order_not_found', false);
    }
    
    $this->setLayout('stepByStepLayout');
  }
  
  public function executeSettings(sfWebRequest $request)
  {
  	$user = JimUserTable::getInstance()->find($this->getUser()->getId());
	
	$this->profile_form = new JimUserForm($user);
	$this->password_form = new JimUserChangePasswordForm();
  }
  
  public function executeProfileSave(sfWebRequest $request)
  {
  	if($request->isMethod('post')):
	  	$user = JimUserTable::getInstance()->find($this->getUser()->getId());
		
		$this->profile_form = new JimUserForm($user);
		$this->profile_form->bind($request->getParameter($this->profile_form->getName()));
	
		if($this->profile_form->isValid()){
			$user = $this->profile_form->save();
			
			$this->getUser()->setAttribute('email', $user->getEmail());
			$this->getUser()->setAttribute('name', $user->getName());
                        $this->getUser()->setAttribute('city_id', $user->getCityId());
                        if($user->getLastLoginAt() && $user->getCityId() && $user->getMobile() && $user->getMobile2())
        			$this->getUser()->setAttribute('is_first_login', false);
			$this->getUser()->setFlash('success', 'Амжилттай хадгаллаа');
		}
		$this->password_form = new JimUserChangePasswordForm();
		
		$this->setTemplate('settings');
	else:
		$this->redirect('user/settings');
	endif;
  }
  public function executeChangePasswordSave(sfWebRequest $request)
  {
  	if($request->isMethod('post')):

  	$user = JimUserTable::getInstance()->find($this->getUser()->getId());
	$this->profile_form = new JimUserForm($user);

  	$this->password_form = new JimUserChangePasswordForm();
	$this->password_form->bind($request->getParameter($this->password_form->getName()));
	
	if($this->password_form->isValid()){
		if(strcmp($user->getPassword(), md5($this->password_form->getValue('password')) ) == 0){
			$user->setPassword(md5($this->password_form->getValue('password_new')));
			$user->save();
			$this->getUser()->setFlash('success', 'Нууц үг өөрчлөгдлөө');
		}else{
			$this->getUser()->setFlash('error', 'Нууц үг буруу байна');
			$this->getUser()->setFlash('password_error', 'error');
		}
		
	}else{
		$this->getUser()->setFlash('password_error', 'error');
	}
	$this->setTemplate('settings');
	
	else:
		$this->redirect('user/settings');
	endif;
	
  }
  
  public function executeSecure()
  {
      
  }
}

