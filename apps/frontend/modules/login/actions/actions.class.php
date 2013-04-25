<?php

/**
 * login actions.
 *
 * @package    sf_sandbox
 * @subpackage login
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class loginActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $this->register_form = new RegisterForm();
      $this->login_form = new LoginForm();
      $this->setLayout('loginLayout');
  }
  
  public function executeSignin(sfWebRequest $request)
  {
      $this->form = new LoginForm();
      
      if($request->isMethod('post')){
          $this->form->bind($request->getParameter($this->form->getName()));
          
          if($this->form->isValid()){
             $this->redirect('@homepage');
          }
      }
     // $this->setLayout('loginLayout');
  }
  
  public function executeForgetPassword(sfWebRequest $request)
  {
      $this->setLayout('loginLayout');
      
      $this->form = new forgetPasswordForm();
      
      if($request->isMethod('post')){
        $this->form->bind($request->getParameter($this->form->getName()));
        if($this->form->isValid()){
            $user_table = JimUserTable::getInstance()->findBy('email',$this->form->getValue('email'));
            if($user_table->count() > 0){
                $user = $user_table->getFirst();
                
                $mail_name = ($user->getName())?$user->getName():$user->getEmail();
                
                /* email iin template */
                $body = $this->getPartial('user/mail', array('user_id'=>$user->getId(), 'token' => $user->getPassword(), 'name' => $mail_name ));
                
                if(JimMailLogTable::sendMail(1, $user->getId(), "\"БидМонгол Экспресс\" нууц үг солих. ", $body, $request->getRemoteAddress() )){
                    $this->getUser()->setFlash('success', 'Нууц үг солих хүсэлтийг хүлээж авлаа. Та и-мэйл хаягаа шалгана уу!');
                    $this->redirect('@homepage');
                }else
                    $this->getUser()->setFlash('error', 'И-мэйл явсангүй, та дахин оролдож үзнэ үү!');
            }else
                $this->getUser()->setFlash('error', 'Энэ и-мэйл хаяг бүртгэлгүй байна.');
            
        }
      }
  }
  
}
