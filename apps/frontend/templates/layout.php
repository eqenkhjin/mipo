<!DOCTYPE html>
<html>
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
<!--    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Comfortaa">-->
  </head>
  <body>
        <div class="container">
            <?php // include_partial('public/header', array('mipo' => 'Social Network')) ?>
            <?php include_component('public', 'header'); ?>
            
            <div id="body">
                
                <div class="row">
                    <div class="span8 offset05 bgWhite main-container">
                        <?php if($sf_user->isAuthenticated()): ?>
                            <?php include_component('public', 'notification'); ?>
                        <?php endif; ?>
                        
                        <?php echo $sf_content; ?>
                    </div>
                    <br class="clear" />
                </div>
            </div>
            <br class="clear" />
        </div>
<!--        <div class="footer">
            <?php include_component('public', 'footer'); ?>
        </div>-->
  </body>
</html>
