<?php
// jawaban
// 1
function greet() {
	return "Hello world";
}
// 2
$warna = array("merah", "jingga", "kuning");
// 3
function fizzbuzz($n) {

	for ($i = 1; $i < $n; $i++) {
		if ($i % 3 == 0) {
			echo "fizz<br>";
		}

		if ($i % 5 == 0) {
			echo "buzz<br>";
		}

		if ($i % 3 !== 0 && $i % 5 !== 0) {
			echo $i . "<br>";
		}
	}
}

fizzbuzz(100);

?>