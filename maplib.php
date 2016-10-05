<?php

class Tag {

	public $id;
	public $x;
	public $y;

	public function __construct($a, $b, $c) {
		$this->id = $a;
		$this->x = $b;
		$this->y = $c;
	}
}

$map = [
	new Tag('tag01', 50, 500),
	new Tag('tag02', 100, 500),
	new Tag('tag03', 100, 550),
	new Tag('tag04', 150, 550),
	new Tag('tag05', 150, 500),
	new Tag('tag06', 300, 500),
	new Tag('tag07', 350, 500),
	new Tag('tag08', 400, 500),
	new Tag('tag09', 450, 500)];

?>