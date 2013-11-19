// JavaScript Document
$(document).ready(function(e) {

var book_cate = $('#book_cate').dataTable( {
        "bProcessing": true,
        "bServerSide": true,
        "sPaginationType": "full_numbers",
        "sServerMethod": "GET",
        "sAjaxSource": base_url+"index.php/book_category/records",            
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

$('#add_book_cate').validate({
	rules:{
		category_name:{
            required:true,
            minlength:3,
            alphanumeric:true
            }
	},
	messages:{
		category_name: {
            required:"This field is required",
            minlength: "Please enter atleast 3 characters",
            alphanumeric:"Special characters are not allowed"
            }
	}
	});

$("#add_book_cate, #edit_book_cate").submit(function(e) {				
	
    e.preventDefault();
	return false;
});


$('#add_cate').click(function(e){
	
	e.preventDefault();
	
	if($('#add_book_cate').valid())
	{
		$.getJSON(base_url+'index.php/book_category/save/'+$('#category_name').val(), function(response){
               if(response.status)
                {
                    cl.showMsg(response.msg,'success');
                    $("#add_book_cate")[0].reset();
                    
                    form.hide();
                    book_cate.fnDraw();
                    
                }else{
                    
                    cl.showMsg(response.msg,'error');    
                }
	    });
	}
});

function edit_record()
{
    $.getJSON(base_url+'index.php/book_category/edit/'+$(this).attr('id'), function(response){
        
            if(response.status)
            {                
                $('#dialog').empty().append(response.html).removeClass('hide');
                
                $('#edit_book_cate').validate({
                            rules:{
                                category_name:{
                                    required:true,
                                    minlength:3,
                                    alphanumeric:true
                                    }
                            },
                            messages:{
                                category_name: {
                                    required:"This field is required",
                                    minlength: "Please enter atleast 3 characters",
                                    alphanumeric:"Special characters are not allowed"
                                    }
                            }
                            });

            $("#edit_book_cate").submit(function(e) {				
                
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
                                
                                if($('#edit_book_cate').valid())
                                {                                                                        
                                    $.getJSON(base_url+'index.php/book_category/save/'+$('#edit_category_name').val()+'/'+$('#edit_cate_id').val(), function(data){
                                        
                                        if(data.status)
                                        {
                                             $('#dialog').dialog('close');
                                             
                                             cl.showMsg(data.msg,'success');    
                                             
                                              book_cate.fnDraw();
                                             
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