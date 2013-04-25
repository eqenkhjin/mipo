

    <form id="register-form" action="<?php echo url_for('user/registerAjax') ?>" method="post">
        <?php echo $form->renderHiddenFields() ?>
        <?php echo $form['email']->renderLabel() ?><br class="clear"/>
        <?php echo $form['email']->render() ?><br class="clear"/>

        <?php echo $form['password']->renderLabel() ?><br class="clear"/>
        <?php echo $form['password']->render() ?><br class="clear"/>

        <?php echo $form['password_again']->renderLabel() ?><br class="clear"/>
        <?php echo $form['password_again']->render() ?><br class="clear"/>

        <?php echo $form['name']->renderLabel() ?><br class="clear"/>
        <?php echo $form['name']->render() ?><br class="clear"/>

        <?php echo $form['mobile']->renderLabel() ?><br class="clear"/>
        <?php echo $form['mobile']->render() ?><br class="clear"/>

        <?php echo $form['mobile2']->renderLabel() ?><br class="clear"/>
        <?php echo $form['mobile2']->render() ?><br class="clear"/>

        <input type="submit" value ="Бүртгүүлэх"/>
        <span class="register-loading" style="margin-left: 10px; visibility: hidden">
        	<img src="/images/facebook_loading.gif"/>
        </span>
    </form>
