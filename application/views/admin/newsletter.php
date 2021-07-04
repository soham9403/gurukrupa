<?php
	load_css([
		"form",
	]);
?>
<style type="text/css">
	*{
		box-sizing: border-box;
	}
	.drop-content{
		width: 100%;
		text-align: center;
	}
	#newsletter_box{
		position: relative;
	}
</style>
<main style="margin-top: 120px;">
<div class="form-box"  id="newsletter_box">
	<div class="header">
		<div class="form-headeing">
			<h2><?php echo(lang("newsletter")) ?></h2>
		</div>
	</div>
	<div class="content" >
		<form id="newsletter">

			<div class="field-box" >
				<label><?php echo(lang('subject')); ?></label>
				<textarea name="subject" placeholder="<?php echo(lang('subject')); ?>"></textarea>
			</div>


			<div class="field-box" id="discount_description">
				<label><?php echo(lang('message')); ?></label>
				<textarea rows="10" name="message" placeholder="<?php echo(lang('message')); ?>"></textarea>
			</div>


			<div class="field-box">				
				<label><?php echo(lang('image')); ?></label>
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
		
		<button class="primary-theme" onclick="send_mail()"><?php echo(lang('send')); ?></button>
	</div>
	
</div>	
</main>


<script type="text/javascript">
	$(document).ready(function(){
		$(".header_link_list li").eq(7).removeClass('hover-theme');
		$(".header_link_list li").eq(7).addClass('primary-theme');
	})
	function send_mail(){
		create_loader("newsletter_box");
		var my_form = document.getElementById('newsletter');

		var form_data = new FormData(my_form);
		$.ajax({
			url:"<?php echo(get_uri('newsletter/send')); ?>",
			method:"post",
			data: form_data,
			processData:false,
	        contentType: false, 
			success:function(return_data){
				return_data = JSON.parse(return_data);
				remove_loader("newsletter_box");
		      	if(return_data.status==1){
		      		show_alert(return_data.message);
		      		remove_loader("newsletter_box");
			      }else{
			      	show_alert(return_data.message);
			      	remove_loader("newsletter_box");
			      }
			}
		})
	}
</script>
