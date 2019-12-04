var adminUpdateEmployer = function(){

	return{
		init: function(){
			$('#admUpdateEmployerForm').submit(function(e){
			e.preventDefault();
			var form_data = new FormData($('#admUpdateEmployerForm')[0]);

			$.ajax({
					type:'POST',					
					data : form_data,
					dataType:'json',
					processData: false,
        			contentType: false,
					url: BASE_URL + "admin/update_employer",					
					success: function(response){					
						$('#message').html(response.message);
						if(response.error)
						{							
							 swal("", response.message, "error");
						}
						else
						{							
							 swal("", response.message, "success");							
						}
					}

			});

		});
		}
	}
}();

jQuery(document).ready(function(){
	adminUpdateEmployer.init();
});
