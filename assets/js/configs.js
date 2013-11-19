var cl;	
var form;
jQuery.fn.dataTableExt.oApi.fnSetFilteringDelay = function ( oSettings, iDelay ) {
    var _that = this;
 
   
    if ( iDelay === undefined ) {
        iDelay = 1000;
    }
    
    this.each( function ( i ) {
    	
        $.fn.dataTableExt.iApiIndex = i;
        
        var
            $this = this,
            oTimerId = null,
            sPreviousSearch = null,
            anControl = $( 'input', _that.fnSettings().aanFeatures.f );
       
	      
			//when search text will be entered
           anControl.unbind( 'keyup' ).bind( 'keyup', function() {
            	
		            var $$this = $this;
		      		 if (sPreviousSearch === null || sPreviousSearch != anControl.val()) {
		                window.clearTimeout(oTimerId);
		                sPreviousSearch = anControl.val(); 
		                oTimerId = window.setTimeout(function() {
		                    $.fn.dataTableExt.iApiIndex = i;
		                   	_that.fnFilter( anControl.val() );
		                  
		                }, iDelay);}
            });
          
        return this;
    } );
    return this;
};

jQuery.validator.addMethod("alphanumeric", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);
});

$(document).ready(function(e) {

$( "#button" ).button();

function form_show_hide()
{
    this.show = function(){
        $('.form_area').removeClass('hide').addClass('show').slideDown(1000);						
       },
     this.hide = function(){
         $('.form_area').removeClass('show').addClass('hide').slideUp('slow');
       }
}

form = new form_show_hide ();

$('.buttons').click(function(e){
		if($('.form_area').hasClass('hide'))
		{
			$('.form_area').removeClass('hide').addClass('show').slideDown(1000);						
		}
	});
	
	$('#cancel_button').click(function(e) {
		
		$('.form_area').removeClass('show').addClass('hide').slideUp('slow');
		
    });
	
// Hover states on the static widgets
$( "#icons li" ).hover(
	function() {
		$( this ).addClass( "ui-state-hover" );
	},
	function() {
		$( this ).removeClass( "ui-state-hover" );
	}
);
	
$.extend( $.fn.dataTable.defaults, {
		"bProcessing": true,
		"bServerSide": true,
		"bLengthChange": true,		
		"bAutoWidth": false,
		"sServerMethod": "GET",		
		"iTabIndex": 1,
		"bRetrieve": true,
		"sPaginationType": "full_numbers",
		"bDeferRender": true,
		"bDestroy":true		
});


function notifyMsg()
{
	this.myToast = '';
	this.showMsg = function(msg, etype){
		this.myToast = $().toastmessage('showToast',{
			text     : msg,
			stayTime:  3600,
			sticky   : false,
			position :'top-right',
			type     : etype,
			close    : null
		});
	};
	
	this.hideMsg = function(){
		// removing the toast
		$().toastmessage('removeToast', this.myToast);
	};
	
};

cl = new notifyMsg();
	
});
