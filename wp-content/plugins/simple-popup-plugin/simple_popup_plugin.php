<?php
/*
Plugin Name: Simple Popup Plugin
Plugin URI: http://www.grimmdude.com/wordpress-simple-popup-plugin
Description: This plugin makes it easy to create a simple, modifiable popup window.  Using the shortcode you can create a popup link and set the dimensions of each individual popup.
Version: 4.0
Author: Garrett Grimm
Author URI: http://www.grimmdude.com
*/

/*  Copyright 2011  Garrett Grimm  (email : garrett@grimmdude.com)

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

//Javascript to be placed in header.php
function popup_plugin_script(){
    $width=(get_option('popup_window_width')==null)?'750':get_option('popup_window_width');
    $height=(get_option('popup_window_height')==null)?'550':get_option('popup_window_height');
    $myleft=(get_option('popup_window_left')==null || (get_option('popup_window_left')==0)) ? '0' : get_option('popup_window_left');
    $mytop=(get_option('popup_window_top')==null || (get_option('popup_window_top')==0))  ? '0' : get_option('popup_window_top');
    $scrollbar=(get_option('popup_scrollbar')==1) ? "yes" : "no";
    $toolbar=(get_option('popup_window_toolbar')==1) ? "yes" : "no";
    $location=(get_option('popup_window_location')==1) ? "yes" : "no";
    echo "
<!--Simple Popup Plugin v4.0 / RH Mods-->
<script language=\"javascript\" type=\"text/javascript\">
<!--
var swin=null;
function popitup(mypage,w,h,pos,myname,infocus){
    if (w!=parseInt(w)||w<=0) w=$width;
    if (h!=parseInt(h)||h<=0) h=$height;
    if (myname==null){myname=\"swin\"};
    myleft=$myleft;
    mytop=$mytop;
    if (myleft==0 && mytop==0 && pos!=\"random\"){pos=\"center\"};
    if (pos==\"random\"){myleft=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;mytop=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
    if (pos==\"center\"){myleft=(screen.width)?(screen.width-w)/2:100;mytop=(screen.height)?(screen.height-h)/2:100;}
    settings=\"width=\" + w + \",height=\" + h + \",top=\" + mytop + \",left=\" + myleft + \",scrollbars=$scrollbar,location=$location,directories=no,status=no,menubar=no,toolbar=$toolbar,resizable=no\";swin=window.open(mypage,myname,settings);
    if (infocus==null || infocus==\"front\"){swin.focus()};
    return false;
}
// -->
</script>
<!--/Simple Popup Plugin-->
";
}

//inserts script in head of document
add_action ( 'wp_head', 'popup_plugin_script' );

//Options page
add_action('admin_menu', 'simple_popup_menu');

//Set option defaults only if option doesn't exist
add_option('popup_window_width', '500');
add_option('popup_window_height', '500');
add_option('popup_window_left', '0');
add_option('popup_window_top', '0');

function simple_popup_menu() {
    add_options_page('Simple Popup Plugin Options', 'Simple Popup Plugin', 8, __FILE__, 'simple_popup_options');
}

function simple_popup_options() {
    include 'simple_popup_admin.php';
}

//defines shortcode
add_shortcode('popup', 'popup_plugin_shortcode');

//echo the popup url for shortcode
function output_popup_url() {
    return get_option('popup_window_url');
}
function popup_plugin_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'url' => '',
		'class' => '',
		'height' => get_option('popup_window_height'),
		'width' => get_option('popup_window_width'),
	), $atts ) );
    return "<a href='{$url}' onClick='return popitup(this.href, {$width}, {$height});' class='simple_popup_link {$class}'>$content</a>";    
}

//defines tag for theme templates
function simple_popup_link($templateurl,$link_text) {
    echo "<a href='$templateurl' onClick='return popitup(this.href);'>$link_text</a>";    
}

/**
 * Pages widget class
 *
 * @since 2.8.0
 */
class simple_popup_Widget extends WP_Widget {

    function simple_popup_Widget() {
        $widget_ops = array('classname' => 'widget_simple_popup', 'description' => __( 'Simple Popup Plugin') );
        $this->WP_Widget('simple_popup', __('Popup Links'), $widget_ops);
    }

    function widget( $args, $instance ) {
        extract( $args );
        $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'height' => 550, 'width' => 750, 'clicktext'=>'Click Here', 'url'=>'') );
        $title = apply_filters('widget_title', $instance['title']);
        $out='';
        if ( $instance['urls'] ) {
            $urls = unserialize( $instance['urls'] );
            if (is_array($urls)) {
                foreach ($urls as $pop) {
                    if ( !empty( $pop['url'] ) ) {
                        $out .= "<li><a href='{$pop['url']}' onClick='return popitup(this.href,{$pop['width']},{$pop['height']});' target='_blank'>{$pop['clicktext']}</a></li>\n";
                    }
                }
            }
            if ($out) {
                echo $before_widget;
                if ($title) echo $before_title . $title . $after_title;
                echo "\n<ul>\n$out\n</ul>\n";
                echo $after_widget;
            }
        }
    }

    function update( $new_instance, $old_instance ) {
        //$instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $newurls=array();
        $xnewurls=array();
        if (is_array($new_instance['urls'])) {
            foreach ( $new_instance['urls'] as $key => $val) {
                $kk = explode('_',$key);
                if ($kk[1]=='url' && !(empty($val)||substr($val,0,1)=='/'||substr(strtolower($val),0,4)=='http')) $val="http://$val";
                $newurls[$kk[0]][$kk[1]]=$val;
            }
            foreach ($newurls as $url) {
                if ($url['url']) $xnewurls[] = $url;
            }
        }
        $instance['urls'] = serialize( $xnewurls );
        return $instance;
    }

    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => '','urls'=>'') );
        $title = esc_attr( $instance['title'] );
        $urls = ($instance['urls'] != '') ? unserialize( $instance['urls'] ) : array();
        $width=(get_option('popup_window_width')==null)?'750':get_option('popup_window_width');
        $height=(get_option('popup_window_height')==null)?'550':get_option('popup_window_height');
        $urls[]=array('clicktext'=>'Click Here', 'url'=>'', 'width' => $width, 'height' => $height);
        echo '<p><label for="'.$this->get_field_id('title').'">'.__('Title:').'</label> <input class="widefat" id="'.$this->get_field_id('title').'" name="'.$this->get_field_name('title').'" type="text" value="'.$title."\" /></p><hr>\n";
        $id=1;
        foreach ($urls as $pop) {
            $clicktext = esc_attr( $pop['clicktext'] );
            $url = esc_attr( $pop['url'] );
            $width = esc_attr( $pop['width'] );
            $height = esc_attr( $pop['height'] );
            echo "<div style='float:right;'><b>#$id</b></div>\n";
            echo "<p><label for=\"".$this->get_field_id('urls')."[{$id}_clicktext]\">"._e('Link Text:')."</label>
            <input class=\"widefat\" id=\"".$this->get_field_id('urls')."[{$id}_clicktext]\" name=\"".$this->get_field_name('urls')."[{$id}_clicktext]\" type=\"text\" value=\"$clicktext\" /></p>\n";
            echo "<p><label for=\"".$this->get_field_id('urls')."[{$id}_url]\">"._e('URL:')."</label>
            <input class=\"widefat\" id=\"".$this->get_field_id('urls')."[{$id}_url]\" name=\"".$this->get_field_name('urls')."[{$id}_url]\" type=\"text\" value=\"$url\" /></p>\n";
            echo "<p>Width: <input size=\"4\" id=\"".$this->get_field_id('urls')."[{$id}_width]\" name=\"".$this->get_field_name('urls')."[{$id}_width]\" type=\"text\" value=\"$width\" />\n";
            echo "&nbsp;&nbsp;Height: <input size=\"4\" id=\"".$this->get_field_id('urls')."[{$id}_height]\" name=\"".$this->get_field_name('urls')."[{$id}_height]\" type=\"text\" value=\"$height\" /></p>\n";
            echo "<hr>\n";
            $id++;
        }
        echo '<p><small>To Delete, clear URL and click Save.</small></p>';
    }

}

function simple_popup_Widget_init() {
    register_widget('simple_popup_Widget');
}
add_action('init', 'simple_popup_Widget_init', 1);
?>