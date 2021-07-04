<?php 

	if(isset($category_list)){
		foreach ($category_list as $key => $value) {
?>

		<div class="repairing_box">
			<div class="repairing_card"> 
				<div class="image_card">
					<img src="<?php
						 if($value->image!='unavailable.png'){
						 	echo(get_images($value->image));
						 }else{
						 	echo(get_system_file($value->image));
						 } ?>">
				</div>
				<div class="content">
					<h3><?php echo($value->name); ?></h3>						
				</div>
			</div>
		</div>
<?php
		}
	}else{
?>
			<div class="no_data_found">
				<h1><?php echo(lang("no_data")) ?></h1>
			</div>
<?php		
	}


 ?>

