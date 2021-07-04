
<?php 

	if(isset($category_list)){
		foreach ($category_list as $key => $value) {
?>
		<form action="<?php echo(get_uri('subproduct')) ?>" method="post" class="product_box">
			<input type="hidden" name="product_category" value="<?php echo($value->id);?>">
			<button>
				<div class="product_category_box_inner">
					<div class="image_card">
						<img onload="$(this).siblings('.loader').hide();" class="image" src="<?php
						 if($value->image!='unavailable.png'){
						 	echo(get_images($value->image));
						 }else{
						 	echo(get_system_file($value->image));
						 } ?>">	
						<div class="loader"><img src="<?php echo(get_system_file('loader_small.gif')); ?>">	</div>
					</div>
					<h2><?php echo($value->category); ?></h2>
				</div>
			</button>
		</form>
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