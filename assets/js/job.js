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
					success: function(response){					
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

jQuery(document).ready(function(){
	createPost.init();
	applyJob.init();
});