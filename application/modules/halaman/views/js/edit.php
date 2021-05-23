<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.7.1/tinymce.min.js" referrerpolicy="origin"></script>

<script>
$('#sideHalaman').addClass('active');
var idHalaman = window.location.pathname.split('/').pop();
tinymce.init({
        selector: '#content',
		height: '500px'
      });

    function updateHalaman() {

        var form = $('#form-data')[0];
        var data = new FormData(form);
        data.append("content", tinyMCE.get('content').getContent() );
        data.append("id", idHalaman );

        $.ajax({
            data: data,
            url: ServeUrl+"halaman/api_update",
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            type: 'POST',
            dataType: 'json',
            complete: function(response) {

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
                            window.location.href = ServeUrl + 'halaman/main'
                        }
                    })
                } else {
                    Swal.fire
                    ({
                        type: "error",
                        icon: "error",
                        title: response.status+' Error!',
                        html: '<p class="card-text"><small class="text-muted">'+response.responseJSON.message+'</small></p>',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        background: '#fff',
                        confirmButtonText: '<i style="padding-right: 10px;" class="fa fa-check"></i>Ya, Baiklah!',
                        confirmButtonClass: 'btn btn-info',
                        buttonsStyling: false,
                        willClose: function() {
                            // window.location.href = ServeUrl + 'artikel/main'
                        }
                    })
                }
                
            },error: function(xhr, status, error) {
                console.log("xhr", xhr);
                console.log("status", status);
                console.log("error", error);
            },
        })
    }

    
    function getDetail() {
        var request = new FormData();
        request.append("id", idHalaman );
        
        $.ajax({
            data: request,
            url: ServeUrl + '/halaman/api_detail_halaman',
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            type: 'POST',
            dataType: 'json',
            complete: function(response) {
                
                var data = response.responseJSON.data
                $('#judulHalaman').val(data.judul)
                tinymce.get("content").setContent(data.content);
                $('#content').val(data.content)
                $('#keyword').val(data.keyword)
                $('#description').val(data.description)

                if (data.status == "y") {
                    $('#published').prop('checked', true);
                } else {
                    $('#unpublished').prop('checked', true);
                }


            },error: function(xhr, status, error) {
                console.log("xhr", xhr);
                console.log("status", status);
                console.log("error", error);
            },
        })
    }
    getDetail()

</script>

