<?php
/*
Plugin Name: Widget Like in Mail.ru
Plugin URI: http://bogutsky.ru/?page_id=40
Description: This plugin add in sidebar pages of your blog which it is pleasant to users Mail.ru;<br> Данный плагин добавляет в сайдбар страницы вашего блога, которые нравятся пользователям Mail.ru.
Author: Bogutsky Yaroslav
Version: 1.0
Author URI: http://bogutsky.ru
*/
/*  Copyright 2011  Bogutsky Yaroslav  (email: admin@bogutsky.ru)

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
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


	
if(is_admin())
{
	/* Административная часть */
	add_action('admin_menu', 'widgetlikemailru_admin_menu');
	function widgetlikemailru_admin_menu(){
		add_theme_page('Widget Like in Mail.ru', 'Widget Like in Mail.ru', 10, 'widgetlikemailru', 'widgetlikemailru_options');
		add_action( 'admin_init', 'widgetlikemailru_register_options' );
		add_action('admin_head', 'widgetlikemailru_admin_js');
	}
	
	function widgetlikemailru_register_options() {
		register_setting( 'widgetlikemailru_options_group', 'widgetlikemailru_width' );
		register_setting( 'widgetlikemailru_options_group', 'widgetlikemailru_height' );
		register_setting( 'widgetlikemailru_options_group', 'widgetlikemailru_title' );
		register_setting( 'widgetlikemailru_options_group', 'widgetlikemailru_notitle' );
		register_setting( 'widgetlikemailru_options_group', 'widgetlikemailru_title-color' );
		register_setting( 'widgetlikemailru_options_group', 'widgetlikemailru_background' );
		register_setting( 'widgetlikemailru_options_group', 'widgetlikemailru_border' );
		register_setting( 'widgetlikemailru_options_group', 'widgetlikemailru_color' );
		register_setting( 'widgetlikemailru_options_group', 'widgetlikemailru_link-color' );
		register_setting( 'widgetlikemailru_options_group', 'widgetlikemailru_font' );
	}

	function widgetlikemailru_options(){
	?>
	<div class="wrap">
	<h2><?php _e('Settings Widget Like in Mail.ru','widgetlikemailru'); ?></h2>
     <?php settings_errors(); ?>
	<form method="post" action="options.php">
	    <?php settings_fields( 'widgetlikemailru_options_group' ); ?>
    	<div id="widgetlikemailru-title-div"<?php if(get_option('widgetlikemailru_notitle')) echo "style=\"display: none;\"";?>>
			<?php _e('Title (default:"Популярное")','widgetlikemailru'); ?>:
			<br>
			<input type="text" name="widgetlikemailru_title" size="30" maxlength="30" value="<?php if(get_option('widgetlikemailru_title'))  echo get_option('widgetlikemailru_title'); ?>">
			<br>
			<?php _e('Title background color','widgetlikemailru'); ?>:
			<br>
			<input class="colorfield" readonly="readonly" type="text" name="widgetlikemailru_title-color" size="10" maxlength="10" value="<?php if(get_option('widgetlikemailru_title-color'))  echo get_option('widgetlikemailru_title-color'); ?>">
			<br>
		</div>
		<input type="checkbox" id="widgetlikemailru-title-checkbox" name="widgetlikemailru_notitle" value="true"<?php if(get_option('widgetlikemailru_notitle')) echo " checked=\"checked\"";?>> <?php _e('Hide title','widgetlikemailru'); ?>
		<br>
		<?php _e('Width (default: 300)','widgetlikemailru'); ?>:
		<br>
		<input type="text" name="widgetlikemailru_width" size="10" maxlength="10" value="<?php if((get_option('widgetlikemailru_width'))&&(is_numeric(get_option('widgetlikemailru_width'))))  echo get_option('widgetlikemailru_width'); else echo "300";?>">
		<br>
		<?php _e('Height (default: 300)','widgetlikemailru'); ?>:
		<br>
		<input type="text" name="widgetlikemailru_height" size="10" maxlength="10" value="<?php if((get_option('widgetlikemailru_height'))&&(is_numeric(get_option('widgetlikemailru_height'))))  echo get_option('widgetlikemailru_height'); else echo "300"; ?>">
		<br>
		<?php _e('Background color','widgetlikemailru'); ?>:
		<br>
		<input class="colorfield" readonly="readonly" type="text" name="widgetlikemailru_background" size="10" maxlength="10" value="<?php if(get_option('widgetlikemailru_background'))  echo get_option('widgetlikemailru_background'); ?>">
		<br>
		<?php _e('Border color','widgetlikemailru'); ?>:
		<br>
		<input class="colorfield" readonly="readonly" type="text" name="widgetlikemailru_border" size="10" maxlength="10" value="<?php if(get_option('widgetlikemailru_border'))  echo get_option('widgetlikemailru_border'); ?>">
		<br>
		<?php _e('Text color','widgetlikemailru'); ?>:
		<br>
		<input class="colorfield" readonly="readonly" type="text" name="widgetlikemailru_color" size="10" maxlength="10" value="<?php if(get_option('widgetlikemailru_color'))  echo get_option('widgetlikemailru_color'); ?>">
		<br>
		<?php _e('Link color','widgetlikemailru'); ?>:
		<br>
		<input class="colorfield" readonly="readonly" type="text" name="widgetlikemailru_link-color" size="10" maxlength="10" value="<?php if(get_option('widgetlikemailru_link-color'))  echo get_option('widgetlikemailru_link-color'); ?>">
		<br>
		<?php _e('Font','widgetlikemailru'); ?>:
		<br>
		<select name="widgetlikemailru_font">
			<option value="Arial"<?php if(get_option('widgetlikemailru_font') == "Arial") echo " selected=\"selected\"";?>>Arial</option>
            <option value="Tahoma"<?php if(get_option('widgetlikemailru_font') == "Tahoma") echo " selected=\"selected\"";?>>Tahoma</option>
            <option value="Georgia"<?php if(get_option('widgetlikemailru_font') == "Georgia") echo " selected=\"selected\"";?>>Georgia</option>
		</select>
		<br>
		<input class="button" type="submit" name="widgetlikemailru_save" value="<?php _e('Save options','widgetlikemailru'); ?>">
	</form>
	<?php		
	}
	function widgetlikemailru_admin_js(){
		echo "<link rel=\"stylesheet\" href=\"" . get_bloginfo('siteurl'). "/wp-content/plugins/" . dirname(plugin_basename( __FILE__ )) . "/css/colorpicker.css\" type=\"text/css\">";
		//echo "<script type='text/javascript' src='" . get_bloginfo('siteurl'). "/wp-content/plugins/" . dirname(plugin_basename( __FILE__ )) . "/js/jquery.js" ."'></script>";
		echo "<script type='text/javascript' src='" . get_bloginfo('siteurl'). "/wp-content/plugins/" . dirname(plugin_basename( __FILE__ )) . "/js/colorpicker.js" ."'></script>";
		echo "
		<script type='text/javascript'>
		jQuery(document).ready(function() {
			$('.colorfield').ColorPicker({
				onSubmit: function(hsb, hex, rgb, el) {
					$(el).val(hex);
					$(el).ColorPickerHide();
				},
				onBeforeShow: function () {
					$(this).ColorPickerSetColor(this.value);
				},
				onShow: function (colpkr) {
					$(colpkr).fadeIn(500);
					return false;
				},
				onHide: function (colpkr) {
					$(colpkr).fadeOut(500);
					return false;
				}
			});
			$('#widgetlikemailru-title-checkbox').click(function() {
				if(this.checked) 
					$('#widgetlikemailru-title-div').hide('500');
				else
					$('#widgetlikemailru-title-div').show('500');
			});
		});
		</script>
		";
		
	}
	

	function widgetlikemailru_delete_options($args)
	{
		$num = count($args);
		if ($num == 1) {
			delete_option($args[0]);
		}
		elseif (count($args) > 1)
		{
			foreach ($args as $option) {
				delete_option($option);
			}
		}
	}

	function widgetlikemailru_deactivation () {
		$options = array(
			'widgetlikemailru_width',
			'widgetlikemailru_height',
			'widgetlikemailru_title',
			'widgetlikemailru_notitle',
			'widgetlikemailru_title-color',
			'widgetlikemailru_background',
			'widgetlikemailru_border',
			'widgetlikemailru_color',
			'widgetlikemailru_link-color',
			'widgetlikemailru_font'
		);
		widgetlikemailru_delete_options($options);
	}
	register_deactivation_hook(__FILE__,'widgetlikemailru_deactivation');

	function widgetlikemailru_add_options($args)
	{
		foreach ($args as $name => $value) {
			add_option($name,$value,'','no');
		}
	}
	
	function widgetlikemailru_activation () {
		$options = array(
			'widgetlikemailru_width' => '300',
			'widgetlikemailru_height' => '300',
			'widgetlikemailru_title' => '',
			'widgetlikemailru_notitle' => '',
			'widgetlikemailru_title-color' => '',
			'widgetlikemailru_background' => '',
			'widgetlikemailru_border' => '',
			'widgetlikemailru_color' => '',
			'widgetlikemailru_link-color' => '',
			'widgetlikemailru_font' => 'Arial'
		);
		widgetlikemailru_add_options($options);
		
	}
	register_activation_hook(__FILE__,'widgetlikemailru_activation');
	add_action('init', 'widgetlikemailru_textdomain');
	function widgetlikemailru_textdomain() {
		load_plugin_textdomain('widgetlikemailru', false, dirname( plugin_basename( __FILE__ ) ).'/lang/');
	}




}


function widgetlikemailru_widget($args) {

    extract($args);
   
    echo $before_widget;
	$href = "http://connect.mail.ru/recommendations?"; $rel = "{";
	$href .= "domain=".str_replace('http://','',get_bloginfo('siteurl')); $rel .= "'domain' : '" . str_replace('http://','',get_bloginfo('siteurl')) . "'";
	if($option = get_option('widgetlikemailru_width')) if(is_numeric($option)) $href .= "&width=".$option; $rel .= ", 'width' : '" . $option . "'";
	if($option = get_option('widgetlikemailru_height')) if(is_numeric($option)) $href .= "&height=".$option; $rel .= ", 'height' : '" . $option . "'";
	if($option = get_option('widgetlikemailru_title')) $href .= "&title=".$option; $rel .= ", 'title' : '" . $option . "'";
	if($option = get_option('widgetlikemailru_notitle')) $href .= "&notitle=".$option; $rel .= ", 'notitle' : '" . $option . "'";
	if($option = get_option('widgetlikemailru_title-color')) $href .= "&title-color=".$option; $rel .= ", 'title-color' : '" . $option . "'";
	if($option = get_option('widgetlikemailru_background')) $href .= "&background=".$option; $rel .= ", 'background' : '" . $option . "'";
	if($option = get_option('widgetlikemailru_border')) $href .= "&border=".$option; $rel .= ", 'border' : '" . $option . "'";
	if($option = get_option('widgetlikemailru_color')) $href .= "&color=".$option; $rel .= ", 'color' : '" . $option . "'";
	if($option = get_option('widgetlikemailru_link-color')) $href .= "&link-color=".$option; $rel .= ", 'link-color' : '" . $option . "'";
	if($option = get_option('widgetlikemailru_font')) $href .= "&font=".$option; $rel .= ", 'font' : '" . $option . "'";
	$rel .= "}";
	echo "
	<a class=\"mrc__plugin_recommendations\" href=\"" . $href . "\" rel=\"" . $rel . "\">Рекомендации</a>
	<script src=\"http://connect.mail.ru/js/loader.js\" type=\"text/javascript\" charset=\"UTF-8\"></script>
   	";
    echo $after_widget;

}


function widgetlikemailru_register_widget() {
    register_sidebar_widget('Widget Like in Mail.ru', 'widgetlikemailru_widget');
}

add_action('init', 'widgetlikemailru_register_widget');



?>
