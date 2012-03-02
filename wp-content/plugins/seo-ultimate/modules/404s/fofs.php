<?php
/**
 * 404 Monitor Module
 * 
 * @since 0.4
 */

if (class_exists('SU_Module')) {

class SU_Fofs extends SU_Module {
	function get_module_title() { return __('404 Monitor', 'seo-ultimate'); }
	function has_menu_count() { return true; }
	function admin_page_contents() { $this->children_admin_page_tabs(); }
	
	function add_help_tabs($screen) {
		
		$screen->add_help_tab(array(
			  'id' => 'su-fofs-overview'
			, 'title' => __('Overview', 'seo-ultimate')
			, 'content' => __("
<ul>
	<li><strong>What it does:</strong> The 404 Monitor keeps track of non-existent URLs that generated 404 errors. 404 errors are when a search engine or visitor comes to a URL on your site but nothing exists at that URL.</li>
	<li><strong>Why it helps:</strong> The 404 Monitor helps you spot 404 errors; then you can take steps to correct them to reduce link-juice loss from broken links.</li>
	<li><strong>How to use it:</strong> Check the 404 Monitor occasionally for errors. (A numeric bubble will appear next to the &#8220;404 Monitor&#8221; item on the menu if there are any newly-logged URLs that you haven't seen yet. These new URLs will also be highlighted green in the table.) If a 404 error's referring URL is located on your site, try locating and fixing the broken URL. If moved content was previously located at the requested URL, try using a redirection plugin to point the old URL to the new one.</li>
</ul>

<p>If there are no 404 errors in the log, this is good and means there's no action required on your part.</p>
", 'seo-ultimate')));

		$screen->add_help_tab(array(
			  'id' => 'su-fofs-log'
			, 'title' => __('Log Help', 'seo-ultimate')
			, 'content' => __("
<p>You can perform the following actions on each entry in the log:</p>

<ul>
	<li>The &#8220;View&#8221; button will open the URL in a new window. This is useful for testing whether or not a redirect is working.</li>
	<li>The &#8220;Google Cache&#8221; button will open Google's archived version of the URL in a new window. This is useful for determining what content, if any, used to be located at that URL.</li>
	<li>Once you've taken care of a 404 error, you can click the &#8220;Remove&#8221; button to remove it from the list. The URL will reappear on the list if it triggers a 404 error in the future.</li>
</ul>
", 'seo-ultimate')));
		
		$screen->add_help_tab(array(
			  'id' => 'su-fofs-settings'
			, 'title' => __('Settings Help', 'seo-ultimate')
			, 'content' => __("
<p>The following options are available on the Settings tab:</p>

<ul>
	<li>
		<strong>Monitoring Settings</strong>
		<ul>
			<li><strong>Continue monitoring for new 404 errors</strong> &mdash; If disabled, 404 Monitor will keep existing 404 errors in the log but won't add any new ones.</li>
		</ul>
	</li>
	<li>
		<strong>Log Restrictions</strong>
		<ul>
			<li><strong>Only log these types of 404 errors</strong> &mdash; Check this option to log a 404 error <em>only</em> if it meets at least one of the criteria you specify. If you don't enable any criteria, no 404 errors will be logged.
				<ul>
					<li><strong>404s generated by search engine spiders</strong> &mdash; When logging restriction is enabled, this option will make an exception for 404 errors generated by one of the top search engines (Google, Yahoo, Baidu, Bing, Yandex, Soso, Ask.com, Sogou, or AltaVista).</li>
					<li><strong>404s with referring URLs</strong> &mdash; When logging restriction is enabled, this option will make an exception for 404 errors generated by users who click a link on your site or another site first before ending up at a 404 page on your site.</li>
				</ul>
			</li>
		</ul>
	</li>
	<li><strong>Maximum Log Entries</strong> &mdash; Here you can set the maximum number of log entries that 404 Monitor will keep at a time. Setting this to a reasonable number will help keep database usage under control. If you change this setting, it will take effect the next time a 404 is logged.</li>
	<li><strong>URLs to Ignore</strong> &mdash; URLs entered here will be ignored whenever they generate 404 errors in the future. You can use asterisks (*) as wildcards.</li>
</ul>
", 'seo-ultimate')));
		
		$screen->add_help_tab(array(
			  'id' => 'su-fofs-troubleshooting'
			, 'title' => __('Troubleshooting', 'seo-ultimate')
			, 'content' => __("
<p>404 Monitor doesn't appear to work? Take these notes into consideration:</p>

<ul>
	<li>The 404 Monitor doesn't record 404 errors generated by logged-in users.</li>
	<li>In order for the 404 Monitor to track 404 errors, you must have non-default permalinks enabled under <a href='options-permalink.php' target='_blank'>Settings &rArr; Permalinks</a>.</li>
	<li>Some parts of your website may not be under WordPress's control; the 404 Monitor can't track 404 errors on non-WordPress website areas.</li>
</ul>
", 'seo-ultimate')));
	}
}

}
?>