<?php
	$con = mysqli_connect('127.0.0.1', 'root', 'Imagenius@115', 'zyx');
	if (mysqli_connect_errno()) {
		echo 'Database Connection failed with the following erors:' . mysqli_connect_errno();
		die();
	}

 function getCountries(){
 	global $con;

 	$countries_sql = "SELECT * FROM countries";
 	$countries_query = mysqli_query($con, $countries_sql);

 	while ($country = mysqli_fetch_assoc($countries_query)) {
 		$country_name = $country['Name'];
 		echo "<option>$country_name</option>";
 	}
 }