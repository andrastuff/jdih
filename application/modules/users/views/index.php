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
                    <a href="<?php echo site_url('users/create_user') ?>" class="btn btn-primary" type="button">Add Users</a>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th><?php echo lang('index_fname_th');?></th>
                                    <th><?php echo lang('index_lname_th');?></th>
                                    <th><?php echo lang('index_email_th');?></th>
                                    <th><?php echo lang('index_groups_th');?></th>
                                    <th><?php echo lang('index_status_th');?></th>
                                    <th><?php echo lang('index_action_th');?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php /* foreach ($users as $user):?>
                                <tr>
                                    <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
                                    <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
                                    <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
                                    <td>
                                        <?php foreach ($user->groups as $group):?>
                                        <?php echo anchor("users/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
                                        <?php endforeach?>
                                    </td>
                                    <td><?php echo ($user->active) ? anchor("users/deactivate/".$user->id, lang('index_active_link')) : anchor("users/activate/". $user->id, lang('index_inactive_link'));?>
                                    </td>
                                    <td><?php echo anchor("users/edit_user/".$user->id, 'Edit') ;?></td>
                                </tr>
                                <?php endforeach; */?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>