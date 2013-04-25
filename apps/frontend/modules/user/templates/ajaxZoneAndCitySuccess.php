<?php foreach ($city->getJimZone() as $key=> $zone) :?>
	<option value="<?php echo $zone->getId() ?>" <?php echo ($zone->getId() == $user_zone_id)?'selected':''; ?>><?php echo $zone->getName(); ?></option>
<?php endforeach; ?>
