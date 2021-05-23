<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login</title>

    <link href="<?php echo theme_assets('inspina') ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo theme_assets('inspina') ?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo theme_assets('inspina') ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo theme_assets('inspina') ?>css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">GT+</h1>
            </div>
            <h3>Welcome to GT+</h3>
            <p>Login in. To see it in action.</p>
            <?php echo $message;?>
            <form class="m-t" role="form"  method="POST" action="<?php echo base_url('auth/login') ?>">
                <div class="form-group">
                    <input  class="form-control" id="username" name="identity" placeholder="Enter Email" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="userpassword" name="password" placeholder="Enter password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo theme_assets('inspina') ?>js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo theme_assets('inspina') ?>js/popper.min.js"></script>
    <script src="<?php echo theme_assets('inspina') ?>js/bootstrap.js"></script>

</body>

</html>

