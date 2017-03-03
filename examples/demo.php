<?php
if (PHP_SAPI != 'cli') {
	echo "<pre>";
}

$strings = array(
	1 => 'ahok akan menang pilkada',
	2 => 'ahok penista agama, tidak pantas jadi gubernur',
	3 => 'kamu sudah makan?',
	4 => 'anies janji bawa jakarta lebih santun',
	5 => 'jalanan ke malino rusak berat, pemerintah perbaiki dong',
);

require_once __DIR__ . '/../autoload.php';
$sentiment = new \PHPInsight\Sentiment();

$i=1;
foreach ($strings as $string) {

	// calculations:
	$scores = $sentiment->score($string);
	$class = $sentiment->categorise($string);

	// output:
	if (in_array("pos", $scores)) {
	    echo "Got positif";
	}

	echo "\nData: ".$i;
	echo "\nKalimat: <b>$string</b>\n";
	echo "Arah sentimen: <b>$class</b>, nilai: ";
	// var_dump($scores);
	foreach ($scores as $skor) {
		echo $skor;
	}
	echo "\n";
	$i++;
}
