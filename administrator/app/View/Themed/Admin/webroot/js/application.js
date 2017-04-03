//Portlet Refresh Icon
//"sDom": "<'row-fluid'<'col-sm-4'f><'col-sm-2'C><'col-sm-6'T>r>t<'row-fluid'<'col-sm-4'l><'col-sm-8'p>>",
(function($) {

    $(".dataTable").dataTable({
		"sDom": "<'row-fluid pad'<'col-sm-4'l><'col-sm-4'f><'col-sm-4'T>r>t<'row-fluid'<'col-sm-4'i><'col-sm-8'p>>",
		"aLengthMenu": [[10, 15, 25, 50, -1], [10, 15, 25, 50, "All"]],
		"oColVis": {
			"buttonText": "<abbr title='Change Column'><i class='fa fa-list-ul'></i></abbr>"
		},
		"bAutoWidth": false,	
		"oTableTools": {
			"sSwfPath": '/adminpanel/theme/admin/vendor/swf/datatable/copy_csv_xls_pdf.swf',
			"aButtons": [
				{
					"sExtends": "print",
					"sPrintMessage": "Click 'Esc' keyboard button to cancel the print!",
					"sButtonText": "<abbr title='Print'><i class='fa fa-print'></i></abbr>"
				},
				{
					"sExtends":    "collection",
					"sButtonText": "<abbr title='Save as'><i class='fa fa-save'></i></abbr>",
					"aButtons":    [
						{
							"sExtends": "xls",
							"sButtonText": "CSV"							
						}, 
						{
							"sExtends": "pdf",
							"sPdfOrientation": "landscape",
							"sPdfMessage": " "
						}
					]
				}

			]
		}
	});
    $(".dataReportTable").dataTable({
		"sDom": "<'row-fluid pad'<'col-sm-3'f><'col-sm-5'><'col-sm-4'T>>",
		"aLengthMenu": [[10, 15, 25, 50, -1], [10, 15, 25, 50, "All"]],
		"oColVis": {
			"buttonText": "<abbr title='Change Column'><i class='fa fa-list-ul'></i></abbr>"
		},
		"bAutoWidth": false,	
		"oTableTools": {
			"sSwfPath": '/adminpanel/theme/admin/vendor/swf/datatable/copy_csv_xls_pdf.swf',
			"aButtons": [
				{
					"sExtends": "print",
					"sPrintMessage": "Click 'Esc' keyboard button to cancel the print!",
					"sButtonText": "<abbr title='Print'><i class='fa fa-print'></i></abbr>"
				},
				{
					"sExtends":    "collection",
					"sButtonText": "<abbr title='Save as'><i class='fa fa-save'></i></abbr>",
					"aButtons":    [
						{
							"sExtends": "xls",
							"sButtonText": "CSV"							
						}, 
						{
							"sExtends": "pdf",
							"sPdfOrientation": "landscape",
							"sPdfMessage": " "
						}
					]
				}

			]
		}
	});
     $(".dataSummaryTable").dataTable({
		"sDom": "<'row-fluid'<'col-sm-3'><'col-sm-5'><'col-sm-4'>>",
		"aLengthMenu": [[10, 15, 25, 50, -1], [10, 15, 25, 50, "All"]],
		"oColVis": {
			"buttonText": "<abbr title='Change Column'><i class='fa fa-list-ul'></i></abbr>"
		},
		"bAutoWidth": false,	
		"oTableTools": {
			"sSwfPath": '/adminpanel/theme/admin/vendor/swf/datatable/copy_csv_xls_pdf.swf',
			"aButtons": [
				{
					"sExtends": "print",
					"sPrintMessage": "Click 'Esc' keyboard button to cancel the print!",
					"sButtonText": "<abbr title='Print'><i class='fa fa-print'></i></abbr>"
				},
				{
					"sExtends":    "collection",
					"sButtonText": "<abbr title='Save as'><i class='fa fa-save'></i></abbr>",
					"aButtons":    [
						{
							"sExtends": "xls",
							"sButtonText": "CSV"							
						}, 
						{
							"sExtends": "pdf",
							"sPdfOrientation": "landscape",
							"sPdfMessage": " "
						}
					]
				}

			]
		}
	});
        /*----------- BEGIN datepicker CODE -------------------------*/
	$('#datetimepicker1, #ddatetimepicker2, #datetimepicker3, #datetimepicker4').datetimepicker({
		format: 'yyyy-MM-dd hh:mm:ss',
		//maskInput: true,           // disables the text input mask
		//pickDate: true,            // disables the date picker
		//pickTime: true,            // disables de time picker
		//pick12HourFormat: false,   // enables the 12-hour format time picker
		//pickSeconds: true,         // disables seconds in the time picker
		//startDate: -Infinity,      // set a minimum date
		//endDate: Infinity          // set a maximum date	
	});		
	
	$('#datepicker1, #datepicker2, #datepicker3, #datepicker4').datetimepicker({
		format: 'yyyy-MM-dd',
		pickTime: false, 
	});
	
	$('#datepickerMonthYear, #datepickerMonthYear2').datepicker({
		format: 'yyyy-mm',
		viewMode: 'years',
		minViewMode: 'months'
	});	
	
	$('#datepickerYear, #datepickerYear2').datepicker({
		format: ' yyyy',
		viewMode: 'years',
		minViewMode: 'years'	
	});
	
	// time picker
	$('#timepicker1, #timepicker2, #timepicker3').datetimepicker({
		format: 'hh:mm:ss',
		pickDate: false,            // disables the date picker
		//pickTime: true,            // disables de time picker
		//pick12HourFormat: false,   // enables the 12-hour format time picker
		//pickSeconds: true,         // disables seconds in the time picker
	});
	
	// boostrap select
	$('select, .selectpicker').selectpicker({
		size: 'auto',
		container: 'body',
		header: 'Please select an item'	
	});
	
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
		$('.selectpicker').selectpicker('mobile');
	}
        
})(jQuery);