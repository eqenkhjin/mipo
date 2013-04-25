<?php include_partial('login/header'); ?>

<div class="section" style=" min-height:20px; ">

</div>

<div class="row show-grid">
    <div class="span4 offset4">
        <h3>Нууц үг сэргээх</h3>

        <form method="post">
            <?php echo $form->renderHiddenFields() ?>
            <?php echo $form['email']->renderLabel() ?>
            <?php echo $form['email']->render() ?>&nbsp;<?php echo $form['email']->renderError(); ?>

            <?php echo $form['captcha']->render(array('class' => 'span1')) ?>
            <span class="help"><?php echo $form['captcha']->renderHelp(); ?></span>
            <?php if ($form['captcha']->hasError()): ?>
                <?php echo $form['captcha']->renderError(); ?>
            <?php endif; ?>
            <br class="clear"/>

            <input type="submit" value ="Илгээх"/>
        </form>
    </div>

</div>

