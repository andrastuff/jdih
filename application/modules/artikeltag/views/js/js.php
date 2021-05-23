<script>
var method = '';

$.extend( $.fn.dataTable.defaults, {
            dom: '<"html5buttons"B>lTfgitp',
			buttons: [
				{ extend: 'copy'},
				{extend: 'csv'},
				{extend: 'excel', title: 'ExampleFile'},
				{extend: 'pdf', title: 'ExampleFile'},

				{extend: 'print',
				 customize: function (win){
						$(win.document.body).addClass('white-bg');
						$(win.document.body).css('font-size', '10px');

						$(win.document.body).find('table')
								.addClass('compact')
								.css('font-size', 'inherit');
				}
				}
			],
            language: {
                search: '<span>Search by Name:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
        });
		
var table 	= $('.dataTables-fetch').DataTable( {
		"autowidth": true,
		"responsive": true,
        "processing": true,
        "serverSide": true,
		"ajax": {
            "url": ServeUrl+"artikeltag/api_list",
            "type": "GET",
            
        },
        "columns": [
			{ "data": null },
            { "data": "nama_tag"},
            { "data": "tag_seo" },
			{ "data": "count" },
            { "data": null }
        ],
		 "columnDefs": [ {
            "targets": -1,
            "data": null,
			"orderable": false,
            "defaultContent": '<div class="btn-group"><button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action</button><ul class="dropdown-menu"><li><a class="dropdown-item" id="edit" href="javascript:void(0)">Edit</a></li><li><a class="dropdown-item" id="delete" href="javascript:void(0)">Delete</a></li></ul></div>'
        },{
            "searchable": false,
            "orderable": false,
            "targets": 0,
			"data": "id",
			render: function (data, type, row, meta) {
				return meta.row + meta.settings._iDisplayStart + 1;
			}
			 
        } ]  
		  
			
    } );
	
	$('#create').on( 'click', function () {
		$('#btnSimpan').attr('disabled', true)
	    $('#modalForm').modal({backdrop: 'static', keyboard: false});
        //$('#modalForm').find('#form-data')[0].reset();
		$('#dataInput').val('')
            
	});
	
	$('.dataTables-fetch tbody').on( 'click', '#open', function () {
        var data = table.row( $(this).parents('tr') ).data();
		window.location.href = ServeUrl+"artikel_tag/open/"+data['id'];
    } );
	
	$('.dataTables-fetch tbody').on( 'click', '#edit', function () {
        var data = table.row( $(this).parents('tr') ).data();
		 $('#modalForm').modal({backdrop: 'static', keyboard: false});
		 $("input[name=id]").val(data['id']);
		 $("input[name=nama_tag]").val(data['nama_tag']);
		  
    } );
	
	$('.dataTables-fetch tbody').on( 'click', '#delete', function () {
        var data = table.row( $(this).parents('tr') ).data();
		remove(data['id']);
    } );
	
	$('#modalForm').on('shown.bs.modal', function () {
        $("input[name=nama_tag]").focus();
        //$(":submit").prop("disabled", false);
    });
	
	$("#form-data").submit(function(event) {
		event.preventDefault();
        var id = $("input[name=id]").val();
        if($.isNumeric(id)){
            var path = ServeUrl+"artikeltag/api_update";
        }else{
            var path = ServeUrl+"artikeltag/api_save";
        }

      	var data = $(this).serialize();

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
                    $('#modalForm').modal('hide');
                    $.ajax({
                        data: data,
                        url: path,
                        crossDomain: false,
                        method: 'POST',
                        complete: function(response){                
                          if(response.status == 201){
                              swal({
                                      title: 'Saved!',
                                      text: response.responseJSON.message,
                                      icon:'success'
                                  }); 
                                  table.ajax.reload(null, false);
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
	
	function remove(id){
		
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
							url: ServeUrl+"artikeltag/api_delete",
							method: 'POST',
							complete: function(response){                
							  if(response.status == 200){ 
								  swal({
										title: response.status+' Removed!',
										text: response.responseJSON.message,
										type:'success',
										
									}); 
									table.ajax.reload(null, false);
							  }else{
								    swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.message,
										type:'warning',
									}); 
									table.ajax.reload(null, false);
									 
							  }
							},
							dataType:'json'
				})
				}
            });
	}
	
	 function handleSubmitForm() {
        
        var input = $('#dataInput').val()
		console.log(input);
        if (input != '' && input != null) {
            $('#btnSimpan').attr('disabled', false)
        } else {
            $('#btnSimpan').attr('disabled', true)
        }
    }
</script>

