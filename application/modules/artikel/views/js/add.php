<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.7.1/tinymce.min.js" referrerpolicy="origin"></script>

<script>

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

    function getListKategori() {
        $.ajax({
            url: ServeUrl+"artikel/api_kategori_list",
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            type: 'GET',
            dataType: 'json',
            complete: function(response) {
                var data = response.responseJSON.data
                if(response.status == 201){
                    var kategoriList = '';
                    kategoriList += '<option selected disabled>Pilih jenis kategori ...</option>';
                    for (let i = 0; i < data.length; i++) {
                        kategoriList += '<option value="'+data[i].id+'">'+data[i].kategori+'</option>';
                    }
                    $('#kategoriArtikel').html(kategoriList);
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
    getListKategori()

    function getListTag() {
        $.ajax({
            url: ServeUrl+"artikel/api_tag_list",
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            type: 'GET',
            dataType: 'json',
            complete: function(response) {
                var data = response.responseJSON.data
                if(response.status == 201){
                    var tagList = '';
                    tagList += '<option>Pilih jenis tag ...</option>';
                    for (let i = 0; i < data.length; i++) {
                        tagList += '<option value="'+data[i].nama_tag+'">'+data[i].nama_tag+'</option>';
                    }
                    $('#tag').html(tagList);
                    $('.chosen-select').chosen({ width: "100%" });
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
    getListTag()

    function submitArtikel() {

        var arrTags = $('#tag').val();

        var tags = '';
        for (let i = 0; i < arrTags.length; i++) {
            tags += ', ' + arrTags[i]
            
        }


        var form = $('#form-data')[0];
        var data = new FormData(form);tags
        data.append("isi_artikel", tinyMCE.get('mytextarea').getContent() );
        data.append("tag", tags );
        $.ajax({
            data: data,
            url: ServeUrl+"artikel/api_save",
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
                            window.location.href = ServeUrl + 'artikel/main'
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
                            window.location.href = ServeUrl + 'artikel/main'
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

