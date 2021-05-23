<script>
$(document).ready(function() {

$image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
        width: 250,
        height: 250,
        type: 'square' //circle
    },
    boundary: {
        width: 350,
        height: 350
    }
});

$('#upload_image').on('change', function() {
    var reader = new FileReader();
    reader.onload = function(event) {
        $image_crop.croppie('bind', {
            url: event.target.result
        }).then(function() {
            console.log('jQuery bind complete');
        });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
    $('#uploadimageModal').appendTo('body');
});

$('.crop_image').click(function(event) {
    $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function(response) {
        $.ajax({
            url: "<?php echo site_url('users/profile_photo')?>",
            type: "POST",
            data: {
                "image": response
            },
            success: function(data) {
                $('#uploadimageModal').modal('hide');
                $('#uploaded_image').html(data);
                $("#old_image").remove();
                //make alert visible
                $("#alert_photo").show();
            }
        });
    })
});

});


</script>