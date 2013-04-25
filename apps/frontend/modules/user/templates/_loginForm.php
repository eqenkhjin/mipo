
    <form id="login-form" action="<?php echo url_for('user/loginAjax') ?>" method="post">
        <?php echo $form->renderHiddenFields(); ?>
        
        <?php echo $form['email']->renderRow(); ?><br class="clear"/>
        <?php echo $form['password']->renderRow(); ?>
        
        <input type="submit" value ="Нэвтрэх" name="submit"/><!-- <span style="margin-left: 15px; vertical-align: middle; color: #06C;"><input style="margin: 0px;vertical-align: middle;" type="checkbox" name="" /> намайг сана--></span>
        <div class="another-links">
            
            <a class="fancybox-effects fancybox.ajax" style="font-size: 1.2em; color: #C77405" href="<?php echo url_for('user/registerDialog') ?>"> Шинээр бүртгүүлэх</a>
            <a style ="font-size: .9em; margin-top: 2px;" href="<?php echo url_for('user/forgetPassword'); ?>"> Нууц үгээ мартсан?</a>            
        </div>
    </form>
