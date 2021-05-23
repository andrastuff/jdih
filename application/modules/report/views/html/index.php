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
					<form>
					<div class="box-header"><h4 class="">FILTER</h4></div>
                     <div class="box-body pt-2">  
                               <div class="form-row">
									<div class="form-group col-sm-4">
										<label>Tahun</label>
										<?php $start = date('Y') ; $end = 2010; ?> 
										<select name="tahun" class="years form-control form-control-md" onchange="this.form.submit()">
											 
											<?php for($i=$end; $i<=$start; $i++) { ?>
											<option value="<?php echo $i; ?>" <?php if($start == $i){ echo 'selected'; } ?>> <?php echo ucwords($i); ?> </option>
											<?php } ?>
										</select>
									</div>
									 
									<div class="form-group col-sm-4">
										<label>Type Dokumen</label>
										<select name="tipedokumen" class="form-control form-control-md">
											
										</select>
										<div class="form-control-focus"></div>
										<span class="help-block"></span>
									</div>
									<div class="form-group col-sm-4">
										<label>Jenis Peraturan</label>
										<select name="jenisdokumen" class="form-control form-control-md" onchange="this.form.submit()">
											
										</select>
										<div class="form-control-focus"></div>
										<span class="help-block"></span>
									</div>
								</div>
						</div>
                    </form>

					</div>
                    <div class="table-responsive pt-4">
                        <table class="table table-striped table-bordered table-hover dataTables-fetch">
                            <thead>
                                <tr>
                                    <th class="text-center" width="5%">No.</th>
                                    <!-- <th>Gambar Cover / Thumbnail</th> -->
                                    <th width="60%">Judul</th>
                                    <th width="10%">Tahun</th>
                                    <th width="10%">Singkatan Bentuk</th>
                                   
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<