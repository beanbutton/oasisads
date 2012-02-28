<?php 
/*
 
Plugin Name: Advanced Fancybox
Plugin URI: http://www.appchain.com/advanced-fancybox/
Description: Fancybox (lightbox) fully copatible for wordpress.
Author: Turcu Ciprian
License: GPL
Version: 1.1.1
Author URI: http://www.appchain.com

*/
function myplugin_addbuttons() {

   // Don't bother doing this stuff if the current user lacks permissions
   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
     return;
 
   // Add only in Rich Editor mode
   if ( get_user_option('rich_editing') == 'true') {
		 add_filter("mce_external_plugins", "add_myplugin_tinymce_plugin");
		 add_filter('mce_buttons', 'register_myplugin_button');
   }
}
 
function register_myplugin_button($buttons) {
   array_push($buttons, "advancedfancybox");
   return $buttons;
}
 
// Load the TinyMCE plugin : editor_plugin.js (wp2.5)
function add_myplugin_tinymce_plugin($plugin_array) {
   $plugin_array['advancedfancyboxplugin'] = get_option('home').'/wp-content/plugins/advanced-fancybox/tinymce/script.js';
   return $plugin_array;
}



function Advanced_Fancybox_Add_Style(){
	?>
	<!-- Start "Advanced Fancybox" includes -->
	<script type="text/javascript" src="<?php echo bloginfo('url'); ?>/wp-content/plugins/advanced-fancybox/fancybox/jquery-1.3.2.min.js"></script> 
	<!-- for jquery <script type="text/javascript" src="<?php echo bloginfo('url'); ?>/wp-content/plugins/advanced-fancybox/fancybox/jquery.easing.1.3.js"></script>  -->
	<script type="text/javascript" src="<?php echo bloginfo('url'); ?>/wp-content/plugins/advanced-fancybox/fancybox/jquery.fancybox-1.2.1.pack.js"></script> 
	<link rel="stylesheet" href="<?php echo bloginfo('url'); ?>/wp-content/plugins/advanced-fancybox/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
	<style type="text/css">
	.xHidd{
	visibility:hidden;
	overflow:hidden;
	width:1px;
	height:1px;
	}
	</style>
	<?php 
		$advanced_fancybox_info = unserialize(get_option('advanced_fancybox_info'));
		
		if($advanced_fancybox_info[3]=="on"){$advanced_fancybox_info[3] = "true";}else{$advanced_fancybox_info[3] = "false";}
		if($advanced_fancybox_info[4]=="on"){$advanced_fancybox_info[4] = "true";}else{$advanced_fancybox_info[4] = "false";}
		if($advanced_fancybox_info[11]=="on"){$advanced_fancybox_info[11] = "true";}else{$advanced_fancybox_info[11] = "false";}
		if($advanced_fancybox_info[13]=="on"){$advanced_fancybox_info[13] = "true";}else{$advanced_fancybox_info[13] = "false";}
		if($advanced_fancybox_info[14]=="on"){$advanced_fancybox_info[14] = "true";}else{$advanced_fancybox_info[14] = "false";}
		$advanced_fancybox_nameArr = array("frameWidth", "frameHeight", "padding", "imageScale", "zoomOpacity", "zoomSpeedIn", "zoomSpeedOut", "zoomSpeedChange", "easingIn", "easingOut", "easingChange",  "overlayShow", "overlayOpacity", "hideOnContentClick", "centerOnScroll", "itemArray", "callbackOnStart", "callbackOnShow", "callbackOnClose");
	?>
	<script type="text/javascript">
		$(document).ready(function() {
			$("a.advfancybox").fancybox({ 
			<?php 
			$i=0;
			$j=0;
			$xFirst = false;
			$xComma = "";
			while($i<=18){
				if($advanced_fancybox_info[$i]!=""){
					if($xFirst==false){
						$xFirst = true;
					}else{
						$xComma = ",";
					}
					if($j==8 or $j==9 or $j==10){
						$advanced_fancybox_info[$i]= "'".$advanced_fancybox_info[$i]."'";
					}
					
					echo $xComma."
					".$advanced_fancybox_nameArr[$j]." : ".$advanced_fancybox_info[$i];
				}
				$i++;
				$j++;
			}
		?>
			}); 
		});
	</script>
	<!-- End "Advanced Fancybox" includes -->
	<?php
	}
	function admin_initx(){
	?>
		<script type="text/javascript">
		function xTestx(xType, xVal){
			var xextra = '';
			if(xType==1){
				xextra = ' class="advfancybox" href="#'+xVal+'" ';
			}else if(xType==2){
					xextra = ' class="advfancybox" href="'+xVal+'" rel="group"';
			}else if(xType==3){
					xextra = ' class="advfancybox iframe" href="'+xVal+'" ';
			}
			var selectionx = tinyMCE.activeEditor.selection.getContent({format : 'text'});
			var xtext = '<a '+xextra+' >'+selectionx+'</a>';
			tinyMCE.activeEditor.execCommand('mceReplaceContent', true, xtext);
		}
		</script>
	<?php
	}
	function Advanced_Fancybox_insert_post(){
	global $post;
	$thePostID = $post->ID;
	$xResult = '';
		$meta_values = get_post_meta($thePostID, "fancybox", true);
		if($meta_values!=""){
			$xResult = '<div id="fancybox" class="xHidd">'.$meta_values.'</div>';
		}
		$meta_values1 = get_post_meta($thePostID, "fancybox1", true);
		if($meta_values1!=""){
			$xResult .=  '<div id="fancybox1" class="xHidd">'.$meta_values1.'</div>';
		}
		$meta_values2 = get_post_meta($thePostID, "fancybox2", true);
		if($meta_values2!=""){
			$xResult .=  '<div id="fancybox2" class="xHidd">'.$meta_values2.'</div>';
		}
		$meta_values3 = get_post_meta($thePostID, "fancybox3", true);
		if($meta_values3!=""){
			$xResult .=  '<div id="fancybox3" class="xHidd">'.$meta_values3.'</div>';
		}
		$xFinal = format_to_post($post->post_content);
		$xFinal = wpautop($xFinal);

		
		$xResult = $xFinal.$xResult;
		return $xResult;
	}
	function Advanced_Fancybox_Include(){
		include('pages/AdminPage.php');
	}
	function Advanced_Fancybox_Init(){
	if($_POST['advanced_fancybox_Hidd']=="advanced_fancybox_Hidd"){
		$advanced_fancybox_frameWidth = $_POST['advanced_fancybox_frameWidth'];
		$advanced_fancybox_frameHeight = $_POST['advanced_fancybox_frameHeight'];
		$advanced_fancybox_padding = $_POST['advanced_fancybox_padding'];
		$advanced_fancybox_imageScale = $_POST['advanced_fancybox_imageScale'];
		$advanced_fancybox_zoomOpacity = $_POST['advanced_fancybox_zoomOpacity'];
		$advanced_fancybox_zoomSpeedIn = $_POST['advanced_fancybox_zoomSpeedIn'];
		$advanced_fancybox_zoomSpeedOut = $_POST['advanced_fancybox_zoomSpeedOut'];
		$advanced_fancybox_zoomSpeedChange = $_POST['advanced_fancybox_zoomSpeedChange'];
		$advanced_fancybox_easingIn = $_POST['advanced_fancybox_easingIn'];
		$advanced_fancybox_easingOut = $_POST['advanced_fancybox_easingOut'];
		$advanced_fancybox_easingChange = $_POST['advanced_fancybox_easingChange'];
		$advanced_fancybox_overlayShow = $_POST['advanced_fancybox_overlayShow'];
		$advanced_fancybox_centerOnScroll = $_POST['advanced_fancybox_centerOnScroll'];
		$advanced_fancybox_overlayOpacity = $_POST['advanced_fancybox_overlayOpacity'];
		$advanced_fancybox_hideOnContentClick = $_POST['advanced_fancybox_hideOnContentClick'];
		$advanced_fancybox_itemArray = $_POST['advanced_fancybox_itemArray'];
		$advanced_fancybox_callbackOnStart = $_POST['advanced_fancybox_callbackOnStart'];
		$advanced_fancybox_callbackOnShow = $_POST['advanced_fancybox_callbackOnShow'];
		$advanced_fancybox_callbackOnClose = $_POST['advanced_fancybox_callbackOnClose'];
		
		$advanced_fancybox_info[0]=$advanced_fancybox_frameWidth;
		$advanced_fancybox_info[1]=$advanced_fancybox_frameHeight;
		$advanced_fancybox_info[2]=$advanced_fancybox_padding;
		$advanced_fancybox_info[3]=$advanced_fancybox_imageScale;
		$advanced_fancybox_info[4]=$advanced_fancybox_zoomOpacity;
		$advanced_fancybox_info[5]=$advanced_fancybox_zoomSpeedIn;
		$advanced_fancybox_info[6]=$advanced_fancybox_zoomSpeedOut;
		$advanced_fancybox_info[7]=$advanced_fancybox_zoomSpeedChange;
		$advanced_fancybox_info[8]=$advanced_fancybox_easingIn;
		$advanced_fancybox_info[9]=$advanced_fancybox_easingOut;
		$advanced_fancybox_info[10]=$advanced_fancybox_easingChange;
		$advanced_fancybox_info[11]=$advanced_fancybox_overlayShow;
		$advanced_fancybox_info[12]=$advanced_fancybox_overlayOpacity;
		$advanced_fancybox_info[13]=$advanced_fancybox_hideOnContentClick;
		$advanced_fancybox_info[14]=$advanced_fancybox_centerOnScroll;
		$advanced_fancybox_info[15]=$advanced_fancybox_itemArray;
		$advanced_fancybox_info[16]=$advanced_fancybox_callbackOnStart;
		$advanced_fancybox_info[17]=$advanced_fancybox_callbackOnShow;
		$advanced_fancybox_info[18]=$advanced_fancybox_callbackOnClose;
		
		update_option('advanced_fancybox_info', serialize($advanced_fancybox_info));
	}

	add_options_page('My Plugin Options', 'Advanced Fancybox', 8, 'advanced-fancybox/advanced-fancybox.php', 'Advanced_Fancybox_Include');
	}
	function Advanced_Fancybox_Activated(){
	
		$advanced_fancybox_info[0]=425;
		$advanced_fancybox_info[1]=355;
		$advanced_fancybox_info[2]=10;
		$advanced_fancybox_info[3]="on";
		$advanced_fancybox_info[4]="";
		$advanced_fancybox_info[5]=0;
		$advanced_fancybox_info[6]=0;
		$advanced_fancybox_info[7]=300;
		$advanced_fancybox_info[8]='swing';
		$advanced_fancybox_info[9]='swing';
		$advanced_fancybox_info[10]='swing';
		$advanced_fancybox_info[11]="on";
		$advanced_fancybox_info[12]=0.3;
		$advanced_fancybox_info[13]="on";
		$advanced_fancybox_info[14]="on";
		$advanced_fancybox_info[15]="";
		$advanced_fancybox_info[16]="";
		$advanced_fancybox_info[17]="";
		$advanced_fancybox_info[18]="";
		
		update_option('advanced_fancybox_info', serialize($advanced_fancybox_info));
	}
	//start code
	register_activation_hook('advanced-fancybox/advanced-fancybox.php', 'Advanced_Fancybox_Activated');
	
	add_action('wp_print_styles', 'Advanced_Fancybox_Add_Style');
	add_action('admin_print_styles', 'admin_initx');
	// init process for button control
	add_action('init', 'myplugin_addbuttons');
	add_filter('the_content', 'Advanced_Fancybox_insert_post');
	add_action('admin_menu', 'Advanced_Fancybox_Init');
	?>