var table = $('#shipment_status_table').DataTable({
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

jQuery(document).on('click', '.delete-shipment', function(){
	var curId = jQuery(this).data('id');
	var curRow = jQuery(this);
	Swal.fire({
	icon: 'warning',
	title: 'Warning',
	text: 'Do you want to delete this shipment?',
	allowOutsideClick: false,
	showDenyButton: true,
	confirmButtonText: 'Yes',
	}).then((result) => {
	if(result.isConfirmed) {
	  $.ajax({
	        url: 'actions/ajax.php',
	        type: 'POST',
	        data: {
	        	shipment_id : curId,
	        	reason : 'delete_shipment'
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

jQuery('.shipment_status').change(function(){
	var curForm = jQuery(this).parents('form')[0];
	var formData = new FormData(curForm);
	formData.append("reason", "shipment_status");
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
	jQuery('.advance-filter').click(function(){
	jQuery('.filter-form').slideToggle();
})

//Tooltip Popover
$(function () {
  $('[data-toggle="popover"]').popover()
})