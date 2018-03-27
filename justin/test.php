<?php

echo <<<HTML

<form action="test1.php" method="POST">

HTML;

	for($i=0; $i< 5; $i++){

echo <<<HTML

	<label>Text: </label><input type="text" name="inputs[$i][response]"><input type="text" name="inputs[$i][other]"><br>

HTML;
		
	}

echo <<<HTML

	<input type="submit" value="Valider"/>
</form>
HTML;

?>

<!--
<input type="text" name="question[$i][note]"/><input type="text" name="question[$i][com]"/><input type="text" name="question[$i][env]"/>


$sheet = array();

$intitule = $sheet[0];

foreach($sheet as $key=>$value){
	$value[0]
	for($i=1<$i<$value.length-1;i++){
		<input type="text" name="question[$i][note]"/><input type="text" name="question[$i][com]"/><input type="text" name="question[$i][env]"/>
	}
}
-->