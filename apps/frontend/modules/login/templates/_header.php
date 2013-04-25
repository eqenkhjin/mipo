<div class="row">
    <div class="span4">
        <div class="header">
            <a href="<?php echo url_for('@homepage'); ?>">
                <img src="/images/logo.png" />
            </a>
        </div>  
    </div>

    <div class="span8">
        <div class="status-bar">
            Та шинэ хэрэглэгч?  <a href="<?php echo url_for('login/signin'); ?>">Нэвтрэх</a> | <a href="<?php echo url_for('user/register'); ?>">Бүртгүүлэх</a> |
            <a class="fb" href="#"><strong>f</strong>Нэвтрэх</a>
            <div class="clear"></div>    
        </div>
    </div>

</div>

<div class="row show-grid">
    <div class="span12">
        <ul class="menu">
            <li><a href="#">Групп</a></li>
            <li><a href="#">Мэдээ</a></li>
            <li><a href="<?php echo url_for('login/signin'); ?>">Нэвтрэх</a></li>
            <li><a href="<?php echo url_for('user/register'); ?>">Бүртгүүлэх</a></li>
        </ul>
        
        
    </div>
</div>
