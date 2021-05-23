<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.7.1/tinymce.min.js" referrerpolicy="origin"></script>

<script>
$('#sideHalaman').addClass('active');
tinymce.init({
        selector: '#mytextarea',
		height: '500px'
      });

      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imageShow')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function submitHalaman() {

        var form = $('#form-data')[0];
        var data = new FormData(form);
        data.append("content", tinyMCE.get('mytextarea').getContent() );

        $.ajax({
            data: data,
            url: ServeUrl+"halaman/api_save",
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
                            window.location.href = ServeUrl + 'halaman/main'
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

</script>

