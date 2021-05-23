<script type="text/javascript">
	$('#datatable').DataTable({
            responsive: true,
            serverSide 		: true,
			ajax:{
				url 		: "<?php echo $url;?>",
				type 		: "POST"
			},
			columns 		:[
				{data: 'id'},
                {data: 'name'},
                {data: 'description'},
                {data: 'action'},
			],

        });
</script>