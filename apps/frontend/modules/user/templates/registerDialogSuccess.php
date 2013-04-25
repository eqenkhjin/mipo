<script type="text/javascript">
    $(document).ready(function(){
        var options = {
            target:         '#output',
            url:            '<?php echo url_for('user/registerAjax') ?>',
            beforeSubmit:    validate,
            success:         responseDino
        };
        
        $('#register-form').ajaxForm(options);
    });
    var has_error = false;

    function validate(formData, jqForm, options)
    {
        var email = $('#register_email');
        var password = $('#register_password');  
        var password_again = $('#register_password_again');
        var name = $('#register_name'); 
        var mobile = $('#register_mobile');
        
        checkEmailField(email);
        checkPassword(password, password_again);
        checkString(name, 5, false);
        checkString(mobile, 6, false);
        if(has_error)
            return false;
        $('.register-loading').css({ 'visibility': 'visible'});
    }

    
    function responseDino(responseText, statusText, xhr, $form)
    {
        $('.register-loading').css({ 'visibility': 'hidden'});

        if(responseText == "success"){
            $('#output').addClass('success').html('Амжилттай бүртгэлээ <a class="fancybox-effects fancybox.ajax" href="<?php echo url_for('user/loginDialog'); ?>">Нэвтрэх</a>');
        }
        else if(responseText == "error"){
            $('#output').addClass('error').html("Алдаа");
        }else if(responseText == "email_error"){
        	alert("Энэ и-мэйл бүртгэгдсэн байна");
        	$('#register_email').css({borderColor: "red"})
        }
        
        
    }
    function checkPassword(password, password_again)
    {
        var label = password.prev().prev();
        
        if(password.val().length < 6){
            checkString(password, 6, true);
        }
        else if(password_again.val() != password.val()){
            label.find('.error').remove();
            label.append('<em class="error"> Нууц үгийн давталт буруу байна!</em>');
            has_error = true;
            
            password.css({borderColor: "red"})
            password_again.css({borderColor: "red"})
            
            password.keyup(function(){
                password.css({borderColor: "#bbb"})
                password_again.css({borderColor: "#bbb"})
                label.find('.error').remove();
                has_error = false;
            });
        }
        
    }
    
    function checkString(object, min_length, required)
    {
        
        var label = object.prev().prev();
        label.find('.error').remove();

        if(object.val().length > 0){
            if(object.val().length < min_length)
            {
                label.append('<em class="error"> Тэмдэгтийн урт багадаа '+ min_length +' байх ёстой!</em>');
                has_error = true;
                
                object.css({borderColor: "red"})

                object.keyup(function(){
                    object.css({borderColor: "#bbb"})
                    label.find('.error').remove();
                    has_error = false;
                });
            }
        }else if(!object.val() && required ){
            label.append('<em class="error"> Та '+ label.text() + 'ээ оруулна уу!</em>');
            has_error = true;

            object.css({borderColor: "red"})

            object.keyup(function(){
                object.css({borderColor: "#bbb"})
                label.find('.error').remove();
                has_error = false;
            });
        }
    }
    
    function checkEmailField(email)
    {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if(email.val().length == 0){
            var emaillabel = email.prev().prev();
            emaillabel.find('.error').remove();
            
            emaillabel.append('<em class="error"> И-мэйл хаягийг заавал бөглөнө үү!</em>');
            has_error = true;
            
            email.css({borderColor: "red"})
            
            email.keyup(function(){
                email.css({borderColor: "#bbb"})
                emaillabel.find('.error').remove();
                has_error = false;
            });
        }else if(!emailReg.test(email.val())){
            var emaillabel = email.prev().prev();
            emaillabel.find('.error').remove();
            
            email.css({borderColor: "red"})
            
            emaillabel.append('<em class="error"> И-мэйл хаяг буруу байна !</em>');
            has_error = true;
            
            email.keyup(function(){
                email.css({borderColor: "#bbb"})
                emaillabel.find('.error').remove();
                has_error = false;
            });
        }
    }
</script>

<div class="dialog-form">
    <h3>Бүртгүүлэх</h3>

    <?php include_partial('registerForm', array('form' => $form)) ?>
    
    <div id="output"></div>
</div>

