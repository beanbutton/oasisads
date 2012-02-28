<?php 
$advanced_fancybox_info = unserialize(get_option('advanced_fancybox_info'));
?>
<style type="text/css">
td{
border:1px solid #c3c3c3;
padding:5px;
}
</style>
<h2>Advanced Fancybox</h2>
Change Your fancybox Settings here:
<form method="post" action="">
	<table>
	<tr>
		<td><b>Frame Width: </b></td>
		<td><input type="text" name="advanced_fancybox_frameWidth" value="<?php echo $advanced_fancybox_info[0];?>" /> - Width of iframe for iframe url type</td>
	</tr>
	<tr>
		<td><b>Frame Height: </b></td>
		<td><input type="text" name="advanced_fancybox_frameHeight" value="<?php echo $advanced_fancybox_info[1];?>" /> - Height of iframe for iframe url type</td>
	</tr>
	<tr>
		<td><b>Padding</b></td>
		<td><input type="text" name="advanced_fancybox_padding" value="<?php echo $advanced_fancybox_info[2];?>" /> - Padding arround content</td>
	</tr>
	<tr>
		<td><b>Image Scale</b></td>
		<td><input type="checkbox" name="advanced_fancybox_imageScale" <?php if($advanced_fancybox_info[3]=="on"){ echo " checked ";}?> /> - If Checked, images are scaled to fit in viewport (Default Checked)</td>
	</tr>
	<tr>
		<td><b>Zoom Opacity</b></td>
		<td><input type="checkbox" name="advanced_fancybox_zoomOpacity" <?php if($advanced_fancybox_info[4]=="on"){ echo " checked ";}?> /> - If Checked, changes content transparency when animating (Default false)</td>
	</tr>
	<tr>
		<td><b>Zoom Speed In</b></td>
		<td><input type="text" name="advanced_fancybox_zoomSpeedIn" value="<?php echo $advanced_fancybox_info[5];?>" /> - Speed in miliseconds of the zooming-in animation(no animation if 0) - (default 0)</td>
	</tr>
	<tr>
		<td><b>Zoom Speed Out</b></td>
		<td><input type="text" name="advanced_fancybox_zoomSpeedOut" value="<?php echo $advanced_fancybox_info[6];?>" /> - Speed in miliseconds of the zooming-out animation (no animation if 0) - (default 0)</td>
	</tr>
	<tr>
		<td><b>Zoom Speed Change</b></td>
		<td><input type="text" name="advanced_fancybox_zoomSpeedChange" value="<?php echo $advanced_fancybox_info[7];?>" /> -  	Speed in miliseconds of the animation when changing gallery items
(no animation if 0) - (default 300)</td>
	</tr>
	<tr>
		<td><b>Easing In</b></td>
		<td><input type="text" name="advanced_fancybox_easingIn" value="<?php echo $advanced_fancybox_info[8];?>" />  - Easing used for animations - (default swing)</td>
	</tr>
	<tr>
		<td><b>Easing Out</b></td>
		<td><input type="text" name="advanced_fancybox_easingOut" value="<?php echo $advanced_fancybox_info[9];?>" /> -  Easing used for animations - (default swing)</td>
	</tr>
	<tr>
		<td><b>Easing Change</b></td>
		<td><input type="text" name="advanced_fancybox_easingChange" value="<?php echo $advanced_fancybox_info[10];?>" />  - Easing used for animations - (default swing)</td>
	</tr>
	<tr>
		<td><b>Overlay Show</b></td>
		<td><input type="checkbox" name="advanced_fancybox_overlayShow" <?php if($advanced_fancybox_info[11]=="on"){ echo " checked ";}?> /> 	 - If Checked, shows the overlay (false by default)
Overlay color is defined in CSS file - (default Checked)</td>
	</tr>
	<tr>
		<td><b>Overlay Opacity</b></td>
		<td>
		<select name="advanced_fancybox_overlayOpacity">
		<?php 
			$i=1;
			while($i<10){
		?>
			<option value="0.<?php echo $i;?>" <?php if($advanced_fancybox_info[12]=="0.".$i){ echo " selected ";} ?>><?php echo $i;?>0%</option>
			<?php 
			$i++;
			}
			?>
			<option value="1" <?php if($advanced_fancybox_info[12]=="1"){ echo " selected ";} ?>>100%</option>
		</select>
		 -  	Opacity of overlay (from 10% to 100%) - (default 30%)</td>
	</tr>
	<tr>
		<td><b>Hide On Content Click</b></td>
		<td><input type="checkbox" name="advanced_fancybox_hideOnContentClick" <?php if($advanced_fancybox_info[13]=="on"){ echo " checked ";}?>/> - Hides FancyBox when cliked on opened item - (default Checked)</td>
	</tr>
	<tr>
		<td><b>Center On Scroll</b></td>
		<td><input type="checkbox" name="advanced_fancybox_centerOnScroll" <?php if($advanced_fancybox_info[14]=="on"){ echo " checked ";} ?> /> 	 - If Checked, content is centered when user scrolls page - (default Checked)</td>
	</tr>
	<tr>
		<td><b>Item Array</b></td>
		<td><input type="text" name="advanced_fancybox_itemArray" value="<?php echo $advanced_fancybox_info[15];?>" /> - Optional, can set custom item array - (default no array)</td>
	</tr>
	<tr>
		<td><b>Callback On Start</b></td>
		<td><input type="text" name="advanced_fancybox_callbackOnStart" value="<?php echo $advanced_fancybox_info[16];?>" />  - 	Optional, called on start - (default null)</td>
	</tr>
		<tr>
		<td><b>Callback On Show</b></td>
		<td><input type="text" name="advanced_fancybox_callbackOnShow" value="<?php echo $advanced_fancybox_info[17];?>" />  - 	Optional, called on displaying content - (default null)</td>
	</tr>
		<tr>
		<td><b>Callback On Close</b></td>
		<td><input type="text" name="advanced_fancybox_callbackOnClose" value="<?php echo $advanced_fancybox_info[18];?>" /> 	Optional, called on close - (default null)</td>
	</tr>
	</table>
	<input type="hidden" name="advanced_fancybox_Hidd" value="advanced_fancybox_Hidd" />
	<br/>
	<br/>
	<input type="submit" value="Update"/>
</form>
<br/>
View other plugins made by us on <a href="http://www.appchain.com">AppChain.com</a>

