
<?php
	load_css([
		"home",		
	]);
?>
<style type="text/css">
	



</style>
<main>
	<div class="box-row">

		<div class="title">
			<div class="title_image_box">
				<img onload="$(this).siblings('.loader').hide();" class="image" src="<?php echo(get_system_file('logo.png')); ?>">	
				<div class="loader"><img src="<?php echo(get_system_file('loader_small.gif')); ?>">	</div>
			</div>
			<h1 class="primary-text"><?php echo(lang('company_name')) ?></h1>
			<hr class="primary-theme">
		</div>
	</div>
	<div class="title_row">
		<div class="title_box primary-theme">
			
		</div>
		<h1 class="secondary-text"><?php echo(lang('achievements'));?></h1>
	</div>
	<div class="box-row">
		<div class="swiper-container" id="achievements">
		    <!-- Additional required wrapper -->
		    <div class="swiper-wrapper">
		        <!-- Slides -->
		        <?php 
			        if(isset($achievements_list)){
			        	foreach ($achievements_list as $key => $value) {
		        ?>
		        			<div class="swiper-slide">
					        	<div class="achievement_image_card" >
					        		<img onload="$(this).siblings('.loader').hide();" class="image" src="<?php  
					        		if($value->image!='unavailable.png'){
									 	echo(get_images($value->image));
									 }else{
									 	echo(get_system_file($value->image));
									 } ?>">	
									<div class="loader"><img src="<?php echo(get_system_file('loader_small.gif')); ?>">	</div>
					        	</div>
					        </div>

		        <?php
			        	}
			        } 
		        ?>
		        
		    </div>
		    <!-- If we need pagination -->
		    <div class="swiper-pagination" style="bottom: -10px;"></div>

		    <!-- If we need navigation buttons -->
		    <div class="swiper-button-prev"></div>
		    <div class="swiper-button-next"></div>
		</div>

		<div class="specialities theme-border">
			<div class="specialities_box primary-text">
				<i class="fa fa-motorcycle"></i><span><b><?php echo(lang('Free_delivery')); ?></b>above &#8377; 4000 </span>
			</div>
			<div class="specialities_box primary-text">
				<i class="fa fa-motorcycle"></i><span><b><?php echo(lang('Free_delivery')); ?></b>In 5km </span>
			</div>
			<div class="specialities_box primary-text">
				<i class="fa fa-certificate"></i><span><b><?php echo(lang('best')); ?></b><?php echo(lang('Services')); ?></span>
			</div>
			<div class="specialities_box primary-text">
				<i class="far fa-thumbs-up"></i><span><b><?php echo(lang('only_best')); ?></b><?php echo(lang('brands')); ?></span>
			</div>
		</div>
	</div>

	<div class="title_row">
		<div class="title_box primary-theme">
			
		</div>
		<h1 class="secondary-text"><?php echo(lang('products_on_offer'));?></h1>
	</div>


	<div class="box-row">
		<div class="swiper-container" id="offers">
		    <!-- Additional required wrapper -->
		    <div class="swiper-wrapper">
		        <!-- Slides -->
		         <?php 
			        if(isset($offer_list)){
			        	foreach ($offer_list as $key => $value) {
		        ?>
		        <div class="swiper-slide">
		        	<div class="product_card" id="<?php echo($value->product_id); ?>">
		                <?php if($value->is_discount==1){ ?>
		                    <div class="offer_box primary-offer-theme"><i class="fa fa-gift"></i> <?php echo(lang("offer_available")); ?><div></div></div>
		                <?php } ?>
		                <div class="image_card" >
		                    <img onload="$(this).siblings('.loader').hide();" class="image" src="<?php
		                         if($value->image!='unavailable.png'){
		                            echo(get_images($value->image));
		                         }else{
		                            echo(get_system_file($value->image));
		                         } ?>"> 
		                    <div class="loader"><img src="<?php echo(get_system_file('loader_small.gif')); ?>"> </div>
		                </div>
		                <h4 class="prodct_title"><?php echo($value->product); ?></h4>
		                <p class="product_rate">
		                    <span class="current-price">&#8377; <?php echo($value->product_finale_price); ?></span> 
		                    <?php
		                        if (isset($value->product_mrp_price) && $value->product_mrp_price!="" && $value->product_mrp_price!=0) {
		                    ?>
		                            - <del class="mrp-price">&#8377; 400</del>
		                    <?php       
		                        }   
		                    ?>
		                     
		                </p>
		                <p style="display: none;" class="product_description"><?php echo($value->product_description); ?></p>
		                <p style="display: none;" class="descount_description">
		                <?php
		                    if($value->is_discount==1 && $value->discount_statement!=""){
		                        echo($value->discount_statement);
		                    }else{
		                ?>
		                        <i class="fa fa-ban" aria-hidden="true"></i> NO Offer avialable
		                <?php
		                    }
		                ?>
		                </p>
		                <div class="button_box">
		                    <button class="primary-theme"  onclick="pop_up_product('<?php echo($value->product_id) ?>')"><?php echo(lang('view_more')) ?></button>  
		                   <a href="tel:9979939185"><button class="succeess-theme" > <i class="fa fa-phone" style="transform: rotateZ(90deg);margin: 1px;"></i> <?php echo(lang('call_us')) ?></button></a>
		                </div>
		            </div>
		        	
		        </div>
		        <?php 
			        	}
			        }
		         ?>		  
		    </div>
		    <!-- If we need pagination -->
		    <div class="swiper-pagination" style="bottom: -10px;"></div>

		    <!-- If we need navigation buttons -->
		    <div class="swiper-button-prev"></div>
		    <div class="swiper-button-next"></div>
		</div>
	</div>




	<div class="title_row">
		<div class="title_box primary-theme">
			
		</div>
		<h1 class="secondary-text"><?php echo(lang('our_brands'));?></h1>
	</div>


	<div class="box-row">
		<div class="swiper-container" id="our_brands">
		    <!-- Additional required wrapper -->
		    <div class="swiper-wrapper">
		        <!-- Slides -->
		        <?php 
			        if(isset($brands_list)){
			        	foreach ($brands_list as $key => $value) {
		        ?>
				        <div class="swiper-slide">
				        	<div class="brands_card">
				        		<div class="image_card" >
					        		<img onload="$(this).siblings('.loader').hide();" class="image" src="<?php
										 if($value->image!='unavailable.png'){
										 	echo(get_images($value->image));
										 }else{
										 	echo(get_system_file($value->image));
										 } ?>">	
									<div class="loader"><img src="<?php echo(get_system_file('loader_small.gif')); ?>">	</div>
								</div>			    
				        	</div>		        	
				        </div>
		        <?php
				    	}
				    }
		        ?>
		    </div>
		    <!-- If we need pagination -->
		    <!-- <div class="swiper-pagination" style="bottom: -10px;"></div>	 -->
		    <div class="swiper-button-prev"></div>
		    <div class="swiper-button-next"></div>
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
		create_responsive_slider("achievements",5);
		create_responsive_slider("offers",5,3,2);
		create_responsive_slider("best_seller",5);
		create_responsive_slider("our_brands",4);
		$(".header_link_list li").eq(0).removeClass('hover-theme');
		$(".header_link_list li").eq(0).addClass('primary-theme');
	})
	$(window).on('resize',function(){
		create_responsive_slider("achievements",5);
		create_responsive_slider("offers",5);
		create_responsive_slider("best_seller",5);
		create_responsive_slider("our_brands",5);
	})

	
	
		
</script>