<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo humanize($this->router->fetch_module()); ?></h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo site_url('admin_dashboard') ?>">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a><?php echo humanize($this->router->fetch_module()); ?></a>
            </li>
            <li class="breadcrumb-item active">
                <strong><?php echo $this->router->fetch_method(); ?></strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    Profile
                </div>
                <div class="ibox-content">
                <?php echo $this->session->userdata('message'); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                <div id="alert_photo" class="alert alert-success alert-dismissible" role="alert"
                                    style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Sukses!</strong> Foto Berhasil Diperbarui <a
                                        href="<?php echo current_url() ?>" class="btn btn-xs btn-primary"> Refresh
                                        Halaman</a>
                                </div>
                            </div>
                            <?php echo $this->session->userdata('message'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <!--left col-->
                            <div class="text-center">
                                <div id="uploaded_image">
                                    <?php if(empty($user->avatar)){ ?>
                                    <img id="old_image" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
                                        class="img-circle img-thumbnail" alt="avatar">
                                    <?php } else { ?>
                                    <img id="old_image" src="<?php echo base_url('upload/user-photo/'.$user->avatar) ?>"
                                        class="img-circle img-thumbnail" alt="avatar">
                                    <?php } ?>
                                </div>
                                <hr>
                                <input type="file" data-text="Unggah" data-iconName="fa fa-camera" name="upload_image"
                                    class="filestyle" id="upload_image" accept="image/*" />
                            </div>
                            </hr>
                            <br>
                        </div>
                        <!--/col-3-->
                        <div class="col-sm-9">
                            <?php echo form_open('',array( 'class'=>'form-horizontal'));?>
                            <div class="form-group">
                                <?php echo form_label( 'Email', 'email'); echo form_error( 'email'); echo form_input( 'email',set_value( 'email',$user->email),'class="form-control" readonly'); ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label( 'Ubah Password', 'password'); echo form_error( 'password'); echo form_password( 'password', '', 'class="form-control"'); ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label( 'Ulangi Password', 'password_confirm'); echo form_error( 'password_confirm'); echo form_password( 'password_confirm', '', 'class="form-control"'); ?>
                            </div>
                            <?php echo form_submit( 'submit', 'Update Profile', 'class="btn btn-primary btn-md btn-block"');?>
                            <?php echo form_close();?>
                        </div>
                        <!--/col-9-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="uploadimageModal" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sunting Foto</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-9 text-center">
                        <div id="image_demo" style="width:100%; margin-top:30px"></div>
                    </div>
                    <div class="col-md-3" style="margin-top:30px;margin-left:-10px;">
                        <button class="btn btn-success btn-block crop_image"><i class="fa fa-crop"
                                aria-hidden="true"></i> OK & Simpan</button>
                        <button type="button" class="btn btn-block btn-danger" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>