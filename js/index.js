var table = $('#basic_table').DataTable({
    	"order": [],
	    fixedHeader: true,
        createdRow: function ( row, data, index ) {
           $(row).addClass('selected')
        } ,
        //dom: 'Blfrtip',
        dom: `<'row'<'col-sm-6 text-left'l><'col-sm-4 text-right'f><'col-sm-2 text-right'B>>
	<'row'<'col-sm-12'tr>>
	<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'p>>`,
        
        buttons: [
            'csv', 'excel', 'print'
        ],

		language: {
			paginate: {
			   next: '<i class="fa-solid fa-angle-right"></i>',
			  previous: '<i class="fa-solid fa-angle-left"></i>' 
			}
		  }
    });
	jQuery('.view-client').click(function(){
		var curId = jQuery(this).data('id');
		$.ajax({
	        url: 'actions/ajax.php',
	        type: 'POST',
	        data: {
	        	client_id : curId,
	        	reason : 'view_client'
	        },
	        success: function (response) {
	        	response = JSON.parse(response);
        		jQuery('.client_account_no').html(response.account_no);
				jQuery('.client_account_title').html(response.account_title);
				jQuery('.client_address').html(response.address);
				jQuery('.client_bank_name').html(response.bank_name);
				jQuery('.client_branch_code').html(response.branch_code);
				jQuery('.client_branch_name').html(response.branch_name);
				jQuery('.client_city').html(response.city);
				jQuery('.client_email').html(response.email);
				jQuery('.client_name').html(response.name);
				jQuery('.client_ntn').html(response.ntn);
				jQuery('.client_phone').html(response.phone);
				jQuery('.client_status').html(response.status);
				jQuery('.client_str').html(response.str);
	        },
	    });	
	
	})

	jQuery('.delete-client').click(function(){
		var curId = jQuery(this).data('id');
		var curRow = jQuery(this);
		Swal.fire({
		  icon: 'warning',
		  title: 'Warning',
		  text: 'Do you want to delete this client?',
		  allowOutsideClick: false,
		  showDenyButton: true,
		  confirmButtonText: 'Yes',
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
				        url: 'actions/ajax.php',
				        type: 'POST',
				        data: {
				        	client_id : curId,
				        	reason : 'delete_client'
				        },
				        success: function (response) {
				        	console.log(response);
				            response = JSON.parse(response);
							if(response.error == 'yes') {
								Swal.fire({
								  icon: 'error',
								  title: 'Oops...',
								  text: response.message,
								})
							} else {
								Swal.fire({
								  icon: 'success',
								  title: response.message,
								}).then((result) => {
								  curRow.parents('tr').hide();
								})
							}
				        },
				    });	
			}
		})
	})


	jQuery('.client_status').change(function(){
		var curForm = jQuery(this).parents('form')[0];
		var formData = new FormData(curForm);
	    formData.append("reason", "client_status");
	    $.ajax({
	        url: 'actions/ajax.php',
	        type: 'POST',
	        data: formData,
	        success: function (response) {
	        	console.log(response);
	            response = JSON.parse(response);
				if(response.error == 'yes') {
					Swal.fire({
					  icon: 'error',
					  title: 'Oops...',
					  text: response.message,
					})
				} else {
					Swal.fire({
					  icon: 'success',
					  title: response.message,
					})
				}
	        },
	        cache: false,
	        contentType: false,
	        processData: false
	    });	
	})
