<footer>
	<?php if (!isset($is_admin) || $is_admin!=1) { ?>	
	<div class="signup_box primary-theme">
		<b>Being Updated </b>  By just joining us
		<div class="newsletter" id="news">
			<input type="email" name="email" id="newsletter_email" placeholder="<?php echo(lang('your_email')); ?>">
			<button class="fa fa-telegram hover-dark-theme" id="add_email"></button>
		</div>
	</div>
	<div class="main_footer">
		<div class="contact_us">
			<h2><?php echo(lang("contact_us")); ?></h2>
			<hr class="primary-theme">
			<div class="branch_box">
				<a >				
					<h3><i class="fa fa-map-marker"></i> <?php echo(lang("company_name")); ?></h3>				
				</a>
				<ul>
					<a href="tel:9979939185" class="hover-text-theme" title=""><li><i class="fa fa-phone" style="transform: rotateZ(90deg);"></i> <span><?php echo(lang('call_us')); ?></span></li></a>
					<a target="_blank" href="https://wa.me/919979939185" class="hover-text-theme" title=""><li><i class="fa fa-whatsapp"></i> <span><?php echo(lang('whatsapp_us')); ?></span></li></a>
					<a target="_blank" href="https://www.google.com/maps/place/%E0%AA%97%E0%AB%81%E0%AA%B0%E0%AB%81%E0%AA%95%E0%AB%83%E0%AA%AA%E0%AA%BE+%E0%AA%87%E0%AA%B2%E0%AB%87%E0%AA%95%E0%AB%8D%E0%AA%9F%E0%AB%8D%E0%AA%B0%E0%AB%80%E0%AA%95%E0%AA%B2%E0%AB%8D%E0%AA%B8+%26+%E0%AA%B8%E0%AA%B0%E0%AB%8D%E0%AA%B5%E0%AA%BF%E0%AA%B8/@22.3247926,73.1549198,17z/data=!3m1!4b1!4m5!3m4!1s0x395fc8ea19a1924d:0x94ace4143027cf3d!8m2!3d22.3247926!4d73.1571085" class="branch_name hover-text-theme" title="click for location"><li><i class="fa fa-map-marker"></i> <span><?php echo(lang('our_location')); ?></span></li></a>
				</ul>
			</div>
			<!-- <div class="branch_box">
				<a href="https://www.google.com/maps/place/%E0%AA%89%E0%AA%AE%E0%AA%BF%E0%AA%AF%E0%AA%BE+%E0%AA%88%E0%AA%B2%E0%AB%87%E0%AA%95%E0%AB%8D%E0%AA%9F%E0%AB%8D%E0%AA%B0%E0%AA%BF%E0%AA%95%E0%AA%B2%E0%AB%8D%E0%AA%B8/@22.342692,73.1851037,19.15z/data=!4m12!1m6!3m5!1s0x395fcf2bd02f0913:0xeea3c7144be1c7d8!2z4KqJ4Kqu4Kq_4Kqv4Kq-IOCqiOCqsuCrh-CqleCrjeCqn-CrjeCqsOCqv-CqleCqsuCrjeCquA!8m2!3d22.342523!4d73.185581!3m4!1s0x395fcf2bd02f0913:0xeea3c7144be1c7d8!8m2!3d22.342523!4d73.185581" class="branch_name hover-text-theme" title="click for location">				
					<h3><i class="fa fa-map-marker"></i> <?php echo(lang("company_name2")); ?></h3>				
				</a>
				<ul>
					<a href="tel:9898754242" class="hover-text-theme" title=""><li><i class="fa fa-phone" style="transform: rotateZ(90deg);"></i> <span><?php echo(lang('call_us')); ?></span></li></a>
					<a href="https://wa.me/919898754242" class="hover-text-theme" title=""><li><i class="fa fa-whatsapp"></i> <span><?php echo(lang('whatsapp_us')); ?></span></li></a>
				</ul>
			</div> -->

		</div>
		<div class="product_list">
			<h2><?php echo(lang("products")); ?></h2>
			<hr class="primary-theme">
			<ul>

				<?php if(isset($category_dropdown)){ 

						foreach ($category_dropdown as $key => $value) {

					?>
				<a  class="hover-text-theme">
					<li>
						<form method="POST" action="<?php echo get_uri("subproduct"); ?>">
							<input type="hidden" name="product_category" value="<?php echo($value->id) ?>">
							<button class="hover-text-theme" ><?php echo $value->category; ?></button>
						</form>
					</li>
				</a>
				<?php } 
				} ?>
			</ul>
		</div>
		<div class="owner_list">
			<h2><?php echo(lang("owners")); ?></h2>
			<hr class="primary-theme">
			<div class="branch_box">
				<a class="branch_name hover-text-theme" title="click for location">				
					<h3><i class="fa fa-user"></i> <?php echo(lang("owner_name")); ?></h3>				
				</a>
				<ul>
					<a href="tel: 9979939185" class="hover-text-theme" title=""><li><i class="fa fa-phone" style="transform: rotateZ(90deg);"></i> <span>+91 9979939185</span></li></a>
					<a href="tel: 9327227812" class="hover-text-theme" title=""><li><i class="fa fa-phone" style="transform: rotateZ(90deg);"></i> <span>+91 9327227812</span></li></a>
				</ul>
			</div>
			<!-- <div class="branch_box">
				<a class="branch_name hover-text-theme" title="click for location">				
					<h3><i class="fa fa-user"></i> <?php echo(lang("owner_name2")); ?></h3>				
				</a>
				<ul>
					<a href="tel:9898754242" class="hover-text-theme" title=""><li><i class="fa fa-phone" style="transform: rotateZ(90deg);"></i> <span>+91 9898754242</span></li></a>
				</ul>
			</div> -->
		</div>
	</div>
	<?php } ?>
	<div class="devloper_box primary-theme">
		<h4>All right reserved &copy;</h4>
		<h4>Design & Developed By <a href="" class="hover-theme">@futuristic Devops</a> </h4>
	</div>
</footer>
<?php $this->load->view('includes/js_files'); ?>
<?php if (!isset($is_admin) || $is_admin!=1) { ?>	
<script type="text/javascript">
	$("#add_email").on('click',function(){
		var val = $("#newsletter_email").val();
		if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(val)){
			create_loader('add_email');
			$.ajax({
				url:"<?php echo(get_uri('newsletter/add_newsletter')); ?>",
				method:"POST",
				data:{"email":val},
				success:function(data){
					data = JSON.parse(data);
					remove_loader('add_email');	
					if(data.status==1){
						$("#newsletter_email").val("");
						show_alert(data.message);
						
					}else{
						show_alert(data.message);
					}
					
				}
			});
		}else{
			show_alert("Please Enter Valid Email");
		}
	});
</script>
<?php } ?>

