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
                        <a href="<?php echo site_url('artikel/add_artikel') ?>" class="btn btn-outline btn-primary"><i class="fa fa-plus"></i> <span class="nav-label">Tambah Artikel</span></a>
                    </div>
                    <div class="table-responsive pt-4">
                        <table class="table table-striped table-bordered table-hover dataTables-fetch">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 40px;">No.</th>
                                    <!-- <th>Gambar Cover / Thumbnail</th> -->
                                    <th>Judul Artikel</th>
                                    <th>Isi Artikel</th>
                                    <th>Terakhir Diperbarui</th>
                                    <th>Jumlah Dilihat</th>
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
    <div class="modal-dialog modal-xl" style="max-width: 1000px;" role="document">
        <div class="modal-content">
            <form id="form-data" enctype="multipart/form-data">
                <input class="form-control" type="hidden" name="id" value="">
                <div class="modal-header">
                    <h5 class="modal-title" id="headerModal">Modal Artikel Box</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Judul Artikel</label>
                                <input type="text" class="form-control" name="judul_artikel" aria-label="Judul Artikel">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3 border-bottom">
                            <div class="form-group">
                                <textarea id="mytextarea" name="isi_artikel" placeholder="Tuliskan kontent artikel disini ...."></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 border-bottom">
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control m-b" aria-label="Default select example" id="kategoriArtikel" name="kategori_id">
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 border-bottom">
                            <div class="form-group">
                                <label>Tags</label>
                                <select data-placeholder="Choose a Country..." id="tag" name="tag" class="chosen-select" multiple style="width:350px;" tabindex="4">
                                <!-- <select class="js-example-basic-multiple" multiple="multiple" aria-label="Default select example" id="tag" name="tag"> -->

                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Kata Kunci SEO (Search Engine Optimization) </label>
                                <input type="text" class="form-control" aria-label="Kata Kunci SEO (Search Engine Optimization)" name="metakey">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3 border-bottom">
                            <div class="form-group">
                                <textarea class="form-control" rows="5" id="desc_seo" placeholder="Deskripsi SEO (Search Engine Optimization)" name="metadesc"></textarea>
                            </div>
                        </div>
                        <div class="col-md-10 mb-3 border-bottom">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input id="thumbnail" type="file" class="custom-file-input" name="img" onchange="readURL(this);">
                                            <label for="thumbnail" class="custom-file-label">Gambar Cover / Thumbnail</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Keterangan Gambar" name="caption" aria-label="Keterangan Gambar">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3 border-bottom" >
                            <img id="imageShow" src="https://analisadaily.com/images/loading.gif" name="img" alt="your image" style="max-height: 90px; width: 100%; "/>
                        </div>
                        <div class="col-md-12 mb-3 border-bottom">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" class="form-control" placeholder="Keterangan Gambar" name="tanggal" aria-label="Tanggal">
                            </div>
                        </div>
                        <div class="col-md-12">
                        <div class="alert text-white" style="background-color: #1BB394;" role="alert">
                            <label>Apakah ini artikel / berita utama?</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="pb-0 mb-0"><input type="radio" value="publish" id="statusRadio1" name="utama"> Ya, ini artikel / berita utama</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="pb-0 mb-0"><input type="radio" checked="" value="publish" id="statusRadio1" name="utama"> Tidak, ini bukan artikel / berita utama</label>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" id="btnSimpan" onclick="submitArtikel()" type="button" >Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
