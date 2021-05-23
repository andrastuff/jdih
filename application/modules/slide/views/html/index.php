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


        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
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

                            <div id="carouselExampleBigIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    
                                </ol>
                                <div class="carousel-inner">
                                    
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleBigIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleBigIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
							<div class="media align-items-center text-center text-md-left flex-column flex-md-row m-0">
								<div class="mt-4">
									<ul class="list-inline list-inline-condensed mb-0">
										<li class="list-inline-item"><button onclick="upload()" class="btn btn-primary border-transparent"><i class="fa fa-upload"></i> Upload Foto</a></button>
										<li id="remove" class="list-inline-item"><button onclick="remove()" class="btn btn-danger border-transparent"><i class="fa fa-trash"></i> Remove</button></li>
									</ul>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
		<div id="modal-upload" class="modal fade" tabindex="-1">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title"><span id="title"></span></h5>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<form id="form-upload" action="#" enctype="multipart/form-data">
					<input name="id" type="hidden" class="form-control">
					<div class="modal-body">
					 
					 <div class="form-group">
						<div class="row">
							<div class="col-sm-12">
								<label>Title</label>
								<input name="judul" type="text" placeholder="" class="form-control">
							</div>
							<div class="col-sm-12">
								<label>Link to</label>
								<input name="link" type="text" placeholder="" class="form-control">
							</div>
							<div class="col-sm-12 mt-2">
								<input type="file" name="file" class="form-control" data-fouc>
								<span class="form-text text-muted">Make sure you're uploading a landscape images.</span>
							</div>
						</div>
					 </div>
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn bg-teal-600">Upload</button>
					</div>
					</form>
				</div>
			</div>
		</div>