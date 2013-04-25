<script type="text/javascript">
    var city_id = 0;


    <?php if(!$profile_form->getObject()->isNew()):?>
        city_id= <?php echo ($profile_form->getObject()->getCityId())?$profile_form->getObject()->getCityId():0; ?>;
    <?php endif; ?>

    function ajaxFun(city_id, ajaxDiv)
    {
        $(ajaxDiv).parent().append('<img src="/images/facebook_loading.gif">');
        $(ajaxDiv).load('<?php echo url_for('user/ajaxZoneAndCity'); ?>', "id="+city_id, function(){ $(ajaxDiv).parent().find('img').remove(); } );
    }

    $(document).ready(function(){
        ajaxFun(city_id, '#user_zone_id');

        $('#user_city_id').change(function (){
            ajaxFun($(this).val(),  '#user_zone_id');
        });
        
     });

</script>
<table>
	
	<?php if ($profile_form->hasErrors()): ?>
        <?php echo $profile_form->renderGlobalErrors(); ?>
    <?php endif; ?>
            
	<form action="<?php echo url_for('user/profileSave') ?>" id="profile-form" method="post">
		<?php echo $profile_form->renderHiddenFields(); ?>
		<tr>
			<td width="100"><?php echo $profile_form['email']->renderLabel(); ?></td>
			<td width="180"><?php echo $profile_form['email']->render(); ?></td>
			<td><?php echo $profile_form['email']->renderError(); ?></td>
		</tr>
		<tr>
			<td><?php echo $profile_form['name']->renderLabel(); ?></td>
			<td><?php echo $profile_form['name']->render(); ?></td>
			<td><?php echo $profile_form['name']->renderError(); ?></td>
		</tr>
		<tr>
			<td><?php echo $profile_form['gender']->renderLabel(); ?></td>
			<td><?php echo $profile_form['gender']->render(); ?></td>
			<td><?php echo $profile_form['gender']->renderError(); ?></td>
		</tr>
		<tr <?php echo (is_null($profile_form['mobile']->getValue()) || $profile_form['mobile']->getValue() == 0)?'class="error"':''; ?>>
			<td><?php echo $profile_form['mobile']->renderLabel(); ?></td>
			<td><?php echo $profile_form['mobile']->render(); ?></td>
			<td><?php echo $profile_form['mobile']->renderError(); ?></td>
		</tr>
		<tr <?php echo (is_null($profile_form['mobile2']->getValue()) || $profile_form['mobile2']->getValue() == 0)?'class="error"':''; ?>>
			<td><?php echo $profile_form['mobile2']->renderLabel(); ?></td>
			<td><?php echo $profile_form['mobile2']->render(); ?></td>
			<td><?php echo $profile_form['mobile2']->renderError(); ?></td>
		</tr>
		<tr <?php echo (is_null($profile_form['city_id']->getValue()) || $profile_form['city_id']->getValue() == 0)?'class="error"':''; ?>>
			<td><?php echo $profile_form['city_id']->renderLabel(); ?></td>
			<td><?php echo $profile_form['city_id']->render(); ?></td>
			<td id="zone_ajax"><label style="margin-right: 40px;">Бүс</label>&nbsp;<?php echo $profile_form['zone_id']->render(); ?></td>
		</tr>
		<tr>
			<td><?php echo $profile_form['address']->renderLabel(); ?></td>
			<td colspan="2"><?php echo $profile_form['address']->render(); ?></td>
		</tr>
		<tr><td></td><td><input class="submit-button" type="submit" value="Хадгалах"/></td></tr>
	</form>
</table>
