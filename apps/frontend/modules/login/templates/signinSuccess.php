
<h4>Нэвтрэх</h4>
<hr />
<?php if ($sf_user->hasFlash('error')): ?>
    <div class="alert-error">
        <?php echo $sf_user->getFlash('error'); ?>
    </div>
<?php endif; ?>
<form action="" method="post">
    <?php echo $form; ?>
    <hr />
    <input class="btn btn-primary" type="submit" value="Бүртгүүлэх"/>
    <a href="<?php echo url_for('login/forgetPassword'); ?>" style="font-size: .9em;">Нууц үгээ мартсан</a>
</form>
