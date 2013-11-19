// JavaScript Document
$(document).ready(function(e) {

var dept = $('#dept').dataTable( {
        "bProcessing": true,
        "bServerSide": true,
        "sPaginationType": "full_numbers",
        "sServerMethod": "GET",
        "sAjaxSource": base_url+"index.php/departments/records",            
        "aoColumnDefs" : [ {
            'bSortable' : false,
            'aTargets' : [ 4 ]
        } ],
      "aoColumns": [
        { "sWidth": "20%" },
        { "sWidth": "20%" },
        { "sWidth": "20%" },
        { "sWidth": "20%" },
        { "sWidth": "10%", "sClass": "center", "bSortable": false }
    ],
    "fnDrawCallback": function(aData)
		{
		   $("span.edit").unbind().bind('click',edit_record);            
		}
    
});

$('#add_dept').validate({
	rules:{
		dept_name:{
            required:true,
            minlength:3,
            alphanumeric:true
            }
	},
	messages:{
            dept_name: {
            required:"This field is required",
            minlength: "Please enter atleast 3 characters",
            alphanumeric:"Special characters are not allowed"
            }
	}
	});

$("#add_dept").submit(function(e) {				
	
    e.preventDefault();
	return false;
});


$('#add_new_dept').click(function(e){
	
	e.preventDefault();
	
	if($('#add_dept').valid())
	{
        var form_data = $('#add_dept').serialize();        
          $.ajax({
              type:"POST",
              data:form_data,
              url:base_url+"index.php/departments/save",
              dataType: "json" 
           }).success(function(response){
               
                    if(response.status)
                    {                    
                        cl.showMsg(response.msg,'success');
                        $("#add_dept")[0].reset();                    
                        form.hide();
                        dept.fnDraw();
                        
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
    $.getJSON(base_url+'index.php/departments/edit/'+$(this).attr('id'), function(response){
        
            if(response.status)
            {                
                $('#dialog').empty().append(response.html).removeClass('hide');
                
                $('#edit_dept').validate({
                    rules:{
                        dept_name:{
                            required:true,
                            minlength:3,
                            alphanumeric:true
                            }
                    },
                    messages:{
                        dept_name: {
                            required:"This field is required",
                            minlength: "Please enter atleast 3 characters",
                            alphanumeric:"Special characters are not allowed"
                            }
                    }
                    });


            $("#edit_dept").submit(function(e) {				
                
                e.preventDefault();
                return false;
            });
                
                 $('#dialog').dialog({
                        autoOpen: false,
                        title:'Edit Department',
                        width: 'auto',
                        modal: true,
                        zIndex: 9999,
                        stack: false,
                        open:{
                            
                            },
                        buttons:{                            
                                                      
                            Save: function() {
                                
                                if($('#edit_dept').valid())
                                { 
                                    var form_data = $('#edit_dept').serialize();        
                                          $.ajax({
                                              type:"POST",
                                              data:form_data,
                                              url:base_url+"index.php/departments/update",
                                              dataType: "json" 
                                           }).success(function(response){
                                                    
                                                    if(response.status)
                                                    {                    
                                                       $('#dialog').dialog('close');
                                             
                                                        cl.showMsg(response.msg,'success');    
                                             
                                                        dept.fnDraw();
                                                        
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