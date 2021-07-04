<?php 

	if(isset($category_list)){
		foreach ($category_list as $key => $value) {
?>

		<div class="repairing_box">
			<div class="repairing_card"> 
				<div class="dlt_btn fa fa-trash-alt" onclick="show_dlt_alert('<?php if(isset($brands_page)){echo(get_uri('brands/delete_data'));}else{echo(get_uri('achievements/delete_data'));} ?>',<?php echo($value->id);?>)"></div>
				<div class="update_btn fa fa-edit" id="update_btn" onclick="get_one('<?php if(isset($brands_page)){echo(get_uri('brands/modalform'));}else{echo(get_uri('achievements/modalform'));} ?>',<?php echo($value->id);?>)"></div>
				<div class="image_card" title="<?php echo($value->name); ?>">
					<img src="<?php
						 if($value->image!='unavailable.png'){
						 	echo(get_images($value->image));
						 }else{
						 	echo(get_system_file($value->image));
						 } ?>"/>
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

