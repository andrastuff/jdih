<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <?php if(!empty($this->ion_auth->user()->row()->avatar)): ?>
                                <img alt="image" class="rounded-circle" style="width:48px"src="<?php echo base_url('upload/user-photo/'.$this->ion_auth->user()->row()->avatar) ?>" />
                            <?php endif?>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold"><?php echo $this->ion_auth->user()->row()->first_name ?> <?php echo $this->ion_auth->user()->row()->last_name ?></span>
                                <span class="text-muted text-xs block"><?php echo  $this->ion_auth->get_users_groups($this->ion_auth->get_user_id())->row()->name ?> <b class="caret"></b></span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="dropdown-item" href="<?php echo site_url('users/profile') ?>">Profile</a></li>
                                <li class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="<?php echo site_url('auth/logout') ?>">Logout</a>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            GT+
                        </div>
                    </li>
                    <li>
                        <a href="<?php echo site_url('dashboard') ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                    </li>
					<li>
                        <h4 class="ml-4 text-white"><hr>PERUNDANGAN</h4>
                    </li>
					<li>
                        <a href="<?php echo site_url('perundangan') ?>"><i class="fa fa-edit"></i> <span class="nav-label">Perundangan</span></a>
                    </li>
					<li>
						<a href="#" aria-expanded="false"><i class="fa fa-files-o"></i> <span class="nav-label">Master Data</span><span class="fa arrow"></span></a>
						<ul id="openMasterData" class="nav nav-second-level collapse" aria-expanded="false"> 
                            <li id="sideBidanghukum"><a class="mb-2" href="<?php echo site_url('bidanghukum') ?>">Bidang Hukum</a></li>
                          
                            <li id="sideLokasi"><a class="mb-2" href="<?php echo site_url('lokasi') ?>">Lokasi Fisik</a></li>
                            <li id="sidePenerbit"><a class="mb-2" href="<?php echo site_url('penerbit') ?>">Penerbit</a></li>
                            <li id="sideStatus"><a class="mb-2" href="<?php echo site_url('status') ?>">Status</a></li>
                            
                            <li id="sideUrusanPemerintahan"><a class="mb-2" href="<?php echo site_url('urusanpemerintahan') ?>">Urusan Pemerintahan</a></li>
						</ul>
					</li>
					<li>
                        <a href="<?php echo site_url('report') ?>"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Laporan</span></a>
                    </li>
					<li >
                        <h4 class="ml-4 text-white"><hr>HALAMAN</h4>
                    </li>
					<li id="sideHalaman">
                        <a href="<?php echo site_url('halaman') ?>"><i class="fa fa-newspaper-o"></i> <span class="nav-label">Halaman</span></a>
                    </li>
					<li>
                        <h4 class="ml-4 text-white"><hr>ARTIKEL</h4>
                    </li>
					<li id="sideArtikel">
                        <a href="<?php echo site_url('artikel') ?>"><i class="fa fa-newspaper-o"></i> <span class="nav-label">Artikel</span></a>
                    </li>
					<li id="sideKategoriArtikel">
                        <a href="<?php echo site_url('artikelkategori') ?>"><i class="fa fa-tasks"></i> <span class="nav-label">Kategori Artikel</span></a>
                    </li>
					<li>
                        <a href="<?php echo site_url('artikeltag') ?>"><i class="fa fa-tags"></i> <span class="nav-label">Tags Artikel</span></a>
                    </li>
					<li>
                        <h4 class="ml-4 text-white"><hr>SETTING</h4>
                    </li>
					<li id="sideMenu">
                        <a href="<?php echo site_url('menu') ?>"><i class="fa fa fa-sitemap"></i> <span class="nav-label">Menu</span></a>
                    </li>
					<li>
                        <a href="<?php echo site_url('slide') ?>"><i class="fa fa-picture-o"></i> <span class="nav-label">Slide</span></a>
                    </li>
					<li>
                        <a href="<?php echo site_url('websetting') ?>"><i class="fa fa fa-gears"></i> <span class="nav-label">Web Setting</span></a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('gt_modules') ?>" target="_blank"><i class="fa fa-database"></i> <span class="nav-label"> Module Gen</span></a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-users"></i> <span class="nav-label">User Management</span><span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?php echo site_url('users') ?>"> Users</a></li>
                            <li><a href="<?php echo site_url('users_groups') ?>"> Groups</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                                class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <a href="<?php echo site_url('auth/logout') ?>">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <?php $this->load->view($content);?>
            <div class="footer">
                <div>
                    <strong>Copyright</strong> GINK-TECH &copy; 2013-<?php echo date('Y') ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo theme_assets('inspina') ?>js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo theme_assets('inspina') ?>js/popper.min.js"></script>
    <script src="<?php echo theme_assets('inspina') ?>js/bootstrap.js"></script>
    <script src="<?php echo theme_assets('inspina') ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo theme_assets('inspina') ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo theme_assets('inspina') ?>js/inspinia.js"></script>
    <script src="<?php echo theme_assets('inspina') ?>js/plugins/pace/pace.min.js"></script>
	<!-- Sweet alert -->
    <script src="<?php echo theme_assets('inspina') ?>js/plugins/sweetalert/sweetalert.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Load JS Library  -->
    <?php if(isset($footer) && !empty($footer)): ?>
        <?php foreach($footer as $footer): ?>
            <script src="<?php echo $footer?>"></script>
        <?php endforeach ?>
    <?php endif ?>
    <!-- Load JS SCRIPTPAGE  -->
	
	<?php if(isset($js_script) && !empty($js_script)): ?>
		<?php $this->load->view($js_script);?>
	<?php endif ?>
	
</body>

</html>