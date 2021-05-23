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
                    Edit User
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <div id="infoMessage"><?php echo $message;?></div>
                        <?php echo form_open(uri_string());?>

                        <p>
                            <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
                            <?php echo form_input($first_name);?>
                        </p>

                        <p>
                            <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
                            <?php echo form_input($last_name);?>
                        </p>

                        <p>
                            <?php echo lang('edit_user_company_label', 'company');?> <br />
                            <?php echo form_input($company);?>
                        </p>

                        <p>
                            <?php echo lang('edit_user_phone_label', 'phone');?> <br />
                            <?php echo form_input($phone);?>
                        </p>

                        <p>
                            <?php echo lang('edit_user_password_label', 'password');?> <br />
                            <?php echo form_input($password);?>
                        </p>

                        <p>
                            <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
                            <?php echo form_input($password_confirm);?>
                        </p>

                        <?php if ($this->ion_auth->is_admin()): ?>

                        <h3><?php echo lang('edit_user_groups_heading');?></h3>
                        <?php foreach ($groups as $group):?>
                        <label class="checkbox">
                            <?php
                                                    $gID=$group['id'];
                                                    $checked = null;
                                                    $item = null;
                                                    foreach($currentGroups as $grp) {
                                                        if ($gID == $grp->id) {
                                                            $checked= ' checked="checked"';
                                                        break;
                                                        }
                                                    }
                                                ?>
                            <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"
                                <?php echo $checked;?>>
                            <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                        </label>
                        <?php endforeach?>

                        <?php endif ?>

                        <?php echo form_hidden('id', $user->id);?>
                        <?php echo form_hidden($csrf); ?>

                        <p><?php echo form_submit('submit', lang('edit_user_submit_btn') ,array('class' => 'btn btn-primary'));?>
                        </p>

                        <?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>