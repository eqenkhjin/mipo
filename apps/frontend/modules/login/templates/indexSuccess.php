<?php include_partial('login/header'); ?>

<div class="section" style=" min-height:50px; ">

</div>

<div class="row show-grid">
    <div class="span7">
        <img src="/images/test1.jpg" />
    </div>

    <div class="span5">
        <div class="login-form">
            <form action="<?php echo url_for('login/signin'); ?>" method="post">   
                <label>Нэвтрэх</label>
                <?php echo $login_form->renderHiddenFields(); ?>
                <?php echo $login_form['email']->render(array('placeholder' => 'Таны мэйл', 'class'=>'span2', 'style' => 'float: left; margin-right: 10px;')); ?>
                <?php echo $login_form['password']->render(array('placeholder' => 'Нууц үг', 'class'=>'span2', 'style' => 'float: left;')); ?>
                <button type="submit" class="btn btn-primary" style="margin-left: 10px;">нэвтрэх</button> 
                <br class="clear" />
            </form>
        </div>

        <div style="float:left; width: 200px">
            <div class="btn-group">
                <button id="sign-up" class="btn btn-warning btn-large">Бидэнтэй нэгдэх</button>
            </div>
        </div>

        <div style="float:left; width: 200px">
            <div class="btn-group">
                <button class="btn btn-primary btn-large">f</button>

                <button class="btn btn-primary btn-large">Facebook-ээр нэвтрэх!</button>
            </div>       
        </div>

        <script>
            $("#sign-up").click(function() {

                $(this).addClass('disabled');
                $('#about').hide('fast');
                $('.login-form').hide('fast');
                $('#sign-up-form').show('fast');

            });
        </script>

        <div class="clearfix"></div>

        <div style=" height: 20px;" class=""></div>

        <div id="sign-up-form"  style="display: none;">
            <div class="well well-small">
                <form action="<?php echo url_for('user/register'); ?>" method="post">
                    <label>Та доорхи талбаруудыг бөглөн бүртгүүлнэ үү.</label>
                    <?php echo $register_form->renderHiddenFields(); ?>

                    <?php echo $register_form['first_name']; ?>
                    <?php echo $register_form['email']; ?>
                    <?php echo $register_form['password']; ?>
                    <?php echo $register_form['password_again']; ?>

                    <hr style="margin-top: 3px;"/>

                    <table>
                        <tr>
                            <td class="">
                                <button type="submit" class="btn btn-primary">Илгээх</button> 
                            </td>
                            <td>
                                <div class="btn-group" style="margin-left: 10px;">
                                    <button class="btn btn-primary">f</button>

                                    <button class="btn btn-primary">Facebook-ээр нэвтрэх!</button>
                                </div>  
                            </td>
                        </tr>
                    </table>

                </form>
            </div>

        </div>


        <div id="about" class="well">
            Alumni.NET is a global alumni registry that first went online in 1994. The Registry was started by Mr. Eric Tomacruz, Ph.D. , as a way to get in touch with his friends from high school. Soon, more schools were being added to the registry as more and more people were getting connected to the internet as well. What began as a hobby became a full-scale multi-national registry.
        </div>
    </div>
</div>
