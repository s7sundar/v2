// JavaScript Document
$(document).ready(function(e) {

var config = $('#config').dataTable( {
        "bProcessing": true,
        "bServerSide": true,
        "sPaginationType": "full_numbers",
        "sServerMethod": "GET",
        "sAjaxSource": base_url+"index.php/config/records",            
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

$('#add_configs').validate({
	rules:{
		library_id:{
            required:true        
            },
        std_fine_amt:{
            required:true,
            number:true
            },
        staff_fine_amt:{
            required:true,
            number:true
            }
        
	},
	messages:{
		library_id: {
            required:"This field is required"          
            },
        std_fine_amt: {
            required:"This field is required"
            },
        staff_fine_amt: {
            required:"This field is required"
            }
	}
	});

$("#add_configs").submit(function(e) {				
	
    e.preventDefault();
	return false;
});


$('#add_config').click(function(e){
	
	e.preventDefault();
	
	if($('#add_configs').valid())
	{
        var form_data = $('#add_configs').serialize();        
          $.ajax({
              type:"POST",
              data:form_data,
              url:base_url+"index.php/config/save",
              dataType: "json" 
           }).success(function(response){
                    
                    if(response.status)
                    {                    
                        cl.showMsg(response.msg,'success');
                        $("#add_configs")[0].reset();                    
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
    $.getJSON(base_url+'index.php/config/edit/'+$(this).attr('id'), function(response){
        
            if(response.status)
            {                
                $('#dialog').empty().append(response.html).removeClass('hide');
                
               
                $('#edit_configs').validate({
                    rules:{
                        library_id:{
                            required:true        
                            },
                        std_fine_amt:{
                            required:true,
                            number:true
                            },
                        staff_fine_amt:{
                            required:true,
                            number:true
                            }
                        
                    },
                    messages:{
                        library_id: {
                            required:"This field is required"          
                            },
                        std_fine_amt: {
                            required:"This field is required"
                            },
                        staff_fine_amt: {
                            required:"This field is required"
                            }
                    }
                    });


            $("#edit_configs").submit(function(e) {				
                
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
                                
                                if($('#edit_configs').valid())
                                { 
                                    var form_data = $('#edit_configs').serialize();        
                                    
                                    console.log(form_data);
                                    
                                          $.ajax({
                                              type:"POST",
                                              data:form_data,
                                              url:base_url+"index.php/config/update",
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