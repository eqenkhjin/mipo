<div class="row" id="header">
    <div class="span12">
        <nav id="mainnav" class="navbar">
            <div class="social-logo">
                <a href="<?php echo url_for('@homepage'); ?>"><img src="/html/images/logo-large.png" alt="" /></a>
            </div>

            <?php if ($sf_user->isAuthenticated()): ?>
                <ul class="mainmenu">
                    <li><a href="<?php echo url_for('@homepage'); ?>">Нүүр</a></li>
                    <li><a href="<?php echo url_for('group/index'); ?>">Бүлэг</a></li>
                    <li><a href="">Хичээл</a></li>
                    <li><a href="">Хэлэлцүүлэг</a></li>
                </ul>

                <ul class="profile-bar nav pull-right">
                    <li class="my-profile">
                        <a class="my-profile-image" href=""><img src="<?php echo $sf_user->getAvatar(); ?>" alt="" /></a>
                        <a href="" class="my-profile-name"><?php echo $sf_user->getDisplayName() ?></a>
                    </li>
                    <li><a href="">Тусламж</a></li>
                    <li class="dropdown"> 
                        <a class="settings dropdown-toggle" href="#" data-toggle="dropdown"><i class="mipo-icon mipo-icon-settings"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Хувийн тохиргоо</a></li>
                            <li><a href="#">Миний хуудас</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo url_for('user/signout'); ?>">Гарах</a></li>
                        </ul>
                    </li>
                    </li>
                </ul>
            <?php else: ?>
                <!--                            <div class="homepage-login-form">
                                                <form action="" method="post">
                                                    <label for="">Хэрэглэгчийн нэр</label>
                                                    <input type="text" class="text" />
                
                                                    <label for="">Хэрэглэгчийн нэр</label>
                                                    <input type="text" class="text" />
                                                </form>
                                            </div>-->
            <?php endif; ?>
        </nav>
    </div>
</div>

