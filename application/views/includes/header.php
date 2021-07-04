<header>
	<div class="info_box primary-theme">
		<div class="row">
			<div class="left_align" >
				<b><?php echo(lang('gst_no')) ?> : </b> <span><?php echo(lang('gst_no_numeric')) ?> </span>
			</div>
			<div class="right_align " style="vertical-align: text-top;">
				<b><?php echo(lang('owner_name')) ?> </b>
			</div>	
		</div>		
	</div>
	<nav class="normal-theme">
		<div class="header_image">
			<a href="<?php echo(get_uri('home')); ?>"><img src="<?php echo(get_system_file('logo.png')) ?>"></a>
		</div>
		<div class="bar-icon">
			<i class="fa fa-bars"></i>
		</div>
		<?php if (isset($is_admin) && $is_admin==1) { ?>	
			<ul class="header_link_list normal-theme">
				<a href="<?php echo(get_uri('admincategory')); ?>"><li class="hover-theme"><?php echo(lang('category')) ?> </li></a>
				<a href="<?php echo(get_uri('admin_product')); ?>"><li class="hover-theme"><?php echo(lang('products')) ?> </li></a>
				<a href="<?php echo(get_uri('admin_manufacturer')); ?>"><li class="hover-theme"><?php echo(lang('our_manifacture')) ?> </li></a>
				<a href="<?php echo(get_uri('admin_repairing')); ?>"><li class="hover-theme"><?php echo(lang('repairing')) ?> </li></a>
				<a href="<?php echo(get_uri('brands')); ?>"><li class="hover-theme"><?php echo(lang('brands')) ?> </li></a>
				<a href="<?php echo(get_uri('achievements')); ?>"><li class="hover-theme"><?php echo(lang('achievements')) ?> </li></a>
				<a href="<?php echo(get_uri('admin_product/outofstockpage')); ?>"><li class="hover-theme"><?php echo(lang('out_of_stock')) ?> </li></a>

				<a href="<?php echo(get_uri('newsletter')); ?>"><li class="hover-theme"><?php echo(lang('newsletter')) ?> </li></a>
				<a ><li style="box-shadow: 1px 1px 5px black;border-radius: 2px;cursor: pointer;" class="hover-theme" id="log_out"><?php echo(lang('log_out')) ?> </li></a>
			</ul>	
			<script type="text/javascript">
				$("#log_out").on('click',function(){
					$.ajax({
						url:"<?php echo(get_uri('login/logout')); ?>",
						method:'POST',
						data:{'log_out':'yes'},
						success:function(){
							window.location.href = "<?php echo(get_uri('login')) ?>";
						}
					})
				})
			</script>	
			
		<?php }else{ ?>
			<ul class="header_link_list normal-theme">
				<a href="<?php echo(get_uri('home')); ?>"><li class="hover-theme"><?php echo(lang('home')) ?> </li></a>
				<a href="<?php echo(get_uri('product')); ?>"><li class="hover-theme"><?php echo(lang('products')) ?> </li></a>
				<a href="<?php echo(get_uri('product/ourmanifacture')); ?>"><li class="hover-theme"><?php echo(lang('our_manifacture')) ?> </li></a>
				<a  href="<?php echo(get_uri('repairing')); ?>" ><li class="hover-theme"><?php echo(lang('repairing')) ?> </li></a>
			</ul>
		<?php } ?>
	</nav>
</header>




<div class="pop_up_container">
	<div class="pop_up_bar primary-theme">
		<i class="fa fa-times" onclick="hide_popup()"></i>
	</div>
	<div class="pop_up_box" id="pop_up_box">
	
	</div>
</div>
<div class="pop_up_alert_container">
	<div class="pop_up_box" id="pop_up_alert_box">
		<div class="primary-theme header">
			<span id="alert_msg_heading"></span><i class="fa fa-times"  onclick="hide_alert()"></i>
		</div>
		<div class="content">
			<h3 id="alert_msg"></h3>
			<p id="alert_msg_des"></p>
		</div>
		<div class="footer ">
			<button onclick="hide_alert()" class="primary-theme"><?php echo(lang('ok')); ?></button>
		</div>
	</div>
</div>


