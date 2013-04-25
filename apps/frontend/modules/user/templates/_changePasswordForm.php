<table>
		
	<?php if ($password_form->hasErrors()): ?>
        <?php echo $password_form->renderGlobalErrors(); ?>
    <?php endif; ?>
            

<form action="<?php echo url_for('user/changePasswordSave'); ?>" method="post">
	<tr class="first">
		<td width="200">
			<?php echo $password_form->renderHiddenFields(); ?>
			<?php echo $password_form['password']->renderLabel(); ?>
		</td>
		<td><?php echo $password_form['password']->render(); ?></td>
		<td><?php echo $password_form['password']->renderError(); ?></td>
	</tr>
	<tr>
		<td><?php echo $password_form['password_new']->renderLabel(); ?></td>
		<td><?php echo $password_form['password_new']->render(); ?></td>
		<td><?php echo $password_form['password_new']->renderError(); ?></td>
	</tr>
	<tr>
		<td><?php echo $password_form['password_new_again']->renderLabel(); ?></td>
		<td><?php echo $password_form['password_new_again']->render(); ?></td>
		<td><?php echo $password_form['password_new_again']->renderError(); ?></td>
	</tr>
	<tr><td></td><td><input class="submit-button" type="submit" value="Хадгалах"/></td></tr>
</form>
</table>