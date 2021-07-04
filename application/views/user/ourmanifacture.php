

<?php
	load_css([
		"subproduct"
	]);
?>
<style type="text/css">
	#product_list{
		position: relative;
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


	function get_data(){
		var order_by = "lth";
		create_loader("product_list");
		data = {"order_by":order_by,"is_our_manyfacture":1};
		$.ajax({
			url : "<?php echo(get_uri('product/ourmanifacture_data')); ?>",
			method:"POST",
			data:data,
			success:function(return_data){
				$("#product_list").html(return_data);
				remove_loader("product_list");	
			}
		})
	}
</script>

