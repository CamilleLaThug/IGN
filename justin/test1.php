<?php


//var_dump($_POST);

$in = $_POST['inputs'];

foreach ($in as $key => $value) {

echo "Key: ".$key."&emsp;&emsp;&emsp;&emsp;Response: ".$value['response']."&emsp;&emsp;&emsp;&emsp;Other: ".$value['other']."</br>";
	
}

?>