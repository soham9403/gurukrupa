

<?php
	load_css([
		"repairing"
	]);
?>
<style type="text/css">
	.title_row {
		box-shadow: 1px 1px 5px black;
	}
	.title_row button{
		float: right;
		margin: 15px 10px;
		padding: 5px 10px;
		border-radius: 5px;
		border: 0px;
		font-size: 15px;
		cursor: pointer;
		box-shadow: 1px 1px 5px black;

	}
	#photo_container{
		position: relative;
		min-height: 450px;
	}
	.repairing_card{
		position: relative;
	}
</style>
<main>
	

	<div class="title_row" id="title_of_category" style="margin-top: 120px;">
		<div class="title_box primary-theme">
			
		</div>
		<h1 class="secondary-text"><?php echo(lang('brands'));?></h1>
		<button   onclick="open_form(<?php echo('\''.get_uri('brands/modalform').'\''); ?>)" class="primary-theme"><?php echo(lang('add')); ?> <i class="fa fa-plus"></i></button>
	</div>
	<div class="box-row">
		<div class="photo_container" id="photo_container">
			

		</div>
	</div>
</main>
	
<script type="text/javascript">
	$(document).ready(function(){
		$(".header_link_list li").eq(4).removeClass('hover-theme');
		$(".header_link_list li").eq(4).addClass('primary-theme');
		get_data();
	})
	function get_data(){
		create_loader("photo_container");
		// data = {"category":category,"limit_first":limit_first,"limit_last":limit_last,"order_by":order_by,"product":product};
		$.ajax({
			url : "<?php echo(get_uri('brands/get_data')); ?>",
			method:"POST",
			// data:data,
			success:function(return_data){
				$("#photo_container").html(return_data);
				remove_loader("photo_container");	
			}
		})
	}
</script>
