<?php include_partial('public/homePostForm'); ?>

<div class="offset1">
    <h2>Бүлэг</h2>
    <hr />
    <?php foreach ($groups as $group): ?>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
