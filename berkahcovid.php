<html>
<body>

<?php

$dbname = 'db_esp32';
$dbuser = 'root';  
$dbpass = ''; 
$dbhost = 'localhost'; 

$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$connect){
	echo "Error: " . mysqli_connect_error();
	exit();
}

echo "Connection Success!<br><br>";

$temperature = $_GET["temperature"];
$humidity = $_GET["humidity"]; 
$amonia = $_GET["amonia"]; 


$query = "INSERT INTO tbl_temp (temp_value, temp_humd, temp_amonia) 
			VALUES ('$temperature', '$humidity','$amonia') 
			WRERE temp_value > 0, 
			temp_humd > 0, 
			temp_amonia >0
";
$result = mysqli_query($connect,$query);

echo "Insertion Success!<br>";

?>
</body>
</html>