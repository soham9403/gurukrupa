<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<?php
	load_css([
		"subproduct"
	]);
?>
<style type="text/css">
	#product_list{
		position: relative;
	}
	.button_box div{
		display: inline-block;
		width: 49%;
		padding: 5px;
		margin-top: 5px;
	}
	.button_box div button{
		margin: 0px;
		display: inline-block;
		width: 45%;
		vertical-align: text-bottom;
	}
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
</style>
<div class="title_row" id="title_of_category" style="margin-top: 120px;">
		<div class="title_box primary-theme">
			
		</div>
		<?php if (isset($out_of_stock_page)) {
			?>
			<h1 class="secondary-text"><?php echo(lang('out_of_stock'));?></h1>
			<?php

			
		}else{
			?>
				<h1 class="secondary-text"><?php echo(lang('our_manifacture'));?></h1>
				<button   onclick="open_form(<?php echo('\''.get_uri('admin_manufacturer/modalform').'\''); ?>)" class="primary-theme"><?php echo(lang('add')); ?> <i class="fa fa-plus"></i></button>

			<?php
		} ?>
		
	</div>
	<div class="box-row" >
		<div class="product_list" id="product_list">

				
		</div>
	</div>

	

	
</main>
<div id="product_pop_up">
	<div class="product_pop_up">
		<div class="product_pop_up_box ">
			<!-- <div class="terms_and_condition primary-theme">
				<input type="hidden" id="terms_condition_check" value="0">
	    		<input type="checkbox"  onchange="accepet_terms_and_condition()"><a href=""><?php echo(lang("terms_condition")); ?></a>
	    	</div> -->
			<div class="image_card">
				<img onload="$(this).siblings('.loader').hide();" class="pop_up_product_image" src="<?php echo(get_system_file('logo.png')); ?>">	
				<div class="loader"><img src="<?php echo(get_system_file('loader_small.gif')); ?>">	</div>
			</div>
			<h4 class="pop_up_product_title"></h4>

	    	<div class="pop_up_product_rate" style="display: block;">
	    	
	    	</div>
	    	<fieldset class="theme-dashed-border" id="pop_up_offer">
	    		<legend class="primary-theme"> <?php echo(lang("products_on_offer")); ?></legend>
	    		<p>sdfsdfdsf sdfnsdf sdjfsd</p>
	    	</fieldset>
	    	<pre class="pop_up_description"></pre>

	    	<!-- <button class="primary-theme" id="cart_btn" disabled="true"><?php echo(lang('add_to_cart')) ?></button> -->
		</div>
	</div>	
</div>
<script type="text/javascript">
	$(document).ready(function(){
		<?php if (isset($out_of_stock_page)) {
		?>
$(".header_link_list li").eq(6).removeClass('hover-theme');
		$(".header_link_list li").eq(6).addClass('primary-theme');

	<?php }else{ ?>
		$(".header_link_list li").eq(2).removeClass('hover-theme');
		$(".header_link_list li").eq(2).addClass('primary-theme');

	<?php } ?>
		get_data();
	})



	function pop_up_product(id){
		var offer = $("#"+id).children('.offer_box').html();
		var image = $("#"+id).children('.image_card ').children('.image').attr("src");
		var prodct_title = $("#"+id).children('.prodct_title').html();
		var product_rate = $("#"+id).children('.product_rate').html();
		var product_offer = $("#"+id).children('.descount_description').html();
		var product_description = $("#"+id).children('.product_description').html();
		$(".product_pop_up").children('.product_pop_up_box').children('.image_card').children('.pop_up_product_image').attr('src',image);
		$(".product_pop_up").children('.product_pop_up_box').children('.pop_up_product_title').html(prodct_title);
		$(".product_pop_up").children('.product_pop_up_box').children('.pop_up_description').html(product_description);
		 $(".product_pop_up").children('.product_pop_up_box').children('.pop_up_product_rate').html(product_rate);
		 $(".product_pop_up").children('.product_pop_up_box').children('#pop_up_offer').children("p").html(product_offer);
		var full_pop_up = $("#product_pop_up").html();
		$("#pop_up_box").html(full_pop_up);
		$(".pop_up_container").show();
		$(".product_pop_up").show();
	}

	function get_data(){
		var order_by = "lth";
		create_loader("product_list");
		data = {"order_by":order_by,"is_our_manyfacture":1};
		$.ajax({
			url : "<?php if(isset($out_of_stock_page)){echo(get_uri('admin_product/get_out_of_stock_data'));}else{echo(get_uri('admin_manufacturer/get_data'));} ?>",
			method:"POST",
			data:data,
			success:function(return_data){
				$("#product_list").html(return_data);
				remove_loader("product_list");	
			}
		})
	}
</script>

