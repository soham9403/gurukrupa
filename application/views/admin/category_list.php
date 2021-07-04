
<?php 

	if(isset($category_list)){
		foreach ($category_list as $key => $value) {
?>
		<div  class="product_box">
					
			<input type="hidden" name="product_category" value="1">
			<div>

				<div class="product_category_box_inner">
					<div class="dlt_btn fa fa-trash-alt" onclick="show_dlt_alert('<?php echo(get_uri('admincategory/delete_data')); ?>',<?php echo($value->id);?>)"></div>
				<div class="update_btn fa fa-edit" id="update_btn" onclick="get_one('<?php echo(get_uri('admincategory/modalform')); ?>',<?php echo($value->id);?>)"></div>
					<div class="image_card">
						<img onload="$(this).siblings('.loader').hide();" class="image" src="<?php
						 if($value->image!='unavailable.png'){
						 	echo(get_images($value->image));
						 }else{
						 	echo(get_system_file($value->image));
						 } ?>">	
						<div class="loader"><img src="<?php echo(get_system_file('loader_small.gif')); ?>">	</div>
					</div>
					<h4><?php echo($value->category); ?></h4>
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

