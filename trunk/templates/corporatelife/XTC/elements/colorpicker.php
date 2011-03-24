<?php
/*
	JoomlaXTC ColorPicker

	Copyright (C) 2009,2010  Monev Software LLC.	All Rights Reserved.
	
	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
	
	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
	
	THIS LICENSE IS NOT EXTENSIVE TO ACCOMPANYING FILES UNLESS NOTED.

	See COPYRIGHT.php for more information.
	See LICENSE.php for more information.
	
	Monev Software LLC
	www.joomlaxtc.com
*/

if (!defined( '_JEXEC' )) die( 'Direct Access to this location is not allowed.' );

class JElementColorpicker extends JElement {

	function fetchElement($name, $value, &$node, $control_name)
	{
		$live_site = JURI::root();
		$template = basename(dirname(dirname(dirname(__FILE__))));
		
		$document 	=& JFactory::getDocument();
		$document->addStyleSheet($live_site."templates/$template/XTC/XTC.css",'text/css');
		$document->addStyleSheet($live_site."templates/$template/XTC/elements/colorpicker.css");
		$document->addScript($live_site."templates/$template/XTC/elements/jquery-1.3.2.min.js"); 
		$document->addScript($live_site."templates/$template/XTC/elements/colorpicker.js");

		$script = "jQuery.noConflict();jQuery(this).ColorPicker({
			onSubmit: function(hsb, hex, rgb, el) {
				hex=hex.toUpperCase();
				jQuery(document.getElementById('".$control_name.$name."')).val('#'+hex);
				jQuery(el).ColorPickerHide();
				el.style.backgroundColor = '#'+hex
			},
			onBeforeShow: function () {
				jQuery(this).ColorPickerSetColor(document.getElementById('".$control_name.$name."').value);
			}
		})";
		$output  = '<input id="'.$control_name.$name.'" name="'.$control_name.'['.$name.']" type="text" size="14" maxlength="32" value="'.$value.'" />';
		$output .= '&nbsp;&nbsp;';
		$output .= '<span id="'.$control_name.$name.'COLORBOX" style="display:inline-block;margin:0;padding:0;cursor:pointer;border:1px solid silver;background-color:'.$value.'" onmousedown="'.$script.'">&nbsp;&nbsp;&nbsp;&nbsp;</span>';
	return $output;
	}
}
?>