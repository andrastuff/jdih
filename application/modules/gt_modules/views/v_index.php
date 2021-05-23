<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Module Generator</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://bootswatch.com/4/darkly/bootstrap.min.css" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-fixed-top navbar-dark bg-dark">
        <div class="container">

            <a class="navbar-brand" href="#">GT-Generator</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03"
                aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor03">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">0.0.1</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="padding-top:20px">
        <div class="row">

            <div class="col-md-12">
                <div id="result"></div>
                <div class="card text-white bg-secondary mb-3">
                    <div class="card-header"><button type="button" onclick="add_module()"
                            class="btn btn-primary btn-sm">Buat Module</button></div>
                    <div class="card-body">
                        <table id="table" class="table table-hover table-sm table-bordered" style="margin-top:10px">
                            <thead>
                                <tr>
                                    <th>Nama Module</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal Add Module -->
    <!-- Modal -->
    <div class="modal fade" id="buat_module" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Module</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_buat">
                        <div class="form-group">

                            <label for="folder">Folder Module</label>
                            <input id="mod_name" name="mod_name" placeholder="nama_folder" class="form-control here"
                                aria-describedby="folderHelpBlock" type="text">
                            <span id="folderHelpBlock" class="form-text text-muted">Kecil tanpa Spasi contoh :
                                admin_data</span>
                        </div>
                        <div class="form-group">
                            <label for="control">Nama Controller</label>
                            <input id="mod_con_name" readonly name="mod_con_name" class="form-control here"
                                aria-describedby="controlHelpBlock" type="text">
                        </div>
                        <div class="form-group">
                            <label for="model">Nama Model</label>
                            <input id="mod_model_name" readonly name="mod_model_name" class="form-control here"
                                aria-describedby="modelHelpBlock" type="text">
                            <span id="modelHelpBlock" class="form-text text-muted">Awalan Besar : Codeigniter
                                3.1.x</span>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" onclick="save()" id="btn_buat" class="btn btn-sm btn-primary">Buat
                        Module</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    var save_method; //for save method string
    var table;

    $(document).ready(function() {

        //datatables
        table = $('#table').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('gt_modules/ajax_get_module')?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [-1], //last column
                "orderable": false, //set not orderable
            }, ],

        });
        $("#mod_name").keyup(function() {
            $(this).val($(this).val().toLowerCase());
            $("#mod_con_name").val(jsUcfirst($("#mod_name").val()));
            $("#mod_model_name").val(jsUcfirst($("#mod_name").val() + '_model'));
        });

    });

    function jsUcfirst(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }

    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax 
    }

    function add_module() {
        save_method = 'add';
        $('#form_buat')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#buat_module').modal('show'); // show bootstrap modal
        $('.modal-title').text('Buat Module'); // Set Title to Bootstrap modal title
    }

    function save() {
        $('#btn_buat').text('Membuat Module...'); //change button text
        $('#btn_buat').attr('disabled', true); //set button disable 
        var url;

        if (save_method == 'add') {
            url = "<?php echo site_url('gt_modules/ajax_gen_modul')?>";
        } else {
            url = "<?php echo site_url('gt_modules/ajax_update')?>";
        }

        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form_buat').serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data.status) //if success close modal and reload ajax table
                {
                    $('#buat_module').modal('hide');
                    reload_table();
                    $("#result").html(
                        '<div class="alert alert-success"><button type="button" class="close">×</button>Berhasil Membuat Module Baru..</div>'
                    );
                    window.setTimeout(function() {
                        $(".alert").slideUp(500, function() {
                            $(this).remove();
                        });
                    }, 4000);
                    $('.alert .close').on("click", function(e) {
                        $(this).parent().slideUp(500);
                    });
                }
                $('#btn_buat').text('Buat'); //change button text
                $('#btn_buat').attr('disabled', false); //set button enable 

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
                $('#btn_buat').text('Buat'); //change button text
                $('#btn_buat').attr('disabled', false); //set button enable 
            }
        });
    }
    </script>
</body>

</html>