


<?php
	load_css([
		"repairing"
	]);
?>
<style type="text/css">
	
	#photo_container{
		position: relative;
		min-height: 450px;
	}
</style>
<main>
	

	<div class="title_row" id="title_of_category" style="margin-top: 120px;">
		<div class="title_box primary-theme">
			
		</div>
		<h1 class="secondary-text"><?php echo(lang('repairing'));?></h1>
	</div>
	<div class="box-row">
		<div class="note-box theme-dashed-border">
			<p><?php echo(lang('repairing_content')) ?></p>
			<p class="con2">
				<b style="margin-top: 5px;display: inline-block;">For Repairing : </b> 
				<a href="tel:9979939185"><button><i style="transform: rotateZ(90deg);" class="fa fa-phone"> </i> <?php echo(lang("call_us")); ?></button></a>
			</p>			
		</div>
		<div class="photo_container" id="photo_container">
			

		</div>
	</div>
</main>
	
<script type="text/javascript">
	$(document).ready(function(){
		$(".header_link_list li").eq(3).removeClass('hover-theme');
		$(".header_link_list li").eq(3).addClass('primary-theme');
		get_data();
	})
	function get_data(){
		create_loader("photo_container");
		// data = {"category":category,"limit_first":limit_first,"limit_last":limit_last,"order_by":order_by,"product":product};
		$.ajax({
			url : "<?php echo(get_uri('repairing/get_data')); ?>",
			method:"POST",
			// data:data,
			success:function(return_data){
				$("#photo_container").html(return_data);
				remove_loader("photo_container");	
			}
		})
	}
</script>
<!--  -->