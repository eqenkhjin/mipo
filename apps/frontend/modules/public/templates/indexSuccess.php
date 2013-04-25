
<?php include_partial('public/homePostForm'); ?>

<div class="row">
    
    <?php include_partial('public/search'); ?>
    
    <div class="wall-container">
        <?php foreach($posts as $post): ?>
        <?php include_partial('public/wallItem', array('user' => $post->getAmUser(), 'post' => $post)) ?>
        <?php endforeach; ?>
    </div>
</div>
