<?php
	load_css([
		"product"
	]);
?>
<style type="text/css">
	.category_box{
		box-shadow: 1px 1px 5px black;
	}
	.category_box input{

	}
	.category_box button{
		padding: 7px 10px;
		border-radius: 5px;
		margin-right: 10px;
		border: 0px;
		cursor: pointer;
		box-shadow: 1px 1px 3px black;
	}
	.category_box button:hover{
		box-shadow: 1px 1px 0px black;
		}
		.category_box input::-webkit-input-placeholder { /* Edge */
		  color: white;
		}

		.category_box input:-ms-input-placeholder { /* Internet Explorer 10-11 */
		  color: white;
		}

		.category_box input::placeholder {
		  color: white;
		}
</style>
<main>
	<div class="category_box " style="text-align: right;">
		<button class="primary-theme" onclick="open_form(<?php echo('\''.get_uri('admincategory/modalform').'\''); ?>)"><?php echo(lang('add')."\t"); ?><i class="fa fa-plus"></i></button>
		<input type="search" oninput="get_data()" name="" id="serch_category" class="primary-theme"placeholder="<?php echo(lang('serch_category')); ?>">
		
	</div>

	<div class="box-row" >
		<div class="product_category_container" id="data_box">			
		</div>
	</div>
</main>
<script type="text/javascript">
	$(document).ready(function(argument) {
		$(".header_link_list li").eq(0).removeClass('hover-theme');
		$(".header_link_list li").eq(0).addClass('primary-theme');
		get_data();
	})
	document.addEventListener('contextmenu', function(e) {
	  e.preventDefault();
	  // alert('s');
	});
	window.addEventListener('keydown',function(e){
		if(e.which === 85 || e.which === 123){
		    return false;
		}
	})
	
	function get_data(){
		
		create_loader("data_box");
		var val = $("#serch_category").val();
		data = {"like":val};
		$.ajax({
			url : "<?php echo(get_uri('admincategory/get_data')); ?>",
			method:"POST",
			data:data,
			success:function(return_data){
				$("#data_box").html(return_data);
				remove_loader("data_box");	
			}
		})
	}


</script>