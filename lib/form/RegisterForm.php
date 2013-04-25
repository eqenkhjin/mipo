<?php 
class RegisterForm extends AmUserForm
{
    public function configure()
    {
        
        $this->setWidgets(array(
            'email'             => new sfWidgetFormInputText(array('label' => 'Таны мэйл'), array('placeholder' => 'Таны мэйл')),
            'first_name'        => new sfWidgetFormInputText(array('label' => 'Таны нэр'), array('placeholder' => 'Таны нэр')),
            'password'          => new sfWidgetFormInputPassword(array('label' => 'Нүүр үг'), array('placeholder' => 'Нүүр үг')),
            'password_again'    => new sfWidgetFormInputPassword(array('label' => 'Нууц үгээ давтах'), array('placeholder' => 'Нууц үгээ давтах')),
        ));
        
        $this->setValidators(array(
            'email'         	=> new sfValidatorEmail(array('required' => true), array('invalid'=>'Мэйл хаяг буруу байна', 'required' => 'Мэйл хаягаа заавал оруулна уу!')),
            'first_name'        => new sfValidatorString(array('min_length' => 2, 'required' => false)),
            'password'      	=> new sfValidatorString(array('min_length' => 2, 'required' => true), array('required' =>'Нууц үгээ оруулна уу!')),
            'password_again'	=> new sfValidatorPass(),
        ));
        
        $this->validatorSchema->setPostValidator(
            new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL , 'password_again',array(), array('invalid' => 'Нууц үгүүд ижилхэн байх ёстой!'))
        );

        $this->widgetSchema->setNameFormat('register[%s]');
    }
}