<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
$('#sideKategoriArtikel').addClass('active');
var method = '';
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
            search: '<span>Cari Kategori:</span> _INPUT_',
            lengthMenu: '<span>&nbsp;</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
        },
		"autowidth": true,
		"responsive": true,
        "processing": true,
        "serverSide": true,
        "bInfo" : false,
		"ajax": {
            "url": ServeUrl+"artikelkategori/api_list",
            "type": "GET",
            
        },
        "columns": [
			{ "data": null },
            { "data": "kategori"},
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
        $('#btnSimpan').attr('disabled', true)
	    $('#modalForm').modal({backdrop: 'static', keyboard: false});
        $('#dataInput').val('')
        
	});
	
	$('.dataTables-fetch tbody').on( 'click', '#open', function () {
        var data = table.row( $(this).parents('tr') ).data();
		window.location.href = ServeUrl+"artikelkategori/open/"+data['id'];
    } );
	
	$('.dataTables-fetch tbody').on( 'click', '#edit', function () {
        var data = table.row( $(this).parents('tr') ).data();
		 $('#modalForm').modal({backdrop: 'static', keyboard: false});
		 $("input[name=id]").val(data['id']);
		 $("input[name=name]").val(data['kategori']);
         

        if (data['status'] == 'publish') {
            $("#statusRadio1").prop('checked', true);
        } else {
            $("#statusRadio2").prop('checked', true);
        }

		  
    } );
	
	$('.dataTables-fetch tbody').on( 'click', '#delete', function () {
        var data = table.row( $(this).parents('tr') ).data();
		remove(data['id']);
        
    } );
	
	$('#modalForm').on('shown.bs.modal', function () {
        $("input[name=name]").focus();
    });
	
	$("#form-data").submit(function(event) {
		event.preventDefault();
        var id = $("input[name=id]").val();

        if($.isNumeric(id)){
            var path = ServeUrl+"artikelkategori/api_update";
        }else{
            var path = ServeUrl+"artikelkategori/api_save";
        }

      	var data = $(this).serialize();

        Swal.fire({
            title: '<div style="color: white;">Wait !</div>',
            html: '<p class="card-text"><small class="text-white">Perintah ini akan memperbarui data ini <br>dan menghapus data sebelumnya, Ingin melakukannya ?</small></p>',
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
					$(":submit").prop("disabled", true);
                    $('#modalForm').modal('hide');
                    $.ajax({
                        data: data,
                        url: path,
                        crossDomain: false,
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
                                    $('#modalForm').modal('hide');
                                    $("input[name=id]").val('');
                                    $("#statusRadio2").prop('checked', true);
                                    $("input[name=name]").val('');
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
                    url: ServeUrl+"artikelkategori/api_delete",
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

    function handleSubmitForm() {
        
        var input = $('#dataInput').val()
        if (input != '' && input != null) {
            $('#btnSimpan').attr('disabled', false)
        } else {
            $('#btnSimpan').attr('disabled', true)
        }
    }
</script>