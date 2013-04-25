<div class="well well-small">               
    <div class="profile">
        <a href="<?php echo url_for('profile/index'); ?>">
            <img width="80" src="<?php echo $sf_user->getAvatar(); ?>" class="img-rounded" />
        </a>
        <h4><a href="<?php echo url_for('profile/index'); ?>"><?php echo $sf_user->getFullname(); ?></a></h4>
    </div>
    <div class="clearfix"></div>
    <ul class="nav nav-list">  
        <li class="active"><a href="#"><i class="icon-home"></i> Нүүр</a></li>
        <li><a href="#"><i class="icon-tasks"></i> Групп</a></li>
        <li><a href="#"><i class="icon-envelope"></i> Хувийн захиа</a></li>
        <li><a href="#"><i class="icon-home"></i> Мэдээ</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-user"></i> Миний профайл</a></li>
        <li><a href="#"><i class="icon-cog"></i> Тохиргоо</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-info-sign"></i> Тусламж</a></li>
    </ul>       
</div>
