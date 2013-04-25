<?php

class recoverPasswordForm extends baseForm{
    public function configure(){
        
        $this->setWidgets(array(
            'new_password'       => new sfWidgetFormInputPassword(array('label' => 'Шинэ нууц үг')),
            'new_password_again' => new sfWidgetFormInputPassword(array('label' => 'Нууц үгээ дахин оруулна уу')),
        ));
        
        $this->setValidators(array(
            'new_password'          => new sfValidatorString(),
            'new_password_again'    => new sfValidatorString(),
        ));
        $this->widgetSchema->setNameFormat('recover_password[%s]');

        $this->validatorSchema->setPostValidator(
            new sfValidatorSchemaCompare('new_password', sfValidatorSchemaCompare::EQUAL , 'new_password_again',array(), array('invalid' => 'Нууц үгүүд ижилхэн байх ёстой!'))
        );
    }
}