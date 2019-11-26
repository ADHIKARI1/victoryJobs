var createPost = function(){
return {
	init: function(){
		$('#post-job-form').submit(function(e){
			e.preventDefault();
			var form_data = new FormData($('#post-job-form')[0]);				
				$.ajax({
					type:'POST',					
					data : form_data,
					dataType:'json',
					processData: false,
        			contentType: false,
					url: BASE_URL + "job/create",					
					success: function(response){					
						$('#message').html(response.message);
						if(response.error)
						{
							$('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
						}
						else
						{
							$('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
							$('#post-job-form')[0].reset();
						}
					}
				});
		});
		$(document).on('click', '#clearMsg', function(){
			$('#responseDiv').hide();
		});

	}
}
}();


var applyJob = function(){
return{
	init: function(){
		$('#job-form').submit(function(e){
			e.preventDefault();
			var form_data = new FormData($('#job-form')[0]);				
				$.ajax({
					type:'POST',					
					data : form_data,
					dataType:'json',
					processData: false,
        			contentType: false,
					url: BASE_URL + "job/applyjob",	
					beforeSend: function() {				       
				       $('body').css('cursor', 'wait');
				       $("#jobApplyBtn").attr("disabled", true);
				   },			
					success: function(response){	
						$('body').css('cursor', 'default');
				       	$("#jobApplyBtn").attr("disabled", false);				
						$('#message').html(response.message);
						if(response.error)
						{
							$('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
						}
						else
						{
							$('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
							$('#job-form')[0].reset();
						}
					}
				});
			
		});

	}
}
}();

var LoadEmployerDetail = function()
{
	return {
		init: function(){
			$('#admin-get-employer').submit(function(e){
				e.preventDefault();
				var form_data = new FormData($('#admin-get-employer')[0]);
				$.ajax({
						type:'POST',					
						data : form_data,
						dataType:'json',
						processData: false,
        				contentType: false,
						url: BASE_URL + 'admin/getEmployer',                         
                        success : function(response){

                        	if(response.error)
							{
								$('#admin-get-employer')[0].reset();
								$('#admin-post-job')[0].reset();
							}
							else
							{
								console.log(response);
                            	$('#emp-name').val(response.org_name);
                            	$('#emp-email').val(response.org_email);
                            	$('#emp-ref-id').val(response.ref_org_id);
								$('#admin-get-employer')[0].reset();
							}
                            
                        },
                        error: function (response) {
                        	$('#admin-get-employer')[0].reset();
							$('#admin-post-job')[0].reset();
						}
                    });

			});
		}
	}

}();

var LoadEmployerDetailForEdit = function()
{
	return {
		init: function(){
			$('#admin-update-employer').submit(function(e){
				e.preventDefault();
				var form_data = new FormData($('#admin-update-employer')[0]);
				$.ajax({
						type:'POST',					
						data : form_data,
						dataType:'json',
						processData: false,
        				contentType: false,
						url: BASE_URL + 'admin/getEmployer',                         
                        success : function(response){

                        	if(response.error)
							{
								$('#admin-update-employer')[0].reset();
								$('#admin-post-job')[0].reset();
							}
							else
							{
								console.log(response);
                            	$('#org-name').val(response.org_name);
                            	$('#username').val(response.org_username);
                            	$('#phone').val(response.org_telephone);
                            	$('#email').val(response.org_email);
                            	$('#address').val(response.org_address);
                            	$('#contact-person').val(response.org_contact_person);
                            	$('#mobile').val(response.org_mobile);
                            	$('#office-email').val(response.contact_email);
                            	$('#no-of-vacancy').val(response.no_of_vacancies);
                            	$('#input-file-preview').val( BASE_URL + 'uploads/logo/'+response.org_logo);
								$('#admin-update-employer')[0].reset();
							}
                            
                        },
                        error: function (response) {
                        	$('#admin-update-employer')[0].reset();
							$('#admin-post-job')[0].reset();
						}
                    });

			});
		}
	}

}();


var adminCreatePost = function(){
return {
	init: function(){
		$('#admin-post-job').submit(function(e){
			e.preventDefault();
			var form_data = new FormData($('#admin-post-job')[0]);				
				$.ajax({
					type:'POST',					
					data : form_data,
					dataType:'json',
					processData: false,
        			contentType: false,
					url: BASE_URL + "admin/post_job",					
					success: function(response){					
						$('#message').html(response.message);
						if(response.error)
						{
							$('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
						}
						else
						{
							$('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
							$('#post-job-form')[0].reset();
						}
					}
				});
		});
		$(document).on('click', '#clearMsg', function(){
			$('#responseDiv').hide();
		});

	}
}
}();

jQuery(document).ready(function(){
	createPost.init();
	applyJob.init();
	LoadEmployerDetail.init();
	adminCreatePost.init();
	LoadEmployerDetailForEdit.init();
});