<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "";

    $conn = mysqli_connect($servername,$username,$password,$dbname);

    $dbname = 'meetandtravel';
    mysqli_select_db($conn, $dbname);

    if(!$conn) die("select db connection failed: " . mysqli_connect_error());

$sql = "CREATE TABLE `city` (
	  `ID` INT NOT NULL AUTO_INCREMENT,
	  `city` VARCHAR(50) NOT NULL,
	  `latitude` DOUBLE NOT NULL,
	  `longitude` DOUBLE NOT NULL,
	  `country` VARCHAR(50) NOT NULL,
	  `image` VARCHAR(50),
	  PRIMARY KEY (`ID`))";


if(mysqli_query($conn,$sql)){
        echo "NAPRAVLJENA TABELA BREEE<br>";
    }else{
        echo "Error lele bate nije napravio tabelu:  " . mysqli_error($conn) . "<br>";
    }

    mysqli_close($conn);
