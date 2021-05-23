<script>
	function upload(){
		$('input[name=link]').val('');
		$('input[name=title]').val('');
		$('#title').html('Upload Foto Slide');
		$("#modal-upload").modal("show");
		$('#modal-upload').on('shown.bs.modal', function () {
		$('input[name=title]').focus();
		})
	}
	$('#modal-upload').on('hidden.bs.modal', function () {
		$('.carousel-inner').html('');
		$('.carousel-indicators').html('');
		
		location.reload(); 
	})
	

	$("#form-upload").submit(function(event) {
		event.preventDefault();
		

	});
	
	
	loadData();
	
	function loadData(){
		var def = ''; 
			def +='<div class="carousel-item active" data-id="">';
			def +='<img class="d-block w-100 fixed-height" src="'+ServeUrl+'/assets/images/web/bg3.png" alt="">';
			def +='<div class="carousel-caption d-none d-md-block">';
			def +='<h5 class="text-shadow-dark"></h5>';
			def +='</div>';
			def +='</div>';
		$.ajax({
					data: "",
					url: ServeUrl+"slide/api_list",
                    method: 'GET',
                    complete: function(response){                
                        if(response.status == 200){
							if(response.responseJSON.data.length >= 1){
							$('#remove').show();
							var indicator = '';
							var tbody = '';
							var id = 1;
							$.each(response.responseJSON.data, function(k,v){
								if(v.id == response.responseJSON.data[0].id){ x = 'active';}else{ x = ''; };
								tbody +='<div class="carousel-item '+x+'" data-id="'+v.id+'">';
								tbody +='<img class="d-block w-100 fixed-height" src="'+v.img+'" alt="'+v.judul+'">';
								tbody +='<div class="carousel-caption d-none d-md-block">';
								tbody +='<h5 class="text-shadow-dark">'+v.judul+'</h5>';
								tbody +='</div>';
								tbody +='</div>';
								indicator +='<li data-target="#carouselExampleIndicators" data-slide-to="'+v.id+'" class="'+x+'"></li>';
								
							});
							
							$('.carousel-inner').html(tbody);
							$('.carousel-indicators').html(indicator);
							}else{
							$('.carousel-inner').html(def);
							$('#remove').hide();
							}
						}
                    },
					dataType:'json'
                })
	
	};
	
	
	function remove(){
		var id = $('div.carousel-item.active').data("id");
		
		swal("Are you sure?", {
                    buttons: {
                        cancel: "No, cancel!!",
                        catch: {
                            text: "Yes, delete it!",
                            value: "yes",
                        },
                        
                    },
                })
                .then((value) => {
				if(value == "yes"){
				
				$.ajax({
							data: {"id" : id},
							url: ServeUrl+"slide/api_delete",
							method: 'GET',
							complete: function(response){                
							  if(response.status == 200){ 
								  swal({
										title: response.status+' Removed!',
										text: response.responseJSON.message,
										type:'success',
										onClose: function () {
										loadData();
										}
									}); 
							  }else{
								    swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.message,
										type:'warning',
									}); 
									 
							  }
							},
							dataType:'json'
				})
				}
            });
	}
	
	$("#form-upload").submit(function(event) {
		event.preventDefault();

		var path = ServeUrl+"/slide/api_save";
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
										location.reload();
										
									}else{
										swal({
												title: 'Aborted!',
												text: response.responseJSON.message,
												icon:'warning'
											});	
                      					$(":submit").prop("disabled", false);
                      					location.reload(); 
									}
									},
									dataType:'json'
						});
					}
                });
				
	});	
 
</script>