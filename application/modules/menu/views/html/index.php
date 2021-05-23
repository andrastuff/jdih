<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo $title; ?></h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo site_url(); ?>">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <strong><?php echo $title; ?></strong>
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
                    <h5><?php echo $title; ?></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#" class="dropdown-item">Config option 1</a>
                            </li>
                            <li><a href="#" class="dropdown-item">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="col-lg-12 pb-4"><button id="create" data-toggle="button" type="button" class="btn btn-outline btn-primary"><i class="fa fa-plus"></i> Tambah Menu</button></div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-fetch">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 40px;">No.</th>
                                        <th>Parent</th>
                                        <th>Nama Menu</th>
                                        <th>Order Menu</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                        <th class="text-center" style="width: 30px;"><i class="fa fa-edit"></i></th>
                                    </tr>
                                </thead>
                            </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-data">
                <input class="form-control" type="hidden" name="id" value="">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Form Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="col-form-label" for="recipient-name">Parent</label>
                        <input class="form-control" type="number" name="id_parent" value="">
                        <input class="form-control" type="hidden" id="id" name="id" value="">
                    </div>
                    <div class="form-group">
                        <label>Nama Menu</label>
                        <select class="form-control m-b" aria-label="Default select example" id="namaMenu" name="nama_menu">
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="recipient-name">Order Menu</label>
                        <input class="form-control" type="number" name="order_menu" value="">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="recipient-name">Link</label>
                        <input class="form-control" type="text" name="link" value="">
                    </div>
                    <div class="form-group">
   
                        <div class="alert text-white" style="background-color: #1BB394;" role="alert">
                            <label>Status?</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="pb-0 mb-0"><input type="radio" value="y" id="statusRadio1" name="status"> Iya</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="pb-0 mb-0"><input type="radio" checked="" value="n" id="statusRadio1" name="status"> Tidak</label>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>