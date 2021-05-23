<script type="text/javascript">
	$('#datatable').DataTable({
            responsive: true,
            serverSide 		: true,
			ajax:{
				url 		: "<?php echo $url;?>",
				type 		: "POST"
			},
			columns 		:[
                {data: 'first_name'},
                {data: 'last_name'},
                {data: 'email'},
                {data: 'groups'},
                {data: 'status'},
                {data: 'action'},
			],

        });
</script>