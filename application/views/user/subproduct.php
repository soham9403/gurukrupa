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
	header{
		box-shadow: none;
	}
	
</style>
<main>
	<div class="product_search_bar primary-theme">
		<div class="search_box" id="category_search_box" >
			<label><?php echo(lang("category")) ?></label>
			<select id="category" onchange="set_by_category()">
					<?php 
						if (isset($category_dropdown)) {
							foreach ($category_dropdown as $key => $value) {
							
					?>
								<option value="<?php echo($value->id); ?>" <?php if ($this->session->userdata('product_category')==$value->id):echo "selected"; ?>
									
								<?php endif ?>><?php echo($value->category); ?></option>
					<?php
							}	
						} 
					?>
			</select>
		</div>	
		<div class="search_box">
			<!-- <label><?php echo(lang("view_product")) ?></label>
			<select id="no_of_product" onchange="get_data()">
				<option value="12">12</option>
				<option value="36">36</option>
				<option value="48">48</option>
				<option value="">All</option>
			</select> -->

			 <label><?php echo(lang("brands")) ?></label>
			 <div class="col-md-8 " id="brand-dropdown-section">
               <!--  <?php
                echo form_input(array(
                    "id" => "brand_id",
                 
                    "name" => "brand_id",
                    "class" => "form-control",
                    "placeholder"=> lang("arrange_order"),
                    "onchange"=>"get_data()"
                ));
                ?>    -->                  
            </div>
		</div>
		<div class="search_box" >
			<label><?php echo(lang("arrange_order")) ?></label>
			<select id="order_by_price" onchange="get_data()">
				<option value="lth">Low to High</option>
				<option value="htl" >High to Low</option>
				
			</select>
		</div>	
		<div class="search_box" oninput="get_data()">
	
				<label><?php echo(lang("products")) ?></label>
				<input type="search" name="" id="product_search" placeholder="<?php echo(lang("products")) ?>">
			

		</div>	
	</div>

	<div class="title_row" id="title_of_category">
		<div class="title_box primary-theme">
			
		</div>
		<h1 class="secondary-text" id="title"><?php echo(lang('category'));?></h1>
		<button   onclick="open_form(<?php echo('\''.get_uri('admin_product/modalform').'\''); ?>)" class="primary-theme"><?php echo(lang('add')); ?> <i class="fa fa-plus"></i></button>
	</div>
	<div class="box-row" >
		<div class="product_list" id="product_list">

			



		</div>
	</div>

	

	
</main>

<div id="product_pop_up">
	<div class="product_pop_up">
		
		<div class="product_pop_up_box ">

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
	$("#no_of_product").select2();
	$("#order_by_price").select2();
	$("#category").select2();
	$(document).ready(function(){
		$(".header_link_list li").eq(1).removeClass('hover-theme');
		$(".header_link_list li").eq(1).addClass('primary-theme');
		set_by_category();
	})



	// function pop_up_product(id){
	// 	var offer = $("#"+id).children('.offer_box').html();
	// 	var image = $("#"+id).children('.image_card ').children('.image').attr("src");
	// 	var prodct_title = $("#"+id).children('.prodct_title').html();
	// 	var product_rate = $("#"+id).children('.product_rate').html();
	// 	var product_offer = $("#"+id).children('.descount_description').html();
	// 	var product_description = $("#"+id).children('.product_description').html();
	// 	$(".product_pop_up").children('.product_pop_up_box').children('.image_card').children('.pop_up_product_image').attr('src',image);
	// 	$(".product_pop_up").children('.product_pop_up_box').children('.pop_up_product_title').html(prodct_title);
	// 	$(".product_pop_up").children('.product_pop_up_box').children('.pop_up_description').html(product_description);
	// 	 $(".product_pop_up").children('.product_pop_up_box').children('.pop_up_product_rate').html(product_rate);
	// 	 $(".product_pop_up").children('.product_pop_up_box').children('#pop_up_offer').children("p").html(product_offer);
	// 	var full_pop_up = $("#product_pop_up").html();
	// 	$("#pop_up_box").html(full_pop_up);
	// 	$(".pop_up_container").show();
	// 	$(".product_pop_up").show();
	// }
	function change_brand_list(){
	  var category_id = $("#category").val();
	        
        $.ajax({
            url: "<?php echo get_uri("product/get_brands_dropdown") ?>" ,
            method:"POST",
            data:{"category_id":category_id},
            success: function (result) {
                $("#brand-dropdown-section").html(result);
                $('#brand_id').select2();
                get_data();	            
            }
        });
	}
	function set_by_category() {
		change_brand_list();
		var category = $("#category").val();
		var category_name = $("#category").children("[value="+category+"]").html();
		$("#title").html(category_name);
	}
	function get_data(){
		var category = $("#category").val();
		var limit_first =  $("#page_no").val()?$("#page_no").val():0;
		//var limit_last = $("#no_of_product").val();
		var brand_id = $("#brand_id").val();
		var order_by = $("#order_by_price").val();
		var product = $("#product_search").val();

		create_loader("product_list");
		data = {"category":category,"limit_first":limit_first,"brand_id":brand_id,"order_by":order_by,"product":product};
		$.ajax({
			url : "<?php echo(get_uri('subproduct/get_data')); ?>",
			method:"POST",
			data:data,
			success:function(return_data){
				$("#product_list").html(return_data);
				remove_loader("product_list");	
			}
		})
	}
</script>




