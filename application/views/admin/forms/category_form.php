<?php
	load_css([
		"form"
	]);
?>



<div class="form-box">
	<div class="header">
		<div class="form-headeing">
			<h2><?php echo(lang("category_form")) ?></h2><!-- <i class="fa fa-times"></i> -->
		</div>
	</div>
	<div class="content">
		<form action="" id="category_form" method="POST"  onsubmit="return false;">
			<div class="field-box">
				<label><?php echo(lang('category_name')); ?></label>
				<input type="text" value="<?php if (isset($form_data)) { echo($form_data->category); } ?>" name="category_name" placeholder="<?php echo(lang('category_name')); ?>">
			</div>
			<div class="field-box">
				<label><?php echo(lang('category_image')); ?></label>
				<div class="image-drop-box">
					<div class="drop-area" id="drop-area">
						<div class="drop-content">
							<div class="fa fa-upload"></div>
							<div><?php echo(lang('upload_here')) ?></div>
						</div>
						<input type="hidden" name="hidden_id" value="<?php if (isset($form_data)) { echo($form_data->id); } ?>">
						<input type="file" name="file" id="file" onchange="fileValidation(`<?php echo(get_uri('admincategory/upload_image'))?>`)">	
					</div>	
					<input type="hidden" name="image_name" id="image_name" value="<?php if (isset($form_data)) { echo($form_data->image); }else{echo('unavailable.png');} ?>">
					<img id="imagePreview" src="<?php if (isset($form_data) && $form_data->image!='unavailable.png') { echo(get_images($form_data->image)); }else{echo(get_system_file('unavailable.png'));} ?>">
				</div>
			</div>

			
		</form>
	</div>
	<div class="footer">
		<button class="primary-theme" onclick="send_data('category_form','<?php echo(get_uri('admincategory/save')) ?>')"><?php if (isset($form_data)) { echo(lang('update')); }else{echo(lang('submit'));} ?></button>
	</div>
	
</div>
<script type="text/javascript">
	
</script>