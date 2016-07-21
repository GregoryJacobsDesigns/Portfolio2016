<?php
// Add new input type "icon_picker"
if ( function_exists('smile_add_input_type'))
{
	smile_add_input_type('icon-picker' , 'icon_picker_settings_field' );
}

/**
* Function to handle new input type "icon_picker"
*
* @param $settings		- settings provided when using the input type "icon_picker"
* @param $value			- holds the default / updated value
* @return string/html 	- html output generated by the function
*/
function icon_picker_settings_field($name, $settings, $value)
{
	$input_name = $name;
	$value = htmlentities( $value );
	$type = isset($settings['type']) ? $settings['type'] : '';
	$class = isset($settings['class']) ? $settings['class'] : '';
	$output = '<p><input type="hidden" id="smile_'.$input_name.'" class="form-control smile-input smile-'.$type.' '.$input_name.' '.$type.' '.$class.'" name="' . $input_name . '" value="'.$value.'" /></p>';
	$output .= cpIconPicker($name, $value);
	return $output;
}

/* cp-icon-picker */
function cpIconPicker( $name, $value, $id = 1 )
{	
	$fonts = get_option('smile_fonts');
	$fonts =  get_option('smile_fonts');
	$output = '';
	$output .= '<div class="cp-search-container">';
	$output .= '<p><div class="cp-preview-icon preview-icon-'.$name.'"><i class="'.$value.'"></i></div></p>';
	$output .= '<input class="cp-search-icon cp-search-'.$name.'" type="text" placeholder="Search icons" /></div>';
	$output .= '<div id="cp_icon_search">';
	$output .= '<div class="scrollable-icons">';
	$output .= '<ul class="cp-icons-list cp_smile_icon icon-list-'.$name.'">';

	if( !empty( $fonts ) && is_array( $fonts ) ) {

		foreach($fonts as $font => $info) {
			$icon_set = array();
			$icons = array();
			$upload_dir = wp_upload_dir();
			$path		= trailingslashit($upload_dir['basedir']);
			$file = $path.$info['include'].'/'.$info['config'];
			include($file);
			if(!empty($icons))
			{
				$icon_set = array_merge($icon_set,$icons);
			}
			if($font == "smt")
				$set_name = 'Default Icons';
			else
				$set_name = ucfirst($font);
			if(!empty($icon_set))
			{
				// $output .= '<p><strong>'.$set_name.'</strong></p>';
				$output .= '<li title="no-icon" data-icons="none" data-icons-tag="none,blank" style="cursor: pointer;" id="'.$id.'"></li>';
				foreach($icon_set as $icons)
				{
					foreach($icons as $icon)
					{
						$icon_class = $font.'-'.$icon['class'];
						if( $value == $icon_class ){
							$class = "active-icon";
						} else {
							$class = "";
						}
						$output .= '<li title="'.$icon['class'].'" data-icons="'.$icon_class.'" class="'.$class.'" data-icons-tag="'.$icon['tags'].'" id="'.$name.'">';
						$output .= '<i class="icon '.$icon_class.'"></i></li>';
					}
				}
			}
		}
	}

	$output .'</ul>';
	$output .= '</div>';
	$output .= '<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery(".cp-search-'.$name.'").keyup(function(){
					// Retrieve the input field text and reset the count to zero
					var filter = jQuery(this).val(), count = 0;
					// Loop through the icon list
					jQuery(".icon-list-'.$name.' li").each(function(){
						// If the list item does not contain the text phrase fade it out
						if (jQuery(this).attr("data-icons-tag").search(new RegExp(filter, "i")) < 0) {
							jQuery(this).fadeOut();
						} else {
							jQuery(this).show();
							count++;
						}
					});
				});
				jQuery(".icon-list-'.$name.' li").click(function(){
					jQuery(".icon-list-'.$name.' li").removeClass("active-icon");
					jQuery(this).addClass("active-icon");
					jQuery(".preview-icon-'.$name.' > i").removeAttr("class");
					jQuery(".preview-icon-'.$name.' > i").addClass(jQuery(this).data("icons"));
					jQuery("#smile_'.$name.'").val(jQuery(this).data("icons"));
					jQuery("#smile_'.$name.'").trigger("change");
				});
			});
	</script>';
	$output .= '</div>';
	return $output;
}