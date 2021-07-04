function hide_navbar(){
	var left_pos = $(".header_link_list").css("left");
	if(left_pos == "-310px"){
		$(".header_link_list").css("left",'0px');
		$(".bar-icon i").removeClass("fa fa-bars");
		$(".bar-icon i").addClass("fa fa-times");
	}
	else{
		$(".header_link_list").css("left",'-310px');
		$(".bar-icon i").removeClass("fa fa-times");
		$(".bar-icon i").addClass("fa fa-bars");
	}

}



function create_slider(id,count=1){
	var mySwiper = new Swiper('#'+id, {
	  // Optional parameters
	  loop: true,
	  slidesPerView :count,
	  // If we need pagination
	  pagination: {
	    el: '.swiper-pagination',
	  },

	  // Navigation arrows
	  navigation: {
	    nextEl: '.swiper-button-next',
	    prevEl: '.swiper-button-prev',
	  },

	  // And if we need scrollbar
	  scrollbar: {
	    el: '.swiper-scrollbar',
	  },
	})	
}

function create_responsive_slider(id,full_screen_count = 3,med_screen_count = 2,small_screen_count = 1){
	var window_width = $(window).width();
	if(window_width<1250 && window_width>550){
		create_slider(id,med_screen_count);	
	}
	else if(window_width<550){
		create_slider(id,small_screen_count);	
	}
	else{
		create_slider(id,full_screen_count);
	}
}

function hide_popup(){
	$(".pop_up_container").hide();
}
function show_popup(){
	$(".pop_up_container").show();	
}

function create_loader(id){
	var loader = `<div class='container_loader'><img src='files/system/loader_small.gif'></div>`;
	$("#"+id).append(loader);
}
function remove_loader(id){
	$("#"+id).children('.container_loader').remove();
}

function show_alert(msg,description = "",heading=""){
	$("#alert_msg").html(msg);
	$("#alert_msg_heading").html(heading);
	$("#alert_msg_des").html(description);
	$(".pop_up_alert_container").show();

}
function hide_alert(){
	$(".pop_up_alert_container").hide();
	$("#alert_msg").html("");
	$("#alert_msg_heading").html("");
	$("#alert_msg_des").html("");
}
function open_form(url=""){
	$(".pop_up_container").show();	
	create_loader('pop_up_box');
	$.ajax({
		url:url,
		method:"post",
		success:function(data){			
			$("#pop_up_box").html(data);
			remove_loader('pop_up_box');
		}
	})
}

function send_data(id="",url=""){
	var my_form = document.getElementById(id);
	var form_data = new FormData(my_form);
	var category_val  = $("[name='category_name']").val();

	console.log(form_data);
	$.ajax({
      url: url,
      type: "POST",
      data: form_data,
      processData:false,
      contentType: false,  
      success:function(return_data)
      {
      	return_data = JSON.parse(return_data);
      	if(return_data.status==1){
      		hide_popup();
      		get_data();
      		show_alert(return_data.message);
	      	
	      }else{
	      	show_alert(return_data.message);
	      }
      } 
    })
}
function fileValidation(url="",id="file") { 
    var fileInput =  
        document.getElementById(id); 
      
    var filePath = fileInput.value; 
  
    // Allowing file type 
    var allowedExtensions =  
            /(\.jpg|\.jpeg|\.gif|\.png)$/i; 
      
    if (!allowedExtensions.exec(filePath)) { 
        show_alert('only " .jpg || .jpeg || .png || .gif " are allowed Extensions');                               
        return false; 
    }
    else if(fileInput.files.item(0).size>5242880 )
    {
    	show_alert("File is Greaterthan 5MB");
    	 return false;
    }  
    else  
    {          
    	val = 1;
    	data = new FormData();
	    data.append('file', $('#'+id)[0].files[0]);
	    data.append('action',"uploade_image");
	    data.append('is_first',val);
	    var old_file = $("#image_name").val();
    	create_loader("drop-area");  
      	 $.ajax({
	      url: url,
	      type: "POST",
	      data: data,
	      enctype: 'multipart/form-data',
	      processData: false,  
	      contentType: false,  
	      success:function(return_data)
	      {
	      	return_data = JSON.parse(return_data);
	      	if(return_data.status==1)
	      	{			      	
	      		$('#imagePreview').attr('src',return_data.image);
		      	$("#image_name").val(return_data.image_name);
		      	delete_file('admincategory/delete_file',old_file);
		      	remove_loader("drop-area");  
	      	}
	      	else
	      	{
	      		show_alert("OOPS! Something Went Wrong");					  
            	 return false;
            	 remove_loader("drop-area");  
	      	}
	      	
	      } 
	    })
    } 	
} 

function delete_file(url = "",file =""){
	var data = {"file_name": file};
	 $.ajax({
      url: url,
      type: "POST",
      data: data		 		     
    })
}
function show_dlt_alert(url,id){
	var html = `<div class="pop_up_alert_container"  id="pop_up_dlt" style="display:block">
					<div class="pop_up_box" id="pop_dlt_box">
						<div class="primary-theme header">
							<span id="alert_msg_heading"></span><i class="fa fa-times"  onclick="hide_dlt_alert()"></i>
						</div>
						<div class="content">
							<h3 id="alert_msg"> Are You Sure To want to Delete??</h3>
							<p id="alert_msg_des"></p>
						</div>
						<div class="footer" >
							<button onclick="hide_dlt_alert()" class="primary-theme">cancel</button>
							<button onclick="delete_data('`+url+`',`+id+`)" class="danger-theme" >Delete</button>
						</div>
					</div>
				</div>`;
				$("body").prepend(html);

}
function hide_dlt_alert(){
	$("body").children('#pop_up_dlt').remove();
}
function delete_data(url="",id=""){
	var data = {"dlt_id": id};
	create_loader("pop_dlt_box");
	 $.ajax({
      url: url,
      type: "POST",
      data: data,
      success:function(return_data){
      	remove_loader("pop_dlt_box");
      	hide_dlt_alert();
      	return_data = JSON.parse(return_data);
      	if(return_data.status==1){
      		show_alert("Data Deleted SuccessFully");
      		get_data();
      	}else{
      		show_alert(return_data.message);
      	}
      }		 		     
    })
}
function get_one(url="",id){
		create_loader("update_btn");
		$(".pop_up_container").show();	
		data = {"id":id,"action":"update"};
		$.ajax({
			url :url,
			method:"POST",
			data:data,
			success:function(return_data){
				$("#pop_up_box").html(return_data);
				remove_loader("update_btn");	
			}
		})
	}

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