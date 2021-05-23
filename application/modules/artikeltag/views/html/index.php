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
					<div class="col-lg-12 pb-4"><button id="create" data-toggle="button" class="btn btn-outline btn-primary" type="button"><i class="fa fa-paste"></i> TAMBAH TAG</button></div>
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-fetch" >
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul Tag</th>
                        <th>Slug Tag</th>
                        <th>Count</th>
                        <th class="text-center" style="width: 30px;"><i class="fa fa-edit"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    
                    </tfoot>
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
                    <label class="col-form-label" for="recipient-name">Judul Tag :</label>
                    <input oninput="handleSubmitForm()" class="form-control" type="text" name="nama_tag" id="dataInput" value="">
                    </div>
                    
                </div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" id="btnSimpan" type="submit">Save</button>
                </div>
            </form>
            </div>
            </div>
        </div>