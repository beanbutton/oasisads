<div class="wrap">
<h2>Simple Popup Plugin</h2>
<div class='error'>
	<p>Looking for a popup that will automatically open when the page is loaded?  Check out <a href="http://www.grimmdude.com/wordpress-simple-auto-delay-popup-plugin/" target="_blank">Simple Auto Delay Popup</a></p>
</div>
<p>This is version 4.0 <a href="http://www.grimmdude.com/wordpress-simple-popup-plugin" title="Feedback & Help" target="_blank">Feedback & Help</a> |  
<a href="http://www.grimmdude.com/donate" title="Donate" target="_blank">Donate</a>
</p>
<small>By <a href="http://www.grimmdude.com" title="www.grimmdude.com" target="_blank">Garrett Grimm</a> and <a href="http://ryowebsite.com/" title="http://ryowebsite.com" target="_blank">Rich Hamilton</a></small>



<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>

<h3>Dimensions</h3>
<p class="description">All popups will use these dimensions unless you specify new ones in the shortcode<br />
Example: <code>[popup url="http://www.popupurl.com" width="400" height="600"]</code></p>
<table class="form-table">

<tr valign="top">
<th scope="row"><label for="popup_window_height"> Popup Window Height (px):</label></th>
<td><input type="text" id="popup_window_height" name="popup_window_height" value="<?php echo get_option('popup_window_height'); ?>" /></td>
</tr>
 
<tr valign="top">
<th scope="row"><label for="popup_window_width">Popup Window Width (px):</label></th>
<td><input type="text" id="popup_window_width" name="popup_window_width" value="<?php echo get_option('popup_window_width'); ?>" /></td>
</tr>
</table>

<h3>Window Location</h3>
<p class="description">To center the popup window, set both distance from top/left to 0.</p>
<table class="form-table">
<tr valign="top">
<th scope="row"><label for="popup_window_top">Distance from Top (px):</label></th>
<td><input type="text" id="popup_window_top" name="popup_window_top" value="<?php echo get_option('popup_window_top'); ?>" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="popup_window_left">Distance from Left (px):</label></th>
<td><input type="text" id="popup_window_left" name="popup_window_left" value="<?php echo get_option('popup_window_left'); ?>" /></td>
</tr>


<tr valign="top">
<th scope="row"><label for="popup_scrollbar">Scroll Bars:</label></th>
<td><input id="popup_scrollbar" name="popup_scrollbar" type="checkbox" id="popup_scrollbar" value="1" <?php checked('1', get_option('popup_scrollbar')); ?> /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="popup_window_toolbar">Toolbar:</label></th>
<td><input id="popup_window_toolbar" name="popup_window_toolbar" type="checkbox" id="popup_window_toolbar" value="1" <?php checked('1', get_option('popup_window_toolbar')); ?> /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="popup_window_location">Location Bar:</label></th>
<td><input id="popup_window_location" name="popup_window_location" type="checkbox" id="popup_window_location" value="1" <?php checked('1', get_option('popup_window_location')); ?> /></td>
</tr>

</table>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="popup_window_height,popup_window_width,popup_window_top,popup_window_left,popup_scrollbar,popup_window_toolbar,popup_window_location" />

<p class="submit">
<input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" />
</p>

</form>
<h2 style="border-top:1px solid #DFDFDF;">Documentation</h2>
<h3>Shortcode</h3>
<p>To create a popup link in a post or page use this shortcode:<br /> <code>[popup url="http://www.popupurl.com"]Link Text Here[/popup]</code></p>
<h4>Short Code Attributes:</h4>
<p>
	<ul>
		<li>url = '*The url you wish you popup.  The only required attribute.'</li>
		<li>width = 'The width of the popup in pixels.  Overrides the width set in the options screen.'</li>
		<li>height = 'The height of the popup in pixels.  Overrides the height set in the options screen.'</li>
		<li>class = 'Add a custom class to the link (simple_popup_link is added to each link by default)'</li>
		
	</ul>
</p>
<h3>Template Tag</h3>
<p>To create a popup link in a particular area of your theme simply call the shortcode like so:<br />
<code>&lt;?php echo do_shortcode('[popup url="http://popupurl.com']LINK TEXT[/popup]'); ?&gt;</code></p>

<p>You can use an image as a link in a template file like so:<br />
<code>&lt;?php echo do_shortcode('[popup url="http://popupurl.com']&lt;img src='http://www.imageurl.com/image.jpg' />[/popup]'); ?&gt;</code></p>
<h3>Widget</h3>
<p>There's also an easy to use widget, so don't forget about it!  <a href="<?php bloginfo('url'); ?>/wp-admin/widgets.php">Find it here.</a></p>

<p><u>**Always use "http://" in your urls</u></p>

<p style="font-size:15px;"><i>If you have any problems or questions please visit <a href="http://www.grimmdude.com/wordpress-simple-popup-plugin/">http://www.grimmdude.com/wordpress-simple-popup-plugin/</a></i></p>
<p><i>Written in <a href="http://en.wikipedia.org/wiki/Shanghai" target="_blank">Shanghai, China</a>.</i></p>
</div>
