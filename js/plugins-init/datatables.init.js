(function($) {
     "use strict"
    //Basic Table
    var table = $('#example').DataTable({
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
	var table = $('#projects-tbl').DataTable({
		//dom: 'Bfrtip',
		'dom': 'ZBfrltip',
		buttons: [
            
			{ extend: 'excel', text: '<i class="fa-solid fa-file-excel"></i> Export Report',
              className: 'btn btn-sm border-0'
			}
        ],
		searching: false,
		pageLength:5,
		select: false,            
        lengthChange:false ,
		language: {
			paginate: {
				next: '<i class="fa-solid fa-angle-right"></i>',
				previous: '<i class="fa-solid fa-angle-left"></i>' 
			}
			
		},
		
    });
	
    table.on('click', 'tbody tr', function() {
    var $row = table.row(this).nodes().to$();
    var hasClass = $row.hasClass('selected');
    if (hasClass) {
        $row.removeClass('selected')
    } else {
        $row.addClass('selected')
    }
    })
    
    table.rows().every(function() {
    this.nodes().to$().removeClass('selected')
    });
	

    // dataTable1
	var table = $('#dataTable1').DataTable({
		searching: false,
		paging:true,
		select: false,         
		lengthChange:false ,
		
	});
	// dataTable2
	var table = $('#dataTable2').DataTable({
		searching: false,
		paging:true,
		select: false,         
		lengthChange:false ,
		
	});
	// dataTable3
	var table = $('#dataTable3').DataTable({
		searching: false,
		paging:true,
		select: false,         
		lengthChange:false ,
		
	});
	// dataTable4
	var table = $('#dataTable4').DataTable({
		searching: false,
		paging:true,
		select: false,         
		lengthChange:false,
		
	});
   
	// dataTable5
	var table = $('#example5').DataTable({
		searching: false,
		paging:false,
		select: false,
		info: false,         
		lengthChange:false ,
		language: {
			paginate: {
			  next: '<i class="fa-solid fa-angle-right"></i>',
			  previous: '<i class="fa-solid fa-angle-left"></i>' 
			}
		  }
		
	}); 
	
	// dataTable6
		var table = $('#example6').DataTable({
			searching: false,
			paging:true,
			select: false,
			info: false,         
			lengthChange:false ,
			language: {
			paginate: {
			  next: '<i class="fa-solid fa-angle-right"></i>',
			  previous: '<i class="fa-solid fa-angle-left"></i>' 
			}
		  }
			
		});
		
		
	// dataTable7
	var table = $('#example7').DataTable({
		searching: false,
		paging:true,
		select: false,
		info: true,         
		lengthChange:false ,
		language: {
			paginate: {
			   next: '<i class="fa-solid fa-angle-right"></i>',
			  previous: '<i class="fa-solid fa-angle-left"></i>' 
			}
		  }
		
	}); 	
	// dataTable9
		
	// table row
	var table = $('#dataTable1, #dataTable2, #dataTable3, #dataTable4,  #example3, #example4').DataTable({
		language: {
			paginate: {
			  next: '<i class="fa-solid fa-angle-right"></i>',
			  previous: '<i class="fa-solid fa-angle-left"></i>' 
			}
		  }
	});
	$('#example tbody').on('click', 'tr', function () {
		var data = table.row( this ).data();
	});
   
	// application table
	var table = $('#application-tbl1,#application-tbl2,#application-tbl3,#application-tbl4 ').DataTable({
		searching: false,
		lengthChange:false ,
		language: {
			paginate: {
			  next: '<i class="fa-solid fa-angle-right"></i>',
			  previous: '<i class="fa-solid fa-angle-left"></i>' 
			}
		  }
	});
	
})(jQuery);
