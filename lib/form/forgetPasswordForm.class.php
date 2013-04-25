<?php

class forgetPasswordForm extends baseForm {

    public function configure() {

        $this->setWidgets(array(
            'email' => new sfWidgetFormInputText(array('label' => 'Мэйл хаяг')),
            'captcha' => new sfWidgetCaptchaGD()
        ));

        $this->setValidators(array(
            'email' => new sfValidatorEmail(array(), array('invalid' => 'Мэйл хаяг буруу байна')),
            'captcha' => new sfCaptchaGDValidator(array('length' => 4), array('invalid' => 'Зурган дээрх кодыг оруулна уу!'))
        ));
        $this->widgetSchema->setNameFormat('forget_password[%s]');
        $this->widgetSchema->setHelp('captcha', 'Та зурган дээрх текстийг оруулна уу!');
    }

}