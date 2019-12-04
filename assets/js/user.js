var createCandidate = function () {
	return {
		init: function(){

			$('#CandidateRegForm').submit(function(e){
				e.preventDefault();
				
				//var reg  = $('#CandidateRegForm').serialize();
				var form_data = new FormData($('#CandidateRegForm')[0]);				

				//console.log(reg);
				$.ajax({
					type:'POST',					
					data : form_data,
					dataType:'json',
					processData: false,
        			contentType: false,
					url: BASE_URL + "candidate/create",
					beforeSend: function() {
				       //$("#divLoading").show();
				       $('body').css('cursor', 'wait');
				       $("#regSubmitBtn").attr("disabled", true);
				   },
					success: function(response){
						$('body').css('cursor', 'default');
						$("#regSubmitBtn").attr("disabled", false);
						$('#message').html(response.message);
						if(response.error)
						{
							$('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
						}
						else
						{
							$('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
							$('#CandidateRegForm')[0].reset();
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

var loginUser = function (){

	return {
		init : function (){
			$('#logText').html('Log In');
			$('#logForm').submit(function(e){
				e.preventDefault();
				$('#logText').html('Checking...');
				var user  = $('#logForm').serialize();
				var login = function(){
					$.ajax({
						type: 'POST',
						url: BASE_URL + "user/login",
						dataType: 'json',
						data: user,
						beforeSend: function() {
							$('#flashMessage').hide();
						},
						success: function(response){
							$('#lmessage').html(response.lmessage);
							$('#logText').html('Log In');
							if(response.error){
								$('#lresponseDiv').removeClass('alert-success').addClass('alert-danger').show();
							}
							else
							{
								$('#lresponseDiv').removeClass('alert-danger').addClass('alert-success').show();
								$('#logForm')[0].reset();	
								setTimeout(function(){
									location.reload();
									window.location.href = BASE_URL+ "User/index";
								}, 500);
								//window.location.href = BASE_URL+ "User/index";								
							}
						},
						error: function (response) {
                        $('#lmessage').html(response.lmessage);
						$('#logText').html('Log In');
						$('#lresponseDiv').removeClass('alert-success').addClass('alert-danger').show();
                    	}
					});
				};
				setTimeout(login, 500);
			});

			$('#lclearMsg').click(function(){
				$('#lresponseDiv').hide();
			});


		}
	}

}();

var candidateFilteringProfile = function(){
	return {
		init: function(){

			/* -- Preferd Location filtering -- */
			var showLocation = function(state){
				$('#preferLocation option').hide();
				$('#preferLocation').find('option').filter(function(){
					//console.log($(this).val());
					//var location = $(this).val();
					var district_id = $(this).data('foo'); 
					return district_id == state;
					//console.log(district_id);
				}).show();
				//set default value
                var defaultCity = $('#preferLocation option:visible:first').text();
                $('#preferLocation').val(defaultCity);
			};

			var state = $('#preferDistrict').val();
			showLocation(state);
			$('#preferDistrict').change(function(){
				showLocation($(this).val());

			});
			/* -- Preferd Location filtering -- */
			/* -- Filter Prefereneces  -- */
			var showPreference = function(state){
				$('#CanPreference1 option').hide();
				$('#CanPreference2 option').hide();
				$('#CanPreference3 option').hide();
				$('#CanPreference1').find('option').filter(function(){					
					var id = $(this).data('foo'); 
					return id == state;					
				}).show();
				$('#CanPreference2').find('option').filter(function(){					
					var id = $(this).data('foo'); 
					return id == state;					
				}).show();
				$('#CanPreference3').find('option').filter(function(){					
					var id = $(this).data('foo'); 
					return id == state;					
				}).show();
				//set default value
                var defaultItem = $('#CanPreference1 option:visible:first').text();
                $('#CanPreference1').val(defaultItem);
                $('#CanPreference2').val(defaultItem);
                $('#CanPreference3').val(defaultItem);
			};

			var state = $('#CanJobCat').val();
			showPreference(state);
			$('#CanJobCat').change(function(){
				showPreference($(this).val());

			});
			/* -- Filter Preferenece  -- */		
		}	
	}
}();

var candidateUpdateProfile = function(){
return{
	init : function(){

		$('#canCreateProfileForm').submit(function(e){
			e.preventDefault();
			var form_data = new FormData($('#canCreateProfileForm')[0]);

			$.ajax({
				type:"POST",
				data: form_data,
				dataType: 'json',
				url: BASE_URL + 'Candidate/complete',
				processData : false,
				contentType: false,
				success: function(response){
					$('#message').html(response.message);
					if(response.error)
					{
						$('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
					}
					else
					{
						$('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
						$('#canCreateProfileForm')[0].reset();
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

var createEmployer = function (){
	return{
		init: function(){

			$('#EmployeeRegForm').submit(function(e){
				e.preventDefault();			
				var form_data = new FormData($('#EmployeeRegForm')[0]);				
				$.ajax({
					type:'POST',					
					data : form_data,
					dataType:'json',
					processData: false,
        			contentType: false,
					url: BASE_URL + "employer/create",
					beforeSend: function() {				      
				       $('body').css('cursor', 'wait');
				       $("#employer-submit").attr("disabled", true);
				   },
					success: function(response){
						$('body').css('cursor', 'default');
						$("#employer-submit").attr("disabled", false);
						$('#message').html(response.message);
						if(response.error)
						{
							$('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
						}
						else
						{
							$('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
							$('#EmployeeRegForm')[0].reset();
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


var employerCreateProfile = function(){
	return {
		init: function(){
			$('#empCreateProfileForm').submit(function(e){
				e.preventDefault();
				var form_data = new FormData($('#empCreateProfileForm')[0]);
				$.ajax({
					type:"POST",
					data: form_data,
					dataType: 'json',
					url: BASE_URL + 'employer/complete',
					processData : false,
					contentType: false,
					success: function(response){
						$('#message').html(response.message);
						if(response.error)
						{
							$('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
						}
						else
						{
							$('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
							$('#empCreateProfileForm')[0].reset();
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

var employerUpdateProfile = function(){
	return {
		init: function(){
			$('#empUpdateProfileForm').submit(function(e){
				e.preventDefault();
				var form_data = new FormData($('#empUpdateProfileForm')[0]);
				$.ajax({
					type:"POST",
					data: form_data,
					dataType: 'json',
					url: BASE_URL + 'employer/update_employer',
					processData : false,
					contentType: false,
					success: function(response){
						$('#message').html(response.message);
						if(response.error)
						{
							$('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
						}
						else
						{
							$('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
							$('#empUpdateProfileForm')[0].reset();
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

var admCreateProfile = function(){
	return {
		init: function(){
			$('#admCreateProfileForm').submit(function(e){
				e.preventDefault();
				var form_data = new FormData($('#admCreateProfileForm')[0]);
				$.ajax({
					type:"POST",
					data: form_data,
					dataType: 'json',
					url: BASE_URL + 'admin/create',
					processData : false,
					contentType: false,
					success: function(response){
						$('#message').html(response.message);
						if(response.error)
						{
							$('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
						}
						else
						{
							$('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
							$('#empCreateProfileForm')[0].reset();
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

/*--------- Data Table ------------*/

var LoadDataTables = function () {
    return {
        init: function () {
            $('#TblEmployers').DataTable();     
            $('#TblResumes').DataTable();            
        }
    }
}();

/*jQuery(document).ready(function () {
    LoadDataTables.init();    
});*/

jQuery(document).ready(function(){
	LoadDataTables.init();  
	createCandidate.init();
	loginUser.init();
	candidateFilteringProfile.init();
	candidateUpdateProfile.init();
	createEmployer.init();
	employerCreateProfile.init();
	employerUpdateProfile.init();
	admCreateProfile.init();
});