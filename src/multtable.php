<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$min_multiplicand = $_GET['min'];
$max_multiplicand = $_GET['max'];
$min_multiplier = $_GET['min_multiplier'];
$max_multiplier = $_GET['max_multiplier'];
$allGood = true;
if(!isset($_GET['min'],$_GET['max'],$_GET['min_multiplier'],$_GET['max_multiplier'])){
	echo "Missing parameter [min-multiplicand ... max-multiplier].";
	echo "<br>";
	$allGood = false;
}

 
if(is_numeric($min_multiplicand) && (ctype_punct($min_multiplicand))) {
	echo "Min-multiplicand must be an integer.";
	echo "<br>";
	$allGood = false;
}
if(is_numeric($max_multiplicand) && (ctype_punct($max_multiplicand))) { 
	echo "Max-multiplier must be an integer.";
	echo "<br>";
	$allGood = false;
}
if(is_numeric($max_multiplier) && (ctype_punct($max_multiplier)))  {
	echo "Max-multiplier must be an integer.";
	echo "<br>";
	$allGood = false;
}
if(is_numeric($min_multiplier) && (ctype_punct($min_multiplier))) {
	echo "Min-multiplier must be an integer.";
	echo "<br>";
	$allGood = false;
}
if($min_multiplicand >= $max_multiplicand || $min_multiplier >= $max_multiplier){
	echo "Minimum [multiplicand|multiplier] larger than maximum.";
	echo "<br>";
	$allGood = false;
}

if($allGood){
/* Worked in another file so making variables have same name */
$min = $min_multiplier;		
$max = $max_multiplicand;		
$min_mul = $min_multiplier;
$max_mul = $max_multiplier;
$multiplicand = array();	//min
$multiplier = array();		//min_mul

function inArr($min,$max,$min_mul,$max_mul,&$multiplicand,&$multiplier){
	for($i = $min_mul, $x = 0; $i <= $max_mul;$x++, $i++){
		$multiplier[$x] = $i;
	}
	for($i = $min, $x = 0; $i <= $max;$x++, $i++){
		$multiplicand[$x] = $i;
	}
};

function first($multiplicand,$multiplier){
	for($i = $multiplier[0], $x = 0; $x < count($multiplier) ;$x++, $i++){
		if($i == $multiplier[0])
			echo "<tr><td> </td>";
		echo "<td>" . $multiplier[$x] . "</td>";
	}
};

inArr($min,$max,$min_mul,$max_mul,$multiplicand,$multiplier);		//Make arrays

echo '<table border = "1px" width = "max_mul - min_mul + 2" height =" "max - min +2 >';
first($multiplicand,$multiplier);

for($i = $min, $x = 0 ; $i <= count($multiplicand);$x++, $i++){					//for columns
	for($j = $multiplier[0],$k = 0; $k < count($multiplier) ;$k++, $j++){
		if($k == 0){
			echo "<tr>";
			echo "<td>" . $min . "</td>";
		}
		 echo "<td>" . $multiplicand[$x] * $multiplier[$k] . "</td>";
	}
	$min++;
	
	echo "</tr>";

};

echo "</table>";
}

?>
