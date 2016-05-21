<?php

if (!function_exists('classActivePath')) {
	function classActivePath($path)
	{
		return Request::is($path) ? ' class="active"' : '';
	}
}

if (!function_exists('classActiveSegment')) {
	function classActiveSegment($segment, $value)
	{
		if(!is_array($value)) {
			return Request::segment($segment) == $value ? ' class="active"' : '';
		}
		foreach ($value as $v) {
			if(Request::segment($segment) == $v) return ' class="active"';
		}
		return '';
	}
}

if (!function_exists('classActiveOnlyPath')) {
	function classActiveOnlyPath($path)
	{
		return Request::is($path) ? ' active' : '';
	}
}

if (!function_exists('classActiveOnlySegment')) {
	function classActiveOnlySegment($segment, $value)
	{
		if(!is_array($value)) {
			return Request::segment($segment) == $value ? ' active' : '';
		}
		foreach ($value as $v) {
			if(Request::segment($segment) == $v) return ' active';
		}
		return '';
	}
}

function get_image_size_url($url)
{
	$cacheFolder = "c:/opt/apps/trenzi-php";
	if(! file_exists ($cacheFolder) ) mkdir($cacheFolder, 0777, true);

	$fname = $cacheFolder . "/" . hash("sha256", $url, false);
	
	if( !file_exists($fname) )
	{
		$content = file_get_contents($url);
	
		$fp = fopen($fname, "w");
		fwrite($fp, $content);
		fclose($fp);
	}

	$img = getimagesize($fname);

	return array("imageWidth" => $img[0], "imageHeight" => $img[1], 'imageUrl' => $url);
}