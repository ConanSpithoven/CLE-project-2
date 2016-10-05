<?php

include('maplib.php');

try {
	$file = file_get_contents('data.txt');
}catch(Exception $e) {
	echo $e;
}
if(strlen($file > 0)) {
	$data = explode(':', $file);
	$id = $data[0];
	$path = explode(',', $data[1]);
	$nodes = [];

	$image = imagecreatefrompng("images/blank.png");
	$radius = 15;
	$color = imagecolorallocate($image, 255, 0, 0);

	foreach($path as $node) {
		foreach ($map as $tag) {
			if($node == $tag->id) {
				array_push($nodes, $tag);
			}
		}
	}

	for ($i=0; $i < count($nodes); $i++) { 
		imagefilledellipse($image, $nodes[$i]->x - $radius, $nodes[$i]->y - $radius, $radius, $radius, $color);
	}

	imagesetthickness($image, 5);
	$count = 0;
	if(count($nodes) > 1) {
		for ($i=0; $i < count($nodes); $i++) { 
			if($count + 1 >= count($nodes)) {
				$count = 0;
			}
			imageline($image, $nodes[$i]->x - $radius, $nodes[$i]->y - $radius, $nodes[$count]->x - $radius, $nodes[$count]->y - $radius, $color);
		}
		$count++;
	}

	imagepng($image , 'images/map.png');
	imagedestroy($image);

	echo 1;
}

?>