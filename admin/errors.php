<?php
	if(count($errors) > 0) :
?>
<div class="error">
	<?php  foreach ($errors as $error) : ?>
		<div class="alert alert-danger alert-dismissible mt20 pb10">
    		<button type="button" class="close" data-dismiss="alert">&times;</button>
    		<strong>Error! </strong><?php echo $error; ?>
  		</div>
	<?php endforeach ?>
</div>
<?php endif ?>
