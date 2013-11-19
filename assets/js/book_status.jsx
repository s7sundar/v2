// JavaScript Document
$(document).ready(function(e) {

//initialize the button    
$("#add_status" ).button();

var book_status = $('#book_status').dataTable( {
        "bProcessing": true,
        "bServerSide": true,
        "sPaginationType": "full_numbers",
        "sServerMethod": "GET",
        "sAjaxSource": base_url+"index.php/addons/status_list",            
        "aoColumnDefs" : [ {
            'bSortable' : false,
            'aTargets' : [ 3 ]
        } ]
});

$('#add_book_status').validate({
	rules:{
		status:"required",
	},
	messages:{
		status: "This field is required"
	}
	});


$('#add_status').click(function(e){
	
	e.preventDefault();
	
	if($('#add_book_status').valid())
	{
		$.getJSON(base_url+'index.php/addons/save_status/'+$('#status').val(), function(response){
			console.log(response);
            $("#add_book_status")[0].reset();
	    });
	}
});



});