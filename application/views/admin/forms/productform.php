<?php
	load_css([
		"form"
	]);
?>

<div class="form-box">
	<div class="header">
		<div class="form-headeing">
			<h2><?php echo(lang("product_form")) ?></h2>
		</div>
	</div>
	<div class="content">
		<form id="product_form">

			<?php
			if(!isset($form_data)){
				if(!isset($is_our_manifacture) || $is_our_manifacture!="yes"){
			
			?>
					<div class="field-box" >
						<label><?php echo(lang('product_category')); ?></label>
						<select name="product_category" id="product_category" style="width: 100%">
							<?php 
								if (isset($category_dropdown)) {
									foreach ($category_dropdown as $key => $value) {
										
									
							?>
										<option value="<?php echo($value->id); ?>" <?php if(isset($form_data) && $form_data->product_category==$value->id){echo('selected');} ?>><?php echo($value->category); ?></option>
							<?php
									}	
								} 
							?>
						</select>
					</div>		
			<?php
				}
			?>

			<div class="field-box" >
				<label><?php echo(lang('brands')); ?></label>
				<select name="brand" id="brand" style="width: 100%">
					<?php 
						if (isset($brand_dropdown)) {
							foreach ($brand_dropdown as $key => $value) {
								
							
					?>
								<option value="<?php echo($value->id); ?>" <?php if(isset($form_data) && $form_data->brand_id==$value->id){echo('selected');} ?>><?php echo($value->name); ?></option>
					<?php
							}	
						} 
					?>
				</select>
			</div>
			<?php } else{ ?>
							<input type="hidden" name="product_category" value="<?php echo($form_data->product_category); ?>">
							<input type="hidden" name="brand" value="<?php echo($form_data->brand_id); ?>">
			<?php		
			}?>
			<div class="field-box">
				<label><?php echo(lang('product_name')); ?></label>
				<input type="text" name="product_name" value="<?php if (isset($form_data)) { echo($form_data->product); } ?>" placeholder="<?php echo(lang('product_name')); ?>" >
				<input type="hidden" name="hidden_id" value="<?php if (isset($form_data)) { echo($form_data->id); } ?>">
			</div>

			<div class="field-box">
				<label><?php echo(lang('mrp_price')); ?></label>
				<input type="number" name="mrp_price" value="<?php if (isset($form_data)) { echo($form_data->product_mrp_price); } ?>" placeholder="<?php echo(lang('mrp_price')); ?>">
			</div>

			<div class="field-box">
				<label><?php echo(lang('finale_price')); ?></label>
				<input type="number" name="finale_price" value="<?php if (isset($form_data)) { echo($form_data->product_finale_price); } ?>" placeholder="<?php echo(lang('finale_price')); ?>">
			</div>

			<div class="field-box" >
				<label><?php echo(lang('product_description')); ?></label>
				<textarea name="product_description" placeholder="<?php echo(lang('product_description')); ?>"><?php if (isset($form_data)) { echo($form_data->product_description); } ?></textarea>
			</div>

			<div class="field-box">
				<label><?php echo(lang('discount_available')); ?></label>
				<label class="switch">
				  <input type="checkbox" <?php if (isset($form_data) && $form_data->is_discount==1) { echo("checked"); } ?>  onchange="toogle_discount_des()" id="discount_available" name="discount_available">
				  <span class="slider round"></span>
				</label>
			</div>

			<div class="field-box" id="discount_description" style="display: none;">
				<label><?php echo(lang('discount_description')); ?></label>
				<textarea name="discount_description" placeholder="<?php echo(lang('discount_description')); ?>"><?php if (isset($form_data)) { echo($form_data->discount_statement); } ?></textarea>
			</div>

			<div class="field-box">
				<label><?php echo(lang('stock_is_available')); ?></label>
				<label class="switch">
				  <input type="checkbox" name="stock_is_available" <?php if (isset($form_data) && $form_data->is_in_stock==1) { echo("checked"); } ?>>
				  <span class="slider round"></span>
				</label>
			</div>

			<?php
				if(isset($is_our_manifacture) && $is_our_manifacture=="yes"){
			?>
					<input type="hidden" name="is_our_manifacture" value="1" >						
			<?php
				}
			?>



			<div class="field-box">
				<label><?php echo(lang('product_image')); ?></label>
				<div class="image-drop-box">
					<div class="drop-area" id="drop-area">
						<div class="drop-content">
							<div class="fa fa-upload"></div>
							<div><?php echo(lang('upload_here')) ?></div>
						</div>
						<input type="hidden" name="hidden_id" value="<?php if (isset($form_data)) { echo($form_data->id); } ?>">
						<input type="file" name="file" id="file" onchange="fileValidation(`<?php echo(get_uri('admin_product/upload_image'))?>`)">	
					</div>	
					<input type="hidden" name="image_name" id="image_name" value="<?php if (isset($form_data)) { echo($form_data->image); }else{echo('unavailable.png');} ?>">
					<img id="imagePreview" src="<?php if (isset($form_data) && $form_data->image!='unavailable.png'){ echo(get_images($form_data->image)); }else{echo(get_system_file('unavailable.png'));} ?>">
				</div>
			</div>
		</form>
	</div>
	<div class="footer">
		
		<button class="primary-theme" onclick="send_data('product_form','<?php if(isset($is_our_manifacture) && $is_our_manifacture=="yes"){echo(get_uri('admin_manufacturer/save'));}else{echo(get_uri('admin_product/save'));} ?>')"><?php if (isset($form_data)) { echo(lang('update')); }else{echo(lang('submit'));} ?></button>
	</div>
	
</div>

<script type="text/javascript">

	$(document).ready(function(){
		$("#brand").select2();
		<?php
			if(!isset($is_our_manifacture) || $is_our_manifacture!="yes"){
		?>
		$("#product_category").select2();
		<?php
			}
		?>
		<?php if (isset($form_data) && $form_data->is_discount==1) { echo("toogle_discount_des()"); } ?>
	})
	function toogle_discount_des(){
		if (document.getElementById("discount_available").checked) {
			$("#discount_description").show();
		}else{$("#discount_description").hide();}
	}

	
</script>
