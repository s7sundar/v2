// JavaScript Document
$(document).ready(function(e) {

//initialize the button    
$("#add_status" ).button();

var book_status = $('#book_status').dataTable( {
        "bProcessing": true,
        "bServerSide": true,
        "sPaginationType": "full_numbers",
        "sServerMethod": "GET",
        "sAjaxSource": base_url+"index.php/book_status/records",            
        "aoColumnDefs" : [ {
            'bSortable' : false,
            'aTargets' : [ 3 ]
        } ],
      "aoColumns": [
        { "sWidth": "10%" },
        { "sWidth": "50%" },
        { "sWidth": "20%" },
        { "sWidth": "10%", "sClass": "center", "bSortable": false }
    ],
    "fnDrawCallback": function(aData)
		{
		   $("span.edit").unbind().bind('click',edit_record);
		}
    
});

$('#add_book_status').validate({
	rules:{
		status_name:{
            required:true,
            minlength:3,
            alphanumeric:true
            }
	},
	messages:{
		status_name: {
            required:"This field is required",
            minlength: "Please enter atleast 3 characters",
            alphanumeric:"Special characters are not allowed"
            }
	}
	});

$("#add_book_status, #edit_book_status").submit(function(e) {				
	
    e.preventDefault();
	return false;
});


$('#add_status').click(function(e){
	
	e.preventDefault();
	
	if($('#add_book_status').valid())
	{
		$.getJSON(base_url+'index.php/book_status/save/'+$('#status_name').val(), function(response){
               if(response.status)
                {
                    cl.showMsg(response.msg,'success');
                    $("#add_book_status")[0].reset();
                    
                    form.hide();
                    book_status.fnDraw();
                    
                }else{
                    
                    cl.showMsg(response.msg,'error');    
                }
	    });
	}
});

function edit_record()
{
    $.getJSON(base_url+'index.php/book_status/edit/'+$(this).attr('id'), function(response){
        
            if(response.status)
            {                
                $('#dialog').empty().append(response.html).removeClass('hide');
                
                $('#edit_book_status').validate({
                            rules:{
                                status_name:{
                                    required:true,
                                    minlength:3,
                                    alphanumeric:true
                                    }
                            },
                            messages:{
                                status_name: {
                                    required:"This field is required",
                                    minlength: "Please enter atleast 3 characters",
                                    alphanumeric:"Special characters are not allowed"
                                    }
                            }
                            });

            $("#edit_book_status").submit(function(e) {				
                
                e.preventDefault();
                return false;
            });
                
                 $('#dialog').dialog({
                        modal:true,
                        autoOpen: false,
                        title:'Edit Book Status',
                        resizable:false,
                        open:{
                           
                            },
                        buttons:{                            
                                                      
                            Save: function() {
                                
                                if($('#edit_book_status').valid())
                                {                                                                        
                                    $.getJSON(base_url+'index.php/book_status/save/'+$('#edit_status_name').val()+'/'+$('#edit_status_id').val(), function(data){
                                        
                                        if(data.status)
                                        {
                                             $('#dialog').dialog('close');
                                             
                                             cl.showMsg(data.msg,'success');    
                                             
                                              book_status.fnDraw();
                                             
                                        }else{
                                            
                                            cl.showMsg(data.msg,'error');    
                                            
                                        }
                                        
                                    });
                                }
                                },
                            Cancel: function(){
                               $(this).dialog('close'); 
                                }
                            }                    
                     });
                 
                 $('#dialog').dialog('open');
                
                
             }else{
                 
                        cl.showMsg(response.msg,'error');    
               }
        
      });
}

});