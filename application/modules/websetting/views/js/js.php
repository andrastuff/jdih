<script>


function loadSetting(){
		$.ajax({
		  data: "",
		  url: ServeUrl+"/websetting/api_get_by_id",
          method: 'GET',
          complete: function(response){ 
					if(response.status == 200){
							 
						$("input[name=id]").val(response.responseJSON.data.id);
						$("input[name=title]").val(response.responseJSON.data.title);
						$("textarea[name=description]").val(response.responseJSON.data.description);
						$("textarea[name=address]").val(response.responseJSON.data.address);
						$("input[name=phone]").val(response.responseJSON.data.phone);
						$("input[name=second_phone]").val(response.responseJSON.data.second_phone);
						$("input[name=email]").val(response.responseJSON.data.email);

						
						$("input[name=google_code]").val(response.responseJSON.data.google_code);
						$("textarea[name=metadesc]").val(response.responseJSON.data.metadesc);
						$("textarea[name=metakey]").val(response.responseJSON.data.metakey);
						$("input[name=footer]").val(response.responseJSON.data.footer);
						
						$("#logoImg").html('<img class="img-thumbnail" width="80" src="'+response.responseJSON.data.logo+'" alt="">');
							
           			}else{
						e('info','401 server conection error');
					}
					
				},
				dataType:'json'
			})
	
	};
	loadSetting();
	
	
	$("#app-form").submit(function(event) {
		event.preventDefault();

		var path = ServeUrl+"/websetting/api_update";
		var form = $(this)[0]; 
		var data = new FormData(form);

		swal("Are you sure?", {
                    buttons: {
                        cancel: "No, cancel!!",
                        catch: {
                            text: "Yes, save it!",
                            value: "yes",
                        },
                        
                    },
                })
                .then((value) => {
					if(value == 'yes'){
						$(":submit").prop("disabled", true);

								$.ajax({
									data: data,
									url: path,
									processData: false,
									contentType: false,
									cache: false,
									timeout: 600000,
									method: 'POST',
									complete: function(response){                
									if(response.status == 201){
										swal({
												title: 'Saved!',
												text: response.responseJSON.message,
												icon:'success'
											});
										$(":submit").prop("disabled", false); 
										loadSetting(); 
										
									}else{
										swal({
												title: 'Aborted!',
												text: response.responseJSON.message,
												icon:'warning'
											});	
                      					$(":submit").prop("disabled", false);
                      					//location.reload(); 
									}
									},
									dataType:'json'
						});
					}
                });
				
	});	
</script>