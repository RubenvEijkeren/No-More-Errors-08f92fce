<?php
	define("GELDEENHEDEN", [50, 20, 10, 5, 2, 1, 0.5, 0.2, 0.1, 0.05]);
	if (count($argv) < 2 || $argv[1] == "")
		{
			echo "Je hebt geen bedrag meegegeven dat omgewisseld dient te worden";
			exit;
		}
	$IN = $argv[1];
	isValid($IN);
	$input = round($argv[1]/0.05)*0.05;
	
	calcChange($input);

	function isValid($e){
		if ($e[0] == "-"){
			echo "Ik kan geen negatief bedrag wisselen";
			exit;
		}
		if ($e == 0){
		echo "Geen wisselgeld\n";
			exit;
		}
		if (!(is_numeric($e))){
			echo "Je hebt geen geldig bedrag meegegeven\n";
			exit;
		}
	}
	function calcChange($bedrag){
		foreach (GELDEENHEDEN as $key => $value) {
//			echo "current value: " . $value . "\n";
			if ($bedrag > $value && $value	 > 1){
				$aantal = intval($bedrag / $value);
				$bedrag = round(($bedrag*100) % ($value*100))/100;
				echo $aantal . " x " . $value . " euro\n";
			}
			if ($bedrag > $value && $value < 1){
				$aantal = intval($bedrag / $value);
	//			echo "current aantal: " . $aantal . "\n";
				$bedrag = round(($bedrag*100) % ($value*100))/100;
	//			echo "current bedrag: " . $bedrag . "\n";
				echo $aantal . " x " . $value*100 . " cent\n";
			}
			if ($bedrag == 1){
				echo "1 x 1 euro\n";
				exit;
			}
			if ($bedrag == 0.05){
				echo "1 x 5 cent";
				exit;
			}
		}
	}

?>