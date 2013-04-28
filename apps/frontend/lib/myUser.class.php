<?php

class myUser extends sfBasicSecurityUser
{
  public function signOut()
  {
    $this->getAttributeHolder()->removeNamespace();

    $this->setAuthenticated(false);
    $this->clearCredentials();
  }
  
  public function getAmUser()
  {
      if($this->getAttribute('am_user')){
          return $this->getAttribute('am_user');
      }else{
          return false;
      }
  }
  
  public function signIn($user)
  {
    /* set name */
    $this->setAttribute('user_id',   $user->getId());
    $this->setAttribute('email',     $user->getEmail());

    $this->setAttribute('am_user', $user);
    
    /* set name */
    $this->setName($user);
    
    /* set avatar*/
    $this->setAvatar($user);

    $this->setAuthenticated(true);
  }
  
  public function setName($user){
    $this->setAttribute('lastname', $user->getLastname());
    $this->setAttribute('firstname', $user->getFirstname());
    $this->setAttribute('fullname', $user->getLastname().' '.$user->getFirstname());
    
    if(strlen($user->getDisplayName()) > 1)
        $this->setAttribute('name', $user->getDisplayName());
    elseif(strlen($user->getFirstname()) > 1 && strlen($user->getLastname()) > 1){
        $str = AppTools::utf8_substr($this->getAttribute('lastname'), 0, 1).'.'.$this->getAttribute('firstname');
        $this->setAttribute('name', $str);
    }elseif(strlen($user->getFirstname()) > 1){
        $this->setAttribute('name', $user->getFirstname());
    }else{
        $this->setAttribute('name', $user->getEmail());
    }
    
  }
  
  public function setAvatar($user)
  {
    if(strlen($user->getAvatar()) > 0)
        $this->setAttribute('avatar', $user->getAvatar());
    if(strlen($user->getSmallAvatar()) > 0)
        $this->setAttribute('small_avatar', $user->getSmallAvatar());
    if(strlen($user->getLargeAvatar()) > 0)
        $this->setAttribute('large_avatar', $user->getLargeAvatar());
  }
  
  public function getDisplayName()
  {
//      if(strlen($this->getAttribute('name')) > 15)
//        return substr($this->getAttribute('name'), 0, 15).' ...';
//      else
        return $this->getAttribute('name');
  }
  public function getName()
  {
        return $this->getAttribute('name');
  }
  public function getFullName()
  {
      return $this->getAttribute('fullname');
  }
  public function getId()
  {
      return $this->getAttribute('user_id', 0);
  }
  public function getEmail()
  {
      return $this->getAttribute('email');
  }
  
  
  public function getAvatar()
  {
      return $this->getAttribute('avatar', '/images/no-profile.jpg');
  }
  public function getSmallAvatar()
  {
      return $this->getAttribute('small_avatar', '/images/no-profile-small.jpg');
  }
  public function getLargeAvatar()
  {
      return $this->getAttribute('large_avatar', '/images/no-profile.jpeg');
  }

}

