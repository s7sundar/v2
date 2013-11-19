// JavaScript Document
$(document).ready(function(e) {

var config = $('#manage').dataTable( {
        "bProcessing": true,
        "bServerSide": true,
        "sPaginationType": "full_numbers",
        "sServerMethod": "GET",
        "sAjaxSource": base_url+"index.php/management/records",            
        "aoColumnDefs" : [ {
            'bSortable' : false,
            'aTargets' : [ 3]
        } ],
      "aoColumns": [
        { "sWidth": "40%" },
        { "sWidth": "25%" },
        { "sWidth": "25%" },        
        { "sWidth": "10%", "sClass": "center", "bSortable": false }
    ],
    "fnDrawCallback": function(aData)
		{
		   $("span.edit").unbind().bind('click',edit_record);            
		}
    
});

$('#add_users').validate({
	rules:{
		library_id:{
            required:true        
            },
        user_level:{
            required:true
            },
        user_name:{
            required:true
            },
        user_pass:{
            required:true
            }
        
	},
	messages:{
		library_id: {
            required:"This field is required"          
            }
	}
	});

$("#add_users").submit(function(e) {				
	
    e.preventDefault();
	return false;
});


$('#add_user').click(function(e){
	
	e.preventDefault();
	
	if($('#add_users').valid())
	{
        var form_data = $('#add_users').serialize();        
          $.ajax({
              type:"POST",
              data:form_data,
              url:base_url+"index.php/management/save",
              dataType: "json" 
           }).success(function(response){
                    
                    if(response.status)
                    {                    
                        cl.showMsg(response.msg,'success');
                        $("#add_users")[0].reset();                    
                        form.hide();
                        config.fnDraw();                        
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
    $.getJSON(base_url+'index.php/management/edit/'+$(this).attr('id'), function(response){
        
            if(response.status)
            {                
                $('#dialog').empty().append(response.html).removeClass('hide');                
               
                $('#add_users').validate({
                    rules:{
                        library_id:{
                            required:true        
                            },
                        user_level:{
                            required:true
                            },
                        user_name:{
                            required:true
                            },
                        user_pass:{
                            required:true
                            }
                        
                    },
                    messages:{
                        library_id: {
                            required:"This field is required"          
                            }
                    }
                    });

            $("#edit_users").submit(function(e) {				
                
                e.preventDefault();
                return false;
            });
                
                 $('#dialog').dialog({
                        autoOpen: false,
                        title:'Edit Configuration',                        
                        modal: true,
                        zIndex: 9999,
                        width:'auto',
                        stack: false,
                        open:{
                            
                            },
                        buttons:{                            
                                                      
                            Save: function() {
                                
                                if($('#edit_users').valid())
                                { 
                                    var form_data = $('#edit_users').serialize();        
                                    
                                          $.ajax({
                                              type:"POST",
                                              data:form_data,
                                              url:base_url+"index.php/management/update",
                                              dataType: "json" 
                                           }).success(function(response){
                                                    
                                                    if(response.status)
                                                    {                    
                                                       $('#dialog').dialog('close');
                                             
                                                        cl.showMsg(response.msg,'success');    
                                             
                                                        config.fnDraw();
                                                        
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