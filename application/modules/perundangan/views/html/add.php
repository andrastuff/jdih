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
				<div class="nav nav-md h6">
                        <a id="step1"  class="nav-link mr-2 active show" data-toggle="tab" data-target="#tab1">
                            <i class="fa fa-plus-circle"></i> Data Utama
                        </a>
                        <a id="step2p" style="display: none;" class="nav-link mr-2 " data-toggle="tab" data-target="#tab2p">
                            <i class="fa fa-plus-circle"></i>&#160;<label class="labelku"></label>
                        </a>
                        <a id="step3" style="display: none;" class="nav-link mr-2 " data-toggle="tab" data-target="#tab3">
                            <i class="fa fa-plus-circle"></i> Subjek
                        </a>
                        <a id="step4" style="display: none;" class="nav-link mr-2 " data-toggle="tab" data-target="#tab4">
                            <i class="fa fa-plus-circle"></i>&#160;<label class="labellamp"></label>
                        </a>
                        <a id="step5" style="display: none;" class="nav-link mr-2 " data-toggle="tab" data-target="#tab5">
                            <i class="fa fa-plus-circle"></i> Status
                        </a>

                    </div>
					<hr>
			<form id="form-data" enctype="multipart/form-data" novalidate>
			<input id="dokumen_id" type="hidden" class="form-control"  name="dokumen_id">
			<div class="tab-content p-3 mb-3">
			
				<div class="tab-pane animate fadeIn text-muted active show" id="tab1">
                
                <input class="form-control" type="hidden" name="id" value=""/>
                    <div class="row">
						<div class="col-md-6 mb-3 border-bottom">
                            <div class="form-group">
                                <label>Type Pengolahan Dokumen</label>
                                <select class="form-control m-b" aria-label="Default select example" id="typeDokumen" name="type_dokumen">
                                    
                                </select>
                            </div>
                        </div>
					</div>
                    
					<div id="divdivan" style="display: none;">
						<div class="box">
							<div class="box-divider m-0"></div>
							<div class="box-header"><h4 class="">Form Peraturan Perundang-Undangan</h4></div>
							<br>
							<div class="box-body">
								<div class="form-row">
									<div class="form-group col-sm-5">
										<label>Jenis Peraturan</label>
										<select id="jenis_peraturan1" class="form-control mb"
												 name="jenis_peraturan1">
										</select>
										<br>
										<div class="subjenis" style="display: none;">
										  <label>Sub Jenis Peraturan</label>
										  <select id="jenis_peraturan1a" class="form-control turunanDua select2"
												  style="display: none;width:100%;" name="jenis_peraturan1a">
										  </select>
										</div>
									</div>
									<div class="col-md-1"></div>
									<div class="form-group col-sm-5">
										<label>Singkatan Jenis Peraturan</label>
										<input id="singkatan_bentuk1" type="text" class="form-control"
											   name="singkatan_bentuk1" required="">
										<div class="form-control-focus"></div>
										<span class="help-block"></span>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-5">
										<label>Judul</label>
										<input type="text" id="juduldatautama" 
											   class="form-control" name="judul1"
											   required="">
									</div>
									<div class="col-md-1"></div>
									<div class="form-group col-sm-5">
										<label>Nomor Peraturan</label>
										<input id="nomor_peraturan1" type="text" class="form-control"
											   name="nomor_peraturan1" required="">
										<div class="form-control-focus"></div>
										<span class="help-block"></span>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-5">
										<label>Tahun</label>
										<?php $start = date('Y') ; $end = 2010; ?> 
										<select name="tahun_terbit1" class="years form-control form-control-md">
											 
											<?php for($i=$end; $i<=$start; $i++) { ?>
											<option value="<?php echo $i; ?>" <?php if($start == $i){ echo 'selected'; } ?>> <?php echo ucwords($i); ?> </option>
											<?php } ?>
										</select>
										 
									</div>
									<div class="col-md-1"></div>
									<div class="form-group col-sm-5">
										<label>Bidang Hukum</label>
										<select id="bidang_hukum1" class="form-control select2"
												name="bidang_hukum1" style="width:100%;">
											
										</select>
										<div class="form-control-focus"></div>
										<span class="help-block"></span>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-5">
										<label>Tempat Penetapan</label>
										<input id="tempat_terbit1" type="text" class="form-control"
											   name="tempat_terbit1" required="">
										
									</div>
									<div class="col-md-1"></div>
									<div class="form-group col-sm-5">
										<label>Tanggal Penetapan</label>
										<input type="date" class="form-control" name="tanggal_penetapan"
											   required=""
											   id="tanggal_penetapan">
										<div class="form-control-focus"></div>
										<span class="help-block"></span>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-5">
										<label>Tanggal Pengundangan</label>
										<input id="tanggal_pengundangan" type="date" class="form-control" name="tanggal_pengundangan" required="" id="tapeng">
									</div>
									<div class="col-md-1"></div>
									<div class="form-group col-sm-5">
										<label>Sumber</label>
										<input id="sumber1" type="text" class="form-control" name="sumber1"
											   required="">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-5">
										<label>Pemrakarsa</label>
										<input type="text" class="form-control" id="pemrakarsa" name="pemrakarsa">
									</div>
									<div class="col-md-1"></div>
									<div class="form-group col-sm-5">
										<label>Penandatanganan</label>
										<input type="text" class="form-control" id="penandatanganan"
											   name="penandatanganan">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-5">
									  <label>Bahasa</label>
									  <select id="bahasa1" class="form-control select2" name="bahasa1"
											  style="width:100%;">
										 
									  </select>
									  
									</div>
									<div class="col-md-1"></div>
									<div class="form-group col-sm-5">
									  <label>Urusan Pemerintahan</label>
									  <select id="urusan_pemerintahan" class="form-control select2" name="urusan_pemerintahan"
											  style="width:100%;">
										 
									  </select>
									  
									</div>
								</div>
							</div>
						</div>
						<br>
						
					</div>

					<div id="divdivanmh" style="display: none;">
						<div id="mono1">
							<div class="box">
								<div class="box-divider m-0"></div>
								<div class="box-header"><h4 class="">Monografi Hukum</h4>
								</div>
								<br>
								<div class="box-body">
									<div class="form-row">
										<div class="form-group col-sm-5">
											<label>Jenis Bentuk Monografi</label>
											<select class="form-control"
													id="jenis_peraturan2"
													name="jenis_peraturan2">
											</select>
											<div class="subjenis" style="display: none;">
											  <label>Sub Jenis Peraturan</label>
											  <select class="form-control turunanDua2 select2" id="jenis_peraturan2a"
													  style="display: none;width:100%;" name="jenis_peraturan2a">
											  </select>
											</div>
										</div>
										<div class="col-md-1"></div>
										<div class="form-group col-sm-5">
											<label>Judul</label>
											<input type="text" id="juduldatautamamh" 
												   class="form-control" name="judul2"
												   required="">
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-sm-5">
											<label>Tahun</label>
											<?php $start = date('Y') ; $end = 2010; ?> 
										<select name="tahun_terbit2" class="years form-control form-control-md">
											 
											<?php for($i=$end; $i<=$start; $i++) { ?>
											<option value="<?php echo $i; ?>" <?php if($start == $i){ echo 'selected'; } ?>> <?php echo ucwords($i); ?> </option>
											<?php } ?>
										</select>
										</div>
										<div class="col-md-1"></div>
										<div class="form-group col-sm-5">
											<label>Nomor Panggil</label>
											<input id="nomor_panggil" type="text" class="form-control"
												   name="nomor_panggil" required="">
											<div class="form-control-focus"></div>
											<span class="help-block"></span>
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-sm-5">
											<label>Edisi</label>
											<input id="edisi" type="text" class="form-control" name="edisi"
												   required="">
										</div>
										<div class="col-md-1"></div>
										<div class="form-group col-sm-5">
											<label>Tempat Terbit</label>
											 <input id="tempat_terbit2" type="text" class="form-control"
											   name="tempat_terbit2" required="">
											<div class="form-control-focus"></div>
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-row">
										<!-- mindystart -->
										<div class="form-group col-sm-5">
											<label>Penerbit</label>
											<select id="penerbit" class="form-control penerbitajax"
													name="penerbit" style="width:100%;">
											</select>
											<div class="form-control-focus"></div>
											<span class="help-block"></span>
										</div>
										<!-- mindyend -->
										<div class="col-md-1"></div>
										<div class="form-group col-sm-5">
											<label>Deskripsi Fisik</label>
											<input type="text" class="form-control" name="deskripsi_fisik"
												   required=""
												   id="deskripsi_fisik">
											<div class="form-control-focus"></div>
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-sm-5">
											<label>ISBN</label>
											<input id="isbn" type="text" class="form-control" name="isbn"
												   required="">
										</div>
										<div class="col-md-1"></div>
										<div class="form-group col-sm-5">
											<label>Bahasa</label>
											<select id="bahasa2" class="form-control select2" name="bahasa2"
													style="width:100%;">
												
											</select>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>

					<div id="divdivanah" style="display: none;">
						<div class="box">
							<div class="box-divider m-0"></div>
							<div class="box-header"><h4 class="">Artikel Hukum</h4></div>
							<br>
							<div class="box-body">
								<div class="form-row">
									<div class="form-group col-sm-5">
										<label>Jenis Bentuk Peraturan</label>
										<select class="form-control select2 turunanSatu3" id="jenis_peraturan3"
												 name="jenis_peraturan3">
										</select>
										<div class="subjenis" style="display: none;">
										  <label>Sub Jenis Peraturan</label>
										  <select class="form-control turunanDua3 select2"
												  style="display: none;width:100%;" name="jenis_peraturan3a" id="jenis_peraturan3a">
										  </select>
										</div>
									</div>
									<div class="col-md-1"></div>
									<div class="form-group col-sm-5">
										<label>Bidang Hukum</label>
										<select id="bidang_hukum3" class="form-control select2"
												name="bidang_hukum3" style="width:100%;">
											
										</select>
										<div class="form-control-focus"></div>
										<span class="help-block"></span>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-5">
										<label>Judul</label>
										<input type="text" id="judul3" 
											   class="form-control" name="judul3"
											   required="">
									</div>
									<div class="col-md-1"></div>
									<div class="form-group col-sm-5">
										<label>Tahun</label>
										<?php $start = date('Y') ; $end = 2010; ?> 
										<select name="tahun_terbit3" class="years form-control form-control-md">
											 
											<?php for($i=$end; $i<=$start; $i++) { ?>
											<option value="<?php echo $i; ?>" <?php if($start == $i){ echo 'selected'; } ?>> <?php echo ucwords($i); ?> </option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-5">
										<label>Bahasa</label>
										<select id="bahasa3" class="form-control select2" name="bahasa3"
												style="width:100%;">
											
										</select>
										
									</div>
									<div class="col-md-1"></div>
									<div class="form-group col-sm-5">
										<label>Sumber</label>
										<input id="sumber3" type="text" class="form-control" name="sumber3"
											   required="">
									</div>
								</div>
								<div class="form-row">
									
									 
									<div class="form-group col-sm-5">
										<label>Judul Seri</label>
										<input id="judul_seri" type="text" class="form-control"
											   name="judul_seri" required="">
									</div>
								</div>
							</div>
						</div>
					</div>
				
					<div id="divdivanpp" style="display: none;">
						<div class="box">
							<div class="box-divider m-0"></div>
							<div class="box-header"><h4 class="">Putusan</h4>
							</div>
							<br>
							<div class="box-body">
								<div class="form-row">
									<div class="form-group col-sm-5">
										<label>Jenis Putusan</label>
										<select class="form-control select2 turunanSatu4" id="jenis_peraturan4"
											 name="jenis_peraturan4">
										</select>
										<div class="subjenis" style="display: none;">
										  <label>Sub Jenis Peraturan</label>
										  <select id="jenis_peraturan4a" class="form-control turunanDua4 select2"
												  style="display: none;width:100%;" name="jenis_peraturan4a">
										  </select>
										</div>
									</div>
									<div class="col-md-1"></div>
									<div class="form-group col-sm-5">
										<label>Singkatan Jenis Putusan</label>
										<input id="singkatan_bentuk4" type="text" class="form-control"
											   name="singkatan_bentuk4" required="">
										<div class="form-control-focus"></div>
										<span class="help-block"></span>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-5">
										<label>Pokok Perkara</label>
										<input type="text" id="juduldatautamapp" 
											   class="form-control" name="judul4"
											   required="">
									</div>
									<div class="col-md-1"></div>
									<div class="form-group col-sm-5">
										<label>Nomor Putusan</label>
										<input id="nomor_peraturan4" type="text" class="form-control"
											   name="nomor_peraturan4" required="">
										<div class="form-control-focus"></div>
										<span class="help-block"></span>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-5">
										<label>Tingkat Proses</label>
										<select id="bidang_hukum4" class="form-control select2" name="bidang_hukum4" style="width:100%;">
											<option selected="selected" value="" disabled="">Tingkat proses...</option>
											<option value="Pertama">Pertama</option>
											<option value="Banding">Banding</option>
											<option value="Kasasi">Kasasi</option>
											<option value="Peninjauan_Kembali">Peninjauan Kembali (PK)</option>
											<!-- @foreach($dbd as $bd)
												<option value="{{ $bd->id }}">{{ $bd->id }}
													- {{ $bd->name }}</option>
											@endforeach -->
										</select>
										<div class="form-control-focus"></div>
										<span class="help-block"></span>
									</div>
									<div class="col-md-1"></div>
									<div class="form-group col-sm-5">
										<label>Tempat Penetapan</label>
										<select id="tempat_terbit4" class="form-control tepenpen"
												name="tempat_terbit4" style="width:100%;">
										</select>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-5">
										<label>Tanggal Dibacakan</label>
										<input type="text" class="form-control" name="tanggal_dibacakan4"
											   required=""
											   id="tanggal_dibacakan4">
										<div class="form-control-focus"></div>
										<span class="help-block"></span>
									</div>
									<div class="col-md-1"></div>
									<div class="form-group col-sm-5">
										<label>Bahasa</label>
										<select id="bahasa4" class="form-control select2" name="bahasa4"
												style="width:100%;">
											
										</select>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-5">
										<label>Sumber</label>
										<input id="sumber4" type="text" class="form-control" name="sumber4"
											   required="">
									</div>
									<div class="col-md-1"></div>
									<div class="form-group col-sm-5">
										<label>Tahun</label>
										<input id="taper" type="text" class="form-control"
											   name="tahun_terbit4" required="">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-5">
										<label>Lembaga Peradilan</label>
										<input id="lemper" type="text" class="form-control" name="lemper"
											   required="">
									</div>
									<div class="col-md-1"></div>
									<div class="form-group col-sm-5">
										<label>Pemohon / Penggugat</label>
										<input id="pempen" type="text" class="form-control" name="pempen"
											   required="">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-5">
										<label>Termohon / Tergugat</label>
										<input id="terter" type="text" class="form-control"
											   name="terter" required="">
									</div>
									<div class="col-md-1"></div>
									<div class="form-group col-sm-5">
										<label>Jenis Perkara</label>
										<input id="jeper" type="text" class="form-control" name="jeper"
											   required="">
									</div>
								</div>
								
								<div class="form-row">
									<div class="form-group col-sm-5">
										<label>Amar / Status</label>
										<input id="amstat" type="text" class="form-control" name="amstat"
											   required="">
									</div>
									<div class="col-md-1"></div>
									<div class="form-group col-sm-5">
										<label>Catatan Amar</label>
										<input id="camar" type="text" class="form-control" name="camar"
											   required="">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-5">
										<label>Berkekuatan Hukum Tetap</label>
										<input id="berak" type="text" class="form-control" name="berak"
											   required="">
									</div>
									
								</div>
							</div>
						</div>
					</div>
	
					<div class="form-row btnstep1">    <!-- button selanjutnya-->
						<div class="col-sm-6">
						  <button id="submit-dokumen" type="submit" class="btn btn-warning pull-right btnstep1" name="submit" value="draft"><i
									  class="fa fa-save"></i> Simpan
						  </button>
						</div>
						<div class="col-sm-5">
							<button id="btnstep1" type="button"
									class="btn btn-primary btn-sm pull-right draft1error" name="submit" value="draft1"><i
										class="fa fa-arrow-right"></i> Selanjutnya
							</button>
						</div>
						<div class="col-sm-1"></div>
					</div>
				</div>	
           
              
           
			
				<div class="tab-pane animate fadeIn text-muted" id="tab2p" hidden>
								<div class="box-body">
									<div class="mb-2">
										<div style="margin-left:15px; margin-right:15px;">
											<h3 style="color: #452d3a;" class="labelku"></h3>
												<div class="pull-right mb-4">
														<button type="button" class="btn btn-outline-success" data-toggle="modal"
																data-target="#modal-addteup"><i
																	class="fa fa-plus-circle"></i> Tambah List
														</button>
													  
												</div>
											<table class="table table-bordered table-striped" id='theadteu'>
												<thead>
												<tr>
													<th style="width: 30%">
														<center>Nama</center>
													</th>
													<th style="width: 30%">
														<center>Tipe</center>
														
													</th>
													<th style="width: 30%">
														<center>Jenis</center>
													</th>
													<th>
														<center>Action</center>
													</th>
												</tr>
												</thead>
												<tbody id="tablepengarang">

												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="form-row">    <!-- button selanjutnya-->
									<div class="col-sm-6">
									  
									</div>
									<div class="col-sm-5">
										<button id="btnstep2p" type="button"
												class="btn btn-primary pull-right draft2p" name="submit" value="draft2p"><i
													class="fa fa-arrow-right"></i> Selanjutnya
										</button>
									</div>
									<div class="col-sm-1"></div>
								</div>
							
				</div>
				
				<div class="tab-pane animate fadeIn text-muted" id="tab3" hidden>
								<div class="box-body">
									<div class="mb-2"><br>
										<div style="margin-left:15px; margin-right:15px;">
											<h3><font color="#452d3a">
													Subjek
												</font></h3>
												<div class="pull-right mb-4">
														<button type="button" class="btn btn-outline-success" data-toggle="modal"
																data-target="#modal-addsubjek"><i
																	class="fa fa-plus-circle"></i> Tambah List
														</button>
													  
												</div>
											
											<table class="table table-bordered table-striped" id='dynamic2'>
												<thead>
												<tr>
													<th style="width: 30%">
														<center>Nama</center>
													</th>
													<th style="width: 30%">
														<center>Tipe</center>
													</th>
													<th style="width: 30%">
														<center>Jenis</center>
													</th>
													<th>
														<center>Action</center>
													</th>
												</tr>
												</thead>
												<tbody id="tablesubyek">

												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="form-row">    <!-- button selanjutnya-->
									<div class="col-sm-6">
									 
									</div>
									<div class="col-sm-5">
										<button id="btnstep3" type="button"
												class="btn btn-primary pull-right draft3" name="submit" value="draft3"><i
													class="fa fa-arrow-right"></i> Selanjutnya
										</button>
									</div>
									<div class="col-sm-1"></div>
								</div>
							</div>
				<div class="tab-pane animate fadeIn text-muted" id="tab4" hidden>
					<div class="box-body">
						<div class="mb-2"><br>
							<div style="margin-left:15px; margin-right:15px;">
								<h3 style="color: #452d3a;" class="labellamp">Lampiran</h3>
								<div class="pull-right mb-4">
											<button type="button" class="btn btn-outline-success" data-toggle="modal"
													data-target="#modal-addlampiran"><i
														class="fa fa-plus-circle"></i> Tambah List
											</button>
										  
									</div>
								
								<table class="table table-bordered table-striped" id='dynamic2'>
									<thead>
									  <tr>
										  <th style="width: 40%">
											  <center>Judul</center>
										  </th>
										  <th style="width: 40%">
											  <center>URL</center>
										  </th>
										  <th style="width: 20%">
											  <center>Aksi</center>
										  </th>
									  </tr>
									</thead>
									<tbody id="tablelamp">

									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-sm-6">
						  
						</div>
						<div class="col-sm-5">
							<button id="btnstep4" type="button"
									class="btn btn-primary pull-right draft4" name="submit" value="draft4"><i
										class="fa fa-arrow-right"></i> Selanjutnya
							</button>
						</div>
						<div class="col-sm-1"></div>
					</div>
				</div>
				<div class="tab-pane animate fadeIn text-muted" id="tab5" hidden>
					<div class="box-body">
						<div class="mb-2">
							<div style="margin-left:15px; margin-right:15px;">
								<h3><font color="#452d3a">
										Status
									</font></h3>
									<div class="pull-right mb-4">
											<button type="button" class="btn btn-outline-success" data-toggle="modal"
													data-target="#modal-addstat"><i
														class="fa fa-plus-circle"></i> Tambah List
											</button>
										  
									</div>
								
								<table class="table-dragable table table-bordered table-striped" id='dynamic2'>
									<thead>
									<tr>
										<th style="width: 10%">
											<center>Status</center>
										</th>
										<th style="width: 40%">
											<center>Judul Dokumen (Target)</center>
										</th>
										<th style="width: 40%">
											<center>Catatan</center>
										</th>
										<th style="width: 10%">
											<center>Action</center>
										</th>
									</tr>
									</thead>
									<tbody id="tablestatus">

									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="form-row">
						 
						
						<div class="col-sm-1"></div>
					</div>
				</div>
				
             </div>         
             </form>
			</div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="modal-addteup" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="row-col h-v">
        <div class="row-cell v-m">
            <div class="modal-dialog modal-lg">
				<form id="form-teu" novalidate>
				<input type="hidden" class="perundangan_id" name="perundangan_id">
                <div class="modal-content">
                    <div class="modal-header">
                    <div style="width: 90%;"><h4>T.E.U Badan</h4></div>
                        <button type="button" class="btn btn-danger p-x-md" data-dismiss="modal">X</button>
                    </div>
                    <div class="modal-body text-center p-lg" style="background-color: #ffffff;" id="state">
                        <div class="box-header">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" style="color: #452d3a;">Nama</label>
                                    <div class="col-sm-4">
									<input type="text" name="namapengarang" id="namapengarang" class="form-control">
                                      
                                    </div>
                                    <i class="fa fa-flag" id="flag_nama_pengarang" aria-hidden="true" style="color:red; -webkit-transform: rotate(30deg); display: none; padding-top: 10px;"></i>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" style="color: #452d3a;">Tipe</label>
                                    <div class="col-sm-4">
                                        <select name="tipepengarang" id="tipepengarang" class="form-control select2" style="width:100%;">
                                            <option selected="selected" value="">Silahkan Pilih ... </option>
                                                <option value="Nama Orang">Nama Orang</option>
                                                <option value="Badan / Organisasi">Badan / Organisasi</option>
                                                <option value="Konfrensi">Konfrensi</option>
                                           
                                        </select>
                                    </div>
                                    <i class="fa fa-flag" id="flag_tipe_pengarang" aria-hidden="true" style=" display: none; padding-top: 10px;"></i>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" style="color: #452d3a;">Jenis</label>
                                    <div class="col-sm-4">
                                        <select name="jenispengarang" id="jenispengarang" class="form-control select2" style="width:100%;">
                                            <option selected="selected" value="">Silahkan Pilih ...</option>
                                            <option value="Pengarang Utama">Pengarang Utama</option>
											<option value="Pengarang Tambahan">Pengarang Tambahan</option>
											<option value="Penyunting">Penyunting</option>
											<option value="Penerjemah">Penerjemah</option>
											<option value="Direktur">Direktur</option>
											<option value="Produser">Produser</option>
											<option value="Pengubah">Pengubah</option>
											<option value="Ilustrator">Ilustrator</option>
											<option value="Pencipta">Pencipta</option>
											<option value="Kontributor">Kontributor</option>
                                        </select>
                                    </div>
                                    <i class="fa fa-flag" id="flag_jenis_pengarang" aria-hidden="true" style=" display: none; padding-top: 10px;"></i>
                                </div>
                                <div class="form-group row"  id="flag_title_pengarang" style=" display: none;  float:right;">
                                  <label>
                                    <i class="fa fa-flag" aria-hidden="true" style="-webkit-transform: rotate(30deg); padding-top: 10px;"></i>
                                    Data wajib di isi
                                  </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-success">Simpan</a>
                    </div>
                </div><!-- /.modal-content -->
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-addsubjek" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="row-col h-v">
        <div class="row-cell v-m">
            <div class="modal-dialog modal-lg">
				<form id="form-subjek" novalidate>
				<input type="hidden" class="perundangan_id" name="perundangan_id">
                <div class="modal-content">
                    <div class="modal-header">
                    <div style="width: 90%;"><h4>Subjek</h4></div>
                        <button type="button" class="btn btn-danger p-x-md" data-dismiss="modal">X</button>
                    </div>
                    <div class="modal-body text-center p-lg" style="background-color: #ffffff;" id="state">
                        <div class="box-header">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" style="color: #452d3a;">Nama</label>
                                    <div class="col-sm-4">
									<input type="text" name="namasubjek" id="namasubjek" class="form-control">
                                      
                                    </div>
                                    <i class="fa fa-flag" id="flag_nama_pengarang" aria-hidden="true" style="color:red; -webkit-transform: rotate(30deg); display: none; padding-top: 10px;"></i>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" style="color: #452d3a;">Tipe</label>
                                    <div class="col-sm-4">
                                        <select name="tipesubjek" id="tipesubjek" class="form-control select2" style="width:100%;">
                                            <option selected="selected" value="">Silahkan Pilih ... </option>
                                                <option value="Topik">Topik</option>
                                                <option value="Geografis">Geografis</option>
                                                <option value="Nama">Nama</option>
                                                <option value="Masa">Masa</option>
                                                <option value="Aliran">Aliran</option>
                                           
                                        </select>
                                    </div>
                                    <i class="fa fa-flag" id="flag_tipe_pengarang" aria-hidden="true" style=" display: none; padding-top: 10px;"></i>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" style="color: #452d3a;">Jenis</label>
                                    <div class="col-sm-4">
                                        <select name="jenissubjek" id="jenissubjek" class="form-control select2" style="width:100%;">
                                            <option selected="selected" value="">Silahkan Pilih ...</option>
                                            <option value="Utama">Utama</option>
											<option value="Tambahan">Tambahan</option>
                                        </select>
                                    </div>
                                    <i class="fa fa-flag" id="flag_jenis_pengarang" aria-hidden="true" style=" display: none; padding-top: 10px;"></i>
                                </div>
                                <div class="form-group row"  id="flag_title_pengarang" style=" display: none;  float:right;">
                                  <label>
                                    <i class="fa fa-flag" aria-hidden="true" style="-webkit-transform: rotate(30deg); padding-top: 10px;"></i>
                                    Data wajib di isi
                                  </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-success">Simpan</a>
                    </div>
                </div><!-- /.modal-content -->
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-addlampiran" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="row-col h-v">
        <div class="row-cell v-m">
            <div class="modal-dialog modal-lg">
				<form id="form-lampiran" novalidate>
				<input type="hidden" class="perundangan_id" name="perundangan_id">
                <div class="modal-content">
                    <div class="modal-header">
                    <div style="width: 90%;"><h4>Lampiran</h4></div>
                        <button type="button" class="btn btn-danger p-x-md" data-dismiss="modal">X</button>
                    </div>
                    <div class="modal-body text-center p-lg" style="background-color: #ffffff;" id="state">
                        <div class="box-header">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" style="color: #452d3a;">Judul</label>
                                    <div class="col-sm-4">
									<input type="text" name="judullampiran" id="judullampiran" class="form-control">
                                      
                                    </div>
                                    <i class="fa fa-flag" id="flag_nama_pengarang" aria-hidden="true" style="color:red; -webkit-transform: rotate(30deg); display: none; padding-top: 10px;"></i>
                                </div>
								
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" style="color: #452d3a;">Lampiran</label>
                                    <div class="col-sm-4">
									<input type="file" name="berkaslampiran" id="berkaslampiran" class="form-control">
                                      
                                    </div>
                                    <i class="fa fa-flag" id="flag_nama_pengarang" aria-hidden="true" style="color:red; -webkit-transform: rotate(30deg); display: none; padding-top: 10px;"></i>
                                </div>
                                
                                
                                <div class="form-group row"  id="flag_title_pengarang" style=" display: none;  float:right;">
                                  <label>
                                    <i class="fa fa-flag" aria-hidden="true" style="-webkit-transform: rotate(30deg); padding-top: 10px;"></i>
                                    Data wajib di isi
                                  </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-success">Simpan</a>
                    </div>
                </div><!-- /.modal-content -->
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-addstat" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="row-col h-v">
        <div class="row-cell v-m">
            <div class="modal-dialog modal-lg">
				<form id="form-status" novalidate>
				<input type="hidden" class="perundangan_id" name="perundangan_id">
                <div class="modal-content">
                    <div class="modal-header">
                    <div style="width: 90%;"><h4>Status</h4></div>
                        <button type="button" class="btn btn-danger p-x-md" data-dismiss="modal">X</button>
                    </div>
                    <div class="modal-body text-center p-lg" style="background-color: #ffffff;" id="state">
                        <div class="box-header">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" style="color: #452d3a;">Judul Dokumen</label>
                                    <div class="col-sm-4">
									<input type="text" name="juduldokumen" id="juduldokumen" class="form-control">
                                      
                                    </div>
                                    <i class="fa fa-flag" id="flag_nama_pengarang" aria-hidden="true" style="color:red; -webkit-transform: rotate(30deg); display: none; padding-top: 10px;"></i>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" style="color: #452d3a;">Status</label>
                                    <div class="col-sm-4">
                                        <select name="dokumenstatus" id="dokumenstatus" class="form-control select2" style="width:100%;">
                                             
                                        </select>
                                    </div>
                                    <i class="fa fa-flag" id="flag_jenis_pengarang" aria-hidden="true" style=" display: none; padding-top: 10px;"></i>
                                </div>
								<div class="form-group row">
                                    <label class="col-sm-4 col-form-label" style="color: #452d3a;">Catatan</label>
                                    <div class="col-sm-4">
									<input type="text" name="catatanstatus" id="catatanstatus" class="form-control">
                                      
                                    </div>
                                    <i class="fa fa-flag" id="flag_nama_pengarang" aria-hidden="true" style="color:red; -webkit-transform: rotate(30deg); display: none; padding-top: 10px;"></i>
                                </div>
                                <div class="form-group row"  id="flag_title_pengarang" style=" display: none;  float:right;">
                                  <label>
                                    <i class="fa fa-flag" aria-hidden="true" style="-webkit-transform: rotate(30deg); padding-top: 10px;"></i>
                                    Data wajib di isi
                                  </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-success">Simpan</a>
                    </div>
                </div><!-- /.modal-content -->
                </form>
            </div>
        </div>
    </div>
</div>
