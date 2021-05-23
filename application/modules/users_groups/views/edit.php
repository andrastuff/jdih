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
                    <?php echo lang('edit_group_heading');?>
                </div>
                <div class="ibox-content">
                    <p><?php echo lang('edit_group_subheading');?></p>

                    <div id="infoMessage"><?php echo $message;?></div>

                    <?php echo form_open(current_url());?>

                    <p>
                        <?php echo lang('edit_group_name_label', 'group_name');?> <br />
                        <?php echo form_input($group_name);?>
                    </p>

                    <p>
                        <?php echo lang('edit_group_desc_label', 'description');?> <br />
                        <?php echo form_input($group_description);?>
                    </p>

                    <p><?php echo form_submit('submit', lang('edit_group_submit_btn'),['class' => 'btn btn-primary']);?></p>

                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>