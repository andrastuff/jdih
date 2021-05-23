<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
var method = '';
var namaMenuArr = [];
$('#sideMenu').addClass('active');
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
        "dom": '<"html5buttons"B>lTfgitp',
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
            search: '<span>Cari Nama Menu:</span> _INPUT_',
            lengthMenu: '<span>&nbsp;</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
        },
		"autowidth": true,
		"responsive": true,
        "processing": true,
        "serverSide": true,
        "bInfo" : false,
		"ajax": {
            "url": ServeUrl+"menu/api_list",
            "type": "GET",
            
        },
        "columns": [
			{ "data": null },
            { "data": "id_parent"},
            { "data": "nama_menu"},
            { "data": "order_menu"},
            { "data": "link"},
            { "data": "status"},
            { "data": null }
        ],
		 "columnDefs": 
         [ 
             {
                "targets": -1,
                "data": null,
                "orderable": false,
                "defaultContent": '<div class="btn-group"><button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action</button><ul class="dropdown-menu"><li><a class="dropdown-item" id="edit" href="javascript:void(0)"><i class="fa fa-edit mr-2"></i>Sunting</a></li><li><a class="dropdown-item" id="delete" href="javascript:void(0)"><i class="fa fa-trash mr-2"></i>Hapus</a></li></ul></div>'
            },
            {
                "searchable": false,
                "orderable": false,
                "targets": 0,
                "data": "id",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
                
            }
        ]  
		  
			
    } );
	
	$('#create').on( 'click', function () {
	    $('#modalForm').modal('show');
        $('#modalForm').find('#form-data')[0].reset();
            
	});
	
	$('.dataTables-fetch tbody').on( 'click', '#open', function () {
        var data = table.row( $(this).parents('tr') ).data();
		window.location.href = ServeUrl+"menu/open/"+data['id'];
    } );
	
	$('.dataTables-fetch tbody').on( 'click', '#edit', function () {
        var data = table.row( $(this).parents('tr') ).data();
		 $('#modalForm').modal({backdrop: 'static', keyboard: false});
		 $("input[name=id]").val(data['id']);
		 $("input[name=id_parent]").val(data['id_parent']);
        //  $("input[name=nama_menu]").val(data['nama_menu']);
         $("input[name=order_menu]").val(data['order_menu']);
         $("input[name=link]").val(data['link']);
         $("input[name=status]").val(data['status']);

        var menuList = '';
            menuList += '<option >Pilih nama menu ...</option>';
            for (let i = 0; i < namaMenuArr.length; i++) {
                if (data['nama_menu'] == namaMenuArr[i].id) {
                    menuList += '<option selected value="'+namaMenuArr[i].judul+'">'+namaMenuArr[i].judul+'</option>';
                } else {
                    menuList += '<option value="'+namaMenuArr[i].judul+'">'+namaMenuArr[i].judul+'</option>';
                }
                
            }
            $('#namaMenu').html(menuList);
		  
    } );
	
	$('.dataTables-fetch tbody').on( 'click', '#delete', function () {
        var data = table.row( $(this).parents('tr') ).data();
		remove(data['id']);
    } );
	
	$('#modalForm').on('shown.bs.modal', function () {
        $("input[name=nama_tag]").focus();
        // $(":submit").prop("disabled", false);
    });
	
	$("#form-data").submit(function(event) {
		event.preventDefault();
        var id = $("input[name=id]").val();
        if($.isNumeric(id)){
            var path = ServeUrl+"menu/api_update";
        }else{
            var path = ServeUrl+"menu/api_save";
        }

      	var data = $(this).serialize();

          Swal.fire({
            title: '<div style="color: white;">Wait !</div>',
            html: '<p class="card-text"><small class="text-white">Perintah ini akan menghapus data selamanya, Ingin melakukannya ?</small></p>',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Lakukan!',
            cancelButtonText: 'Tidak, Batalkan!',
            confirmButtonClass: 'btn btn-primary',
            background: '#5591F5',
            cancelButtonClass: 'btn btn-danger ml-1',
            buttonsStyling: false,
        })
        .then(function (result) {
            if (result.value) {
					$(":submit").prop("disabled", true);
                    $.ajax({
                        data: data,
                        url: path,
                        crossDomain: false,
                        method: 'POST',
                        complete: function(response){   
                            $(":submit").prop("disabled", false);             
                          if(response.status == 201){
                            Swal.fire
                            ({
                                type: "success",
                                icon: "success",
                                title: response.status+' Success!',
                                html: '<p class="card-text"><small class="text-muted">'+response.responseJSON.message+'</small></p>',
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                background: '#fff',
                                confirmButtonText: '<i style="padding-right: 10px;" class="fa fa-check"></i>Ya, Baiklah!',
                                confirmButtonClass: 'btn btn-info',
                                buttonsStyling: false,
                                willClose: function() {
                                    
                                    $('#modalForm').modal('hide');
                                    table.ajax.reload(null, false);
                                }
                            })
                          } else {
                            Swal.fire
                            ({
                                type: "error",
                                title: '<h1 class="text-white"><b>' + response.status+' Failed!</b></h1>',
                                html: '<p class="card-text"><small class="text-white">'+response.responseJSON.message+'</small></p>',
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                background: '#F1534E',
                                confirmButtonText: '<i style="padding-right: 10px;" class="fa fa-meh-o"></i>Ya, Baiklah!',
                                confirmButtonClass: 'btn btn-dark',
                                buttonsStyling: false,
                                willClose: function() {
                                    $(":submit").prop("disabled", false);
                                    // location.reload(); 
                                }
                            })
                              $(":submit").prop("disabled", false);
                            // location.reload(); 
                          }
                        },
                        dataType:'json'
                });
            }
        });
				
	});
	
	function remove(id){
		Swal.fire({
            title: '<div style="color: white;">Wait !</div>',
            html: '<p class="card-text"><small class="text-white">Perintah ini akan menghapus data selamanya, Ingin melakukannya ?</small></p>',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Lakukan!',
            cancelButtonText: 'Tidak, Batalkan!',
            confirmButtonClass: 'btn btn-primary',
            background: '#5591F5',
            cancelButtonClass: 'btn btn-danger ml-1',
            buttonsStyling: false,
        }).then(function (result) {
            if (result.value) {
				$.ajax({
                    data: {"id" : id},
                    url: ServeUrl+"menu/api_delete",
                    method: 'POST',
                    complete: function(response){                
                        if(response.status == 201){
                            Swal.fire
                            ({
                                type: "success",
                                icon: "success",
                                title: response.status+' Success!',
                                html: '<p class="card-text"><small class="text-muted">'+response.responseJSON.message+'</small></p>',
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                background: '#fff',
                                confirmButtonText: '<i style="padding-right: 10px;" class="fa fa-check"></i>Ya, Baiklah!',
                                confirmButtonClass: 'btn btn-info',
                                buttonsStyling: false,
                                willClose: function() {
                                    table.ajax.reload(null, false);
                                }
                            })
                            }else{
                            Swal.fire
                            ({
                                type: "error",
                                title: '<h1 class="text-white"><b>' + response.status+' Failed!</b></h1>',
                                html: '<p class="card-text"><small class="text-white">'+response.responseJSON.message+'</small></p>',
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                background: '#F1534E',
                                confirmButtonText: '<i style="padding-right: 10px;" class="fa fa-meh-o"></i>Ya, Baiklah!',
                                confirmButtonClass: 'btn btn-dark',
                                buttonsStyling: false,
                                willClose: function() {
                                    $(":submit").prop("disabled", false);
                                    location.reload(); 
                                }
                            })
                        }
                    },
                dataType:'json'
                })
            }
        });
    }

    function getNamaMenu() {
        $.ajax({
            url: ServeUrl + 'menu/api_nama_menu',
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            type: 'GET',
            dataType: 'json',
            complete: function(response) {
                namaMenuArr = response.responseJSON.data
                var menuList = '';
                    menuList += '<option selected disabled>Pilih nama menu ...</option>';
                    for (let i = 0; i < response.responseJSON.data.length; i++) {
                        menuList += '<option value="'+response.responseJSON.data[i].id+'">'+response.responseJSON.data[i].judul+'</option>';
                    }
                    $('#namaMenu').html(menuList);
            },error: function(xhr, status, error) {
                console.log("xhr", xhr);
                console.log("status", status);
                console.log("error", error);
            },
        })
    }
    getNamaMenu()
</script>

