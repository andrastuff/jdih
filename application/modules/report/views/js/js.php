<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
function getListTypeDokumen() {
        $.ajax({
            url: ServeUrl+"typedokumen/api_list_all",
            timeout: 600000,
            type: 'GET',
            dataType: 'json',
            complete: function(response) {
                var data = response.responseJSON.data
                if(response.status == 200){
                    var html = '';
                    html += '<option selected disabled>Pilih Type Dokumen ...</option>';
                    for (let i = 0; i < data.length; i++) {
                        html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    }
                    $('select[name=tipedokumen]').html(html);
                } else {
                    console.log(`Error`)
                }

            },error: function(xhr, status, error) {
                console.log("xhr", xhr);
                console.log("status", status);
                console.log("error", error);
            },
        })
    }
    
	getListTypeDokumen()

    $("select[name=tipedokumen]").on("change", function() {
		var id = $(this).val();
        $.ajax({
            data: {'id' : id},
            url: ServeUrl+"typedokumen/api_list_all_turunan",
            timeout: 600000,
            type: 'GET',
            dataType: 'json',
            complete: function(response) {
                var data = response.responseJSON.data
                if(response.status == 200){
                    var html = '';
                    html += '<option selected disabled>Pilih Jenis Peraturan</option>';
                     
                    for (let i = 0; i < data.length; i++) {
                        html += '<option value="'+data[i].id+'">'+data[i].second_id+' '+data[i].name+'</option>';
                    }
                    $('select[name=jenisdokumen]').html(html);
					 
                } else {
                    console.log(`Error`)
                }

            },error: function(xhr, status, error) {
                console.log("xhr", xhr);
                console.log("status", status);
                console.log("error", error);
            },
        })
    });
	

$('#sidePerundangan').addClass('active');
var method = '';
var data 	= getUrlVars();

var table 	= $('.dataTables-fetch').DataTable( {
        "dom": '<"html5buttons"B>lTfgitp',
		lengthMenu: [[25, 50, 100, 500], [25, 50, 100, 500]],
		pageLength: 50,
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
            search: '<span>Cari Judul:</span> _INPUT_',
            lengthMenu: '<span>&nbsp;</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
        },
		"autowidth": true,
		"responsive": true,
        "processing": true,
        "serverSide": true,
        "bInfo" : false,
		"ajax": {
            "url": ServeUrl+"report/api_list",
            "type": "GET",
			"data": data,
			"complete": function(response){ 
			$('select[name=tahun]').val(getUrlVars().tahun);
			$('select[name=tipedokumen]').val(getUrlVars().tipedokumen);
			$('select[name=tipedokumen]').trigger('change'); 
			$('select[name=jenisdokumen]').val(getUrlVars().jenisdokumen);
			},
            
        },
        "columns": [
			{ "data": null },
            // { "data": "img"},
            { "data": "judul"},
            { "data": "tahun_terbit"},
            { "data": "singkatan_bentuk"},
        ],
		 "columnDefs": 
         [ 
             
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
	
	

    function getUrlVars() {
		var vars = {};
		var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
			vars[key] = value.replace(/\+/g, ' ').replace(/\#/g, ' ');
		});
		return vars;
	}

    console.log(getUrlVars().tahun);
    
</script>