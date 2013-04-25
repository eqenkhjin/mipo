<?php

class LoginForm extends BaseForm
{
  public function configure()
  {
    //$this->disableLocalCSRFProtection();
    
    $this->setWidgets(array(
        'email'     => new sfWidgetFormInputText(array('label' => 'Таны мэйл'), array('class' => 'text')),
        'password'  => new sfWidgetFormInputPassword(array('label' => 'Нууц үг'), array('class' => 'text')),
    ));

    $this->widgetSchema->setNameFormat('login[%s]');

    $this->setValidators(array(
        'email'     => new sfValidatorString(array('required' => true), array('required' => 'Мэйл ээ оруулна уу!')),
        'password'  => new sfValidatorString(array('required' => true), array('required' => 'Нууц үгээ оруулна уу!')),
    )); 

    $this->validatorSchema->setPreValidator(
        new sfValidatorCallback(array('callback' => array($this, 'validateUser')))
    );
  }

  public function validateUser($validator, $values)
  {

    $message = 'Мэйл хаяг эсвэл нууц үг буруу байна!';
    
    if ($values['email'] && $values['password'])
    {
      $user = AmUserTable::getInstance()->getByEmail($values['email']);
      if ($user)
      {
        if ($user->checkPassword($values['password']))
        {
            if ($user->getIsActive()) {
                sfContext::getInstance()->getUser()->signIn($user);
            } else {
                throw new sfValidatorError($validator, 'Your account is unverificated!');
            }
        }
        else
        {
          throw new sfValidatorError($validator, $message);
        }
      }
      else
      {
        throw new sfValidatorError($validator, $message);
      }
    }

    return $values;
  }
}
