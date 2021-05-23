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
                <form id="form-data" enctype="multipart/form-data">
                <input class="form-control" type="hidden" name="id" value="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Judul Artikel</label>
                                <input type="text" class="form-control" id="judul_artikel" name="judul_artikel" aria-label="Judul Artikel">
                                <input type="hidden" class="form-control" id="idArtikels" name="id" aria-label="Judul Artikel">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3 border-bottom">
                            <div class="form-group">
                                <textarea id="mytextarea" placeholder="Tuliskan kontent artikel disini ...."></textarea>
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
                                <select data-placeholder="Pilih tag artikel" id="tag" class="chosen-select" multiple style="width:350px;" tabindex="4">
                                <!-- <select class="js-example-basic-multiple" multiple="multiple" aria-label="Default select example" id="tag" name="tag"> -->

                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Kata Kunci SEO (Search Engine Optimization) </label>
                                <input type="text" class="form-control" id="metakey"  aria-label="Kata Kunci SEO (Search Engine Optimization)" name="metakey">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3 border-bottom">
                            <div class="form-group">
                                <textarea class="form-control" rows="5" id="metadesc" placeholder="Deskripsi SEO (Search Engine Optimization)" name="metadesc"></textarea>
                            </div>
                        </div>
                        <div class="col-md-10 mb-3 border-bottom">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input id="thumbnail" type="file" class="custom-file-input" name="img" onchange="readURL(this);">
                                            <label for="thumbnail" id="labelImage" class="custom-file-label">Gambar Cover / Thumbnail</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="caption" placeholder="Keterangan Gambar" name="caption" aria-label="Keterangan Gambar">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3 border-bottom" >
                            <img id="imageShow" src="https://analisadaily.com/images/loading.gif" name="img" alt="your image" style="max-height: 90px; width: 100%; "/>
                        </div>
                        <div class="col-md-4 mb-3 border-bottom">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" class="form-control"  placeholder="Keterangan Gambar" id="tanggal" name="tanggal" aria-label="Tanggal">
                            </div>
                        </div>
                        <div class="col-md-12">
                        <div class="alert text-white" style="background-color: #1BB394;" role="alert">
                            <label>Apakah ini artikel / berita utama?</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="pb-0 mb-0"><input type="radio" value="publish" id="checkUtama" name="utama"> Ya, ini artikel / berita utama</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="pb-0 mb-0"><input type="radio" checked="" value="publish" id="uncheckUtama" name="utama"> Tidak, ini bukan artikel / berita utama</label>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                   
                    <button class="btn btn-primary" id="btnSimpan" onclick="updateArtikel()" type="button" >Simpan</button>
                
            </form>
            </div>
        </div>
    </div>
</div>