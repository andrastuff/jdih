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
                    <a href="<?php echo site_url('users_groups/create') ?>" class="btn btn-primary" type="button">Add Group</a>
                </div>
                <div class="ibox-content">
                <div id="infoMessage"><?php echo $message;?></div>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Descriptions</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php /*foreach ($groups as $group):?>
                                <tr>
                                    <td><?php echo htmlspecialchars($group->id,ENT_QUOTES,'UTF-8');?></td>
                                    <td><?php echo htmlspecialchars($group->name,ENT_QUOTES,'UTF-8');?></td>
                                    <td><?php echo htmlspecialchars($group->description,ENT_QUOTES,'UTF-8');?></td>
                                    <td>
                                        <a href="<?php echo site_url('users_groups/edit/'.$group->id) ?>" class="btn btn-xs btn-info"> Edit</a>

                                    </td>
                                </tr>
                                <?php endforeach;*/?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>