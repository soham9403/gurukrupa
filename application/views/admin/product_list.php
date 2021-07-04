
<style type="text/css">
    #page_no{
        width: 350px;
    }@media only screen and (max-width: 450px)
    {
        #page_no{
            width: 250px;
            margin-top: 10px;
            display: block;
        }
    }
</style>
<?php 

	if(isset($category_list)){
		if(isset($total_row) && $total_row>$max_product){
            $len = ceil($total_row/$max_product);
 ?>

                <div class="box-row">
                    <label class="primary-text" style="margin-right: 10px;margin-bottom: 5px;display: inline-block;"><?php echo "Page No:"; ?></label>
                    <select id="page_no" onchange="get_data()" >
                        <?php

                            for ($i=1; $i<=$len ; $i++) {                             
                        ?>
                        <option value="<?php echo(($i-1)*$max_product); ?>" <?php if(($i-1)*$max_product==$limit_first){echo("selected");} ?>><?php echo $i; ?></option>

                        <?php
                            }
                        ?>
                    </select>
                </div>
                <script type="text/javascript">
		            $("#page_no").select2({minimumResultsForSearch:-1});
		        </script>

 <?php  

         }     
		foreach ($category_list as $key => $value) {
?>

		<div class="product_list_box">
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
					<div class="loader"><img src="<?php echo(get_system_file('loader_small.gif')); ?>">	</div>
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
			    	<div >
			    		<button class=" fa fa-edit succeess-theme" id="update_btn" onclick="get_one('<?php if(isset($is_our_manifacture) && $is_our_manifacture=="yes"){echo(get_uri('admin_manufacturer/modalform'));}else{echo(get_uri('admin_product/modalform'));} ?>',<?php echo($value->id);?>)"></button>
			    		<button class=" fa fa-trash-alt danger-theme"  onclick="show_dlt_alert('<?php if(isset($is_our_manifacture) && $is_our_manifacture=="yes"){echo(get_uri('admin_manufacturer/delete_data'));}else{echo(get_uri('admin_product/delete_data'));} ?>',<?php echo($value->id);?>)"></button>
			    	</div>
		    	</div>
			</div>
		</div>

<?php
		}
	}else{
?>
			<div class="no_data_found">
				<h1><?php echo(lang("no_data")) ?></h1>
			</div>
<?php		
	}


 ?>