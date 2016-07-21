<?php
// Add new input type "group_filters"
if ( function_exists('smile_add_input_type'))
{
	smile_add_input_type('group_filters' , 'group_filters_settings_field' );
}

/**
* Function to handle new input type "group_filters"
*
* @param $settings		- settings provided when using the input type "group_filters"
* @param $value			- holds the default / updated value
* @return string/html 	- html output generated by the function
*/
function group_filters_settings_field($name, $settings, $value)
{
	$input_name = $name;
	$type = isset($settings['type']) ? $settings['type'] : '';
	$class = isset($settings['class']) ? $settings['class'] : '';

	ob_start();
	?>
<select name="<?php echo esc_attr( $input_name ); ?>" id="smile_<?php echo esc_attr( $input_name ); ?>" class="select2-group_filters-dropdown form-control smile-input <?php echo esc_attr( 'smile-'.$type.' '.$input_name.' '.$type.' '.$class ); ?>" multiple="multiple" style="width:260px;">

	<?php

		$selectedValues = explode(",", $value);

		foreach ($selectedValues as $key => $selValue) {

			// posts
			if( strpos( $selValue , "post-" ) !== false ) {
				$postID = (int) str_replace( "post-", "" , $selValue);
				$postTitle = get_the_title( $postID );
				echo '<option value="post-' . $postID . '" selected="selected" >'.$postTitle.'</option>';
			}

			// taxonomy options
			if( strpos( $selValue , "tax-" ) !== false ) {
				$taxID = (int) str_replace( "tax-", "" , $selValue);
				$term = get_term( $taxID );
				$termTaxonomy = ucfirst( str_replace( "_", " ", $term->taxonomy ) );
				echo '<option value="tax-' . $taxID . '" selected="selected" >'.$term->name.' - '.$termTaxonomy.'</option>';
			}

			// Special Pages
			$spacial_pages = array(
				'blog' 			=> 'Blog / Posts Page',
				'front_page' 	=> 'Front Page',
				'archive' 		=> 'Archive Page',
				'author' 		=> 'Author Page',
				'search' 		=> 'Search Page',
				'404' 			=> '404 Page',
			);

			foreach ( $spacial_pages as $page => $title ) {
				$selected = ( "special-".$page == $selValue  ) ? true : false;
				if( $selected ) {
					echo "<option selected='selected' value='special-".$page . "' >".$title."</option>";
				}
			}

		}

	?>
</select>
<script type="text/javascript">
jQuery(document).ready(function($) {

		jQuery('select.select2-group_filters-dropdown').select2({
			placeholder: "Search pages / post / categories",

			ajax: {
			    url: ajaxurl,
			    dataType: 'json',
			    method: 'post',
			    delay: 250,
			    data: function (params) {
			      	return {
			        	q: params.term, // search term
				        page: params.page,
				        action: 'cp_get_posts_by_query'
			    	};
				},
				processResults: function (data) {

					console.log(data);

		            // parse the results into the format expected by Select2.
		            // since we are using custom formatting functions we do not need to
		            // alter the remote JSON data

		            return {
		                results: data
		            };
		        },
			    cache: true
			},
			minimumInputLength: 2,

		});
});
</script>
    <?php
	return ob_get_clean();
}
