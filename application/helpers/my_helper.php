<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

function tampil_media($file,$width="",$height="") {
	$ret = '';

	$pc_file = explode(".", $file ?? '');
	$eks = end($pc_file);

	$eks_video = array("mp4","flv","mpeg");
	$eks_audio = array("mp3","acc");
	$eks_image = array("jpeg","jpg","gif","bmp","png");


	if (!in_array($eks, $eks_video) && !in_array($eks, $eks_audio) && !in_array($eks, $eks_image)) {
		$ret .= '';
	} else {
		if (in_array($eks, $eks_video)) {
			if (is_file("./".$file)) {
				$ret .= '<p><video width="'.$width.'" height="'.$height.'" controls>
                <source src="'.base_url().$file.'" type="video/mp4">
                <source src="'.base_url().$file.'" type="application/octet-stream">Browser tidak support</video></p>';
			} else {
				$ret .= '';
			}
		} 

		if (in_array($eks, $eks_audio)) {
			if (is_file("./".$file)) {
				$ret .= '<p><audio width="'.$width.'" height="'.$height.'" controls>
				<source src="'.base_url().$file.'" type="audio/mpeg">
				<source src="'.base_url().$file.'" type="audio/wav">Browser tidak support</audio></p>';
			} else {
				$ret .= '';
			}
		}

		if (in_array($eks, $eks_image)) {
			if (is_file("./".$file)) {
				$ret .= '<img class="thumbnail w-100" src="'.base_url().$file.'" style="width: '.$width.'; height: '.$height.';">';
			} else {
				$ret .= '';
			}
		}
	}
	

	return $ret;
}

function make_thumb($src, $dest, $desired_width) {

    /* read the source image */
    $source_image = imagecreatefromjpeg($src);
    $width = imagesx($source_image);
    $height = imagesy($source_image);

    /* find the "desired height" of this thumbnail, relative to the desired width  */
    $desired_height = floor($height * ($desired_width / $width));

    /* create a new, "virtual" image */
    $virtual_image = imagecreatetruecolor($desired_width, $desired_height);

    /* copy source image at a resized size */
    imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

    /* create the physical thumbnail image to its destination */
    imagejpeg($virtual_image, $dest);
}

/* call it
$src="1494684586337H.jpg";
$dest="new.jpg";
$desired_width="200";
make_thumb($src, $dest, $desired_width);
*/

function get_initials($name) {
    if (empty($name)) return '??';
    $name = trim($name);
    $words = explode(" ", $name);
    $initials = "";
    if (count($words) >= 2) {
        $initials = substr($words[0], 0, 1) . substr($words[1], 0, 1);
    } else {
        $initials = substr($words[0], 0, 2);
    }
    return strtoupper($initials);
}

function get_avatar_color($name) {
    $colors = [
        '#4361ee', // primary
        '#3f37c9', // indigo
        '#4895ef', // blue
        '#38b2ac', // teal
        '#ed8936', // orange
        '#d53f8c', // pink
        '#5a67d8', // indigo-light
        '#2ec4b6', // green-teal
        '#e71d36'  // red
    ];
    if (empty($name)) return $colors[0];
    $index = ord(strtoupper(substr($name, 0, 1))) % count($colors);
    return $colors[$index];
}
