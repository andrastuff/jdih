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
                            <h5><?php echo $title; ?></small></h5>
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
                            <form id="app-form">
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">Judul</label>

                                    <div class="col-sm-10"><input type="text" name="title" id="title" type="text" placeholder="Jusul Website" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Deskripsi</label>
                                    <div class="col-sm-10"><textarea class="form-control" rows="5" name="description" id="description" type="text" placeholder="Deskripsi Website"></textarea><span class="form-text m-b-none">Deskripsi menjelaskan tentang website/aplikasi</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Alamat</label>

                                    <div class="col-sm-10"><textarea class="form-control" name="address" id="address" type="text" placeholder="Alamat"></textarea></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Nomor Kontak</label>

                                    <div class="col-sm-10"><input class="form-control" name="phone" id="phone" type="number" placeholder="Kontak"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row"><label class="col-lg-2 col-form-label">2nd Nomor Kontak</label>

                                    <div class="col-lg-10"><input class="form-control" name="second_phone" id="second_phone" type="number" placeholder="2nd Kontak"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row"><label class="col-lg-2 col-form-label">E-mail Instansi</label>

                                    <div class="col-lg-10"><input class="form-control" name="email" id="email" type="text" placeholder="Alamat E-Mail"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
								<h3 class="text-primary m-t-40 m-b-10">Site Settings</h3>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Google Code <br>
                                    <small class="text-navy">kode google console</small></label>

                                    <div class="col-sm-10">
                                        <div><input class="form-control" name="google_code" id="google_code" type="text" placeholder="Google Code"></div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Meta Description</label>

                                    <div class="col-sm-10">
                                        <div><textarea class="form-control" name="metadesc" id="metadesc" type="text" placeholder="Meta Description"></textarea></div>
                                    </div>
                                </div>
								<div class="hr-line-dashed"></div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Meta Keywoard</label>

                                    <div class="col-sm-10">
                                        <div><textarea class="form-control" name="metakey" id="metakey" type="text" placeholder="Meta Keywoard"></textarea></div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
								 <div class="form-group  row"><label class="col-sm-2 col-form-label">Text Footer</label>

                                    <div class="col-sm-10"><input class="form-control" name="footer" id="footer" type="text" placeholder="Footer Copyright"></div>
                                </div>
								<div class="hr-line-dashed"></div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label" for="footer">Logo</label>
									<div class="col-sm-10">
									<input class="form-control"name="userfile" id="logo" type="file" placeholder="">
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label" for="footer"></label>
									<div class="col-sm-10" id="logoImg">
									
									</div>
								</div>
								
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white btn-sm" type="submit">Cancel</button>
                                        <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>