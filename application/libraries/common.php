<?php

class Common
{
    public function __construct()
    {
    
    }
    
    
    public function get_action_links($edit,$delete,$view)
    {
        
        $link = '<ul id="icons" class="ui-widget ui-helper-clearfix">';
        
        if(!empty($edit))
        {
            $link .='<li class="ui-state-default ui-corner-all" title="Edit Record"><span class="ui-icon ui-icon-pencil edit" id="'.$edit.'"></span></li>';        
        }     
        
        if(!empty($delete))
        {
            $link .='<li class="ui-state-default ui-corner-all" title="Delete Record" ><span class="ui-icon ui-icon-trash delete" id="'.$delete.'" ></span></li>';        
        }
        
        if(!empty($view))
        {
            $link .='<li class="ui-state-default ui-corner-all" title="View Details" ><span class="ui-icon ui-icon-newwin view" id="'.$view.'"></span></li>';        
        }
    
        
        $link .= '</ul>';
	
        return $link;
    }
}