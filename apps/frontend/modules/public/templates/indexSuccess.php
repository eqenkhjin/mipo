
<?php include_partial('public/homePostForm'); ?>

<div class="row">
    
    <?php if($sf_user->hasFlash('success')): ?>
        <div class="alert alert-success">
            <?php echo $sf_user->getFlash('success'); ?>
        </div>
        
    <?php endif; ?>
    
    <?php include_partial('public/search'); ?>
    
    <div class="wall-container">
        <?php foreach($posts as $post): ?>
        <?php include_partial('public/wallItem', array('user' => $post->getAmUser(), 'post' => $post)) ?>
        <?php endforeach; ?>
    </div>
</div>
