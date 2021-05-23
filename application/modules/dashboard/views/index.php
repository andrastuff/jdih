<div class="row  border-bottom white-bg dashboard-header">

    <div class="col-md-12">
        <h2>Welcome to <?php echo $meta['title']; ?></h2>
        <small>Hi <?php echo $user->first_name; ?>...</small>
    </div>

	

</div>
<div class="row dashboard-body">

    
	<div class="col-md-4">
	<div class="widget navy-bg p-lg text-center">
		<a href="<?php echo base_url('artikel'); ?>" class="text-white">
		<div class="m-b-md">
			<i class="fa fa-files-o fa-4x"></i>
			<h1 class="m-xs"><?php echo $count_artikel; ?></h1>
			
			<h3 class="font-bold no-margins">
				Data Artikel
			</h3>
			<small> </small>
			
		</div>
		</a>
	</div>
	</div>
	<div class="col-md-4">
	<div class="widget lazur-bg p-lg text-center">
		<a href="<?php echo base_url('halaman'); ?>" class="text-white">
		<div class="m-b-md">
			<i class="fa fa-files-o fa-4x"></i>
			<h1 class="m-xs"><?php echo $count_halaman; ?></h1>
			
			<h3 class="font-bold no-margins">
				Data Halaman
			</h3>
			<small> </small>
			
		</div>
		</a>
	</div>
	</div>
	<div class="col-md-4">
	<div class="widget red-bg p-lg text-center">
		<a href="<?php echo base_url('perundangan'); ?>" class="text-white">
		<div class="m-b-md">
			<i class="fa fa-files-o fa-4x"></i>
			<h1 class="m-xs"><?php echo $count_perundangan; ?></h1>
			
			<h3 class="font-bold no-margins">
				Data Perundangan
			</h3>
			<small> </small>
			
		</div>
		</a>
	</div>
	</div>
	<div class="col-md-12 pt-4" id="chart-one"></div>
</div>
