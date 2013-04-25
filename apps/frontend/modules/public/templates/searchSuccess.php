<div class="row">
    <div class="offset1">
        <h2>Хүмүүс</h2>
        <hr />
        <?php foreach ($user_result as $user): ?>
            <div class="wall-item" >
                <div class="span6">
                    <div class="row">
                        <div class="span1">
                            <div class="wall-left">
                                <div class="wall-item-image">
                                    <a href=""><img class="shadow" src="<?php echo $user->getAvatar(); ?>" alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="span5">
                            <div class="wall-right">
                                <label class="wall-label">
                                    <a href="<?php echo url_for('user/profile?id=' . $user->getId()); ?>"><?php echo $user->getLastName() . ' ' . $user->getFirstName(); ?></a>
                                </label>

                                <dl style="float: left;">
                                    <dt>сургууль:</dt>
                                    <dd>МУИС МКС</dd>
                                    <dt>мэргэжил:</dt>
                                    <dd>Програм хангамж</dd>
                                </dl>

                                <a href="<?php echo url_for('user/addFriend?id=' . $user->id); ?>" style="float: right;" class="btn btn-success">Таны найз байна</a>

                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
        <hr />
    </div>

    <div class="offset1">
        <h2>Бүлэг</h2>
        <hr />
        <?php foreach ($group_result as $group): ?>
            <div class="wall-item" >
                <div class="span6">
                    <div class="row">
                        <div class="span1">
                            <div class="wall-left">
                                <div class="wall-item-image">
                                    <a href=""><img class="shadow" src="<?php echo $group->getImage(); ?>" alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="span5">
                            <div class="wall-right">
                                <label class="wall-label">
                                    <a href="<?php echo url_for('group/view?id=' . $group->getId()); ?>"><?php echo $group->getName(); ?></a>
                                </label>
                                
                                
                                <dl style="float: left;">
                                    <dt>сургууль:</dt>
                                    <dd>МУИС МКС</dd>
                                </dl>

                                <a href="<?php echo url_for('group/join?id=' . $user->id); ?>" style="float: right;" class="btn btn-success">Та бүлэгт элссэн байна</a>

                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
