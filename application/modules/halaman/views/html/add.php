<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo $title; ?></h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo site_url(); ?>">Home</a>
            </li>
            <li class="breadcrumb-item">
                <span>Halaman</span>
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
                <form id="form-data" enctype="multipart/form-data">
                <input class="form-control" type="hidden" name="id" value="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Judul Halaman</label>
                                <input type="text" class="form-control"  name="judul" aria-label="Judul Artikel">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3 border-bottom">
                            <div class="form-group">
                                <textarea id="mytextarea" placeholder="Tuliskan kontent disini ...."></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Keyword</label>
                                <input type="text" class="form-control" name="keyword">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text" class="form-control"  name="description">
                            </div>
                        </div>
                       
                        <div class="col-md-12">
                        <div class="alert text-white" style="background-color: #1BB394;" role="alert">
                            <label>Status</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="pb-0 mb-0"><input type="radio" value="publish" id="statusRadio1" name="status"> Publish halaman ini</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="pb-0 mb-0"><input type="radio" checked="" value="unpublish" id="statusRadio1" name="status"> Jangan publish halaman Ini</label>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                   
                    <button class="btn btn-primary" id="btnSimpan" onclick="submitHalaman()" type="button" >Simpan</button>
                
            </form>
            </div>
        </div>
    </div>
</div>