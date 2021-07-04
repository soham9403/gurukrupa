<?php 

	if(isset($category_list)){
		foreach ($category_list as $key => $value) {
?>

		<div class="repairing_box">
			<div class="repairing_card"> 
				<div class="dlt_btn fa fa-trash-alt" onclick="show_dlt_alert('<?php echo(get_uri('admin_repairing/delete_data')); ?>',<?php echo($value->id);?>)"></div>
				<div class="update_btn fa fa-edit" id="update_btn" onclick="get_one('<?php echo(get_uri('admin_repairing/modalform')); ?>',<?php echo($value->id);?>)"></div>
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

