    
<div class="forget-password">
    <h3>Нууц үг сэргээх</h3>
    
    <form method="post">
        <label>Хэрэглэгчийн нэр</label><br class="clear"/>
        <label style="font-size: 1.4em"><?php echo ($user->getName())?$user->getName():$user->getEmail(); ?></label><br class="clear"/>
        <?php echo $form->renderHiddenFields() ?>
        <?php echo $form['new_password']->renderLabel() ?><br class="clear"/>
        <?php echo $form['new_password']->render() ?>&nbsp;<?php echo $form['new_password']->renderError();  ?><br class="clear"/>

        <?php echo $form['new_password_again']->renderLabel() ?><br class="clear"/>
        <?php echo $form['new_password_again']->render() ?>
        <?php echo $form['new_password_again']->renderError(); ?>
        <br class="clear"/>
            
        <input type="submit" value ="Илгээх"/>
    </form>
    
</div>

