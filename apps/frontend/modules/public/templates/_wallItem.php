    <div class="wall-item offset1 span6" >
        <div class="row">
            <div class="span1">
                <div class="wall-left">
                    <div class="wall-item-image">
                        <a href=""><img class="shadow" src="<?php echo $user->getAvatar(); ?>" alt="" /></a>
                    </div>
                    
                    <?php if($user->id != $sf_user->getId()): ?>
                    <div class="wall-item-mongol">
                        <img src="<?php echo $user->getMglAvatar() ?>" alt="" />
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <!--    <div class="wall-right-display-image">-->
            <!--        <img src="--><?php //echo $sf_user->getAvatar(); ?><!--" alt=""></a>-->
            <!--    </div>-->
            <!--    <div class="wall-right-up">-->
            <!--        <a href="">--><?php //echo $sf_user->getName(); ?><!--</a>&nbspaction&nbsp<a href="">&nbspuser</a>'s&nbsp<a href="">object</a>-->
            <!--    </div>-->
            <div class="span5">
                <div class="wall-right post">
                    <label class="wall-label">
                        <?php echo $user->getFirstName(); ?> 
                    </label>
                    <small style="font-size: 10px; float: right;"><?php echo $post->created_at ?></small>
                    <p>
                        <?php echo $post; ?>
                    </p>
                    
                    <?php if($user->id != $sf_user->getId()): ?>
                    <div class="btn-group">
                        <a href="" class="btn btn-link">Like</a>
                        <a href="" class="btn btn-link">Dislike</a>
                        <a href="" class="btn btn-link">Share</a>
                    </div>
                    <hr style="border-style: dashed"/>
                    <div class="comment">
                        <label for="">Сэтгэгдэл</label>
                        <form action="<?php echo url_for('comment/add'); ?>" >
                            <input type="text" class="span5" />
                        </form>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
