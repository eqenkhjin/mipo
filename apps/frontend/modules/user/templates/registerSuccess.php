<?php include_partial('login/header'); ?>

<div class="section" style=" min-height:50px; ">

</div>

<div class="row show-grid">
    <div class="span4 offset4">
        <h4>Бүртгүүлэх</h4>
        <hr />
        <?php if($sf_user->hasFlash('error')): ?>
            <div class="alert-error">
                <?php echo $sf_user->getFlash('error'); ?>
            </div>
        <?php endif; ?>
        <form action="" method="post">
            <?php echo $form; ?>
            <hr />
            <input type="submit" value="Бүртгүүлэх"/>
        </form>
    </div>

    
</div>
