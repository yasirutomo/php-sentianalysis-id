<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sentiment Analysis Indonesia Sederhana</title>

    <link rel="stylesheet" href="css/pure-min.css"></head>

<body style="margin: 0 auto;width:90%;padding:10px;">
	<h2>Sentiment Analysis Indonesia Sederhana</h2>
    <form class="pure-form" style="width:100%" action="" method="post">
    
        <fieldset class="pure-group">
            <textarea name="kalimat" class="pure-input-1-2" placeholder="kalimat (contoh: ahok pantas menjadi gubernur jakarta)"></textarea>
        </fieldset>
    
        <button type="submit" name="submit" class="pure-button pure-input-1-2 pure-button-primary">Uji Sentimen</button>
    </form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
	if (PHP_SAPI != 'cli') {
		echo "<pre>";
	}

	$strings = array(
		1 => $_POST['kalimat'],
	);

	require_once __DIR__ . '/autoload.php';
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

		echo "\n\nHasil:";
		echo "\nKalimat: <b>$string</b>\n";
		echo "Arah sentimen: <b>$class</b>, nilai: ";
		// var_dump($scores);
		foreach ($scores as $skor) {
			echo $skor;
		}
		echo "\n\n";
		$i++;
	}
}
?>