<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo $title; ?></h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo site_url(); ?>">Home</a>
            </li>
            <li class="breadcrumb-item">
                <span>Master Data</span>
            </li>
            <li class="breadcrumb-item active">
                <strong><?php echo $title; ?></strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight ">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox shadow">
                <div class="ibox-title">
                    <h5><?php echo $title; ?></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="col-lg-12 pb-4 border-bottom">
                        <button id="create" data-toggle="button" class="btn btn-outline btn-primary" type="button"><i class="fa fa-plus mr-1"></i> TAMBAH STATUS</button>
                    </div>
                    <div class="table-responsive pt-4">
                        <table class="table table-striped table-bordered table-hover dataTables-fetch">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 40px;">No.</th>
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

<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="modals" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-data">
                <input class="form-control" type="hidden" name="id" value="">
                <div class="modal-header">
                    <h5 class="modal-title" id="headerModal">Modal Status Box</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label" for="recipient-name">Nama Status :</label>
                        <input oninput="handleSubmitForm()" class="form-control" type="text" id="dataInput" name="status" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button disabled class="btn btn-primary" id="btnSimpan" type="submit" >Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>