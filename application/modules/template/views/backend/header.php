<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>INSPINIA | Dashboard</title>
    <link href="<?php echo theme_assets('inspina') ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo theme_assets('inspina') ?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- Toastr style -->
    <link href="<?php echo theme_assets('inspina') ?>css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <!-- Gritter -->
    <link href="<?php echo theme_assets('inspina') ?>js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="<?php echo theme_assets('inspina') ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo theme_assets('inspina') ?>css/style.css" rel="stylesheet">
    <link href="<?php echo theme_assets('inspina') ?>css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
	<link href="<?php echo theme_assets('inspina') ?>css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
    <link href="<?php echo theme_assets('inspina') ?>css/plugins/select2/select2.min.css" rel="stylesheet">
    
    <!-- Sweet Alert -->
    <style>

    .swal2-container {
        z-index: 3000 !important;
    }

    .dataTables_length {
        width: auto;
        margin-left: 20px;
    }

    .dataTables_length label {
        width: auto;
        float: right;
    }

    .dataTables_filter label {
        width: 30%;
        float: right;
    }

    .html5buttons {
        float: left;
        margin-top: 20px;
    }

    .DataTables_Table_0_info {
        display: none !important;
    }

    </style>
    <!-- Load User Session On Main Header  -->
    <!-- Load Page CSS  -->
    <?php if(isset($header) && !empty($header)): ?>
        <?php foreach($header as $header): ?>
            <link href="<?php echo $header?>" rel="stylesheet">
        <?php endforeach ?>
    <?php endif ?>
	<script>
	var ServeUrl = "<?php echo base_url(); ?>";
	 
	</script>
</head>