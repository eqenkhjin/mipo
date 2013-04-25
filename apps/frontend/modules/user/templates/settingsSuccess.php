	<?php use_stylesheet('template/about-us.less', "", array('rel' => 'stylesheet/less')); ?>

	<script type="text/javascript">
		$(document).ready(function(){
			$tabs = $('#user-profile-tabs');
			$tabs_container = $('#user-profile-tab-container');
			
			$tabs.find('li a').click(function(){
				$tabs.find('li').removeClass('active');
				$active_container = $(this).attr('href');
				
				$tabs_container.find('> div').hide('fast');
				
				$($active_container).fadeIn();
				
				$(this).parent().addClass('active');
				return false;
			});
			
			$('.msg').fadeOut( 4000, function(){ $(this).remove(); });
		});
	</script>

    <div class="content-body">
        <div class="text-partial width100">
            <h1>
            	Хувийн тохиргоо
    			<?php if($sf_user->hasFlash('success')): ?>
	            	<div class="msg success">
						<?php echo $sf_user->getFlash('success'); ?>
	            	</div> 
				<?php endif; ?>
    			<?php if($sf_user->hasFlash('error')): ?>
	            	<div class="msg error">
						<?php echo $sf_user->getFlash('error'); ?>
	            	</div> 
				<?php endif; ?>
            </h1>

            <div class="left" id="user-profile-tabs">
                <ul>
                	<li <?php echo ($sf_user->hasFlash('password_error'))?'':'class="active"'; ?>><a href="#change_profile">Хувийн мэдээлэл </a></li>
                	<li <?php echo ($sf_user->hasFlash('password_error'))?'class="active"':''; ?>><a href="#change_password">Нууц үг өөрчлөх</a></li>
                </ul>
            </div><!-- left end. -->

            <div class="right" id="user-profile-tab-container">
            	<div id="change_profile"  <?php echo ($sf_user->hasFlash('password_error'))?'style="display: none;"':''; ?>>
            		<?php include_partial('user/profileForm', array('profile_form' => $profile_form)) ?>
            	</div>
            	<div id="change_password" <?php echo ($sf_user->hasFlash('password_error'))?'style="display: block;"':''; ?>>
            		<?php include_partial('user/changePasswordForm', array('password_form' => $password_form)) ?>
            	</div>
            </div><!-- right end. -->
        </div><!-- text-partial end. -->

    </div><!-- content-body end. -->
