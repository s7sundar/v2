// JavaScript Document
$(document).ready(function(e) {

var library = $('#library').dataTable( {
        "bProcessing": true,
        "bServerSide": true,
        "sPaginationType": "full_numbers",
        "sServerMethod": "GET",
        "sAjaxSource": base_url+"index.php/library/records",            
        "aoColumnDefs" : [ {
            'bSortable' : false,
            'aTargets' : [ 4 ]
        } ],
      "aoColumns": [
        { "sWidth": "30%" },
        { "sWidth": "30%" },
        { "sWidth": "10%" ,"bSortable": false },
        { "sWidth": "10%" ,"bSortable": false },
        { "sWidth": "10%", "sClass": "center", "bSortable": false }
    ],
    "fnDrawCallback": function(aData)
		{
		   $("span.edit").unbind().bind('click',edit_record);
            $("span.view").unbind().bind('click',view_record);
		}
    
});

$('#add_library').validate({
	rules:{
		library_name:{
            required:true,
            minlength:3,
            alphanumeric:true
            }
	},
	messages:{
		library_name: {
            required:"This field is required",
            minlength: "Please enter atleast 3 characters",
            alphanumeric:"Special characters are not allowed"
            }
	}
	});

$("#add_library").submit(function(e) {				
	
    e.preventDefault();
	return false;
});


$('#add_new_library').click(function(e){
	
	e.preventDefault();
	
	if($('#add_library').valid())
	{
        var form_data = $('#add_library').serialize();        
          $.ajax({
              type:"POST",
              data:form_data,
              url:base_url+"index.php/library/save",
              dataType: "json" 
           }).success(function(response){
                    
                    if(response.status)
                    {                    
                        cl.showMsg(response.msg,'success');
                        $("#add_library")[0].reset();                    
                        form.hide();
                        library.fnDraw();
                        
                    }else{
                        
                        cl.showMsg(response.msg,'error');    
                        
                     }
               
           }).error(function(response){               
               cl.showMsg(response.msg,'error');    
           });        
	}
});

function edit_record()
{
    $.getJSON(base_url+'index.php/library/edit/'+$(this).attr('id'), function(response){
        
            if(response.status)
            {                
                $('#dialog').empty().append(response.html).removeClass('hide');
                
                $('#edit_library').validate({
                    rules:{
                        library_name:{
                            required:true,
                            minlength:3,
                            alphanumeric:true
                            }
                    },
                    messages:{
                        library_name: {
                            required:"This field is required",
                            minlength: "Please enter atleast 3 characters",
                            alphanumeric:"Special characters are not allowed"
                            }
                    }
                    });


            $("#edit_library").submit(function(e) {				
                
                e.preventDefault();
                return false;
            });
                
                 $('#dialog').dialog({
                        autoOpen: false,
                        title:'Edit Library',
                        width: 470,
                        modal: true,
                        zIndex: 9999,
                        stack: false,
                        open:{
                            
                            },
                        buttons:{                            
                                                      
                            Save: function() {
                                
                                if($('#edit_library').valid())
                                { 
                                    var form_data = $('#edit_library').serialize();        
                                          $.ajax({
                                              type:"POST",
                                              data:form_data,
                                              url:base_url+"index.php/library/update",
                                              dataType: "json" 
                                           }).success(function(response){
                                                    
                                                    if(response.status)
                                                    {                    
                                                       $('#dialog').dialog('close');
                                             
                                                        cl.showMsg(response.msg,'success');    
                                             
                                                        library.fnDraw();
                                                        
                                                    }else{
                                                        
                                                        cl.showMsg(response.msg,'error');    
                                                        
                                                     }
                                               
                                           }).error(function(response){               
                                               cl.showMsg(response.msg,'error');    
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

function view_record()
{
    
}

});